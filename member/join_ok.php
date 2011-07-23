<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$page_type = "join";
$now_position = "<a href=/>Home</a> &gt; 회원가입 &gt; 가입완료";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
<br><br><br><br>
<table align=center>
  <tr><td><a href="/"><img src="/images/join_complete.gif" border="0"></a></td></tr>
</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>