<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<?
$sql = "select * from wiz_mailsms where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);

$email_msg = $row->email_hmsg."{ ¸Þ¼¼Áö }".$row->email_fmsg;
$email_msg = info_replace($shop_info, $re_info, $email_msg);

echo $email_msg;
?>