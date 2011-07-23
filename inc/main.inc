<?

include "$DOCUMENT_ROOT/module/main_img.inc";		// 메인이미지
include "$DOCUMENT_ROOT/module/notice.inc";			// 공지사항
include "$DOCUMENT_ROOT/module/right_banner.inc";	// 우측배너
include "$DOCUMENT_ROOT/module/main_product.inc";	// 상품시작

if($design_info->main_type == "SKIN") {

	include "$DOCUMENT_ROOT/skin/main/$design_info->main_file";
	
}else {
	
	include "$DOCUMENT_ROOT/skin/main.inc";
	
}

?>