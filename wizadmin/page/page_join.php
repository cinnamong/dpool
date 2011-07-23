<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
$type = "join";
$sql = "select * from wiz_page where type='$type'";
$result = mysql_query($sql) or error(mysql_error());
$page_info = mysql_fetch_object($result);

// 입력정보 사용여부
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// 입력정보 필수여부
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
function inputCheck(frm){
	
	document.frm.toggle.checked = true; doToggle();
	iText = iView.document.body.innerText;
   frm.content.value = iText;

}
//-->
</script>
<body onLoad="Init();">
<? include "../inc/header.inc"; ?>


                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          <?
                                          $nowposi = "페이지관리 &gt; <strong>회원가입</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>회원가입 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="page_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="update">
                                          <input type="hidden" name="type" value="<?=$type?>">
                                          <input type="hidden" name="page" value="page_join.php">
                                          <textarea name="content" style="display:none" ><?=$page_info->content?></textarea>
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상단이미지</td>
                                                   <td width="550" bgcolor="F8F8F8">
                                                    <?
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;입력정보</td>
                                                   <td width="550" bgcolor="F8F8F8" align="center">
                                                     <table width="500" border="0" cellspacing="1" cellpadding="0">
                                                       <tr><td height="5"></td></tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25" width="100">&nbsp; 아이디</td>
                                                         <td width="180">사용함</td>
                                                         <td bgcolor="EAEAEA" width="100">&nbsp; 비밀번호</td>
                                                         <td width="180">사용함</td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; 이름</td>
                                                         <td>사용함</td>
                                                         <td bgcolor="EAEAEA">&nbsp; 주민번호</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="resno" <? if($info_use["resno"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="resno" <? if($info_ess["resno"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; 이메일</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="email" <? if($info_use["email"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="email" <? if($info_ess["email"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; 주소</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="address" <? if($info_use["address"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="address" <? if($info_ess["address"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; 전화번호</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="tphone" <? if($info_use["tphone"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="tphone" <? if($info_ess["tphone"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; 휴대폰</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="hphone" <? if($info_use["hphone"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="hphone" <? if($info_ess["hphone"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                       </tr>
                                                       <tr><td colspan="4" height="2"></td></tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; 생년월일</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="birthday" <? if($info_use["birthday"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="birthday" <? if($info_ess["birthday"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; 관심분야</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="consph" <? if($info_use["consph"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="consph" <? if($info_ess["consph"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; 결혼여부</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="marriage" <? if($info_use["marriage"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="marriage" <? if($info_ess["marriage"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; 결혼기념일</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="memorial" <? if($info_use["memorial"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="memorial" <? if($info_ess["memorial"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; 직업</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="job" <? if($info_use["job"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="job" <? if($info_ess["job"]==true) echo "checked";?>>필수항목</td>
                                                         <td bgcolor="EAEAEA">&nbsp; 학력
                                                         </td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="scholarship" <? if($info_use["scholarship"]==true) echo "checked";?>>사용함 
                                                           <input type="checkbox" name="info_ess[]" value="scholarship" <? if($info_ess["scholarship"]==true) echo "checked";?>>필수항목
                                                         </td>
                                                       </tr>
                                                       <tr><td height="5"></td></tr>
                                                     </table>
                                                   </td>
                                                  </tr>
                                                  
                                                  <? $webedit_title = "가입약관"; $webedit_height=500; include "../webedit/webedit.inc"; ?>
  
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>도움말</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                                - 상단에 위치한 에디터를 이용하여 이미지 삽입, 폰트 크기,색상 위치 이동이 가능합니다.<br>
                                                - 직접 소스 수정을 하실경우 하단에 "html편집" 을 체크하세요.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="115" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60" align="right"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="left"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="..../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>