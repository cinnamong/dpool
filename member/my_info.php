<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/login_check.inc";	// 로그인 체크
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; 마이쇼핑 &gt; <b>회원정보</b>";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치
include "../inc/mem_info.inc"; 		// 회원 정보


$page_type = "join";
include "../inc/page_info.inc"; 		// 페이지 정보
// 입력정보 사용여부
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// 입력정보 필수여부
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
// 입력값 체크
function inputCheck(frm){

<? if($info_ess[address] == "true"){ ?>

   if(frm.post.value == ""){alert("우편번호를 입력하세요");frm.post.focus();return false;}
   if(frm.post2.value == ""){alert("우편번호를 입력하세요");frm.post2.focus();return false;}
   if(frm.post.value.length != 3 || frm.post2.value.length != 3){alert("우편번호가 올바르지 않습니다");frm.post.focus();return false;}
   if(frm.address.value == ""){alert("주소를 입력하세요");frm.address.focus();return false;}
   if(frm.address2.value == ""){alert("상세주소를 입력하세요");frm.address2.focus();return false;}

<? } ?>

<? if($info_ess[tphone] == "true"){ ?>
   
   if(frm.tphone.value == ""){alert("전화번호를 입력하세요");frm.tphone.focus();return false;
   }else if(!Check_Num(frm.tphone.value)){alert("지역번호는 숫자만 가능합니다.");frm.tphone.focus();return false;}
   
   if(frm.tphone2.value == ""){alert("전화번호를 입력하세요");frm.tphone2.focus();return false;
   }else if(!Check_Num(frm.tphone2.value)){alert("국번은 숫자만 가능합니다.");frm.tphone2.focus();return false;}
   
   if(frm.tphone3.value == ""){alert("전화번호를 입력하세요");frm.tphone3.focus();return false;
   }else if(!Check_Num(frm.tphone3.value)){alert("전화번호는 숫자만 가능합니다");frm.tphone3.focus();return false;}

<? } ?>
 
<? if($info_ess[hphone] == "true"){ ?>

   if(frm.hphone.value == ""){alert("전화번호를 입력하세요");frm.hphone.focus();return false;
   }else if(!Check_Num(frm.hphone.value)){alert("전화번호는 숫자만 가능합니다.");frm.hphone.focus();return false;}
   
   if(frm.hphone2.value == ""){alert("전화번호를 입력하세요");frm.hphone2.focus();return false;
   }else if(!Check_Num(frm.hphone2.value)){alert("전화번호는 숫자만 가능합니다.");frm.hphone2.focus();return false;}
   
   if(frm.hphone3.value == ""){alert("전화번호를 입력하세요");frm.hphone3.focus();return false;
   }else if(!Check_Num(frm.hphone3.value)){alert("전화번호는 숫자만 가능합니다");frm.hphone3.focus();return false;}

<? } ?>

<? if($info_ess[email] == "true"){ ?>

   if(frm.email.value == ""){alert("이메일을 입력하세요.");frm.email.focus();return false;
   }else if(!check_Email(frm.email.value)){frm.email.focus();return false;}

<? } ?>

<? if($info_ess[birthday] == "true"){ ?>

   if(frm.birthday.value == ""){alert("생년월일을 입력하세요.");frm.birthday.focus();return false;}
   if(frm.birthday2.value == ""){alert("생년월일을 입력하세요.");frm.birthday2.focus();return false;}
   if(frm.birthday3.value == ""){alert("생년월일을 입력하세요.");frm.birthday3.focus();return false;}
   if(frm.bgubun[0].checked == false && frm.bgubun[1].checked == false){alert("양력 음력을 선택하세요.");return false;}

<? } ?>

<? if($info_ess[marriage] == "true"){ ?>
   if(frm.marriage[0].checked == false && frm.marriage[1].checked == false){alert("결혼여부를 선택하세요.");return false;}
   
<? } ?>

<? if($info_ess[marriage] == "true"){ ?>

   if(frm.memorial.value == ""){ alert("결혼기념일을 입력하세요.");frm.memorial.focus();return false;}
   if(frm.memorial2.value == ""){alert("결혼기념일을 입력하세요.");frm.memorial2.focus();return false;}
   if(frm.memorial3.value == ""){alert("결혼기념일을 입력하세요.");frm.memorial3.focus();return false;}
   
<? } ?>

<? if($info_ess[job] == "true"){ ?>

   if(frm.job.value == ""){alert("직업을 선택하세요.");frm.job.focus();return false;}

<? } ?>

<? if($info_ess[scholarship] == "true"){ ?>

   if(frm.scholarship.value == ""){alert("학력을 선택하세요.");frm.scholarship.focus();return false;}
   
<? } ?>

<? if($info_ess[consph] == "true"){ ?>

	var consphLen=frm['consph[]'].length;

	if(consphLen == undefined){
	  if( frm['consph[]'].checked == false ){alert("관심분야가 선택되지 않았습니다.");frm['consph[]'].focus();return false;  }
	}else {
	  var ChkLike=0;
	  for(i=0;i<consphLen;i++){if( frm['consph[]'][i].checked == true ){ ChkLike=1; break;}}
	  if( ChkLike==0 ){alert("관심분야는 한개 이상 선택하셔야 합니다.");frm['consph[]'][0].focus();return false; }
	}
 
<? } ?>

}

