<?

if($design_info->cate_img != ""){
	$cate_img = "<a href=/><img src='/images/mainimg/$design_info->cate_img' border='0'></a>";
}

$category = "<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>";
$category .= "<tr><td>".$cate_img."</td></tr>";

$no = 1;
$sql = "select catcode, catname, catimg, catimg_over from wiz_category where depthno=1 and catuse != 'N' order by priorno01 asc";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
	
	if($row->catimg == ""){
		$category .= "<tr height=21><td><a href='/shop/prd_list.php?catcode=".$row->catcode."'>".$row->catname."</a></td></tr>";
	}else{
		if($row->catimg_over == "") $row->catimg_over = $row->catimg;
		$category .= "<tr height=21><td><a href='/shop/prd_list.php?catcode=".$row->catcode."' onMouseOver=MM_swapImage('c_".$no."','','/images/catimg/".$row->catimg_over."',1) onMouseOut=MM_swapImgRestore()><img src='/images/catimg/".$row->catimg."' name='c_".$no."' border=0 id='c_".$no."'></a></td></tr>";
	}
	$no++;
	
}	

$category .= "</table>";

?>