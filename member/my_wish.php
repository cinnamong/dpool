<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/login_check.inc";	// �α��� üũ
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; <b>���ǰ��ɻ�ǰ</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ
include "../inc/mem_info.inc"; 		// ȸ�� ����

?>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_o_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
					<? include "my_view.inc"; ?>

					</td></tr>

					<!--���ɻ�ǰ����Ʈ-->
					<?
					
					// ���ļ���
               if(empty($orderby))
                  $order_sql = "order by ww.wdate desc";
               else
                  $order_sql = "order by $orderby";
                  
					$sql = "select wp.prdcode, wp.prdname, wp.sellprice, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.sale, wp.shortage, wp.stock, wp.conprice from wiz_wishlist ww, wiz_product wp where ww.memid = '$wiz_session[id]' and ww.prdcode = wp.prdcode";
               $result = mysql_query($sql) or error(mysql_error());
               $total = mysql_num_rows($result);
               
               $no = 0;
               $rows = 10;
               $lists = 5;
               $page_count = ceil($total/$rows);
               if(!$page || $page > $page_count) $page = 1;
               $start = ($page-1)*$rows;
               if($start>1) mysql_data_seek($result,$start);
				            
				   ?>
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m01_02.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<form action="<?=$PHP_SELF?>" method="get">
							<tr><td colspan=7 bgcolor=#939393 height=3></td></tr>
							<tr><td background="../img/shop_nomal_bar.gif" height=33>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td>���� ���ɻ�ǰ�� <font color=red><?=$total?>��</font> �Դϴ�.</td>
										<td align=right style="padding:0 10 0 0">
										<select name="orderby" onChange="this.form.submit();">
								      <option value="">��ǰ���Ĺ��</option>
								      <option value="viewcnt desc" <? if($orderby == "viewcnt desc") echo "selected"; ?>>��ȸ�� ��</option>
								      <option value="prdcode desc" <? if($orderby == "prdcode desc") echo "selected"; ?>>�ֱٵ�ϼ� ��</option>
								      <option value="sellprice asc" <? if($orderby == "sellprice asc") echo "selected"; ?>>�������� ��</option>
								      <option value="sellprice desc" <? if($orderby == "sellprice desc") echo "selected"; ?>>�ְ��� ��</option>
								      </select>
										</td></tr>
									</table>
							</td></tr>
							</form>
							<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td style="padding:15 5 15 5" colspan=7>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<?
				               while(($row = mysql_fetch_object($result)) && $rows){
				               	if($no%5==0){
				            			if($no == 0) echo "<tr>";
				            			else echo "<tr><td height='1' background='/images/dot.gif' colspan='10'></td></tr>";
				            		}
				               ?>
									<td valign=top>
										<table width=120 border=0 cellpadding=0 cellspacing=0>
										<tr><td align=center><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&page=<?=$page?>"><img src="/prdimg/<?=$row->prdimg_R?>" border="0"></a></td></tr>
										<tr><td align=center><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&page=<?=$page?>"><?=$row->prdname?></a></td></tr>
										<tr><td align=center class="price"><?=number_format($row->sellprice)?>��</td></tr>
										</table>
									</td>
									<?
				                  $no++;
				                  $rows--;
				               }
				            
				               if($total <= 0){
					            ?>
					            <tr><td align=center><img src="/images/no_icon.gif" align=absmiddle> ���ɻ�ǰ ����Ʈ�� ����ֽ��ϴ�.</td></tr>
					            <?
					         	}
					         	?>
									</table>
							</td></tr>
							<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td colspan=7 bgcolor=#dddddd height=1></td></tr>
							</table>
					</td></tr>
					<tr>
					  <td align=center height=50>
						
					  <? print_pagelist($page, $lists, $page_count, ""); ?>
					  
					  </td>
					</tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>