<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function deleteBbs(code){
   if(confirm('������ �Խ����� �����Ͻðڽ��ϱ�?\n\n������ ����Ÿ�� �����Ҽ� �����ϴ�.')){
      document.location = 'bbs_pro_save.php?mode=delete&code=' + code;
   }
}
//-->
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
                                          $nowposi = "Ŀ�´�Ƽ���� &gt; <strong>�Խ��ǰ���</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�Խ��Ǹ��</strong></td>
                                            </tr>
                                          </table>
                                          <?
                                          	$sql = "select * from wiz_bbsinfo";
									                  $result = mysql_query($sql) or error(mysql_error());
									                  $total = mysql_num_rows($result);

									                  $rows = 20;
									    	            $lists = 5;
									                	$page_count = ceil($total/$rows);
									                	if(!$page || $page > $page_count) $page = 1;
									                	$start = ($page-1)*$rows;
									                	$no = $total-$start;
									                	if($start>1) mysql_data_seek($result,$start);
								                  ?>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td>�� �Խ��Ǽ� : <b><?=$total?></b></td>
                                              <td align="right"><input type="submit" class="t" value="�Խ����߰�" onClick="document.location='bbs_pro_input.php?mode=insert';"></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="50" height="30" bgcolor="E9E7E7" align="center">��ȣ</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">������</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">�Խ��Ǹ�</td>
                                              <td width="70" bgcolor="E9E7E7" align="center">���</td>
                                              <td width="70" bgcolor="E9E7E7" align="center">�Խ���Ÿ��</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">��Ϻ���</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">�б�</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">����</td>
                                              <td width="200" bgcolor="E9E7E7" align="center">���</td>
                                            </tr>
                                            <tr><td colspan="20" bgcolor="DEDEDE"></td></tr>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															if($rows%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
														?>
														  <tr bgcolor="<?=$bgcolor?>"> 
                                              <td height="30" align="center"><?=$no?></td>
                                              <td align="center"><?=$row->code?></td>
                                              <td align="center"><?=$row->title?></td>
                                              <td align="center"><? if($row->usetype == "Y") echo "�����"; else echo "������"; ?></td>
                                              <td align="center"><? if($row->bbstype == "BBS") echo "�Խ���"; else echo "���䰶����"; ?></td>
                                              <td align="center"><?=user_level($row->lpermi)?></td>
                                              <td align="center"><?=user_level($row->rpermi)?></td>
                                              <td align="center"><?=user_level($row->wpermi)?></td>
                                              <td align="center">
                                              <input type="button" value="�Խù�����" class="xbtn" onClick="document.location='bbs_list.php?code=<?=$row->code?>'">
                                              <input type="button" value="����" class="xbtn" onClick="document.location='bbs_pro_input.php?mode=update&code=<?=$row->code?>'">
                                              <input type="button" value="����" class="xbtn" onClick="deleteBbs('<?=$row->code?>');">
                                              </td>
                                            </tr>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                                          
							                   	if($total <= 0){
							                   	   echo "<tr><td colspan=20 bgcolor=DEDEDE></td></tr>";
							                   		echo "<tr><td height='30' colspan=8 align=center>��ϵ� �Խ����� �����ϴ�.</td></tr>";
							                   		echo "<tr><td colspan=20 bgcolor=DEDEDE></td></tr>";
							                   	}
								                  ?>
                                            <tr><td colspan="9" bgcolor="DEDEDE"></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td align="center"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
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