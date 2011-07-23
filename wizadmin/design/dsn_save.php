<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
// 페이지 추가
if($mode == "insert"){
	
	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$sdate_day;
	
	$content = "<table border=0 cellspacing=0 cellpadding=0><tr><td>$content</td></tr></table>";
	
	$sql = "insert into wiz_content values('','$type', '$isuse', '$scroll', '$posi_x', '$posi_y', '$size_x', '$size_y', '$sdate', '$edate', '$linkurl', '$title', '$content',now())";

	$result = mysql_query($sql) or error(mysql_error());
	
	if($type == "popup") complete("추가되었습니다.","dsn_popup_list.php");
	else complete("추가되었습니다.","dsn_content_list.php");
	



// 페이지 수정
}else if($mode == "update"){
	
	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$edate_day;
	
	if(!empty($type)) $where_sql = " where type = '$type' and idx = '$idx'";
	else $where_sql = " where idx = '$idx'";
	
	$sql = "update wiz_content set isuse='$isuse', scroll='$scroll', posi_x='$posi_x', posi_y='$posi_y', size_x='$size_x', size_y='$size_y', 
							sdate='$sdate', edate='$edate', linkurl='$linkurl', title='$title', content='$content' $where_sql";

	$result = mysql_query($sql) or error(mysql_error());
	
	complete("수정되었습니다.","");


// 페이지 삭제	
}else if($mode == "delete"){
	
	$sql = "delete from wiz_content where idx = '$idx'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","");
	
	
