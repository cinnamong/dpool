<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/oper_info.inc"; 		// 운영 정보

// 장바구니 비우기
if($pay_result == "00") setcookie("basketid", "", time()-3600);

$now_position = "<a href=/>Home</a> &gt; 주문하기 &gt; <b>주문완료</b>";
$page_type = "ordercom";
include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치


// 주문정보
$sql = "select * from wiz_order where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);


// 주문완료 메일/sms발송
include "./prd_ordmail.inc";
$re_info[name] = $order_info->send_name;
$re_info[email] = $order_info->send_email;
$re_info[hphone] = $order_info->send_hphone;
send_mailsms("order_com", $re_info, $ordmail)


?>
<script language="JavaScript">
<!--
function orderView(orderid){
   var url = "/shop/order_view.php?orderid=" + orderid;
   window.open(url, "orderView", "height=650, width=736, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					  <tr>
					    <td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=686>
							  <tr>
							    <td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom></td>
										<td align=right>
												<table border=0 cellpadding=0 cellspacing=0>
												<tr><td><img src="/images/cart_dir_01.gif"></td>
													<td><img src="/images/cart_dir_02.gif"></td>
													<td><img src="/images/cart_dir_03.gif"></td>
													<td><img src="/images/cart_dir_o_04.gif"></td></tr>
												</table>
										</td></tr>
									</table>
							    </td>
							  </tr>
							</table>
							
							<?=$ordmail?>
                     
					    </td>
					  </tr>
					  <tr><td align="center"><a href="javascript:orderView('<?=$orderid?>');"><b>프린트하기</b></a></td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>