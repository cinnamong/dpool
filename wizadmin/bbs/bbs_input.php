<? include "../../inc/global.inc"; ?>
<? include "../../inc/bbs_info.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

if($mode == "insert" || $mode == ""){

   $bbs_row->name = $wizadmin_session[shop_name];
   $bbs_row->email = $wizadmin_session[oper_email];
   $mode = "insert";
   
}else if($mode == "update"){
	
	$sql = "select * from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_object($result);
	
}else if($mode == "reply"){
	
	$sql = "select subject, content, privacy from wiz_bbs where code = '$code' and idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_object($result);
	
	$bbs_row->name = $wizadmin_session[shop_name];
	$bbs_row->passwd = $wizadmin_session[shop_pw];
   $bbs_row->email = $wizadmin_session[shop_email];
	$bbs_row->content = $bbs_row->content."\n\n==================== �� �� ====================\n";
	
}
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){

  if(frm.name.value == ""){
    alert("�̸��� �Է��ϼ���.");
    frm.name.focus();
    return false;
  }
  if(frm.passwd.value == ""){
    alert("��й�ȣ�� �Է��ϼ���.");
    frm.passwd.focus();
    return false;
  }
  if(frm.subject.value == ""){
    alert("������ �Է��ϼ���.");
    frm.subject.focus();
    return false;
  }
  if(frm.content.value == ""){
    alert("������ �Է��ϼ���.");
    iView.focus();
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
                                          $nowposi = "Ŀ�´�Ƽ���� &gt; <strong>�Խù�����</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�Խù�����</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                          <form action="bbs_list.php" method="post">
                                            <tr>
                                              <td width="80"><b>���ðԽ��� :</b></td>
                                              <td>
                                              <select name="code" onChange="this.form.submit();">
								                      <?
								                        $sql = "select code, title from wiz_bbsinfo";
								                        $result = mysql_query($sql) or error(mysql_error());
								                        while($row = mysql_fetch_object($result)){
								                      ?>
								                        <option value="<?=$row->code?>" <? if($code == $row->code) echo "selected"; ?>>&nbsp; <?=$row->title?>&nbsp; 
								                      <?
								                        }
								                      ?>
								                      </select>
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </form>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="bbs_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
										            <input type="hidden" name="code" value="<?=$code?>">
										            <input type="hidden" name="mode" value="<?=$mode?>">
										            <input type="hidden" name="idx" value="<?=$idx?>">
										            <input type="hidden" name="page" value="<?=$page?>">
										            <input type="hidden" name="ctype" value="<?=$ctype ?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr>
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̸�</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3"><input name="name" type="text" value="<?=$bbs_row->name?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�̸���</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3"><input name="email" type="text" value="<?=$bbs_row->email?>" size="50" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��й�ȣ</td>
                                                    <td width="550" bgcolor="F8F8F8">
                                                      <input name="passwd" type="password" value="<?=$bbs_row->passwd?>" class="form1">
                                                      <input type="checkbox" name="privacy" value="Y" <? if($bbs_row->privacy == "Y") echo "checked"; ?>> ��б�
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                        <?
													                 if($bbs_info->grp != ""){
													                 	$catlist = explode(",",$bbs_info->grp);
													                 ?>
												                      <select name="grp">
												                      <option value="">grp
												                    <?
												                    for($ii=0;$ii<count($catlist);$ii++){
												                      if($bbs_row->grp == $catlist[$ii]) $selected = "selected";
												                      else $selected = "";
												                    ?>
												                      <option value="<?=$catlist[$ii]?>" <?=$selected?>><?=$catlist[$ii]?>
												                    <?
												                    }
												                    ?>
												                      </select>
													                 <?
													                 }
													                 ?>
                                                      <input name="subject" type="text" value="<?=$bbs_row->subject?>" size="60" class="form1">
                                                      <input type="checkbox" name="notice" value="Y" <? if($bbs_row->notice == "Y") echo "checked"; ?>> ������
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3"><textarea name="content" rows="16" cols="80" class="textarea"><?=$bbs_row->content?></textarea></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����÷��</td>
                                                    <td width="550" bgcolor="F8F8F8">
                                                    <input name="upfile" type="file" value="" class="form1">
                                                    <? if($bbs_row->upfile != "") echo "<a href='../../bbs/upfile/$code/$bbs_row->upfile' target='_blank'>$bbs_row->upfile_name</a> <a href='bbs_save.php?mode=delimg&code=$code&idx=$idx&file=upfile'><font color=red>[����]</font></a>"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����÷��2</td>
                                                    <td width="550" bgcolor="F8F8F8"><input name="upfile2" type="file" value="" class="form1">
                                                    <? if($bbs_row->upfile2 != "") echo "<a href='../../bbs/upfile/$code/$bbs_row->upfile2' target='_blank'>$bbs_row->upfile2_name</a> <a href='bbs_save.php?mode=delimg&code=$code&idx=$idx&file=upfile2'><font color=red>[����]</font></a>"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����÷��3</td>
                                                    <td width="550" bgcolor="F8F8F8"><input name="upfile3" type="file" value="" class="form1">
                                                    <? if($bbs_row->upfile3 != "") echo "<a href='../../bbs/upfile/$code/$bbs_row->upfile3' target='_blank'>$bbs_row->upfile3_name</a> <a href='bbs_save.php?mode=delimg&code=$code&idx=$idx&file=upfile3'><font color=red>[����]</font></a>"; ?>
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
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="300"><input type="button" value="��Ϻ���" onClick="document.location='bbs_list.php?code=<?=$code?>';" class="t"></td>
                                              <td width="60"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" �� �� " onClick="history.go(-1);"></td>
                                              <td width="300"></td>
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