// 디자인기본설정
}else if($mode == "basic"){

	if($site_background_size > 0){
		 $ext = substr($site_background_name,-3);
       exec("rm -f ../../images/upfile/site_background*");
       exec("cp $site_background ../../images/upfile/site_background.$ext");
       $site_background_sql = ", site_background='site_background.$ext'";
	}

	if($topmenu01_img_size > 0){
       exec("cp $topmenu01_img ../../images/menuimg/topmenu01_img.gif");
		 $topmenu01_sql = ", topmenu01_img='$topmenu01_img_name'";
	}
	
   $fp = fopen("../../wiz_style.css","w");
   $dsn_css = str_replace("\\","",$dsn_css);
   fputs($fp,$dsn_css);
   fclose($fp);
   
	$sql = "update wiz_design set site_title='$site_title', site_intro='$site_intro', site_keyword='$site_keyword', site_align='$site_align', site_bgcolor='$site_bgcolor', 
					site_font='$site_font', site_link='$site_link', site_active='$site_active', site_hover='$site_hover', site_visited='$site_visited'
					$site_background_sql $cate_sql";

	$result = mysql_query($sql) or error(mysql_error());
	
	complete("수정되었습니다.","");
	


// 배경이미지 삭제
}else if($mode == "back_delete"){
	
   exec("rm -f ../../images/upfile/site_background*");

	$sql = "update wiz_operinfo set dsn_background=''";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","");



// 레이아웃 구성	
}else if($mode == "layout"){
	
	$sql = "update wiz_design set header_type='$header_type', header_file='$header_file'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	$fp = fopen("../../skin/header.inc","w");
   $dsn_header = str_replace("\\","",$dsn_header);
   fputs($fp,$dsn_header);
   fclose($fp);
   
   $fp = fopen("../../skin/footer.inc","w");
   $dsn_footer = str_replace("\\","",$dsn_footer);
   fputs($fp,$dsn_footer);
   fclose($fp);
   
   complete("수정되었습니다.","");
   
   
   
// 메인레이아웃 구성	
}else if($mode == "main_layout"){
	
	$sql = "update wiz_design set main_type='$main_type', main_file='$main_file'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	$fp = fopen("../../skin/main.inc","w");
   $dsn_main = str_replace("\\","",$dsn_main);
   fputs($fp,$dsn_main);
   fclose($fp);
   
   complete("수정되었습니다.","");

// 로고수정
}else if($mode == "logo"){
	
	if($logo_img_size > 0){
		 $logo_img_name = "logo.".substr($logo_img_name,-3);
       exec("cp $logo_img ../../images/mainimg/$logo_img_name");
		 
		 $sql = "update wiz_design set logo_img='$logo_img_name'";
		 $result = mysql_query($sql) or error(mysql_error());
	}
	
	complete("수정되었습니다.","dsn_logo.php");
	
// 로고삭제
}else if($mode == "logo_delete"){
	
	exec("rm -f ../../images/mainimg/$file");

	$sql = "update wiz_design set logo_img=''";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","dsn_logo.php");


// 카테고리 수정
}else if($mode == "cate"){
	
	if($cate_img_size > 0){
   	$cate_img_name = "cateimg.".substr($cate_img_name,-3);
      exec("cp $cate_img ../../images/mainimg/$cate_img_name");
		$sql = "update wiz_design set cate_img='$cate_img_name'";
		$result = mysql_query($sql) or error(mysql_error());
	}
	
	complete("수정되었습니다.","dsn_category.php");
	
// 카테고리이미지 삭제
}else if($mode =="cate_delete"){
	
	exec("rm -f ../../images/mainimg/$file");

	$sql = "update wiz_design set cate_img=''";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","dsn_category.php");


// 메인이미지
}else if($mode == "main_img"){
	
	if($main_img_size > 0){
		 $main_img_name = "mainimg.".substr($main_img_name,-3);
       exec("cp $main_img ../../images/mainimg/$main_img_name");
       $main_img_sql = ", main_img='$main_img_name'";
	}
	
	$sql = "update wiz_design set main_link='$main_link', main_width='$main_width', main_height='$main_height' $main_img_sql";
   $result = mysql_query($sql) or error(mysql_error());
       
	complete("수정되었습니다.","dsn_mainimg.php");
	
	
// 메인이미지 삭제
}else if($mode =="main_delete"){
	
	exec("rm -f ../../images/mainimg/$file");

	$sql = "update wiz_design set main_img=''";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","dsn_mainimg.php");

// 공지사항
}else if($mode == "main_notice"){
	
	if($notice_img_size > 0){
		 $notice_img_name = "notice_img.".substr($notice_img_name,-3);
       exec("cp $notice_img ../../images/mainimg/$notice_img_name");
       
       $sql = "update wiz_design set notice_img = '$notice_img_name'";
		 $result = mysql_query($sql) or error(mysql_error());
	
	}

	complete("수정되었습니다.","");
	
// 공지사항이미지 삭제
}else if($mode =="notice_delete"){
	
	exec("rm -f ../../images/mainimg/$file");

	$sql = "update wiz_design set notice_img=''";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","dsn_notice.php");
	
// 상품바 삭제
}else if($mode =="prdbar_delete"){
	
	exec("rm -f ../../images/mainimg/$file");

	$sql = "update wiz_prdmain set barimg='' where type='$type'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("삭제되었습니다.","dsn_notice.php");
	
// 메인 상품
}else if($mode == "prdmain"){
	
	
	// 신상품 수정
	if($grp == "new"){
		if($new_barimg_size > 0){
			 $new_barimg_name = "new_bar.".substr($new_barimg_name,-3);
	       exec("cp $new_barimg ../../images/mainimg/$new_barimg_name");
	       $new_barimg_sql = " barimg='$new_barimg_name', ";
		}
		$sql = "update wiz_prdmain set isuse='$new_isuse', prior='$new_prior', skin_type='$new_skin_type', prd_num='$new_prd_num', prd_width='$new_prd_width', prd_height='$new_prd_height', $new_barimg_sql html='$new_html' where type='new'";
		$result = mysql_query($sql) or error(mysql_error());
	}
	
	// 인기상품 수정
	if($grp == "popular"){
		if($popular_barimg_size > 0){
			 $popular_barimg_name = "popular_bar.".substr($popular_barimg_name,-3);
	       exec("cp $popular_barimg ../../images/mainimg/$popular_barimg_name");
	       $popular_barimg_sql = " barimg='$popular_barimg_name', ";
		}
		$sql = "update wiz_prdmain set isuse='$popular_isuse', prior='$popular_prior', skin_type='$popular_skin_type', prd_num='$popular_prd_num', prd_width='$popular_prd_width', prd_height='$popular_prd_height', $popular_barimg_sql html='$popular_html' where type='popular'";
		$result = mysql_query($sql) or error(mysql_error());
	}
	
	// 추천상품 수정
	if($grp == "recom"){
		if($recom_barimg_size > 0){
			 $recom_barimg_name = "recom_bar.".substr($recom_barimg_name,-3);
	       exec("cp $recom_barimg ../../images/mainimg/$recom_barimg_name");
	       $recom_barimg_sql = " barimg='$recom_barimg_name', ";
		}
		$sql = "update wiz_prdmain set isuse='$recom_isuse', prior='$recom_prior', skin_type='$recom_skin_type', prd_num='$recom_prd_num', prd_width='$recom_prd_width', prd_height='$recom_prd_height', $recom_barimg_sql html='$recom_html' where type='recom'";
		$result = mysql_query($sql) or error(mysql_error());
	}
	
	// 세일상품 수정
	if($grp == "sale"){
		if($sale_barimg_size > 0){
			 $sale_barimg_name = "sale_bar.".substr($sale_barimg_name,-3);
	       exec("cp $sale_barimg ../../images/mainimg/$sale_barimg_name");
	       $sale_barimg_sql = " barimg='$sale_barimg_name', ";
		}
		$sql = "update wiz_prdmain set isuse='$sale_isuse', prior='$sale_prior', skin_type='$sale_skin_type', prd_num='$sale_prd_num', prd_width='$sale_prd_width', prd_height='$sale_prd_height', $sale_barimg_sql html='$sale_html' where type='sale'";
		$result = mysql_query($sql) or error(mysql_error());
	}
	
   complete("수정되었습니다.","dsn_prdmain.php?grp=$grp");


// 배너추가
}else if($mode == "ban_insert"){

	if($de_img_size > 0){
       exec("cp $de_img ../../images/banner/$de_img_name");
	}
	
	$content = str_replace("\\\"", "\'", $content);
	
	$sql = "insert into wiz_banner values('', '$align', '$prior', '$isuse', '$link_url', '$link_target', '$de_type', '$de_img_name', '$content')";	
	$result = mysql_query($sql) or error(mysql_error());
	
   complete("배너가 추가되었습니다.","dsn_banner.php");


// 배너수정
}else if($mode == "ban_update"){
	
	if($de_img_size > 0){
       exec("cp $de_img ../../images/banner/$de_img_name");
       $de_img_sql = " de_img='$de_img_name', ";
	}
	
	$content = str_replace("\\\"", "\'", $content);
	
	$sql = "update wiz_banner set align='$align', prior='$prior', isuse='$isuse', link_url='$link_url', link_target='$link_target', 
							de_type='$de_type', $de_img_sql de_html='$content' where idx = '$idx'";	
	$result = mysql_query($sql) or error(mysql_error());
	
   complete("배너가 수정되었습니다.","dsn_banner_input.php?mode=ban_update&idx=$idx");
	
	
	
// 배너삭제
}else if($mode == "ban_delete"){
	
	if($ban_img != "")
		exec("rm -f ../../images/banner/$ban_img");

	$sql = "delete from wiz_banner where idx = '$idx'";
	mysql_query($sql) or error(mysql_error());
	complete("삭제되었습니다.","dsn_banner.php");

// 탑메뉴 이미지삭제
}else if($mode == "topmenu_del"){
	
	if(is_file("../../images/menuimg/$file")){
		exec("rm -f ../../images/menuimg/$file");
	}
	
	complete("삭제되었습니다.","dsn_topmenu.php");
	
// 탑메뉴관리	
}else if($mode == "topmenu"){

	if($topmenu01_img_size > 0){
       exec("cp $topmenu01_img ../../images/menuimg/topmenu01.gif");
	}
	if($topmenu02_img_size > 0){
       exec("cp $topmenu02_img ../../images/menuimg/topmenu02.gif");
	}
	if($topmenu03_img_size > 0){
       exec("cp $topmenu03_img ../../images/menuimg/topmenu03.gif");
	}
	if($topmenu04_img_size > 0){
       exec("cp $topmenu04_img ../../images/menuimg/topmenu04.gif");
	}
	if($topmenu05_img_size > 0){
       exec("cp $topmenu05_img ../../images/menuimg/topmenu05.gif");
	}
	if($topmenu06_img_size > 0){
       exec("cp $topmenu06_img ../../images/menuimg/topmenu06.gif");
	}
	if($topmenu07_img_size > 0){
       exec("cp $topmenu07_img ../../images/menuimg/topmenu07.gif");
	}
	if($topmenu08_img_size > 0){
       exec("cp $topmenu08_img ../../images/menuimg/topmenu08.gif");
	}
	if($topmenu09_img_size > 0){
       exec("cp $topmenu09_img ../../images/menuimg/topmenu09.gif");
	}
	if($topmenu10_img_size > 0){
       exec("cp $topmenu10_img ../../images/menuimg/topmenu10.gif");
	}

	if($topmenu01_over_size > 0){
       exec("cp $topmenu01_over ../../images/menuimg/topmenu01_over.gif");
	}
	if($topmenu02_over_size > 0){
       exec("cp $topmenu02_over ../../images/menuimg/topmenu02_over.gif");
	}
	if($topmenu03_over_size > 0){
       exec("cp $topmenu03_over ../../images/menuimg/topmenu03_over.gif");
	}
	if($topmenu04_over_size > 0){
       exec("cp $topmenu04_over ../../images/menuimg/topmenu04_over.gif");
	}
	if($topmenu05_over_size > 0){
       exec("cp $topmenu05_over ../../images/menuimg/topmenu05_over.gif");
	}
	if($topmenu06_over_size > 0){
       exec("cp $topmenu06_over ../../images/menuimg/topmenu06_over.gif");
	}
	if($topmenu07_over_size > 0){
       exec("cp $topmenu07_over ../../images/menuimg/topmenu07_over.gif");
	}
	if($topmenu08_over_size > 0){
       exec("cp $topmenu08_over ../../images/menuimg/topmenu08_over.gif");
	}
	if($topmenu09_over_size > 0){
       exec("cp $topmenu09_over ../../images/menuimg/topmenu09_over.gif");
	}
	if($topmenu10_over_size > 0){
       exec("cp $topmenu10_over ../../images/menuimg/topmenu10_over.gif");
	}
	
	$sql = "update wiz_design set topmenu01_url='$topmenu01_url',topmenu02_url='$topmenu02_url',topmenu03_url='$topmenu03_url',topmenu04_url='$topmenu04_url',topmenu05_url='$topmenu05_url',
							topmenu06_url='$topmenu06_url',topmenu07_url='$topmenu07_url',topmenu08_url='$topmenu08_url',topmenu09_url='$topmenu09_url',topmenu10_url='$topmenu10_url'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("수정되었습니다.","dsn_topmenu.php");
	
	
// 탑네비관리	
}else if($mode == "topnavi"){

	if($topnavi_login_img_size > 0){
       exec("cp $topnavi_login_img ../../images/menuimg/topnavi_login.gif");
	}
	if($topnavi_logout_img_size > 0){
       exec("cp $topnavi_logout_img ../../images/menuimg/topnavi_logout.gif");
	}
	if($topnavi01_img_size > 0){
       exec("cp $topnavi01_img ../../images/menuimg/topnavi01.gif");
	}
	if($topnavi02_img_size > 0){
       exec("cp $topnavi02_img ../../images/menuimg/topnavi02.gif");
	}
	if($topnavi03_img_size > 0){
       exec("cp $topnavi03_img ../../images/menuimg/topnavi03.gif");
	}
	if($topnavi04_img_size > 0){
       exec("cp $topnavi04_img ../../images/menuimg/topnavi04.gif");
	}
	if($topnavi05_img_size > 0){
       exec("cp $topnavi05_img ../../images/menuimg/topnavi05.gif");
	}
	if($topnavi06_img_size > 0){
       exec("cp $topnavi06_img ../../images/menuimg/topnavi06.gif");
	}
	
	$sql = "update wiz_design set topnavi01_url='$topnavi01_url',topnavi02_url='$topnavi02_url',topnavi03_url='$topnavi03_url',topnavi04_url='$topnavi04_url',topnavi05_url='$topnavi05_url',
							topnavi06_url='$topnavi06_url'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("수정되었습니다.","dsn_navimenu.php");

// 탑메뉴 이미지삭제
}else if($mode == "topnavi_del"){
	
	if(is_file("../../images/menuimg/$file")){
		exec("rm -f ../../images/menuimg/$file");
	}
	
	complete("삭제되었습니다.","dsn_navimenu.php");
	

// 푸터관리
}else if($mode == "footer"){
	
	$content = str_replace("\\\"", "\'", $content);
	
	$sql = "update wiz_design set footer_html = '$content'";
	
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("수정되었습니다.","dsn_footer.php");

}

?>