<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�

// �α��� ���� ������� �α��� �������� �̵�
if(empty($wiz_session[id]) && empty($order_guest)){
	echo "<script>document.location='/member/login.php?prev=$PHP_SELF&order=true';</script>";
	exit;
}
$now_position = "<a href=/>Home</a> &gt; �ֹ��ϱ� &gt; <b>�ֹ����� �Է�</b>";
$page_type = "orderform";

include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����
include "../inc/mem_info.inc"; 		// ȸ�� ����
include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

// ȸ�������� ��������
if($oper_info->reserve_use == "Y" && $wiz_session[id] != ""){
	
	$sql = "select sum(reserve) as reserve from wiz_reserve where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	if($row->reserve == "") $mem_info->reserve = 0;
	else $mem_info->reserve = $row->reserve;
	
}else{
	$mem_info->reserve = 0;
}

?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
function sameCheck(frm){
	
   if(frm.same_check.checked == true){
      frm.rece_name.value = frm.send_name.value;
      
      frm.rece_tphone.value = frm.send_tphone.value;
      frm.rece_tphone2.value = frm.send_tphone2.value;
      frm.rece_tphone3.value = frm.send_tphone3.value;
      
      frm.rece_hphone.value = frm.send_hphone.value;
      frm.rece_hphone2.value = frm.send_hphone2.value;
      frm.rece_hphone3.value = frm.send_hphone3.value;
      
      frm.rece_post.value = frm.send_post.value;
      frm.rece_post2.value = frm.send_post2.value;
      frm.rece_address.value = frm.send_address.value;
      frm.rece_address2.value = frm.send_address2.value;
      
   }else{
      frm.rece_name.value = "";
      frm.rece_tphone.value = "";
      frm.rece_tphone2.value = "";
      frm.rece_tphone3.value = "";
      frm.rece_hphone.value = "";
      frm.rece_hphone2.value = "";
      frm.rece_hphone3.value = "";
      frm.rece_post.value = "";
      frm.rece_post2.value = "";
      frm.rece_address.value = "";
      frm.rece_address2.value = "";
   }

}

function inputCheck(frm){
	
   if(frm.send_name.value == ""){
      alert("�� ������ �Է��ϼ���");
      frm.send_name.focus();
      return false;
   }else{
      if(!Check_nonChar(frm.send_name.value)){
         alert("�� ������ Ư�����ڰ� �� �� �����ϴ�");
         frm.send_name.focus();
         return false;
      }
   }
   
   if(frm.send_tphone.value == ""){
      alert("�� ��ȭ��ȣ�� �Է��ϼ���.");
      frm.send_tphone.focus();
      return false;
   }else if(!Check_Num(frm.send_tphone.value)){
      alert("������ȣ�� ���ڸ� �����մϴ�.");
      frm.send_tphone.focus();
      return false;
   }
   
   if(frm.send_tphone2.value == ""){
      alert("�� ��ȭ��ȣ�� �Է��ϼ���.");
      frm.send_tphone2.focus();
      return false;
   }else if(!Check_Num(frm.send_tphone2.value)){
      alert("������ ���ڸ� �����մϴ�.");
      frm.send_tphone2.focus();
      return false;
   }
   
   if(frm.send_tphone3.value == ""){
      alert("�� ��ȭ��ȣ�� �Է��ϼ���.");
      frm.send_tphone3.focus();
      return false;
   }else if(!Check_Num(frm.send_tphone3.value)){
      alert("��ȭ��ȣ�� ���ڸ� �����մϴ�.");
      frm.send_tphone3.focus();
      return false;
   }
   
   
   if(frm.send_email.value == ""){
      alert("�� �̸����� �Է��ϼ���.");
      frm.send_email.focus();
      return false;
   }else if(!check_Email(frm.send_email.value)){
      return false;
   }

   if(frm.send_address.value == ""){
      alert("�ֹ��Ͻôº� �ּҸ� �Է��ϼ���");
      frm.send_address.focus();
      return false;
   }
   if(frm.send_address2.value == ""){
      alert("�ֹ��Ͻôº� ���ּҸ� �Է��ϼ���");
      frm.send_address2.focus();
      return false;
   }
   
   if(frm.rece_name.value == ""){
      alert("�����ôº� ������ �Է��ϼ���");
      frm.rece_name.focus();
      return false;
   }else{
      if(!Check_nonChar(frm.rece_name.value)){
         alert("�����ôº� ������ Ư�����ڰ� �� �� �����ϴ�");
         frm.rece_name.focus();
         return false;
      }
   }
   
   if(frm.rece_tphone.value == ""){
      alert("�����ôº� ��ȭ��ȣ�� �Է��ϼ���.");
      frm.rece_tphone.focus();
      return false;
   }else if(!Check_Num(frm.rece_tphone.value)){
      alert("������ȣ�� ���ڸ� �����մϴ�.");
      frm.rece_tphone.focus();
      return false;
   }
   if(frm.rece_tphone2.value == ""){
      alert("�����ôº� ��ȭ��ȣ�� �Է��ϼ���.");
      frm.rece_tphone2.focus();
      return false;
   }else if(!Check_Num(frm.rece_tphone2.value)){
      alert("������ ���ڸ� �����մϴ�.");
      frm.rece_tphone2.focus();
      return false;
   }
   if(frm.rece_tphone3.value == ""){
      alert("�����ôº� ��ȭ��ȣ�� �Է��ϼ���.");
      frm.rece_tphone3.focus();
      return false;
   }else if(!Check_Num(frm.rece_tphone3.value)){
      alert("��ȭ��ȣ�� ���ڸ� �����մϴ�.");
      frm.rece_tphone3.focus();
      return false;
   }

   if(frm.rece_address.value == ""){
      alert("�����ôº� �ּҸ� �Է��ϼ���");
      frm.rece_address.focus();
      return false;
   }
   if(frm.rece_address2.value == ""){
      alert("�����ôº� ���ַθ� �Է��ϼ���");
      frm.rece_address2.focus();
      return false;
   }
   if(!reserveUse(frm)){
   	return false;
   }

}

