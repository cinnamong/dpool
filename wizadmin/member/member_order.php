<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: <?=$name?>(<?=$id?>) ���� �ֹ����� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function orderView(orderid){
   var url = "/shop/order_view.php?orderid=" + orderid;
   window.open(url, "orderView", "height=640, width=671, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan=5>
      <font color="ffffff"><b>:: <?=$name?>(<?=$id?>) ���� �ֹ����� ::</b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"><input type="button" value="�� ��" onClick="self.close();" class="t"> &nbsp; </td>
  </tr>
  <tr><td height=1 colspan=3></td></tr>
  <tr bgcolor=f0f0f0 align=center>
    <td height=23><b>�ֹ�����</b></td>
    <td><b>�ֹ���ȣ</b></td>
    <td><b>�����ݾ�</b></td>
    <td><b>�������</b></td>
    <td><b>��ۻ���</b></td>
    <td><b>������ȣ</b></td>
    <td><b>�󼼺���</b></td>
  </tr>
<?
	$sql = "select * from wiz_order where send_id = '$id' and status != '' order by order_date desc";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	
	$rows = 12;
	$lists = 5;
	if(!$page) $page = 1;
	$page_count = ceil($total/$rows);
	$start = ($page-1)*$rows;
	if($start>1) mysql_data_seek($result,$start);
	
	while(($row = mysql_fetch_object($result)) && $rows){
?>
  <tr bgcolor=ffffff align=center>
    <td height="30"><?=substr($row->order_date,0,10)?></td>
    <td><?=$row->orderid?></td>
    <td><?=number_format($row->total_price)?> ��</td>
    <td><?=pay_method($row->pay_method)?></td>
    <td><?=order_status($row->status)?></td>
    <td><?=$row->deliver_num?></td>
    <td><a href="javascript:orderView('<?=$row->orderid?>');">����</a></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=7></td></tr>
<?
		$rows--;
}
	if($total <= 0){
?>
  <tr bgcolor=ffffff align=center>
    <td height="35" colspan="7"><b>���ų����� �����ϴ�.</b></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=7></td></tr>
<?
}
?>
  <tr><td>&nbsp;</td></tr>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr><td><? print_pagelist($page, $lists, $page_count, "&id=$id"); ?></td></tr>
</table>
</body>
</html>