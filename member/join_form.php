<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$page_type = "join";
$now_position = "<a href=/>Home</a> &gt; 회원가입 &gt; <b>정보입력</b>";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

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
   
   if(frm.id.value.length < 3 || frm.id.value.length > 12){ alert("아이디는 4 ~ 12자리만 가능합니다."); frm.id.focus(); return false;
   }else{
      if(!Check_Char(frm.id.value)){ alert("아이디는 특수문자를 사용할수 없습니다."); frm.id.focus(); return false; }
   }
   if(frm.passwd.value.length < 4 || frm.passwd.value.length > 12){ alert("비밀번호는 4 ~ 12자리입니다"); frm.passwd.focus(); return false; }
   
   if(frm.passwd2.value.length < 4 || frm.passwd2.value.length > 12){ alert("비밀번호는 4 ~ 12자리입니다"); frm.passwd2.focus(); return false; }
   
   if(frm.passwd.value != frm.passwd2.value){alert("비밀번호가 일치하지 않습니다");frm.passwd.focus();return false;}

   if(frm.name.value == ""){alert("이름을 입력하세요");frm.name.focus();return false;
   }else{
      if(!Check_nonChar(frm.name.value)){alert("이름에는 특수문자가 들어갈 수 없습니다");frm.name.focus();return false;}
   }
   
<? if($info_ess[resno] == "true"){ ?>

   if(frm.resno.value == ""){alert("주민번호를 입력하세요");frm.resno.focus();return false;}
   if(frm.resno2.value == ""){alert("주민번호를 입력하세요");frm.resno2.focus();return false;}
   if(!check_ResidentNO(frm.resno.value, frm.resno2.value)){alert("주민번호가 올바르지 않습니다");frm.resno.value == "";frm.resno2.value == "";frm.resno.focus();return false;}

<? } ?>

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

   if(frm.hphone.value == ""){alert("휴대폰번호를 입력하세요");frm.hphone.focus();return false;
   }else if(!Check_Num(frm.hphone.value)){alert("휴대폰번호는 숫자만 가능합니다.");frm.hphone.focus();return false;}
   
   if(frm.hphone2.value == ""){alert("휴대폰번호를 입력하세요");frm.hphone2.focus();return false;
   }else if(!Check_Num(frm.hphone2.value)){alert("휴대폰번호는 숫자만 가능합니다.");frm.hphone2.focus();return false;}
   
   if(frm.hphone3.value == ""){alert("휴대폰번호를 입력하세요");frm.hphone3.focus();return false;
   }else if(!Check_Num(frm.hphone3.value)){alert("휴대폰번호는 숫자만 가능합니다");frm.hphone3.focus();return false;}

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

   if(frm.recom.value != ""){
      if(frm.recom.value == frm.id.value){
         alert("자기 자신은 추천인이 될 수 없습니다.");
         frm.recom.value = "";
         return false;
      }
   }
}

// 아이디 중복확인
function idCheck(){
   var id = document.frm.id.value;
   var url = "id_check.php?id=" + id;
   window.open(url, "idCheck", "height=200, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=150");
}

