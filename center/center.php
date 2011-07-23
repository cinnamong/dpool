<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; <b>고객센터</b>";
$page_type = "center";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td><img src="/images/customer_top01.gif"></td>
								<td>
										<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr><td><img src="/images/customer_top02_01.gif"></td></tr>
										<tr><td><img src="/images/customer_top02_02.gif"></td></tr>
										<tr><td bgcolor=#EDF6E3 height=107>
										
												<!--고객센터입력 시작-->
												<?=$page_info->content?>
												<!--고객센터입력 끝-->

										</td></tr>
										<tr><td><img src="/images/customer_top02_03.gif"></td></tr>
										</table>
								</td>
								<td><img src="/images/customer_top03.gif"></td></tr>
							</table>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td>
										<table border=0 cellpadding=0 cellspacing=0>
										<tr><td colspan=2><img src="/images/customer_pic.gif"></td></tr>
										<tr><td colspan=2><a href="../member/my_shop.php"><img src="/images/customer_my.gif" border=0></a></td></tr>
										<tr><td><a href="../member/my_passwd.php"><img src="/images/customer_my_01.gif" border=0></a></td>
											<td><a href="../member/my_info.php"><img src="/images/customer_my_02.gif" border=0></a></td></tr>
										</table>
								</td><td width=35 background="/images/customer_line.gif"></td><td>
										
										<table border=0 cellpadding=0 cellspacing=0>
										<form action="faq.php" method="post">
										<tr><td><img src="/images/customer_faq.gif"></td></tr>
										<tr><td height=50 style="padding:0 0 0 20"><input size=40 type=text name="keyword" class="input">&nbsp;&nbsp;&nbsp;
										<input type="image" src="/images/but_search.gif" border=0 align=absmiddle></a></td></tr>
										</form>
										<tr><td></td></tr>
										<tr><td align=center height=25 valign=top>
												<table border=0 cellpadding=0 cellspacing=0 width=90%>
												<tr><td><a href="faq.php?category=주문/결제"><img src="/images/customer_faq_01.gif" border=0></a></td>
													<td><a href="faq.php?category=배송관련"><img src="/images/customer_faq_02.gif" border=0></a></td>
													<td><a href="faq.php?category=반품/취소"><img src="/images/customer_faq_03.gif" border=0></a></td>
													<td><a href="faq.php?category=회원정보"><img src="/images/customer_faq_04.gif" border=0></a></td>
													<td><a href="faq.php?category=기타관련"><img src="/images/customer_faq_05.gif" border=0></a></td></tr>
												</table>
										</td></tr>
										<tr><td><img src="/images/customer_r_line.gif"></td></tr>
										<tr><td><a href="../center/guide.php"><img src="/images/customer_guide.gif" border=0></a></td></tr>
										<tr><td><img src="/images/customer_r_line.gif"></td></tr>
										<tr><td><a href="/bbs/list.php?code=qna"><img src="/images/customer_qna.gif" border=0></a></td></tr>
										<tr><td><img src="/images/customer_r_line.gif"></td></tr>
										</table>

								</td></tr>
							</table>
					
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>