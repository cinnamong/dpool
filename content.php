<?

include "./inc/global.inc"; 		// DB컨넥션, 접속자 파악
include "./inc/connect.inc";		// 접소카운터
include "./inc/util_lib.inc"; 	// 유틸 라이브러리
include "./inc/shop_info.inc"; 	// 운영정보
include "./inc/design_info.inc"; // 디자인 정보

include "./inc/header.inc"; 		// 상단디자인

// 페이지생성 내용 출력
$sql = "select content from wiz_content where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
echo $row->content;

include "./inc/footer.inc"; 		// 하단디자인

?>