<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "status=$status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

// �ֹ����� ����
function chgStatus(status){
   document.frm.status.value = status;
   document.frm.submit();
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
		if(document.forms[i].orderid != null){
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
		if(document.forms[i].orderid != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//���û�ǰ ����
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
		alert("������ �ֹ��� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ �ֹ��� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "order_save.php?mode=delete&selorder=" + selorder;
		}else{
			return;
		}
	}
	return;
	
}

// �����ֹ� ���º���
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
		alert("������ �ֹ��� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		var url = "order_status.php?selorder=" + selorder;
		window.open(url,"batchStatus","height=150, width=250, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	return;
	
}

// �ֹ����� �����ٿ�
function excelDown(){
	var url = "order_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=270, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �Ⱓ����
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
                                          $nowposi = "�ֹ����� &gt; <strong>�ֹ����</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�ֹ���� </strong></td>
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
                                              <td width="70">&nbsp; <font color="2369C9"><b>�������</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <input type="button" onClick="chgStatus('');" value=" ��ü " class="t">
                                              <input type="button" onClick="chgStatus('OR');" value="�ֹ�����" class="t">
                                              <input type="button" onClick="chgStatus('OY');" value="�����Ϸ�" class="t">
                                              <input type="button" onClick="chgStatus('DR');" value="����غ���" class="t">
                                              <input type="button" onClick="chgStatus('DI');" value="�����" class="t">
                                              <input type="button" onClick="chgStatus('DC');" value="��ۿϷ�" class="t">
                                              <input type="button" onClick="chgStatus('OC');" value="�ֹ����" class="t">
                                              </td>
                                              </tr>
                                              <tr>
                                              <td width="70"></td>
                                              <td width="2"></td>
                                              <td>
                                              <input type="button" onClick="chgStatus('RD');" value="ȯ�ҿ�û" class="t">
                                              <input type="button" onClick="chgStatus('RC');" value="ȯ�ҿϷ�" class="t">
                                              <input type="button" onClick="chgStatus('CD');" value="��ȯ��û" class="t">
                                              <input type="button" onClick="chgStatus('CC');" value="��ȯ�Ϸ�" class="t">
                                              </td>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>�Ⱓ</b></font></td>
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
						                             �� 
						                             <select name="prev_month" class="select2">
						                               <?
						                              for($ii=1; $ii <= 12; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $prev_month) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             �� 
						                             <select name="prev_day" class="select2">
						                               <?
						                              for($ii=1; $ii <= 31; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $prev_day) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             �� ~ 
						                             <select name="next_year" class="select2">
						                               <?
						                              for($ii=2004; $ii <= 2020; $ii++){
						                                if($ii == $next_year) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             �� 
						                             <select name="next_month" class="select2">
						                               <?
						                              for($ii=1; $ii <= 12; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $next_month) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             �� 
						                             <select name="next_day" class="select2">
						                               <?
						                              for($ii=1; $ii <= 31; $ii++){
						                                if($ii<10) $ii = "0".$ii;
						                                if($ii == $next_day) echo "<option value=$ii selected>$ii";
						                                else echo "<option value=$ii>$ii";
						                              }
						                           ?>
						                             </select>
						                             �� &nbsp; 
						                           <?
						                           $yes_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*1));
						                           $to_day = date('Y-m-d');
						                           $week_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*7));
						                           $month_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*30));
						                           ?>
						                             <a href="javascript:setPeriod('<?=$to_day?>')"><font color=red>[����]</font></a> 
						                             <a href="javascript:setPeriod('<?=$yes_day?>')"><font color=red>[����]</font></a> 
						                             <a href="javascript:setPeriod('<?=$week_day?>')"><font color=red>[1����]</font></a> 
						                             <a href="javascript:setPeriod('<?=$month_day?>')"><font color=red>[1����]</font></a>
                                              </td>
                                              </tr>
                                              </table>
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>���ǰ˻�</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              	<select name="searchopt" class="select2">
				                                    <option value="send_name" <? if($searchopt == "send_name") echo "selected"; ?>>�ֹ��ڸ�
				                                    <option value="rece_name" <? if($searchopt == "rece_name") echo "selected"; ?>>�����θ�
				                                    <option value="orderid" <? if($searchopt == "orderid") echo "selected"; ?>>�ֹ���ȣ
				                                    <option value="send_id" <? if($searchopt == "send_id") echo "selected"; ?>>���̵�
				                                    <option value="send_hphone" <? if($searchopt == "send_hphone") echo "selected"; ?>>�޴���
				                                    <option value="rece_tphone" <? if($searchopt == "rece_tphone") echo "selected"; ?>>��ȭ��ȣ
				                                    <option value="send_email" <? if($searchopt == "send_email") echo "selected"; ?>>�̸���
				                                    <option value="account_name" <? if($searchopt == "account_name") echo "selected"; ?>>�Ա��ڸ�
				                                    </select>
                                              </td>
                                              <td><input type="text" name="searchkey" value="<?=$searchkey?>" class="form1"></td>
                                              <td><input type="submit" value="�˻�" class="xbtn"></td>
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
                                              <td>�� �ֹ��� : <b><?=$all_total?></b> &nbsp; �˻� �ֹ��� : <b><?=$total?></b></td>
                                              <td align="right">
													       &nbsp; <font color="6DCFF6">��</font> �����Ϸ�
													       &nbsp; <font color="BD8CBF">��</font> ��ۿϷ�
													       &nbsp; <font color="ED1C24">��</font> �ֹ���� &nbsp; 
													       <input type="button" class="t" value="������������" onClick="excelDown();">
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="5%" height="30" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="12%" bgcolor="E9E7E7" align="center">�ֹ���</td>
                                              <td width="15%" bgcolor="E9E7E7" align="center">�ֹ���ȣ</td>
                                              <td width="18%" bgcolor="E9E7E7" align="center">�ֹ��ڸ�</td>
                                              <td width="13%" bgcolor="E9E7E7" align="center">�ֹ����</td>
                                              <td width="12%" bgcolor="E9E7E7" align="right">�ֹ��ݾ� &nbsp; &nbsp;</td>
                                              <td width="12%" bgcolor="E9E7E7" align="center">�������</td>
                                              <td width="13%" bgcolor="E9E7E7" align="center">���</td>
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
                                              if($row->send_id == "") echo "$row->send_name [��ȸ��]";
                                              else echo "<a href='../member/member_info.php?mode=update&id=$row->send_id'>$row->send_name [$row->send_id]</a>";
                                              ?>
                                              </td>
                                              <td align="center"><?=pay_method($row->pay_method)?></td>
                                              <td align="right"><?=number_format($row->total_price)?>�� &nbsp; &nbsp;</td>
                                              <td align="center"  bgcolor=<?=$stacolor?>>
                                              <select name="chg_status" style="width:90">
                                              <?
                      									if($row->status == "OR"){
                      								 ?>
                                              <option value="OR" <? if($row->status == "OR") echo "selected"; ?>>�ֹ�����
                                              <option value="OY" <? if($row->status == "OY") echo "selected"; ?>>�����Ϸ�
                      								 <?
                      									}else{
                      								 ?>
                                              <option value="OY" <? if($row->status == "OY") echo "selected"; ?>>�����Ϸ�
                                              <option value="DR" <? if($row->status == "DR") echo "selected"; ?>>����غ���
                                              <option value="DI" <? if($row->status == "DI") echo "selected"; ?>>�����
                                              <option value="DC" <? if($row->status == "DC") echo "selected"; ?>>��ۿϷ�
                                              <option value="OC" <? if($row->status == "OC") echo "selected"; ?>>�ֹ����
                                              <option>----------
                                              <option value="RD" <? if($row->status == "RD") echo "selected"; ?>>ȯ�ҿ�û
                                              <option value="RC" <? if($row->status == "RC") echo "selected"; ?>>ȯ�ҿϷ�
                                              <option value="CD" <? if($row->status == "CD") echo "selected"; ?>>��ȯ��û
                                              <option value="CC" <? if($row->status == "CC") echo "selected"; ?>>��ȯ�Ϸ�
                                              <?
                                             	}
                                              ?>
                                              </select>
                                              </td>
                                              <td align="center">
                                              <input type="submit" class="xbtn" value="����">
                                              <input type="button" class="xbtn" value="����" onClick="document.location='order_info.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>'">
                                              </td>
                                            </tr>
                                            <tr><td height="4"></td></tr>
                                            </form>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }

							                   	if($total <= 0){
							                   		echo "<tr><td height='30' colspan=9 align=center>��ϵ� �ֹ��� �����ϴ�.</td></tr>";
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
                                                <input type="button" value="���û���" onClick="orderDelete();" class="t">
                                                <input type="button" value="�����ϰ�����" onClick="batchStatus();" class="t">
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