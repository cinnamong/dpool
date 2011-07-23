                   <script language="javascript">
                   <!--
                     function inputCheck(frm){
                     	if(frm.account.value == ""){
                     		alert("계좌번호를 선택하세요.");
                     		return false;
                     	}
                     	if(frm.account_name.value == ""){
                     		alert("입금자명 입력하세요.");
                     		return false;
                     	}
                     }
                   -->
                   </script>
                   <table border=0 cellpadding=0 cellspacing=0 width=686>
                   <form action="order_update.php" method="post" onSubmit="return inputCheck(this);">
                   <input type="hidden" name="orderid" value="<?=$orderid?>">
                   <input type="hidden" name="pay_method" value="<?=$pay_method?>">
							<tr>
							  <td style="padding:15 0 20 0">
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t02.gif"></td></tr>
									<tr><td height=3 bgcolor=#999999></td></tr>
									<tr><td bgcolor=#F9F9F9 style="padding:10">
									
										<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										  <tr>
										    <td style="padding:5">
													<table border=0 cellpadding=0 cellspacing=0>
													  <tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>입금 계좌번호</td>
														<td>: 
															<select name="account">
															<?
															$pay_account = explode("\n", $oper_info->pay_account);
															for($ii=0; $ii < count($pay_account); $ii++){
															if(!empty($pay_account[$ii]))
															echo "<option value='$pay_account[$ii]'>$pay_account[$ii]";
															}
															?>
															</select>
														</td></tr>
													  <tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>입금자명</td>
														<td>: <input type=text name="account_name" value="<?=$wiz_session[name]?>" size=25 class="input"></td>
													  </tr>
													</table>
										</td></tr>
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