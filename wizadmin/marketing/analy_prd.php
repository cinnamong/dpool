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
                                          $nowposi = "마케팅관리 &gt; <strong>상품보기통계 </strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>상품보기통계  </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form name="frm" action="<?=$PHP_SELF?>" method="get">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="80">&nbsp; <font color="2369C9"><b>상품그룹</b></font></td>
                                              <td width="200">
                                                <select name="group">
                                                <option value="">:: 분류선택 ::
                                                <option value="new" <? if($group == "new") echo "selected"; ?>>신상품
                                                <option value="popular" <? if($group == "popular") echo "selected"; ?>>인기상품
                                                <option value="recom" <? if($group == "recom") echo "selected"; ?>>추천상품
                                                <option value="sale" <? if($group == "sale") echo "selected"; ?>>세일상품
                                                <option value="stock" <? if($group == "stock") echo "selected"; ?>>품절상품
                                                </select>
                                              </td>
                                              <td width="60">&nbsp; <font color="2369C9"><b>조건</b></font></td>
                                              <td>
                                                <select name="searchopt">
                                                <option value="">:: 조건선택 ::
                                                <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>상품명
                                                <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>상품코드
                                                </select>
                                              </td>
                                              <td><input type="text" name="keyword" value="<?=$keyword?>" class="form1"></td>
                                              <td><input type="submit" value="검색" class="t"></td>
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
                                              <td width="220">상품명</td>
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
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=viewcnt&orderby=<?=$view_orderby?>&<?=$param?>" class="3"><? if($view_orderby == "desc") echo "▲"; else echo "▼"; ?> 상세보기</a></td>
                                              <td width="80"><a href="<?=$PHP_SELF?>?orderkey=deimgcnt&orderby=<?=$deimg_orderby?>&<?=$param?>" class="3"><? if($deimg_orderby == "desc") echo "▲"; else echo "▼"; ?> 상세이미지</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=basketcnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "▲"; else echo "▼"; ?> 장바구니</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=ordercnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "▲"; else echo "▼"; ?> 주문수</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=cancelcnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "▲"; else echo "▼"; ?> 주문취소</a></td>
                                              <td width="70"><a href="<?=$PHP_SELF?>?orderkey=comcnt&orderby=<?=$sale_orderby?>&<?=$param?>" class="3"><? if($sale_orderby == "desc") echo "▲"; else echo "▼"; ?> 배송완료</a></td>                                            
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
                                          
                                          	// 상품그룹
								                     if(!empty($group)) $group_sql = " and wp.$group = 'Y' ";
								                     
								                     // 조건검색
								                     if(!empty($searchopt)) $searchopt_sql = " and wp.$searchopt like '%$keyword%' ";
								                     
								                     // 정렬순서
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