// 우편번호 찾기
function zipSearch(){
   document.frm.address.focus();
   var url = "zip_search.php";
   window.open(url, "zipSearch", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}
//-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td align=center style="padding:5 0 10 0">
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_o_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> 님의 마이쇼핑입니다.</b></font>
							</td></tr>
							</table>
					</td></tr>
					<tr><td align=center>
							
							<? include "my_view.inc"; ?>

					</td></tr>

					<!--정보수정-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m06_01.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<form name="frm" action="my_save.php" method="post" onSubmit="return inputCheck(this)">
                     <input type="hidden" name="mode" value="my_info">
							<tr><td bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td background="/images/shop_nomal_bar.gif" class="gray">&nbsp;&nbsp;개인정보</td>
							</tr>
							<tr><td>
													<table border=0 cellpadding=0 cellspacing=0 width=100%>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/form_02_01.gif"></td>
														<td><?=$mem_info->name?></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_02.gif"></td>
														<td><?=$mem_info->resno?></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													if($info_use[address] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_03.gif"></td>
														<td>
														  <input type=text name="post" value="<?=$mem_post[0]?>" size=5 class="input"> - 
														  <input type=text name="post2" value="<?=$mem_post[1]?>" size=5 class="input">&nbsp;
														  <a href="javascript:zipSearch();"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a>
														</td>
												   </tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_04.gif"></td>
														<td><input type=text name="address" value="<?=$mem_info->address?>" size=80 class="input"></td></tr>
													<tr height=28>
													    <td></td>
														<td></td>
														<td><input type=text name="address2" value="<?=$mem_info->address2?>" size=80 class="input"></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[tphone] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_05.gif"></td>
														<td>
														<input type=text name="tphone" value="<?=$mem_tphone[0]?>" size=3 class="input"> - 
														<input type=text name="tphone2" value="<?=$mem_tphone[1]?>" size=4 class="input"> - 
														<input type=text name="tphone3" value="<?=$mem_tphone[2]?>" size=4 class="input">
														</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[hphone] == true){
													?>
													<tr height=70>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_06.gif"></td>
														<td>
														<input type=text name="hphone" value="<?=$mem_hphone[0]?>" size=3 class="input"> - 
														<input type=text name="hphone2" value="<?=$mem_hphone[1]?>" size=4 class="input"> - 
														<input type=text name="hphone3" value="<?=$mem_hphone[2]?>" size=4 class="input"><br>
														문자 정보 서비스를 받으시겠습니까?&nbsp;
														<input name="resms" type="radio" value="Y" <? if($mem_info->resms == "Y" || $mem_info->resms == "") echo "checked"; ?>>예&nbsp;
														<input name="resms" type="radio" value="N" <? if($mem_info->resms == "N") echo "checked"; ?>>아니요
														<br><font color="#317FB1">* 주문확인,배송 진행상황,알리미 등록,이벤트 공지 서비스 제공 해 드립니다.</font>
														</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[email] == true){
													?>
													<tr height=70>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_07.gif"></td>
														<td><input type=text name="email" value="<?=$mem_info->email?>" size=30 class="input">
														<br>
														 이메일 서비스를 받으시겠습니까?&nbsp;
														<input name="reemail" type="radio" value="Y" <? if($mem_info->reemail == "Y" || $mem_info->reemail == "") echo "checked"; ?>>예&nbsp;
														<input name="reemail" type="radio" value="N" <? if($mem_info->reemail == "N") echo "checked"; ?>>아니요
														<br><font color="#317FB1">* 주문,결제,이벤트 정보제공, 단 유효하지 않은 이메일은 서비스 불가</font>
														</td></tr>
													<?
													}
													?>
													</table>
							</td></tr>
							<tr><td bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td bgcolor=#dddddd height=1></td></tr>
							</table>
					</td></tr>
					<?
					if($info_use[birthday] != false ||
					$info_use[marriage] != false ||
					$info_use[memorial] != false ||
					$info_use[job] != false ||
					$info_use[scholarship] != false ||
					$info_use[consph] != false
					){
					?>
					<tr><td align=center><br>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td background="/images/shop_nomal_bar.gif" class="gray">&nbsp;&nbsp;추가정보</td>
							</tr>
							<tr><td>
													<table border=0 cellpadding=0 cellspacing=0 width=100%>
													<?
														if($info_use[birthday] == true){
												   ?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/form_03_01.gif"></td>
														<td>
														<input type=text name="birthday" value="<?=$mem_birthday[0]?>" size=8 class="input">년 
														<input type=text name="birthday2" value="<?=$mem_birthday[1]?>" size=5 class="input">월 
														<input type=text name="birthday3" value="<?=$mem_birthday[2]?>" size=5 class="input">일&nbsp;&nbsp;
														(<input name="bgubun" type="radio" value="S" <? if($mem_info->bgubun == "S") echo "checked"; ?>>양력
														<input name="bgubun" type="radio" value="M" <? if($mem_info->bgubun == "M") echo "checked"; ?>>음력)</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													  }
													  if($info_use[marriage] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_02.gif"></td>
														<td><input name="marriage" type="radio" value="N" <? if($mem_info->marriage == "N") echo "checked"; ?>>미혼
														<input name="marriage" type="radio" value="Y" <? if($mem_info->marriage == "Y") echo "checked"; ?>>기혼</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													  }
													  if($info_use[memorial] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_03.gif"></td>
														<td>
														<input type=text name="memorial" value="<?=$mem_memorial[0]?>" size=8 class="input">년 
														<input type=text name="memorial2" value="<?=$mem_memorial[1]?>" size=5 class="input">월 
														<input type=text name="memorial3" value="<?=$mem_memorial[2]?>" size=5 class="input">일
														&nbsp;&nbsp;</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													  }
													  if($info_use[job] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_04.gif"></td>
														<td>
														<select name="job">
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
														</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<script language="javascript">
						                      <!--
						                        job = document.frm.job;
						                        for(ii=0; ii<job.length; ii++){
						                           if(job.options[ii].value == "<?=$mem_info->job?>")
						                              job.options[ii].selected = true;
						                        }
						                      -->
						                    </script>
													<?
													  }
													  if($info_use[scholarship] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_05.gif"></td>
														<td>
														<select name="scholarship">
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
										            </td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<script language="javascript">
						                      <!--
						                        scholarship = document.frm.scholarship;
						                        for(ii=0; ii<scholarship.length; ii++){
						                           if(scholarship.options[ii].value == "<?=$mem_info->scholarship?>")
						                              scholarship.options[ii].selected = true;
						                        }
						                      -->
						                    </script>
													<?
													  }
													  if($info_use[consph] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_06.gif"></td>
														<td>
														<?
							                        $arrconsph = explode("/",$mem_info->consph);
							                        for($ii=0; $ii<count($arrconsph); $ii++){
							                           $tmpconsph[$arrconsph[$ii]] = true;
							                        }
							                     ?>
										            <input type="checkbox" name="consph[]" value="01" <? if($tmpconsph["01"]==true) echo "checked";?>> 건강 
								                  <input type="checkbox" name="consph[]" value="02" <? if($tmpconsph["02"]==true) echo "checked";?>> 문화/예술 
								                  <input type="checkbox" name="consph[]" value="03" <? if($tmpconsph["03"]==true) echo "checked";?>> 경제 
								                  <input type="checkbox" name="consph[]" value="04" <? if($tmpconsph["04"]==true) echo "checked";?>> 연예/오락 
								                  <input type="checkbox" name="consph[]" value="05" <? if($tmpconsph["05"]==true) echo "checked";?>> 뉴스 
								                  <input type="checkbox" name="consph[]" value="06" <? if($tmpconsph["06"]==true) echo "checked";?>> 여행/레저<br>
								                  <input type="checkbox" name="consph[]" value="07" <? if($tmpconsph["07"]==true) echo "checked";?>> 생활 
								                  <input type="checkbox" name="consph[]" value="08" <? if($tmpconsph["08"]==true) echo "checked";?>> 스포츠 
								                  <input type="checkbox" name="consph[]" value="09" <? if($tmpconsph["09"]==true) echo "checked";?>> 교육 
								                  <input type="checkbox" name="consph[]" value="10" <? if($tmpconsph["10"]==true) echo "checked";?>> 컴퓨터 
								                  <input type="checkbox" name="consph[]" value="11" <? if($tmpconsph["11"]==true) echo "checked";?>> 학문
									              </td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													  }
													?>
													</table>
							</td></tr>
							<tr><td bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td bgcolor=#dddddd height=1></td></tr>
							</table>
					</td></tr>
					<?
					}
					?>
					<tr><td colspan="5" align="center" height=63>
								<input type="image" src="/images/bbsimg/btn_ok.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="/images/bbsimg/btn_cancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
					</td></tr>
					</form>
					<!---마이쇼핑 내용 끝---------------------------------------------------------------------------------------------------------------------->
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>