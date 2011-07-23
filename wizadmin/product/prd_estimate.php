<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&keyword=$keyword";
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
function delSelEstimate(){

	var i;
	var selected = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selected = selected + document.forms[i].estiidx.value + "|";
				}
			}
	}

	if(selected == ""){
		alert("삭제할 상품평을 선택하지 않았습니다.");
		return;
	}else{
		if(confirm("선택한 상품을 정말 삭제하시겠습니까?")){
			document.location = "prd_save.php?mode=delesti&page=<?=$page?>&selected=" + selected;
			return;
		}else{
			return;
		}
	}
	return;
	
}

function delEstimate(idx){
   if(confirm('상품평을 삭제하시겠습니까?')){
      document.location = "prd_save.php?mode=delesti&page=<?=$page?>&estiidx=" + idx;
   }
}

function searchEstimate(searchopt,keyword){
	document.searchForm.searchopt.value = searchopt;
	document.searchForm.keyword.value = keyword;
	document.searchForm.page.value = "1";
	document.searchForm.submit();
}
//-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="87%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          
                                          <?
                                          $nowposi = "상품관리 &gt; <strong>상품평관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>상품평목록 </strong></td>
                                            </tr>
                                          </table> 
                                          <?
                                          	$sql = "select idx from wiz_comment";
                                          	$result = mysql_query($sql) or error(mysql_error());
								                     $all_total = mysql_num_rows($result);
								                     
								                     if(empty($searchopt)){
								                     	
								                        $sql = "select we.*, wp.prdimg_R, wp.prdname from wiz_comment as we, wiz_product as wp where we.prdcode = wp.prdcode order by wdate desc";
								                     
								                     }else{
								                     
								                     	if($searchopt == "prdcode" || $searchopt == "prdname") $search_sql = "wp.$searchopt like '%$keyword%'";
								                     	else $search_sql = "we.$searchopt like '%$keyword%'";
								                     	
								                        $sql = "select we.*, wp.prdimg_R, wp.prdname from wiz_comment as we, wiz_product as wp where we.prdcode = wp.prdcode and $search_sql order by wdate desc";
								                     }

								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								       	            
								       	            $rows = 20;
								       	            $lists = 5;
								                   	$page_count = ceil($total/$rows);
								                   	if(!$page || $page > $page_count) $page = 1;
								                   	$start = ($page-1)*$rows;
								                   	$no = $total-$start;
								                   	if($start>1) mysql_data_seek($result,$start);
								                  ?>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td>총 상품평수 : <b><?=$all_total?></b> , 검색 상품평수 : <b><?=$total?></b></td>
                                              <td align="right">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
                                              <input type="hidden" name="page" value="<?=$page?>">
                                              <tr>
                                              <td>
                                              <select name="searchopt" onChange="this.form.page.value=1;" style="BACKGROUND: #2369C9;width:100; COLOR: #ffffff; FONT: 9pt 돋움">
			                                     <option value="">:: 선택 ::
			                                     <option value="content" <? if($searchopt == "content") echo "selected"; ?>>상품평
			                                     <option value="name" <? if($searchopt == "name") echo "selected"; ?>>글쓴이
			                                     <option value="id" <? if($searchopt == "id") echo "selected"; ?>>아이디
			                                     <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>상품코드
			                                     <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>상품명
			                                     </select>
                                              </td>
                                              <td><input type="text" name="keyword" value="<?=$keyword?>" size="13" class="form1"></td>
                                              <td><input type="submit" class="t" value="검색"></td>
                                              </tr>
                                              </table>
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="20" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="50" height="30" bgcolor="E9E7E7" align="center">번호</td>
                                              <td width="100" bgcolor="E9E7E7" align="center">상품</td>
                                              <td width="300" bgcolor="E9E7E7" align="center">상품평</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">글쓴이</td>
                                              <td width="90" bgcolor="E9E7E7" align="center">작성일</td>
                                              <td width="50" bgcolor="E9E7E7" align="center">기능</td>
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
						                          <input type="hidden" name="estiidx" value="<?=$row->idx?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td width="20" align="center"><input type="checkbox" name="select_checkbox"></td>
                                              <td width="50" height="30" align="center"><?=$no?></td>
                                              <td width="100" align="center">
                                                <a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="_blank"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a><br>
                                                <a href="javascript:searchEstimate('prdcode','<?=$row->prdcode?>');" class="3">검색</a>
                                              </td>
                                              <td width="300"><?=$row->content?> <img src="/images/icon_star_<?=$row->star?>.gif"></td>
                                              <td width="60" align="center"><a href="javascript:searchEstimate('name','<?=$row->name?>');" class="3"><?=$row->name?></a><br>(<? if($row->id=="") echo "비회원"; else echo "<a href=javascript:searchEstimate('id','$row->id');>$row->id</a>"; ?>)</td>
                                              <td width="90" align="center"><?=$row->wdate?></td>
                                              <td align="center"> 
                                                <input name="Button3" type="button" class="xbtn" value="삭제" onclick="delEstimate('<?=$row->idx?>');">
                                              </td>
                                            </tr>
                                            </form>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                                          
							                   	if($total <= 0){
							                   	   echo "<tr><td colspan=8 bgcolor=DEDEDE></td></tr>";
							                   		echo "<tr><td height='30' colspan=7 align=center>등록된 상품평 없습니다.</td></tr>";
							                   		echo "<tr><td colspan=8 bgcolor=DEDEDE></td></tr>";
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
                                              <td width="80"><input type="submit" class="t" value="선택삭제" onClick="delSelEstimate();"></td>
                                              <td align="center"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
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