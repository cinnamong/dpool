<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../inc/header.inc"; ?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
// ������ ���� �ٽ�����
function setReserve(frm){
   
   var reserve_per = frm.reserve_per.value;
   
   if(Check_Num(reserve_per)){
   	if(confirm("��� ��ǰ�� �������� ��ǰ������ "+reserve_per+"% �� �ϰ����� �˴ϴ�.\n\n�����Ͻðڽ��ϱ�?")){
      	document.location = "shop_save.php?mode=setreserve&reserve_per=" + reserve_per;
      }
   }else{
      alert("���ڸ� �Է��ϼ���");
      frm.reserve_per.value = "";
      frm.reserve_per.focus();
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
                                          $nowposi = "�������� &gt; <strong>���������</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>�������� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="shop_save.php" method="post">
                                          <input type="hidden" name="mode" value="oper_info">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������</td>
                                                    <td width="80%" bgcolor="F8F8F8">
																	<?
																	$pay_list = explode("/",$oper_info->pay_method);
																	for($ii=0; $ii<count($pay_list); $ii++){
																	$pay_method[$pay_list[$ii]] = true;
																	}
																	?>
                                                    <input type="checkbox" name="pay_method[]" value="PB" <? if($pay_method["PB"]==true) echo "checked";?>>�������Ա�
                                                    <input type="checkbox" name="pay_method[]" value="PC" <? if($pay_method["PC"]==true) echo "checked";?>>ī�����
                                                    <input type="checkbox" name="pay_method[]" value="PH" <? if($pay_method["PH"]==true) echo "checked";?>>�޴�������
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ý���ID</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input name="pay_id" value="<?=$oper_info->pay_id?>" type="text" class="form1"> &nbsp;
                                                    <input name="pay_agent" value="KCP" type="radio" class="form1" <? if($oper_info->pay_agent == "KCP") echo "checked"; ?>> KCP &nbsp;
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������¹�ȣ</td>
                                                    <td bgcolor="F8F8F8"><textarea cols="50" rows="5" name="pay_account" class="textarea"><?=$oper_info->pay_account?></textarea></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" cellpadding="0" cellspacing="0">
                                            <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>�����ý���ID</b></td>
                                               <td>: ī����� �ý��� ���̵� �� �����ý��� ȸ���Դϴ�. </td>
                                             </tr>
                                             <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>������¹�ȣ</b></td>
                                               <td>: �ֹ��� ����� ������¸� ���ٿ� �ϳ��� �Է��մϴ�. ex) �������� 484201-01-127831, ������: ���</td>
                                             </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>��۷ἳ�� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��۹���</td>
                                                    <td width="80%" bgcolor="F8F8F8">
                                                    <input type="radio" name="del_method" value="DA" <? if($oper_info->del_method == "DA") echo "checked"; ?>>
                                                    ��ۺ� ���׹���</td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ںδ�</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input type="radio" name="del_method" value="DB" <? if($oper_info->del_method == "DB") echo "checked"; ?>>
                                                    �����ںδ� (����)</td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input type="radio" name="del_method" value="DC" <? if($oper_info->del_method == "DC") echo "checked"; ?>>
                                                    <input name="del_fixprice" type="text" value="<?=$oper_info->del_fixprice?>" class="form1">��</td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Ű��ݺ�</td>
                                                    <td bgcolor="F8F8F8">
                                                      <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td>
                                                            <input type="radio" name="del_method" value="DD" <? if($oper_info->del_method == "DD") echo "checked"; ?>>
                                                            <input type="text" name="del_staprice" value="<?=$oper_info->del_staprice?>" class="form1">
                                                          </td>
                                                          <td>&nbsp;�̻󱸸Ž� <input type="text" name="del_staprice2" value="<?=$oper_info->del_staprice2?>" class="form1"> ��</td>
                                                        </tr>                  
                                                        <tr>
                                                          <td></td>
                                                          <td>&nbsp;���ϱ��Ž� <input type="text" name="del_staprice3" value="<?=$oper_info->del_staprice3?>" class="form1"> ��</td>
                                                        </tr>   
                                                      </table>   
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</td>
                                                    <td bgcolor="F8F8F8">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td>�����ȣ</td>
                                                        <td>������</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td> 
                                                        <input name="del_extrapost1" type="text" value="<?=$oper_info->del_extrapost1?>" class="form1" size="9"> ����  
                                                        <input name="del_extrapost12" type="text" value="<?=$oper_info->del_extrapost12?>" class="form1" size="9"> ���� 
                                                        </td>
                                                        <td>
                                                        <input name="del_extraprice1" type="text" value="<?=$oper_info->del_extraprice1?>" class="form1" size="20">��
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td> 
                                                        <input name="del_extrapost2" type="text" value="<?=$oper_info->del_extrapost2?>" class="form1" size="9"> ����  
                                                        <input name="del_extrapost22" type="text" value="<?=$oper_info->del_extrapost22?>" class="form1" size="9"> ���� 
                                                        </td>
                                                        <td>
                                                        <input name="del_extraprice2" type="text" value="<?=$oper_info->del_extraprice2?>" class="form1" size="20">��
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td> 
                                                        <input name="del_extrapost3" type="text" value="<?=$oper_info->del_extrapost3?>" class="form1" size="9"> ����  
                                                        <input name="del_extrapost32" type="text" value="<?=$oper_info->del_extrapost32?>" class="form1" size="9"> ���� 
                                                        </td>
                                                        <td>
                                                        <input name="del_extraprice3" type="text" value="<?=$oper_info->del_extraprice3?>" class="form1" size="20">��
                                                        </td>
                                                      </tr>
                                                    </table>
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" cellpadding="0" cellspacing="0">
                                            <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>��۷� ����</b></td>
                                               <td>: ��۷Ḧ 4���� ���·� �����ϸ� �� ��Ȳ�� ��۷� ������ �մϴ�.</td>
                                             </tr>
                                             <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>��������</b></td>
                                               <td>: ���������� ���� ��۷Ḧ ���� �մϴ�. �����ֱ� �Ѱ���� ��� 695840 ���� 695844 ���� 2000��</td>
                                             </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>�����ݼ��� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��뿩��</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="radio" name="reserve_use" value="Y" <? if($oper_info->reserve_use == "Y") echo "checked"; ?>>�����
                                                    <input type="radio" name="reserve_use" value="N" <? if($oper_info->reserve_use == "N") echo "checked"; ?>>������</td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ȸ������ ������</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="reserve_join" type="text" value="<?=$oper_info->reserve_join?>" class="form1"></td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��õ�� ������</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="reserve_recom" type="text" value="<?=$oper_info->reserve_recom?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ּһ�� ������</td>
                                                    <td bgcolor="F8F8F8"><input name="reserve_min" type="text" value="<?=$oper_info->reserve_min?>" class="form1"></td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1ȸ �ִ��� ������</td>
                                                    <td bgcolor="F8F8F8"><input name="reserve_max" type="text" value="<?=$oper_info->reserve_max?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ǰ���Ž� ������</td>
                                                    <td bgcolor="F8F8F8"><input name="reserve_buy" type="text" value="<?=$oper_info->reserve_buy?>" class="form1"> %</td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ �ϰ�����</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="reserve_per" type="text" value="<?=$oper_info->reserve_per?>" class="form1" size="10"> % &nbsp;
                                                      <input type="button" class="t" value=" �� �� " onClick="setReserve(this.form);">
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" cellpadding="0" cellspacing="0">
                                            <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="110"> <img src="../image/mark_dotblue.gif"> <b>��뿩��</b></td>
                                               <td>: ��ǰ���Խ� ������ ����/��� , ȸ�����Խ�, ��õ���ΰ�� �� ������ ����� �����մϴ�.</td>
                                             </tr>
                                             <tr>
                                               <td></td>
                                               <td valign="top"> <img src="../image/mark_dotblue.gif"> <b>��ǰ���Ž� ������</b></td>
                                               <td>: ��ǰ��Ͻ� �Ǹűݾ׿� �ۼ��� �ۼ�Ʈ�� �����Ͽ� �������� �ڵ����˴ϴ�.</td>
                                             </tr>
                                             <tr>
                                               <td></td>
                                               <td valign="top"> <img src="../image/mark_dotblue.gif"> <b>������ �ϰ�����</b></td>
                                               <td>: ���� ��ϵǾ��ִ� ��ǰ�� �������� �ۼ��� �ۼ�Ʈ�� �ٽ� �����մϴ�.</td>
                                             </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>��ǰ���� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��뿩��</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                    <input type="radio" name="review_use" value="Y" <? if($oper_info->review_use == "Y") echo "checked"; ?>>�����
                                                    <input type="radio" name="review_use" value="N" <? if($oper_info->review_use == "N") echo "checked"; ?>>������
                                                    </td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ۼ�����</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                    <input type="radio" name="review_level" value="E" <? if($oper_info->review_level == "E") echo "checked"; ?>>ȸ��+��ȸ��
                                                    <input type="radio" name="review_level" value="M" <? if($oper_info->review_level == "M") echo "checked"; ?>>ȸ����
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table><br>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>����</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                              - ���ذ� ���� �ʴ� �κ��̳� �ǹ����� �����ø� ��� help@wizshop.net ���� �����Ͻñ� �ٶ��ϴ�.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="115" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" �� �� " onClick="history.go(-1);"></td>
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