<?
if(empty($link)){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<style>
.font1 {
	font-size: 13pt;
	line-height: normal;
	text-decoration: underline;
	color: #000000;

}
a {
	color: #000000;
}
.fon2 {
	font-size: 9pt;
}
</style>
</head>

<body bgcolor="F9F8F8"  topmargin="2" leftmargin="2">
<table width="371" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#999999"><table width="371" border="0" cellspacing="1" cellpadding="2">
        <tr>
          <td bgcolor="ECEBEB">
            <table width="367" border="0" cellspacing="0" cellpadding="0">
            <form name="linkForm">
              <tr>
                <td height="40" valign="bottom" bgcolor="E1E0E0"><div align="center"><span class="fon2">선택된 부분에 걸릴 링크 주소(url)를 넣어주세요<br>
                    (주소에 꼭 &quot;http://&quot;를 포함해서 입력해 주세요)</span><br>
                  </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="E1E0E0"><div align="center">
                    <input name="link" type="text" value="http://" size="45">
                  </div></td>
              </tr>
              <tr>
                <td height="40" bgcolor="E1E0E0"><table width="95" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="image" src="image/bt_apply.gif" width="45" height="22" border="0"></td>
                      <td width="5">&nbsp;</td>
                      <td><a href="javascript:self.close();"><img src="image/bt_cancel.gif" width="45" height="22" border="0"></a></td>
                    </tr>
                  </table></td>
              </tr>
            </form>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?
}else{
?>
<script language=javascript>
<!--
opener.iView.focus();
opener.iView.document.execCommand("createlink", false, "<?=$link?>");
opener.iView.focus();
self.close();
-->
</script>
<?
}
?>