<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day&page=$page";
//------------------------------------------------------------------------------------------------------------------------------------

// ȸ������ ����
if($mode == "update"){
  
   $resno = $resno."-".$resno2;
   $post = $post."-".$post2;
   $tphone = $tphone."-".$tphone2."-".$tphone3;
   $hphone = $hphone."-".$hphone2."-".$hphone3;
   
   $birthday2 = substr("0".$birthday2,-2);
   $birthday3 = substr("0".$birthday3,-2);
   $memorial2 = substr("0".$memorial2,-2);
   $memorial3 = substr("0".$memorial3,-2);

   $birthday = $birthday."-".$birthday2."-".$birthday3;
   $memorial = $memorial."-".$memorial2."-".$memorial3;


   for($ii=0; $ii<count($consph); $ii++){
      $tmpconsph .= $consph[$ii]."/";
   }
   for($ii=0; $ii<count($conprd); $ii++){
      $tmpconprd .= $conprd[$ii]."/";
   }
   
   $sql = "update wiz_member set  
                     passwd = '$passwd', name = '$name', resno = '$resno', email = '$email', tphone = '$tphone', hphone = '$hphone', post = '$post', address = '$address', address2 = '$address2', reemail = '$reemail', resms = '$resms', 
                     birthday = '$birthday', bgubun = '$bgubun', marriage = '$marriage', memorial = '$memorial', scholarship = '$scholarship', job = '$job', income = '$income', car = '$car', consph = '$tmpconsph', conprd = '$tmpconprd', 
                     recom = '$recom', visit = '$visit', level = '$level' where id = '$id'";
         
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("ȸ�������� �����Ͽ����ϴ�.","member_info.php?mode=$mode&id=$id&$param");
   

// ȸ�� ����
}else if($mode == "deluser"){

	$array_seluser = explode("|",$seluser);
	$i=0;
	while($array_seluser[$i]){
		
		$mem_id = $array_seluser[$i];
		
		// ȸ�����̺��� ����
	   $sql = "delete from wiz_member where id = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());
	
	   // �򸮽�Ʈ ����
	   $sql = "delete from wiz_wishlist where memid = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());
	   
	   // ������ ����
	   $sql = "delete from wiz_reserve where memid = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());
	
		// �ֹ����� ����(�ֹ��� ���̵� [out] ���� ó��)
		$sql = "update wiz_order set send_id = '".$mem_id."[out]' where  send_id = '$mem_id'";
		$result = mysql_query($sql) or error(mysql_error());
	
	
		$i++;
	}

	complete("ȸ���� �����Ͽ����ϴ�.","member_list.php?$param");


}else if($mode == "sendsms"){

	send_sms($se_tel, $hphone, $sms_msg);
	
	comalert("�߼۵Ǿ����ϴ�.","");
	
	
	
	
// ����ȸ�� �̸��� �߼�
}else if($mode == "sendemail"){
	
	global $DOCUMENT_ROOT;

	// ������ ���� ��������
	include "$DOCUMENT_ROOT/inc/shop_info.inc";

	// ����/sms �߼۳��� ��������
	$type = "mem_notice";
	$sql = "select * from wiz_mailsms where code = '$type'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$email_msg = $row->email_hmsg.$content.$row->email_fmsg;
	$email_msg = info_replace($shop_info, $re_info, $email_msg);
	
	send_mail($shop_info->shop_name, $shop_info->shop_email, $re_name, $re_email, $subject, $email_msg);
	
	complete("�̸��� �߼��� �Ϸ��Ͽ����ϴ�.","send_email.php?name=$re_name&email=$re_email");
	
	
	
	
	
// ȸ���̸��� �߼�
}else if($mode == "mememail"){

	global $DOCUMENT_ROOT;

	// ������ ���� ��������
	include "$DOCUMENT_ROOT/inc/shop_info.inc";

	// ����/sms �߼۳��� ��������
	$type = "mem_notice";
	$sql = "select * from wiz_mailsms where code = '$type'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$email_msg = $row->email_hmsg.$content.$row->email_fmsg;
	$email_msg = info_replace($shop_info, $re_info, $email_msg);
	$email_msg = str_replace("\\", "", $email_msg);
	
	if($review == "Y"){
		
		echo $email_msg;
		
	}else{

		$no = 1;
	   $sql = str_replace("\\", "", $mailsql);
	   $result = mysql_query($sql) or error(mysql_error());
		
		while($row = mysql_fetch_object($result)){

			// ���ſ���
			if($rekind != "RY" || ($rekind == "RY" && $row->reemail == "Y")){
				
				if($no < 100){
					
					$receiver .= $row->email.",";
					$no++;
					
				}else{
					
					$total += $no;
					
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=euc-kr\r\n";
					$headers .= "From: ".$se_name." <".$se_email.">\r\n";
					$headers .= "To: ".$re_name." <".$re_email.">\r\n";
					$headers .= "Bcc: ".$receiver."\r\n"; 
					$headers .= "Reply-To: ".$se_name." <".$se_email.">\r\n";
					$headers .= "X-Priority: 3\r\n";
					$headers .= "X-MSMail-Priority: High\r\n";
					$headers .= "X-Mailer: Just My Server";

					$s_result = mail("", $subject, $email_msg, $headers);
					
					echo "<b>�߼� [$total]�� : </b><br> $receiver <br><br>";
					
					$receiver = "";
					$headers = "";
					$no = 0;
					
					flush();
					sleep(2);
				}
				
			}
			
		}
		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=euc-kr\r\n";
		$headers .= "From: ".$se_name." <".$se_email.">\r\n";
		$headers .= "To: ".$re_name." <".$re_email.">\r\n";
		$headers .= "Bcc: ".$receiver."\r\n"; 
		$headers .= "Reply-To: ".$se_name." <".$se_email.">\r\n";
		$headers .= "X-Priority: 3\r\n";
		$headers .= "X-MSMail-Priority: High\r\n";
		$headers .= "X-Mailer: Just My Server";

		$s_result = mail("", $subject, $email_msg, $headers);
		
		$total += $no;
		echo "<b>�߼� [$total]�� : </b><br> $receiver <br><br>";
		
		echo "<br><font color='red'><b>�߼��� �Ϸ��Ͽ����ϴ�.</b>  <a href='javascript:history.go(-1)'><-���ư���</a></font>";

	}





// ȸ��SMS �߼�
}else if($mode == "memsms"){

	// ������ ���� ��������
	include "$DOCUMENT_ROOT/inc/shop_info.inc";
	
	$no = 0;
	$sql = str_replace("\\", "", $mailsql);
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
	
		// ���ſ���
		if($rekind != "RY" || ($rekind == "RY" && $row->resms != "N")){
			send_sms($shop_info->com_tel, $row->hphone, $sms_msg);
			$no++;
		}
		
	}

	
	complete("SMS �߼��� �Ϸ��Ͽ����ϴ�.","");
	
	
//����ۼ�  
}else if($mode == "consult"){
   
   $sql = "update wiz_consult set question = '$question', answer = '$answer', status = 'Y' where idx = '$idx'";
   
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("����ۼ��� �Ϸ��Ͽ����ϴ�.","member_qna.php");






// ������
}else if($mode == "condelete"){
	
	$array_selconsult = explode("|",$selconsult);
	
	$i=0;
	while($array_selconsult[$i]){
		$idx = $array_selconsult[$i];
		$sql = "delete from wiz_consult where idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$i++;
	}

	complete("������ ����� ���� �Ͽ����ϴ�.","member_qna.php");






// �� ȸ���� ������ ����
}else if($mode == "reserve"){
	
	$memid = $_POST[memid];
	$reservemsg = $_POST[reservemsg];
	$reserve = $_POST[reserve_gubun].$_POST[reserve];

	$sql = "insert into wiz_reserve values('', '$memid', '$reservemsg', '$reserve', '$orderid', now())";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�������� �����Ͽ����ϴ�.","");
	
	
	
	
	
	
	
// �� ȸ���� ������ ����
}else if($mode == "delreserve"){
	
	$sql = "delete from wiz_reserve where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�ش� ���������� �����Ͽ����ϴ�.","");
	
}

?>