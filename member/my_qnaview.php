<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/login_check.inc";	// �α��� üũ
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; <b>1:1 Q&A</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ
include "../inc/mem_info.inc"; 		// ȸ������

$sql = "select * from wiz_consult where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$qna_info = mysql_fetch_object($result);
?>
<script language="javascript">
<!--
function delConfrm(){
	if(confirm("�����Ͻðڽ��ϱ�.")){
		document.location = "my_save.php?mode=my_qna&sub_mode=delete&idx=<?=$idx?>";
	}
}
-->
</script>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					  <tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_o_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
							<? include "my_view.inc"; ?>

					</td></tr>

					<!--1:1������Ȳ-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m04_02.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td colspan=5 bgcolor=#939393 height=3></td></tr>
							<tr>
							  <td height="30" width="100"><img src="/images/bbsimg/write_t_title.gif"></td>
							  <td><?=$qna_info->subject?></td></tr>
							<tr><td colspan="2" height="1" background="/images/bbsimg/board_bg.gif"></td></tr>
							<tr><td height="30">
									<table border="0" cellpadding="0" cellspacing="0" width="63" height="100%">
									<tr><td background="/images/bbsimg/write_t_bg1.gif" height="4"></td></tr>
									<tr><td background="/images/bbsimg/write_t_bg2.gif"><img src="/images/bbsimg/write_t_q.gif"></td></tr>
									<tr><td background="/images/bbsimg/write_t_bg3.gif" height="4"></td></tr>
									</table>
								</td>
								<td style="padding:5 0 5 0"><?=$qna_info->question?></td></tr>
							<tr><td height="30">
									<table border="0" cellpadding="0" cellspacing="0" width="63" height="100%">
									<tr><td background="/images/bbsimg/write_t_bg1.gif" height="4"></td></tr>
									<tr><td background="/images/bbsimg/write_t_bg2.gif"><img src="/images/bbsimg/write_t_a.gif"></td></tr>
									<tr><td background="/images/bbsimg/write_t_bg3.gif" height="4"></td></tr>
									</table>
								</td>
								<td style="padding:5 0 5 0"><?=$qna_info->answer?></td></tr>
							<tr><td colspan="2" height="1" bgcolor=#ffffff></td></tr>
							<tr><td colspan="2" height="2" background="/images/bbsimg/board_bg.gif"></td></tr>
							</table>
						</td></tr>
						<tr>
						  <td colspan="5" align="right" height=63>
						   <a href="my_qna.php"><img src="/images/bbsimg/btn_list.gif" border="0"></a> &nbsp;  
						   <a href="my_qnainput.php?sub_mode=modify&idx=<?=$idx?>"><img src="/images/bbsimg/btn_edit.gif" border="0"></a> &nbsp; 
						   <a href="javascript:delConfrm();"><img src="/images/bbsimg/btn_del.gif" border="0"></a>
						   &nbsp; &nbsp; &nbsp; 
						  </td>
						</tr>
				  </table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>