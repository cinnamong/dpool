<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
$sql = "select * from wiz_design";
$result = mysql_query($sql) or error(mysql_error());
$dsn_info = mysql_fetch_object($result);
?>
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
                                          $nowposi = "�����ΰ��� &gt; <strong>�����α⺻����</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="basic">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>���θ� Title </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���θ� Title</td>
                                                    <td width="78%" bgcolor="F8F8F8"><input name="site_title" value="<?=$dsn_info->site_title?>" size="30" type="text" class="form1"></td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�˻�Ű����</td>
                                                    <td bgcolor="F8F8F8"><input name="site_keyword" type="text" value="<?=$dsn_info->site_keyword?>" size="84" class="form1"></td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ұ���</td>
                                                    <td bgcolor="F8F8F8"><input name="site_intro" type="text" value="<?=$dsn_info->site_intro?>" size="84" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>�����α⺻����</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���θ�����</td>
                                                    <td width="78%" bgcolor="F8F8F8" colspan="3">
                                                    <input type="radio" name="site_align" value="LEFT" <? if($dsn_info->site_align == "LEFT" || $dsn_info->site_align == "") echo "checked"; ?>>��������&nbsp; 
                                                    <input type="radio" name="site_align" value="CENTER" <? if($dsn_info->site_align == "CENTER") echo "checked"; ?>>�߾�����
                                                    <input type="radio" name="site_align" value="RIGHT" <? if($dsn_info->site_align == "RIGHT") echo "checked"; ?>>��������
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ü����</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_bgcolor" value="<?=$dsn_info->site_bgcolor?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����̹���</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="site_background" class="form1">
                                                    <?
                                                    if(is_file("../../images/upfile/$dsn_info->site_background"))
                                                    	echo "<img src='../../images/upfile/$dsn_info->site_background' height='20'> <a href='dsn_save.php?mode=back_delete'><font color='red'>[����]</font></a>";
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ϲ���Ʈ��</td>
                                                    <td width="78%" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_font" value="<?=$dsn_info->site_font?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ũ(link)��</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_link" value="<?=$dsn_info->site_link?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ũ(active)��</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_active" value="<?=$dsn_info->site_active?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ũ(hover)��</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_hover" value="<?=$dsn_info->site_hover?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ũ(visited)��</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_visited" value="<?=$dsn_info->site_visited?>" class="form1"></td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ÿ�Ͻ�Ʈ</td>
                                                    <td width="78%" bgcolor="F8F8F8" colspan="3"></td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="F8F8F8" colspan="4">
                                                    <?
                                                    echo "<textarea name=\"dsn_css\" rows=\"15\" cols=\"112\" class=\"textarea\">";
                                                    $f_line = file("../../wiz_style.css","r");
                                                    for($ii=0; $ii<count($f_line);$ii++){
                                                    	echo $f_line[$ii];
                                                    }
                                                    echo "</textarea>";
                                                    ?>
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
                                          <table border="0" cellspacing="0" cellpadding="0">
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