<?
include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc";		// ��ƿ ���̺귯��
include "../inc/login_check.inc";	// �α��� üũ

// ȸ������ ����
if($mode == "my_info"){

   $e_post 		= $post."-".$post2;
	$e_tphone 		= $tphone."-".$tphone2."-".$tphone3;
	$e_hphone 		= $hphone."-".$hphone2."-".$hphone3;
	$e_birthday 	= $birthday."-".$birthday2."-".$birthday3;
	$e_memorial 	= $memorial."-".$memorial2."-".$memorial3;

   for($ii=0; $ii<count($consph); $ii++){ $tmpconsph .= $consph[$ii]."/"; }
	for($ii=0; $ii<count($conprd); $ii++){ $tmpconprd .= $conprd[$ii]."/"; }


   $sql = "update wiz_member set ";
   
   if(isset($post)) $sql .= "post = '$e_post', ";
   if(isset($address)) $sql .= "address = '$address', ";
   if(isset($address2)) $sql .= "address2 = '$address2', ";
   if(isset($tphone)) $sql .= "tphone = '$e_tphone', ";
   if(isset($hphone)) $sql .= "hphone = '$e_hphone', ";
   if(isset($resms)) $sql .= "resms = '$resms', ";
   if(isset($email)) $sql .= "email = '$email', ";
   if(isset($reemail)) $sql .= "reemail = '$reemail', ";
   if(isset($birthday)) $sql .= "birthday = '$e_birthday', ";
   if(isset($bgubun)) $sql .= "bgubun = '$bgubun', ";
   if(isset($marriage)) $sql .= "marriage = '$marriage', ";
   if(isset($memorial)) $sql .= "memorial = '$e_memorial', ";
   if(isset($scholarship)) $sql .= "scholarship = '$scholarship', ";
   if(isset($job)) $sql .= "job = '$job', ";
   if(isset($income)) $sql .= "income = '$income', ";
   if(isset($car)) $sql .= "car = '$car', ";
   if(isset($consph)) $sql .= "consph = '$tmpconsph', ";
   if(isset($conprd)) $sql .= "conprd = '$tmpconprd', ";
   
   $sql .= " visit_time = now() where id = '$wiz_session[id]'";

   $result = mysql_query($sql) or error(mysql_error());
   
   comalert("�����Ǿ����ϴ�.", "");


// ��й�ȣ ����
}else if($mode == "my_passwd"){

	$sql = "select id from wiz_member where passwd = '$pre_passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	
	if($total > 0){
		
		$sql = "update wiz_member set passwd = '$passwd' where id = '$wiz_session[id]' and passwd = '$pre_passwd'";
		$result = mysql_query($sql) or error(mysql_error());
		comalert("��й�ȣ�� ����Ǿ����ϴ�.");
		
	}else{
	
		error("������й�ȣ�� ��ġ���� �ʽ��ϴ�.");
		
	}
	
	
	
// ȸ��Ż��
}else if($mode == "my_out"){

	
   // ȸ�����̺��� ����
   $sql = "delete from wiz_member where id = '$wiz_session[id]'";
   $result = mysql_query($sql) or error(mysql_error());

   // �򸮽�Ʈ ����
   $sql = "delete from wiz_wishlist where memid = '$wiz_session[id]'";
   $result = mysql_query($sql) or error(mysql_error());
   
   // ������ ����
   $sql = "delete from wiz_reserve where memid = '$wiz_session[id]'";
   $result = mysql_query($sql) or error(mysql_error());

	// �ֹ����� ����(�ֹ��� ���̵� [out] ���� ó��)
	$sql = "update wiz_order set send_id = '".$wiz_session[id]."[out]' where  send_id = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());
	
   // �����ڿ��� �̸��Ϲ߼�
	if($out_reason != "") $reason .= $out_reason." , ";
   if($out_reason2 != "") $reason .= $out_reason2." , ";
   if($out_reason3 != "") $reason .= $out_reason3." , ";
   if($out_reason4 != "") $reason .= $out_reason4." , ";
   if($out_reason5 != "") $reason .= $out_reason5." , ";
   if($out_reason6 != "") $reason .= $out_reason6." , ";
   if($out_reason7 != "") $reason .= $out_reason7." , ";
   if($out_reason8 != "") $reason .= $out_reason8." , ";
   $addmsg = "Ż����� : ".$reason."<br><br>";
   $addmsg .= "����� : ".$message;
   
   // ȸ��Ż�� ����/SMS �߼�
	$re_info[name] = $wiz_session[name];
	$re_info[email] = $wiz_session[email];
	$re_info[hphone] = $wiz_session[hphone];
	send_mailsms("mem_apply", $re_info, $addmsg);
   
   if(!empty($wiz_session[id])){
      session_unregister("wiz_session");
   }
   
   comalert("ȸ��Ż�� �Ϸ�Ǿ����ϴ�.", "/");


// ���ɻ�ǰ �߰�
}else if($mode == "my_wish"){
   
   
   $sql = "select * from wiz_wishlist where memid = '$wiz_session[id]' and prdcode = '$prdcode'";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   
   if($total > 0 ) error("�̹� ����� ���ɻ�ǰ �Դϴ�.");

   $sql = "insert into wiz_wishlist values('', '$wiz_session[id]', '$prdcode', now())";
   $result = mysql_query($sql) or error(mysql_error());
   
   comalert("���ɻ�ǰ�� �߰��Ͽ����ϴ�.", "");
   
   
   
// �򸮽�Ʈ ����   
}else if($mode == "my_wishdel"){
   
   
   
   $sql = "delete from wiz_wish where memid = '$wiz_session[id]' and idx = '$idx'";
   
   $result = mysql_query($sql) or error(mysql_error());
   
   Header("Location: my_wish.php");


// 1:1 qna
}else if($mode == "my_qna"){


	if($sub_mode == "insert"){
		
		$sql = "insert into wiz_consult values('', '$wiz_session[id]', '$wiz_session[name]', '$subject', '$question', '$answer', now(), 'N')";
   	$result = mysql_query($sql) or error(mysql_error());
   	Header("Location: my_qna.php");
   	
	}else if($sub_mode == "modify"){
		
		$sql = "update wiz_consult set subject = '$subject', question = '$question' where memid = '$wiz_session[id]' and idx = '$idx'";
   	$result = mysql_query($sql) or error(mysql_error());
   	comalert("���� �Ǿ����ϴ�.", "my_qnaview.php?idx=$idx");
   	
	}else if($sub_mode == "delete"){
		
		$sql = "delete from wiz_consult where memid = '$wiz_session[id]' and idx = '$idx'";
   	$result = mysql_query($sql) or error(mysql_error());
   	comalert("���� �Ǿ����ϴ�.", "my_qna.php");
   	
	}
	
}
?>