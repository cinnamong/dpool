<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../../inc/bbs_info.inc"; ?>

<?

if($mode == "insert"){

	include "./bbs_upfile.inc";
	
	$memid = $wiz_session[id];
	
	$sql = "select max(prino) as prino from wiz_bbs where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_object($result)){
		$prino = $row->prino+1;
	}
	
	$sql = "insert into wiz_bbs values('', '$code', '$parno', '$prino', '$depno', '$notice', '$grp', '$memid', '$name', '$email', '$subject', '$content', 
							'$ctype', '$privacy', '$upfile_tmp', '$upfile2_tmp', '$upfile3_tmp', '$upfile_name', '$upfile2_name', '$upfile3_name', '$passwd', '$count', '$recom', '$REMOTE_ADDR', now())";

	mysql_query($sql) or error(mysql_error());
	
	complete("게시물이 작성되었습니다.","bbs_list.php?code=$code");





}else if($mode == "update"){

	
	$sql = "select upfile,upfile2,upfile3,upfile_name,upfile2_name,upfile3_name from wiz_bbs where code = '$code' and idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	
	include "./bbs_upfile.inc";
	
	$sql = "update wiz_bbs set notice='$notice', grp='$grp', name='$name', email='$email', passwd='$passwd', subject='$subject', content='$content', privacy='$privacy' $upfile_sql $upfile2_sql $upfile3_sql where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("게시물이 수정되었습니다.","bbs_input.php?code=$code&mode=update&idx=$idx");
	
	
	
	
	
}else if($mode == "reply"){
   
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
	
	include "./bbs_upfile.inc";
	
	$memid = $wiz_session[id];
	
	$sql = "insert into wiz_bbs values('', '$code', '$parno', '$prino', '$depno', '$notice', '$grp', '$memid', '$name', '$email', '$subject', '$content', 
							'$ctype', '$privacy', '$upfile_tmp', '$upfile2_tmp', '$upfile3_tmp', '$upfile_name', '$upfile2_name', '$upfile3_name', '$passwd', '$count', '$recom', '$REMOTE_ADDR', now())";

	mysql_query($sql) or error(mysql_error());

	complete("답글이 작성되었습니다.","bbs_list.php?code=$code&page=$page");

	
	
	
}else if($mode == "delete"){
	
	$sql = "select upfile,upfile2,upfile3 from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	
	if($row->upfile != "") exec("rm -f ../../bbs/upfile/$code/*$row->upfile");
	if($row->upfile2 != "") exec("rm -f ../../bbs/upfile/$code/*$row->upfile2");
	if($row->upfile3 != "") exec("rm -f ../../bbs/upfile/$code/*$row->upfile3");
	
	$sql = "delete from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("게시물이 삭제되었습니다.","bbs_list.php?code=$code&page=$page");
	
	
	
	
}else if($mode == "delimg"){
	
	
	$sql = "select upfile,upfile2,upfile3 from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	
	if($file == "upfile"){
		$upfile_sql = " upfile = '', upfile_name = ''";
		exec("rm -f ../../bbs/upfile/$code/*$row->upfile");
	}else if($file == "upfile2"){
		$upfile_sql = " upfile2 = '', upfile2_name = ''";
		exec("rm -f ../../bbs/upfile/$code/*$row->upfile2");
	}else if($file == "upfile3"){
		$upfile_sql = " upfile3 = '', upfile3_name = ''";
		exec("rm -f ../../bbs/upfile/$code/*$row->upfile3");
	}
	
	$sql = "update wiz_bbs set $upfile_sql where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("이미지가 삭제되었습니다.","bbs_input.php?mode=update&code=$code&idx=$idx&page=$page");
	
	
}

?>