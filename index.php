<?
include "./inc/global.inc"; 		// DB컨넥션, 접속자 파악
include "./inc/connect.inc";		// 접소카운터
include "./inc/util_lib.inc"; 	// 유틸 라이브러리
include "./inc/shop_info.inc"; 	// 운영정보
include "./inc/design_info.inc"; // 디자인 정보
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? //include "include/meta.inc"; ?>
<title><?=$design_info->site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="keywords" content="<?=$design_info->site_keyword?>">
<meta name="description" content="<?=$design_info->site_intro?>">
<link href="css/css.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!--td height="146" align="center" valign="top" background="img/top_bg.gif"--><td height="146" valign="top" background="img/top_bg.gif" style="padding:0 0 0 20"><table width="1030" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="950"><table width="950" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>
                  <?php require_once('include/top_menu.php');?>
                </td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      
    </td>
  </tr>
  <tr>
    <!--td align="center" style="padding:10 0 0 0"--><td style="padding:10 0 0 20"><table width="1030" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="950"><table width="950" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="184" rowspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td>
                              <?php require_once('include/left_menu.php');?>
                            </td>
                          </tr>
                        </table></td>
                      <td width="423" rowspan="2" valign="top" style="padding:0 0 0 10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="380"><a href="{메인타이틀상품링크}"><img src="img/main_title.jpg" width="423" height="379" border="0"></a></td>
                          </tr>
                          <tr> 
                            <td style="padding:40 0 0 0">
                              <?php require_once('include/main_news.php');?>
							</td>
                          </tr>
                        </table></td>
                      <td height="380" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="98" rowspan="3" valign="top" style="padding:0 5 0 5"><img src="img/body_img01.gif" width="98" height="379" border="0" usemap="#Map11Map"></td>
                            <td><a href="{메인상품3링크}"><img src="img/body_new_goods.gif" width="225" height="214" border="0"></a></td>
                          </tr>
                          <tr> 
                            <td><img src="img/title_hot.gif" width="225" height="32"></td>
                          </tr>
                          <tr> 
                            <td><a href="{메인상품4링크}"><img src="img/body_new_goods2.gif" width="225" height="133" border="0"></a></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td><?php require_once('include/main_qna.php');?></td>
                    </tr>
                  </table>
                              <?php require_once('include/main_bestofbest.php');?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="467">
                              <?php require_once('include/main_hot.php');?>
					  </td>
                      <td>&nbsp;</td>
                      <td width="467">
                              <?php require_once('include/main_mdchoice.php');?>
					  </td>
                    </tr>
                  </table>
                  <table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td></td>
                    </tr>
                  </table>
                              <?php require_once('include/main_etc.php');?>
                  <!--table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td style="padding:15 0 10 0"><img src="img/service.gif" width="950" height="83" border="0" usemap="#Map33Map"></td>
                    </tr>
                  </table-->
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>
                        <?php require_once('include/footer.php');?>
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <map name="Map11Map" id="Map112">
              <area shape="rect" coords="2,2,97,187" href="{메인상품1링크}">
              <area shape="rect" coords="2,191,96,374" href="{메인상품2링크}">
            </map>

            <map name="Map33Map" id="Map332">
              <area shape="rect" coords="185,7,434,75" href="/center/company.php">
              <area shape="rect" coords="439,8,688,76" href="{로젠택배 화물추적}">
              <area shape="rect" coords="694,8,943,76" href="http://www.taxsave.go.kr/" target="_blank">
            </map></td>
          <td align="right" valign="top"><table width="69" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php require_once('include/quick.php');?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>

</body>
</html>
