<?
include "../inc/global.inc";

$sql = "select * from wiz_member where id='$id' and passwd='$passwd'";
$result = mysql_query($sql) or error(mysql_errno());
$row = mysql_fetch_object($result);
$total = mysql_num_rows($result);

if($total > 0){

   //방문회수 증가
   $sql = "update wiz_member set visit = visit+1 , visit_time = now() where id='$row->id' and passwd='$row->passwd'";
   $result = mysql_query($sql) or error(mysql_error());
   
   $wiz_session = array(
                     "id" => $row->id,
                     "name" => $row->name,
                     "email" => $row->email,
                     "level" => $row->level
                     );
                     
   session_start();
   session_register("wiz_session");
   
   if(empty($prev)) $prev = "/";
   Header("Location: $prev");
	   
}else{

	error("회원정보가 일치하지 않습니다.","");
	
}


?>