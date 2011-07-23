<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&keyword=$keyword&birthday=$birthday&memorial=$memorial&age=$age";
$param .= "&address=$address&job=$job&marriage=$marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){

   if(frm.se_num.value == ""){
		alert("보내는분 번호를 입력하세요");
		frm.send.focus();
		return false;
	}
	if(frm.sms_msg.value == ""){
		alert("내용을 입력하세요");
		frm.sms_msg.focus();
		return false;
	}
   
}

function calByte(aquery){
	
	var tmpStr;
	var temp = 0;
	var onechar;
	var tcount = 0;;

	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(k=0; k<temp; k++) {
		onechar = tmpStr.charAt(k);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
		
		frm.sms_byte.value = tcount+"/80 bytes";
		
		if(tcount > 80) {
			alert("메시지내용은 80 바이트 이상 전송할 수 없습니다.");
			
			cutText(frm.sms_msg.value);
			
			return;
		}
	}
	if ( temp == 0 ) { 
		
		frm.sms_byte.value = "0/80 bytes";
		
	}
}

function cutText(aquery) {
	
	var tmpStr;
	var temp=0;
	var onechar;
	var tcount = 0;

	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(t=0; t<temp; t++){
		onechar = tmpStr.charAt(t);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
		if(tcount > 80) {
			tmpStr = tmpStr.substring(0, t);
			break;
		}
	}
	
	document.frm.sms_msg.value = tmpStr;
	
	calByte(tmpStr);        
}

