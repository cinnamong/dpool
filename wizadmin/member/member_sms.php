<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
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

   if(frm.se_num.value == ""){
		alert("�����º� ��ȣ�� �Է��ϼ���");
		frm.send.focus();
		return false;
	}
	if(frm.sms_msg.value == ""){
		alert("������ �Է��ϼ���");
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
			alert("�޽��������� 80 ����Ʈ �̻� ������ �� �����ϴ�.");
			
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
                                          $nowposi = "ȸ������ &gt; <strong>SMS�߼�</strong>";
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
				                                      <option value="email" <? if($searchopt == "email") echo "selected"; ?>>��SMS
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
                                              <td bgcolor="E9E7E7" align="center">SMS</td>
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
                                          <input type="hidden" name="mode" value="memsms">
                                          <input type="hidden" name="mailsql" value="<?=$sql?>">
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
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����º� ��ȣ</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="se_num" value="<?=$wizadmin_session[shop_tel]?>" size="60" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                      <textarea name="sms_msg" rows="12" cols="60" class="textarea" onKeyDown="checkSmsmsg();"></textarea>
                                                      <input type="text" name="sms_byte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:����; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()">
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
                                              <td width="60"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" �� �� " onClick="history.go(-1);"></td>
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