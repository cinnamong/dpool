<?

if($design_info->notice_img != ""){
	$notice_img = "<a href=/bbs/list.php?code=notice><img src='/images/mainimg/$design_info->notice_img' border='0'></a>";
}

$notice = "<table border=0 cellpadding=0 cellspacing=0 width=100%>";
$notice .= "<tr><td>".$notice_img."</td></tr>";

$code = "notice";
$cutstr = 40;
$limit = 5;
$sql = "select idx,subject from wiz_bbs where code = '$code' order by idx desc limit $limit";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
	$subject = "<a href=/bbs/view.php?code=$code&idx=$row->idx>".cut_str($row->subject,$cutstr)."</a>";
	$notice .= "<tr><td style='padding:5 0 0 10'><img src='/images/mainimg/notice_icon.gif' align='absmiddle'>".$subject."</td></tr>";
}

$notice .= "</table>";

?>