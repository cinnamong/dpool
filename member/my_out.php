<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/login_check.inc";	// �α��� üũ
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; <b>ȸ��Ż��</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ
include "../inc/mem_info.inc"; 		// ȸ�� ����

?>
<script language="JavaScript">
<!--
function inputCheck(frm){

	var reason = 0;
	if(frm.out_reason.checked == true) reason++;
	if(frm.out_reason2.checked == true) reason++;
	if(frm.out_reason3.checked == true) reason++;
	if(frm.out_reason4.checked == true) reason++;
	if(frm.out_reason5.checked == true) reason++;
	if(frm.out_reason6.checked == true) reason++;
	if(frm.out_reason7.checked == true) reason++;
	if(frm.out_reason8.checked == true) reason++;
	
	if(reason <= 0){
		alert("�����ߴ� ���� �������ּ���");
		frm.out_reason.focus();
		return false;
	}
	if(frm.message.value == ""){
		alert("���ɾ ��� ��Ź�帳�ϴ�.");
		frm.message.focus();
		return false;
	}
	if(!confirm("���� Ż���Ͻðڽ��ϱ�")) return false;
}
//-->
</script>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<form name="frm" action="my_save.php" method="post" onSubmit="return inputCheck(this)">
               <input type="hidden" name="mode" value="my_out">
					<tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_o_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
							<? include "my_view.inc"; ?>

					</td></tr>

					<!--��������-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m08_01.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td bgcolor=#939393 height=3></td></tr>
							<tr><td style="padding:10 20 10 20" bgcolor=#f7f7f7>
									
									���Բ��� ȸ�� Ż�� ���ϽŴٴ� ���� ���θ��� ���񽺰� ���� �����ϰ� �����߳� ���ϴ�.<br>
									�����ϼ̴� ���̳� �Ҹ������� �˷��ֽø� ���� �ݿ��ؼ�<br>
									������ �������� �ذ��� �帮���� ����ϰڽ��ϴ�. �ƿ﷯ ȸ�� Ż����� �Ʒ� ������ �����Ͻñ� �ٶ��ϴ�.<br><br>

									1. ȸ�� Ż�� �� ������ ������ ��ǰ ��ǰ �� A/S�� ���� ���ڻ�ŷ� ����� �Һ��� ��ȣ�� ���� ������ �ǰ���<br>
									   &nbsp;&nbsp;&nbsp;������ ��ȣ��å������ ���� �˴ϴ�.<br>
									2. Ż�� �� ���Բ��� �����ϼ̴� �������� ���� �˴ϴ�.
							</td></tr>
							<tr><td bgcolor=#dddddd height=1></td></tr>
							<tr><td>
													
													<table border=0 cellpadding=0 cellspacing=0 width=100%>
													<tr height=28>
														<td width=20><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/my_out_01.gif"></td>
														<td>
														<input name="out_reason" value="������ �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">������ �Ҹ�
														<input name="out_reason2" value="��ۺҸ�" type="checkbox" style="border:0px; background-color:transparent;">��ۺҸ� 
														<input name="out_reason3" value="��ȯ/ȯ��/��ǰ �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">��ȯ/ȯ��/��ǰ �Ҹ�
														<input name="out_reason4" value="�湮 �󵵰� ����" type="checkbox" style="border:0px; background-color:transparent;">�湮 �󵵰� ���� 
														<br>
														<input name="out_reason5" value="��ǰ���� �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">��ǰ���� �Ҹ�
														<input name="out_reason6" value="���� �������� ���" type="checkbox" style="border:0px; background-color:transparent;">���� �������� ��� 
														<input name="out_reason7" value="���θ��� �ŷڵ� �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">���θ��� �ŷڵ� �Ҹ�
														<input name="out_reason8" value="���� ��� �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">���� ��� �Ҹ� 
														</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/my_out_03.gif"></td>
														<td style="padding:3 0 3 0"><textarea name="message" cols="70" rows="3" class="input"></textarea></td></tr>
													</table>
							</td></tr>
							<tr><td bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td bgcolor=#dddddd height=1></td></tr>
							</table>
					</td></tr>
					<tr><td colspan="5" align="center" height=63>
								<input type="image" src="/images/bbsimg/btn_ok.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="/images/bbsimg/btn_cancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
					</td></tr>
					</form>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>