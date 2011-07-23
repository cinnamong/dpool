<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; 고객센터 &gt; <b>개인정보보호정책</b>";
$page_type = "privacy";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
               <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align=center><br>
						<table border=0 cellpadding=0 cellspacing=0 width=695>
						<tr>
						  <td>
	                 <?=$page_info->content?>
	                 </td>
						</tr>
						</table>
					  </td>
               </tr>
               </table>
<?

include "../inc/footer.inc"; 		// 하단디자인

?>