<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "status=$status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

// 주문상태 변경
function chgStatus(status){
   document.frm.status.value = status;
   document.frm.submit();
}

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
		if(document.forms[i].orderid != null){
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
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//선택상품 삭제
function orderDelete(){

	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + "|";
				}
			}
	}

	if(selorder == ""){
		alert("삭제할 주문을 선택하지 않았습니다.");
		return;
	}else{
		if(confirm("선택한 주문을 정말 삭제하시겠습니까?")){
			document.location = "order_save.php?mode=delete&selorder=" + selorder;
		}else{
			return;
		}
	}
	return;
	
}

// 선택주문 상태변경
function batchStatus(){
	
	var i;
	var selorder = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selorder = selorder + document.forms[i].orderid.value + "|";
				}
			}
	}

	if(selorder == ""){
		alert("변경할 주문을 선택하지 않았습니다.");
		return;
	}else{
		var url = "order_status.php?selorder=" + selorder;
		window.open(url,"batchStatus","height=150, width=250, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	return;
	
}

// 주문정보 엑셀다운
function excelDown(){
	var url = "order_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=270, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 기간설정
function setPeriod(pdate){
	
	var plist = pdate.split("-");
	
	prev_year = document.frm.prev_year;
	for(ii=0; ii<prev_year.length; ii++){
	   if(prev_year.options[ii].value == plist[0])
	      prev_year.options[ii].selected = true;
	}
	prev_month = document.frm.prev_month;
	for(ii=0; ii<prev_month.length; ii++){
	   if(prev_month.options[ii].value == plist[1])
	      prev_month.options[ii].selected = true;
	}
	prev_day = document.frm.prev_day;
	for(ii=0; ii<prev_day.length; ii++){
	   if(prev_day.options[ii].value == plist[2])
	      prev_day.options[ii].selected = true;
	}		
	
	document.frm.submit();	                        
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
                                          $nowposi = "주문관리 &gt; <strong>주문목록</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>주문목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form name="frm" action="<?=$PHP_SELF?>" method="get">
                                          <input type="hidden" name="page" value="">
                                          <input type="hidden" name="status" value="<?=$status?>">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>진행상태</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <input type="button" onClick="chgStatus('');" value=" 전체 " class="t">
                                              <input type="button" onClick="chgStatus('OR');" value="주문접수" class="t">
                                              <input type="button" onClick="chgStatus('OY');" value="결제완료" class="t">
                                              <input type="button" onClick="chgStatus('DR');" value="배송준비중" class="t">
                                              <input type="button" onClick="chgStatus('DI');" value="배송중" class="t">
                                              <input type="button" onClick="chgStatus('DC');" value="배송완료" class="t">
                                              <input type="button" onClick="chgStatus('OC');" value="주문취소" class="t">
                                              </td>
                                              </tr>
                                              <tr>
                                              <td width="70"></td>
                                              <td width="2"></td>
                                              <td>
                                              <input type="button" onClick="chgStatus('RD');" value="환불요청" class="t">
                                              <input type="button" onClick="chgStatus('RC');" value="환불완료" class="t">
                                              <input type="button" onClick="chgStatus('CD');" value="교환요청" class="t">
                                              <input type="button" onClick="chgStatus('CC');" value="교환완료" class="t">
                                              </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>기간</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              
                                              <select name="prev_year" class="select2">
						                           <?                     
						                              if(empty($next_year)) $next_year = date("Y");
						                              if(empty($next_month)) $next_month = date("m");
						                              if(empty($next_day)) $next_day = date("d");
						            
						                              for($ii=2004; $ii <= 2020; $ii++){
						                                if($ii == $prev_year) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             년 
						                             <select name="prev_month" class="select2">
						                               <?
						                              for($ii=1; $ii <= 12; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $prev_month) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             월 
						                             <select name="prev_day" class="select2">
						                               <?
						                              for($ii=1; $ii <= 31; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $prev_day) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             일 ~ 
						                             <select name="next_year" class="select2">
						                               <?
						                              for($ii=2004; $ii <= 2020; $ii++){
						                                if($ii == $next_year) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             년 
						                             <select name="next_month" class="select2">
						                               <?
						                              for($ii=1; $ii <= 12; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $next_month) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             월 
						                             <select name="next_day" class="select2">
						                               <?
						                              for($ii=1; $ii <= 31; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $next_day) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             일 &nbsp; 
						                           <?
						                           $yes_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*1));
						                           $to_day = date('Y-m-d');
						                           $week_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*7));
						                           $month_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*30));
						                           ?>
						                             <a href="javascript:setPeriod('<?=$to_day?>')"><font color=red>[오늘]</font></a> 
						                             <a href="javascript:setPeriod('<?=$yes_day?>')"><font color=red>[어제]</font></a> 
						                             <a href="javascript:setPeriod('<?=$week_day?>')"><font color=red>[1주일]</font></a> 
						                             <a href="javascript:setPeriod('<?=$month_day?>')"><font color=red>[1개월]</font></a>
                                              </td>
                                              </tr>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>조건검색</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              	<select name="searchopt" class="select2">
				                                    <option value="send_name" <? if($searchopt == "send_name") echo "selected"; ?>>주문자명
				                                    <option value="rece_name" <? if($searchopt == "rece_name") echo "selected"; ?>>수취인명
				                                    <option value="orderid" <? if($searchopt == "orderid") echo "selected"; ?>>주문번호
				                                    <option value="send_id" <? if($searchopt == "send_id") echo "selected"; ?>>아이디
				                                    <option value="send_hphone" <? if($searchopt == "send_hphone") echo "selected"; ?>>휴대폰
				                                    <option value="rece_tphone" <? if($searchopt == "rece_tphone") echo "selected"; ?>>전화번호
				                                    <option value="send_email" <? if($searchopt == "send_email") echo "selected"; ?>>이메일
				                                    <option value="account_name" <? if($searchopt == "account_name") echo "selected"; ?>>입금자명
				                                    </select>
                                              </td>
                                              <td><input type="text" name="searchkey" value="<?=$searchkey?>" class="form1"></td>
                                              <td><input type="submit" value="검색" class="xbtn"></td>
                                              </tr>
                                              </table>
                                              </td>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="700" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <?
                                          	$sql = "select orderid from wiz_order where status != ''";
                                          	$result = mysql_query($sql) or error(mysql_error());
								                     $all_total = mysql_num_rows($result);
                                          	
								                     if(!empty($prev_year)){
								                        $prev_period = $prev_year."-".$prev_month."-".$prev_day;
								                        $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
								                        $period_sql = " and wo.order_date >= '$prev_period' and wo.order_date <= '$next_period'";
								                     }
								                     if(!empty($status)) $status_sql = "and wo.status = '$status'";
								                     else $status_sql = "and wo.status != ''";
								                     
								                     if(!empty($searchopt) && !empty($searchkey)) $searchopt_sql = " and wo.$searchopt like '%$searchkey%'";
								                     
								                     $sql = "select order_date, orderid, send_name, send_id, pay_method, total_price, status from wiz_order wo where orderid !='' $status_sql $period_sql $searchopt_sql order by orderid desc";
								                     
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								       	            
								       	            $rows = 20;
								       	            $lists = 5;
								                   	$page_count = ceil($total/$rows);
								                   	if($page < 1 || $page > $page_count) $page = 1;
								                   	$start = ($page-1)*$rows;
								                   	$no = $total-$start;
								                   	if($start>1) mysql_data_seek($result,$start);
								                  ?>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td>총 주문수 : <b><?=$all_total?></b> &nbsp; 검색 주문수 : <b><?=$total?></b></td>
                                              <td align="right">
													       &nbsp; <font color="6DCFF6">■</font> 결제완료
													       &nbsp; <font color="BD8CBF">■</font> 배송완료
													       &nbsp; <font color="ED1C24">■</font> 주문취소 &nbsp; 
													       <input type="button" class="t" value="엑셀파일저장" onClick="excelDown();">
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="5%" height="30" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="12%" bgcolor="E9E7E7" align="center">주문일</td>
                                              <td width="15%" bgcolor="E9E7E7" align="center">주문번호</td>
                                              <td width="18%" bgcolor="E9E7E7" align="center">주문자명</td>
                                              <td width="13%" bgcolor="E9E7E7" align="center">주문방법</td>
                                              <td width="12%" bgcolor="E9E7E7" align="right">주문금액 &nbsp; &nbsp;</td>
                                              <td width="12%" bgcolor="E9E7E7" align="center">진행상태</td>
                                              <td width="13%" bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                            <tr><td colspan="9" bgcolor="DEDEDE"></td></tr>
                                          </form>
														<?
														$orderid = "";
														while(($row = mysql_fetch_object($result)) && $rows){
															
															
															if($orderid == $row->orderid) continue;
															else $orderid = $row->orderid; $ordernum = 0;
															
															
															
															if($no%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
															
															
															if($row->status == "OY") $stacolor = "6DCFF6";
															else if($row->status == "DC" || $row->status == "CC") $stacolor = "BD8CBF";
															else if($row->status == "OC" || $row->status == "RC") $stacolor = "ED1C24";
															else $stacolor = "";

														
														?>
													     <form action="order_save.php" name="<?=$row->prdcode?>" method="get">
                                            <input type="hidden" name="mode" value="chgstatus">
                                            <input type="hidden" name="page" value="<?=$page?>">
                                            <input type="hidden" name="orderid" value="<?=$row->orderid?>">
                                            
                                            <input type="hidden" name="status" value="<?=$status?>">
                                            <input type="hidden" name="prev_year" value="<?=$prev_year?>">
                                            <input type="hidden" name="prev_month" value="<?=$prev_month?>">
                                            <input type="hidden" name="prev_day" value="<?=$prev_day?>">
                                            <input type="hidden" name="next_year" value="<?=$next_year?>">
                                            <input type="hidden" name="next_month" value="<?=$next_month?>">
                                            <input type="hidden" name="next_day" value="<?=$next_day?>">
                                            <input type="hidden" name="searchopt" value="<?=$searchopt?>">
                                            <input type="hidden" name="searchkey" value="<?=$searchkey?>">
                                            <tr><td height="4"></td></tr>
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td align="center" height="27"><input type="checkbox" name="select_checkbox"></td>
                                              <td align="center"><?=substr($row->order_date,0,16)?></td>
                                              <td align="center"><a href="order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><?=$row->orderid?></a></td>
                                              <td align="center"> 
                                              <?
                                              if($row->send_id == "") echo "$row->send_name [비회원]";
                                              else echo "<a href='../member/member_info.php?mode=update&id=$row->send_id'>$row->send_name [$row->send_id]</a>";
                                              ?>
                                              </td>
                                              <td align="center"><?=pay_method($row->pay_method)?></td>
                                              <td align="right"><?=number_format($row->total_price)?>원 &nbsp; &nbsp;</td>
                                              <td align="center"  bgcolor=<?=$stacolor?>>
                                              <select name="chg_status" style="width:90">
                                              <?
                      									if($row->status == "OR"){
                      								 ?>
                                              <option value="OR" <? if($row->status == "OR") echo "selected"; ?>>주문접수
                                              <option value="OY" <? if($row->status == "OY") echo "selected"; ?>>결제완료
                      								 <?
                      									}else{
                      								 ?>
                                              <option value="OY" <? if($row->status == "OY") echo "selected"; ?>>결제완료
                                              <option value="DR" <? if($row->status == "DR") echo "selected"; ?>>배송준비중
                                              <option value="DI" <? if($row->status == "DI") echo "selected"; ?>>배송중
                                              <option value="DC" <? if($row->status == "DC") echo "selected"; ?>>배송완료
                                              <option value="OC" <? if($row->status == "OC") echo "selected"; ?>>주문취소
                                              <option>----------
                                              <option value="RD" <? if($row->status == "RD") echo "selected"; ?>>환불요청
                                              <option value="RC" <? if($row->status == "RC") echo "selected"; ?>>환불완료
                                              <option value="CD" <? if($row->status == "CD") echo "selected"; ?>>교환요청
                                              <option value="CC" <? if($row->status == "CC") echo "selected"; ?>>교환완료
                                              <?
                                             	}
                                              ?>
                                              </select>
                                              </td>
                                              <td align="center">
                                              <input type="submit" class="xbtn" value="적용">
                                              <input type="button" class="xbtn" value="보기" onClick="document.location='order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>'">
                                              </td>
                                            </tr>
                                            <tr><td height="4"></td></tr>
                                            </form>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }

							                   	if($total <= 0){
							                   		echo "<tr><td height='30' colspan=9 align=center>등록된 주문이 없습니다.</td></tr>";
							                   	}
								                  ?>
                                            <tr><td colspan=8 bgcolor=DEDEDE></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="30%">
                                                <input type="button" value="선택삭제" onClick="orderDelete();" class="t">
                                                <input type="button" value="상태일괄변경" onClick="batchStatus();" class="t">
                                              </td>
                                              <td width="30%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
                                              <td width="30%"></td>
                                            </tr>
                                          </table>
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