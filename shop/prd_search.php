<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; <b>상품검색</b>";
$page_type = "prdsearch";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치


?>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					  <tr><td align=center style="padding:10 0 10 0">
					      <table border=0 cellpadding=0 cellspacing=0 width=685>
					      <form name="frm" action="<?=$PHP_SELF?>" method="get">
                     <input type="hidden" name="page" value="<?=$page?>">
                     <input type="hidden" name="orderby" value="<?=$orderby?>">
							  <tr><td><img src="/images/search_bg01.gif"></td></tr>
							  <tr><td background="/images/search_bg02.gif" style="padding:13 0 0 7">
									<table border=0 cellpadding=3 cellspacing=0 width=100%>
									<tr><td align=center><img src="/images/search_pic.gif"></td>
										<td>
												<table border=0 cellpadding=1 cellspacing=0>
												<tr>
													<td colspan=2><img src="/images/search_t01.gif">
													<select name="catcode">
		                                 <option value="">:::::::::::: 상품 분류를 선택하세요 ::::::::::::</option>
			                              <?
			                                 $sql = "select catcode, catname from wiz_category where depthno = 1 and catuse != 'N' order by priorno01 asc";
			                                 $result = mysql_query($sql) or error(mysql_error());
			                                 while($row = mysql_fetch_object($result)){
			                              ?>
		                                 <option value="<?=$row->catcode?>" <? if($row->catcode == $catcode) echo "selected"; ?>><?=$row->catname?></option>
			                              <?
			                                 }
			                              ?>
		                                 </select>
												  </td>
												</tr>
												<tr>
												  <td width=55%>
													 <img src="/images/search_t02.gif" align=absmiddle>&nbsp;<input type=text name="prdname" value="<?=$prdname?>" style="height:17px; width:120px" class="input"></td>
												  <td>
												    <img src="/images/search_t04.gif" align=absmiddle>
													 <input type=text name="sellprice" value="<?=$sellprice?>" style="height:17px; width:50px" class="input"> ~ 
													 <input type=text name="sellprice2" value="<?=$sellprice2?>" style="height:17px; width:50px" class="input">
												  </td>
												</tr>
												<tr><td><img src="/images/search_t03.gif" align=absmiddle>&nbsp;<input type=text name="prdcom" value="<?=$prdcom?>" style="height:17px; width:120px" class="input"></td>
													<td><img src="/images/search_t05.gif" align=absmiddle>
													  <input type=text name="reserve" value="<?=$reserve?>" style="height:17px; width:50px" class="input"> ~ 
													  <input type=text name="reserve2" value="<?=$reserve2?>" style="height:17px; width:50px" class="input">
													</td>
												</tr>
											</table>
										</td>
										<td width=100><input type="image" src="/images/search_btn.gif" border=0></a></td></tr>
									</table>
							    </td>
							  </tr>
							  <tr><td background="/images/search_bg03.gif" height=17></td></tr>
							</table>
							
							
							<?
		               $code01 = substr($catcode,0,2);
		               if(empty($code01)) $catcode_sql = "";
		               else $catcode_sql = " wc.catcode like '$code01%' and ";
		               
		               if(empty($production)) $production_sql = "";
		               else $production_sql = " wp.production like '%$production%' and ";
		               
		               if(empty($prdname)) $prdname_sql = "";
		               else $prdname_sql = " wp.prdname like '%$prdname%' and ";
		               
		               if(empty($sellprice)) $sellprice_sql = "";
		               else $sellprice_sql = " wp.sellprice >= $sellprice  and ";
		               if(empty($sellprice2)) $sellprice_sql2 = "";
		               else $sellprice_sql2 = " wp.sellprice <= $sellprice2  and ";
		               
		               if(empty($reserve)) $reserve_sql = "";
		               else $reserve_sql = " wp.reserve >= '$reserve'  and ";
		               if(empty($reserve2)) $reserve_sql2 = "";
		               else $reserve_sql2 = " wp.reserve <= '$reserve2'  and ";
		               
		               if(empty($orderby)) $order_by = "order by wp.prior desc";
		               else $order_by = "order by $orderby";
		               
		               $sql = "select distinct wp.prdcode, wp.prdname, wp.stortexp, wp.prdcom, wp.sellprice, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.sale, wp.shortage, wp.stock, wp.conprice  from wiz_cprelation wc, wiz_product wp 
		                                 where $catcode_sql $production_sql $prdname_sql $sellprice_sql $sellprice_sql2 $reserve_sql $reserve_sql2 wc.prdcode = wp.prdcode and wp.showset != 'N' $order_by";
		               $result = mysql_query($sql) or error(mysql_error());
		               $total = mysql_num_rows($result);
							
							$no = 0;
		               if($prdnum == "" || $prdnum <= 0) $prdnum = 16;
		               $rows = $prdnum;
		 	            $lists = 5;
		             	$page_count = ceil($total/$rows);
		             	if(!$page || $page > $page_count) $page = 1;
		             	$start = ($page-1)*$rows;
		             	if($start>1) mysql_data_seek($result,$start);
		            	?>
		            	
		               <table border=0 cellpadding=0 cellspacing=0 width=685>
							<tr>
							  <td>
							    <table border=0 cellpadding=0 cellspacing=0 align=center width=692>
								  <tr><td><img src="/images/shop_title_search.gif"></td></tr>
								  <tr><td background="/images/shop_nomal_bar.gif" height=33>
								    <table border=0 cellpadding=0 cellspacing=0 width=100%>
									   <tr>
									     <td>ㆍ현재 등록된 상품은 <font color=red><?=$total?>개</font> 입니다.</td>
										  <td align=right style="padding:0 10 0 0">
										  <select name="orderby" onChange="this.form.submit();">
										  <option value="">상품정렬방식</option>
										  <option value="viewcnt desc" <? if($orderby == "viewcnt desc") echo "selected"; ?>>조회수 순</option>
										  <option value="prdcode desc" <? if($orderby == "prdcode desc") echo "selected"; ?>>최근등록순 순</option>
										  <option value="sellprice asc" <? if($orderby == "sellprice asc") echo "selected"; ?>>최저가격 순</option>
										  <option value="sellprice desc" <? if($orderby == "sellprice desc") echo "selected"; ?>>최고가격 순</option>
										  </select>
										  </td>
										</tr>
									 </form>
									 </table>
									</td></tr>
								 </table>
							  </td>
							</tr>
							</table>
							
							
							<table border=0 cellpadding=0 cellspacing=0 width=700>
							<tr>
							  <td width=4></td>
							  <td width=692>
							    <table border=0 cellpadding=0 cellspacing=0 width=692>
							      <?
					             	while(($row = mysql_fetch_object($result)) && $rows){
					             		$sp_img = "";
					             		if($row->popular == "Y") $sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
								         if($row->recom == "Y") $sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
								         if($row->new == "Y") $sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
								         if($row->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; $sellprice = "<s>".number_format($row->conprice)." 원</s> → "; }
								         if($row->shortage == "Y" || $row->stock <= 0) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";
		
					            		if($no%4==0){
					            			if($no == 0) echo "<tr>";
					            			else echo "<tr><td height='1' background='/images/dot.gif' colspan='10'></td></tr>";
					            		}
					            ?>
					             <td width=6></td>
								    <td style="padding:15 5 15 5" valign=top>
										<table border=0 cellpadding=0 cellspacing=0 align=center>
										<tr>
										  <td valign=top>
											<table width=120 border=0 cellpadding=0 cellspacing=0>
											<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&page=<?=$page?>"><img src="/prdimg/<?=$row->prdimg_R?>" border="0"></a></td></tr>
											<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&page=<?=$page?>"><?=$row->prdname?></a></td></tr>
											<tr><td align=center><?=$sp_img?></td></tr>
											<tr><td align=center class="price"><?=number_format($row->sellprice)?>원</td></tr>
											</table>
										  </td>
										</tr>
										</table>
								    </td>
								   <?
								   		$no++;
								   		$rows--;
										}
										
										if($total <= 0) echo "<tr><td align=center height=50>등록된 상품이 없습니다.</td></tr>";
									?>
		
									</table>
								  </td>
								  <td width=4></td>
							  </tr>
							</table>
		               
							<? print_pagelist($page, $lists, $page_count, "&catcode=$catcode&group=$group&orderby=$orderby"); ?>
							
							
					  </td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>