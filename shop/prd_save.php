<?

include "../inc/global.inc";		// DB컨넥션, 접속자 파악
include "../inc/shop_info.inc";	// 운영정보


// 재고량 체크
function checkAmount($prdcode, $amount, $optcode){
	
	global $prd_info;
	
	$sql = "select prdname, prdimg_R as prdimg, opttitle, optcode, stock, sellprice, reserve from wiz_product where prdcode = '$prdcode'";
   $result = mysql_query($sql) or error(mysql_error());
   $prd_info = mysql_fetch_object($result);

	if($prd_info->opttitle != "" && $prd_info->optcode != ""){
		
		$tmp_short = 0;
		$opt_tmp = explode("^^",$prd_info->optcode);
		for($ii=0; $ii<count($opt_tmp)-1; $ii++){
			$opt_sub_tmp = explode("^",$opt_tmp[$ii]);
			if($opt_sub_tmp[0] == $optcode && $opt_sub_tmp[2] < $amount){
				error("주문수량이 재고량(".$opt_sub_tmp[2]."개)보다 많습니다.");
			}
		}
		
	}else{
	
   	if($amount > $prd_info->stock){
   		error("주문수량이 재고량(".$prd_info->stock."개)보다 많습니다.");
   	}
   	
	}
	
}


// 상품장바구니에 저장
if($mode == "insert"){
	
	$basket_list = $HTTP_SESSION_VARS["basket_list"];
	$basket_cnt = count($basket_list);
	$basket_idx = $basket_cnt;
	
	// 같은상품에 같은 옵션을 선택했는지
	for($ii = 0; $ii < $basket_cnt; $ii++){
		
		if($basket_list[$ii][prdcode] == $prdcode && 
			$basket_list[$ii][optcode] == $optcode && 
			$basket_list[$ii][optcode2] == $optcode2 && 
			$basket_list[$ii][optcode3] == $optcode3){
				
			$basket_list[$ii][amount] = $amount;
			$basket_exist = true;
			break;
			
		}
		
	}
	
	// 재고 체크
   checkAmount($prdcode, $amount, $optcode);
   
	// 중복된 상품에 옵션이 없다면 신규생성
	if(!$basket_exist){
		
		$basket_list[$basket_idx][prdcode] 		= $prdcode;
		$basket_list[$basket_idx][prdname] 		= $prd_info->prdname;
		$basket_list[$basket_idx][prdimg] 		= $prd_info->prdimg;
		$basket_list[$basket_idx][prdprice] 	= $prd_info->sellprice;
		$basket_list[$basket_idx][prdreserve] 	= $prd_info->reserve;
		$basket_list[$basket_idx][opttitle] 	= $opttitle;
		$basket_list[$basket_idx][optcode] 		= $optcode;
		$basket_list[$basket_idx][opttitle2] 	= $opttitle2;
		$basket_list[$basket_idx][optcode2] 	= $optcode2;
		$basket_list[$basket_idx][opttitle3] 	= $opttitle3;
		$basket_list[$basket_idx][optcode3] 	= $optcode3;
		$basket_list[$basket_idx][amount] 		= $amount;
		
		session_register("basket_list",$basket_list);

	}

   if($direct == "basket" || empty($direct)) header("Location: prd_basket.php");
   else if($direct == "buy") header("Location: order_form.php");
	
	


// 장바구니 수정
}else if($mode == "update"){
	
	$idx = $_POST[idx];
	$amount = $_POST[amount];
	$prdcode = $_POST[prdcode];
	$optcode = $_POST[optcode];

	// 재고 체크
   checkAmount($basket_list[$idx][prdcode], $basket_list[$idx][amount], $basket_list[$idx][optcode]);

	$basket_list[$idx][amount] = $amount;
	
	session_register("basket_list",$basket_list);
	
	echo "<script>history.go(-1);</script>";
	
	

// 장바구니 삭제
}else if($mode == "delete"){
	
	$idx = $_GET[idx];
	$basket_list = $HTTP_SESSION_VARS["basket_list"];
	$basket_list[$idx] = null;
	
	session_register("basket_list",$basket_list);
	
   header("Location: prd_basket.php");
	
	
// 장바구니 전체삭제
}else if($mode == "delall"){
	
	session_unregister("basket_list"); 

   header("Location: prd_basket.php");
	
	
// 상품평 작성
}else if($mode == "review"){
   
	if($oper_info->review_level == "M" && empty($wiz_session[id]))
		error("상품평 작성은 회원만 가능합니다.");
								   
   $sql = "insert into wiz_comment values('', '', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
   $result = mysql_query($sql) or error(mysql_error());

	comalert("상품평을 작성하였습니다.", "/shop/prd_view.php?prdcode=$prdcode");



// 상품평 삭제
}else if($mode == "del_review"){
	
	$sql = "select idx from wiz_comment where idx='$idx' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());

	if(mysql_num_rows($result) > 0){
		
		$sql = "delete from wiz_comment where idx='$idx' and passwd = '$passwd'";
	   $result = mysql_query($sql) or error(mysql_error());
	   
	   comalert("상품평을 삭제하였습니다.", "/shop/prd_view.php?prdcode=$prdcode");

	}else{

		error("비밀번호가 맞지 않습니다.");

	}
}


?>