<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

<?
$sql = "select * from wiz_mailsms where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
?>
<script language="javascript">
<!--
function calByte(type, aquery){
	
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
		
		if(type == "cust") frm.sms_custbyte.value = tcount+"/80 bytes";
		else  frm.sms_operbyte.value = tcount+"/80 bytes";
		
		if(tcount > 80) {
			alert("메시지내용은 80 바이트 이상 전송할 수 없습니다.");
			
			if(type == "cust") cutText(type, frm.sms_msg.value);
			else cutText(type, frm.sms_opermsg.value);
			
			
			return;
		}
	}
	if ( temp == 0 ) { 
		
		if(type == "cust") frm.sms_custbyte.value = "0/80 bytes";
		else  frm.sms_operbyte.value = "0/80 bytes";
		
	}
}

function cutText(type, aquery) {
	
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
	
	if(type == "cust") document.frm.sms_msg.value = tmpStr;
	else  document.frm.sms_opermsg.value = tmpStr;
	
	calByte(type, tmpStr);        
}

function checkSmsmsg(type){
	
	var tmpStr;
	if(type == "cust" && document.frm.sms_msg != null){
		tmpStr = document.frm.sms_msg.value;
		calByte(type, tmpStr);
	}
}

-->
</script>


                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="86%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">

                                          <?
                                          $nowposi = "상점관리 &gt; <strong>메일/SMS설정</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>메일/SMS 내용 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="shop_save.php" method="post">
                                          <input type="hidden" name="mode" value="mailsms">
                                          <input type="hidden" name="code" value="<?=$code?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;분류명</td>
                                                    <td width="80%" bgcolor="F8F8F8"><b><?=$row->subject?></b></td>
                                                  </tr>
                                                  <?
                                                  if($code != "mem_notice"){
                                                  ?>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMS수신</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input type="checkbox" name="sms_cust" value="Y" <? if($row->sms_cust == 'Y') echo "checked"; ?>>고객수신 &nbsp; &nbsp; 
                                                      <input type="checkbox" name="sms_oper" value="Y" <? if($row->sms_oper == 'Y') echo "checked"; ?>>관리자수신<br>
                                                      <textarea cols="35" rows="5" name="sms_msg" onKeyDown="checkSmsmsg('cust');" class="textarea"><?=$row->sms_msg?></textarea>
                                                      <input type="text" name="sms_custbyte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:돋움; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()">
                                                    </td>
                                                  </tr>
                                                  <?
                                                  }
                                                  ?>
                                                  <?
                                                  if($code != "mem_notice"){
                                                  ?>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;메일수신</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input type="checkbox" name="email_cust" value="Y" <? if($row->email_cust == 'Y') echo "checked"; ?>>고객수신 &nbsp; &nbsp; 
                                                    <input type="checkbox" name="email_oper" value="Y" <? if($row->email_oper == 'Y') echo "checked"; ?>>관리자수신
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;메일제목</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input type="text" name="email_subj" value="<?=$row->email_subj?>" size="80" class="form1">
                                                    </td>
                                                  </tr>
                                                  <?
                                                  }
                                                  ?>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;메일상단내용</td>
                                                    <td bgcolor="F8F8F8">
                                                      <textarea cols="90" rows="12" name="email_hmsg" class="textarea"><?=$row->email_hmsg?></textarea>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;메일하단내용</td>
                                                    <td bgcolor="F8F8F8">
                                                      <textarea cols="90" rows="12" name="email_fmsg" class="textarea"><?=$row->email_fmsg?></textarea>
                                                    </td>
                                                  </tr>
                                                </table>
                                                
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>도움말</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                              <b>{DATE}</b> 오늘날자 &nbsp;
                                              <b>{MEM_ID}</b> 회원아이디 &nbsp;
                                              <b>{MEM_PW}</b> 회원비밀번호 &nbsp;
                                              <b>{MEM_NAME}</b> 회원이름<br>
                                              
                                              <b>{SHOP_NAME}</b> 쇼핑몰 이름 &nbsp;
                                              <b>{SHOP_EMAIL}</b> 쇼핑몰 이메일<br>
                                              <b>{SHOP_TEL}</b> 쇼핑몰 전화번호 &nbsp;
                                              <b>{SHOP_URL}</b> 쇼핑몰 주소로 변경되어 발송됩니다.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='shop_mailsms.php';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onclick="document.location='shop_mailsms.php';"></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 미리보기 " onclick="window.open('shop_mailview.php?code=<?=$code?>','','');"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td></tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>
                        
<script language="javascript">
<!--
checkSmsmsg('cust');
//checkSmsmsg('oper');
-->
</script>

<? include "../inc/footer.inc"; ?>