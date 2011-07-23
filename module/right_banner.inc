<?

$right_banner = "<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>";

$sql = "select * from wiz_banner where isuse != 'N' and align='R' order by prior asc";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
	
	if($row->de_type == "IMG") $ban_content = "<img src=/images/banner/".$row->de_img." border=0>";
	else $ban_content = "<table cellpadding=0 cellspacing=0 border=0><tr><td>".$row->de_html."</td></tr></table>";
	
	if($row->link_url == "") $right_banner .= "<tr><td>".$ban_content."</td></tr>";
   else $right_banner .= "<tr><td><a href=".$row->link_url." target=".$row->link_target.">".$ban_content."</a></td></tr>";
}

$right_banner .= "</table>";

?>