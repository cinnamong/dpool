<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�

// �α��� ���� ������� �α��� �������� �̵�
if(empty($wiz_session[id]) && empty($order_guest)){
	echo "<script>document.location='/member/login.php?prev=$PHP_SELF&orderlist=true';</script>";
	exit;
}

include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����

$now_position = "<a href=/>Home</a> &gt; <b>�ֹ���ȸ.�����ȸ</b>";
$page_type = "basket";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
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
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ���ȣ</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ�����</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">�����ݾ�</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">�������</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">��ۻ���</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">������ȣ</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td width=100 background="/images/shop_nomal_bar.gif" align=center class="gray">�󼼺���</td>
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
								<td><?=number_format($row->total_price)?>��</td>
								<td></td>
								<td><?=pay_method($row->pay_method)?></td>
								<td></td>
								<td><?=order_status($row->status)?></td>
								<td></td>
								<td><?=$row->deliver_num?></td>
								<td></td>
								<td><a href="javascript:orderView('<?=$row->orderid?>');"><font color=red>[����]</font></a></td></tr>
							<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
							<?
								$rows--;
							}
							if($total <= 0){
								echo "<tr><td colspan=13 align=center height=50><img src=/images/no_icon.gif align=absmiddle>���ų����� �����ϴ�.</td></tr>";
								echo "<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>";
							}
							?>
							</table>
					</td></tr>
					<tr><td align=center height=250><img src="/images/order_step.gif"></td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>