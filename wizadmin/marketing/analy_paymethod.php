<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

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
                                          $nowposi = "�����ð��� &gt; <strong>�������м�</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>�������м� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form name="frm" action="<?=$PHP_SELF?>" method="get">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>�м����</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <input type="radio" name="analy_type" value="OP" onClick="this.form.submit();" <? if($analy_type == "OP" || $analy_type == "") echo "checked"; ?>>�������ܺ�
                                              <input type="radio" name="analy_type" value="OY" onClick="this.form.submit();" <? if($analy_type == "OY") echo "checked"; ?>>�⺰
                                              <input type="radio" name="analy_type" value="OM" onClick="this.form.submit();" <? if($analy_type == "OM") echo "checked"; ?>>����
                                              <input type="radio" name="analy_type" value="OD" onClick="this.form.submit();" <? if($analy_type == "OD") echo "checked"; ?>>�Ϻ�
                                              <input type="radio" name="analy_type" value="OW" onClick="this.form.submit();" <? if($analy_type == "OW") echo "checked"; ?>>���Ϻ�
                                              </td>
                                              </tr>
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
						                             ��&nbsp; 
                                              </td>
                                              <td>
                                              <input type="submit" value="�˻�" class="t">
                                              </td>
                                              </table>
                                              </td>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          
                                          <?
							                     
							                     if(!empty($prev_year)){
							                        $prev_period = $prev_year."-".$prev_month."-".$prev_day." 00:00:00";
							                        $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
							                        $period_sql = " and order_date >= '$prev_period' and order_date <= '$next_period'";
							                     }
							                     
							                     // �� �����
							                     
							                     $sql = "select sum(total_price) as total_price from wiz_order where status = 'DC' or status = 'CC' $period_sql";
							                     $result = mysql_query($sql) or error(mysql_error());
							                     $row = mysql_fetch_object($result);
							                     $total_perprice = $row->total_price;

                                          
                                          // �������ܺ�
														if($analy_type == "OP" || $analy_type == ""){

															echo "<table width='97%' border='0' cellspacing='0' cellpadding='0'>\n";
	                                          echo "  <tr align='center' bgcolor='E9E7E7'> \n";
	                                          echo "    <td width='15%'height='30'>�������</td>\n";
	                                          echo "    <td width='15%'>�����</td>\n";
	                                          echo "    <td width='15%'>�ֹ��Ǽ�</td>\n";
	                                          echo "    <td width='15%'>����</td>\n";
	                                          echo "    <td width='40%'>�׷���</td>\n";
	                                          echo "  </tr>\n";
	                                          echo "  <tr><td bgcolor='DEDEDE' colspan='5'></td></tr>\n";

								                     $sql = "select pay_method , count(*) as count, sum(total_price) as total_price from wiz_order where status = 'DC' or status = 'CC' $period_sql group by pay_method";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     
								                     $lists = 10;
								                     $rows = 24;
								                     $total = mysql_num_rows($result);
								                     $page_count = ceil($total/$rows);
								                     if(!$page || $page > $page_count) $page = 1;
								                     $start = ($page-1)*$rows;
								                     $no = 0;
								                     
								                     if($start>1) mysql_data_seek($result,$start);
								                   	
								                     while(($row = mysql_fetch_object($result)) && $rows){
								                     	if(($no%2) == 0) $bgcolor="#ffffff";
								                     	else $bgcolor="#F3F3F3";
								                     	
								                     	$percent = ceil(($row->total_price/$total_perprice)*100);

		                                            echo "<tr bgcolor='".$bgcolor."'> \n";
		                                            echo "  <td height='30' align='center'>".pay_method($row->pay_method)."</td>\n";
		                                            echo "  <td align='center'>".number_format($row->total_price)."��</td>\n";
		                                            echo "  <td align='center'>".$row->count."</td>\n";
		                                            echo "  <td align='center'>".$percent."%</td>\n";
		                                            echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
		                                            echo "</tr>\n";
		                                            echo "<tr><td bgcolor='DEDEDE' colspan='5'></td></tr>\n";
                                          		$no--;
								                        $rows--;
								                    }
								                    
								                    if($total <= 0){
							                   	    echo "<tr><td colspan=9 bgcolor=DEDEDE></td></tr>";
							                   		 echo "<tr><td height='30' colspan=9 align=center>��ϵ� ������ �����ϴ�.</td></tr>";
							                   		 echo "<tr><td colspan=9 bgcolor=DEDEDE></td></tr>";
							                   	  }
							                   	
								                    echo "</table>\n";
								                  
								                  
								                  // �⺰���
														}else{

	                                          function getPeriod($priod){
	                                          	
	                                          	global $analy_type;
	                                          	
	                                          	if($analy_type == "OW"){
	                                          		
									                        if($priod == 2) return "��";
									                        if($priod == 3) return "ȭ";
									                        if($priod == 4) return "��";
									                        if($priod == 5) return "��";
									                        if($priod == 6) return "��";
									                        if($priod == 7) return "��";
									                        if($priod == 1) return "��";
									                        
									                     }else{
									                     
									                     	return $priod;
									                     	
									                     }
								                     }
                     
                     								$sql = "select sum(total_price) as sum_total from wiz_order where status = 'CC' or status = 'DC'";
                     								$result = mysql_query($sql) or error(mysql_error());
                     								$row = mysql_fetch_object($result);
                     								$sum_total = $row->sum_total;

															if($analy_type == "OY"){
																
																$sql = "select status, substring(order_date,1,4) as priod, total_price from wiz_order where (status = 'CC' or status = 'DC') $period_sql order by substring(order_date,1,4)";
																$period = "��";
																
															}else if($analy_type == "OM"){
																
																$sql = "select status, substring(order_date,6,2) as priod, total_price from wiz_order where (status = 'CC' or status = 'DC') $period_sql order by substring(order_date,6,2)";
																$period = "��";
																
															}else if($analy_type == "OD"){

																$sql = "select status, substring(order_date,9,2) as priod, total_price from wiz_order where (status = 'CC' or status = 'DC') $period_sql order by substring(order_date,9,2)";
																$period = "��";
																
															}else if($analy_type == "OW"){
																
																$sql = "select status, DAYOFWEEK(order_date) as priod, total_price from wiz_order where (status = 'CC' or status = 'DC') $period_sql order by DAYOFWEEK(order_date)";
																$period = "����";
															}
								                     //echo $sql;
								                     
								                     echo "<table width='97%' border='0' cellspacing='0' cellpadding='0'>\n";
	                                          echo "  <tr align='center' bgcolor='E9E7E7'> \n";
	                                          echo "    <td width='10%'height='30'>$period</td>\n";
	                                          echo "    <td width='15%'>�ֹ��Ǽ�</td>\n";
	                                          echo "    <td width='15%'>�ֹ����</td>\n";
	                                          echo "    <td width='15%'>�ֹ��Ϸ�</td>\n";
	                                          echo "    <td width='15%'>�����</td>\n";
	                                          echo "    <td width='10%'>����</td>\n";
	                                          echo "    <td width='20%'>�׷���</td>\n";
	                                          echo "  </tr>\n";
	                                          echo "  <tr><td bgcolor='DEDEDE' colspan='7'></td></tr>\n";
	                                          
								                     $result = mysql_query($sql) or error(mysql_error());
								                     
								                     
								                     $lists = 5;
								                     $rows = 999;
								                     if(empty($page)) $page = 1;
								                     $total = mysql_num_rows($result);
								                     $page_count = ceil($total/$rows);
								                     $start = ($page-1)*$rows;
								                     $no = 0;
								                     
								                     if($start>1) mysql_data_seek($result,$start);
								                   	
								                   	$priod = "";
								                   	$order_info = "";
								                     while(($row = mysql_fetch_object($result)) && $rows){

																$order_num++;
																if($row_tmp->status == "CC") $order_cancel++;
																if($row_tmp->status == "DC"){
																	$order_complete++;
																	$total_price += $row_tmp->total_price;
																}
																
																if($row_tmp->priod != $row->priod){
																	
																	if($priod != ""){
																	
																	if(($no%2) == 0) $bgcolor="#ffffff";
								                     		else $bgcolor="#F3F3F3";
								                     	
																	$percent = ($total_price/$sum_total)*100;
																	$percent = substr($percent,0,strpos($percent,'.')+3);
																	
																	echo "<tr bgcolor='".$bgcolor."'> \n";
																	echo "  <td height='30' align='center'>".getPeriod($row_tmp->priod)."</td>\n";
																	echo "  <td align='center'>".$order_num."</td>\n";
																	echo "  <td align='center'>".$order_cancel."</td>\n";
																	echo "  <td align='center'>".$order_complete."</td>\n";
																	echo "  <td align='center'>".number_format($total_price)."��</td>\n";
																	echo "  <td align='center'>".$percent."%</td>\n";
																	echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
																	echo "</tr>\n";
																	echo "<tr><td bgcolor='DEDEDE' colspan='7'></td></tr>\n";
																	
	                                           		}
	                                           		
	                                           		$priod = $row->priod;
	                                           		$order_num = 0;
	                                           		$order_cancel = 0;
	                                           		$order_complete = 0;
																	$total_price = 0;
																	
																	$no++;
	                                           		
																}
																
																$row_tmp = $row;
																
								                     }
								                     
								                     $order_num++;
															if($row_tmp->status == "OC") $order_cancel++;
															if($row_tmp->status == "DC" || $row_tmp->status == "CC"){
																$order_complete++;
																$total_price += $row_tmp->total_price;
															}
															
															if($total > 0){
															$percent = ($total_price/$sum_total)*100;
															$percent = substr($percent,0,strpos($percent,'.')+3);
															
															if(($no%2) == 0) $bgcolor="#ffffff";
								                     else $bgcolor="#F3F3F3";
								                     		
															echo "<tr bgcolor='".$bgcolor."'> \n";
															echo "  <td height='30' align='center'>".getPeriod($row_tmp->priod)."</td>\n";
															echo "  <td align='center'>".$order_num."</td>\n";
															echo "  <td align='center'>".$order_cancel."</td>\n";
															echo "  <td align='center'>".$order_complete."</td>\n";
															echo "  <td align='center'>".number_format($total_price)."��</td>\n";
															echo "  <td align='center'>".$percent."%</td>\n";
															echo "  <td><img src='../image/mark_bar.gif' width='".(($total_price/$sum_total)*100*2)."' height='10'></td>\n";
															echo "</tr>\n";
															echo "<tr><td bgcolor='DEDEDE' colspan='7'></td></tr>\n";
															
								                     echo "</table>\n";
								                     }
								                     if($total <= 0){
							                   	    echo "<tr><td colspan=9 bgcolor=DEDEDE></td></tr>";
							                   		 echo "<tr><td height='30' colspan=9 align=center>��ϵ� ������ �����ϴ�.</td></tr>";
							                   		 echo "<tr><td colspan=9 bgcolor=DEDEDE></td></tr>";
							                   	   }
							                   	  
														}
														
							                     ?>
							                     
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, ""); ?>

                                          
                                          <table width="97%" height="175" border="0" cellpadding="0" cellspacing="0">
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