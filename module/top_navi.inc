<?

$top_navi = "<table border=0 cellpadding=0 cellspacing=0>";

if($wiz_session[id] == "")
	$top_navi .= "<td><a href=$design_info->topnavi_login_url><img src=/images/menuimg/topnavi_login.gif border=0></a></td>";
else
	$top_navi .= "<td><a href=$design_info->topnavi_logout_url><img src=/images/menuimg/topnavi_logout.gif border=0></a></td>";
	
if(is_file("$DOCUMENT_ROOT/images/menuimg/topnavi01.gif"))
	$top_navi .= "<td><a href=$design_info->topnavi01_url><img src=/images/menuimg/topnavi01.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topnavi02.gif"))
	$top_navi .= "<td><a href=$design_info->topnavi02_url><img src=/images/menuimg/topnavi02.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topnavi03.gif"))
	$top_navi .= "<td><a href=$design_info->topnavi03_url><img src=/images/menuimg/topnavi03.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topnavi04.gif"))
	$top_navi .= "<td><a href=$design_info->topnavi04_url><img src=/images/menuimg/topnavi04.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topnavi05.gif"))
	$top_navi .= "<td><a href=$design_info->topnavi05_url><img src=/images/menuimg/topnavi05.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topnavi06.gif"))
	$top_navi .= "<td><a href=$design_info->topnavi06_url><img src=/images/menuimg/topnavi06.gif border=0></a></td>";

$top_navi .= "</table>";

?>