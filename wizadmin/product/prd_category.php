<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
if($mode == "update"){
$sql = "select * from wiz_category where catcode = '$catcode'";
$result = mysql_query($sql) or error(mysql_error());
$cat_info = mysql_fetch_object($result);
}
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
                                          $nowposi = "상품관리 &gt; <strong>상품분류</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>상품분류 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                          <td width="40%" valign="top">
	                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
	                                            <tr>
	                                              <td bgcolor="D5D3D3" valign="top">
	                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
	                                                  <tr> 
	                                                    <td width="100%" height="30" align="center" bgcolor="EAEAEA" valign="top">
	                                                    
	                                                    <table width="100%" height="400" border="0" cellspacing="1" cellpadding="6">
	                                                    <tr><td bgcolor="#ffffff" valign="top">
	                                                    <? include "category_list.php"; ?>
	                                                    </td></tr>
	                                                    </table>
	                                                    
	                                                    </td>
	                                                  </tr>
	                                                </table>
	                                              </td>
	                                              <td width="5"></td>
	                                              <td>
	                                                <br><br><br>
	                                                <a href="category_save.php?mode=updateprior&posi=up&catcode=<?=$catcode?>&depthno=<?=$depthno?>"><img src="../image/btn_list_pre.gif" border="0"></a><br><br><br><br>
	                                                <a href="category_save.php?mode=updateprior&posi=down&catcode=<?=$catcode?>&depthno=<?=$depthno?>"><img src="../image/btn_list_next.gif" border="0"></a>
	                                              </td>
	                                              <td width="10"></td>
	                                            </tr>
	                                          </table>
                                          </td>
                                          <td width="60%" height="400" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
	                                            <tr>
	                                              <td>
	                                                 <script language="JavaScript" type="text/javascript">
                                                    <!--
                                                    
                                                      function inputCheck(frm){
	                                                     if(frm.catname.value == ""){
		                                                    alert("분류명을 입력하세요");
		                                                    frm.catname.focus();
		                                                    return false;
	                                                     }
                                                      }
                                                      
                                                      function showCatsub(gubun){

                                                      	cat_sub.style.display = 'none';
                                                      	cat_sub2.style.display = 'none';
                                                      	
                                                      	if(gubun == "NON") cat_sub.style.display = 'none';
                                                      	else if(gubun == "FIL") cat_sub.style.display = '';
                                                      	else if(gubun == "HTM") cat_sub2.style.display = '';

																		}
                                                     -->
                                                    </script>
                                                    <?
                                                    if($mode == "") $mode = "insert";
                                                    ?>
	                                                 <table width="100%" border="0" cellspacing="0" cellpadding="0"  valign="top">
	                                                 <form action="category_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
			                                           <input type="hidden" name="mode" value="<?=$mode?>">
                                                    <input type="hidden" name="catcode" value="<?=$catcode?>">
                                                    <input type="hidden" name="depthno" value="<?=$depthno?>">
			                                            <tr>
			                                              <td bgcolor="D5D3D3">
			                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;위치</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <?
			                                                      $catname = "최상위";
			                                                      if($catcode != ""){
			                                                    		$catcode1 = substr($catcode,0,2);
																					   $catcode2 = substr($catcode,0,4);
																					   $sql = "select * from wiz_category where (catcode like '$catcode1%' and depthno = 1)
																					                                                or (catcode like '$catcode2%' and depthno = 2)
																					                                                or (catcode = '$catcode')";
																					   $result = mysql_query($sql) or error(mysql_error());
																					   
																					   while($prow = mysql_fetch_object($result)){
																					      $catname .= " &gt; <a href=prd_category.php?mode=update&catcode=$prow->catcode>$prow->catname</a>";
																					   }
																					}
			                                                    	echo $catname;
			                                                    ?>
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;분류명</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <input name="catname" value="<?=$cat_info->catname?>" size="30" type="text" class="form1">&nbsp; 
			                                                    <input type="checkbox" name="catuse" value="N" <? if($cat_info->catuse == "N") echo "checked"; ?>>분류숨김
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;메뉴이미지</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <?
			                                                    if(is_file("../../images/catimg/$cat_info->catimg")) echo "<img src='/images/catimg/$cat_info->catimg'> <a href=category_save.php?mode=delcatimg&catcode=$catcode&depthno=$depthno><font color=red>[삭제]</font></a>";
			                                                    ?>
			                                                    <input name="catimg" type="file" class="form1">
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;롤오버이미지</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <?
			                                                    if(is_file("../../images/catimg/$cat_info->catimg_over")) echo "<img src='/images/catimg/$cat_info->catimg_over'> <a href=category_save.php?mode=delcatimg_over&catcode=$catcode&depthno=$depthno><font color=red>[삭제]</font></a>";
			                                                    ?>
			                                                    <input name="catimg_over" type="file" class="form1">
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;서브상단</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <input type="radio" name="subimg_type" onClick="showCatsub('NON');" value="NON" <? if($cat_info->subimg_type == "NON" || $cat_info->subimg_type == "") echo "checked"; ?>>없음
			                                                    <input type="radio" name="subimg_type" onClick="showCatsub('FIL');" value="FIL" <? if($cat_info->subimg_type == "FIL") echo "checked"; ?>>이미지/플레쉬
			                                                    <input type="radio" name="subimg_type" onClick="showCatsub('HTM');" value="HTM" <? if($cat_info->subimg_type == "HTM") echo "checked"; ?>>HTML

				                                                  <div id='cat_sub' style="display:<? if($cat_info->subimg_type == "FIL") echo "show"; else echo "none"; ?>">
				                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				                                                  <tr> 
				                                                    <td width="300" bgcolor="F8F8F8">
				                                                    <?
				                                                    if(is_file("../../images/subimg/$cat_info->subimg")){
				                                                    	$img_ext = substr($cat_info->subimg,-3);
				                                                    	if($img_ext == "swf"){
				                                                    		echo "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\">";
																							echo "<param name=\"movie\" value=\"/images/subimg/$cat_info->subimg\">";
																							echo "<param name=\"quality\" value=\"high\">";
																							echo "<embed src=\"/images/subimg/$cat_info->subimg\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"></embed>";
																							echo "</object>";
				                                                   	}else{
				                                                   		echo "<img src='/images/subimg/$cat_info->subimg' width='290'>";
				                                                   	}
				                                                    }
				                                                    ?>
				                                                    <input name="subimg" type="file" class="form1">
				                                                    </td>
				                                                  </tr>
				                                                  </table>
				                                                  </div>
				                                                  
				                                                  <div id='cat_sub2' style="display:<? if($cat_info->subimg_type == "HTM") echo "show"; else echo "none"; ?>">
				                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				                                                  <tr> 
				                                                    <td width="300" bgcolor="F8F8F8">
				                                                    <textarea name="subimg02" cols="45" rows="5" class="textarea"><?=$cat_info->subimg?></textarea>
				                                                    </td>
				                                                  </tr>
				                                                  </table>
				                                                  </div>
			                                                  
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;상품크기</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    가로 <input type="text" name="prd_width" value="<? if($cat_info->prd_width=="") echo "130"; else echo $cat_info->prd_width; ?>" size="5" class="form1"> px&nbsp; 
			                                                    세로 <input type="text" name="prd_height" value="<? if($cat_info->prd_height=="") echo "130"; else echo $cat_info->prd_height; ?>" size="5" class="form1"> px 
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;상품진열수</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <input type="text" name="prd_num" value="<? if($cat_info->prd_num=="") echo "20"; else echo $cat_info->prd_num; ?>" size="5" class="form1"> 개&nbsp; 
			                                                    </td>
			                                                  </tr>
			                                                  <tr> 
			                                                    <td width="100" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;추천상품 진열</td>
			                                                    <td width="300" bgcolor="F8F8F8">
			                                                    <input type="radio" name="recom_use" value="Y" <? if($cat_info->recom_use == "Y") echo "checked";?>>사용
			                                                    <input type="radio" name="recom_use" value="N" <? if($cat_info->recom_use == "N" || $cat_info->recom_use == "" ) echo "checked";?>>사용안함<br>
			                                                    상품목록 페이지 상단에 추천상품 진열
			                                                    </td>
			                                                  </tr>
			                                                </table>
			                                              </td>
			                                            </tr>
			                                          </table>
			                                          <table width="10" height="10" border="0" cellpadding="0" cellspacing="0">
			                                            <tr> 
			                                              <td></td>
			                                            </tr>
			                                          </table>
			                                          <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			                                          <?
			                                          if($mode == "insert"){
			                                          ?>
			                                            <tr>
			                                              <td align="center"><input type="submit" class="t" value=" 등 록 "></td>
			                                            </tr>
			                                          <?
			                                          }else if($mode == "update"){
			                                          ?>
			                                            <tr>
			                                              <td width="60">
			                                              <?
			                                              if($depthno != 3){
			                                              ?>
			                                              <input type="button" class="t" value=" 하위분류 등록 " onClick="document.location='prd_category.php?mode=insert&catcode=<?=$catcode?>&depthno=<?=$depthno?>';">
			                                              <?
			                                              }
			                                              ?>
			                                              </td>
			                                              <td width="100">&nbsp;</td>
			                                              <td><input type="submit" class="t" value=" 수 정 "></td>
			                                              <td width="10">&nbsp;</td>
			                                              <td><input type="button" class="t" value=" 삭 제 " onClick="document.location='category_save.php?mode=delete&catcode=<?=$catcode?>&depthno=<?=$depthno?>';"></td>
			                                              <td width="100">&nbsp;</td>
			                                            </tr>
			                                          <?
			                                          }
			                                          ?>
			                                          </form>
			                                          </table><br><br>
			                                          <table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
			                                            <tr> 
			                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
			                                                <strong>도움말</strong></td>
			                                            </tr>
			                                          </table>
			                                          <table width="100%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8"  valign="bottom">
			                                            <tr>
			                                              <td>
			                                              - 카테고리 정보 수정시 카테고리 클릭후 오른쪽에서 변경합니다.<br>
			                                              - 카테고리 순서 변경시 클릭후 위아래 화살표를 이용합니다.
			                                              </td>
			                                            </tr>
			                                          </table>
	                                              </td>
	                                            </tr>
	                                          </table>
	                                           
                                          </td>
                                          </tr>
                                          </table><br>
                                          <table width="717" height="60" border="0" cellpadding="0" cellspacing="0">
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
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>