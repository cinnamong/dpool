<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_info = mysql_fetch_object($result);
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.code.value == ""){
      alert('�Խ��� ������(db��)�� �Է��ϼ���.');
      frm.code.focus();
      return false;
   }
   
   if(frm.title.value == ""){
      alert('�Խ��� �ѱ۸� �Է��ϼ���.');
      frm.title.focus();
      return false;
   }
   
   if(frm.rows.value == ""){
      alert('��������¼� �Է��ϼ���.');
      frm.rows.focus();
      return false;
   }
   if(frm.lists.value == ""){
      alert('����Ʈ��¼� �Է��ϼ���.');
      frm.lists.focus();
      return false;
   }

}
//-->
</script>
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
                                          $nowposi = "Ŀ�´�Ƽ���� &gt; <strong>�Խ��ǰ���</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�Խ�������</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="bbs_pro_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
                                          <input type="hidden" name="mode" value="<?=$mode?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������(db��)</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="code" type="text" size="30" value="<?=$bbs_info->code?>" <? if($mode == "update") echo "readonly"; ?> class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѱ۸�</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="title" type="text" size="30" value="<?=$bbs_info->title?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ÿ�̵��̹���</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    if($bbs_info->titleimg != "") echo "<img src=/bbs/upfile/$bbs_info->titleimg width=500><a href=bbs_pro_save.php?mode=del_titleimg&code=$code><font color=red>[����]</font></a><br>";
                                                    ?>
                                                    <input name="titleimg" type="file" size="30" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Խ����ּ�</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    http://<?=$HTTP_HOST?>/bbs/list.php?code=<?=$bbs_info->code?> &nbsp; 
                                                    <a href="http://<?=$HTTP_HOST?>/bbs/list.php?code=<?=$bbs_info->code?>" target="_blank"><font color=red>�̸�����</font></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ī�װ�</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">��ǥ�� �и� ��)����,�з�1,�з�2<br><input name="grp" type="text" size="60" value="<?=$bbs_info->grp?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��뿩��</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="usetype" value="Y" <? if($bbs_info->usetype == "Y" || $bbs_info->usetype == "") echo "checked"; ?>>�����
                                                      <input type="radio" name="usetype" value="N" <? if($bbs_info->usetype == "N") echo "checked"; ?>>������
                                                    </td> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Խ���Ÿ��</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="bbstype" value="BBS" <? if($bbs_info->bbstype == "BBS" || empty($bbs_info->bbstype)) echo "checked"; ?>>�Խ���
                                                      <input type="radio" name="bbstype" value="PHOTO" <? if($bbs_info->bbstype == "PHOTO") echo "checked"; ?>>������
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr bgcolor="EAEAEA">
                                                          <td width="20%" align="center" height="25">��Ϻ���</td>
                                                          <td width="20%" align="center">���뺸��</td>
                                                          <td width="20%" align="center">���뾲��</td>
                                                          <td width="20%" align="center">��۾���</td>
                                                          <td width="20%" align="center">�ڸ�Ʈ����</td>
                                                        </tr>
                                                        <tr>
                                                          <td align="center" height="25">
                                                            <select name="lpermi">
                                                            <option value="AM" <? if($bbs_info->lpermi == "AM") echo "selected"; ?>>��ü������
                                                            <option value="BM" <? if($bbs_info->lpermi == "BM") echo "selected"; ?>>���ȸ��
                                                            <option value="CM" <? if($bbs_info->lpermi == "CM") echo "selected"; ?>>ȸ��
                                                            <option value="ZM" <? if($bbs_info->lpermi == "ZM" || $bbs_info->lpermi == "") echo "selected"; ?>>��ȸ��
                                                            </select>&nbsp; 
                                                          </td>
                                                          <td align="center">
                                                            <select name="rpermi">
                                                            <option value="AM" <? if($bbs_info->rpermi == "AM") echo "selected"; ?>>��ü������
                                                            <option value="BM" <? if($bbs_info->rpermi == "BM") echo "selected"; ?>>���ȸ��
                                                            <option value="CM" <? if($bbs_info->rpermi == "CM") echo "selected"; ?>>ȸ��
                                                            <option value="ZM" <? if($bbs_info->rpermi == "ZM" || $bbs_info->rpermi == "") echo "selected"; ?>>��ȸ��
                                                            </select>&nbsp; 
                                                          </td>
                                                          <td align="center">
                                                            <select name="wpermi">
                                                            <option value="AM" <? if($bbs_info->wpermi == "AM") echo "selected"; ?>>��ü������
                                                            <option value="BM" <? if($bbs_info->wpermi == "BM") echo "selected"; ?>>���ȸ��
                                                            <option value="CM" <? if($bbs_info->wpermi == "CM") echo "selected"; ?>>ȸ��
                                                            <option value="ZM" <? if($bbs_info->wpermi == "ZM" || $bbs_info->wpermi == "") echo "selected"; ?>>��ȸ��
                                                            </select>
                                                          </td>
                                                          <td align="center">
                                                            <select name="apermi">
                                                            <option value="AM" <? if($bbs_info->apermi == "AM") echo "selected"; ?>>��ü������
                                                            <option value="BM" <? if($bbs_info->apermi == "BM") echo "selected"; ?>>���ȸ��
                                                            <option value="CM" <? if($bbs_info->apermi == "CM") echo "selected"; ?>>ȸ��
                                                            <option value="ZM" <? if($bbs_info->apermi == "ZM" || $bbs_info->cpermi == "") echo "selected"; ?>>��ȸ��
                                                            </select>
                                                          </td>
                                                          <td align="center">
                                                            <select name="cpermi">
                                                            <option value="AM" <? if($bbs_info->cpermi == "AM") echo "selected"; ?>>��ü������
                                                            <option value="BM" <? if($bbs_info->cpermi == "BM") echo "selected"; ?>>���ȸ��
                                                            <option value="CM" <? if($bbs_info->cpermi == "CM") echo "selected"; ?>>ȸ��
                                                            <option value="ZM" <? if($bbs_info->cpermi == "ZM" || $bbs_info->cpermi == "") echo "selected"; ?>>��ȸ��
                                                            </select>
                                                          </td>
                                                        </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ڵ� ��б�</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="checkbox" name="privacy" value="Y" <? if($bbs_info->privacy == "Y") echo "checked"; ?>>�ۼ��ڿ� ��ڸ� ��������
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� ���Ͼ˸�</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="remail" value="Y" <? if($bbs_info->remail == "Y") echo "checked"; ?>>�����
                                                      <input type="radio" name="remail" value="N" <? if($bbs_info->remail == "N" || empty($bbs_info->remail)) echo "checked"; ?>>������
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Ͼ��ε�</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="upfile" value="Y" <? if($bbs_info->upfile == "Y" || empty($bbs_info->upfile)) echo "checked"; ?>>�����
                                                      <input type="radio" name="upfile" value="N" <? if($bbs_info->upfile == "N") echo "checked"; ?>>������
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ڸ�Ʈ ���</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="comment" value="Y" <? if($bbs_info->comment == "Y") echo "checked"; ?>>�����
                                                      <input type="radio" name="comment" value="N" <? if($bbs_info->comment == "N" || empty($bbs_info->comment)) echo "checked"; ?>>������
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������¼�</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="rows" type="text" value="<? if($bbs_info->rows == "") echo "20"; else echo $bbs_info->rows; ?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����Ʈ��¼�</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="lists" type="text" value="<? if($bbs_info->lists == "") echo "5"; else echo $bbs_info->lists; ?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;new �Ⱓ����</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="new" type="text" value="<? if($bbs_info->new == "") echo "2"; else echo $bbs_info->new; ?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hot ��ȸ������</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="hot" type="text" value="<? if($bbs_info->hot == "") echo "300"; else echo $bbs_info->hot; ?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�弳,����<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���͸�</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <input type="checkbox" name="abuse" value="Y" <? if($bbs_info->abuse == "Y") echo "checked"; ?>>����� &nbsp; (������� �ܾ �Է��Ͻð�, �ܾ�� �ܾ���̿��� �޸�(,)�� �����ϼ���.)<br>
                                                      <textarea name="abtxt" rows="3" cols="80" class="textarea"><?=$bbs_info->abtxt?></textarea></td>
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
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>����</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                              - �������� �ݵ�� �������� �ۼ��ϰ� ������ �Ұ��մϴ�.<br>
                                              - ���Ѽ����� �� ��Ȳ�� ȸ���з������� ���ٱ����� �����մϴ�.<br>
                                              - �弳,���� ������ ���Ͽ� �� �ۼ��� �弳 ������ ������ �� �ֽ��ϴ�.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" �� �� " onclick="document.location='bbs_pro_list.php';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" �� �� " onClick="document.location='bbs_pro_list.php';"></td>
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