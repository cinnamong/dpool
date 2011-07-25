<?
if(strlen($HTTP_COOKIE_VARS["wiz_connect"])==0){
   setcookie("wiz_connect", "true");

	// 접속시간 저장                     
   $time = date('YmdH');
   $sql = "select time from wiz_contime where time = '$time'";
   $result = @mysql_query($sql);
   
   if(@mysql_num_rows($result) > 0){
   	
   	$sql = "update wiz_contime set cnt = cnt + 1 where time = '$time'";
   	$result = @mysql_query($sql);
   	
	}else{
	
		$sql = "insert into wiz_contime values('$time',1)";
   	$result = @mysql_query($sql);
   	
	}

	// 접속레퍼러 저장
	$referer = $_SERVER['HTTP_REFERER'];
	$parse_url = parse_url($referer);
	$host = $parse_url[host];
	
   $sql = "select referer from wiz_conrefer where referer = '$referer'";
   $result = @mysql_query($sql);
   
   if(@mysql_num_rows($result) > 0){
   	
   	$sql = "update wiz_conrefer set cnt = cnt + 1 where referer = '$referer'";
   	$result = @mysql_query($sql);
   	
	}else{
	
		$sql = "insert into wiz_conrefer values('$referer','$host',1)";
   	$result = @mysql_query($sql);
   	
	}

}
?>