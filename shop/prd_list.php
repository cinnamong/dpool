<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/cat_info.inc"; 		// 카테고리정보

include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치
include "./prd_category.inc";			// 카테고리
include "./prd_recom.inc";				// 추천상품


?>

					<?

					// 정렬순서
               if(empty($orderby))
                  $order_sql = "order by wp.prior desc, prdcode desc";
               else
                  $order_sql = "order by $orderby";
               
               // 카테고리별 찾기
               if(!empty($catcode)){
	               $catcode01 = substr($catcode,0,2);
	               $catcode02 = substr($catcode,2,2);
	               $catcode03 = substr($catcode,4,2);
	               if($catcode01 == "00") $catcode01 = "";
	               if($catcode02 == "00") $catcode02 = "";
	               if($catcode03 == "00") $catcode03 = "";
	               $tmpcode = $catcode01.$catcode02.$catcode03;
               	$catcode_sql = " wc.catcode like '$tmpcode%' and ";
               }
               
               // 상품그룹별 찾기 (신상품,추천상품,세일상품,인기상품)
               if(!empty($grp)){
               	$grp_sql = " wp.$grp = 'Y' and ";
               }
               
               $sql = "select wp.prdcode, wp.prdname, wp.stortexp, wp.prdcom, wp.reserve, wp.sellprice, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.sale, wp.shortage, wp.stock, wp.conprice from wiz_cprelation wc, wiz_product wp where $catcode_sql $grp_sql wc.prdcode = wp.prdcode and wp.showset != 'N' $order_sql";
               $result = mysql_query($sql) or error(mysql_error());
               $total = mysql_num_rows($result);
					
					$no = 0;
					
					if($cat_info->prd_width == "") $cat_info->prd_width = "130";
					if($cat_info->prd_height == "") $cat_info->prd_height = "130";
					
               if($cat_info->prd_num == "" || $cat_info->prd_num <= 0) $cat_info->prd_num = 16;
               $rows = $cat_info->prd_num;
 	            $lists = 5;
             	$page_count = ceil($total/$rows);
             	if(!$page || $page > $page_count) $page = 1;
             	$start = ($page-1)*$rows;
             	if($start>1) mysql_data_seek($result,$start);
            	?>
            	
               <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align="center">
					  
					  
					    <table border=0 cellpadding=0 cellspacing=0 width=692>
						  <tr><td><img src="/images/shop_title_list.gif"></td></tr>
						  <tr><td><img src="/images/shop_title_bar.gif"></td></tr>
						  <tr><td background="/images/shop_nomal_bar.gif" height=33>
						    <table border=0 cellpadding=0 cellspacing=0 width=100%>
						    <form action="<?=$PHP_SELF?>" method="get">
						    <input type="hidden" name="catcode" value="<?=$catcode?>">
						    <input type="hidden" name="grp" value="<?=$grp?>">
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
									<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&page=<?=$page?>"><img src="/prdimg/<?=$row->prdimg_R?>" border="0" width="<?=$cat_info->prd_width?>" height="<?=$cat_info->prd_height?>"></a></td></tr>
									<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&page=<?=$page?>"><?=cut_str($row->prdname,30)?></a></td></tr>
									<tr><td align=center><?=$sp_img?></td></tr>
									<tr><td align=center class="price"><?=number_format($row->sellprice)?>원</td></tr>
									</table>
								  </td>
								</tr>
								</table>
						    </td>
						   <?
						   		$rows--;
						   		$no++;
								}
								
								if($total <= 0) echo "<tr><td align=center height=50>등록된 상품이 없습니다.</td></tr>";
							?>
							</table>

							<? print_pagelist($page, $lists, $page_count, "&catcode=$catcode&grp=$grp&orderby=$orderby"); ?>
					    
					    </td>
					  </tr>
					</table>			


<?

include "../inc/footer.inc"; 		// 하단디자인

?>