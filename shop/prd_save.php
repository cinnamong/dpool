<?

include "../inc/global.inc";		// DB���ؼ�, ������ �ľ�
include "../inc/shop_info.inc";	// �����


// ��� üũ
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
				error("�ֹ������� ���(".$opt_sub_tmp[2]."��)���� �����ϴ�.");
			}
		}
		
	}else{
	
   	if($amount > $prd_info->stock){
   		error("�ֹ������� ���(".$prd_info->stock."��)���� �����ϴ�.");
   	}
   	
	}
	
}


// ��ǰ��ٱ��Ͽ� ����
if($mode == "insert"){
	
	$basket_list = $HTTP_SESSION_VARS["basket_list"];
	$basket_cnt = count($basket_list);
	$basket_idx = $basket_cnt;
	
	// ������ǰ�� ���� �ɼ��� �����ߴ���
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
	
	// ��� üũ
   checkAmount($prdcode, $amount, $optcode);
   
	// �ߺ��� ��ǰ�� �ɼ��� ���ٸ� �űԻ���
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
	
	


// ��ٱ��� ����
}else if($mode == "update"){
	
	$idx = $_POST[idx];
	$amount = $_POST[amount];
	$prdcode = $_POST[prdcode];
	$optcode = $_POST[optcode];

	// ��� üũ
   checkAmount($basket_list[$idx][prdcode], $basket_list[$idx][amount], $basket_list[$idx][optcode]);

	$basket_list[$idx][amount] = $amount;
	
	session_register("basket_list",$basket_list);
	
	echo "<script>history.go(-1);</script>";
	
	

// ��ٱ��� ����
}else if($mode == "delete"){
	
	$idx = $_GET[idx];
	$basket_list = $HTTP_SESSION_VARS["basket_list"];
	$basket_list[$idx] = null;
	
	session_register("basket_list",$basket_list);
	
   header("Location: prd_basket.php");
	
	
// ��ٱ��� ��ü����
}else if($mode == "delall"){
	
	session_unregister("basket_list"); 

   header("Location: prd_basket.php");
	
	
// ��ǰ�� �ۼ�
}else if($mode == "review"){
   
	if($oper_info->review_level == "M" && empty($wiz_session[id]))
		error("��ǰ�� �ۼ��� ȸ���� �����մϴ�.");
								   
   $sql = "insert into wiz_comment values('', '', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
   $result = mysql_query($sql) or error(mysql_error());

	comalert("��ǰ���� �ۼ��Ͽ����ϴ�.", "/shop/prd_view.php?prdcode=$prdcode");



// ��ǰ�� ����
}else if($mode == "del_review"){
	
	$sql = "select idx from wiz_comment where idx='$idx' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());

	if(mysql_num_rows($result) > 0){
		
		$sql = "delete from wiz_comment where idx='$idx' and passwd = '$passwd'";
	   $result = mysql_query($sql) or error(mysql_error());
	   
	   comalert("��ǰ���� �����Ͽ����ϴ�.", "/shop/prd_view.php?prdcode=$prdcode");

	}else{

		error("��й�ȣ�� ���� �ʽ��ϴ�.");

	}
}


?>