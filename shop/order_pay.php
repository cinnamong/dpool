<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����

$now_position = "<a href=/>Home</a> &gt; �ֹ��ϱ� &gt; <b>�����ϱ�</b>";
$page_type = "orderform";
include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					  <tr>
					    <td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=686>
							  <tr>
							    <td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t01.gif"></td>
										<td align=right>
												<table border=0 cellpadding=0 cellspacing=0>
												<tr><td><img src="/images/cart_dir_01.gif"></td>
													<td><img src="/images/cart_dir_02.gif"></td>
													<td><img src="/images/cart_dir_o_03.gif"></td>
													<td><img src="/images/cart_dir_04.gif"></td></tr>
												</table>
										</td></tr>
									</table>
							    </td>
							  </tr>
							</table>
							
							<? include "prd_baklist.inc"; ?>
							
							<?
							
							if($pay_method == "PB") include "pay_account.inc";
							else if($pay_method == "PC") include "pay_credit.inc";
							
							?>

					    </td>
					  </tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>