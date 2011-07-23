<?
session_start();

$wizadmin_session = $_COOKIE[wizadmin_session];

if(!empty($wizadmin_session[shop_id])){
	
	setcookie("wizadmin_session[shop_id]", "", time() - 3600);
   setcookie("wizadmin_session[shop_pw]", "", time() - 3600);
   setcookie("wizadmin_session[shop_name]", "", time() - 3600);
   setcookie("wizadmin_session[shop_email]", "", time() - 3600);

}

echo "<script>document.location='./admin_login.html';</script>";

?>