<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; 고객센터 &gt; <b>사이트맵</b>";
$page_type = "sitemap";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>

               <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align=center>
					  
					<table border=0 cellpadding=0 cellspacing=0 width=696>
					  <tr><td><img src="/images/sitemap_t_product.gif"></td></tr>
					  <tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td height=10 width=10 background="/images/round_box_01.gif"></td>
								<td background="/images/round_box_02.gif"></td>
								<td width=10 background="/images/round_box_03.gif"></td></tr>
							<tr><td background="/images/round_box_04.gif"></td>
								<td style="padding:3">
								      <table width="100%" border="0" cellspacing="0" cellpadding="0">
						              <?
						              $sql = "select * from wiz_category where depthno <= 2 order by priorno01 asc, catcode asc";
						              $result = mysql_query($sql) or error(mysql_error());
						              while($row = mysql_fetch_object($result)){
						               if($row->depthno == 1){
						                  echo "<tr><td class=gray height=30><img src=/images/sitemap_icon.gif align=absmiddle></td>";
						                  echo "<td width=150><a href=/shop/prd_list.php?catcode=$row->catcode><font color=#000000>$row->catname</font></a></td>";
						                  echo "<td width=550>";
						               }else{
						                  echo "<a href=/shop/prd_list.php?catcode=$row->catcode>$row->catname</a> <a href=#>|</a> ";
						               }
						              }
						              ?>
						            </table>
										

								</td>
								<td background="/images/round_box_05.gif"></td></tr>
							<tr><td height=10 background="/images/round_box_06.gif"></td>
								<td background="/images/round_box_07.gif"></td>
								<td background="/images/round_box_08.gif"></td></tr>
							</table>
					</td></tr>
					<!--membership-->
					<tr><td style="padding:5 0 0 0"><img src="/images/sitemap_t_membership.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td height=10 width=10 background="/images/round_box_01.gif"></td>
								<td background="/images/round_box_02.gif"></td>
								<td width=10 background="/images/round_box_03.gif"></td></tr>
							<tr><td background="/images/round_box_04.gif"></td>
								<td style="padding:3">
										<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr height=27><td class=gray>
											<a href="/member/login.php">로그인</a> / 
											<a href="/member/join.php">회원가입</a> / 
											<a href="/member/join.php">이용약관</a> / 
											<a href="/member/id_search.php">아이디,비밀번호찾기</a> / <br>
											<a href="/member/my_shop.php">마이샵</a> / 
											<a href="/member/my_order.php">주문/배송조회</a> / 
											<a href="/member/my_reserve.php">적립금내역</a> / 
											<a href="/member/my_qna.php">1:1 Q&A</a> / 
											<a href="/member/my_wish.php">나의관심상품</a> / 
											<a href="/member/my_info.php">회원정보수정</a> / 
											<a href="/member/my_passwd.php">비밀번호변경</a> / 
											<a href="/member/my_out.php">회원탈퇴</a> / 
										</td></tr>
										</table>
								</td>
								<td background="/images/round_box_05.gif"></td></tr>
							<tr><td height=10 background="/images/round_box_06.gif"></td>
								<td background="/images/round_box_07.gif"></td>
								<td background="/images/round_box_08.gif"></td></tr>
							</table>
					</td></tr>
					<!--service-->
					<tr><td style="padding:5 0 0 0"><img src="/images/sitemap_t_service.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td height=10 width=10 background="/images/round_box_01.gif"></td>
								<td background="/images/round_box_02.gif"></td>
								<td width=10 background="/images/round_box_03.gif"></td></tr>
							<tr><td background="/images/round_box_04.gif"></td>
								<td style="padding:3">
										<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr height=27><td class=gray>
											<a href="/shop/prd_basket.php">장바구니</a> / 
											<a href="/shop/order_list.php">주문배송조회</a> / 
											<a href="/shop/prd_search.php">상세검색</a> / 
										</td></tr>
										</table>
								</td>
								<td background="/images/round_box_05.gif"></td></tr>
							<tr><td height=10 background="/images/round_box_06.gif"></td>
								<td background="/images/round_box_07.gif"></td>
								<td background="/images/round_box_08.gif"></td></tr>
							</table>
					</td></tr>
					<!--customer center-->
					<tr><td style="padding:5 0 0 0"><img src="/images/sitemap_t_customer.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td height=10 width=10 background="/images/round_box_01.gif"></td>
								<td background="/images/round_box_02.gif"></td>
								<td width=10 background="/images/round_box_03.gif"></td></tr>
							<tr><td background="/images/round_box_04.gif"></td>
								<td style="padding:3">
										<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr height=27><td class=gray>
											<a href="/center/center.php">고객센터</a> / 
											<a href="/center/privacy.php">개인정보보호정책</a> / 
											<a href="/bbs/list.php?code=notice">공지사항</a> / 
											<a href="/center/faq.php">자주하는 질문</a> / 
											<a href="/center/guide.php">이용안내</a> / 
											<a href="/bbs/list.php?code=qna">질문과답변</a> / 
											<a href="/member/my_shop.php">마이쇼핑</a> /   
										</td></tr>
										</table>
								</td>
								<td background="/images/round_box_05.gif"></td></tr>
							<tr><td height=10 background="/images/round_box_06.gif"></td>
								<td background="/images/round_box_07.gif"></td>
								<td background="/images/round_box_08.gif"></td></tr>
							</table>
					</td></tr>
					<!--community-->
					<tr><td style="padding:5 0 0 0"><img src="/images/sitemap_t_community.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td height=10 width=10 background="/images/round_box_01.gif"></td>
								<td background="/images/round_box_02.gif"></td>
								<td width=10 background="/images/round_box_03.gif"></td></tr>
							<tr><td background="/images/round_box_04.gif"></td>
								<td style="padding:3">
										<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr height=27><td class=gray>
										<?
										$sql = "select * from wiz_bbsinfo";
										$result = mysql_query($sql) or error(mysql_error());
						            while($row = mysql_fetch_object($result)){
						            	echo "<a href='/bbs/list.php?code=$row->code'>$row->title</a> / ";
										}
										?>
										</td></tr>
										</table>
								</td>
								<td background="/images/round_box_05.gif"></td></tr>
							<tr><td height=10 background="/images/round_box_06.gif"></td>
								<td background="/images/round_box_07.gif"></td>
								<td background="/images/round_box_08.gif"></td></tr>
							</table>
					</td></tr>
					</table>
               
               </td></tr>
               </table>
<?

include "../inc/footer.inc"; 		// 하단디자인

?>