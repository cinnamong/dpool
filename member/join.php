<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$now_position = "<a href=/>Home</a> &gt; ȸ������ &gt; <b>���Ծ��</b>";
$page_type = "join";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>
<script language="javascript">
<!--
function checkAgree(){
	if(document.frm.agree.checked != true){
		alert("��������� �����ϼ���.");
	}else{
		document.location = "join_form.php";
	}
}
-->
</script>
					<table border=0 cellpadding=0 cellspacing=0 width=700>
					<tr><td align=center style="padding:5 0 0 0">
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<form name="frm">
							<tr><td align=center><img src="/images/join_01.gif"></td></tr>
							<tr><td height=10></td></tr>
							<tr><td align=center bgcolor=#ffffff style="padding:10 0 10 0">
							  <iframe width="660" height="210" frameborder="0" src="join_agree.php" style="BACKGROUND: #ffffff; COLOR: #585858; font:9pt ����;border:1px #dddddd solid"></iframe>
<br><br>
							  <iframe width="660" height="210" frameborder="0" src="join_privacy.php" style="BACKGROUND: #ffffff; COLOR: #585858; font:9pt ����;border:1px #dddddd solid"></iframe>
							</td></tr>
							<tr><td height=30 align=center bgcolor=#f1f1f1>
								<input name="agree" type="checkbox" value="radiobutton" style="border:0px; background-color:transparent;">
								�� ��� �� ��å�� �����մϴ�.<!--img src="/images/join_agree.gif" align=absmiddle-->
							</td></tr>
							<tr><td height=100 align=center>
								<img src="/images/join_btn_ok.gif" border=0 onClick="checkAgree();" style="cursor:hand"></a>&nbsp;&nbsp;&nbsp;
								<img src="/images/join_btn_cancel.gif" border=0 onClick="history.go(-1);" style="cursor:hand"></a>
							</td></tr>
							</form>
							</table>
														
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>