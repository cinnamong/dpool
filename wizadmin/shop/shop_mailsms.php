<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

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
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>메일/SMS 목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="50%" height="30" bgcolor="E9E7E7" align="center">분류명</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">메일고객</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">메일관리자</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">SMS고객</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">SMS관리자</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                            <tr><td colspan="6" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          function getYesNo($yn){
                                          	if($yn == "N") return "받지않음";
                                          	else if($yn == "Y") return "받음";
                                          }
                                          
                                          $no = 0;
								                  $sql = "select * from wiz_mailsms";
								                  $result = mysql_query($sql) or error(mysql_error());
								                  while($row = mysql_fetch_object($result)){
								                  	if(($no%2) == 0) $bgcolor="#ffffff";
							                     	else $bgcolor="#F3F3F3";
								                  ?>
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td height="30">&nbsp; <a href="shop_mailsms_input.php?code=<?=$row->code?>"><?=$row->subject?></a></td>
                                              <td align="center"><?=getYesNo($row->email_cust)?></td>
                                              <td align="center"><?=getYesNo($row->email_oper)?></td>
                                              <td align="center"><?=getYesNo($row->sms_cust)?></td>
                                              <td align="center"><?=getYesNo($row->sms_oper)?></td>
                                              <td align="center">
                                                <input type="button" class="xbtn" value="수정" onclick="document.location='shop_mailsms_input.php?code=<?=$row->code?>';">
                                              </td>
                                            </tr>
                                          <?
                                          	$no++;
                                       	}
                                       	?>
                                       	</table>
                                       	<table width="97%" height="1" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td bgcolor="DEDEDE"></td></tr>
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
                                              - 각 상황별 메일,SMS 발송(메세지 내용, 수신여부)을 설정합니다.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                    </td>
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