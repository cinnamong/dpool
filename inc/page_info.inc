<?
$sql = "select * from wiz_page where type = '$page_type'";
$result = mysql_query($sql) or error(mysql_error());
$page_info = mysql_fetch_object($result);

if(is_file("$DOCUMENT_ROOT/images/subimg/$page_info->subimg"))
	$subimg = "<img src='/images/subimg/$page_info->subimg'>";
else
	$subimg = "";
?>