// 우편번호 찾기
function zipSearch(){
   document.frm.address.focus();
   var url = "zip_search.php";
   window.open(url, "zipSearch", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}
//-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=700>
					<tr><td align=center style="padding:5 0 0 0">
					
					
							<!--회원가입 시작-->
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<form name="frm" action="join_save.php" method="post" onSubmit="return inputCheck(this)">
							  <tr><td height=10></td></tr>
							  <tr>
							    <td style="padding:0 0 5 0" valign=bottom>
								   <table border=0 cellpadding=0 cellspacing=0 width=100%>
									  <tr><td><img src="/images/join_t_01.gif"></td>
										 <td align=right><img src="/images/join_form01.gif"></td></tr>
									</table>
							    </td>
							  </tr>
							  <tr><td height=3 bgcolor=#999999></td></tr>
							  <tr><td bgcolor=#F9F9F9 style="padding:10">
										
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										  <tr>
										    <td style="padding:5">
												<table border=0 cellpadding=0 cellspacing=0 width=100%>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/form_01_01.gif"></td>
														<td><input type="text" name="id" size="20" onClick="idCheck();" maxlength="12" class="input" readOnly>&nbsp;<a href="javascript:idCheck();"><img src="/images/but_idcheck.gif" border=0 align=absmiddle></a>
														<span class="s11">(3~12 영문, 숫자, 가입 후 ID변경은 불가)</span></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_01_02.gif"></td>
														<td><input type=password name="passwd" size=20 class="input">
														<span class="s11">(4자 이상의 영문, 숫자)</span></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_01_03.gif"></td>
														<td><input type=password name="passwd2" size=20 class="input"></td></tr>
												</table>
										    </td>
										  </tr>
										</table>
							    </td>
							  </tr>
							  <tr><td style="padding:10 0 5 0" valign=bottom><img src="/images/join_t_02.gif"></td></tr>
							  <tr><td height=3 bgcolor=#999999></td></tr>
							  <tr><td bgcolor=#F9F9F9 style="padding:10">
										
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										  <tr>
										    <td style="padding:5">
											    <table border=0 cellpadding=0 cellspacing=0 width=100%>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/form_02_01.gif"></td>
														<td><input type=text name="name" size=20 class="input"></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													if($info_use[resno] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_02.gif"></td>
														<td>
														  <input type=text name="resno" size=8 maxlength=6 class="input" onKeyUp="if(this.value.length == 6){document.frm.resno2.focus();}"> - 
														  <input type=password name="resno2" maxlength=7 size=8 class="input">
														</td>
												   </tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[address] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_03.gif"></td>
														<td>
														  <input type=text name="post" size=5 class="input"> - 
														  <input type=text name="post2" size=5 class="input">&nbsp;
														  <a href="javascript:zipSearch();"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a>
														</td>
												   </tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_04.gif"></td>
														<td><input type=text name="address" size=80 class="input"></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
													   <td></td>
														<td></td>
														<td><input type=text name="address2" size=80 class="input"></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[tphone] == true){
													?>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_05.gif"></td>
														<td>
														  <input type=text name="tphone" size=3 class="input"> - 
														  <input type=text name="tphone2" size=4 class="input"> - 
														  <input type=text name="tphone3" size=4 class="input">
														</td>
													</tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[hphone] == true){
													?>
													<tr height=70>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_06.gif"></td>
														<td>
														  <input type=text name="hphone" size=3 class="input"> - 
														  <input type=text name="hphone2" size=4 class="input"> - 
														  <input type=text name="hphone3" size=4 class="input"><br>
														  문자 정보 서비스를 받으시겠습니까?&nbsp;
														<input name="resms" type="radio" value="Y" checked style="border:0px; background-color:transparent;">예&nbsp;
														<input name="resms" type="radio" value="N" style="border:0px; background-color:transparent;">아니요
														<br><font color="#317FB1">* 주문확인,배송 진행상황,알리미 등록,이벤트 공지 서비스 제공 해 드립니다.</font>
														</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													if($info_use[hphone] == true){
													?>
													<tr height=70>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_02_07.gif"></td>
														<td><input type=text name="email" size=30 class="input">
														<br>
														 이메일 서비스를 받으시겠습니까?&nbsp;
														<input name="reemail" type="radio" value="Y" checked style="border:0px; background-color:transparent;">예&nbsp;
														<input name="reemail" type="radio" value="N" style="border:0px; background-color:transparent;">아니요
														<br><font color="#317FB1">* 주문,결제,이벤트 정보제공, 단 유효하지 않은 이메일은 서비스 불가</font>
														</td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<?
													}
													?>
													<tr height=28>
														<td><img src="/images/gray_icon.gif"></td>
														<td><img src="/images/form_02_08.gif"></td>
														<td><input type=text name="recom" size=20 class="input"></td></tr>
													</table>
										</td></tr>
										</table>
							</td></tr>
							<!--추가정보-->
							<?
							if($info_use[birthday] != false ||
							$info_use[marriage] != false ||
							$info_use[memorial] != false ||
							$info_use[job] != false ||
							$info_use[scholarship] != false ||
							$info_use[consph] != false
							){
							?>
							<tr><td style="padding:10 0 5 0" valign=bottom><img src="/images/join_t_03.gif"></td></tr>
							<tr><td height=3 bgcolor=#999999></td></tr>
							<tr><td bgcolor=#F9F9F9 style="padding:10">
										
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										  <tr>
										    <td style="padding:5">
													<table border=0 cellpadding=0 cellspacing=0 width=100%>
													  <?
													  if($info_use[birthday] == true){
													  ?>
													  <tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100><img src="/images/form_03_01.gif"></td>
														<td>
														  <input type=text name="birthday" size=8 class="input">년 
														  <input type=text name="birthday2" size=5 class="input">월 
														  <input type=text name="birthday3" size=5 class="input">일&nbsp;&nbsp;
														(<input name="bgubun" value="S" type="radio" style="border:0px; background-color:transparent;">양력
														<input name="bgubun" value="M" type="radio" style="border:0px; background-color:transparent;">음력)</td></tr>
													  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													  <?
													  }
													  if($info_use[marriage] == true){
													  ?>
													  <tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_02.gif"></td>
														<td>
														  <input name="marriage" value="Y" type="radio" style="border:0px; background-color:transparent;">미혼
														  <input name="marriage" value="N" type="radio" style="border:0px; background-color:transparent;">기혼</td></tr>
													  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													  <?
													  }
													  if($info_use[memorial] == true){
													  ?>
													  <tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_03.gif"></td>
														<td>
														  <input type=text name="memorial" size=8 class="input">년 
														  <input type=text name="memorial2" size=5 class="input">월 
														  <input type=text name="memorial3" size=5 class="input">일&nbsp;&nbsp;
														</td>
												     </tr>
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
														</td>
												     </tr>
													  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>
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
													  <?
													  }
													  if($info_use[consph] == true){
													  ?>
													  <tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_06.gif"></td>
														<td>
															<input type="checkbox" name="consph[]"  value="01"> 건강 
									                  <input type="checkbox" name="consph[]" value="02"> 문화/예술 
									                  <input type="checkbox" name="consph[]" value="03"> 경제 
									                  <input type="checkbox" name="consph[]" value="04"> 연예/오락 
									                  <input type="checkbox" name="consph[]" value="05"> 뉴스 
									                  <input type="checkbox" name="consph[]" value="06"> 여행/레저<br>
									                  <input type="checkbox" name="consph[]" value="07"> 생활 
									                  <input type="checkbox" name="consph[]" value="08"> 스포츠 
									                  <input type="checkbox" name="consph[]" value="09"> 교육 
									                  <input type="checkbox" name="consph[]" value="10"> 컴퓨터 
									                  <input type="checkbox" name="consph[]" value="11"> 학문
						                         </td>
						                       </tr>
													  <?
													  }
													  ?>
													</table>
										</td></tr>
										</table>
							  </td>
							</tr>
							<?
							}
							?>
							<tr>
							  <td height=80 align=center>
								<input type="image" src="/images/join_btn_ok.gif" border=0></a>&nbsp;&nbsp;&nbsp;
								<img src="/images/join_btn_cancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
							  </td>
							</tr>
							</form>
							</table>
														
					</td></tr>
					<!---멤버쉽 내용 끝---------------------------------------------------------------------------------------------------------------------->
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>