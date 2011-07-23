<?
include "../inc/global.inc"; 		// DB컨넥션, 접속자 파악
include "../inc/connect.inc";		// 접소카운터
include "../inc/util_lib.inc"; 	// 유틸 라이브러리
include "../inc/shop_info.inc"; 	// 운영정보
include "../inc/design_info.inc"; // 디자인 정보
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? include "../include/meta.inc"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../css/css.css" rel="stylesheet" type="text/css">
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
    <td height="146" align="center" valign="top" background="../img/top_bg.gif"><table width="1030" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="950"><table width="950" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>
                  <?php require_once('../include/top_menu.php');?>
                </td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      
    </td>
  </tr>
  <tr>
    <td align="center" style="padding:10 0 0 0"><table width="1030" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="950"><table width="950" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="184" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td>
                              <?php require_once('../include/left_menu.php');?>
                            </td>
                          </tr>
                        </table></td>
                      <td width="803" valign="top" style="padding:0 0 0 10">
					  
여기?
						</td>
                    </tr>

                  </table>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>
                        <?php require_once('../include/footer.php');?>
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <map name="Map11Map" id="Map112">
              <area shape="rect" coords="2,2,97,187" href="#">
              <area shape="rect" coords="2,191,96,374" href="#">
            </map>

		</td>
          <td align="right" valign="top"><table width="69" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php require_once('../include/quick.php');?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>

</body>
</html>
