<?

include "$DOCUMENT_ROOT/module/main_img.inc";		// �����̹���
include "$DOCUMENT_ROOT/module/notice.inc";			// ��������
include "$DOCUMENT_ROOT/module/right_banner.inc";	// �������
include "$DOCUMENT_ROOT/module/main_product.inc";	// ��ǰ����

if($design_info->main_type == "SKIN") {

	include "$DOCUMENT_ROOT/skin/main/$design_info->main_file";
	
}else {
	
	include "$DOCUMENT_ROOT/skin/main.inc";
	
}

?>