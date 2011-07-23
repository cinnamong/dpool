<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day&page=$page";
//------------------------------------------------------------------------------------------------------------------------------------

// 회원정보 수정
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
   
   complete("회원정보를 수정하였습니다.","member_info.php?mode=$mode&id=$id&$param");
   

// 회원 삭제
}else if($mode == "deluser"){

	$array_seluser = explode("|",$seluser);
	$i=0;
	while($array_seluser[$i]){
		
		$mem_id = $array_seluser[$i];
		
		// 회원테이블에서 삭제
	   $sql = "delete from wiz_member where id = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());
	
	   // 찜리스트 삭제
	   $sql = "delete from wiz_wishlist where memid = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());
	   
	   // 적립금 삭제
	   $sql = "delete from wiz_reserve where memid = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());
	
		// 주문내역 삭제(주문자 아이디를 [out] 으로 처리)
		$sql = "update wiz_order set send_id = '".$mem_id."[out]' where  send_id = '$mem_id'";
		$result = mysql_query($sql) or error(mysql_error());
	
	
		$i++;
	}

	complete("회원을 삭제하였습니다.","member_list.php?$param");


}else if($mode == "sendsms"){

	send_sms($se_tel, $hphone, $sms_msg);
	
	comalert("발송되었습니다.","");
	
	
	
	
// 개별회원 이메일 발송
}else if($mode == "sendemail"){
	
	global $DOCUMENT_ROOT;

	// 관리자 정보 가져오기
	include "$DOCUMENT_ROOT/inc/shop_info.inc";

	// 메일/sms 발송내용 가져오기
	$type = "mem_notice";
	$sql = "select * from wiz_mailsms where code = '$type'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$email_msg = $row->email_hmsg.$content.$row->email_fmsg;
	$email_msg = info_replace($shop_info, $re_info, $email_msg);
	
	send_mail($shop_info->shop_name, $shop_info->shop_email, $re_name, $re_email, $subject, $email_msg);
	
	complete("이메일 발송을 완료하였습니다.","send_email.php?name=$re_name&email=$re_email");
	
	
	
	
	
// 회원이메일 발송
}else if($mode == "mememail"){

	global $DOCUMENT_ROOT;

	// 관리자 정보 가져오기
	include "$DOCUMENT_ROOT/inc/shop_info.inc";

	// 메일/sms 발송내용 가져오기
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

			// 수신여부
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
					
					echo "<b>발송 [$total]명 : </b><br> $receiver <br><br>";
					
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
		echo "<b>발송 [$total]명 : </b><br> $receiver <br><br>";
		
		echo "<br><font color='red'><b>발송을 완료하였습니다.</b>  <a href='javascript:history.go(-1)'><-돌아가기</a></font>";

	}





// 회원SMS 발송
}else if($mode == "memsms"){

	// 관리자 정보 가져오기
	include "$DOCUMENT_ROOT/inc/shop_info.inc";
	
	$no = 0;
	$sql = str_replace("\\", "", $mailsql);
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
	
		// 수신여부
		if($rekind != "RY" || ($rekind == "RY" && $row->resms != "N")){
			send_sms($shop_info->com_tel, $row->hphone, $sms_msg);
			$no++;
		}
		
	}

	
	complete("SMS 발송을 완료하였습니다.","");
	
	
//상담작성  
}else if($mode == "consult"){
   
   $sql = "update wiz_consult set question = '$question', answer = '$answer', status = 'Y' where idx = '$idx'";
   
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("상담작성을 완료하였습니다.","member_qna.php");






// 상담삭제
}else if($mode == "condelete"){
	
	$array_selconsult = explode("|",$selconsult);
	
	$i=0;
	while($array_selconsult[$i]){
		$idx = $array_selconsult[$i];
		$sql = "delete from wiz_consult where idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$i++;
	}

	complete("선택한 상담을 삭제 하였습니다.","member_qna.php");






// 각 회원별 적립금 적용
}else if($mode == "reserve"){
	
	$memid = $_POST[memid];
	$reservemsg = $_POST[reservemsg];
	$reserve = $_POST[reserve_gubun].$_POST[reserve];

	$sql = "insert into wiz_reserve values('', '$memid', '$reservemsg', '$reserve', '$orderid', now())";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("적립금을 적용하였습니다.","");
	
	
	
	
	
	
	
// 각 회원별 적립금 삭제
}else if($mode == "delreserve"){
	
	$sql = "delete from wiz_reserve where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("해당 적립내역을 삭제하였습니다.","");
	
}

?>