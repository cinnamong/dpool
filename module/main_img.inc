<?

$main_ext = substr($design_info->main_img,-3);
if($main_ext == "gif" || $main_ext == "jpg" || $main_ext == "bmp"){
	$main_img = "<img src='/images/mainimg/$design_info->main_img' width='$design_info->main_width' height='$design_info->main_height' border='0'>";
	if($design_info->main_link != "")
		$main_img = "<a href='$design_info->main_link'>".$main_img."</a>";
}else if($main_ext == "swf"){
	$main_img = "
	  <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0' width='$design_info->main_width' height='$design_info->main_height'>
        <param name='movie' value='/images/mainimg/$design_info->main_img'>
        <param name='quality' value='high'>
        <embed src='/images/mainimg/$design_info->main_img' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$design_info->main_width' height='$design_info->main_height'></embed>
      </object>
	";
}

?>