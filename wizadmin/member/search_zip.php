<?
include "../../inc/global.inc"; 			// DB컨넥션, 접속자 파악
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>우편번호 검색</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function setAddr(zipcode1, zipcode2 , addr){
	opener.frm.<?=$kind?>post.value = zipcode1;
	opener.frm.<?=$kind?>post2.value = zipcode2;
	opener.frm.<?=$kind?>address.value = addr;
	if(opener.frm.<?=$kind?>address2 != null)
		opener.frm.<?=$kind?>address2.focus();
	self.close();
}
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" onLoad="document.frm.address.focus();" style="background-color:#ffffff">
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: 우편번호 찾기 ::</b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"></td>
  </tr>
  <tr><td height=1 colspan=3></td></tr>
</table>
<br>
<table border=0 cellpadding=0 cellspacing=0  width=95% align=center>
  <tr>
    <td colspan=3 style="padding:5" bgcolor=#F5F5F5 align=center>
		<table width="100%"cellpadding=0 cellspacing=0 bgcolor=#ffffff>
		<form name="frm" method="post" action="<?=$PHP_SELF?>">
		<input type="hidden" name="kind" value="<?=$kind?>">
		  <tr>
		    <td width="30"></td>
		    <td height=35>지역명</td>
		    <td><input type="text" name="address" class="form1"></td>
		    <td width="100"><input type="submit" value="검 색" class="t"></td>
		  </tr>
		</form>
		</table>
	</td>
  </tr>
</table>
<br>
<?
if( $address != ""){
?>
<table border=0 cellpadding=2 cellspacing=0 width=95% bgcolor=#ffffff align=center>
	<?

	$sql = "select * from wiz_zipcode where sido like '%$address%' or gugun like '%$address%' or dong like '%$address%' or bunji like '%$address%'";
	$result = mysql_query($sql);
	$total = mysql_num_rows($result);
	$count = 0;
	while($total> $count){
	
		$zipcode = mysql_result($result,$count,"zipcode");
		$sido = mysql_result($result,$count,"sido");
		$gugun = mysql_result($result,$count,"gugun");
		$dong = mysql_result($result,$count,"dong");
		$bunji = mysql_result($result,$count,"bunji");
		
		$zipcodeArr = split("-",$zipcode,2);
		$addr = $sido ." ". $gugun ." ". $dong ." ". $bunji;
		
		if($count%2 == 0) $bgcolor="#ffffff";
		else $bgcolor = "#ECFFFB";
	?>
	<tr>
	  <td width=70><font color=#2088CD><?=$zipcodeArr[0]?>-<?=$zipcodeArr[1]?></font></td>
	  <td><a href="" onClick="setAddr( '<? echo $zipcodeArr[0] ?>' , '<? echo $zipcodeArr[1] ?>' , '<? echo $addr ?>' )"><? echo $addr; ?></a></td>
	</tr>
	<tr><td colspan=2 height=1 bgcolor=#f0f0f0></td></tr>
	<?		
		$count++;
	}
	?>
	<?
	if(!empty($address) && $total <= 0){
	?>
	<tr><td colspan=2 height=1 bgcolor=#f0f0f0></td></tr>
	<tr>
	  <td colspan="2" align="center">- 찾으시는 주소가 없습니다. 다시 입력하세요.</td>
	</tr>
	<?
	}
	?>
	
</table>	
<?
}
?>
</body>
</html>