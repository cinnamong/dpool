<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/oper_info.inc"; 		// � ����

if($rece_name == "") error("�����ô� �� �̸��� �������ϴ�.");
if($rece_post == "" || $rece_post2 == "") error("�����ô� �� �����ȣ�� �������ϴ�.");
if($rece_address == "" || $rece_address2 == "") error("�����ô� �� �ּҰ� �������ϴ�.");
if($rece_tphone == "" || $rece_tphone2 == "" || $rece_tphone3 == "") error("�����ô� �� ��ȭ��ȣ�� �������ϴ�.");

$send_id = $wiz_session[id];
$reserve_use = $_POST["reserve_use"];

$send_post = $send_post."-".$send_post2;
$send_address = $send_address." ".$send_address2;
$send_tphone = $send_tphone."-".$send_tphone2."-".$send_tphone3;
$send_hphone = $send_hphone."-".$send_hphone2."-".$send_hphone3;

$rece_post = $rece_post."-".$rece_post2;
$rece_address = $rece_address." ".$rece_address2;
$rece_tphone = $rece_tphone."-".$rece_tphone2."-".$rece_tphone3;
$rece_hphone = $rece_hphone."-".$rece_hphone2."-".$rece_hphone3;




// �ֹ����� ����(��ǰ����, ��ۺ�, ������, ��ü�����ݾ�)
// �ֹ����� �Է������� ���޽� ������ ��������
$basket_list = $HTTP_SESSION_VARS["basket_list"];
$basket_cnt = count($basket_list);

for($ii = 0; $ii < $basket_cnt; $ii++){
	if($basket_list[$ii] != null){
		$prd_price += ($basket_list[$ii][prdprice] * $basket_list[$ii][amount]);
		$reserve_price += ($$basket_list[$ii][prdreserve] * $$basket_list[$ii][amount]);
	}
}		

if($oper_info->del_method == "DA"){ 		// ��ۺ� ���׹���
	$deliver_price = 0;
}else if($oper_info->del_method == "DB"){ // �����ںδ� (����)
	$deliver_price = 0;
}else if($oper_info->del_method == "DC"){ // ������
	$deliver_price = $oper_info->del_fixprice;
}else if($oper_info->del_method == "DD"){ // ���Ű��ݺ�
	if($oper_info->del_staprice < $prd_price){
		$deliver_price = $oper_info->del_staprice2;
	}else{
		$deliver_price = $oper_info->del_staprice3;
	}
}

// ��������� ����
$tmp_post = str_replace("-","",$rece_post);
if($oper_info->del_extrapost1 <= $tmp_post && $tmp_post <= $oper_info->del_extrapost12) $deliver_price = $deliver_price + $oper_info->del_extraprice1;
if($oper_info->del_extrapost2 <= $tmp_post && $tmp_post <= $oper_info->del_extrapost22) $deliver_price = $deliver_price + $oper_info->del_extraprice2;
if($oper_info->del_extrapost3 <= $tmp_post && $tmp_post <= $oper_info->del_extrapost32) $deliver_price = $deliver_price + $oper_info->del_extraprice3;


$total_price = $prd_price + $deliver_price;



// �����ݻ��� ������ ����, �����ݰ���
if($oper_info->reserve_use == "Y" && $reserve_use > 0 && $wiz_session[id] != ""){
	
	// ȸ�������� ��������
	$sql = "select sum(reserve) as reserve from wiz_reserve where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());
	$mem_info = mysql_fetch_object($result);
	if($mem_info->reserve == "") $mem_info->reserve = 0;
	
	// ������ ���ݾ��� ���� �����ݺ��� ���ٸ�
	if($reserve_use > $mem_info->reserve){
		error("���������� ���� ������ �����ϴ�.");
	}else{
		$total_price = $total_price - $reserve_use;
	}

}

$order_info[orderid] 		= date("ymdHis").rand(100,999);
$order_info[send_id] 		= $send_id;
$order_info[send_name] 		= $send_name;
$order_info[send_tphone] 	= $send_tphone;
$order_info[send_hphone] 	= $send_hphone;
$order_info[send_email] 	= $send_email;
$order_info[send_post] 		= $send_post;
$order_info[send_address] 	= $send_address;
$order_info[demand] 			= $demand;
$order_info[message] 		= $message;
$order_info[rece_name] 		= $rece_name;
$order_info[rece_tphone] 	= $rece_tphone;
$order_info[rece_hphone] 	= $rece_hphone;
$order_info[rece_post] 		= $rece_post;
$order_info[rece_address] 	= $rece_address;
$order_info[pay_method] 	= $pay_method;
$order_info[account_name] 	= $account_name;
$order_info[account] 		= $account;
$order_info[reserve_use] 	= $reserve_use;
$order_info[reserve_price] = $reserve_price;
$order_info[deliver_price] = $deliver_price;
$order_info[deliver_num] 	= $deliver_num;
$order_info[prd_price] 		= $prd_price;
$order_info[total_price] 	= $total_price;

session_register("order_info",$order_info);

Header("location: order_pay.php?orderid=$orderid&pay_method=$pay_method");

?>