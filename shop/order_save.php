<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/oper_info.inc"; 		// 운영 정보

if($rece_name == "") error("받으시는 분 이름이 빠졌습니다.");
if($rece_post == "" || $rece_post2 == "") error("받으시는 분 우편번호가 빠졌습니다.");
if($rece_address == "" || $rece_address2 == "") error("받으시는 분 주소가 빠졌습니다.");
if($rece_tphone == "" || $rece_tphone2 == "" || $rece_tphone3 == "") error("받으시는 분 전화번호가 빠졌습니다.");

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




// 주문가격 정보(상품가격, 배송비, 적립금, 전체결제금액)
// 주문정보 입력폼에서 전달시 변조될 위험있음
$basket_list = $HTTP_SESSION_VARS["basket_list"];
$basket_cnt = count($basket_list);

for($ii = 0; $ii < $basket_cnt; $ii++){
	if($basket_list[$ii] != null){
		$prd_price += ($basket_list[$ii][prdprice] * $basket_list[$ii][amount]);
		$reserve_price += ($$basket_list[$ii][prdreserve] * $$basket_list[$ii][amount]);
	}
}		

if($oper_info->del_method == "DA"){ 		// 배송비 전액무료
	$deliver_price = 0;
}else if($oper_info->del_method == "DB"){ // 수신자부담 (착불)
	$deliver_price = 0;
}else if($oper_info->del_method == "DC"){ // 고정값
	$deliver_price = $oper_info->del_fixprice;
}else if($oper_info->del_method == "DD"){ // 구매가격별
	if($oper_info->del_staprice < $prd_price){
		$deliver_price = $oper_info->del_staprice2;
	}else{
		$deliver_price = $oper_info->del_staprice3;
	}
}

// 배송할증료 적용
$tmp_post = str_replace("-","",$rece_post);
if($oper_info->del_extrapost1 <= $tmp_post && $tmp_post <= $oper_info->del_extrapost12) $deliver_price = $deliver_price + $oper_info->del_extraprice1;
if($oper_info->del_extrapost2 <= $tmp_post && $tmp_post <= $oper_info->del_extrapost22) $deliver_price = $deliver_price + $oper_info->del_extraprice2;
if($oper_info->del_extrapost3 <= $tmp_post && $tmp_post <= $oper_info->del_extrapost32) $deliver_price = $deliver_price + $oper_info->del_extraprice3;


$total_price = $prd_price + $deliver_price;



// 적립금사용시 결제액 감소, 적림금감소
if($oper_info->reserve_use == "Y" && $reserve_use > 0 && $wiz_session[id] != ""){
	
	// 회원적립금 가져오기
	$sql = "select sum(reserve) as reserve from wiz_reserve where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());
	$mem_info = mysql_fetch_object($result);
	if($mem_info->reserve == "") $mem_info->reserve = 0;
	
	// 적립금 사용금액이 실제 적립금보다 많다면
	if($reserve_use > $mem_info->reserve){
		error("실제적립금 보다 사용액이 많습니다.");
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