<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

                        <script language="JavaScript" type="text/javascript">
								<!--
								function delTradecom(idx){
								   if(confirm('�ش�ŷ�ó�� �����Ͻðڽ��ϱ�?')){
								      document.location = "shop_save.php?mode=shop_trade&trade_mode=delete&idx=" + idx;
								   }
								}
								//-->
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
                                          $nowposi = "�������� &gt; <strong>�ŷ�ó����</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�ŷ�ó ��� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="70" height="30" bgcolor="E9E7E7">����</td>
                                              <td width="135" bgcolor="E9E7E7">�ŷ�ó��</td>
                                              <td width="60" bgcolor="E9E7E7">�����</td>
                                              <td width="90" bgcolor="E9E7E7">�޴���</td>
                                              <td width="90" bgcolor="E9E7E7">��ȭ��ȣ</td>
                                              <td width="90" bgcolor="E9E7E7">�ѽ�</td>
                                              <td width="100" bgcolor="E9E7E7">���</td>
                                            </tr>
                                            <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          function custom_type($type){
														   if($type == "BUY") return "����ó";
														   else if($type == "SAL") return "����ó";
														   else if($type == "DEL") return "��۾�ü";
														   else if($type == "OTH") return "��Ÿ";
														}

                                          $sql = "select * from wiz_tradecom order by com_type asc, idx desc";
                                          $result = mysql_query($sql) or error(mysql_error());
							                     $total = mysql_num_rows($result);
							
							       	            $rows = 12;
							       	            $lists = 5;
							                   	$page_count = ceil($total/$rows);
							                   	if($page < 1 || $page > $page_count) $page = 1;
							                   	$start = ($page-1)*$rows;
							                   	$no = $total-$start;
							                   	if($start>1) mysql_data_seek($result,$start);
							                   	
							                     while(($row = mysql_fetch_array($result)) && $rows){
							                     	if(($no%2) == 0) $bgcolor="#F3F3F3";
							                     	else $bgcolor="#ffffff";
                                          ?>
                                            <tr align="center" bgcolor="<?=$bgcolor?>"> 
                                              <td width="70" height="30" align="center"><?=custom_type($row[com_type])?></td>
                                              <td width="135"><?=$row[com_name]?></td>
                                              <td width="60"><?=$row[charge_name]?></td>
                                              <td width="90"><?=$row[charge_hand]?></td>
                                              <td width="90"><?=$row[charge_tel]?></td>
                                              <td width="90"><?=$row[com_fax]?></td>
                                              <td width="100">
                                                <input name="Button3" type="button" class="xbtn" value="����" onclick="document.location='shop_trade_input.php?trade_mode=update&idx=<?=$row[idx]?>'">
                                                <input name="Button3" type="button" class="xbtn" value="����" onclick="delTradecom('<?=$row[idx]?>');">
                                              </td>
                                            </tr>
                                            <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          		$no--;
								                        $rows--;
								                    }
								                  ?>
								                  </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, ""); ?>
                                          
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>����</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                              - ���θ� ��� ���õ� �ŷ�ó ������ �����մϴ�.
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