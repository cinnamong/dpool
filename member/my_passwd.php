<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/login_check.inc";	// �α��� üũ
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; <b>��й�ȣ ����</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ
include "../inc/mem_info.inc"; 		// ȸ�� ����

?>
<script language="JavaScript">
<!--
function inputCheck(frm){
	
	if(frm.pre_passwd.value.length == ""){
      alert("���� ��й�ȣ�� �Է��ϼ���");
      frm.pre_passwd.focus();
      return false;
   }
   if(frm.passwd.value.length < 4 || frm.passwd.value.length > 12){
      alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�");
      frm.passwd.focus();
      return false;
   }
   if(frm.passwd2.value.length < 4 || frm.passwd2.value.length > 12){
      alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�");
      frm.passwd2.focus();
      return false;
   }
   if(frm.passwd.value != frm.passwd2.value){
      alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�");
      frm.passwd.focus();
      return false;
   }

}
//-->
</script>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_o_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
							<? include "my_view.inc"; ?>

					</td></tr>

					<!--��������-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m07_01.gif"></td></tr>
					<form name="frm" action="my_save.php" method="post" onSubmit="return inputCheck(this)">
               <input type="hidden" name="mode" value="my_passwd">
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td bgcolor=#939393 height=3></td></tr>
							<tr><td>
													
													<table border=0 cellpadding=0 cellspacing=0 width=100%>
													<tr height=28>
														<td width=20><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/form_01_04.gif"></td>
														<td><input type=password name="pre_passwd" size=20 class="input">
														&nbsp;&nbsp;&nbsp;<span class="s11">(4�� �̻��� ����, ����)</span></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_01_05.gif"></td>
														<td><input type=password name="passwd" size=20 class="input">
														&nbsp;&nbsp;&nbsp;<span class="s11">(4�� �̻��� ����, ����)</span></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_01_03.gif"></td>
														<td><input type=password name="passwd2" size=20 class="input">
														&nbsp;&nbsp;&nbsp;<span class="s11">(4�� �̻��� ����, ����)</span></td></tr>
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