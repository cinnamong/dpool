<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc";		// util ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$now_position = "<a href=/>Home</a> &gt; ���̵� / ��й�ȣ ã��";
$page_type = "login";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

if($idsearch == "ok"){
	
	$resno = $resno."-".$resno2;
   $sql = "select id,passwd,name,email,hphone from wiz_member where name = '$name' and email = '$email' and resno = '$resno'";
   $result = mysql_query($sql) or error(mysql_error());
   
   if($row = mysql_fetch_object($result)){
      
      $addmsg = "<b>���̵�</b> : $row->id &nbsp; &nbsp; &nbsp; ";
      $addmsg .= "<b>��й�ȣ</b> : $row->passwd";
      
      $re_info[name] = $row->name;
		$re_info[email] = $row->email;
		$re_info[hphone] = $row->hphone;
		send_mailsms("mem_idpw", $re_info, $addmsg);
      
      comalert("���̵�� ��й�ȣ�� ȸ������ �̸��Ϸ� ������Ƚ��ϴ�.");
      
   }else{
   
      error("ȸ�������� ��ġ���� �ʽ��ϴ�.");
      
   }
   
}

?>

					<table border=0 cellpadding=0 cellspacing=0 width=700>
					<form name="frm" action="<?=$PHP_SELF?>" method="post">
					<input type="hidden" name="idsearch" value="ok">
					  <tr><td align=center style="padding:20 0 0 0">
							<table border=0 cellpadding=0 cellspacing=0>
							<tr><td><img src="/images/member_idsearch_01.gif"></td></tr>
							<tr><td background="/images/member_login_tbg1.gif" style="padding:10">
									<table border=0 cellpadding=0 cellspacing=0 align=center>
									<tr height=27>
										<td width=300><img src="/images/member_name.gif" align=absmiddle><input type=text name="name" class=input></input></td>
										<td rowspan=3><input type="image" src="/images/member_btn_ok.gif"></td></tr>
									<tr height=27><td><img src="/images/member_email.gif" align=absmiddle><input type=text name="email" class=input></input></td></tr>
									<tr height=27><td><img src="/images/member_jumin.gif" align=absmiddle><input type=text name="resno" size=10 class=input></input> - <input type=password name="resno2" size=10 class=input></input></td></tr>
									</table>
							</td></tr>
							<tr><td height=11 background="/images/member_login_tbg2.gif"></td></tr>
							</table>
					    </td>
					  </tr>
					  <tr><td height=50 style="padding:0 0 0 50"><img src="/images/member_searchid_02.gif"></td></tr>
					</form>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>