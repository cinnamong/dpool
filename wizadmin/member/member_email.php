<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
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

	frm.review.value = "N";
	frm.target = "";
	
   if(frm.subject.value == ""){
		alert("������ �Է��ϼ���");
		frm.subject.focus();
		return false;
	}
	if(frm.content.value == "<P>&nbsp;</P>"){
		alert("������ �Է��ϼ���");
		return false;
	}
   
   document.frm.toggle.checked = true; doToggle();
	iText = iView.document.body.innerText;
   frm.content.value = iText;
   
}

function reviewMail(frm){
	
	frm.review.value='Y';
	frm.target='_blank';
	
	if(viewMode == 1){
      iHTML = iView.document.body.innerHTML;
      frm.content.value = iHTML;
   }else{
      iText = iView.document.body.innerText;
      iView.document.body.innerHTML = iText;
      iHTML = iView.document.body.innerHTML;
      frm.content.value = iHTML;
   }
   
	frm.submit();
	
}


//-->
</script>
<body onLoad="Init();">
<? include "../inc/header.inc"; ?>

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
                                          $nowposi = "ȸ������ &gt; <strong>���Ϲ߼�</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�߼۸�� </strong></td>
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
                                                  <td width="120">&nbsp; <font color="2369C9"><b>���� ����</b></font></td>
                                                  <td width="230"><input type="checkbox" name="birthday" value="Y" <? if($birthday == "Y") echo "checked"; ?>>��</td>
                                                  <td width="120">&nbsp; <font color="2369C9"><b>���� ��ȥ�����</b></font></td>
                                                  <td width="230"><input type="checkbox" name="memorial" value="Y" <? if($memorial == "Y") echo "checked"; ?>>��</td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>����</b></font></td>
                                                  <td>
                                                  <select name="age">
						                                <option value="">���ɴ븦 �����ϼ���
						                                <option value="10" <? if($age == "10") echo "selected"; ?>>10�� ~ 19��
						                                <option value="20" <? if($age == "20") echo "selected"; ?>>20�� ~ 29��
						                                <option value="30" <? if($age == "30") echo "selected"; ?>>30�� ~ 39��
						                                <option value="40" <? if($age == "40") echo "selected"; ?>>40�� ~ 49��
						                                <option value="50" <? if($age == "50") echo "selected"; ?>>50�� ~ 59��
						                                <option value="60" <? if($age == "60") echo "selected"; ?>>60�� ~ 69��
						                                </select>
                                                  </td>
                                                  <td>&nbsp; <font color="2369C9"><b>����</b></font></td>
                                                  <td>
                                                  <select name="address">
								         			         <option value="">�� �ô����� �����ϼ���.</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="�λ�" <? if($address == "�λ�") echo "selected"; ?>>�λ�</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="�뱸" <? if($address == "�뱸") echo "selected"; ?>>�뱸</option>
								         						<option value="��õ" <? if($address == "��õ") echo "selected"; ?>>��õ</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
								         						<option value="�泲" <? if($address == "�泲") echo "selected"; ?>>�泲</option>
								         						<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
								         						<option value="�泲" <? if($address == "�泲") echo "selected"; ?>>�泲</option>
								         						<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
								         					   </select>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>����</b></font></td>
                                                  <td>
                                                  <select name="job" class="optionjoin">
								                            <option value="">������ �����ϼ���.</option>
								                            <option value="00" <? if($job == "00") echo "selected"; ?>>����</option>
								         		             <option value="10" <? if($job == "10") echo "selected"; ?>>�л�</option>
								         		             <option value="30" <? if($job == "30") echo "selected"; ?>>��ǻ��/���ͳ�</option>
								         		             <option value="50" <? if($job == "50") echo "selected"; ?>>���</option>
								         		             <option value="70" <? if($job == "70") echo "selected"; ?>>������</option>
								         		             <option value="90" <? if($job == "90") echo "selected"; ?>>����</option>
								         		             <option value="A0" <? if($job == "A0") echo "selected"; ?>>���񽺾�</option>
								         		             <option value="C0" <? if($job == "C0") echo "selected"; ?>>����</option>
								         		             <option value="E0" <? if($job == "E0") echo "selected"; ?>>����/����/�����</option>
								         		             <option value="G0" <? if($job == "G0") echo "selected"; ?>>�����</option>
								         		             <option value="I0" <? if($job == "I0") echo "selected"; ?>>����</option>
								         		             <option value="K0" <? if($job == "K0") echo "selected"; ?>>�Ƿ�</option>
								         		             <option value="M0" <? if($job == "M0") echo "selected"; ?>>����</option>
								         		             <option value="O0" <? if($job == "O0") echo "selected"; ?>>�Ǽ���</option>
								         		             <option value="Q0" <? if($job == "Q0") echo "selected"; ?>>������</option>
								         		             <option value="S0" <? if($job == "S0") echo "selected"; ?>>�ε����</option>
								         		             <option value="U0" <? if($job == "U0") echo "selected"; ?>>��۾�</option>
								         		             <option value="W0" <? if($job == "W0") echo "selected"; ?>>��/��/��/�����</option>
								         		             <option value="Y0" <? if($job == "Y0") echo "selected"; ?>>����</option>
								         		             <option value="z0" <? if($job == "z0") echo "selected"; ?>>��Ÿ</option>
								                            </select>
								                          </td>
                                                  <td>&nbsp; <font color="2369C9"><b>��ȥ����</b></font></td>
                                                  <td>
                                                  <input type="radio" name="marriage" value="N" <? if($marriage == "N") echo "checked"; ?>>��ȥ
								                          <input type="radio" name="marriage" value="Y" <? if($marriage == "Y") echo "checked"; ?>>��ȥ
								                          </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>������</b></font></td>
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
								                             �� 
								                             <select name="prev_month">
								                               <?
								                              for($ii=1; $ii <= 12; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $prev_month) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             �� 
								                             <select name="prev_day">
								                               <?
								                              for($ii=1; $ii <= 31; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $prev_day) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             �� ~ 
								                             <select name="next_year">
								                               <?
								                              for($ii=2000; $ii <= 2010; $ii++){
								                                if($ii == $next_year) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             �� 
								                             <select name="next_month">
								                               <?
								                              for($ii=1; $ii <= 12; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $next_month) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             �� 
								                             <select name="next_day">
								                               <?
								                              for($ii=1; $ii <= 31; $ii++){
								                                if($ii<10) $ii = "0".$ii;
								                                if($ii == $next_day) echo "<option value=$ii selected>$ii";
								                                else echo "<option value=$ii>$ii";
								                              }
								                           ?>
								                             </select>
								                             ��
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp; <font color="2369C9"><b>���ǰ˻�</b></font></td>
                                                  <td colspan="3">
                                                  <select name="searchopt" class="select">
				                                      <option value="name" <? if($searchopt == "name") echo "selected"; ?>>����
				                                      <option value="id" <? if($searchopt == "id") echo "selected"; ?>>���̵�
				                                      <option value="resno" <? if($searchopt == "resno") echo "selected"; ?>>�ֹι�ȣ
				                                      <option value="email" <? if($searchopt == "email") echo "selected"; ?>>�̸���
				                                      <option value="tphone" <? if($searchopt == "tphone") echo "selected"; ?>>��ȭ��ȣ
				                                      <option value="hphone" <? if($searchopt == "hphone") echo "selected"; ?>>�޴���
				                                      </select>
				                                    <input type="text" name="keyword" value="<?=$keyword?>" class="form1">
				                                    <input type="submit" class="t" value="�� ��">
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
								                     
								                        
								                     $sql = "select id,passwd,name,hphone,email,visit,reemail,wdate from wiz_member where id != '' ";
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
                                              <td>�� ȸ���� : <b><?=$all_total?></b> , �˻� ȸ���� : <b><?=$total?></b></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td bgcolor="E9E7E7" align="center" height="30">��ȣ</td>
                                              <td bgcolor="E9E7E7" align="center">�̸�</td>
                                              <td bgcolor="E9E7E7" align="center">���̵�/���</td>
                                              <td bgcolor="E9E7E7" align="center">�޴���</td>
                                              <td bgcolor="E9E7E7" align="center">�̸���</td>
                                              <td bgcolor="E9E7E7" align="center">�湮��</td>
                                              <td bgcolor="E9E7E7" align="center">���ſ���</td>
                                              <td bgcolor="E9E7E7" align="center">������</td>
                                            </tr>
                                          </form>
                                            <tr><td colspan="11" bgcolor="DEDEDE"></td></tr>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															if($rows%2 == 0) $bgcolor="#FFFFFF";
															else $bgcolor="#F3F3F3";
															if($row->reemail == "Y") $row->reemail = "��";
															else $row->reemail = "�ƴϿ�";
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
							                   		echo "<tr><td height='30' colspan=10 align=center>��ϵ� ȸ���� �����ϴ�.</td></tr>";
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
                                          <input type="hidden" name="mode" value="mememail">
                                          <input type="hidden" name="review" value="">
                                          <input type="hidden" name="mailsql" value="<?=$sql?>">
                                          <textarea name="content" style="display:none"></textarea>
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�߼�</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="radio" name="rekind" value="RY" checked>����ȸ����
                                                    <input type="radio" name="rekind" value="RA">���Űź�����
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="subject" size="80" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    
                                                    <!-- ��������  -->
                                                    <table id="tblCtrls" width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
																        <tr> 
																          <td bgcolor="F5F6F5">
																			 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																              <tr> 
																                <td width="18%" height="56">
																					 	<table width="100%" height="56" border="0" align="center" cellpadding="0" cellspacing="0">
																                    <tr align="center" valign="bottom"> 
																                      <td height="26"><a href="javascript:doBold();" onMouseOver="MM_swapImage('Image1','','../webedit/image/wtool1_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool1.gif" name="Image1" width="19" height="18" border="0" id="Image1"></a></td>
																                      <td><a href="javascript:doItalic();" onMouseOver="MM_swapImage('Image2','','../webedit/image/wtool2_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool2.gif" name="Image2" width="19" height="18" border="0" id="Image2"></a></td>
																                      <td><a href="javascript:doUnderline();" onMouseOver="MM_swapImage('Image3','','../webedit/image/wtool3_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool3.gif" name="Image3" width="19" height="18" border="0" id="Image3"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="3" colspan="3"></td>
																                    </tr>
																                    <tr align="center" valign="top"> 
																                      <td height="27"><a href="javascript:doLeft();" onMouseOver="MM_swapImage('Image8','','../webedit/image/wtool8_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool8.gif" name="Image8" width="19" height="18" border="0" id="Image8"></a></td>
																                      <td><a href="javascript:doCenter();" onMouseOver="MM_swapImage('Image9','','../webedit/image/wtool9_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool9.gif" name="Image9" width="19" height="18" border="0" id="Image9"></a></td>
																                      <td><a href="javascript:doRight();" onMouseOver="MM_swapImage('Image10','','../webedit/image/wtool10_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool10.gif" name="Image10" width="19" height="18" border="0" id="Image10"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="19%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td width="100%" height="27" align="center" valign="bottom"><a href="javascript:doFont();" onMouseOver="MM_swapImage('Image4','','../webedit/image/wtool4_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool4.gif" name="Image4" width="84" height="22" border="0" id="Image4"></a></td>
																                    </tr>
																                    <tr>
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doSize();" onMouseOver="MM_swapImage('Image11','','../webedit/image/wtool11_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool11.gif" name="Image11" width="84" height="22" border="0" id="Image11"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="20%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td height="27" align="center" valign="bottom"><a href="javascript:doForcol();" onMouseOver="MM_swapImage('Image5','','../webedit/image/wtool5_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool5.gif" name="Image5" width="95" height="22" border="0" id="Image5"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doBgcol();" onMouseOver="MM_swapImage('Image12','','../webedit/image/wtool12_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool12.gif" name="Image12" width="95" height="22" border="0" id="Image12"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="18%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td height="27" align="center" valign="bottom"><a href="javascript:doImage();" onMouseOver="MM_swapImage('Image6','','../webedit/image/wtool6_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool6.gif" name="Image6" width="73" height="22" border="0" id="Image6"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doTable();" onMouseOver="MM_swapImage('Image13','','../webedit/image/wtool13_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool13.gif" name="Image13" width="73" height="22" border="0" id="Image13"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																                <td width="2"><img src="../webedit/image/bar.gif" width="2" height="39" align="absmiddle"></td>
																                <td width="25%">
																					 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																                    <tr> 
																                      <td height="27" align="center" valign="bottom"><a href="javascript:doLink();" onMouseOver="MM_swapImage('Image7','','../webedit/image/wtool7_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool7.gif" name="Image7" width="74" height="22" border="0" id="Image7"></a></td>
																                    </tr>
																                    <tr> 
																                      <td height="2"></td>
																                    </tr>
																                    <tr> 
																                      <td height="27" align="center" valign="top"><a href="javascript:doMultilink();" onMouseOver="MM_swapImage('Image14','','../webedit/image/wtool14_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../webedit/image/wtool14.gif" name="Image14" width="111" height="22" border="0" id="Image14"></a></td>
																                    </tr>
																                  </table>
																					 </td>
																              </tr>
																            </table>
																			 </td>
																        </tr>
																      </table>
																      <!-- ��������  -->
						      
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="100%" bgcolor="F8F8F8" colspan="4" align="center">
                                                    <iframe align="right" id="iView" style="width: 99.5%; height:300;" scrolling='YES' hspace="0" vspace="0"></iframe>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="100%" bgcolor="F8F8F8" colspan="4" align="right">
                                                    <input type="checkbox" name="toggle" onClick="doToggle();">html����
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
                                          <tr><td><input type="button" class="t" value=" �̸����� " onclick="reviewMail(this.form);"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" �� �� " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td>
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