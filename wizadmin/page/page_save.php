<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
function addUpdate($type,$subimg,$subimg_size,$subimg_name){
	
	global $content, $addinfo, $addinfo2, $info_use, $info_ess;
	
	if($subimg_size > 0){
	    exec("cp $subimg ../../images/subimg/$subimg_name");
	    $subimg_sql = " subimg='$subimg_name', ";
	}
	
	$sql = "select idx from wiz_page where  type='$type'";
	$result = mysql_query($sql) or error(mysql_error());
	$exist = mysql_num_rows($result);
	
	for($ii=0; $ii<count($info_use); $ii++){
   $addinfo .= $info_use[$ii]."/";
	}
	for($ii=0; $ii<count($info_ess); $ii++){
	   $addinfo2 .= $info_ess[$ii]."/";
	}

	if($exist > 0){
		$sql = "update wiz_page set $subimg_sql content='$content', addinfo='$addinfo', addinfo2='$addinfo2' where type='$type'";
	}else{
		$sql = "insert into wiz_page values('','$type','$subimg_name','$content','$addinfo','$addinfo2')";
	}

	$result = mysql_query($sql) or error(mysql_error());
	
}


if($mode == "update"){
	
	
	addUpdate($type,$subimg,$subimg_size,$subimg_name);
		
	complete("수정되었습니다.","$page");



}else if($mode == "delimg"){

	exec("rm -f ../../images/subimg/$subimg");
	
	$sql = "update wiz_page set subimg = '' where type='$type'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("이미지가 삭제되었습니다.","");
	
}else if($mode == "other"){
	
	if($sitemap_subimg_size > 0)
		addUpdate("sitemap",$sitemap_subimg,$sitemap_subimg_size,$sitemap_subimg_name);
	
	if($faq_subimg_size > 0)
		addUpdate("faq",$faq_subimg,$faq_subimg_size,$faq_subimg_name);
	
	if($login_subimg_size > 0)
		addUpdate("login",$login_subimg,$login_subimg_size,$login_subimg_name);
	
	if($myshop_subimg_size > 0)
		addUpdate("myshop",$myshop_subimg,$myshop_subimg_size,$myshop_subimg_name);
	
	if($orderform_subimg_size > 0)
		addUpdate("orderform",$orderform_subimg,$orderform_subimg_size,$orderform_subimg_name);
	
	if($orderpay_subimg_size > 0)
		addUpdate("orderpay",$orderpay_subimg,$orderpay_subimg_size,$orderpay_subimg_name);
	
	if($ordercom_subimg_size > 0)
		addUpdate("ordercom",$ordercom_subimg,$ordercom_subimg_size,$ordercom_subimg_name);
	
	if($prdsearch_subimg_size > 0)
		addUpdate("prdsearch",$prdsearch_subimg,$prdsearch_subimg_size,$prdsearch_subimg_name);
	
	if($new_subimg_size > 0)
		addUpdate("new",$new_subimg,$new_subimg_size,$new_subimg_name);
		
	if($recom_subimg_size > 0)
		addUpdate("recom",$recom_subimg,$recom_subimg_size,$recom_subimg_name);
		
	if($popular_subimg_size > 0)
		addUpdate("popular",$popular_subimg,$popular_subimg_size,$popular_subimg_name);
		
	if($sale_subimg_size > 0)
		addUpdate("sale",$sale_subimg,$sale_subimg_size,$sale_subimg_name);
	
	complete("수정되었습니다.","page_other.php");

}



?>