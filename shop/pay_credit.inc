                     <!-- 신용카드 결제 폼 -->
							<script language="JavaScript">
							<!--
							function OpenWindow() {
							   var winopts = "width=550,height=450,toolbar=no,location=no,directories=no, status=yes,menubar=no, status=yes,menubar=no,scrollbars=no,resizable=yes";
							   var popWindow = window.open('','POPWIN', winopts);
							}
							
							function payProcess(){
						     OpenWindow();
							  document.sendForm.submit();
							}
							-->
							</script>
							<FORM name=sendForm  method=post target=POPWIN onSubmit="payProcess();" action="https://pay.kcp.co.kr/Pay/payplus.jsp">
							<input type=hidden name=site_cd value='<?=$oper_info->pay_id?>'>
							<input type=hidden name=pg_type value='PGNW'>
							<input type=hidden name=currency value='410'>
							<input type=hidden name=ordr_idxx value='<?=$order_info[orderid]?>'>
							<input type=hidden name=Ret_URL value='http://<?=$HTTP_HOST?>/shop/order_update.php' >
							<input type=hidden name=good_mny value='<?=$order_info[total_price]?>' >
							<input type=hidden name=good_name value='<?=$order_info[orderid]?>' >
							<input type=hidden name=buyr_name value='<?=$order_info[send_name]?>' >
							<input type=hidden name=buyr_tel2 value='<?=$order_info[send_tphone]?>'>
							<input type=hidden name=buyr_mail value='<?=$order_info[send_email]?>' >
							<input type=hidden name=site_logo value='http://www.kcp.co.kr/logo.gif'>
                     <table border=0 cellpadding=0 cellspacing=0 width=686>
							  <tr>
							    <td style="padding:15 0 20 0">
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t03.gif"></td></tr>
									<tr><td height=3 bgcolor=#999999></td></tr>
									<tr><td bgcolor=#F9F9F9 style="padding:10">
									
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										  <tr>
										    <td style="padding:5">
													<table border=0 cellpadding=0 cellspacing=0>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>결제수단</td>
														<td>: 신용카드 결제</td></tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>결제금액</td>
														<td>: <span class="price"><?=number_format($order_info[total_price])?>원</span></td></tr>
													</table>
										    </td>
										  </tr>
										</table>

									</td></tr>
									</table>
							    </td>
							  </tr>
							  <tr><td height=1 background="/images/dot.gif"></td></tr>
							  <tr><td height=80 align=center>
								<input type="image" src="/images/but_pay.gif" border=0></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="/"><img src="/images/but_cancel.gif" border=0></a>
							   </td>
							 </tr>
						  </form>
						  </table>