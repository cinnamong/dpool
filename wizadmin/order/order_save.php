<?
include "../../inc/global.inc";
include "../../inc/util_lib.inc";
include "../inc/admin_check.inc";

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "status=$status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

function changeStatus($orderid, $status){
	
	global $DOCUMENT_ROOT, $HTTP_HOST, $connect;
	
	$sql = "select * from wiz_order where orderid = '$orderid'";
	$result = mysql_query($sql) or error(mysql_error());
	$order_info = mysql_fetch_object($result);
	
	$re_info[name] = $order_info->send_name;
	$re_info[email] = $order_info->send_email;
	$re_info[hphone] = $order_info->send_hphone;
			
	if($order_info->status != $status ){

	   // �Ա�Ȯ�ν�
		if($status == "OY"){ 
			
			$oper_time = ", pay_date = now()";
			include "$DOCUMENT_ROOT/shop/prd_ordmail.inc";
			send_mailsms("order_pay", $re_info, $ordmail);


	   // ��ۿϷ�, ��ȯ�Ϸ�
		}else if($status == "DC" || $status == "CC"){ 
	   	

			//����������
         if($order_info->reserve_price > 0){
         	
         	$sql = "select idx from wiz_reserve where memid = '$order_info->send_id' and orderid = '$orderid' and reserve > 0";
         	$result = mysql_query($sql) or error(mysql_error());
         	$total = mysql_num_rows($result);
         	
         	// �̹� �������� �������� üũ
         	if($total <= 0){
	            $reserve_msg = "��ǰ���Խ� ������";
	            $sql = "insert into wiz_reserve values('', '$order_info->send_id', '$reserve_msg', $order_info->reserve_price, '$orderid', now())";
	            mysql_query($sql) or error(mysql_error());
				}
				
         }
         
         // �����ݻ�� ����
         if($order_info->reserve_use > 0){
         	
         	$sql = "select idx from wiz_reserve where memid = '$order_info->send_id' and orderid = '$orderid' and reserve < 0";
         	$result = mysql_query($sql) or error(mysql_error());
         	$total = mysql_num_rows($result);
         	
         	// �̹� �������� �������� üũ
         	if($total <= 0){
	            $reserve_msg = "��ǰ���Խ� ���";
	            $sql = "insert into wiz_reserve values('', '$order_info->send_id', '$reserve_msg', -$order_info->reserve_use, '$orderid', now())";
	            mysql_query($sql) or error(mysql_error());
				}
				
         }
			
			// �ֹ����, �ֹ��Ϸ� ��������
			$sql = "select prdcode from wiz_basket where basketid = '$order_info->basketid'";
			$result = mysql_query($sql) or error(mysql_error());
			while($row = mysql_fetch_object($result)){
				
				if($order_info->status == "OC" || $order_info->status == "RC") $cancel_sql = " cancelcnt = cancelcnt - 1 , ";
				$sql = "update wiz_product set $cancel_sql comcnt = comcnt + 1 where prdcode = '$row->prdcode'";
				mysql_query($sql) or error(mysql_error());
				
			}
			
			$oper_time = ", send_date = now()";
	   	include "$DOCUMENT_ROOT/shop/prd_ordmail.inc";
			send_mailsms("order_deliver", $re_info, $ordmail);
			
			
		// �ֹ���ҽ�, ȯ�ҿϷ��	
		}else if($status == "OC" || $status == "RC"){ 


			//����������(�ش��ֹ��� ���� �������� ����)
			$sql = "delete from wiz_reserve where memid='$order_info->send_id' and orderid='$order_info->orderid'";
			mysql_query($sql) or error(mysql_error());
			
			
			// �ֹ����, �ֹ��Ϸ� ��������
			$sql = "select prdcode from wiz_basket where basketid = '$order_info->basketid'";
			$result = mysql_query($sql) or error(mysql_error());
			while($row = mysql_fetch_object($result)){
				$sql = "update wiz_product set cancelcnt = cancelcnt + 1 , comcnt = comcnt - 1 where prdcode = '$row->prdcode'";
				mysql_query($sql) or error(mysql_error());
			}
			
			
			$oper_time = ", cancel_date = now()";
			include "$DOCUMENT_ROOT/shop/prd_ordmail.inc";
			send_mailsms("order_cancel", $re_info, $ordmail);
			
			
			
		}
		
		$sql = "update wiz_order set status = '$status' $oper_time where orderid = '$orderid'";
   	$result = mysql_query($sql,$connect) or error(mysql_error());

		$sql = "update wiz_basket set status = '$status' where basketid = '$order_info->basketid'";
		$result = mysql_query($sql,$connect) or error(mysql_error());
	   
   }
   
}



// �ֹ����� ����
if($mode == "chgstatus"){
	
	changeStatus($orderid, $chg_status);
	
	complete("�ֹ������� �����Ǿ����ϴ�.","order_list.php?page=$page&$param");


// �ֹ����� ����
}else if($mode == "update"){
	
	changeStatus($orderid, $chg_status);
	
	$send_post = $send_post."-".$send_post2;
	$rece_post = $rece_post."-".$rece_post2;
	
	$sql = "update wiz_order set status = '$chg_status', send_name = '$send_name', send_tphone = '$send_tphone', send_hphone = '$send_hphone', send_email = '$send_email',
                        send_post = '$send_post', send_address = '$send_address', rece_name =' $rece_name', rece_tphone = '$rece_tphone',
                        rece_hphone = '$rece_hphone', rece_post = '$rece_post', rece_address = '$rece_address', demand = '$demand', message = '$message', descript = '$descript', 
                        deliver_num = '$deliver_num' where orderid = '$orderid'";
              
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("�ֹ������� �����Ǿ����ϴ�.","order_info.php?orderid=$orderid&page=$page&$param");


// �ֹ�����
}else if($mode == "delete"){
	
	$i=0;
	$array_selorder = explode("|",$selorder);
	while($array_selorder[$i]){
		$orderid = $array_selorder[$i];
		$sql = "delete from wiz_order where orderid = '$orderid'";
		$result = mysql_query($sql) or error(mysql_error());
		$i++;
	}

	complete("�ֹ��� �����Ͽ����ϴ�.","order_list.php?page=$page&$param");
	
	
	
// �ֹ����� �ϰ�����
}else if($mode == "batchStatus"){

	$i=0;
	$array_selorder = explode("|",$selorder);
	while($array_selorder[$i]){
		$orderid = $array_selorder[$i];

		changeStatus($orderid, $chg_status);
		
		$i++;
	}

	echo "<script>alert('�ֹ����¸� �����Ͽ����ϴ�.');opener.document.location.reload();self.close();</script>";


}

?>