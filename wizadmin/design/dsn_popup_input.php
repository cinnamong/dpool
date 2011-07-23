<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
$type = "popup";
if($mode == "update"){
	$sql = "select * from wiz_content where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$dsn_info = mysql_fetch_object($result);
	$dsn_info->content = str_replace("\"", "'", $dsn_info->content);
}
?>
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/valueCheck.js"></script>
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
                                          $nowposi = "디자인관리 &gt; <strong>팝업관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>팝업설정 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="dsn_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
                                          <input type="hidden" name="type" value="<?=$type?>">
                                          <input type="hidden" name="mode" value="<?=$mode?>">
                                          <input type="hidden" name="idx" value="<?=$idx?>">
                                          <textarea name="content" style="display:none" ><?=$dsn_info->content?></textarea>
                                          
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;제목</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="title" value="<?=$dsn_info->title?>" size="80" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;게시기간</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <?
                                                      	$sdate_list = explode("-",$dsn_info->sdate);
									            						$edate_list = explode("-",$dsn_info->edate);
									            						
                                                         if(empty($sdate_list[0])) $sdate_year = date('Y');
									                              else $sdate_year = $sdate_list[0];
									                              
									                              if(empty($sdate_list[1])) $sdate_month = date('m');
									                              else $sdate_month = $sdate_list[1];
									                              
									                              if(empty($sdate_list[2])) $sdate_day = date('d');
									                              else $sdate_day = $sdate_list[2];

									            						if(empty($edate_list[0])) $edate_year = date('Y')+1;
									                              else $edate_year = $edate_list[0];
									                              
									                              if(empty($edate_list[1])) $edate_month = date('m');
									                              else $edate_month = $sdate_list[1];
									                              
									                              if(empty($edate_list[2])) $edate_day = date('d');
									                              else $edate_day = $edate_list[2];
									                              
									                              if($dsn_info->posi_x == "") $posi_x = "100";
									                              else $posi_x = $dsn_info->posi_x;
									                              if($dsn_info->posi_y == "") $posi_y = "100";
									                              else $posi_y = $dsn_info->posi_y;
									                              
									                              if($dsn_info->size_x == "") $size_x = "340";
									                              else $size_x = $dsn_info->size_x;
									                              if($dsn_info->size_y == "") $size_y = "400";
									                              else $size_y = $dsn_info->size_y;

									                            ?>
                                                     <select name="sdate_year" class="select2">
									                           <?                     
									                              for($ii=2004; $ii <= 2020; $ii++){
									                                if($ii == $sdate_year) echo "<option value=$ii selected>$ii";
									                                else echo "<option value=$ii>$ii";
									                              }
									                           ?>
									                             </select>
									                             년 
									                             <select name="sdate_month" class="select2">
									                               <?
									                              for($ii=1; $ii <= 12; $ii++){
									                                if($ii<10) $ii = "0".$ii;
									                                if($ii == $sdate_month) echo "<option value=$ii selected>$ii";
									                                else echo "<option value=$ii>$ii";
									                              }
									                           ?>
									                             </select>
									                             월 
									                             <select name="sdate_day" class="select2">
									                               <?
									                              for($ii=1; $ii <= 31; $ii++){
									                                if($ii<10) $ii = "0".$ii;
									                                if($ii == $sdate_day) echo "<option value=$ii selected>$ii";
									                                else echo "<option value=$ii>$ii";
									                              }
									                           ?>
									                             </select>
									                             일 ~ 
									                             <select name="edate_year" class="select2">
									                               <?
									                              for($ii=2004; $ii <= 2020; $ii++){
									                                if($ii == $edate_year) echo "<option value=$ii selected>$ii";
									                                else echo "<option value=$ii>$ii";
									                              }
									                           ?>
									                             </select>
									                             년 
									                             <select name="edate_month" class="select2">
									                               <?
									                              for($ii=1; $ii <= 12; $ii++){
									                                if($ii<10) $ii = "0".$ii;
									                                if($ii == $edate_month) echo "<option value=$ii selected>$ii";
									                                else echo "<option value=$ii>$ii";
									                              }
									                           ?>
									                             </select>
									                             월 
									                             <select name="edate_day" class="select2">
									                               <?
									                              for($ii=1; $ii <= 31; $ii++){
									                                if($ii<10) $ii = "0".$ii;
									                                if($ii == $edate_day) echo "<option value=$ii selected>$ii";
									                                else echo "<option value=$ii>$ii";
									                              }
									                           ?>
									                             </select>
									                             일&nbsp;
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사용여부 <font color="red">*</font></td>
                                                    <td width="30%" bgcolor="F8F8F8">&nbsp;
                                                      <input name="isuse" type="radio" value="Y" size="6" class="form1" <? if($dsn_info->isuse == "Y" || $dsn_info->isuse == "") echo "checked"; ?>> 사용함 &nbsp; 
                                                      <input name="isuse" type="radio" value="N" size="6" class="form1" <? if($dsn_info->isuse == "N") echo "checked"; ?>> 사용안함
                                                    </td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;스크롤여부</td>
                                                    <td width="30%" bgcolor="F8F8F8">&nbsp;
                                                      <input name="scroll" type="radio" value="Y" size="6" class="form1" <? if($dsn_info->scroll == "Y") echo "checked"; ?>> 허용함&nbsp; 
                                                      <input name="scroll" type="radio" value="N" size="6" class="form1" <? if($dsn_info->scroll == "N" || $dsn_info->scroll == "") echo "checked"; ?>> 허용안함
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;위치 <font color="red">*</font></td>
                                                    <td bgcolor="F8F8F8">&nbsp;
                                                      X : <input name="posi_x" type="text" value="<?=$posi_x?>" size="6" class="form1"> &nbsp; 
                                                      Y : <input name="posi_y" type="text" value="<?=$posi_y?>" size="6" class="form1">
                                                    </td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;크기</td>
                                                    <td bgcolor="F8F8F8">&nbsp;
                                                      가로 : <input name="size_x" type="text" value="<?=$size_x?>" size="6" class="form1"> &nbsp; 
                                                      세로 : <input name="size_y" type="text" value="<?=$size_y?>" size="6" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;링크주소</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input type="text" name="linkurl" value="<?=$dsn_info->linkurl?>" size="60" class="form1"></td>
                                                  </tr>
                                                  
                                                  <? $webedit_title = "팝업내용"; include "../webedit/webedit.inc"; ?>
                                                  
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td><img src="../image/mark_arrowR.gif" width="12" height="12" > 
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
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='dsn_popup.php';"></td>
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