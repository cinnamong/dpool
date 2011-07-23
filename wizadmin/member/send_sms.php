<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: (<?=$name?>) 고객에게 SMS발송 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// 주문상세내역 보기
function inputCheck(frm){
	
	if(frm.hphone.value == ""){
		alert("받는이 휴대폰번호를 입력하세요");
		frm.hphone.focus();
		return false;
	}

	if(frm.content.value == ""){
		alert("내용을 입력하세요");
		frm.content.focus();
		return false;
	}
}

function calByte(aquery){
	
	var tmpStr;
	var temp = 0;
	var onechar;
	var tcount = 0;;

	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(k=0; k<temp; k++) {
		onechar = tmpStr.charAt(k);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
		
		frm.sms_byte.value = tcount+"/80 bytes";
		
		if(tcount > 80) {
			alert("메시지내용은 80 바이트 이상 전송할 수 없습니다.");
			
			cutText(frm.sms_msg.value);
			
			return;
		}
	}
	if ( temp == 0 ) { 
		
		frm.sms_byte.value = "0/80 bytes";
		
	}
}

function cutText(aquery) {
	
	var tmpStr;
	var temp=0;
	var onechar;
	var tcount = 0;

	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(t=0; t<temp; t++){
		onechar = tmpStr.charAt(t);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
		if(tcount > 80) {
			tmpStr = tmpStr.substring(0, t);
			break;
		}
	}
	
	document.frm.sms_msg.value = tmpStr;
	
	calByte(tmpStr);        
}

function checkSmsmsg(){
	
	var tmpStr = document.frm.sms_msg.value;
	
	calByte(tmpStr);

}


//-->
</script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE">
      <font color="ffffff"><b>:: (<?=$name?>) 고객에게 SMS발송 ::</b></font>
    </td>
    <td bgcolor="659EBE" align="right"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
<form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="sendsms">
<input type="hidden" name="se_name" value="<?=$wizadmin_session[shop_name]?>">
<input type="hidden" name="se_tel" value="<?=$wizadmin_session[shop_tel]?>">

  <tr><td height=1 colspan=3></td></tr>
  <tr bgcolor=f0f0f0 align=center>
    <td colspan="2" height="5"></td>
  </tr>
  <tr>
    <td height="30" width="150" align=center>보내는이</td>
    <td> : <?=$wizadmin_session[shop_name]?>(<?=$wizadmin_session[shop_tel]?>)</td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td height="30" align=center>받는휴대폰</td>
    <td> : <input type="text" name="hphone" value="<?=$hphone?>" class="form3"></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=2></td></tr>
  <tr>
    <td colspan="2" align="center">
    <textarea name="sms_msg" rows="12" cols="36" class="textarea2" onKeyDown="checkSmsmsg();"></textarea>
    <input type="text" name="sms_byte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:돋움; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()">
    </td>
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