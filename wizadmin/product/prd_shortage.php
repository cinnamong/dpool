<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&searchopt=$searchopt&searchkey=$searchkey&stock_opt=$stock_opt";
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
			document.location = "prd_save.php?mode=delete&<?=$param?>&selected=" + selected;
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

function editOption(prdcode){

	var url = "option_edit.php?prdcode=" + prdcode;
	window.open(url,"editOption","height=300, width=300, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no");

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
                                          $nowposi = "상품관리 &gt; <strong>재고관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>재고목록 </strong></td>
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
						                           $sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1";
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
						                              $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%'";
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
						                              $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%'";
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
			                                    <option value="">:: 선택 ::
			                                    <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>상품코드
			                                    <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>상품명
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
                                              <td width="70">&nbsp; <font color="2369C9"><b>재고상태</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <input type="radio" name="stock_opt" value="all" onclick="this.form.submit();" <? if($stock_opt=="all" || $stock_opt=="") echo "checked"; ?>>전체 
                                                <input type="radio" name="stock_opt" value="shortage" onclick="this.form.submit();" <? if($stock_opt=="shortage") echo "checked"; ?>>품절 
                                                <input type="radio" name="stock_opt" value="lack" onclick="this.form.submit();" <? if($stock_opt=="lack") echo "checked"; ?>>부족 
                                                <input type="radio" name="stock_opt" value="reserve" onclick="this.form.submit();" <? if($stock_opt=="reserve") echo "checked"; ?>>여유 
                                                <input type="radio" name="stock_opt" value="showset" onclick="this.form.submit();" <? if($stock_opt=="showset") echo "checked"; ?>>진열안함 
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
								                     
								                     //if($stock_opt == "shortage") $stock_sql = "wp.shortage = 'Y' and ";
								                     //if($stock_opt == "lack") $stock_sql = "wp.stock <= wp.savestock and ";
								                     //if($stock_opt == "reserve") $stock_sql = "wp.stock > wp.savestock and ";
								                     //if($stock_opt == "showset") $stock_sql = "wp.showset = 'N' and ";
								                     
								                     if($stock_opt == "shortage") $stock_sql = "wp.optcode like '%^품절^%' and ";
								                     if($stock_opt == "lack") $stock_sql = "wp.optcode like '%^1^%' and ";
								                     if($stock_opt == "reserve") $stock_sql = "wp.optcode not like '%^품절^%' and ";
								                     if($stock_opt == "showset") $stock_sql = "wp.showset = 'N' and ";
								                     
								                     if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
								                     
								                     $sql = "select distinct wp.prdcode, wp.optcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock, wp.savestock from wiz_product wp, wiz_cprelation wc 
								                                    where $catcode_sql $stock_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
								                                    
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
                                              <td>총 상품수 : <b><?=$all_total?></b> , 검색 상품수 : <b><?=$total?></b></td>
                                              <td align="right"></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="70" height="30" bgcolor="E9E7E7" align="center">상품코드</td>
                                              <td width="50" bgcolor="E9E7E7" align="center"></td>
                                              <td width="245" bgcolor="E9E7E7" align="center">상품명</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">판매가</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">여유</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">재고</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">안전재고</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                          <?
														while(($row = mysql_fetch_object($result)) && $rows){
															
															if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
															else $row->prdimg_R = "/prdimg/$row->prdimg_R";
															
															if($no%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
															$reserve = $row->stock - $row->savestock;
															
															// 옵션별 재고부족상품
															$short_list = "";
															$opt_list = explode("^^",$row->optcode);
															for($ii=0; $ii < count($opt_list)-1; $ii++){
																$opt_list2 = explode("^",$opt_list[$ii]);
																if($opt_list2[2] <= 1) $short_list .= "<font color='red'>".$opt_list2[0]." - ".$opt_list2[2]."개</font><br>";
																else $short_list .= "<font color='blue'>".$opt_list2[0]." - ".$opt_list2[2]."개</font><br>";
															}
															
														?>
														  <form action="prd_save.php?<?=$param?>" method="post">
														  <input type="hidden" name="mode" value="stock">
														  <input type="hidden" name="page" value="<?=$page?>">
														  <input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
													     <tr bgcolor="<?=$bgcolor?>"> 
                                              <td width="70" height="52" align="center"><?=$row->prdcode?></td>
                                              <td width="50"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&shortpage=Y&<?=$param?>&page=<?=$page?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
                                              <td width="245" align="center"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&shortpage=Y&<?=$param?>&page=<?=$page?>"><?=$row->prdname?></a><br><?=$short_list?></td>
                                              <td width="80" align="center"><?=number_format($row->sellprice)?>원</td>
                                              <td width="80" align="center"><?=$reserve?></td>
                                              <td width="75" align="center"><input type="text" size="6" name="stock" value="<?=$row->stock?>" <? if($row->stock > 0) echo "class='formB'"; else echo "class='formR'"; ?>></td>
                                              <td width="75" align="center"><input type="text" size="6" name="savestock" value="<?=$row->savestock?>" class="form1"></td>
                                              <td width="90" align="center"><input type="submit" class="xbtn" value="수정"> <input type="button" class="xbtn" value="옵션" onClick="editOption('<?=$row->prdcode?>');"></td>
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
                                          
                                          <? print_pagelist($page, $lists, $page_count, "&$param"); ?>

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