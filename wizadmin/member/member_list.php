<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//------------------------------------------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

// 주문상태 변경
function chgStatus(status){
   document.searchForm.status.value = status;
   document.searchForm.submit();
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
		if(document.forms[i].id != null){
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
			if(document.forms[i].id != null){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//선택회원 삭제
function userDelete(){

	var i;
	var seluser = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].id != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					seluser = seluser + document.forms[i].id.value + "|";
				}
			}
	}

	if(seluser == ""){
		alert("삭제할 회원을 선택하지 않았습니다.");
		return false;
	}else{
		if(confirm("선택한 회원을 정말 삭제하시겠습니까?")){
			document.location = "member_save.php?mode=deluser&seluser=" + seluser;
		}
	}
}


// 상세검색
function showDetailsearch(){
   if(detailsearch.style.display == ''){
    detailsearch.style.display = 'none';
    document.searchForm.detailsearch.value = "none";
  }else{
    detailsearch.style.display='';
    document.searchForm.detailsearch.value = "show";
  }
}

// 회원정보 엑셀다운
function excelDown(){
	var url = "member_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=250, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 고객 메일발송
function sendEmail(name,email){
	var url = "send_email.php?name=" + name + "&email=" + email;
	window.open(url,"sendEmail","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 고객 sms발송
function sendSms(name,hphone){
	var url = "send_sms.php?name=" + name + "&hphone=" + hphone;
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 회원별 구매내역
function orderList(id,name){
	var url = "member_order.php?id=" + id + "&name=" + name;
	window.open(url,"orderList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}


// 회원별 적립금내역
function reserveList(id,name){
	var url = "member_reserve.php?id=" + id + "&name=" + name;
	window.open(url,"reserveList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
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
                                          $nowposi = "회원관리 &gt; <strong>회원목록</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>회원목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
								                  <input type="hidden" name="page" value="<?=$page?>">
								                  <input type="hidden" name="detailsearch" value="<?=$detailsearch?>">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>조건검색</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                               <select name="searchopt" class="select">
				                                    <option value="name" <? if($searchopt == "name") echo "selected"; ?>>고객명
				                                    <option value="id" <? if($searchopt == "id") echo "selected"; ?>>아이디
				                                    <option value="resno" <? if($searchopt == "resno") echo "selected"; ?>>주민번호
				                                    <option value="email" <? if($searchopt == "email") echo "selected"; ?>>이메일
				                                    <option value="tphone" <? if($searchopt == "tphone") echo "selected"; ?>>전화번호
				                                    <option value="hphone" <? if($searchopt == "hphone") echo "selected"; ?>>휴대폰
				                                    </select>
				                                    <input type="text" name="searchkey" value="<?=$searchkey?>" class="form1">
				                                    <input type="submit" value="검색" class="xbtn">
				                                    <a href="javascript:showDetailsearch()"><font color="red">>> 상세검색</font></a>
                                              </td>
                                              </table>
                                              
                                              <div id='detailsearch' style="display: <? if(empty($detailsearch)) echo none; else echo $detailsearch; ?>">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>오늘 생일</b></font></td>
                                              <td width="2"></td>
                                              <td><input type="checkbox" name="s_birthday" value="Y" <? if($s_birthday == "Y") echo "checked"; ?>>예</td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>오늘 결혼기념일</b></font></td>
                                              <td width="2"></td>
                                              <td><input type="checkbox" name="s_memorial" value="Y" <? if($s_memorial == "Y") echo "checked"; ?>>예</td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>나이</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <select name="s_age">
						                             <option value="">연령대를 선택하세요
						                             <option value="10" <? if($s_age == "10") echo "selected"; ?>>10세 ~ 19세
						                             <option value="20" <? if($s_age == "20") echo "selected"; ?>>20세 ~ 29세
						                             <option value="30" <? if($s_age == "30") echo "selected"; ?>>30세 ~ 39세
						                             <option value="40" <? if($s_age == "40") echo "selected"; ?>>40세 ~ 49세
						                             <option value="50" <? if($s_age == "50") echo "selected"; ?>>50세 ~ 59세
						                             <option value="60" <? if($s_age == "60") echo "selected"; ?>>60세 ~ 69세
						                             </select>
								                       </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>지역</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                   <select name="s_address">
								         			         <option value="">각 시단위를 선택하세요.</option>
								         						<option value="서울" <? if($s_address == "서울") echo "selected"; ?>>서울</option>
								         						<option value="부산" <? if($s_address == "부산") echo "selected"; ?>>부산</option>
								         						<option value="전북" <? if($s_address == "전북") echo "selected"; ?>>전북</option>
								         						<option value="대구" <? if($s_address == "대구") echo "selected"; ?>>대구</option>
								         						<option value="인천" <? if($s_address == "인천") echo "selected"; ?>>인천</option>
								         						<option value="광주" <? if($s_address == "광주") echo "selected"; ?>>광주</option>
								         						<option value="대전" <? if($s_address == "대전") echo "selected"; ?>>대전</option>
								         						<option value="울산" <? if($s_address == "울산") echo "selected"; ?>>울산</option>
								         						<option value="강원" <? if($s_address == "강원") echo "selected"; ?>>강원</option>
								         						<option value="경기" <? if($s_address == "경기") echo "selected"; ?>>경기</option>
								         						<option value="경남" <? if($s_address == "경남") echo "selected"; ?>>경남</option>
								         						<option value="경북" <? if($s_address == "경북") echo "selected"; ?>>경북</option>
								         						<option value="전남" <? if($s_address == "전남") echo "selected"; ?>>전남</option>
								         						<option value="제주" <? if($s_address == "제주") echo "selected"; ?>>제주</option>
								         						<option value="충남" <? if($s_address == "충남") echo "selected"; ?>>충남</option>
								         						<option value="충북" <? if($s_address == "충북") echo "selected"; ?>>충북</option>
								         					   </select>
								         				 </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>직업</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <select name="s_job" class="optionjoin">
								                            <option value="">직업을 선택하세요.</option>
								                            <option value="00" <? if($s_job == "00") echo "selected"; ?>>무직</option>
								         		             <option value="10" <? if($s_job == "10") echo "selected"; ?>>학생</option>
								         		             <option value="30" <? if($s_job == "30") echo "selected"; ?>>컴퓨터/인터넷</option>
								         		             <option value="50" <? if($s_job == "50") echo "selected"; ?>>언론</option>
								         		             <option value="70" <? if($s_job == "70") echo "selected"; ?>>공무원</option>
								         		             <option value="90" <? if($s_job == "90") echo "selected"; ?>>군인</option>
								         		             <option value="A0" <? if($s_job == "A0") echo "selected"; ?>>서비스업</option>
								         		             <option value="C0" <? if($s_job == "C0") echo "selected"; ?>>교육</option>
								         		             <option value="E0" <? if($s_job == "E0") echo "selected"; ?>>금융/증권/보험업</option>
								         		             <option value="G0" <? if($s_job == "G0") echo "selected"; ?>>유통업</option>
								         		             <option value="I0" <? if($s_job == "I0") echo "selected"; ?>>예술</option>
								         		             <option value="K0" <? if($s_job == "K0") echo "selected"; ?>>의료</option>
								         		             <option value="M0" <? if($s_job == "M0") echo "selected"; ?>>법률</option>
								         		             <option value="O0" <? if($s_job == "O0") echo "selected"; ?>>건설업</option>
								         		             <option value="Q0" <? if($s_job == "Q0") echo "selected"; ?>>제조업</option>
								         		             <option value="S0" <? if($s_job == "S0") echo "selected"; ?>>부동산업</option>
								         		             <option value="U0" <? if($s_job == "U0") echo "selected"; ?>>운송업</option>
								         		             <option value="W0" <? if($s_job == "W0") echo "selected"; ?>>농/수/임/광산업</option>
								         		             <option value="Y0" <? if($s_job == "Y0") echo "selected"; ?>>가사</option>
								         		             <option value="z0" <? if($s_job == "z0") echo "selected"; ?>>기타</option>
								                            </select>
								                         </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>결혼여부</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <input type="radio" name="s_marriage" value="N" <? if($s_marriage == "N") echo "checked"; ?>>미혼
								                        <input type="radio" name="s_marriage" value="Y" <? if($s_marriage == "Y") echo "checked"; ?>>기혼
								                      </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>가입일</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="prev_year">
								                           <?                     
								                              if(empty($next_year)) $next_year = date("Y");
								                              if(empty($next_month)) $next_month = date("n");
								                              if(empty($next_day)) $next_day = date("d");
								            
								                              for($ii=2000; $ii <= 2010; $ii++){
								                                if($ii == $prev_year) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             년 
								                             <select name="prev_month">
								                               <?
								                              for($ii=1; $ii <= 12; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $prev_month) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             월 
								                             <select name="prev_day">
								                               <?
								                              for($ii=1; $ii <= 31; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $prev_day) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             일 ~ 
								                             <select name="next_year">
								                               <?
								                              for($ii=2000; $ii <= 2010; $ii++){
								                                if($ii == $next_year) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             년 
								                             <select name="next_month">
								                               <?
								                              for($ii=1; $ii <= 12; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $next_month) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             월 
								                             <select name="next_day">
								                               <?
								                              for($ii=1; $ii <= 31; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $next_day) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             일
								                             </td>
                                              </table>
                                              </div>
                                              
                                              
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <?
                                          	$today = date('n-d');
								                     $toyear = date('Y');
								                     
								                     $age_syear = substr($toyear-($s_age+9),-2)+1;
								                     $age_eyear = substr($toyear-$s_age,-2)+2;
								                     
								                     $join_sdate = $prev_year."-".$prev_month."-".$prev_day;
								                     $join_edate = $next_year."-".$next_month."-".$next_day;
								                     
								                     $sql = "select count(id) as all_total from wiz_member";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $row = mysql_fetch_object($result);
                                          	$all_total = $row->all_total;
								                     
                                          	$sql = "select id,passwd,name,hphone,email,visit,wdate from wiz_member wm";
								                     $sql .= " where wm.id != ''";
								                     if($prev_year != "") $sql .= " and wm.wdate > '$join_sdate' and wm.wdate <= '$join_edate 23:59:59'";
								                     if($searchopt != "")   $sql .= " and wm.$searchopt like '%$searchkey%'";
								                     if($birthday == "Y") $sql .= " and wm.birthday like '%$today'";
								                     if($memorial == "Y") $sql .= " and wm.memorial like '%$today'";
								                     if($age != "")       $sql .= " and wm.resno > '$age_syear' and wm.resno < '$age_eyear'";
								                     if($address != "")   $sql .= " and wm.address like '%$s_address%'";
								                     if($job != "")       $sql .= " and wm.job = '$s_job'";
								                     if($marriage != "")  $sql .= " and wm.marriage = '$s_marriage'";
								                     $sql .=" order by wm.wdate desc";
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
                                              <td>총 회원수 : <b><?=$all_total?></b> , 검색 회원수 : <b><?=$total?></b></td>
                                              <td align="right">
													       <input type="button" class="t" value="엑셀파일저장" onClick="excelDown();">
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="20" height="30" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td bgcolor="E9E7E7" align="center">번호</td>
                                              <td bgcolor="E9E7E7" align="center">이름</td>
                                              <td bgcolor="E9E7E7" align="center">아이디/비번</td>
                                              <td bgcolor="E9E7E7" align="center">휴대폰</td>
                                              <td bgcolor="E9E7E7" align="center">이메일</td>
                                              <td bgcolor="E9E7E7" align="center">구매액</td>
                                              <td bgcolor="E9E7E7" align="center">적립금</td>
                                              <td bgcolor="E9E7E7" align="center">방문수</td>
                                              <td bgcolor="E9E7E7" align="center">가입일</td>
                                              <td bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                          </form>
                                            <tr><td colspan="11" bgcolor="DEDEDE"></td></tr>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															
															if($rows%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
														?>
													     <form>
                                            <input type="hidden" name="id" value="<?=$row->id?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td width="20" height="30" align="center"><input type="checkbox" name="select_checkbox"></td>
                                              <td align="center"><?=$no?></td>
                                              <td align="center"><?=$row->name?></td>
                                              <td align="center"><?=$row->id?>/<?=$row->passwd?></td>
                                              <td align="center"><a href="javascript:sendSms('<?=$row->name?>','<?=$row->hphone?>')";><?=$row->hphone?></a></td>
                                              <td align="center"><a href="javascript:sendEmail('<?=$row->name?>','<?=$row->email?>')";><?=$row->email?></a></td>
                                              <td align="right"><a href="javascript:orderList('<?=$row->id?>','<?=$row->name?>');">[보기]</a> &nbsp;</td>
                                              <td align="right"><a href="javascript:reserveList('<?=$row->id?>','<?=$row->name?>');">[보기]</a> &nbsp;</td>
                                              <td align="center"><?=$row->visit?></td>
                                              <td align="center"><?=substr($row->wdate,0,10)?> &nbsp;</td>
                                              <td align="center"><input type="button" value="보기" class="xbtn" onClick="document.location='member_info.php?mode=update&id=<?=$row->id?>&<?=$param?>&page=<?=$page?>';"></td>
                                            </tr>
                                            </form>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                                          
							                   	if($total <= 0){
							                   	   echo "<tr><td colspan=10 bgcolor=DEDEDE></td></tr>";
							                   		echo "<tr><td height='30' colspan=10 align=center>등록된 회원이 없습니다.</td></tr>";
							                   		echo "<tr><td colspan=10 bgcolor=DEDEDE></td></tr>";
							                   	}
								                  ?>
                                            <tr><td colspan="12" bgcolor="DEDEDE"></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="60"><input type="button" value="선택삭제" onClick="userDelete();" class="t"></td>
                                              <td width="640"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
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