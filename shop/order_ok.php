<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����

// ��ٱ��� ����
if($pay_result == "00") setcookie("basketid", "", time()-3600);

$now_position = "<a href=/>Home</a> &gt; �ֹ��ϱ� &gt; <b>�ֹ��Ϸ�</b>";
$page_type = "ordercom";
include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ


// �ֹ�����
$sql = "select * from wiz_order where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);


// �ֹ��Ϸ� ����/sms�߼�
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
					  <tr><td align="center"><a href="javascript:orderView('<?=$orderid?>');"><b>����Ʈ�ϱ�</b></a></td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>