<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/login_check.inc";	// �α��� üũ
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; <b>�����ݳ���</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ
include "../inc/mem_info.inc"; 		// ȸ�� ����

?>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_o_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
					<? include "my_view.inc"; ?>
					<?
					// ���������ݾ�
					$sql = "select sum(reserve_price) as pre_reserve from wiz_order where send_id = '$wiz_session[id]' and status != '' and status != 'SY' and status != 'CY'";
					$result = mysql_query($sql) or error(mysql_error());
					$row = mysql_fetch_object($result);
               $pre_reserve = $row->pre_reserve;
					?>
					</td></tr>

					<!--�����ݳ���-->
					<tr>
					  <td style="padding:20 0 0 5">
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr><td><img src="/images/myshop_m03_01.gif"></td>
								<td align=right>
									<img src="/images/myshop_m03_02.gif" align=absmiddle><b> <?=number_format($total_reserve)?>�� </b>&nbsp;&nbsp;&nbsp;
									<img src="/images/myshop_m03_03.gif" align=absmiddle><b> <?=number_format($pre_reserve)?>��</b>&nbsp;&nbsp;</td></tr>
							</table>
						</td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td colspan=7 bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td background="/images/shop_nomal_bar.gif" align=center width=150 class="gray">��������</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center width=300 class="gray">��������</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center width=100 class="gray">�ֹ���ȣ</td>								
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">�ݾ�</td>
							</tr>
							<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
							<?
							$sql = "select * from wiz_reserve where memid = '$wiz_session[id]' order by wdate desc";
		               $result = mysql_query($sql) or error(mysql_error());
		               $total = mysql_num_rows($result);
			            
			            $rows = 12;
			            $lists = 5;
			            $page_count = ceil($total/$rows);
			            if(!$page || $page > $page_count) $page = 1;
			            $start = ($page-1)*$rows;
			            if($start>1) mysql_data_seek($result,$start);
			            
			            while(($row = mysql_fetch_object($result)) && $rows){
			            ?>
							<tr align=center height=28>
								<td><?=$row->wdate?></td>
								<td></td>
								<td align=left>��<?=$row->reservemsg?></td>
								<td></td>
								<td><a href="javascript:orderView('<?=$row->orderid?>');"><?=$row->orderid?></a></td>
								<td></td>
								<td><?=number_format($row->reserve)?>��</td></tr>
							<tr><td colspan=7 bgcolor=#dddddd height=1></td></tr>
							<?
			               $rows--;
			            }
			            
			            if($total <= 0){
			            ?>
							<tr><td colspan=7 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> ���� �����ݳ����� �����ϴ�.</td></tr>
							<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
							<tr><td colspan=7 bgcolor=#dddddd height=1></td></tr>
							<?
							}
							?>
							</table>
					</td></tr>
					<tr>
					  <td align=center height=50>
						
					  <? print_pagelist($page, $lists, $page_count, ""); ?>
					  
					  </td>
					</tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>