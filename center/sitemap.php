<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$now_position = "<a href=/>Home</a> &gt; ������ &gt; <b>����Ʈ��</b>";
$page_type = "sitemap";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

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
											<a href="/member/login.php">�α���</a> / 
											<a href="/member/join.php">ȸ������</a> / 
											<a href="/member/join.php">�̿���</a> / 
											<a href="/member/id_search.php">���̵�,��й�ȣã��</a> / <br>
											<a href="/member/my_shop.php">���̼�</a> / 
											<a href="/member/my_order.php">�ֹ�/�����ȸ</a> / 
											<a href="/member/my_reserve.php">�����ݳ���</a> / 
											<a href="/member/my_qna.php">1:1 Q&A</a> / 
											<a href="/member/my_wish.php">���ǰ��ɻ�ǰ</a> / 
											<a href="/member/my_info.php">ȸ����������</a> / 
											<a href="/member/my_passwd.php">��й�ȣ����</a> / 
											<a href="/member/my_out.php">ȸ��Ż��</a> / 
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
											<a href="/shop/prd_basket.php">��ٱ���</a> / 
											<a href="/shop/order_list.php">�ֹ������ȸ</a> / 
											<a href="/shop/prd_search.php">�󼼰˻�</a> / 
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
											<a href="/center/center.php">������</a> / 
											<a href="/center/privacy.php">����������ȣ��å</a> / 
											<a href="/bbs/list.php?code=notice">��������</a> / 
											<a href="/center/faq.php">�����ϴ� ����</a> / 
											<a href="/center/guide.php">�̿�ȳ�</a> / 
											<a href="/bbs/list.php?code=qna">�������亯</a> / 
											<a href="/member/my_shop.php">���̼���</a> /   
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

include "../inc/footer.inc"; 		// �ϴܵ�����

?>