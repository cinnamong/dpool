<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
$param = "group=$group&searchopt=$searchopt&keyword=$keyword";
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
                                          $nowposi = "�����ð��� &gt; <strong>��ǰ������� </strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>��ǰ�������  </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form name="frm" action="<?=$PHP_SELF?>" method="get">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="80">&nbsp; <font color="2369C9"><b>��ǰ�׷�</b></font></td>
                                              <td width="200">
                                                <select name="group">
                                                <option value="">:: �з����� ::
                                                <option value="new" <? if($group == "new") echo "selected"; ?>>�Ż�ǰ
                                                <option value="popular" <? if($group == "popular") echo "selected"; ?>>�α��ǰ
                                                <option value="recom" <? if($group == "recom") echo "selected"; ?>>��õ��ǰ
                                                <option value="sale" <? if($group == "sale") echo "selected"; ?>>���ϻ�ǰ
                                                <option value="stock" <? if($group == "stock") echo "selected"; ?>>ǰ����ǰ
                                                </select>
                                              </td>
                                              <td width="60">&nbsp; <font color="2369C9"><b>����</b></font></td>
                                              <td>
                                                <select name="searchopt">
                                                <option value="">:: ���Ǽ��� ::
                                                <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
                                                <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
                                                </select>
                                              </td>
                                              <td><input type="text" name="keyword" value="<?=$keyword?>" class="form1"></td>
                                              <td><input type="submit" value="�˻�" class="t"></td>
                                              </table>
                                              </td>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center" bgcolor="E9E7E7"> 
                                              <td width="50" height="30">No</td>
                                              <td width="220">��ǰ��</td>
                                              <?
                                              if($orderkey == "viewcnt"){
                                              	
                                              	if($orderby == "asc" || $orderby == "") $view_orderby = "desc";
                                              	else $view_orderby = "asc";
                                              	$deimg_orderby = "desc";
                                              	$sale_orderby = "desc";
                                              	
                                              }else if($orderkey == "deimgcnt"){
                                              	
                                              	if($orderby == "asc" || $orderby == "") $deimg_orderby = "desc";
                                              	else $deimg_orderby = "asc";
                                              	$view_orderby = "desc";
                                              	$sale_orderby = "desc";
                                              	
                                              }else{
                                              
                                              	if($orderby == "asc" || $orderby == "") $sale_orderby = "desc";
                                              	else $sale_orderby = "asc";
                                              	$deimg_orderby = "desc";
                                              	$view_orderby = "desc";
                                              	
                                              }
                                              ?>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=viewcnt&orderby=<?=$view_orderby?>&<?=$param?>" class="3"><? if($view_orderby == "desc") echo "��"; else echo "��"; ?> �󼼺���</a></td>
                                              <td width="80"><a href="<?=$PHP_SELF?>?orderkey=deimgcnt&orderby=<?=$deimg_orderby?>&<?=$param?>" class="3"><? if($deimg_orderby == "desc") echo "��"; else echo "��"; ?> ���̹���</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=basketcnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "��"; else echo "��"; ?> ��ٱ���</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=ordercnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "��"; else echo "��"; ?> �ֹ���</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=cancelcnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "��"; else echo "��"; ?> �ֹ����</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=comcnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "��"; else echo "��"; ?> ��ۿϷ�</a></td>                                            
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
                                          
                                          	// ��ǰ�׷�
								                     if(!empty($group)) $group_sql = " and wp.$group = 'Y' ";
								                     
								                     // ���ǰ˻�
								                     if(!empty($searchopt)) $searchopt_sql = " and wp.$searchopt like '%$keyword%' ";
								                     
								                     // ���ļ���
								                     if(!empty($orderkey) && !empty($orderby)) $order_sql = " order by $orderkey $orderby, wp.prior desc";
								                     else $order_sql = " order by wp.prior desc";

															$sql = "select prdcode, prdname, prdimg_R, viewcnt, deimgcnt, basketcnt, ordercnt, cancelcnt, comcnt from wiz_product wp where prdcode != '' $group_sql $searchopt_sql $order_sql";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								
								       	            $rows = 12;
								       	            $lists = 5;
								                   	if(!$page) $page = 1;
								                   	$page_count = ceil($total/$rows);
								                   	$start = ($page-1)*$rows;
								                   	$no = $total-$start;
								                   	if($start>1) mysql_data_seek($result,$start);

															while(($row = mysql_fetch_object($result)) && $rows){
																if(($no%2) == 0) $bgcolor="#ffffff";
								                     	else $bgcolor="#F3F3F3";
																if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
																else $row->prdimg_R = "/prdimg/$row->prdimg_R";

															?>
															<tr bgcolor="<?=$bgcolor?>">
															  <td align="center" height="28"><?=$no?></td>
															  <td>&nbsp; <a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="_blank"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"><?=cut_str($row->prdname,15)?></a></td>
															  <td align="center"><?=$row->viewcnt?></td>
															  <td align="center"><?=$row->deimgcnt?></td>
															  <td align="center"><?=$row->basketcnt?></td>
															  <td align="center"><?=$row->ordercnt?></td>
															  <td align="center"><?=$row->cancelcnt?></td>
															  <td align="center"><?=$row->comcnt?></td>
															</tr>
															<?
															  $no--;
															  $rows--;
															}
															?>
															<tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
													   </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, "&orderkey=$orderkey&orderby=$orderby&$param"); ?>

                                          
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