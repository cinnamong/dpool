<?
include "../../inc/global.inc";
include "../inc/admin_check.inc";


// �⺻��������
if($mode == "shop_info"){
	
	$com_post = $com_post."-".$com_post2;

	$sql = "update wiz_shopinfo set shop_name='$shop_name', shop_pw='$shop_pw', shop_email='$shop_email', shop_hand='$shop_hand',
							com_num='$com_num', com_name='$com_name', com_owner='$com_owner', com_post='$com_post', com_address='$com_address', com_kind='$com_kind', com_class='$com_class', com_tel='$com_tel', com_fax='$com_fax'";
	
	$result = mysql_query($sql) or error(mysql_error());

	complete("�⺻���� ������ ����Ǿ����ϴ�.","shop_info.php");
	
	
	
	
// ��������� 
}else if($mode == "oper_info"){
	
	for($ii=0; $ii<count($pay_method); $ii++){
      $pay_tmp .= $pay_method[$ii]."/";
   }
   
	$sql = "update wiz_operinfo set pay_method ='$pay_tmp', pay_id ='$pay_id', pay_agent ='$pay_agent', pay_account ='$pay_account', 
						del_method ='$del_method', del_fixprice ='$del_fixprice', del_staprice ='$del_staprice', del_staprice2 ='$del_staprice2', del_staprice3 ='$del_staprice3', 
						del_extrapost1 ='$del_extrapost1', del_extrapost12 ='$del_extrapost12', del_extraprice1 ='$del_extraprice1', 
						del_extrapost2 ='$del_extrapost2', del_extrapost22 ='$del_extrapost22', del_extraprice2 ='$del_extraprice2', 
						del_extrapost3 ='$del_extrapost3', del_extrapost32 ='$del_extrapost32', del_extraprice3 ='$del_extraprice3', 
						reserve_use ='$reserve_use', reserve_join ='$reserve_join', reserve_recom ='$reserve_recom', reserve_min ='$reserve_min', reserve_max ='$reserve_max', reserve_buy ='$reserve_buy', reserve_per ='$reserve_per', 
						review_use ='$review_use', review_level ='$review_level'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("����� ������ ����Ǿ����ϴ�.","shop_oper.php");
	
	
	
	

// �ŷ�ó���� 
}else if($mode == "shop_trade"){

	// �ŷ�ó ���� �Է� 
	if($trade_mode == "insert"){
	   
	   
	   $com_post = $com_post."-".$com_post2;
	   
	   $sql = "insert into wiz_tradecom values( 
	                        '$idx', '$com_type', '$com_num', '$com_name', '$com_owner', '$com_post', '$com_address', '$com_kind', '$com_class', 
	                        '$com_tel', '$com_fax', '$com_bank', '$com_account', '$com_homepage', 
	                        '$charge_name', '$charge_email', '$charge_hand', '$charge_tel', '$descript')";
	                        
	   $result = mysql_query($sql) or error("�ŷ�ó ������ �����ϴ��� ������ �߻��Ͽ����ϴ�.");
	   
	   complete("�ŷ�ó ������ ����Ǿ����ϴ�.","shop_trade.php");
	   
	   
	   
	   
	// �ŷ�ó ���� ����
	}else if($trade_mode == "update"){
	   
	   
	   $com_post = $com_post."-".$com_post2;
	   
	   $sql = "update wiz_tradecom set 
	                        com_type = '$com_type', com_num = '$com_num', com_name = '$com_name', com_owner = '$com_owner', com_post = '$com_post', com_address = '$com_address', com_kind = '$com_kind', com_class = '$com_class', 
	                        com_tel = '$com_tel', com_fax = '$com_fax', com_bank = '$com_bank', com_account = '$com_account', com_homepage = '$com_homepage', 
	                        charge_name = '$charge_name', charge_email = '$charge_email', charge_hand = '$charge_hand', charge_tel = '$charge_tel', descript = '$descript'
	                        where idx = '$idx'";
	   
	   $result = mysql_query($sql) or error("�ŷ�ó ������ �����ϴ��� ������ �߻��Ͽ����ϴ�.");
	   
	   complete("�ŷ�ó ������ ����Ǿ����ϴ�.","shop_trade_input.php?trade_mode=update&idx=$idx");

	   

	// �ŷ�ó ����
	}else if($trade_mode == "delete"){

	   $sql = "delete from wiz_tradecom where idx = '$idx'";
	   
	   $result = mysql_query($sql) or error("�ŷ�ó ������ ������ �߻��Ͽ����ϴ�.");
	   
	   complete("����� ������ ����Ǿ����ϴ�.","shop_trade.php");

	}   
	

// �̸��� sms ����
}else if($mode == "mailsms"){
	
	if(empty($sms_cust)) $sms_cust = "N";
	if(empty($sms_oper)) $sms_oper = "N";
	if(empty($email_cust)) $email_cust = "N";
	if(empty($email_oper)) $email_oper = "N";
	
	$sql = "update wiz_mailsms set sms_cust = '$sms_cust', sms_oper = '$sms_oper', sms_msg = '$sms_msg', 
	                     email_cust = '$email_cust', email_oper = '$email_oper', email_subj = '$email_subj', email_hmsg  = '$email_hmsg',  email_fmsg = '$email_fmsg' where code = '$code'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("���������� �����Ͽ����ϴ�.","shop_mailsms_input.php?code=$code");
	


// ������ �ϰ�����
}else if($mode == "setreserve"){
	
	$percent = $reserve_per/100;
	
   $sql = "update wiz_product set reserve = sellprice * $percent";
   
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("������ �ϰ����� �Ǿ����ϴ�.","shop_oper.php");
   
}

?>