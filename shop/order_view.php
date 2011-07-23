<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리

$page_type = "ordercom";
include "../inc/page_info.inc"; 		// 페이지 정보

// 주문정보
$sql = "select * from wiz_order where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

include "./prd_ordmail.inc";			// 주문정보
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>:: 주문내역 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
</head>
<body onLoad="window.print();">
<table cellpadding="0" cellspacing="0"><tr><td align="center"><?=$subimg?></td></tr></table>

<?=$ordmail?>

</body>
</html>