<?
include "../inc/global.inc";

if(empty($_POST[shop_id])) error("���̵� �Է��ϼ���.");

if(empty($_POST[shop_pw])) error("��й�ȣ�� �Է��ϼ���.");

$sql = "select * from wiz_shopinfo where shop_id = '$shop_id' and shop_pw = '$shop_pw'";
//echo $sql;
$result = mysql_query($sql) or error("������������ ������ �߻��Ͽ����ϴ�.");

if($row = mysql_fetch_object($result)){
   
   // ������ ���� ��Ű����(���ǽ� �ð������ �α׾ƿ���)
   setcookie("wizadmin_session[shop_id]",$row->shop_id);
   setcookie("wizadmin_session[shop_pw]",$row->shop_pw);
   setcookie("wizadmin_session[shop_name]",$row->shop_name);
   setcookie("wizadmin_session[shop_email]",$row->shop_email);
   setcookie("wizadmin_session[shop_tel]",$row->com_tel);
 
   Header("Location: main/main.php");
   
}else{
   
   error("���̵�� ��й�ȣ�� ���� �ʽ��ϴ�.");
   
}
?>