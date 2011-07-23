<? include "../inc/sys_check.inc"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: 이지넷 쇼핑몰 관리자 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
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

function MM_sendSms(){
	var url = "../member/send_sms.php";
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" onLoad="MM_preloadImages('image/menu01_1.gif','image/menu02_1.gif','image/menu03_1.gif','image/menu04_1.gif','image/menu05_1.gif','image/menu06_1.gif','image/menu07_1.gif')">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
	   <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top" background="../image/bg_top.gif">
            <table width="820" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="188"><a href="http://www.eznetsol.co.kr" target="_blank"><img src="../image/logo.gif" width="188" height="83" border="0"></a></td>
                <td width="632" valign="top">
                  <table width="720" height="5" border="0" cellpadding="0" cellspacing="0">
                    <tr><td></td></tr>
                  </table>
                  <table width="730" height="14" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="23"></td>
                      <td width="48"><a href="../design/dsn_webftp.php"><img src="../image/topmenu_01.gif" width="48" height="14" border="0"></a></td>
                      <!--td width="48"><a href="javascript:MM_sendSms();"><img src="../image/topmenu_02.gif" width="48" height="14" border="0"></a></td-->
                      <td width="62"><a href="../member/member_email.php"><img src="../image/topmenu_03.gif" width="62" height="14" border="0"></a></td>
                      <td width="340"></td>
                      <td><img src="../image/topmenu_04.gif" width="275" height="14" border="0" usemap="#Map"></td>
                    </tr>
                  </table>
                  <table width="632" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><a href="../shop/shop_info.php"><img src="../image/menu01.gif" name="m_image1" width="90" height="64" border="0" id="m_image1" onMouseOver="MM_swapImage('m_image1','','../image/menu01_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../design/dsn_basic.php"><img src="../image/menu02.gif" name="m_image2" width="91" height="64" border="0" id="m_image2" onMouseOver="MM_swapImage('m_image2','','../image/menu02_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../page/page_company.php"><img src="../image/menu08.gif" name="m_image3" width="91" height="64" border="0" id="m_image3" onMouseOver="MM_swapImage('m_image3','','../image/menu08_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../product/prd_list.php"><img src="../image/menu03.gif" name="m_image4" width="90" height="64" border="0" id="m_image4" onMouseOver="MM_swapImage('m_image4','','../image/menu03_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../order/order_list.php"><img src="../image/menu04.gif" name="m_image5" width="88" height="64" border="0" id="m_image5" onMouseOver="MM_swapImage('m_image5','','../image/menu04_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../member/member_list.php"><img src="../image/menu05.gif" name="m_image6" width="86" height="64" border="0" id="m_image6" onMouseOver="MM_swapImage('m_image6','','../image/menu05_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../marketing/connect_list.php"><img src="../image/menu06.gif" name="m_image7" width="94" height="64" border="0" id="m_image7" onMouseOver="MM_swapImage('m_image7','','../image/menu06_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                      <td><a href="../bbs/bbs_pro_list.php"><img src="../image/menu07.gif" name="m_image8" width="95" height="64" border="0" id="m_image8" onMouseOver="MM_swapImage('m_image8','','../image/menu07_1.gif',1)" onMouseOut="MM_swapImgRestore()"></a></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top" bgcolor="F5F5F5">
		      <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="188" align="left" valign="top" background="../image/bg_left.gif">
                
                <?
                $now_posi = explode("/",$PHP_SELF);
                if( $now_posi[2] == "main" )
                	include "../inc/main_left.inc";
                else if($now_posi[2] == "shop" )
                	include "../inc/shop_left.inc";
                else if($now_posi[2] == "design" )
                	include "../inc/design_left.inc";
                else if($now_posi[2] == "page" )
                	include "../inc/page_left.inc";
                else if($now_posi[2] == "product" )
                	include "../inc/prd_left.inc";
                else if($now_posi[2] == "order" )
                	include "../inc/order_left.inc";
                else if($now_posi[2] == "member" )
                	include "../inc/member_left.inc";
                else if($now_posi[2] == "marketing" )
                	include "../inc/marketing_left.inc";
                else if($now_posi[2] == "bbs" )
                	include "../inc/bbs_left.inc";
                ?>
					 
                </td>
                <td valign="top" align="center">
                  <map name="Map">
                    <area shape="rect" coords="19,2,79,14" href="../main/main.php">
                    <area shape="rect" coords="89,2,139,16" href="http://<?=$HTTP_HOST?>" target="mymall">
                    <area shape="rect" coords="153,2,191,14" href="#">
                    <area shape="rect" coords="203,2,257,14" href="../admin_logout.php">
                  </map>
                  <table width="98%" height="12" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td></td>
                    </tr>
                  </table>
                  <table width="98%" height="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td valign="top">