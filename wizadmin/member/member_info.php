<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 페이지 파라메터 (검색조건이 변하지 않도록)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day&page=$page";
//------------------------------------------------------------------------------------------------------------------------------------

// 회원정보
$sql = "select * from wiz_member where id = '$id'";
$result = mysql_query($sql) or error(mysql_error());
$meminfo = mysql_fetch_object($result);

// 총주문액(주문 테이블)
$sql = "select sum(total_price) as total_price from wiz_order where send_id = '$id' and status = 'SY'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$total_price = $row->total_price;

// 적립금
$sql = "select sum(reserve) as reserve from wiz_reserve where memid = '$id'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$reserve = $row->reserve;
?>
<script language="javascript">
<!--
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

// 주소찾기
function searchZip(){
	var url = "../member/search_zip.php";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
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
                                          $nowposi = "회원관리 &gt; <strong>회원정보</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>기본정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="member_save.php?<?=$param?>" method="post" onSubmit="return passCheck()">
                                          <input type="hidden" name="mode" value="<?=$mode?>">
                                          <input type="hidden" name="id" value="<?=$id?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;아이디</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="id" type="text" value="<?=$meminfo->id?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;비밀번호</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="passwd" type="text" value="<?=$meminfo->passwd?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이름</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="name" type="text" value="<?=$meminfo->name?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주민번호</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <? list($resno, $resno2) = explode("-",$meminfo->resno); ?>
                                                      <input type="text" name="resno" value="<?=$resno?>" size="9" class="form1"> - 
                                                      <input type="text" name="resno2" value="<?=$resno2?>" size="9" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이메일</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="email" type="text" value="<?=$meminfo->email?>" class="form1"> <a href="javascript:sendEmail('<?=$meminfo->name?>','<?=$meminfo->email?>')";><font color=red>[발송]</font></a></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전화번호</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <? list($tphone, $tphone2, $tphone3) = explode("-",$meminfo->tphone); ?>
                                                      <input type="text" name="tphone" value="<?=$tphone?>" size="5" class="form1"> - 
                                                      <input type="text" name="tphone2" value="<?=$tphone2?>" size="5" class="form1"> - 
                                                      <input type="text" name="tphone3" value="<?=$tphone3?>" size="5" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;휴대폰</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <? list($hphone, $hphone2, $hphone3) = explode("-",$meminfo->hphone); ?>
                                                      <input type="text" name="hphone" value="<?=$hphone?>"  size="5" class="form1"> - 
                                                      <input type="text" name="hphone2" value="<?=$hphone2?>"  size="5" class="form1"> - 
                                                      <input type="text" name="hphone3" value="<?=$hphone3?>"  size="5" class="form1"> <a href="javascript:sendSms('<?=$meminfo->name?>','<?=$meminfo->hphone?>')";><font color=red>[발송]</font></a>
                                                      </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;회원등급</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <select name="level">
                                                      <option value="AM" <? if($meminfo->level == "AM") echo "selected"; ?>>관리자
                                                      <option value="BM" <? if($meminfo->level == "BM") echo "selected"; ?>>우수회원
                                                      <option value="CM" <? if($meminfo->level == "CM") echo "selected"; ?>>일반회원
                                                      </select>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우편번호</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$meminfo->post); ?>
                                                      <input name="post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" 찾 기 " onClick="searchZip();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주소</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                    <input name="address" type="text" value="<?=$meminfo->address?>" size="60" class="form1">
                                                    <input name="address2" type="text" value="<?=$meminfo->address2?>" size="60" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;추천인</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="recom" type="text" value="<?=$meminfo->recom?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;최종방문일</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$meminfo->visit_time?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이메일 수신</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="reemail" value="Y" <? if($meminfo->reemail == "Y") echo "checked"; ?>>예
                                                      <input type="radio" name="reemail" value="N" <? if($meminfo->reemail == "N") echo "checked"; ?>>아니오
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMS 수신</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="resms" value="Y" <? if($meminfo->resms == "Y") echo "checked"; ?>>예
                                                      <input type="radio" name="resms" value="N" <? if($meminfo->resms == "N") echo "checked"; ?>>아니오
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;총주문액</td>
                                                    <td width="200" bgcolor="F8F8F8"><a href=javascript:orderList('<?=$id?>','<?=$row->name?>')><?=number_format($total_price)?>원 <font color=red>[상세]</font></a></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;적립금</td>
                                                    <td width="200" bgcolor="F8F8F8"><a href=javascript:reserveList('<?=$id?>','<?=$row->name?>')><?=number_format($reserve)?>원 <font color=red>[상세]</font></a></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>기타정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 결혼 여부</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="marriage" value="N" <? if($meminfo->marriage == "N") echo "checked"; ?>>미혼 
                                                      <input type="radio" name="marriage" value="Y" <? if($meminfo->marriage == "Y") echo "checked"; ?>>기혼
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;결혼기념일</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <? list($memorial, $memorial2, $memorial3) = explode("-", $meminfo->memorial); ?>
                                                      <input name="memorial" value="<?=$memorial?>" type="text" size="4" maxlength="4" class="form1">년 
                                                      <input name="memorial2" value="<?=$memorial2?>"  type="text" size="2" maxlength="2" class="form1">월 
                                                      <input name="memorial3" value="<?=$memorial3?>"  type="text" size="2" maxlength="2" class="form1">일
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;직업</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    	<select name="job" class="optionjoin">
										                         <option selected>항목을 선택 해 주세요</option>
										                         <option value="00">무직</option>
														             <option value="10">학생</option>
														             <option value="30">컴퓨터/인터넷</option>
														             <option value="50">언론</option>
														             <option value="70">공무원</option>
														             <option value="90">군인</option>
														             <option value="A0">서비스업</option>
														             <option value="C0">교육</option>
														             <option value="E0">금융/증권/보험업</option>
														             <option value="G0">유통업</option>
														             <option value="I0">예술</option>
														             <option value="K0">의료</option>
														             <option value="M0">법률</option>
														             <option value="O0">건설업</option>
														             <option value="Q0">제조업</option>
														             <option value="S0">부동산업</option>
														             <option value="U0">운송업</option>
														             <option value="W0">농/수/임/광산업</option>
														             <option value="Y0">가사</option>
														             <option value="z0">기타</option>
										                       </select>
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;학력</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <select name="scholarship" class="optionjoin">
										                          <option value="" selected>항목을 선택 해 주세요</option>
										                          <option value="0">없음</option>
															           <option value="1">초등학교재학</option>
															           <option value="2">초등학교졸업</option>
															           <option value="4">중학교재학</option>
															           <option value="6">중학교졸업</option>
															           <option value="7">고등학교재학</option>
															           <option value="9">고등학교졸업</option>
															           <option value="H">대학교재학</option>
															           <option value="J">대학교졸업</option>
															           <option value="O">대학원재학</option>
															           <option value="Z">대학원졸업이상</option>
										                        </select> 
                                                    </td>
                                                  </tr>
                                                  <script language="javascript">
										                      <!--
										                        job = document.frm.job;
										                        for(ii=0; ii<job.length; ii++){
										                           if(job.options[ii].value == "<?=$meminfo->job?>")
										                              job.options[ii].selected = true;
										                        }
										                        
										                        scholarship = document.frm.scholarship;
										                        for(ii=0; ii<scholarship.length; ii++){
										                           if(scholarship.options[ii].value == "<?=$meminfo->scholarship?>")
										                              scholarship.options[ii].selected = true;
										                        }
										                      -->
										                    </script>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;생년월일</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <? list($birthday, $birthday2, $birthday3) = explode("-", $meminfo->birthday); ?>
									                          <input name="birthday" value="<?=$birthday?>" type="text" class="form1" id="26" size="4" maxlength="4">년 
									                          <input name="birthday2" value="<?=$birthday2?>" type="text" class="form1" id="27" size="2" maxlength="2">월 
									                          <input name="birthday3" value="<?=$birthday3?>" type="text" class="form1" id="28" size="2" maxlength="2">일 ( 
									                          <input type="radio" name="bgubun" value="S" <? if($meminfo->bgubun == "S") echo "checked"; ?>>양력 
									                          <input type="radio" name="bgubun" value="M" <? if($meminfo->bgubun == "M") echo "checked"; ?>>음력 )
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관심분야</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <?
											                        $arrconsph = explode("/",$meminfo->consph);
											                        for($ii=0; $ii<count($arrconsph); $ii++){
											                           $tmpconsph[$arrconsph[$ii]] = true;
											                        }
											                    ?>
											                    <input type="checkbox" name="consph[]" value="01" <? if($tmpconsph["01"]==true) echo "checked";?>> 건강 
										                        <input type="checkbox" name="consph[]" value="02" <? if($tmpconsph["02"]==true) echo "checked";?>> 문화/예술 
										                        <input type="checkbox" name="consph[]" value="03" <? if($tmpconsph["03"]==true) echo "checked";?>> 경제 
										                        <input type="checkbox" name="consph[]" value="04" <? if($tmpconsph["04"]==true) echo "checked";?>> 연예/오락 
										                        <input type="checkbox" name="consph[]" value="05" <? if($tmpconsph["05"]==true) echo "checked";?>> 뉴스 
										                        <input type="checkbox" name="consph[]" value="06" <? if($tmpconsph["06"]==true) echo "checked";?>> 여행/레저<br>&nbsp;
										                        <input type="checkbox" name="consph[]" value="07" <? if($tmpconsph["07"]==true) echo "checked";?>> 생활 
										                        <input type="checkbox" name="consph[]" value="08" <? if($tmpconsph["08"]==true) echo "checked";?>> 스포츠 
										                        <input type="checkbox" name="consph[]" value="09" <? if($tmpconsph["09"]==true) echo "checked";?>> 교육 
										                        <input type="checkbox" name="consph[]" value="10" <? if($tmpconsph["10"]==true) echo "checked";?>> 컴퓨터 
										                        <input type="checkbox" name="consph[]" value="11" <? if($tmpconsph["11"]==true) echo "checked";?>> 학문
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='member_list.php?<?=$param?>';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="document.location='member_list.php?<?=$param?>';"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td>
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