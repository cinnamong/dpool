<?
include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악

// 온라인 입금
if($pay_method == "PB"){

	$pay_result = "00";
   $status = "OR";
   
   

// 신용카드 결제
}else{

	// KCP 결제시스템
	$orderid = $ordr_idxx;		// 주문번호
	$pay_result = $app_rt;		// 결제결과
	$pay_msg = $res_msg;			// 응답메세지
   $status = "OY";				// 주문상태
	$pay_method = "PC";			// 결제방법
	$paydate = date('Y-m-d h:i:s');	// 결제시간
   
}


// 정상적인 결제시
if($pay_result == "00"){

	// 주문상품 저장
	$basket_list = $HTTP_SESSION_VARS["basket_list"];
	$basket_cnt = count($basket_list);
	$basketid = md5(uniqid(rand()));
	
	for($ii = 0; $ii < $basket_cnt; $ii++){
		
		if($basket_list[$ii] != null){
			
			$sql = "insert into wiz_basket values('', '".$basketid."' ,'".$basket_list[$ii][prdcode]."', '".$basket_list[$ii][prdname]."', '".$basket_list[$ii][prdimg]."', '".$basket_list[$ii][prdprice]."', '".$basket_list[$ii][prdreserve]."',
	                        '".$basket_list[$ii][opttitle]."', '".$basket_list[$ii][optcode]."', '".$basket_list[$ii][opttitle2]."', '".$basket_list[$ii][optcode2]."', '".$basket_list[$ii][opttitle3]."', '".$basket_list[$ii][optcode3]."', 
	                        '".$basket_list[$ii][amount]."', now(), '')";

			$result = mysql_query($sql) or error(mysql_error());
			
		}
	}


	// 주문정보 저장
	$sql = "insert into wiz_order values(
					'".$order_info[orderid]."', '$basketid', 
					'".$order_info[send_id]."', '".$order_info[send_name]."', '".$order_info[send_tphone]."', '".$order_info[send_hphone]."', '".$order_info[send_email]."', '".$order_info[send_post]."', '".$order_info[send_address]."', '".$order_info[demand]."', '".$order_info[message]."', 
					'".$order_info[rece_name]."', '".$order_info[rece_tphone]."', '".$order_info[rece_hphone]."', '".$order_info[rece_post]."', '".$order_info[rece_address]."', 
					'".$order_info[pay_method]."', '".$account_name."', '".$account."', 
					'".$order_info[reserve_use]."', '".$order_info[reserve_price]."', '".$order_info[deliver_price]."', '".$order_info[deliver_num]."', '".$order_info[prd_price]."', '".$order_info[total_price]."', 
					'$status', now(), '$paydate', '$sendddate', '$canceldate', '$descript')";

	$result = mysql_query($sql) or error(mysql_error());


	// 적립금 처리 : 적립금 사용시 적립금 감소
	if($order_info[reserve_use] > 0){
		
		$reserve_msg = "상품구입시 사용함";
	   $sql = "insert into wiz_reserve values('', '$order_info[send_id]', '$reserve_msg', -$order_info[reserve_use], '$order_info[orderid]', now())";
	   mysql_query($sql) or error(mysql_error());    
	   
	}
	
	
	// 재고처리
	$sql = "select wb.optcode, wb.prdcode, wb.amount, wp.optcode as p_optcode  from wiz_basket wb, wiz_product wp where wb.basketid = '$basketid' and wb.prdcode = wp.prdcode";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
		
		// 옵션별 재고관리 없는 제품이라면 전체재고 감소
		if($row->optcode == ""){
			
			$sql = "update wiz_product set stock = stock - $row->amount , ordercnt = ordercnt + 1 where prdcode = '$row->prdcode'";
			mysql_query($sql) or error(mysql_error());
		
		// 옵션별 재고관리 상품
		}else{
			
			$opt_list = explode("^^",$row->p_optcode);
			$opt_list_app = "";
			
			for($ii=0; $ii < count($opt_list)-1; $ii++){
				
				$opt_list2 = explode("^",$opt_list[$ii]);
				
				if($opt_list2[0] == $row->optcode){
					 
					$opt_list2[2] = $opt_list2[2] - $row->amount;

					$opt_list_app .= $opt_list2[0]."^".$opt_list2[1]."^".$opt_list2[2]."^^";
					 
				}else{
					$opt_list_app .= $opt_list[$ii]."^^";
				}
		
			}
			
			$sql = "update wiz_product set optcode = '$opt_list_app', ordercnt = ordercnt + 1 where prdcode = '$row->prdcode'";
			mysql_query($sql) or error(mysql_error());
			
		}
		
	}
	
	
	session_unregister("basket_list"); 
	session_unregister("order_info"); 
	
}

?>

<script>document.location="order_ok.php?orderid=<?=$order_info[orderid]?>&pay_method=<?=$pay_method?>&pay_result=<?=$pay_result?>&pay_msg=<?=$pay_msg?>";</script>