function checkSmsmsg(){
	
	var tmpStr = document.frm.sms_msg.value;
	
	calByte(tmpStr);

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
                            <td align="center" valign="top" background="../image/bg_shadogif">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          <?
                                          $nowposi = "회원관리 &gt; <strong>SMS발송</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>발송목록 </strong></td>
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
                                                  <td width="120">&nbsp; <font color="2369C9"><b>오늘 생일</b></font></td>
                                                  <td width="230"><input type="checkbox" name="birthday" value="Y" <? if($birthday == "Y") echo "checked"; ?>>예</td>
                                                  <td width="120">&nbsp; <font color="2369C9"><b>오늘 결혼기념일</b></font></td>
                                                  <td width="230"><input type="checkbox" name="memorial" value="Y" <? if($memorial == "Y") echo "checked"; ?>>예</td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>나이</b></font></td>
                                                  <td>
                                                  <select name="age">
						                                <option value="">연령대를 선택하세요
						                                <option value="10" <? if($age == "10") echo "selected"; ?>>10세 ~ 19세
						                                <option value="20" <? if($age == "20") echo "selected"; ?>>20세 ~ 29세
						                                <option value="30" <? if($age == "30") echo "selected"; ?>>30세 ~ 39세
						                                <option value="40" <? if($age == "40") echo "selected"; ?>>40세 ~ 49세
						                                <option value="50" <? if($age == "50") echo "selected"; ?>>50세 ~ 59세
						                                <option value="60" <? if($age == "60") echo "selected"; ?>>60세 ~ 69세
						                                </select>
                                                  </td>
                                                  <td>&nbsp; <font color="2369C9"><b>지역</b></font></td>
                                                  <td>
                                                  <select name="address">
								         			         <option value="">각 시단위를 선택하세요.</option>
								         						<option value="서울" <? if($address == "서울") echo "selected"; ?>>서울</option>
								         						<option value="부산" <? if($address == "부산") echo "selected"; ?>>부산</option>
								         						<option value="전북" <? if($address == "전북") echo "selected"; ?>>전북</option>
								         						<option value="대구" <? if($address == "대구") echo "selected"; ?>>대구</option>
								         						<option value="인천" <? if($address == "인천") echo "selected"; ?>>인천</option>
								         						<option value="광주" <? if($address == "광주") echo "selected"; ?>>광주</option>
								         						<option value="대전" <? if($address == "대전") echo "selected"; ?>>대전</option>
								         						<option value="울산" <? if($address == "울산") echo "selected"; ?>>울산</option>
								         						<option value="강원" <? if($address == "강원") echo "selected"; ?>>강원</option>
								         						<option value="경기" <? if($address == "경기") echo "selected"; ?>>경기</option>
								         						<option value="경남" <? if($address == "경남") echo "selected"; ?>>경남</option>
								         						<option value="경북" <? if($address == "경북") echo "selected"; ?>>경북</option>
								         						<option value="전남" <? if($address == "전남") echo "selected"; ?>>전남</option>
								         						<option value="제주" <? if($address == "제주") echo "selected"; ?>>제주</option>
								         						<option value="충남" <? if($address == "충남") echo "selected"; ?>>충남</option>
								         						<option value="충북" <? if($address == "충북") echo "selected"; ?>>충북</option>
								         					   </select>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>직업</b></font></td>
                                                  <td>
                                                  <select name="job" class="optionjoin">
								                            <option value="">직업을 선택하세요.</option>
								                            <option value="00" <? if($job == "00") echo "selected"; ?>>무직</option>
								         		             <option value="10" <? if($job == "10") echo "selected"; ?>>학생</option>
								         		             <option value="30" <? if($job == "30") echo "selected"; ?>>컴퓨터/인터넷</option>
								         		             <option value="50" <? if($job == "50") echo "selected"; ?>>언론</option>
								         		             <option value="70" <? if($job == "70") echo "selected"; ?>>공무원</option>
								         		             <option value="90" <? if($job == "90") echo "selected"; ?>>군인</option>
								         		             <option value="A0" <? if($job == "A0") echo "selected"; ?>>서비스업</option>
								         		             <option value="C0" <? if($job == "C0") echo "selected"; ?>>교육</option>
								         		             <option value="E0" <? if($job == "E0") echo "selected"; ?>>금융/증권/보험업</option>
								         		             <option value="G0" <? if($job == "G0") echo "selected"; ?>>유통업</option>
								         		             <option value="I0" <? if($job == "I0") echo "selected"; ?>>예술</option>
								         		             <option value="K0" <? if($job == "K0") echo "selected"; ?>>의료</option>
								         		             <option value="M0" <? if($job == "M0") echo "selected"; ?>>법률</option>
								         		             <option value="O0" <? if($job == "O0") echo "selected"; ?>>건설업</option>
								         		             <option value="Q0" <? if($job == "Q0") echo "selected"; ?>>제조업</option>
								         		             <option value="S0" <? if($job == "S0") echo "selected"; ?>>부동산업</option>
								         		             <option value="U0" <? if($job == "U0") echo "selected"; ?>>운송업</option>
								         		             <option value="W0" <? if($job == "W0") echo "selected"; ?>>농/수/임/광산업</option>
								         		             <option value="Y0" <? if($job == "Y0") echo "selected"; ?>>가사</option>
								         		             <option value="z0" <? if($job == "z0") echo "selected"; ?>>기타</option>
								                            </select>
								                          </td>
                                                  <td>&nbsp; <font color="2369C9"><b>결혼여부</b></font></td>
                                                  <td>
                                                  <input type="radio" name="marriage" value="N" <? if($marriage == "N") echo "checked"; ?>>미혼
								                          <input type="radio" name="marriage" value="Y" <? if($marriage == "Y") echo "checked"; ?>>기혼
								                          </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>가입일</b></font></td>
                                                  <td colspan="3">
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
                                                </tr>
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>조건검색</b></font></td>
                                                  <td colspan="3">
                                                  <select name="searchopt" class="select">
				                                      <option value="name" <? if($searchopt == "name") echo "selected"; ?>>고객명
				                                      <option value="id" <? if($searchopt == "id") echo "selected"; ?>>아이디
				                                      <option value="resno" <? if($searchopt == "resno") echo "selected"; ?>>주민번호
				                                      <option value="email" <? if($searchopt == "email") echo "selected"; ?>>이SMS
				                                      <option value="tphone" <? if($searchopt == "tphone") echo "selected"; ?>>전화번호
				                                      <option value="hphone" <? if($searchopt == "hphone") echo "selected"; ?>>휴대폰
				                                      </select>
				                                    <input type="text" name="keyword" value="<?=$keyword?>" class="form1">
				                                    <input type="submit" class="t" value="검 색">
                                                  </td>
                                                </tr>
                                              </table>

                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <?
                                          	$sql = "select id from wiz_member";
                                          	$result = mysql_query($sql) or error(mysql_error());
                                          	$all_total = mysql_num_rows($result);
                                          	
                                          	
								                     $today = date('n-d');
								                     $toyear = date('Y');
								                     
								                     $age_syear = substr($toyear-($age+9),-2)+1;
								                     $age_eyear = substr($toyear-$age,-2)+2;
								                     
								                     $join_sdate = $prev_year."-".$prev_month."-".$prev_day;
								                     $join_edate = $next_year."-".$next_month."-".$next_day;
								                     
								                        
								                     $sql = "select id,passwd,name,hphone,email,visit,reemail,resms,wdate from wiz_member where id != '' ";
								                     if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
								                     if($searchopt != "") $sql .= " and $searchopt like '%$keyword%'";
								                     if($birthday == "Y") $sql .= " and birthday like '%$today'";
								                     if($memorial == "Y") $sql .= " and memorial like '%$today'";
								                     if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
								                     if($address != "")   $sql .= " and address like '%$address%'";
								                     if($job != "")       $sql .= " and job = '$job'";
								                     if($marriage != "")  $sql .= " and marriage = '$marriage'";
								                     $sql .=" order by wdate desc";

								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								       	            
								       	            $rows = 6;
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
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td bgcolor="E9E7E7" align="center" height="30">번호</td>
                                              <td bgcolor="E9E7E7" align="center">이름</td>
                                              <td bgcolor="E9E7E7" align="center">아이디/비번</td>
                                              <td bgcolor="E9E7E7" align="center">휴대폰</td>
                                              <td bgcolor="E9E7E7" align="center">SMS</td>
                                              <td bgcolor="E9E7E7" align="center">방문수</td>
                                              <td bgcolor="E9E7E7" align="center">수신여부</td>
                                              <td bgcolor="E9E7E7" align="center">가입일</td>
                                            </tr>
                                          </form>
                                            <tr><td colspan="11" bgcolor="DEDEDE"></td></tr>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															if($rows%2 == 0) $bgcolor="#FFFFFF";
															else $bgcolor="#F3F3F3";
															if($row->reemail == "Y") $row->reemail = "예";
															else $row->reemail = "아니오";
														?>
													     <form>
                                            <input type="hidden" name="id" value="<?=$row->id?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td align="center" height="30"><?=$no?></td>
                                              <td align="center"><?=$row->name?></td>
                                              <td align="center"><?=$row->id?>/<?=$row->passwd?></td>
                                              <td align="center"><?=$row->hphone?></td>
                                              <td align="center"><?=$row->email?></td>
                                              <td align="center"><?=$row->visit?></td>
                                              <td align="center"><?=$row->reemail?></td>
                                              <td align="center"><?=substr($row->wdate,0,10)?> &nbsp;</td>
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
                                            <tr><td colspan="11" bgcolor="DEDEDE"></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, "&$param"); ?>
                                          
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          
                                          <form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this)">
                                          <input type="hidden" name="mode" value="memsms">
                                          <input type="hidden" name="mailsql" value="<?=$sql?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;발송</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="radio" name="rekind" value="RY" checked>수신회원만
                                                    <input type="radio" name="rekind" value="RA">수신거부포함
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;보내는분 번호</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="se_num" value="<?=$wizadmin_session[shop_tel]?>" size="60" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;내용</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                      <textarea name="sms_msg" rows="12" cols="60" class="textarea" onKeyDown="checkSmsmsg();"></textarea>
                                                      <input type="text" name="sms_byte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:돋움; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()">
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
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
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