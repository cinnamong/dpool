<?
// 상품수
if($HTTP_COOKIE_VARS["prd_total"] == ""){
	$sql = "select count(prdcode) as prd_total from wiz_product";
   $result = mysql_query($sql) or error(mysql_error());
   $sys_prd = mysql_fetch_object($result);
   $prd_total = $sys_prd->prd_total;
   setcookie("prd_total", $prd_total, 0, "/");
}

// 하드사용량
if($HTTP_COOKIE_VARS["disk_use"] == ""){
   $disk_use = exec("du -h ../../");
	$disk_use = str_replace("M	../..","",$disk_use);
	setcookie("disk_use", $disk_use, 0, "/");
}
				
// 디비사용량
if($HTTP_COOKIE_VARS["db_total"] == ""){
   $sql = "show table status like '%'";
   $result = mysql_query($sql) or error(mysql_error());
   while($sys_db = mysql_fetch_object($result)){
   	$db_total += $sys_db->Data_length;
   }
   $db_total = ceil($db_total/(8*102400));
   setcookie("db_total", $db_total, 0, "/");
}

// 방문자
$sql = "select time, sum(cnt) as cnt from wiz_contime group by substring(time,1,8) order by substring(time,1,8) desc";
$result = mysql_query($sql) or error(mysql_error());
$visit_cnt = mysql_fetch_object($result);
$today_cnt = $visit_cnt->cnt;

$visit_cnt = mysql_fetch_object($result);
$yester_cnt = $visit_cnt->cnt;

$sql = "select sum(cnt) as cnt from wiz_contime";
$result = mysql_query($sql) or error(mysql_error());
$visit_cnt = mysql_fetch_object($result);
$total_cnt = $visit_cnt->cnt;

// 현재접속자
$dir = @opendir("$DOCUMENT_ROOT/connect");
$now_time = mktime(date('H'), date('i'), 0, date('m'), date('d'), date('Y'));

while(($file = readdir($dir)) !== false)
{
   if(($file != ".") && ($file != ".."))
   {
      $now_cnt++;
      $fileinfo = stat("$DOCUMENT_ROOT/connect/$file");
      if($fileinfo[9] < $now_time - 120)
      {
         unlink("$DOCUMENT_ROOT/connect/$file");
         $now_cnt--;
      }
   }
}
?>