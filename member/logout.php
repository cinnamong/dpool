<?

session_start();

if(!empty($wiz_session[id])){

   session_unregister("wiz_session"); 

}

Header("Location: $HTTP_REFERER");

?>