<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/bbs_info.inc"; 	 	// �Խ��� ����
include "../inc/util_lib.inc";		// util lib

// ���ۼ� ����üũ
if($wiz_session[level] == "") $wiz_session[level] = "ZM";

// ���ۼ�
if($mode == "write"){

	if($bbs_info->wpermi < $wiz_session[level]) error("���ۼ� ������ �����ϴ�.");
	check_abuse($subject); check_abuse($content);
	
	include "./upfile.inc";		// ÷������ ���ε�

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
	
	
	
// �Խù� ����
}else if($mode == "modify"){
	
	if($bbs_info->wpermi < $wiz_session[level]) error("�ۼ��� ������ �����ϴ�.");
	if($_SESSION[bbsauth_idx] != $idx) error("�ش�Խù��� ������ �� �����ϴ�.");
	
	check_abuse($subject); check_abuse($content);
	
	$sql = "select upfile,upfile2,upfile3,upfile_name,upfile2_name,upfile3_name from wiz_bbs where code = '$code' and idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);

	include "./upfile.inc";		// ÷������ ���ε�
	
	$sql = "update wiz_bbs set grp='$grp', name='$name', email='$email', passwd='$passwd', subject='$subject', content='$content', privacy='$privacy' $upfile_sql $upfile2_sql $upfile3_sql where idx = '$idx'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	comalert("�����Ǿ����ϴ�..","view.php?code=$code&idx=$idx");



// ����ۼ�
}else if($mode == "reply"){
	
	if($bbs_info->apermi < $wiz_session[level]) error("��� ���ۼ� ������ �����ϴ�.");
	
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
	
	include "./upfile.inc";		// ÷������ ���ε�
	
	$memid = $wiz_session[id];
	
	$sql = "insert into wiz_bbs values('', '$code', '$parno', '$prino', '$depno', '$notice', '$grp', '$memid', '$name', '$email', '$subject', '$content', 
							'$ctype', '$privacy', '$upfile_tmp', '$upfile2_tmp', '$upfile3_tmp', '$upfile_name', '$upfile2_name', '$upfile3_name', '$passwd', '$count', '$recom', '$REMOTE_ADDR', now())";
	
	mysql_query($sql) or error(mysql_error());
	
	echo "<script>document.location='list.php?code=$code';</script>";



// �Խù� ����
}else if($mode == "delete"){
	
	if($bbs_info->wpermi < $wiz_session[level]) error("�ۻ��� ������ �����ϴ�.");
	if($_SESSION[bbsauth_idx] != $idx) error("�ش�Խù��� ������ �� �����ϴ�.");
	
	$sql = "select upfile,upfile2,upfile3 from wiz_bbs where  idx = '$_SESSION[bbsauth_idx]'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	
	$sql = "delete from wiz_bbs where idx = '$_SESSION[bbsauth_idx]'";
	$result = mysql_query($sql) or error(mysql_error());
	
	if($row->upfile != "") exec("rm -f ./upfile/".$code."/*".$row->upfile);
	if($row->upfile2 != "") exec("rm -f ./upfile/".$code."/*".$row->upfile2);
	if($row->upfile3 != "") exec("rm -f ./upfile/".$code."/*".$row->upfile3);
	
	comalert("�����Ǿ����ϴ�.","list.php?code=$code");



// �Խù� ����
}else if($mode == "auth"){
	
	if($passwd == "") error("��й�ȣ�� �Է��ϼ���");
	
	$sql = "select idx,parno,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$idx_passwd = $row->passwd;
	
	$sql = "select passwd from wiz_bbs where idx='$row->parno'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$par_passwd = $row->passwd;
	
	if($idx_passwd == $passwd || $par_passwd == $passwd){
		
		// �������� ����
		$bbsauth_idx = $idx;
		$bbsauth_pw = $passwd;
		session_register("bbsauth_idx");
		session_register("bbsauth_pw");
		
		if($smode == "view") $next_url = "view.php?code=$code&idx=$idx&page=$page";
		else if($smode == "modify") $next_url = "input.php?mode=$smode&code=$code&idx=$idx&page=$page";
		else if($smode == "delete") $next_url = "save.php?mode=$smode&code=$code&idx=$idx&page=$page";
		
		echo "<script>document.location='$next_url';</script>";
	
	}else{
	
		error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
		
	}



// �ڸ�Ʈ �Է�
}else if($mode == "comment"){
	
	$sql = "insert into wiz_comment values('', '$idx', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
   $result = mysql_query($sql) or error(mysql_error());

	comalert("����� �ۼ��Ͽ����ϴ�.", "/bbs/view.php?code=$code&idx=$idx");
	


// �ڸ�Ʈ ����
}else if($mode == "delco"){
	
	$sql = "select idx from wiz_comment where idx='$idx' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());

	if(mysql_num_rows($result) > 0){
		
		$sql = "delete from wiz_comment where idx='$idx' and passwd = '$passwd'";
	   $result = mysql_query($sql) or error(mysql_error());
	   
	   comalert("����� �����Ͽ����ϴ�.", "/bbs/view.php?code=$code&idx=$bbs_idx");

	}else{

		error("��й�ȣ�� ���� �ʽ��ϴ�.");

	}
}



?>