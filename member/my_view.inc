                     <?
                     // 총구매액
                     $sql = "select sum(total_price) as total_price from wiz_order where send_id = '$mem_info->id' and status = 'SY'";
                     $result = mysql_query($sql) or error(mysql_error());
							$row = mysql_fetch_object($result);
                     $total_price = $row->total_price;
                     
                     // 적립금
                     $sql = "select sum(reserve) as total_reserve from wiz_reserve where memid = '$mem_info->id'";
                     $result = mysql_query($sql) or error(mysql_error());
							$row = mysql_fetch_object($result);
                     $total_reserve = $row->total_reserve;
                     
                     ?>
                     <table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td height=10 width=10 background="/images/round_box_01.gif"></td>
								<td background="/images/round_box_02.gif"></td>
								<td width=10 background="/images/round_box_03.gif"></td></tr>
							<tr><td background="/images/round_box_04.gif"></td>
								<td align=center>
										<table border=0 cellpadding=0 cellspacing=0 width=95%>
										<tr><td width=25%><img src="/images/myshop_pic.gif"></td>
											<td>
													<table border=0 cellpadding=0 cellspacing=0 width=100%>
													<tr><td width=80 height=30><img src="/images/blue_icon.gif" align=absmiddle>아이디</td>
														<td> : <?=$mem_info->id?></td></tr>
													<tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
													<tr><td height=30><img src="/images/blue_icon.gif" align=absmiddle>총 구매액</td>
														<td> : <?=number_format($total_price)?>원 (배송완료기준) &nbsp;<a href="../member/my_info.php"><img src="/images/but_infomodify.gif" border=0 align=absmiddle></a></td></tr>
													<tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
													<tr><td height=30><img src="/images/blue_icon.gif" align=absmiddle>적립금</td>
														<td> : <?=number_format($total_reserve)?>원 &nbsp;<a href="../member/my_reserve.php"><img src="/images/but_pointlist.gif" border=0 align=absmiddle></a></td></tr>
													<tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
													<tr><td height=30><img src="/images/blue_icon.gif" align=absmiddle>최종방문일</td>
														<td> : <?=$mem_info->visit_time?></td></tr>
													<tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
													<tr><td height=30><img src="/images/blue_icon.gif" align=absmiddle>주&nbsp;&nbsp;소 : </td>
														<td> : <?=$mem_info->post?> <?=$mem_info->address?> <?=$mem_info->address2?></td></tr>
													</table>
											</td></tr>
										</table>
								</td>
								<td background="/images/round_box_05.gif"></td></tr>
							<tr><td height=10 background="/images/round_box_06.gif"></td>
								<td background="/images/round_box_07.gif"></td>
								<td background="/images/round_box_08.gif"></td></tr>
							</table>