<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: (<?=$name?>) 고객에게 메일발송 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// 주문상세내역 보기
function inputCheck(frm){
	
	if(frm.re_name.value == ""){
		alert("받는이 성명을 입력하세요");
		frm.re_name.focus();
		return false;
	}
	
	if(frm.re_email.value == ""){
		alert("받는이 이메일 입력하세요");
		frm.re_email.focus();
		return false;
	}
	
	if(frm.subject.value == ""){
		alert("제목을 입력하세요");
		frm.subject.focus();
		return false;
	}
	
	if(frm.content.value == ""){
		alert("내용을 입력하세요");
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
      <font color="ffffff"><b>:: (<?=$name?>) 고객에게 메일발송 ::</b></font>
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
    <td height="30" width="100" align=center>보내는이</td>
    <td> : <?=$wizadmin_session[shop_name]?>(<?=$wizadmin_session[shop_email]?>)</td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>받는이 성명</td>
    <td> : <input type="text" name="re_name" value="<?=$name?>" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>받는이 이메일</td>
    <td> : <input type="text" name="re_email" value="<?=$email?>" size="45" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>제목</td>
    <td> : <input type="text" name="subject" size="55" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>내용</td>
    <td> : <textarea name="content" rows="12" cols="70" class="textarea2"></textarea></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td align="center" colspan="2">
      <input type="submit" value=" 발 송 " class="t"> &nbsp; 
      <input type="button" value=" 닫 기 " onClick="self.close();" class="t">
    </td>
  </tr>
</form>
</table>
</body>
</html>