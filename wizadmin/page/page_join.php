<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
$type = "join";
$sql = "select * from wiz_page where type='$type'";
$result = mysql_query($sql) or error(mysql_error());
$page_info = mysql_fetch_object($result);

// �Է����� ��뿩��
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// �Է����� �ʼ�����
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/util_lib.js"></script>
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
                                          $nowposi = "���������� &gt; <strong>ȸ������</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>ȸ������ </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="page_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="update">
                                          <input type="hidden" name="type" value="<?=$type?>">
                                          <input type="hidden" name="page" value="page_join.php">
                                          <textarea name="content" style="display:none" ><?=$page_info->content?></textarea>
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����̹���</td>
                                                   <td width="550" bgcolor="F8F8F8">
                                                    <?
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Է�����</td>
                                                   <td width="550" bgcolor="F8F8F8" align="center">
                                                     <table width="500" border="0" cellspacing="1" cellpadding="0">
                                                       <tr><td height="5"></td></tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25" width="100">&nbsp; ���̵�</td>
                                                         <td width="180">�����</td>
                                                         <td bgcolor="EAEAEA" width="100">&nbsp; ��й�ȣ</td>
                                                         <td width="180">�����</td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; �̸�</td>
                                                         <td>�����</td>
                                                         <td bgcolor="EAEAEA">&nbsp; �ֹι�ȣ</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="resno" <? if($info_use["resno"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="resno" <? if($info_ess["resno"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; �̸���</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="email" <? if($info_use["email"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="email" <? if($info_ess["email"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; �ּ�</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="address" <? if($info_use["address"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="address" <? if($info_ess["address"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; ��ȭ��ȣ</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="tphone" <? if($info_use["tphone"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="tphone" <? if($info_ess["tphone"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; �޴���</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="hphone" <? if($info_use["hphone"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="hphone" <? if($info_ess["hphone"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                       </tr>
                                                       <tr><td colspan="4" height="2"></td></tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; �������</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="birthday" <? if($info_use["birthday"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="birthday" <? if($info_ess["birthday"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; ���ɺо�</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="consph" <? if($info_use["consph"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="consph" <? if($info_ess["consph"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; ��ȥ����</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="marriage" <? if($info_use["marriage"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="marriage" <? if($info_ess["marriage"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                         <td bgcolor="EAEAEA">&nbsp; ��ȥ�����</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="memorial" <? if($info_use["memorial"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="memorial" <? if($info_ess["memorial"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                       </tr>
                                                       <tr>
                                                         <td bgcolor="EAEAEA" height="25">&nbsp; ����</td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="job" <? if($info_use["job"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="job" <? if($info_ess["job"]==true) echo "checked";?>>�ʼ��׸�</td>
                                                         <td bgcolor="EAEAEA">&nbsp; �з�
                                                         </td>
                                                         <td>
                                                           <input type="checkbox" name="info_use[]" value="scholarship" <? if($info_use["scholarship"]==true) echo "checked";?>>����� 
                                                           <input type="checkbox" name="info_ess[]" value="scholarship" <? if($info_ess["scholarship"]==true) echo "checked";?>>�ʼ��׸�
                                                         </td>
                                                       </tr>
                                                       <tr><td height="5"></td></tr>
                                                     </table>
                                                   </td>
                                                  </tr>
                                                  
                                                  <? $webedit_title = "���Ծ��"; $webedit_height=500; include "../webedit/webedit.inc"; ?>
  
                                                </table>
                                              </td>
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
                                                - ��ܿ� ��ġ�� �����͸� �̿��Ͽ� �̹��� ����, ��Ʈ ũ��,���� ��ġ �̵��� �����մϴ�.<br>
                                                - ���� �ҽ� ������ �Ͻǰ�� �ϴܿ� "html����" �� üũ�ϼ���.
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
                                              <td width="60" align="right"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="left"><input type="button" class="t" value=" �� �� " onClick="history.go(-1);"></td>
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
                            <td><img src="..../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>