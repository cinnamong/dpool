<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
if($mode == "update"){
	$sql = "select * from wiz_category where catcode = '$catcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$optrow = mysql_fetch_array($result);
}
?>
<script language="javascript">
<!--
function openOption(mode,idx){
	var url = "option_input.php?mode=" + mode + "&idx=" + idx;
	var sFeatures = "dialogWidth: 350px; dialogHeight: 220px; center: yes; help: no; resizable: no; status: no; scroll: no;"; 
   //window.showModelessDialog(url, window, sFeatures); 
   window.open(url,"","height=200, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");
}
function delOption(idx){
	if(confirm('옵션을 삭제하시겠습니까?')){
		document.location="option_save.php?mode=delete&idx=" + idx;
	}
}
-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="87%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          <?
                                          $nowposi = "상품관리 &gt; <strong>옵션항목관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>옵션목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td></td>
                                              <td align="right"><input type="button" class="t" value="옵션등록" onClick="openOption('insert','');"></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="100" height="30" bgcolor="E9E7E7" align="center">No</td>
                                              <td width="100" bgcolor="E9E7E7" align="center">옵션명</td>
                                              <td width="450" bgcolor="E9E7E7" align="center">옵션항목</td>
                                              <td width="100" bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
                                            $sql = "select * from wiz_option order by idx desc";
                                            $result = mysql_query($sql) or error(mysql_error());
                                            
                                            $total = mysql_num_rows($result);
								
								       	            $rows = 20;
								       	            $lists = 5;
								
															$page_count = ceil($total/$rows);
															if(!$page || $page > $page_count) $page = 1;
															$start = ($page-1)*$rows;
															$no = $total-$start;
															if($start>1) mysql_data_seek($result,$start);
															
                                             while(($row = mysql_fetch_object($result)) && $rows){
															if($no%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
                                            ?>
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td  align="center"><?=$no?></td>
                                              <td height="30" align="center"><?=$row->opttitle?></td>
                                              <td height="30" align="center"><?=$row->optcode?></td>
                                              <td>
                                              <input name="Button3" type="submit" class="xbtn" value="수정" onClick="openOption('update','<?=$row->idx?>')">&nbsp;
                                              <input name="Button3" type="submit" class="xbtn" value="삭제" onClick="delOption('<?=$row->idx?>')">
                                              </td>
                                            </tr>
                                            <?
                                         		$no--;
							                        $rows--;
								                     }
								                                          
								                   	if($total <= 0){
								                   		echo "<tr><td height='30' colspan=7 align=center>등록된 옵션항목이 없습니다.</td></tr>";
								                   	}
									                  ?>
									                 <tr><td colspan=8 bgcolor=DEDEDE></td></tr>
                                          </table>


                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, "&$param"); ?>
                                          
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
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
                                              - 상품등록시 옵션목록 가져오기를 통하여 쉽게 옵션을 등록할 수 있습니다.
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
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>