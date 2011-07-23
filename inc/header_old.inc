<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title><?=$design_info->site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="keywords" content="<?=$design_info->site_keyword?>">
<meta name="description" content="<?=$design_info->site_intro?>">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
<style type="text/css">
a:link { text-decoration: none; color:<?=$design_info->site_link?>; }
a:visited { text-decoration: none; color:<?=$design_info->site_visited?>; }
a:active { text-decoration: none; color:<?=$design_info->site_active?>; }
a:hover {  text-decoration:underline; color:<?=$design_info->site_hover?>; }
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body topmargin="0" leftmargin="0">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td align="<?=$design_info->site_align?>" bgcolor="<?=$design_info->site_bgcolor?>" background="/images/upfile/<?=$design_info->site_background?>">
<?

include "$DOCUMENT_ROOT/module/logo.inc";				// 로고이미지
include "$DOCUMENT_ROOT/module/top_navi.inc";		// 탑네비
include "$DOCUMENT_ROOT/module/prd_search.inc";		// 상품검색
include "$DOCUMENT_ROOT/module/top_menu.inc";		// 탑메뉴
include "$DOCUMENT_ROOT/module/category.inc";		// 카테고리
include "$DOCUMENT_ROOT/module/left_banner.inc";	// 배너
include "$DOCUMENT_ROOT/module/copyright.inc";		// 카피라잇

if($design_info->header_type == "SKIN") {

	include "$DOCUMENT_ROOT/skin/header/$design_info->header_file";
	
}else {
	
	include "$DOCUMENT_ROOT/skin/header.inc";
	
}

?>