// �ֹ��� �����ȣ
function zipSearch(){
	
   document.frm.send_address.focus();
   var url = "/member/zip_search.php?kind=send_";
   window.open(url, "zipSearch", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");

}

// ������ �����ȣ
function zipSearch2(){
	
   document.frm.rece_address.focus();
   var url = "/member/zip_search.php?kind=rece_";
   window.open(url, "zipSearch2", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");

}

// ������ ���
function reserveUse(frm){
	
	if(frm.reserve_use != null){
		
		var reserve_use = frm.reserve_use.value;
		
		if(reserve_use != ""){
			
		   if(reserve_use != "" && !Check_Num(reserve_use)){
		   	
		      alert("�������� ���ڸ� �����մϴ�.");
		      frm.reserve_use.value = "";
		      frm.reserve_use.focus();
		      return false;
		      
		   }else if(reserve_use > <?=$mem_info->reserve?>){
		   	
		      alert("��밡�ɾ� ���� �����ϴ�.");
		      frm.reserve_use.value = "<?=$mem_info->reserve?>";
		      frm.reserve_use.focus();
		      return false;
		      
		   }else if(reserve_use < <?=$oper_info->reserve_min?>){
		   	
		   	alert("�ּһ�� ������ ���� �۽��ϴ�. <?=number_format($oper_info->reserve_min)?>�� �̻� ��밡���մϴ�.");
		      frm.reserve_use.value = "";
		      return false;
		      
		   }else if(reserve_use > <?=$oper_info->reserve_max?>){
		   	
		   	alert("�ִ��� ������ ���� Ů�ϴ�. <?=number_format($oper_info->reserve_max)?>�� ���� ��밡���մϴ�.");
		      frm.reserve_use.value = "";
		      return false;
		      
		   }
		   
		}
		
	}
	
	return true;
	
}
//-->
</script>


					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=686>
							<tr><td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title01.gif"></td>
										<td align=right>
												<table border=0 cellpadding=0 cellspacing=0>
												<tr><td><img src="/images/cart_dir_01.gif"></td>
													<td><img src="/images/cart_dir_o_02.gif"></td>
													<td><img src="/images/cart_dir_03.gif"></td>
													<td><img src="/images/cart_dir_04.gif"></td></tr>
												</table>
										</td></tr>
									</table>
							</td></tr>
							</table>

					      <? include "prd_baklist.inc"; ?>
					      
						   <table border=0 cellpadding=0 cellspacing=0 width=686>
						   <form name="frm" action="order_save.php" method="post" onSubmit="return inputCheck(this)">
					      <?
							// ������ ���
							if($oper_info->reserve_use == "Y" && 
							$mem_info->reserve > 0 && 
							$mem_info->reserve >= $oper_info->reserve_min){
							?>
							  <tr>
						       <td>
									<table width="655" border="0" cellspacing="0" cellpadding="0">
									<tr>
									<td>
									<table border="0" cellspacing="0" cellpadding="0" height="30">
									<tr>
									<td><b><font color="red">�����ݻ��</font></b></td>
									<td>:&nbsp;�� <?=number_format($mem_info->reserve)?>����&nbsp;</td>
									<td><input type="text" name="reserve_use" size="15" class="input" onchange="reserveUse(this.form);"></td>
									<td>&nbsp;�� ���</td>
									</tr>
									</table>
									</td>
									</tr>
									</table>
								 </td>
						     </tr>
						     <tr><td height="10"></td></tr>
							<?
							}
							?>
							  <tr>
							    <td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title02.gif"></td></tr>
									<tr><td height=3 bgcolor=#999999></td></tr>
									<tr><td bgcolor=#F9F9F9 style="padding:10">
									
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										<tr><td style="padding:5">
													<table>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>�ֹ��Ͻô� ��</td>
														<td><input type=text name="send_name" value="<?=$mem_info->name?>" size=25 class="input"></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>��ȭ��ȣ</td>
														<td>
														  <input type=text name="send_tphone" value="<?=$mem_tphone[0]?>" size=3 class="input"> - 
														  <input type=text name="send_tphone2" value="<?=$mem_tphone[1]?>" size=4 class="input"> - 
														  <input type=text name="send_tphone3" value="<?=$mem_tphone[2]?>" size=4 class="input">
														</td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>�޴���ȭ��ȣ</td>
														<td>
														  <input type=text name="send_hphone" value="<?=$mem_hphone[0]?>" size=3 class="input"> - 
														  <input type=text name="send_hphone2" value="<?=$mem_hphone[1]?>" size=4 class="input"> - 
														  <input type=text name="send_hphone3" value="<?=$mem_hphone[2]?>" size=4 class="input">
														</td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>�̸���</td>
														<td><input type=text name="send_email" value="<?=$mem_info->email?>" size=30 class="input"></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>�� ��</td>
														<td>
														  <input type=text name="send_post" value="<?=$mem_post[0]?>" size=7 class="input"> - 
														  <input type=text name="send_post2" value="<?=$mem_post[1]?>" size=7 class="input"> 
														<a href="javascript:zipSearch();"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>���ּ�</td>
														<td><input type=text name="send_address" value="<?=$mem_info->address?>" size=70 class="input"></td></tr>
													<tr height=25>
														<td></td>
														<td></td>
														<td><input type=text name="send_address2" value="<?=$mem_info->address2?>" size=70 class="input"></td></tr>
													</table>
										</td></tr>
										</table>

									</td></tr>
									</table>
							</td></tr>
							<tr><td style="padding:15 0 0 0">
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title03.gif"></td>
										<td align=right><input type="checkbox" name="same_check" style="border:0px" onClick="sameCheck(this.form);"><img src="/images/order_c01.gif" align=absmiddle></td></tr>
									<tr><td height=3 bgcolor=#999999 colspan=2></td></tr>
									<tr><td bgcolor=#F9F9F9 style="padding:10" colspan=2>
									
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										<tr><td style="padding:5">
													<table>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>�����ô� ��</td>
														<td><input type=text name="rece_name" size=25 class="input"></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>��ȭ��ȣ</td>
														<td>
														  <input type=text name="rece_tphone" size=3 class="input"> - 
														  <input type=text name="rece_tphone2" size=4 class="input"> - 
														  <input type=text name="rece_tphone3" size=4 class="input"></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>�޴���ȭ��ȣ</td>
														<td>
														  <input type=text name="rece_hphone" size=3 class="input"> - 
														  <input type=text name="rece_hphone2" size=4 class="input"> - 
														  <input type=text name="rece_hphone3" size=4 class="input"></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>�� ��</td>
														<td>
														  <input type=text name="rece_post" size=7 class="input"> - 
														  <input type=text name="rece_post2" size=7 class="input"> 
														<a href="javascript:zipSearch2();"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>���ּ�</td>
														<td><input type=text name="rece_address" size=70 class="input"></td></tr>
													<tr height=25>
														<td></td>
														<td></td>
														<td><input type=text name="rece_address2" size=70 class="input"></td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"><br><br></td>
														<td>��û����<br><br></td>
														<td><textarea name="textarea" name="demand" cols="80" rows="4" class="input"></textarea></td></tr>
													</table>
										</td></tr>
										</table>

									</td></tr>
									</table>
							</td></tr>
							<tr><td style="padding:15 0 20 0">
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title04.gif"></td></tr>
									<tr><td height=3 bgcolor=#999999></td></tr>
									<tr><td bgcolor=#F9F9F9 style="padding:10">
									
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										<tr><td style="padding:5">
													<table>
													<tr><td><img src="/images/blue_icon.gif"></td>
														<td width=100>�������</td>
														<td> 
														<?
														
														$pay_method = explode("/",$oper_info->pay_method);
								                  for($ii=0; $ii<count($pay_method)-1; $ii++){
								                     
								                     if($pay_method[$ii] == "PC") $pay_title = "ī�����";
								                     else if($pay_method[$ii] == "PB") $pay_title = "�������Ա�";
								                     else if($pay_method[$ii] == "PH") $pay_title = "�޴�������";
								                     
								                     if($ii == 0) $checked = "checked";
								                     else $checked = "";
								                     echo "<input type='radio' name='pay_method' value='$pay_method[$ii]' $checked>$pay_title &nbsp;";
								                     
								                  }
														
														?>
														</td></tr>
													</table>
										</td></tr>
										</table>

									</td></tr>
									</table>
							</td></tr>
							<tr><td height=1 background="/images/dot.gif"></td></tr>
							<tr><td height=80 align=center>
								<input type="image" src="/images/but_pay.gif" border=0></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="/images/but_cancel.gif" border=0 onClick="history.go(-1);" style="cursor:hand">
							</td></tr>
							</form>
							</table>
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>