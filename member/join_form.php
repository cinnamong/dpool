<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "join";
$now_position = "<a href=/>Home</a> &gt; ȸ������ &gt; <b>�����Է�</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

// �Է����� ��뿩��
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// �Է����� �ʼ�����
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}
?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
// �Է°� üũ
function inputCheck(frm){
   
   if(frm.id.value.length < 3 || frm.id.value.length > 12){ alert("���̵�� 4 ~ 12�ڸ��� �����մϴ�."); frm.id.focus(); return false;
   }else{
      if(!Check_Char(frm.id.value)){ alert("���̵�� Ư�����ڸ� ����Ҽ� �����ϴ�."); frm.id.focus(); return false; }
   }
   if(frm.passwd.value.length < 4 || frm.passwd.value.length > 12){ alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�"); frm.passwd.focus(); return false; }
   
   if(frm.passwd2.value.length < 4 || frm.passwd2.value.length > 12){ alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�"); frm.passwd2.focus(); return false; }
   
   if(frm.passwd.value != frm.passwd2.value){alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�");frm.passwd.focus();return false;}

   if(frm.name.value == ""){alert("�̸��� �Է��ϼ���");frm.name.focus();return false;
   }else{
      if(!Check_nonChar(frm.name.value)){alert("�̸����� Ư�����ڰ� �� �� �����ϴ�");frm.name.focus();return false;}
   }
   
<? if($info_ess[resno] == "true"){ ?>

   if(frm.resno.value == ""){alert("�ֹι�ȣ�� �Է��ϼ���");frm.resno.focus();return false;}
   if(frm.resno2.value == ""){alert("�ֹι�ȣ�� �Է��ϼ���");frm.resno2.focus();return false;}
   if(!check_ResidentNO(frm.resno.value, frm.resno2.value)){alert("�ֹι�ȣ�� �ùٸ��� �ʽ��ϴ�");frm.resno.value == "";frm.resno2.value == "";frm.resno.focus();return false;}

<? } ?>

<? if($info_ess[address] == "true"){ ?>

   if(frm.post.value == ""){alert("�����ȣ�� �Է��ϼ���");frm.post.focus();return false;}
   if(frm.post2.value == ""){alert("�����ȣ�� �Է��ϼ���");frm.post2.focus();return false;}
   if(frm.post.value.length != 3 || frm.post2.value.length != 3){alert("�����ȣ�� �ùٸ��� �ʽ��ϴ�");frm.post.focus();return false;}
   if(frm.address.value == ""){alert("�ּҸ� �Է��ϼ���");frm.address.focus();return false;}
   if(frm.address2.value == ""){alert("���ּҸ� �Է��ϼ���");frm.address2.focus();return false;}

<? } ?>

<? if($info_ess[tphone] == "true"){ ?>
   
   if(frm.tphone.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.tphone.focus();return false;
   }else if(!Check_Num(frm.tphone.value)){alert("������ȣ�� ���ڸ� �����մϴ�.");frm.tphone.focus();return false;}
   
   if(frm.tphone2.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.tphone2.focus();return false;
   }else if(!Check_Num(frm.tphone2.value)){alert("������ ���ڸ� �����մϴ�.");frm.tphone2.focus();return false;}
   
   if(frm.tphone3.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.tphone3.focus();return false;
   }else if(!Check_Num(frm.tphone3.value)){alert("��ȭ��ȣ�� ���ڸ� �����մϴ�");frm.tphone3.focus();return false;}

<? } ?>
 
<? if($info_ess[hphone] == "true"){ ?>

   if(frm.hphone.value == ""){alert("�޴�����ȣ�� �Է��ϼ���");frm.hphone.focus();return false;
   }else if(!Check_Num(frm.hphone.value)){alert("�޴�����ȣ�� ���ڸ� �����մϴ�.");frm.hphone.focus();return false;}
   
   if(frm.hphone2.value == ""){alert("�޴�����ȣ�� �Է��ϼ���");frm.hphone2.focus();return false;
   }else if(!Check_Num(frm.hphone2.value)){alert("�޴�����ȣ�� ���ڸ� �����մϴ�.");frm.hphone2.focus();return false;}
   
   if(frm.hphone3.value == ""){alert("�޴�����ȣ�� �Է��ϼ���");frm.hphone3.focus();return false;
   }else if(!Check_Num(frm.hphone3.value)){alert("�޴�����ȣ�� ���ڸ� �����մϴ�");frm.hphone3.focus();return false;}

<? } ?>

<? if($info_ess[email] == "true"){ ?>

   if(frm.email.value == ""){alert("�̸����� �Է��ϼ���.");frm.email.focus();return false;
   }else if(!check_Email(frm.email.value)){frm.email.focus();return false;}

<? } ?>

<? if($info_ess[birthday] == "true"){ ?>

   if(frm.birthday.value == ""){alert("��������� �Է��ϼ���.");frm.birthday.focus();return false;}
   if(frm.birthday2.value == ""){alert("��������� �Է��ϼ���.");frm.birthday2.focus();return false;}
   if(frm.birthday3.value == ""){alert("��������� �Է��ϼ���.");frm.birthday3.focus();return false;}
   if(frm.bgubun[0].checked == false && frm.bgubun[1].checked == false){alert("��� ������ �����ϼ���.");return false;}

<? } ?>

<? if($info_ess[marriage] == "true"){ ?>
   if(frm.marriage[0].checked == false && frm.marriage[1].checked == false){alert("��ȥ���θ� �����ϼ���.");return false;}
   
<? } ?>

<? if($info_ess[marriage] == "true"){ ?>

   if(frm.memorial.value == ""){ alert("��ȥ������� �Է��ϼ���.");frm.memorial.focus();return false;}
   if(frm.memorial2.value == ""){alert("��ȥ������� �Է��ϼ���.");frm.memorial2.focus();return false;}
   if(frm.memorial3.value == ""){alert("��ȥ������� �Է��ϼ���.");frm.memorial3.focus();return false;}
   
<? } ?>

<? if($info_ess[job] == "true"){ ?>

   if(frm.job.value == ""){alert("������ �����ϼ���.");frm.job.focus();return false;}

<? } ?>

<? if($info_ess[scholarship] == "true"){ ?>

   if(frm.scholarship.value == ""){alert("�з��� �����ϼ���.");frm.scholarship.focus();return false;}
   
<? } ?>

<? if($info_ess[consph] == "true"){ ?>

	var consphLen=frm['consph[]'].length;

	if(consphLen == undefined){
	  if( frm['consph[]'].checked == false ){alert("���ɺо߰� ���õ��� �ʾҽ��ϴ�.");frm['consph[]'].focus();return false;  }
	}else {
	  var ChkLike=0;
	  for(i=0;i<consphLen;i++){if( frm['consph[]'][i].checked == true ){ ChkLike=1; break;}}
	  if( ChkLike==0 ){alert("���ɺоߴ� �Ѱ� �̻� �����ϼž� �մϴ�.");frm['consph[]'][0].focus();return false; }
	}
 
<? } ?>

   if(frm.recom.value != ""){
      if(frm.recom.value == frm.id.value){
         alert("�ڱ� �ڽ��� ��õ���� �� �� �����ϴ�.");
         frm.recom.value = "";
         return false;
      }
   }
}

// ���̵� �ߺ�Ȯ��
function idCheck(){
   var id = document.frm.id.value;
   var url = "id_check.php?id=" + id;
   window.open(url, "idCheck", "height=200, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=150");
}

// �����ȣ ã��
function zipSearch(){
   document.frm.address.focus();
   var url = "zip_search.php";
   window.open(url, "zipSearch", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}
//-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=700>
					<tr><td align=center style="padding:5 0 0 0">
					
					
							<!--ȸ������ ����-->
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
														<span class="s11">(3~12 ����, ����, ���� �� ID������ �Ұ�)</span></td></tr>
													<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													<tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_01_02.gif"></td>
														<td><input type=password name="passwd" size=20 class="input">
														<span class="s11">(4�� �̻��� ����, ����)</span></td></tr>
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
														  ���� ���� ���񽺸� �����ðڽ��ϱ�?&nbsp;
														<input name="resms" type="radio" value="Y" checked style="border:0px; background-color:transparent;">��&nbsp;
														<input name="resms" type="radio" value="N" style="border:0px; background-color:transparent;">�ƴϿ�
														<br><font color="#317FB1">* �ֹ�Ȯ��,��� �����Ȳ,�˸��� ���,�̺�Ʈ ���� ���� ���� �� �帳�ϴ�.</font>
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
														 �̸��� ���񽺸� �����ðڽ��ϱ�?&nbsp;
														<input name="reemail" type="radio" value="Y" checked style="border:0px; background-color:transparent;">��&nbsp;
														<input name="reemail" type="radio" value="N" style="border:0px; background-color:transparent;">�ƴϿ�
														<br><font color="#317FB1">* �ֹ�,����,�̺�Ʈ ��������, �� ��ȿ���� ���� �̸����� ���� �Ұ�</font>
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
							<!--�߰�����-->
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
														  <input type=text name="birthday" size=8 class="input">�� 
														  <input type=text name="birthday2" size=5 class="input">�� 
														  <input type=text name="birthday3" size=5 class="input">��&nbsp;&nbsp;
														(<input name="bgubun" value="S" type="radio" style="border:0px; background-color:transparent;">���
														<input name="bgubun" value="M" type="radio" style="border:0px; background-color:transparent;">����)</td></tr>
													  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													  <?
													  }
													  if($info_use[marriage] == true){
													  ?>
													  <tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_02.gif"></td>
														<td>
														  <input name="marriage" value="Y" type="radio" style="border:0px; background-color:transparent;">��ȥ
														  <input name="marriage" value="N" type="radio" style="border:0px; background-color:transparent;">��ȥ</td></tr>
													  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>
													  <?
													  }
													  if($info_use[memorial] == true){
													  ?>
													  <tr height=28>
														<td><img src="/images/blue_icon.gif"></td>
														<td><img src="/images/form_03_03.gif"></td>
														<td>
														  <input type=text name="memorial" size=8 class="input">�� 
														  <input type=text name="memorial2" size=5 class="input">�� 
														  <input type=text name="memorial3" size=5 class="input">��&nbsp;&nbsp;
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
									                  <option selected>�׸��� ���� �� �ּ���</option>
									                  <option value="00">����</option>
									                  <option value="10">�л�</option>
									                  <option value="30">��ǻ��/���ͳ�</option>
									                  <option value="50">���</option>
									                  <option value="70">������</option>
									                  <option value="90">����</option>
									                  <option value="A0">���񽺾�</option>
									                  <option value="C0">����</option>
									                  <option value="E0">����/����/�����</option>
									                  <option value="G0">�����</option>
									                  <option value="I0">����</option>
									                  <option value="K0">�Ƿ�</option>
									                  <option value="M0">����</option>
									                  <option value="O0">�Ǽ���</option>
									                  <option value="Q0">������</option>
									                  <option value="S0">�ε����</option>
									                  <option value="U0">��۾�</option>
									                  <option value="W0">��/��/��/�����</option>
									                  <option value="Y0">����</option>
									                  <option value="z0">��Ÿ</option>
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
									                  <option value="" selected>�׸��� ���� �� �ּ���</option>
									                  <option value="0">����</option>
									                  <option value="1">�ʵ��б�����</option>
									                  <option value="2">�ʵ��б�����</option>
									                  <option value="4">���б�����</option>
									                  <option value="6">���б�����</option>
									                  <option value="7">����б�����</option>
									                  <option value="9">����б�����</option>
									                  <option value="H">���б�����</option>
									                  <option value="J">���б�����</option>
									                  <option value="O">���п�����</option>
									                  <option value="Z">���п������̻�</option>
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
															<input type="checkbox" name="consph[]"  value="01"> �ǰ� 
									                  <input type="checkbox" name="consph[]" value="02"> ��ȭ/���� 
									                  <input type="checkbox" name="consph[]" value="03"> ���� 
									                  <input type="checkbox" name="consph[]" value="04"> ����/���� 
									                  <input type="checkbox" name="consph[]" value="05"> ���� 
									                  <input type="checkbox" name="consph[]" value="06"> ����/����<br>
									                  <input type="checkbox" name="consph[]" value="07"> ��Ȱ 
									                  <input type="checkbox" name="consph[]" value="08"> ������ 
									                  <input type="checkbox" name="consph[]" value="09"> ���� 
									                  <input type="checkbox" name="consph[]" value="10"> ��ǻ�� 
									                  <input type="checkbox" name="consph[]" value="11"> �й�
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
					<!---����� ���� ��---------------------------------------------------------------------------------------------------------------------->
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>