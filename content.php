<?

include "./inc/global.inc"; 		// DB���ؼ�, ������ �ľ�
include "./inc/connect.inc";		// ����ī����
include "./inc/util_lib.inc"; 	// ��ƿ ���̺귯��
include "./inc/shop_info.inc"; 	// �����
include "./inc/design_info.inc"; // ������ ����

include "./inc/header.inc"; 		// ��ܵ�����

// ���������� ���� ���
$sql = "select content from wiz_content where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
echo $row->content;

include "./inc/footer.inc"; 		// �ϴܵ�����

?>