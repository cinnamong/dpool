<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>

<?

if($mode == "insert"){

   $sql = "insert into wiz_option values('', '$opttitle', '$optcode')";

	$result = mysql_query($sql) or error(mysql_error());
	
	echo "<script>alert('등록되었습니다.');self.close();opener.location='prd_option.php';</script>";
	
}else if($mode == "update"){
	
	$sql = "update wiz_option set opttitle='$opttitle', optcode='$optcode' where idx = '$idx'";

	$result = mysql_query($sql) or error(mysql_error());
	
	echo "<script>alert('수정되었습니다..');self.close();opener.location='prd_option.php';</script>";
	
}else if($mode == "delete"){
	
	$sql = "delete from wiz_option where idx = '$idx'";

	$result = mysql_query($sql) or error(mysql_error());
	
	echo "<script>alert('삭제되었습니다..');document.location='prd_option.php';</script>";
	
}

?>