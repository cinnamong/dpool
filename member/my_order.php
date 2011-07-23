<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/login_check.inc";	// 로그인 체크
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; 마이쇼핑 &gt; <b>주문/배송조회</b>";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치
include "../inc/mem_info.inc"; 		// 회원 정보

?>
<script language="JavaScript">
<!--
// 주문상세내역 보기
function orderView(orderid){
   var url = "/shop/order_view.php?orderid=" + orderid;
   window.open(url, "orderView", "height=640, width=736, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_o_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> 님의 마이쇼핑입니다.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
					<? include "my_view.inc"; ?>

					</td></tr>

					<!--구매내역-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m01_01.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td colspan=13 bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">주문일자</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">주문번호</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">결제금액</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">결제방법</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">배송상태</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">운송장번호</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">상세보기</td>
							</tr>
							<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
							<?
							$sql = "select * from wiz_order where send_id = '$wiz_session[id]' and status != '' order by order_date desc";
			            $result = mysql_query($sql) or error(mysql_error());
			            $total = mysql_num_rows($result);
			            
			            $rows = 12;
			            $lists = 5;
			            $page_count = ceil($total/$rows);
			            if(!$page || $page > $page_count) $page = 1;
			            $start = ($page-1)*$rows;
			            if($start>1) mysql_data_seek($result,$start);
			            
			            while(($row = mysql_fetch_object($result)) && $rows){
			            ?>
							<tr align=center height=28>
								<td><?=substr($row->order_date,0,10)?></td>
								<td></td>
								<td><?=$row->orderid?></td>
								<td></td>
								<td><?=number_format($row->total_price)?>원</td>
								<td></td>
								<td><?=pay_method($row->pay_method)?></td>
								<td></td>
								<td><?=order_status($row->status)?></td>
								<td></td>
								<td><?=$row->deliver_num?></td>
								<td></td>
								<td><a href="javascript:orderView('<?=$row->orderid?>');">보기</a></td></tr>
							<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
							<?
								$rows--;
							}
							
							if($total <= 0){
							?>
							<tr><td colspan=13 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> 현재 구매내역이 없습니다.</td></tr>
							<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
							<?
							}
							?>
							<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
							</table>
					</td></tr>
					<tr>
					  <td align=center height=50>
						
					  <? print_pagelist($page, $lists, $page_count, ""); ?>
					  
					  </td>
					</tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>