<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
$sql = "select * from wiz_design";
$result = mysql_query($sql) or error(mysql_error());
$dsn_info = mysql_fetch_object($result);
?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          
                                          <?
                                          $nowposi = "디자인관리 &gt; <strong>디자인기본설정</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="basic">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>쇼핑몰 Title </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;쇼핑몰 Title</td>
                                                    <td width="78%" bgcolor="F8F8F8"><input name="site_title" value="<?=$dsn_info->site_title?>" size="30" type="text" class="form1"></td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;검색키워드</td>
                                                    <td bgcolor="F8F8F8"><input name="site_keyword" type="text" value="<?=$dsn_info->site_keyword?>" size="84" class="form1"></td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;소개글</td>
                                                    <td bgcolor="F8F8F8"><input name="site_intro" type="text" value="<?=$dsn_info->site_intro?>" size="84" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>디자인기본설정</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;쇼핑몰정렬</td>
                                                    <td width="78%" bgcolor="F8F8F8" colspan="3">
                                                    <input type="radio" name="site_align" value="LEFT" <? if($dsn_info->site_align == "LEFT" || $dsn_info->site_align == "") echo "checked"; ?>>좌측정렬&nbsp; 
                                                    <input type="radio" name="site_align" value="CENTER" <? if($dsn_info->site_align == "CENTER") echo "checked"; ?>>중앙정렬
                                                    <input type="radio" name="site_align" value="RIGHT" <? if($dsn_info->site_align == "RIGHT") echo "checked"; ?>>우측정렬
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전체배경색</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_bgcolor" value="<?=$dsn_info->site_bgcolor?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;배경이미지</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="site_background" class="form1">
                                                    <?
                                                    if(is_file("../../images/upfile/$dsn_info->site_background"))
                                                    	echo "<img src='../../images/upfile/$dsn_info->site_background' height='20'> <a href='dsn_save.php?mode=back_delete'><font color='red'>[삭제]</font></a>";
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;일반폰트색</td>
                                                    <td width="78%" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_font" value="<?=$dsn_info->site_font?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;링크(link)색</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_link" value="<?=$dsn_info->site_link?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;링크(active)색</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_active" value="<?=$dsn_info->site_active?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;링크(hover)색</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_hover" value="<?=$dsn_info->site_hover?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;링크(visited)색</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="site_visited" value="<?=$dsn_info->site_visited?>" class="form1"></td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="22%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;스타일시트</td>
                                                    <td width="78%" bgcolor="F8F8F8" colspan="3"></td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="F8F8F8" colspan="4">
                                                    <?
                                                    echo "<textarea name=\"dsn_css\" rows=\"15\" cols=\"112\" class=\"textarea\">";
                                                    $f_line = file("../../wiz_style.css","r");
                                                    for($ii=0; $ii<count($f_line);$ii++){
                                                    	echo $f_line[$ii];
                                                    }
                                                    echo "</textarea>";
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>