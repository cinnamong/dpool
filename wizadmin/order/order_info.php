<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "status=$status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<?
$sql = "select * from wiz_shopinfo";
$result = mysql_query($sql) or error(mysql_error());
$shopinfo = mysql_fetch_array($result);
?>
<script language="javascript">
<!--
// �� ���Ϲ߼�
function sendEmail(name,email){
	var url = "../member/send_email.php?name=" + name + "&email=" + email;
	window.open(url,"sendEmail","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �� sms�߼�
function sendSms(name,hphone){
	var url = "../member/send_sms.php?name=" + name + "&hphone=" + hphone;
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �����ȣ ã��
function searchZip(){
	document.frm.send_address.focus();
	var url = "../member/search_zip.php?kind=send_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
function searchZip2(){
	document.frm.rece_address.focus();
	var url = "../member/search_zip.php?kind=rece_";
	window.open(url,"searchZip2","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="624" height="3"></td>
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
                                          $nowposi = "�ֹ����� &gt; <strong>�ֹ����</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�ֹ����� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="70" height="30" bgcolor="E9E7E7" align="center">��ǰ�ڵ�</td>
                                              <td width="50" bgcolor="E9E7E7"></td>
                                              <td width="245" bgcolor="E9E7E7" align="center">��ǰ��</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">��ǰ����</td>
                                              <td width="90" bgcolor="E9E7E7" align="center">�ɼ�</td>
                                              <td width="90" bgcolor="E9E7E7" align="center">����</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">������</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
							                        // �ֹ����� ��������
														   $sql = "select * from wiz_order where orderid = '$orderid'";
														   $result = mysql_query($sql) or error(mysql_error());
														   $order_info = mysql_fetch_object($result);
														   
							                        $basketid = $order_info->basketid;
							                        $sql = "select * from wiz_basket where basketid = '$basketid'";
														   $result = mysql_query($sql) or error(mysql_error());
														   $total = mysql_num_rows($result);
														   
														   while($row = mysql_fetch_object($result)){
														   	
														   	if($row->prdimg == "") $row->prdimg = "/images/noimage.gif";
																else $row->prdimg = "/prdimg/$row->prdimg";
															
														   	$prd_price += $row->prdprice*$row->amount;
														   	$reserve_price += $row->prdreserve*$row->amount;
							   							?>
	                                           <tr bgcolor="#FFFFFF"> 
                                              <td height="30" align="center"><?=$row->prdcode?></td>
                                              <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><img src='<?=$row->prdimg?>' width='50' height='50' border='0'></a></td>
                                              <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><?=$row->prdname?></a></td>
                                              <td align="center"><?=number_format($row->prdprice)?>��</td>
                                              <td align="center">
                                              <?
																if($row->opttitle != '') echo "$row->opttitle : $row->optcode <br>";
																if($row->opttitle2 != '') echo "$row->opttitle2 : $row->optcode2 <br>";
																if($row->opttitle3 != '') echo "$row->opttitle3 : $row->optcode3 <br>";
															 ?>
									                   </td>
                                              <td align="center"><?=$row->amount?></td>
                                              <td align="center"><?=number_format($row->prdreserve*$row->amount)?>��</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
                                            }
                                            ?>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0" height="38">
						                          <tr><td height="10"></td></tr>
						                          <tr>
						                            <td align="center">
						                            ��ǰ�հ�( <b><font color="#ED1C24"><?=number_format($order_info->prd_price)?>��</font></b> ) + 
						                            ��ۺ�( <b><font color="#ED1C24"><?=number_format($order_info->deliver_price)?>��</font></b> ) - 
						                            ������( <b><font color="#ED1C24"><?=number_format($order_info->reserve_use)?>��</font></b> )
						                             
						                            = 
						                            <b><font color="#000000">�� �����ݾ� :</font> <font color="#ED1C24"><?=number_format($order_info->total_price)?>��</font></b>
						                            </td>
						                          </tr>
						                          <tr><td height="10"></td></tr>
						                        </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="order_save.php" method="post">
                                          <input type="hidden" name="mode" value="update">
                                          <input type="hidden" name="page" value="<?=$page?>">
                                          <input type="hidden" name="orderid" value="<?=$orderid?>">
                                          
                                          <input type="hidden" name="status" value="<?=$status?>">
                                          <input type="hidden" name="prev_year" value="<?=$prev_year?>">
                                          <input type="hidden" name="prev_month" value="<?=$prev_month?>">
                                          <input type="hidden" name="prev_day" value="<?=$prev_day?>">
                                          <input type="hidden" name="next_year" value="<?=$next_year?>">
                                          <input type="hidden" name="next_month" value="<?=$next_month?>">
                                          <input type="hidden" name="next_day" value="<?=$next_day?>">
                                          <input type="hidden" name="searchopt" value="<?=$searchopt?>">
                                          <input type="hidden" name="searchkey" value="<?=$searchkey?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ֹ���ȣ</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$orderid?></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=pay_method($order_info->pay_method)?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ֹ�����</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$order_info->order_date?></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$order_info->account?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ȣ</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="deliver_num" type="text" value="<?=$order_info->deliver_num?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ա���</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$order_info->account_name?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ó������</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    <select name="chg_status">
                                                    <?
		                      									if($order_info->status == "OR"){
		                      								 ?>
		                                              <option value="OR" <? if($order_info->status == "OR") echo "selected"; ?>>�ֹ�����
		                                              <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>�����Ϸ�
		                      								 <?
		                      									}else{
		                      								 ?>
		                                              <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>�����Ϸ�
		                                              <option value="DR" <? if($order_info->status == "DR") echo "selected"; ?>>����غ���
		                                              <option value="DI" <? if($order_info->status == "DI") echo "selected"; ?>>�����
		                                              <option value="DC" <? if($order_info->status == "DC") echo "selected"; ?>>��ۿϷ�
		                                              <option value="OC" <? if($order_info->status == "OC") echo "selected"; ?>>�ֹ����
		                                              <option>----------
		                                              <option value="RD" <? if($order_info->status == "RD") echo "selected"; ?>>ȯ�ҿ�û
		                                              <option value="RC" <? if($order_info->status == "RC") echo "selected"; ?>>ȯ�ҿϷ�
		                                              <option value="CD" <? if($order_info->status == "CD") echo "selected"; ?>>��ȯ��û
		                                              <option value="CC" <? if($order_info->status == "CC") echo "selected"; ?>>��ȯ�Ϸ�
		                                              <?
		                                             	}
		                                              ?>
                                                    </select>
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="200" bgcolor="F8F8F8"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ó���ð�</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr bgcolor="EAEAEA">
                                                          <td width="25%" align="center" height="25">�ֹ�����</td>
                                                          <td width="25%" align="center">�����Ϸ�</td>
                                                          <td width="25%" align="center">��ۿϷ�</td>
                                                          <td width="25%" align="center">�ֹ����</td>
                                                        </tr>
                                                        <tr>
                                                          <td align="center" height="25"><? if($order_info->order_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->order_date; ?></td>
                                                          <td align="center"> <? if($order_info->pay_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->pay_date; ?> </td>
                                                          <td align="center"> <? if($order_info->send_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->send_date; ?> </td>
                                                          <td align="center"> <? if($order_info->cancel_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->order_date; ?> </td>
                                                        </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>��������� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ֹ��ڸ�</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_name" type="text" value="<?=$order_info->send_name?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̸���</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_email" type="text" value="<?=$order_info->send_email?>" class="form1"> <a href="javascript:sendEmail('<?=$order_info->send_name?>','<?=$order_info->send_email?>')";><font color=red>[�߼�]</font></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ȭ��ȣ</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_tphone" type="text" value="<?=$order_info->send_tphone?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�޴���</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_hphone" type="text" value="<?=$order_info->send_hphone?>" class="form1"> <a href="javascript:sendSms('<?=$order_info->send_name?>','<?=$order_info->send_hphone?>')";><font color=red>[�߼�]</font></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ȣ</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$order_info->send_post); ?>
                                                      <input name="send_post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="send_post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" ã �� " onClick="searchZip();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ּ�</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="send_address" type="text" value="<?=$order_info->send_address?>" size="60" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>���������� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����θ�</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="rece_name" type="text" value="<?=$order_info->rece_name?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ȭ��ȣ</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="rece_tphone" type="text" value="<?=$order_info->rece_tphone?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�޴���</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="rece_hphone" type="text" value="<?=$order_info->rece_hphone?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ȣ</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$order_info->rece_post); ?>
                                                      <input name="rece_post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="rece_post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" ã �� " onClick="searchZip2();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ּ�</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="rece_address" type="text" value="<?=$order_info->rece_address?>" size="60" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��û����</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><textarea name="demand" rows="6" cols="60" class="textarea"><?=$order_info->demand?></textarea></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ڸ޸�</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><textarea name="descript" rows="6" cols="60" class="textarea"><?=$order_info->descript?></textarea></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="115" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" ������� " onClick="document.location='order_list.php?page=<?=$page?>&<?=$param?>';"></td>
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
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>