<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/oper_info.inc";		// �����
include "../inc/util_lib.inc";		// ��ƿ���̺귯��

$level 		= "CM";

$resno 		= $resno."-".$resno2;
$post 		= $post."-".$post2;
$tphone 		= $tphone."-".$tphone2."-".$tphone3;
$hphone 		= $hphone."-".$hphone2."-".$hphone3;
$birthday 	= $birthday."-".$birthday2."-".$birthday3;
$memorial 	= $memorial."-".$memorial2."-".$memorial3;

for($ii=0; $ii<count($consph); $ii++){ $tmpconsph .= $consph[$ii]."/"; }
for($ii=0; $ii<count($conprd); $ii++){ $tmpconprd .= $conprd[$ii]."/"; }

if($_POST[id] == "") error("�ʿ��� ������ ���޵��� �ʾҽ��ϴ�.");
if($_POST[passwd] == "") error("�ʿ��� ������ ���޵��� �ʾҽ��ϴ�.");
if($_POST[name] == "") error("�ʿ��� ������ ���޵��� �ʾҽ��ϴ�.");



// �ֹι�ȣ �ߺ�üũ
if($resno != "-"){
$sql = "select id from wiz_member where resno = '$resno'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
if($total > 0) error("�̵̹�ϵ� �ֹι�ȣ �Դϴ�.\\n\\nȸ�������Ͻ����� ���ٸ� �����Ͻñ� �ٶ��ϴ�.");
}

// �Է����� ����
$sql = "insert into wiz_member values('$id', '$passwd', '$name', '$resno', '$email', '$tphone', '$hphone', '$post', '$address', '$address2', '$reemail', '$resms', 
									'$birthday', '$bgubun', '$marriage', '$memorial', '$scholarship', '$job', '$income', '$car', '$consph', '$conprd', 
									'$level', '$recom', '$visit', '$visit_time','', now())";
									
$result = mysql_query($sql) or error(mysql_error());



// ������ ó��
if($oper_info->reserve_use == "Y"){
   
   // ȸ������ �������̺� ����
   if($oper_info->reserve_join > 0){
   	
      $reserve_msg = "ȸ������ ������";
      
      $sql = "insert into wiz_reserve values('', '$id', '$reserve_msg', '$oper_info->reserve_join', '$orderid', now())";
      $result = mysql_query($sql) or error(mysql_error());

   }
   
   // ��õ�� ������ ����
   if($oper_info->reserve_recom > 0 && !empty($recom) && $id != $recom){
   	
      $reserve_msg = "[$id] ���Խ� ��õ�� ������";
      
      $sql = "insert into wiz_reserve values('', '$recom', '$reserve_msg', '$oper_info->reserve_recom', '$orderid', now())";
      $result = mysql_query($sql) or error(mysql_error());
      
   }
   
}

// ȸ������ ���� ����/SMS �߼�
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

