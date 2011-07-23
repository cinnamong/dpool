<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/bbs_info.inc"; 	 	// 게시판 정보
include "../inc/util_lib.inc";		// util lib

// 글작성 권한체크
if($wiz_session[level] == "") $wiz_session[level] = "ZM";

// 글작성
if($mode == "write"){

	if($bbs_info->wpermi < $wiz_session[level]) error("글작성 권한이 없습니다.");
	check_abuse($subject); check_abuse($content);
	
	include "./upfile.inc";		// 첨부파일 업로드

	$memid = $wiz_session[id];
	
	$sql = "select max(prino) as prino from wiz_bbs where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_object($result)){
		$prino = $row->prino+1;
	}
	
	$sql = "insert into wiz_bbs values('', '$code', '$parno', '$prino', '$depno', '$notice', '$grp', '$memid', '$name', '$email', '$subject', '$content', 
							'$ctype', '$privacy', '$upfile_tmp', '$upfile2_tmp', '$upfile3_tmp', '$upfile_name', '$upfile2_name', '$upfile3_name', '$passwd', '$count', '$recom', '$REMOTE_ADDR', now())";

	mysql_query($sql) or error(mysql_error());

	echo "<script>document.location='list.php?code=$code';</script>";
	
	
	
// 게시물 수정
}else if($mode == "modify"){
	
	if($bbs_info->wpermi < $wiz_session[level]) error("글수정 권한이 없습니다.");
	if($_SESSION[bbsauth_idx] != $idx) error("해당게시물을 수정할 수 없습니다.");
	
	check_abuse($subject); check_abuse($content);
	
	$sql = "select upfile,upfile2,upfile3,upfile_name,upfile2_name,upfile3_name from wiz_bbs where code = '$code' and idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);

	include "./upfile.inc";		// 첨부파일 업로드
	
	$sql = "update wiz_bbs set grp='$grp', name='$name', email='$email', passwd='$passwd', subject='$subject', content='$content', privacy='$privacy' $upfile_sql $upfile2_sql $upfile3_sql where idx = '$idx'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	comalert("수정되었습니다..","view.php?code=$code&idx=$idx");



// 답글작성
}else if($mode == "reply"){
	
	if($bbs_info->apermi < $wiz_session[level]) error("답글 글작성 권한이 없습니다.");
	
	check_abuse($subject);
	check_abuse($content);
	
	$sql = "select idx,prino,depno,name,email from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$re_name = $row->name;
	$re_email = $row->email;
	
	$parno = $row->idx;
	$prino = $row->prino;
	$depno = ++$row->depno;
	
	$sql = "update wiz_bbs set prino = prino+1 where code = '$code' and prino >= '$prino'";
	$result = mysql_query($sql) or error(mysql_error());
	
	include "./upfile.inc";		// 첨부파일 업로드
	
	$memid = $wiz_session[id];
	
	$sql = "insert into wiz_bbs values('', '$code', '$parno', '$prino', '$depno', '$notice', '$grp', '$memid', '$name', '$email', '$subject', '$content', 
							'$ctype', '$privacy', '$upfile_tmp', '$upfile2_tmp', '$upfile3_tmp', '$upfile_name', '$upfile2_name', '$upfile3_name', '$passwd', '$count', '$recom', '$REMOTE_ADDR', now())";
	
	mysql_query($sql) or error(mysql_error());
	
	echo "<script>document.location='list.php?code=$code';</script>";



// 게시물 삭제
}else if($mode == "delete"){
	
	if($bbs_info->wpermi < $wiz_session[level]) error("글삭제 권한이 없습니다.");
	if($_SESSION[bbsauth_idx] != $idx) error("해당게시물을 삭제할 수 없습니다.");
	
	$sql = "select upfile,upfile2,upfile3 from wiz_bbs where  idx = '$_SESSION[bbsauth_idx]'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	
	$sql = "delete from wiz_bbs where idx = '$_SESSION[bbsauth_idx]'";
	$result = mysql_query($sql) or error(mysql_error());
	
	if($row->upfile != "") exec("rm -f ./upfile/".$code."/*".$row->upfile);
	if($row->upfile2 != "") exec("rm -f ./upfile/".$code."/*".$row->upfile2);
	if($row->upfile3 != "") exec("rm -f ./upfile/".$code."/*".$row->upfile3);
	
	comalert("삭제되었습니다.","list.php?code=$code");



// 게시물 인증
}else if($mode == "auth"){
	
	if($passwd == "") error("비밀번호를 입력하세요");
	
	$sql = "select idx,parno,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$idx_passwd = $row->passwd;
	
	$sql = "select passwd from wiz_bbs where idx='$row->parno'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$par_passwd = $row->passwd;
	
	if($idx_passwd == $passwd || $par_passwd == $passwd){
		
		// 인증세션 설정
		$bbsauth_idx = $idx;
		$bbsauth_pw = $passwd;
		session_register("bbsauth_idx");
		session_register("bbsauth_pw");
		
		if($smode == "view") $next_url = "view.php?code=$code&idx=$idx&page=$page";
		else if($smode == "modify") $next_url = "input.php?mode=$smode&code=$code&idx=$idx&page=$page";
		else if($smode == "delete") $next_url = "save.php?mode=$smode&code=$code&idx=$idx&page=$page";
		
		echo "<script>document.location='$next_url';</script>";
	
	}else{
	
		error("비밀번호가 일치하지 않습니다.");
		
	}



// 코멘트 입력
}else if($mode == "comment"){
	
	$sql = "insert into wiz_comment values('', '$idx', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
   $result = mysql_query($sql) or error(mysql_error());

	comalert("댓글을 작성하였습니다.", "/bbs/view.php?code=$code&idx=$idx");
	


// 코멘트 삭제
}else if($mode == "delco"){
	
	$sql = "select idx from wiz_comment where idx='$idx' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());

	if(mysql_num_rows($result) > 0){
		
		$sql = "delete from wiz_comment where idx='$idx' and passwd = '$passwd'";
	   $result = mysql_query($sql) or error(mysql_error());
	   
	   comalert("댓글을 삭제하였습니다.", "/bbs/view.php?code=$code&idx=$bbs_idx");

	}else{

		error("비밀번호가 맞지 않습니다.");

	}
}



?>