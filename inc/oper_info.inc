<?
$sql = "select * from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$oper_info = mysql_fetch_object($result);
?>