<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>


                        <script language="JavaScript" type="text/javascript">
								<!--
								function delContent(idx, ban_img){
								   if(confirm('�ش��ʸ� �����Ͻðڽ��ϱ�?')){
								      document.location = "dsn_save.php?mode=ban_delete&idx=" + idx + "&ban_img=" + ban_img;
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
                                          $nowposi = "�����ΰ��� &gt; <strong>��ʰ���</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>��ʸ�� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="10%" height="30" bgcolor="E9E7E7">��ġ</td>
                                              <td width="20%" bgcolor="E9E7E7">�̹���</td>
                                              <td width="20%" bgcolor="E9E7E7">��ũ�ּ�</td>
                                              <td width="15%" bgcolor="E9E7E7">�켱����</td>
                                              <td width="15%" bgcolor="E9E7E7">��뿩��</td>
                                              <td width="15%" bgcolor="E9E7E7">���</td>
                                            </tr>
                                            <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          $sql = "select * from wiz_banner order by align desc, prior asc, idx desc";
                                          $result = mysql_query($sql) or error(mysql_error());
							                     $total = mysql_num_rows($result);
							
							       	            $rows = 12;
							       	            $lists = 5;
							                   	$page_count = ceil($total/$rows);
							                   	if($page < 1 || $page > $page_count) $page = 1;
							                   	$start = ($page-1)*$rows;
							                   	$no = $total-$start;
							                   	if($start>1) mysql_data_seek($result,$start);
							                   	
							                     while(($row = mysql_fetch_object($result)) && $rows){
							                     	if(($no%2) == 1) $bgcolor="#F3F3F3";
							                     	else $bgcolor="#ffffff";
							                     	
							                     	if($row->align == "L") $row->align = "����";
							                        else $row->align = "����";
							                        
							                        if($row->isuse == "N") $row->isuse = "������";
							                        else $row->isuse = "�����";
							                        
                                          ?>
                                            <tr align="center" bgcolor="<?=$bgcolor?>"> 
                                              <td height="30" align="center"><?=$row->align?></td>
                                              <td>
                                              <?
                                              if($row->de_type == "IMG") echo "<img src=/images/banner/$row->de_img>";
                                              else echo "<table><tr><td>$row->de_html</td></tr></table>";
                                              ?>
                                              </td>
                                              <td><?=$row->link_url?></td>
                                              <td><?=$row->prior?></td>
                                              <td><?=$row->isuse?></td>
                                              <td>
                                                <input name="Button3" type="button" class="xbtn" value="����" onclick="document.location='dsn_banner_input.php?mode=ban_update&idx=<?=$row->idx?>'">
                                                <input name="Button3" type="button" class="xbtn" value="����" onclick="delContent('<?=$row->idx?>','<?=$row->de_img?>');">
                                              </td>
                                            </tr>
                                          <?
                                          		$no--;
								                        $rows--;
								                    }
								                    
								                    if($total <= 0){
								                    	echo "<tr><td colspan='7' align='center' height='30'>�ۼ��� ��ʰ� �����ϴ�.</td></tr>";
								                    }
                                            
								                  ?>
								                    <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
								                  </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, ""); ?>
                                          
                                          <table width="97%" height="175" border="0" cellpadding="0" cellspacing="0">
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