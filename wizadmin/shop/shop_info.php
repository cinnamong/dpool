<? include "../../inc/global.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<script language="javascript">
<!--
function searchZip(){
	document.frm.com_address.focus();
	var url = "../member/search_zip.php?kind=com_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
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
                                  <td align="center" valign="top" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">

                                          <?
                                          $nowposi = "�������� &gt; <strong>�⺻��������</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>���������� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="shop_save.php" method="post">
                                          <input type="hidden" name="mode" value="shop_info">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���θ� �̸�</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="shop_name" value="<?=$shop_info->shop_name?>" type="text" class="form1"></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ ���̵�</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="shop_id" type="text" value="<?=$shop_info->shop_id?>" class="form1" readonly></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ ��й�ȣ</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="shop_pw" type="text" value="<?=$shop_info->shop_pw?>" class="form1" size="20"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ e-mail</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="shop_email" type="text" value="<?=$shop_info->shop_email?>" size="28" class="form1"></td>
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ �޴���</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="shop_hand" type="text" value="<?=$shop_info->shop_hand?>" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>��������� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����ڵ�Ϲ�ȣ</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="com_num" type="text" value="<?=$shop_info->com_num?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ȣ</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="com_name" type="text" value="<?=$shop_info->com_name?>" class="form1"></td>
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ǥ�ڸ�</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="com_owner" type="text" value="<?=$shop_info->com_owner?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ȣ</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$shop_info->com_post); ?>
                                                      <input name="com_post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="com_post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" ã �� " onClick="searchZip();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ּ�</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="com_address" type="text" value="<?=$shop_info->com_address?>" size="50" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td bgcolor="F8F8F8"><input name="com_kind" type="text" value="<?=$shop_info->com_kind?>" class="form1"></td>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td bgcolor="F8F8F8"><input name="com_class" type="text" value="<?=$shop_info->com_class?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ȭ��ȣ</td>
                                                    <td bgcolor="F8F8F8"><input name="com_tel" type="text" value="<?=$shop_info->com_tel?>" class="form1"></td>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѽ���ȣ</td>
                                                    <td bgcolor="F8F8F8"><input name="com_fax" type="text" value="<?=$shop_info->com_fax?>" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
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
                                                <table width="670" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td width="5"></td>
                                                    <td valign="top" width="100"> - ������ ��й�ȣ</td>
                                                    <td>: ������������ �α��ν� ��й�ȣ �Դϴ�.</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td valign="top" width="100"> - ������ �̸���</td>
                                                    <td>: �ֹ���Ȳ, ȸ��Ż��� �����κ��� ������ �޴� �ּ��Դϴ�.</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td valign="top" width="100"> - ������ �޴���</td>
                                                    <td>: SMS ���� �ֹ�,���� �˸� �޼����� �޴� ��ȣ�Դϴ�.</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td valign="top" width="100"> - ���������</td>
                                                    <td>: ����Ʈ ��� �ݿ��ǹǷ� ���� ���� ����� ������ �Է��ؾ��մϴ�.</td>
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