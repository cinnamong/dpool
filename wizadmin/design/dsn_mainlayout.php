<? include "../../inc/global.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

                        <table width="724" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="624" height="3"></td>
                          </tr>
                        </table>
                        <table width="724" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="724" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="724" border="0" cellspacing="1" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="top" bgcolor="#FFFFFF"><table width="717" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </Tr>
                                          </table>
                                          <table width="700" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><img src="../image/tit_sub02_1.gif" width="703" height="38"></td>
                                            </tr>
                                          </table>
                                          <table width="665" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="30">디자인관리 &gt; 메인화면구성</td>
                                            </tr>
                                          </table>
                                          <table width="700" height="1" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td bgcolor="e4e4e4"></td></tr>
                                          </table> 
                                          
                                          <table width="675" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>메인화면구성</strong></td>
                                            </tr>
                                          </table>
                                          
                                          <table width="700" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="main_layout">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="700" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;디자인방법</td>
                                                    <td width="80%" bgcolor="F8F8F8" colspan="3">
                                                    <select name="main_type">
                                                    <option value="SKIN" <? if($design_info->main_type == "SKIN" || $design_info->main_type == "") echo "selected"; ?>>레아이웃적용
                                                    <option value="HTML" <? if($design_info->main_type == "HTML") echo "selected"; ?>>HTML/PHP
                                                    </select>
                                                    </td>
                                                  </tr>
                                                  <tr>
																    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;레이아웃</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                    <td width="200">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                    <?
                                                    $skin_dir = "../../skin/main";
                                                    $handle = opendir($skin_dir);
																	 while ($file = readdir($handle)) {
																	 	$skin_type = substr($file,0,10);
																	 	$skin_ext = substr($file,-3);
																	 	if($skin_ext == "inc"){
																	 		if($design_info->main_file == $file) $sum_nail = $skin_type.".gif";
																	 ?>
																	 <tr><td height="10"></td></tr>
																	 <tr>
																	   <td width="20"><input type="radio" name="main_file" value="<?=$file?>" onClick="document.layout_img.src='/skin/main/<?=$skin_type?>.gif'" <? if($design_info->main_file == $file) echo "checked"; ?>></td>
																	   <td width="180""><?=$skin_type?></td>
																	 </tr>
																	 <?
																	 	}
																	 }
																	 closedir($handle);
                                                    ?>
                                                    </table>
                                                    </td>
                                                    <td  width="350" align="center">
                                                      <img src="/skin/main/<?=$sum_nail?>" name="layout_img">
                                                    </td>
                                                    </table>
                                                    </td>
																  </tr>
																  <tr>
																    <td bgcolor="EAEAEA">
																    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HTML/PHP소스</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <table>
                                                        <tr>
                                                          <td>&nbsp; &lt;?=$main_img?&gt; </td><td>: 메인이미지</td>
                                                          <td>&nbsp; &lt;?=$notice?&gt; </td><td>: 공지사항</td>
                                                        </tr>
                                                        <tr>
                                                          <td>&nbsp; &lt;?=$main_product?&gt; </td><td>: 상품목록</td>
                                                          <td>&nbsp; &lt;?=$right_banner?&gt; </td><td>: 우측배너</td><td></td>
                                                        </tr>
                                                      </table>
                                                    </td>
																  </tr>
																	<?
																		echo "<tr> <td width=\"550\" bgcolor=\"F8F8F8\" colspan=\"4\">";
																		echo "<textarea name=\"dsn_main\" rows=\"20\" cols=\"112\" class=\"textarea\">";
																		$f_line = file("../../skin/main.inc","r");
																		for($ii=0; $ii<count($f_line);$ii++){
																		echo $f_line[$ii];
																		}
																		echo "</textarea>";
																		echo "</td>";
																		echo "</tr>";
																	?>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="700" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="700" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='dsn_popup_list.php';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td>
                                          </tr>
                                          </table>
                                          <table width="700" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="717" height="175" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="624" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="..../image/bg_shadowb.gif" width="624" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>