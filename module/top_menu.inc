<?

$top_menu = "<table border=0 cellpadding=0 cellspacing=0 width=100%>";

if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu01.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu01_url><img src=/images/menuimg/topmenu01.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu02.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu02_url><img src=/images/menuimg/topmenu02.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu03.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu03_url><img src=/images/menuimg/topmenu03.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu04.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu04_url><img src=/images/menuimg/topmenu04.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu05.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu05_url><img src=/images/menuimg/topmenu05.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu06.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu06_url><img src=/images/menuimg/topmenu06.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu07.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu07_url><img src=/images/menuimg/topmenu07.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu08.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu08_url><img src=/images/menuimg/topmenu08.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu09.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu09_url><img src=/images/menuimg/topmenu09.gif border=0></a></td>";
if(is_file("$DOCUMENT_ROOT/images/menuimg/topmenu10.gif"))
	$top_menu .= "<td><a href=$design_info->topmenu10_url><img src=/images/menuimg/topmenu10.gif border=0></a></td>";

$top_menu .= "</table>";

?>