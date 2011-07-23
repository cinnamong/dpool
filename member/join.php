<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; 회원가입 &gt; <b>가입약관</b>";
$page_type = "join";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
<script language="javascript">
<!--
function checkAgree(){
	if(document.frm.agree.checked != true){
		alert("약관동의후 가입하세요.");
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
							  <iframe width="660" height="210" frameborder="0" src="join_agree.php" style="BACKGROUND: #ffffff; COLOR: #585858; font:9pt 돋움;border:1px #dddddd solid"></iframe>
<br><br>
							  <iframe width="660" height="210" frameborder="0" src="join_privacy.php" style="BACKGROUND: #ffffff; COLOR: #585858; font:9pt 돋움;border:1px #dddddd solid"></iframe>
							</td></tr>
							<tr><td height=30 align=center bgcolor=#f1f1f1>
								<input name="agree" type="checkbox" value="radiobutton" style="border:0px; background-color:transparent;">
								위 약관 및 정책에 동의합니다.<!--img src="/images/join_agree.gif" align=absmiddle-->
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

include "../inc/footer.inc"; 		// 하단디자인

?>