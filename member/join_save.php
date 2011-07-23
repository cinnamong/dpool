<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/oper_info.inc";		// 운영정보
include "../inc/util_lib.inc";		// 유틸라이브러리

$level 		= "CM";

$resno 		= $resno."-".$resno2;
$post 		= $post."-".$post2;
$tphone 		= $tphone."-".$tphone2."-".$tphone3;
$hphone 		= $hphone."-".$hphone2."-".$hphone3;
$birthday 	= $birthday."-".$birthday2."-".$birthday3;
$memorial 	= $memorial."-".$memorial2."-".$memorial3;

for($ii=0; $ii<count($consph); $ii++){ $tmpconsph .= $consph[$ii]."/"; }
for($ii=0; $ii<count($conprd); $ii++){ $tmpconprd .= $conprd[$ii]."/"; }

if($_POST[id] == "") error("필요한 정보가 전달되지 않았습니다.");
if($_POST[passwd] == "") error("필요한 정보가 전달되지 않았습니다.");
if($_POST[name] == "") error("필요한 정보가 전달되지 않았습니다.");



// 주민번호 중복체크
if($resno != "-"){
$sql = "select id from wiz_member where resno = '$resno'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
if($total > 0) error("이미등록된 주민번호 입니다.\\n\\n회원가입하신적이 없다면 문의하시기 바랍니다.");
}

// 입력정보 저장
$sql = "insert into wiz_member values('$id', '$passwd', '$name', '$resno', '$email', '$tphone', '$hphone', '$post', '$address', '$address2', '$reemail', '$resms', 
									'$birthday', '$bgubun', '$marriage', '$memorial', '$scholarship', '$job', '$income', '$car', '$consph', '$conprd', 
									'$level', '$recom', '$visit', '$visit_time','', now())";
									
$result = mysql_query($sql) or error(mysql_error());



// 적립금 처리
if($oper_info->reserve_use == "Y"){
   
   // 회원가입 적립테이블에 저장
   if($oper_info->reserve_join > 0){
   	
      $reserve_msg = "회원가입 적립금";
      
      $sql = "insert into wiz_reserve values('', '$id', '$reserve_msg', '$oper_info->reserve_join', '$orderid', now())";
      $result = mysql_query($sql) or error(mysql_error());

   }
   
   // 추천인 적립금 저장
   if($oper_info->reserve_recom > 0 && !empty($recom) && $id != $recom){
   	
      $reserve_msg = "[$id] 가입시 추천인 적립금";
      
      $sql = "insert into wiz_reserve values('', '$recom', '$reserve_msg', '$oper_info->reserve_recom', '$orderid', now())";
      $result = mysql_query($sql) or error(mysql_error());
      
   }
   
}

// 회원가입 축하 메일/SMS 발송
$addmsg = "
    <table cellpadding=0 cellspacing=0 width=100%>
    <tr>
	  <td background=http://$HTTP_HOST/images/mailimg/01_y_bg.gif height=43 style=padding:0 0 0 30>&nbsp; 
		<img src=http://$HTTP_HOST/images/mailimg/01_id.gif align=absmiddle><font color=#A18100><b>$id</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src=http://$HTTP_HOST/images/mailimg/01_pw.gif align=absmiddle><font color=#A18100><b>$passwd</b>
	  </td>
	</tr>
	</table>
";

$re_info[name] = $name;
$re_info[email] = $email;
$re_info[hphone] = $hphone;
send_mailsms("mem_apply", $re_info, $addmsg);

Header("Location: join_ok.php");

?>

