<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//------------------------------------------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

// �ֹ����� ����
function chgStatus(status){
   document.searchForm.status.value = status;
   document.searchForm.submit();
}

//üũ�ڽ����� ����
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty();
	}
}

//üũ�ڽ� ��ü����
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

//üũ�ڽ� ��������
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

//����ȸ�� ����
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
		alert("������ ȸ���� �������� �ʾҽ��ϴ�.");
		return false;
	}else{
		if(confirm("������ ȸ���� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "member_save.php?mode=deluser&seluser=" + seluser;
		}
	}
}


// �󼼰˻�
function showDetailsearch(){
   if(detailsearch.style.display == ''){
    detailsearch.style.display = 'none';
    document.searchForm.detailsearch.value = "none";
  }else{
    detailsearch.style.display='';
    document.searchForm.detailsearch.value = "show";
  }
}

// ȸ������ �����ٿ�
function excelDown(){
	var url = "member_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=250, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �� ���Ϲ߼�
function sendEmail(name,email){
	var url = "send_email.php?name=" + name + "&email=" + email;
	window.open(url,"sendEmail","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �� sms�߼�
function sendSms(name,hphone){
	var url = "send_sms.php?name=" + name + "&hphone=" + hphone;
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ȸ���� ���ų���
function orderList(id,name){
	var url = "member_order.php?id=" + id + "&name=" + name;
	window.open(url,"orderList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}


// ȸ���� �����ݳ���
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
                                          $nowposi = "ȸ������ &gt; <strong>ȸ�����</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>ȸ����� </strong></td>
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
                                              <td width="110">&nbsp; <font color="2369C9"><b>���ǰ˻�</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                               <select name="searchopt" class="select">
				                                    <option value="name" <? if($searchopt == "name") echo "selected"; ?>>����
				                                    <option value="id" <? if($searchopt == "id") echo "selected"; ?>>���̵�
				                                    <option value="resno" <? if($searchopt == "resno") echo "selected"; ?>>�ֹι�ȣ
				                                    <option value="email" <? if($searchopt == "email") echo "selected"; ?>>�̸���
				                                    <option value="tphone" <? if($searchopt == "tphone") echo "selected"; ?>>��ȭ��ȣ
				                                    <option value="hphone" <? if($searchopt == "hphone") echo "selected"; ?>>�޴���
				                                    </select>
				                                    <input type="text" name="searchkey" value="<?=$searchkey?>" class="form1">
				                                    <input type="submit" value="�˻�" class="xbtn">
				                                    <a href="javascript:showDetailsearch()"><font color="red">>> �󼼰˻�</font></a>
                                              </td>
                                              </table>
                                              
                                              <div id='detailsearch' style="display: <? if(empty($detailsearch)) echo none; else echo $detailsearch; ?>">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>���� ����</b></font></td>
                                              <td width="2"></td>
                                              <td><input type="checkbox" name="s_birthday" value="Y" <? if($s_birthday == "Y") echo "checked"; ?>>��</td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>���� ��ȥ�����</b></font></td>
                                              <td width="2"></td>
                                              <td><input type="checkbox" name="s_memorial" value="Y" <? if($s_memorial == "Y") echo "checked"; ?>>��</td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>����</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <select name="s_age">
						                             <option value="">���ɴ븦 �����ϼ���
						                             <option value="10" <? if($s_age == "10") echo "selected"; ?>>10�� ~ 19��
						                             <option value="20" <? if($s_age == "20") echo "selected"; ?>>20�� ~ 29��
						                             <option value="30" <? if($s_age == "30") echo "selected"; ?>>30�� ~ 39��
						                             <option value="40" <? if($s_age == "40") echo "selected"; ?>>40�� ~ 49��
						                             <option value="50" <? if($s_age == "50") echo "selected"; ?>>50�� ~ 59��
						                             <option value="60" <? if($s_age == "60") echo "selected"; ?>>60�� ~ 69��
						                             </select>
								                       </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>����</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                   <select name="s_address">
								         			         <option value="">�� �ô����� �����ϼ���.</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="�λ�" <? if($s_address == "�λ�") echo "selected"; ?>>�λ�</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="�뱸" <? if($s_address == "�뱸") echo "selected"; ?>>�뱸</option>
								         						<option value="��õ" <? if($s_address == "��õ") echo "selected"; ?>>��õ</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								         						<option value="�泲" <? if($s_address == "�泲") echo "selected"; ?>>�泲</option>
								         						<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="����" <? if($s_address == "����") echo "selected"; ?>>����</option>
								         						<option value="�泲" <? if($s_address == "�泲") echo "selected"; ?>>�泲</option>
								         						<option value="���" <? if($s_address == "���") echo "selected"; ?>>���</option>
								         					   </select>
								         				 </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>����</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <select name="s_job" class="optionjoin">
								                            <option value="">������ �����ϼ���.</option>
								                            <option value="00" <? if($s_job == "00") echo "selected"; ?>>����</option>
								         		             <option value="10" <? if($s_job == "10") echo "selected"; ?>>�л�</option>
								         		             <option value="30" <? if($s_job == "30") echo "selected"; ?>>��ǻ��/���ͳ�</option>
								         		             <option value="50" <? if($s_job == "50") echo "selected"; ?>>���</option>
								         		             <option value="70" <? if($s_job == "70") echo "selected"; ?>>������</option>
								         		             <option value="90" <? if($s_job == "90") echo "selected"; ?>>����</option>
								         		             <option value="A0" <? if($s_job == "A0") echo "selected"; ?>>���񽺾�</option>
								         		             <option value="C0" <? if($s_job == "C0") echo "selected"; ?>>����</option>
								         		             <option value="E0" <? if($s_job == "E0") echo "selected"; ?>>����/����/�����</option>
								         		             <option value="G0" <? if($s_job == "G0") echo "selected"; ?>>�����</option>
								         		             <option value="I0" <? if($s_job == "I0") echo "selected"; ?>>����</option>
								         		             <option value="K0" <? if($s_job == "K0") echo "selected"; ?>>�Ƿ�</option>
								         		             <option value="M0" <? if($s_job == "M0") echo "selected"; ?>>����</option>
								         		             <option value="O0" <? if($s_job == "O0") echo "selected"; ?>>�Ǽ���</option>
								         		             <option value="Q0" <? if($s_job == "Q0") echo "selected"; ?>>������</option>
								         		             <option value="S0" <? if($s_job == "S0") echo "selected"; ?>>�ε����</option>
								         		             <option value="U0" <? if($s_job == "U0") echo "selected"; ?>>��۾�</option>
								         		             <option value="W0" <? if($s_job == "W0") echo "selected"; ?>>��/��/��/�����</option>
								         		             <option value="Y0" <? if($s_job == "Y0") echo "selected"; ?>>����</option>
								         		             <option value="z0" <? if($s_job == "z0") echo "selected"; ?>>��Ÿ</option>
								                            </select>
								                         </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>��ȥ����</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <input type="radio" name="s_marriage" value="N" <? if($s_marriage == "N") echo "checked"; ?>>��ȥ
								                        <input type="radio" name="s_marriage" value="Y" <? if($s_marriage == "Y") echo "checked"; ?>>��ȥ
								                      </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="110">&nbsp; <font color="2369C9"><b>������</b></font></td>
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
                                              <td>�� ȸ���� : <b><?=$all_total?></b> , �˻� ȸ���� : <b><?=$total?></b></td>
                                              <td align="right">
													       <input type="button" class="t" value="������������" onClick="excelDown();">
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="20" height="30" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td bgcolor="E9E7E7" align="center">��ȣ</td>
                                              <td bgcolor="E9E7E7" align="center">�̸�</td>
                                              <td bgcolor="E9E7E7" align="center">���̵�/���</td>
                                              <td bgcolor="E9E7E7" align="center">�޴���</td>
                                              <td bgcolor="E9E7E7" align="center">�̸���</td>
                                              <td bgcolor="E9E7E7" align="center">���ž�</td>
                                              <td bgcolor="E9E7E7" align="center">������</td>
                                              <td bgcolor="E9E7E7" align="center">�湮��</td>
                                              <td bgcolor="E9E7E7" align="center">������</td>
                                              <td bgcolor="E9E7E7" align="center">���</td>
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
                                              <td align="right"><a href="javascript:orderList('<?=$row->id?>','<?=$row->name?>');">[����]</a> &nbsp;</td>
                                              <td align="right"><a href="javascript:reserveList('<?=$row->id?>','<?=$row->name?>');">[����]</a> &nbsp;</td>
                                              <td align="center"><?=$row->visit?></td>
                                              <td align="center"><?=substr($row->wdate,0,10)?> &nbsp;</td>
                                              <td align="center"><input type="button" value="����" class="xbtn" onClick="document.location='member_info.php?mode=update&id=<?=$row->id?>&<?=$param?>&page=<?=$page?>';"></td>
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
                                            <tr><td colspan="12" bgcolor="DEDEDE"></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="60"><input type="button" value="���û���" onClick="userDelete();" class="t"></td>
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