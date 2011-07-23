<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
if($mode == "ban_update"){
	$sql = "select * from wiz_banner where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$ban_info = mysql_fetch_object($result);
	$ban_info->content = str_replace("\"", "'", $ban_info->content);
}
?>
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/valueCheck.js"></script>
<script language="JavaScript">
<!--
function inputCheck(frm){
	
	if(viewMode == 1){
      iHTML = iView.document.body.innerHTML;
      frm.content.value = iHTML;
   }else{
      iText = iView.document.body.innerText;
      iView.document.body.innerHTML = iText;
      iHTML = iView.document.body.innerHTML;
      frm.content.value = iHTML;
   }

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
                                          $nowposi = "디자인관리 &gt; <strong>배너관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>배너설정 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="dsn_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="<?=$mode?>">
                                          <input type="hidden" name="idx" value="<?=$idx?>">
                                          <input type="hidden" name="content" value="<?=$ban_info->de_html?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;디자인방법</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    <select name="de_type">
                                                    <option value="IMG" <? if($ban_info->de_type == "IMG" || $ban_info->de_type == "") echo "selected"; ?>>이미지
                                                    <option value="HTML" <? if($ban_info->de_type == "HTML") echo "selected"; ?>>HTML
                                                    </select>
                                                    </td>
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사용여부</td>
                                                    <td width="200" bgcolor="F8F8F8">&nbsp;
                                                      <input type="radio" name="isuse" value="Y" size="80" class="form1" <? if($ban_info->isuse == "Y" || $ban_info->align == "") echo "checked"; ?>> 사용함 &nbsp; 
                                                      <input type="radio" name="isuse" value="N" size="80" class="form1" <? if($ban_info->isuse == "N") echo "checked"; ?>> 사용안함
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;배너위치 <font color="red">*</font></td>
                                                    <td width="200" bgcolor="F8F8F8">&nbsp;
                                                      <input type="radio" name="align" value="L" size="80" class="form1" <? if($ban_info->align == "L" || $ban_info->align == "") echo "checked"; ?>> 좌측 &nbsp; 
                                                      <input type="radio" name="align" value="R" size="80" class="form1" <? if($ban_info->align == "R") echo "checked"; ?>> 우측
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우선순위</td>
                                                    <td width="200" bgcolor="F8F8F8">&nbsp;
                                                    <select name="prior">
                                                    <option value="1" <? if($ban_info->prior == "1") echo "selected"; ?>>1
                                                    <option value="2" <? if($ban_info->prior == "2") echo "selected"; ?>>2
                                                    <option value="3" <? if($ban_info->prior == "3") echo "selected"; ?>>3
                                                    <option value="4" <? if($ban_info->prior == "4") echo "selected"; ?>>4
                                                    <option value="5" <? if($ban_info->prior == "5") echo "selected"; ?>>5
                                                    <option value="6" <? if($ban_info->prior == "6") echo "selected"; ?>>6
                                                    <option value="7" <? if($ban_info->prior == "7") echo "selected"; ?>>7
                                                    <option value="8" <? if($ban_info->prior == "8") echo "selected"; ?>>8
                                                    <option value="9" <? if($ban_info->prior == "9") echo "selected"; ?>>9
                                                    <option value="10" <? if($ban_info->prior == "10") echo "selected"; ?>>10
                                                    <option value="11" <? if($ban_info->prior == "11") echo "selected"; ?>>11
                                                    <option value="12" <? if($ban_info->prior == "12") echo "selected"; ?>>12
                                                    <option value="13" <? if($ban_info->prior == "13") echo "selected"; ?>>13
                                                    <option value="14" <? if($ban_info->prior == "14") echo "selected"; ?>>14
                                                    <option value="15" <? if($ban_info->prior == "15") echo "selected"; ?>>15
                                                    <option value="16" <? if($ban_info->prior == "16") echo "selected"; ?>>16
                                                    <option value="17" <? if($ban_info->prior == "17") echo "selected"; ?>>17
                                                    <option value="18" <? if($ban_info->prior == "18") echo "selected"; ?>>18
                                                    <option value="19" <? if($ban_info->prior == "19") echo "selected"; ?>>19
                                                    <option value="20" <? if($ban_info->prior == "20") echo "selected"; ?>>20
                                                    </select>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;링크주소</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="link_url" value="<?=$ban_info->link_url?>" size="60" class="form1"> &nbsp; 
                                                    <input type="checkbox" name="link_target" value="_BLANK" <? if($ban_info->link_target == "_BLANK") echo "checked"; ?>> 새창으로 
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;배너이미지</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    if($ban_info->de_img != "") echo "<img src='/images/banner/$ban_info->de_img'><br>";
                                                    ?>
                                                    <input type="file" name="de_img" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;배너내용</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    
                                                    <!-- 웹에디터  -->
                                                    <table id="tblCtrls" width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
																        <tr> 
																          <td bgcolor="F5F6F5">
																			 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																              <tr> 
																                <td width="18%" height="56">
																					 	<table width="100%" height="56" border="0" align="center" cellpadding="0" cellspacing="0">
																                    <tr align="center" valign="bottom"> 
																                      <td height="26"><a href="javascript:doBold();" onMouseOver="MM_swapImage('Image1','','../webedit/image/wtool1_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool1.gif" name="Image1" width="19" height="18" border="0" id="Image1"></a></td>
																                      <td><a href="javascript:doItalic();" onMouseOver="MM_swapImage('Image2','','../webedit/image/wtool2_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool2.gif" name="Image2" width="19" height="18" border="0" id="Image2"></a></td>
																                      <td><a href="javascript:doUnderline();" onMouseOver="MM_swapImage('Image3','','../webedit/image/wtool3_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool3.gif" name="Image3" width="19" height="18" border="0" id="Image3"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="3" colspan="3"></td>
																                    </tr>
																                    <tr align="center" valign="top"> 
																                      <td height="27"><a href="javascript:doLeft();" onMouseOver="MM_swapImage('Image8','','../webedit/image/wtool8_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool8.gif" name="Image8" width="19" height="18" border="0" id="Image8"></a></td>
																                      <td><a href="javascript:doCenter();" onMouseOver="MM_swapImage('Image9','','../webedit/image/wtool9_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool9.gif" name="Image9" width="19" height="18" border="0" id="Image9"></a></td>
																                      <td><a href="javascript:doRight();" onMouseOver="MM_swapImage('Image10','','../webedit/image/wtool10_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool10.gif" name="Image10" width="19" height="18" border="0" id="Image10"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="19%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td width="100%" height="27" align="center" valign="bottom"><a href="javascript:doFont();" onMouseOver="MM_swapImage('Image4','','../webedit/image/wtool4_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool4.gif" name="Image4" width="84" height="22" border="0" id="Image4"></a></td>
																                    </tr>
																                    <tr>
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doSize();" onMouseOver="MM_swapImage('Image11','','../webedit/image/wtool11_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool11.gif" name="Image11" width="84" height="22" border="0" id="Image11"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="20%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td height="27" align="center" valign="bottom"><a href="javascript:doForcol();" onMouseOver="MM_swapImage('Image5','','../webedit/image/wtool5_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool5.gif" name="Image5" width="95" height="22" border="0" id="Image5"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doBgcol();" onMouseOver="MM_swapImage('Image12','','../webedit/image/wtool12_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool12.gif" name="Image12" width="95" height="22" border="0" id="Image12"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="18%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td height="27" align="center" valign="bottom"><a href="javascript:doImage();" onMouseOver="MM_swapImage('Image6','','../webedit/image/wtool6_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool6.gif" name="Image6" width="73" height="22" border="0" id="Image6"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doTable();" onMouseOver="MM_swapImage('Image13','','../webedit/image/wtool13_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool13.gif" name="Image13" width="73" height="22" border="0" id="Image13"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="25%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td height="27" align="center" valign="bottom"><a href="javascript:doLink();" onMouseOver="MM_swapImage('Image7','','../webedit/image/wtool7_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool7.gif" name="Image7" width="74" height="22" border="0" id="Image7"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doMultilink();" onMouseOver="MM_swapImage('Image14','','../webedit/image/wtool14_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool14.gif" name="Image14" width="111" height="22" border="0" id="Image14"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																              </tr>
																            </table>
																			 </td>
																        </tr>
																      </table>
																      <!-- 웹에디터  -->
						      
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="100%" bgcolor="F8F8F8" colspan="4" align="center">
                                                    <iframe align="right" id="iView" style="width: 99.5%; height:300;" scrolling='YES' hspace="0" vspace="0"></iframe>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="100%" bgcolor="F8F8F8" colspan="4" align="right">
                                                    <input type="checkbox" name="toggle" onClick="doToggle();">html편집
                                                    </td>
                                                  </tr>
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
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='dsn_banner.php';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td>
                                          </tr>
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