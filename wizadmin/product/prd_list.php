<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&showset=$showset&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

//체크박스선택 반전
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty(); 
	}
}

//체크박스 전체선택
function selectAll(){
	
	var i; 	
	
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

//체크박스 선택해제
function selectEmpty(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].action == "product_save.php"){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//선택상품 삭제
function prdDelete(){

	var i;
	var selected = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selected = selected + document.forms[i].prdcode.value + "|";
				}
			}
	}

	if(selected == ""){
		alert("삭제할 상품을 선택하지 않았습니다.");
		return;
	}else{
		if(confirm("선택한 상품을 정말 삭제하시겠습니까?")){
			document.location = "prd_save.php?mode=delete&page=<?=$page?>&<?=$param?>&selected=" + selected;
		}else{
			return;
		}
	}
	return;
	
}

function catChange(form, idx){
   if(idx == "1"){
      form.dep2_code.options[0].selected = true;
      form.dep3_code.options[0].selected = true;
   }else if(idx == "2"){
      form.dep3_code.options[0].selected = true;
   }
   	form.page.value = 1;
   	form.submit();
}

// 상품정보 엑셀다운
function excelDown(){
	var url = "prd_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=230, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}
//-->
</script>
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
                                          $nowposi = "상품관리 &gt; <strong>상품목록</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>상품목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
                                              <input type="hidden" name="page" value="<?=$page?>">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>상품분류</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="dep_code" onChange="catChange(this.form,'1');" class="select">
						                            <option value=''>:: 대분류 ::
						                           <?
						                           $sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1 order by priorno01 asc";
						                           $result = mysql_query($sql) or error(mysql_error());
						                           while($row = mysql_fetch_object($result)){
						                              if($row->catcode == $dep_code)
						                                 echo "<option value='$row->catcode' selected>$row->catname";
						                              else
						                                 echo "<option value='$row->catcode'>$row->catname";
						                           }
						                           ?>
						                            </select>
                                              <select name="dep2_code" onChange="catChange(this.form,'2');" class="select">
						                            <option value=''>:: 중분류 ::
						                           <?
						                           if($dep_code != ''){
						                              $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%' order by priorno02 asc";
						                              $result = mysql_query($sql) or error(mysql_error());
						                              while($row = mysql_fetch_object($result)){
						                                 if($row->catcode == $dep2_code)
						                                    echo "<option value='$row->catcode' selected>$row->catname";
						                                 else
						                                    echo "<option value='$row->catcode'>$row->catname";
						                              }
						                           }
						                           ?>
						                            </select>
                                              <select name="dep3_code" onChange="catChange(this.form,'3');" class="select">
						                            <option value=''>:: 소분류 ::
						                           <?
						                           if($dep_code != '' && $dep2_code != ''){
						                              $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%' order by  priorno03 asc";
						                              $result = mysql_query($sql) or error(mysql_error());
						                              while($row = mysql_fetch_object($result)){
						                                 if($row->catcode == $dep3_code)
						                                    echo "<option value='$row->catcode' selected>$row->catname";
						                                 else
						                                    echo "<option value='$row->catcode'>$row->catname";
						                              }
						                           }
						                           ?>
						                            </select>
                                              </td>
                                              <td width="10"></td>
                                              <td>
                                              <select name="searchopt" onChange="this.form.page.value=1;" style="BACKGROUND: #2369C9;width:100; COLOR: #ffffff; FONT: 9pt 돋움">
			                                     <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>상품명
			                                     <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>상품코드
			                                     <option value="prdcom" <? if($searchopt == "prdcom") echo "selected"; ?>>제조사
			                                     </select>
                                              </td>
                                              <td>
                                              <input type="text" size="18" name="searchkey" value="<?=$searchkey?>" class="form1">
                                              </td>
                                              <td width="5"></td>
                                              <td>
                                              <input name="Button3" type="submit" class="xbtn" value="검색">
                                              </td>
                                              </table>
                                              
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>그룹</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="special" onChange="this.form.page.value=1;this.form.submit();">
					                               <option value="">:: 그룹선택 ::
					                               <option value="new" <? if($special == "new") echo "selected"; ?>>신상품
					                               <option value="popular" <? if($special == "popular") echo "selected"; ?>>인기상품
					                               <option value="recom" <? if($special == "recom") echo "selected"; ?>>추천상품
					                               <option value="sale" <? if($special == "sale") echo "selected"; ?>>세일상품
					                               <option value="stock" <? if($special == "stock") echo "selected"; ?>>품절상품
					                               </select>
                                              </td>
                                              <td width="86" align="right"><font color="2369C9"><b>진열여부</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="showset" onChange="this.form.page.value=1;this.form.submit();">
					                               <option value="">:: 선택 ::
					                               <option value="Y" <? if($showset == "Y") echo "selected"; ?>>진열함
					                               <option value="N" <? if($showset == "N") echo "selected"; ?>>진열안함
					                               </select>
                                              </td>
                                              </form>
                                              </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <?
                                          	$sql = "select prdcode from wiz_product";
                                          	$result = mysql_query($sql) or error(mysql_error());
								                     $all_total = mysql_num_rows($result);
                                          	
								                     if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
								                     if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
								                     if(!empty($showset)) $showset_sql = "wp.showset = '$showset' and ";
								                     if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
								                     
								                     $sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc 
								                                    where $catcode_sql $special_sql $showset_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
													//echo $sql;
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								
								       	            $rows = 16;
								       	            $lists = 5;
															$page_count = ceil($total/$rows);
															if(!$page || $page > $page_count) $page = 1;
															$start = ($page-1)*$rows;
															$no = $total-$start;
															if($start>1) mysql_data_seek($result,$start);
								                  ?>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td>총 상품수 : <b><?=$all_total?></b> , 검색 상품수 : <b><?=$total?></b></td>
                                              <td align="right">
                                              <input type="button" class="t" value="엑셀파일저장" onClick="excelDown();">
                                              <input type="button" class="t" value="상품등록" onClick="document.location='prd_input.php?<?=$param?>'">
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="5%" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="10%" height="30" bgcolor="E9E7E7" align="center">상품코드</td>
                                              <td width="5%" bgcolor="E9E7E7"></td>
                                              <td width="40%" bgcolor="E9E7E7" align="center">상품명</td>
                                              <td width="10%" bgcolor="E9E7E7" align="right">상품가격</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">재고</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">진열순서</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                          </form>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															
															if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
															else $row->prdimg_R = "/prdimg/$row->prdimg_R";
															
															if($no%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
															
														?>
													     <form name="<?=$row->prdcode?>" action="product_save.php">
						                          <input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td align="center" height="52"><input type="checkbox" name="select_checkbox"></td>
                                              <td align="center"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdcode?></a></td>
                                              <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
                                              <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdname?></a></td>
                                              <td align="right"><?=number_format($row->sellprice)?>원</td>
                                              <td align="center"><?=$row->stock?></td>
                                              <td align="center">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td><a href="prd_save.php?mode=prior&posi=upup&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/upup_icon.gif" border="0" alt="10단계 위로"></a></td>
                                                  <td width="4"></td>
                                                  <td></td>
                                                </tr>
                                                <tr><td height="4"></td></tr>
                                                <tr>
                                                  <td><a href="prd_save.php?mode=prior&posi=up&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/up_icon.gif" border="0" alt="1단계 위로"></a></td>
                                                  <td width="4"></td>
                                                  <td><a href="prd_save.php?mode=prior&posi=down&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/down_icon.gif" border="0" alt="1단계 아래로"></a></td>
                                                </tr>
                                                <tr><td height="4"></td></tr>
                                                <tr>
                                                  <td></td>
                                                  <td width="4"></td>
                                                  <td><a href="prd_save.php?mode=prior&posi=downdown&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/downdown_icon.gif" border="0" alt="10단계 아래로"></a> </td>
                                                </tr>
                                                </table>
                                              </td>
                                              <td align="center"> 
                                                <input name="Button3" type="button" class="xbtn" value="수정" onclick="document.location='prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>'">
                                                <input name="Button3" type="button" class="xbtn" value="삭제" onclick="this.form.select_checkbox.checked=true;prdDelete('<?=$row->prdcode?>');">
                                              </td>
                                            </tr>
                                            </form>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                                          
							                   	if($total <= 0){
							                   		echo "<tr><td height='30' colspan=7 align=center>등록된 상품이 없습니다.</td></tr>";
							                   	}
								                  ?>
                                            <tr><td colspan=8 bgcolor=DEDEDE></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="60"><input type="button" value="선택삭제" onClick="prdDelete();" class="t"></td>
                                              <td width="640"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
                                            </tr>
                                          </table>
                                          <table width="717" height="60" border="0" cellpadding="0" cellspacing="0">
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