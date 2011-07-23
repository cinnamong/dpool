<?
session_start();

$wizadmin_session = $_COOKIE[wizadmin_session];

if(empty($wizadmin_session[shop_pw])){
   
   echo "<script>document.location='../admin_login.html';</script>";
   
}else{

	$sql = "select shop_id from wiz_shopinfo where shop_id = '$wizadmin_session[shop_id]' and shop_pw = '$wizadmin_session[shop_pw]'";
	$result = mysql_query($sql) or error("관리자 인증시 에러가 발생하였습니다.");
	$total = mysql_num_rows($result);
	
	if($total <= 0){
		session_unregister("wizadmin_session");
		echo "<script>document.location='../admin_login.html';</script>";
	}

}

?>