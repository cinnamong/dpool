<?
include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
?>

<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>우편번호 검색</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
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

<body onLoad="document.frm.address.focus();" style="background-color:#F6F6F6">

  <table border=0 cellpadding=0 cellspacing=0 width=350 height=300>
    <tr><td height=55><img src="/images/zip_01.gif"></td></tr>
	 <tr><td bgcolor=#ffffff valign=top align=center style="padding:0 0 20 0">
		
				<table border=0 cellpadding=0 cellspacing=0  width=90%>
				<form name="frm" method="post" action="<?=$PHP_SELF?>">
            <input type="hidden" name="kind" value="<?=$kind?>">
				<tr><td colspan=3 align=center style="padding:15 5 5 5"> 찾고자 하는 주소의 동(읍/면/리)를 입력하세요<br>예) 역삼동, 종로3가, 양촌리</td></tr>
				<tr><td colspan=3 height=3 bgcolor=#f0f0f0></td></tr>
				<tr><td colspan=3 height=1 bgcolor=#dadada></td></tr>
				<tr height=50>
					<td><img src="/images/zip_02.gif"></td>
					<td><input type="text" name="address" class="input"></td>
					<td><input type="image" src="/images/but_find_zip.gif" border=0></a></td></tr>				
				<tr><td colspan=3 height=1 bgcolor=#dadada></td></tr>
				<tr><td colspan=3 height=3 bgcolor=#f0f0f0></td></tr>
				<tr><td colspan=3 height=10 bgcolor=#ffffff></td></tr>
				</form>
				</table>
				
				<?
				if( $address != ""){
				?>
				<table border=0 cellpadding=0 cellspacing=0  width=90%>
				  <tr>
				    <td colspan=3 style="padding:5" bgcolor=#F5F5F5 align=center>
					   <table border=0 cellpadding=2 cellspacing=0 width=100% bgcolor=#ffffff>
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
							<tr><td colspan=2 height=1 bgcolor=#f0f0f0></td></tr>
							<tr>
							  <td width=70><font color=#2088CD><?=$zipcodeArr[0]?>-<?=$zipcodeArr[1]?></font></td>
							  <td><a href="" onClick="setAddr( '<? echo $zipcodeArr[0] ?>' , '<? echo $zipcodeArr[1] ?>' , '<? echo $addr ?>' )"><? echo $addr; ?></a></td>
							</tr>
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
				    </td>
				  </tr>
				</table>		
				<?
				}
				?>
				
		</td>
	 </tr>
    <tr><td bgcolor=#E0E0E0 height=1></td></tr>
    <tr><td height=30 align=right style="padding:0 30 0 0"><a href="javascript:self.close();"><img src="/images/id_check_close.gif" border=0></a></td></tr>
  </table>
</body>
</html>
