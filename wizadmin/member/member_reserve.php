<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: <?=$name?>(<?=$id?>) ���� �����ݳ��� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/valueCheck.js"></script>
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function orderView(orderid){
   var url = "/shop/order_view.php?orderid=" + orderid;
   window.open(url, "orderView", "height=640, width=671, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}

function inputCheck(frm){
	
	if(frm.reserve_gubun.value == ""){
		alert("������ +,- �� �����ϼ���.");
		frm.reserve_gubun.focus();
		return false;
	}
	if(frm.reserve.value == ""){
		alert("�������� �Է��ϼ���.");
		frm.reserve.focus();
		return false;
	}else{
		if(!Check_Num(frm.reserve.value)){
			alert("�������� �����̾�� �մϴ�.");
			frm.reserve.select();
			frm.reserve.focus();
			return false;
		}
	}
	if(frm.reservemsg.value == ""){
		alert("���������� �Է��ϼ���.");
		frm.reservemsg.focus();
		return false;
	}
}

function inputEmpty(obj,msg){
	if(obj.value == msg){
		obj.value = "";
	}
}

function deleteReserve(idx,memid){
	if(confirm('�ش� ���������� �����Ͻðڽ��ϱ�?')){
		document.location = "member_save.php?mode=delreserve&idx=" + idx + "&memid=" + memid;
	}
}
//-->
</script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: <?=$name?>(<?=$id?>) ���� �����ݳ��� ::</b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"><input type="button" value="�� ��" onClick="self.close();" class="t"> &nbsp; </td>
  </tr>
  <tr><td height=1 colspan=3></td></tr>
  <tr bgcolor=f0f0f0 align=center>
    <td width="15%" height="23"><b>��������</b></td>
    <td width="55%"><b>��������</b></td>
    <td width="15%"><b>�ݾ�</b></td>
    <td width="15%"><b>�󼼺���</b></td>
  </tr>
<?

   $sql = "select sum(reserve) as total_reserve from wiz_reserve where memid = '$id'";
   $result = mysql_query($sql) or error(mysql_error());
   $row = mysql_fetch_object($result);
   $total_reserve = $row->total_reserve;
   
   
	$sql = "select * from wiz_reserve where memid = '$id' order by wdate desc";
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
	<td height="30"><?=$row->wdate?></td>
	<td><?=$row->reservemsg?><? if(!empty($row->orderid)) echo "<a href=javascript:orderView('$row->orderid');>($row->orderid)</a>"; ?></td>
	<td><?=number_format($row->reserve)?>��</td>
	<td>
	  <? if(!empty($row->orderid)) echo "<a href=javascript:orderView('$row->orderid');>����</a>"; ?>
	  <a href="javascript:deleteReserve('<?=$row->idx?>','<?=$row->memid?>');">����</a>
	</td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan=7></td></tr>
<?
		$rows--;
}
	if($total <= 0){
?>
  <tr bgcolor=ffffff align=center>
    <td height="35" colspan="4"><b>���������� �����ϴ�.</b></td>
  </tr>
  <tr><td height=1 bgcolor="f0f0f0" colspan="4"></td></tr>
<?
}
?>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="right">

<table height="10" border="0" cellpadding="0" cellspacing="0">
<form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this)">
<input type="hidden" name="mode" value="reserve">
<input type="hidden" name="memid" value="<?=$id?>">
  <tr><td height="5"></td></tr>
  <tr>
    <td>
    <select name="reserve_gubun">
    <option value="+">&nbsp; +&nbsp; 
    <option value="-">&nbsp; -&nbsp; 
    </select>
    </td>
    <td>&nbsp;<input type="text" name="reserve" value="������" size="12" class="form3" onClick="inputEmpty(this,'������');"></td>
    <td>&nbsp;<input type="text" name="reservemsg" value="��������" size="35" class="form3" onClick="inputEmpty(this,'��������');"></td>
    <td>&nbsp;<input type="submit" value="����" class="t">&nbsp;&nbsp;</td>
  </tr>
  <tr><td height="5"></td></tr>
</form>
</table>

</td>
</tr>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font color="red"><b>�� ������ : <?=number_format($total_reserve)?>��</b></font>&nbsp; &nbsp; </td>
  <tr>
    <td><? print_pagelist($page, $lists, $page_count, "&id=$id"); ?></td>
  </tr>
</table>
</body>
</html>