<?
include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc";		// 유틸 라이브러리
include "../inc/login_check.inc";	// 로그인 체크

// 회원정보 수정
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
   
   comalert("수정되었습니다.", "");


// 비밀번호 변경
}else if($mode == "my_passwd"){

	$sql = "select id from wiz_member where passwd = '$pre_passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	
	if($total > 0){
		
		$sql = "update wiz_member set passwd = '$passwd' where id = '$wiz_session[id]' and passwd = '$pre_passwd'";
		$result = mysql_query($sql) or error(mysql_error());
		comalert("비밀번호가 변경되었습니다.");
		
	}else{
	
		error("이전비밀번호가 일치하지 않습니다.");
		
	}
	
	
	
// 회원탈퇴
}else if($mode == "my_out"){

	
   // 회원테이블에서 삭제
   $sql = "delete from wiz_member where id = '$wiz_session[id]'";
   $result = mysql_query($sql) or error(mysql_error());

   // 찜리스트 삭제
   $sql = "delete from wiz_wishlist where memid = '$wiz_session[id]'";
   $result = mysql_query($sql) or error(mysql_error());
   
   // 적립금 삭제
   $sql = "delete from wiz_reserve where memid = '$wiz_session[id]'";
   $result = mysql_query($sql) or error(mysql_error());

	// 주문내역 삭제(주문자 아이디를 [out] 으로 처리)
	$sql = "update wiz_order set send_id = '".$wiz_session[id]."[out]' where  send_id = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());
	
   // 관리자에게 이메일발송
	if($out_reason != "") $reason .= $out_reason." , ";
   if($out_reason2 != "") $reason .= $out_reason2." , ";
   if($out_reason3 != "") $reason .= $out_reason3." , ";
   if($out_reason4 != "") $reason .= $out_reason4." , ";
   if($out_reason5 != "") $reason .= $out_reason5." , ";
   if($out_reason6 != "") $reason .= $out_reason6." , ";
   if($out_reason7 != "") $reason .= $out_reason7." , ";
   if($out_reason8 != "") $reason .= $out_reason8." , ";
   $addmsg = "탈퇴사유 : ".$reason."<br><br>";
   $addmsg .= "충고내용 : ".$message;
   
   // 회원탈퇴 메일/SMS 발송
	$re_info[name] = $wiz_session[name];
	$re_info[email] = $wiz_session[email];
	$re_info[hphone] = $wiz_session[hphone];
	send_mailsms("mem_apply", $re_info, $addmsg);
   
   if(!empty($wiz_session[id])){
      session_unregister("wiz_session");
   }
   
   comalert("회원탈퇴가 완료되었습니다.", "/");


// 관심상품 추가
}else if($mode == "my_wish"){
   
   
   $sql = "select * from wiz_wishlist where memid = '$wiz_session[id]' and prdcode = '$prdcode'";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   
   if($total > 0 ) error("이미 등록한 관심상품 입니다.");

   $sql = "insert into wiz_wishlist values('', '$wiz_session[id]', '$prdcode', now())";
   $result = mysql_query($sql) or error(mysql_error());
   
   comalert("관심상품에 추가하였습니다.", "");
   
   
   
// 찜리스트 삭제   
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
   	comalert("수정 되었습니다.", "my_qnaview.php?idx=$idx");
   	
	}else if($sub_mode == "delete"){
		
		$sql = "delete from wiz_consult where memid = '$wiz_session[id]' and idx = '$idx'";
   	$result = mysql_query($sql) or error(mysql_error());
   	comalert("삭제 되었습니다.", "my_qna.php");
   	
	}
	
}
?>