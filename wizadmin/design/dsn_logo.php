<? include "../../inc/global.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: �ΰ���� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="10"></td></tr>
  <tr>
    <td ><img src="../image/mark_arrowR.gif" width="12" height="12" > 
      <strong>�ΰ����</strong></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="logo">
  <tr>
    <td bgcolor="D5D3D3">
      <table width="100%" border="0" cellspacing="1" cellpadding="2">
        <tr> 
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ΰ��̹���</td>
          <td bgcolor="F8F8F8" colspan="3">
          <?
          if(is_file("../../images/mainimg/$design_info->logo_img")) echo "<img src=/images/mainimg/$design_info->logo_img> <a href='dsn_save.php?mode=logo_delete&file=$design_info->logo_img'> <font color=red>[����]</font></a><br>";
          ?>
          <input type="file" name="logo_img" class="form1">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
      <input type="submit" value=" Ȯ �� " class="t">&nbsp; 
      <input type="button" value=" �� �� " class="t" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
</body>
</html>