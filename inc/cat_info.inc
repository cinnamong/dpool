<?

if(!empty($catcode)){
	
	$now_position = "<a href='/'>Home</a>";
	$catcode1 = substr($catcode,0,2);
	$catcode2 = substr($catcode,0,4);
	$sql = "select * from wiz_category where catuse != 'N' and (catcode like '$catcode1%' and depthno = 1)
	                                             or (catcode like '$catcode2%' and depthno = 2)
	                                             or (catcode = '$catcode')";

	$result = mysql_query($sql) or error(mysql_error());
	
	while($row = mysql_fetch_object($result)){

	   if($row->subimg != ""){ $subimg = $row->subimg; $subimg_type = $row->subimg_type; }
	   
	   if($row->catcode == $catcode){

	   	$catname = $row->catname;
	   	$cat_info = $row;
	   	
	   	$now_position = $now_position." &gt; <a href='/shop/prd_list.php?catcode=$row->catcode'><b>$row->catname</b></a>";
		}else{
			$now_position = $now_position." &gt; <a href='/shop/prd_list.php?catcode=$row->catcode'>$row->catname</a>";
		}
	}

	if($subimg_type == "FIL"){
		
		$img_ext = substr($subimg,-3);
		
		if($img_ext == "swf"){
			$subimg = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\">";
			$subimg .= "<param name=\"movie\" value=\"/images/subimg/$subimg\">";
			$subimg .= "<param name=\"quality\" value=\"high\">";
			$subimg .= "<embed src=\"/images/subimg/$subimg\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"></embed>";
			$subimg .= "</object>";
		}else{
			$subimg = "<img src='/images/subimg/$subimg'>";
		}
			
	}
	
}else{

	$page_type = $grp;
	include "../inc/page_info.inc";
	
	if($grp == "new") $catname = "신상품";
	else if($grp == "recom") $catname = "추천상품";
	else if($grp == "sale") $catname = "세일상품";
	else if($grp == "popular") $catname = "인기상품";
	
	$now_position .= "<a href='/'>Home</a> &gt; $catname";
}
?>