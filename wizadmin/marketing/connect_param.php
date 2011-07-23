<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
if($save != "true"){
	
// 분석할 파라메터 가져오기
$sql = "select con_parameter from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: 분석파라미터 설정 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/valueCheck.js"></script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
<form name="frm" action="<?=$PHP_SELF?>" method="post">
<input type="hidden" name="save" value="true">
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: 분석파라미터 설정 ::</b></font>
    </td>
    <td bgcolor="659EBE" align="right"><input type="button" value="닫 기" onClick="self.close();" class="t"> &nbsp; </td>
  </tr>
  <tr><td height=1 colspan=2></td></tr>
  <tr><td height="5"></td></tr>
  <tr>
    <td height=35 colspan="2">
      &nbsp; <b>분석파라미터</b> &nbsp;<input type="text" name="parameter" value="<?=$row->con_parameter?>" size="60" class="form3">
    </td>
    <td align="right"><input type="submit" value="적용" class="t"> &nbsp; </td>
  </tr>
  <tr><td height="5"></td></tr>
</form>
</table>

<table width="98%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8" align="center">
  <tr>
    <td height="23" colspan=3>
    &nbsp;각 검색엔진 별로 분석해야할 파라미터 명이 다릅니다.<br>
    &nbsp;ex) 네이버에서 "아디다스"로 검색한경우 상단 주소는 다음과 같습니다.<br>
    &nbsp;http://search.naver.com/search.naver?where=nexearch&<font color='red'><b>query</b></font>=%BE%C6%B5%F0%B4%D9%BD%BA&frm=t1<br>
    &nbsp;이경우 분석해야할 파라메터는 <font color='red'><b>query</b></font>가 됩니다.<br>
    &nbsp;위의 분석파라메터에 각 파라메터를 컴마로 구분하여 저정하시면 됩니다.<br>
    </td>
  </tr>
</table>
</body>
</html>
<?
}else{
	
	$sql = "update wiz_operinfo set con_parameter = '$parameter'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("적용되었습니다.","$PHP_SELF");
	
}
?>