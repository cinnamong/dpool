<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: (<?=$name?>) ������ ���Ϲ߼� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function inputCheck(frm){
	
	if(frm.re_name.value == ""){
		alert("�޴��� ������ �Է��ϼ���");
		frm.re_name.focus();
		return false;
	}
	
	if(frm.re_email.value == ""){
		alert("�޴��� �̸��� �Է��ϼ���");
		frm.re_email.focus();
		return false;
	}
	
	if(frm.subject.value == ""){
		alert("������ �Է��ϼ���");
		frm.subject.focus();
		return false;
	}
	
	if(frm.content.value == ""){
		alert("������ �Է��ϼ���");
		frm.content.focus();
		return false;
	}
}
//-->
</script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE">
      <font color="ffffff"><b>:: (<?=$name?>) ������ ���Ϲ߼� ::</b></font>
    </td>
    <td bgcolor="659EBE" align="right"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
<form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="sendemail">
<input type="hidden" name="se_name" value="<?=$wizadmin_session[shop_name]?>">
<input type="hidden" name="se_email" value="<?=$wizadmin_session[shop_email]?>">

  <tr><td height=1 colspan=3></td></tr>
  <tr bgcolor=f0f0f0 align=center>
    <td colspan="2" height="5"></td>
  </tr>
  <tr>
    <td height="30" width="100" align=center>��������</td>
    <td> : <?=$wizadmin_session[shop_name]?>(<?=$wizadmin_session[shop_email]?>)</td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>�޴��� ����</td>
    <td> : <input type="text" name="re_name" value="<?=$name?>" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>�޴��� �̸���</td>
    <td> : <input type="text" name="re_email" value="<?=$email?>" size="45" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>����</td>
    <td> : <input type="text" name="subject" size="55" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>����</td>
    <td> : <textarea name="content" rows="12" cols="70" class="textarea2"></textarea></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td align="center" colspan="2">
      <input type="submit" value=" �� �� " class="t"> &nbsp; 
      <input type="button" value=" �� �� " onClick="self.close();" class="t">
    </td>
  </tr>
</form>
</table>
</body>
</html>