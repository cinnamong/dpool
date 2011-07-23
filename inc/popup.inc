<script language="javascript">
<!--
function readCookie(cookiename) 
{
 var Found = false;
 
 cookiedata = document.cookie; 
 if ( cookiedata.indexOf(cookiename) >= 0 ){ 
   Found = true;
 }
 
 return Found;
}




<?

$today = date('Y-m-d');
$sql = "select idx, scroll, posi_x, posi_y, size_x, size_y from wiz_content where type = 'popup' and isuse = 'Y' and sdate <= '$today' and edate >= '$today'";
$result = mysql_query($sql);
while($popup_info = mysql_fetch_object($result)){
	
	echo "if(!readCookie('popupDayClose$popup_info->idx')){\n";
	echo "window.open('/popup.php?idx=$popup_info->idx','','height=$popup_info->size_y, width=$popup_info->size_x, menubar=no, scrollbars=$popup_info->scroll, resizable=no, toolbar=no, status=no, top=$popup_info->posi_y, left=$popup_info->posi_x');\n";
	echo "}\n\n";
}

?>



//-->
</script>