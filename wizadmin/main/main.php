<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

                        <table width="724" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="624" height="3"></td>
                          </tr>
                        </table>
                        <table width="724" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="724" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="724" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                        
                                          <table width="710" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="710" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td><img src="../image/tit01_cons.gif" width="709" height="31"></td>
                                            </tr>
                                          </table>
                                          <table width="710" height="1" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td bgcolor="E4E4E4"></td>
                                            </tr>
                                          </table>
                                          <table width="710" height="15" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          
                                          
                                          
                                          <table width="690" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="20">&nbsp;</td>
                                              <td width="95"><img src="../image/tit_order.gif" width="95" height="22"></td>
                                              <td width="590" align="right"><a href="../order/order_list.php"><img src="../image/bt_more.gif" width="45" height="15" border="0"></a></td>
                                            </tr>
                                          </table>
                                          <table width="690" border="4" cellpadding="10" cellspacing="0" bordercolor="F2F2D0">
                                            <tr> 
                                              <td>
                                                <table width="670" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="D3D6D9"></td></tr>
                                                </table>
                                                <table width="670" border="0" cellspacing="0" cellpadding="0">
                                                  <tr align="center"> 
                                                    <td width="100" height="23" bgcolor="EAF0F7">�ֹ���</td>
                                                    <td width="120" bgcolor="EAF0F7">�ֹ��ڸ� </td>
                                                    <td width="160" bgcolor="EAF0F7">�ֹ���ǰ </td>
                                                    <td width="120" bgcolor="EAF0F7">�������</td>
                                                    <td width="120" bgcolor="EAF0F7">�����ݾ�</td>
                                                    <td width="82" bgcolor="EAF0F7">ó������</td>
                                                  </tr>
                                                </table>
                                                <table width="670" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="D3D6D9"></td>
                                                  </tr>
                                                </table>
                                                <?
                                                $sql = "select wo.*, wp.prdname from wiz_order wo, wiz_basket wb, wiz_product wp where wo.basketid = wb.basketid and wb.prdcode = wp.prdcode and wo.status != '' order by orderid desc  limit 5";
                                                $result = mysql_query($sql) or error(mysql_error());
                                                while($order_info = mysql_fetch_object($result)){
                                                ?>
                                                <table width="670" border="0" cellspacing="0" cellpadding="0">
                                                  <tr align="center" bgcolor="#FFFFFF"> 
                                                    <td width="100" height="26"><a href="../order/order_info.php?orderid=<?=$order_info->orderid?>"><?=substr($order_info->order_date,0,10)?></a></td>
                                                    <td width="120"><a href="../order/order_info.php?orderid=<?=$order_info->orderid?>"><?=$order_info->send_name?></a></td>
                                                    <td width="160"><a href="../order/order_info.php?orderid=<?=$order_info->orderid?>"><?=cut_str($order_info->prdname,16)?></a></td>
                                                    <td width="120"><a href="../order/order_info.php?orderid=<?=$order_info->orderid?>"><?=pay_method($order_info->pay_method)?></a></td>
                                                    <td width="120"><a href="../order/order_info.php?orderid=<?=$order_info->orderid?>"><?=number_format($order_info->total_price)?>��</a></td>
                                                    <td width="82"><a href="../order/order_info.php?orderid=<?=$order_info->orderid?>"><?=order_status($order_info->status)?></a></td>
                                                  </tr>
                                                </table> 
                                                <table width="670" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td background="../image/dotline.gif"></td>
                                                  </tr>
                                                </table> 
                                                <?
                                             	}
                                             	?>

												          </td>
                                            </tr>
                                          </table>
                                          <table width="710" height="5" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td></td></tr>
                                          </table>
                                          <table width="710" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="350">
                                              
                                              
                                              
		                                          <table width="420" height="25" border="0" cellpadding="0" cellspacing="0">
		                                            <tr> 
		                                              <td width="170">&nbsp;&nbsp;&nbsp;<strong>��</strong>/<strong>��</strong>/<strong>��</strong>/<strong>Ȳ</strong></td>
		                                              <td width="250" align="right">
		                                                <table border="0" cellspacing="4" cellpadding="0">
		                                                  <tr>
		                                                    <td width="66"><a href="main.php?period=DAY"><img src="../image/bt_today.gif" width="66" height="16" border="0"></a></td>
		                                                    <td width="66"><a href="main.php?period=MONTH"><img src="../image/bt_month.gif" width="66" height="16" border="0"></a></td>
		                                                    <td width="66"><a href="main.php?period=YEAR"><img src="../image/bt_year.gif" width="66" height="16" border="0"></a></td>
		                                                  </tr>
		                                                </table>
		                                              </td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" height="1" border="0" cellpadding="0" cellspacing="0">
		                                            <tr><td bgcolor="E4E4E4"></td></tr>
		                                          </table>
		                                          <table width="420" height="5" border="0" cellpadding="0" cellspacing="0">
		                                            <tr><td></td></tr>
		                                          </table>
		                                           <?
		                                          if($period == "" || $period == "DAY"){
		                                          	
		                                          	$period_name = date('Y')."�� ".date('m')."�� ".date('d')."��";
		                                          	$mem_period = " where wdate > '".date('Y-m-d')." 00:00:00'";
		                                          	$order_period = " where order_date > '".date('Y-m-d')." 00:00:00'";
		                                          	
		                                       	}else if($period == "MONTH"){
		                                       		
		                                       		$period_name = date('Y')."�� ".date('m')."��";
		                                          	$mem_period = " where wdate > '".date('Y-m')."-01 00:00:00'";
		                                          	$order_period = " where order_date > '".date('Y-m')."-01 00:00:00'";
		                                          	
		                                       	}else if($period == "YEAR"){
		                                       		
		                                       		$period_name = date('Y')."��";
		                                          	$mem_period = " where wdate > '".date('Y')."-01-01 00:00:00'";
		                                          	$order_period = " where order_date > '".date('Y')."-01-01 00:00:00'";
		                                          	
		                                       	}
		                                       	
		                                          $sql = "select count(id) as mem_cnt from wiz_member $mem_period";
		                                          $result = mysql_query($sql) or error(mysql_error());
		                                          $row = mysql_fetch_object($result);
		                                          $mem_cnt = $row->mem_cnt;
		                                          
		                                          $sql = "select status, count(orderid) as order_cnt, sum(total_price) as order_price from wiz_order $order_period group by status";
		                                          $result = mysql_query($sql) or error(mysql_error());
		                                          while($row = mysql_fetch_object($result)){
		                                          	
		                                          	// �ֹ��Ϸ�
		                                          	if($row->status == "DC" || $row->status == "CC"){
		                                          		$order_com = $row->order_cnt;
		                                          		$order_price = $row->order_price;
		                                          	}
		                                          	
		                                          	// �̰�����
		                                          	if($row->status == "OR"){
		                                          		$order_acc = $row->order_cnt;
		                                          	}
		                                          	
		                                          	// �̹�۰�
		                                          	if($row->status == "OY"){
		                                          		$order_del = $row->order_cnt;
		                                          	}
		                                          }
		                                          
		                                          if($order_com == "") $order_com = "0";
		                                          if($order_acc == "") $order_acc = "0";
		                                          if($order_del == "") $order_del = "0";
		                                          ?>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr>
		                                              <td height="30" bgcolor="F0F0F0"> 
		                                                <div align="center"><strong><?=$period_name?></strong></div></td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr>
		                                              <td width="50" height="30"><img src="../image/icon_01.gif" width="50" height="24"></td>
		                                              <td width="253">�ֹ���</td>
		                                              <td width="253" align="right"><font color="158DEA"><?=$order_com?>��</font> &nbsp;</td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td background="../image/dotline.gif"></td>
		                                            </tr>
		                                          </table> 
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td width="50" height="30"><img src="../image/icon_02.gif" width="50" height="16"></td>
		                                              <td width="253">�ݾ� </td>
		                                              <td width="253" align="right"><font color="158DEA"><?=number_format($order_price)?>��</font> &nbsp;</td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td background="../image/dotline.gif"></td>
		                                            </tr>
		                                          </table> 
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td width="50" height="30"><img src="../image/icon_03.gif" width="50" height="20"></td>
		                                              <td width="253">�̰�����</td>
		                                              <td width="253" align="right"><font color="158DEA"><?=$order_acc?>��</font> &nbsp;</td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td background="../image/dotline.gif"></td>
		                                            </tr>
		                                          </table> 
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td width="50" height="30"><img src="../image/icon_04.gif" width="50" height="20"></td>
		                                              <td width="253">�̹�۰�</td>
		                                              <td width="253" align="right"><font color="158DEA"><?=$order_del?>��</font> &nbsp;</td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td background="../image/dotline.gif"></td>
		                                            </tr>
		                                          </table> 
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td width="50" height="30"><img src="../image/icon_05.gif" width="50" height="23"></td>
		                                              <td width="253">����ȸ�� </td>
		                                              <td width="253" align="right"><font color="158DEA"><?=$mem_cnt?>��</font> &nbsp;</td>
		                                            </tr>
		                                          </table>
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr> 
		                                              <td background="../image/dotline.gif"></td>
		                                            </tr>
		                                          </table> 
		                                          <table width="420" border="0" cellspacing="0" cellpadding="0">
		                                            <tr>
		                                              <td>&nbsp;</td>
		                                            </tr>
		                                          </table>
                                          
                                          
                                              </td>
                                              <td valign="top" align="right">
                                              
                                              
                                                <!--     ��� �ҽ�     -->
                                                <table width="280" height="3" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td></td>
                                                  </tr>
                                                </table>
                                                <table width="280" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="230" height="22">&nbsp;&nbsp;&nbsp;<strong>��</strong>/<strong>��</strong>/<strong>��</strong>/<strong>��</strong>/<strong>�� </strong></td>
                                                    <td width="46"><a href="http://www.wizshop.net/support/notice/list.php" target="_blank"><img src="../image/bt_more.gif" width="45" height="15" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="280" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="E4E4E4"></td>
                                                  </tr>
                                                </table>
                                                <table width="280" height="7" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td></td></tr>
                                                </table>
                                                
                                                <iframe width="280" height="90" frameborder="0" src="http://www.wizshop.net/contin/plus/notice_list.php"></iframe>
                                                
                                                <table width="280" height="6" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td></td>
                                                  </tr>
                                                </table>
                                                <!--     ��� �ҽ�     -->
                                                
                                                
                                                <!--     �����     -->
                                                <table width="280" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="230" height="22">&nbsp;&nbsp;&nbsp;<strong>��</strong>/<strong>��</strong>/<strong>��</strong>/<strong>�� </strong></td>
                                                    <td width="46"><a href="http://www.wizshop.net/support/qna/list.php" target="_blank"><img src="../image/bt_more.gif" width="45" height="15" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="280" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="E4E4E4"></td>
                                                  </tr>
                                                </table>
                                                <table width="280" height="7" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td></td></tr>
                                                </table>
                                                
                                                <iframe width="280" height="66" frameborder="0" src="http://www.wizshop.net/contin/plus/qna_list.php"></iframe>
                                                
                                                <table width="280" height="10" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td></td>
                                                  </tr>
                                                </table>
                                                <!--     �����     -->
                                              </td>
                                            </tr>
                                          </table>
                                          
                                          <table width="710" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="350" valign="top">
                                                
                                                <!--     �ű԰Խù�     -->
                                                <table width="350" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="300" height="22"><strong>&nbsp;&nbsp;&nbsp;�ű԰Խù� </strong></td>
                                                    <td width="46"><a href="../bbs/bbs_list.php?code=notice"><img src="../image/bt_more.gif" width="45" height="15" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="350" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="E4E4E4"></td>
                                                  </tr>
                                                </table>
                                                <table width="350" height="7" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td></td></tr>
                                                </table>
                                                <?
                                                $sql = "select wb.idx,wb.code,wb.subject,wb.wdate,wp.title from wiz_bbs wb, wiz_bbsinfo wp where wb.code = wp.code order by wb.wdate desc limit 8";
                                                $result = mysql_query($sql) or error(mysql_error());
                                                while($row = mysql_fetch_object($result)){
                                                	if($row->wdate >= date('Y-m-d')) $new_icon = "<img src='../image/icon_new.gif'>";
                                                	else $new_icon = "";
                                                ?>
                                                <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr> 
                                                    <td width="350" height="22">
                                                      <font color="F5840B">[<?=$row->title?>]</font>
                                                      &nbsp; - <a href="../bbs/bbs_view.php?code=<?=$row->code?>&idx=<?=$row->idx?>" class="1"><?=cut_str($row->subject,35)?></a> <?=$new_icon?>
                                                    </td>
                                                  </tr>
                                                </table>
                                                <?
                                             	}
                                             	?>
                                                <table width="350" height="10" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td width="350"></td>
                                                  </tr>
                                                </table>
                                                <!--     �ű԰Խù�     -->
                                                
                                              </td>
                                              <td width="10"></td>
                                              <td width="350" valign="top">
                                              
                                                <!--     ��Ÿ�Խù�(1:1���,��ǰ��)     -->
                                                <table width="350" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="300" height="22"><strong>&nbsp;&nbsp;&nbsp;1:1 ��㹮�� </strong></td>
                                                    <td width="46"><a href="../member/member_qna.php"><img src="../image/bt_more.gif" width="45" height="15" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="350" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="E4E4E4"></td>
                                                  </tr>
                                                </table>
                                                <table width="350" height="7" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td></td></tr>
                                                </table>
                                                <?
                                                $sql = "select idx,subject,wdate from wiz_consult order by idx desc limit 3";
                                                $result = mysql_query($sql) or error(mysql_error());
                                                while($row = mysql_fetch_object($result)){
                                                	if($row->wdate >= date('Y-m-d')) $new_icon = "<img src='../image/icon_new.gif'>";
                                                	else $new_icon = "";
                                                ?>
                                                <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr> 
                                                    <td width="300" height="22"><img src="../image/icon_dot.gif"> <a href="../member/member_qna_input.php?idx=<?=$row->idx?>" class="1"><?=cut_str($row->subject,35)?></a> <?=$new_icon?></td>
                                                    <td width="50"><font color="F5840B">[<?=substr($row->wdate,-5)?>]</font></td>
                                                  </tr>
                                                </table>
                                                <?
                                             	}
                                             	?>
                                             	<table width="350" height="12" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td></td></tr>
                                                </table>
                                             	<table width="350" border="0" cellspacing="0" cellpadding="0">
                                                  <tr> 
                                                    <td width="300" height="22"><strong>&nbsp;&nbsp;&nbsp;��ǰ�� </strong></td>
                                                    <td width="46"><a href="../product/prd_estimate.php"><img src="../image/bt_more.gif" width="45" height="15" border="0"></a></td>
                                                  </tr>
                                                </table>
                                                <table width="350" height="1" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td bgcolor="E4E4E4"></td>
                                                  </tr>
                                                </table>
                                                <table width="350" height="7" border="0" cellpadding="0" cellspacing="0">
                                                  <tr><td></td></tr>
                                                </table>
                                             	<?
                                                //$sql = "select idx,content,wdate from wiz_estimate order by idx desc limit 3";
                                                //$result = mysql_query($sql) or error(mysql_error());
                                                while($row = mysql_fetch_object($result)){
                                                	if($row->wdate >= date('Y-m-d')) $new_icon = "<img src='../image/icon_new.gif'>";
                                                	else $new_icon = "";
                                                ?>
                                                <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr> 
                                                    <td width="300" height="22"><img src="../image/icon_dot.gif"> <a href="../product/prd_estimate.php" class="1"><?=cut_str($row->content,35)?></a> <?=$new_icon?></td>
                                                    <td width="50"><font color="F5840B">[<?=substr($row->wdate,5,5)?>]</font></td>
                                                  </tr>
                                                </table>
                                                <?
                                             	}
                                             	?>
                                                <table width="350" height="10" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td width="350"></td>
                                                  </tr>
                                                </table>
                                                <!--     ��Ÿ�Խù�     -->

                                              </td>
                                            </tr>
                                          </table>
                                          <br>
                                          
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        
                        
                        

<? include "../inc/footer.inc"; ?>