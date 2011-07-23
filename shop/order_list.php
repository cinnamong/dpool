<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악

// 로그인 하지 않은경우 로그인 페이지로 이동
if(empty($wiz_session[id]) && empty($order_guest)){
	echo "<script>document.location='/member/login.php?prev=$PHP_SELF&orderlist=true';</script>";
	exit;
}

include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/oper_info.inc"; 		// 운영 정보

$now_position = "<a href=/>Home</a> &gt; <b>주문조회.배송조회</b>";
$page_type = "basket";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

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
					  <tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td colspan=13 style="padding:10 0 0 5"><img src="/images/myshop_m01_01.gif"></td></tr>
							<tr><td colspan=13 bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">주문번호</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">주문일자</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">결제금액</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">결제방법</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">배송상태</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">운송장번호</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">상세보기</td>
							</tr>
							<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
							<?
			            if($wiz_session[id] != ""){
			               $sql = "select * from wiz_order where send_id = '$wiz_session[id]' and status != '' order by order_date desc";
			            }else{
			               $sql = "select * from wiz_order where orderid = '$orderid' and send_name = '$send_name' and status != '' order by order_date desc";
			            }
			            
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
								<td><?=$row->orderid?></td>
								<td></td>
								<td><?=substr($row->order_date,0,10)?></td>
								<td></td>
								<td><?=number_format($row->total_price)?>원</td>
								<td></td>
								<td><?=pay_method($row->pay_method)?></td>
								<td></td>
								<td><?=order_status($row->status)?></td>
								<td></td>
								<td><?=$row->deliver_num?></td>
								<td></td>
								<td><a href="javascript:orderView('<?=$row->orderid?>');"><font color=red>[보기]</font></a></td></tr>
							<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
							<?
								$rows--;
							}
							if($total <= 0){
								echo "<tr><td colspan=13 align=center height=50><img src=/images/no_icon.gif align=absmiddle>구매내역이 없습니다.</td></tr>";
								echo "<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>";
							}
							?>
							</table>
					</td></tr>
					<tr><td align=center height=250><img src="/images/order_step.gif"></td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>