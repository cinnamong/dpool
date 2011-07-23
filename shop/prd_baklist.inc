                  <script language="JavaScript" src="/js/util_lib.js"></script>
						<script language="javascript">
						<!--
						
						// 수량 증가
						function incAmount(idx){
							
							var ii = 0;
							for(ii=0; document.forms[ii].amount == null; ii++){}
							idx = eval(idx) + eval(ii);

							var amount = document.forms[idx].amount.value;
							document.forms[idx].amount.value = ++amount;
							
						}
						
						// 수량 감소
						function decAmount(idx){
							
							var ii = 0;
							for(ii=0; document.forms[ii].amount == null; ii++){}
							idx = eval(idx) + eval(ii);
							
						   var amount = document.forms[idx].amount.value;
							if(amount > 1)
								document.forms[idx].amount.value = --amount;
							
						}
						
						// 수량체크
						function checkAmount(frm){
							
							var amount = frm.amount.value;
						   if(!Check_Num(amount)){
						   	frm.amount.value = "1";
							}
							
						}
						
						// 위시리스트 추가
						function addWish(prdcode){
						<?
                  if(empty($wiz_session[id])){
                    echo "alert('로그인이 필요합니다.\\n\\n회원가입을 하지 않으신 분은 가입후 이용하시기 바랍니다.');";
                  }else{
                    echo "document.location = '/member/my_save.php?mode=my_wish&prdcode='+prdcode;";
                  }
                  ?>
                  }
						-->
						</script>
					      <table border=0 cellpadding=0 cellspacing=0 width=686>
							  <tr>
							    <td>
								 <table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr align=center>
										<td background="/images/form_bar_bg1.gif" height=39 width=80>이미지</td>
										<td background="/images/form_bar_bg1.gif" width=236>구매상품정보</td>
										<td background="/images/form_bar_bg1.gif" width=90>제품가격</td>
										<td background="/images/form_bar_bg1.gif" width=80>수 량</td>
										<td background="/images/form_bar_bg1.gif" width=70>포인트</td>
										<td background="/images/form_bar_bg1.gif" width=70>상품보관함</td>
										<td background="/images/form_bar_bg1.gif" width=60>삭제</td>
									</tr>
									<?
									
									$basket_list = $HTTP_SESSION_VARS["basket_list"];
									$basket_cnt = count($basket_list);
									$basket_exist = false;
									
									$no = 0;
								   for($ii = 0; $ii < $basket_cnt; $ii++){
								   	
								   	if($basket_list[$ii] != null){
								   		$basket_exist = true;
									   	$optcode = ""; $prdimg = "";
									   	$prd_price += ($basket_list[$ii][prdprice] * $basket_list[$ii][amount]);
									   	
									   	if($basket_list[$ii][prdimg] == "") $prdimg = "/images/noimage.gif";
									   	else $prdimg = "/prdimg/".$basket_list[$ii][prdimg];
	
											if($basket_list[$ii][opttitle] != '') $optcode = $basket_list[$ii][opttitle]." : ".$basket_list[$ii][optcode]." / ";
											if($basket_list[$ii][opttitle2] != '') $optcode .= $basket_list[$ii][opttitle2]." : ".$basket_list[$ii][optcode2]." / ";
											if($basket_list[$ii][opttitle3] != '') $optcode .= $basket_list[$ii][opttitle3]." : ".$basket_list[$ii][optcode3]." / ";
										
									?>
									<form action="prd_save.php" method="post">
									<input type="hidden" name="mode" value="update">
									<input type="hidden" name="idx" value="<?=$ii?>">
									<input type="hidden" name="prdcode" value="<?=$basket_list[$ii][prdcode]?>">
									<input type="hidden" name="optcode" value="<?=$basket_list[$ii][optcode]?>">
									<tr>
										<td style="padding:10" align=center><a href="/shop/prd_view.php?prdcode=<?=$basket_list[$ii][prdcode]?>" target="prdview"><img src="<?=$prdimg?>" width="50" height="50" border="0"></a></td>
										<td><a href="/shop/prd_view.php?prdcode=<?=$basket_list[$ii][prdcode]?>" target="prdview"><?=$basket_list[$ii][prdname]?></a><br><?=$optcode?></td>
										<td class="price" align=center><?=number_format($basket_list[$ii][prdprice])?>원</td>
										<td align=center>
										  <table border=0 cellpadding=0 cellspacing=0>
										  <tr>
										    <td valign=top>
												<table border=0 cellpadding=0 cellspacing=0>
												<tr>
												  <td rowspan=3><input type=text name="amount" value="<?=$basket_list[$ii][amount]?>" onChange="checkAmount(this.form);" size=2 class="input">&nbsp;</td>
												  <td><a href="javascript:incAmount('<?=$no?>');"><img src="/images/but_vol_up.gif" border=0></a></td>
												</tr>
												<tr>
												  <td><a href="javascript:decAmount('<?=$no?>');"><img src="/images/but_vol_down.gif" border=0></a></td>
												</tr>
												</table>
										    </td>
										    <td>&nbsp;<input type="image" src="/images/but_modify.gif"></td>
										  </tr>
										  </table>
										</td>
										<td align=center><?=number_format($basket_list[$ii][prdreserve]*$basket_list[$ii][amount])?>원</td>
										<td align=center><a href="javascript:addWish('<?=$basket_list[$ii][prdcode]?>')"><img src="/images/but_cart_custody.gif" border=0></a></td>
										<td align=center><a href="prd_save.php?mode=delete&idx=<?=$ii?>"><img src="/images/but_cart_del.gif" border=0></a></td>
									</tr>
									<tr><td colspan=7 height=2 bgcolor=#E5E5E5></td></tr>
									</form>
									<?
											$no++;
										}
									}
									
									if(!$basket_exist){
										echo "<tr><td colspan=7 height=30 align=center>장바구니가 비어있습니다.</td></tr>";
										echo "<tr><td colspan=7 height=1 bgcolor=#E5E5E5></td></tr>";
									}
									
									// 배송비
	                     	if($oper_info->del_method == "DA"){ // 배송비 전액무료
	                     		
	                     		$deliver_price = 0;
	                     		$deliver_msg = "배송비 전액무료";
	                     		
	                        }else if($oper_info->del_method == "DB"){ // 수신자부담 (착불)
	                        	
	                     		$deliver_price = 0;
	                     		$deliver_msg = "수신자부담 (착불)";
	                     		
	                        }else if($oper_info->del_method == "DC"){ // 고정값
	                        	
	                     		$deliver_price = $oper_info->del_fixprice;
	                     		$deliver_msg = "고정 ".number_format($oper_info->del_fixprice)."원";
	                     		
	                        }else if($oper_info->del_method == "DD"){ // 구매가격별
	                        	
	                        	if($oper_info->del_staprice < $prd_price){
	                        		
	                        		$deliver_price = $oper_info->del_staprice2;
	                        		
										}else{
										
											$deliver_price = $oper_info->del_staprice3;
											
										}
										
										$deliver_msg = number_format($oper_info->del_staprice)."원 이상 구매시 ";
										
										if($oper_info->del_staprice2 == 0) $deliver_msg .= "무료";
	                        	else $oper_info->del_staprice2 = $deliver_msg .= number_format($oper_info->del_staprice2)."원";
	                        	
	                     	}
									
									if($prd_num <= 0) $deliver_price = 0;
									
	                     	// 전체결제금액
	                     	$total_price = $prd_price + $deliver_price;
	                     	
									?>
									</table>
							    </td>
							  </tr>
							  <tr>
							    <td height=38 background="/images/form_bar_bg2.gif">
							    &nbsp;[배송비 안내 : <?=$deliver_msg?>] &nbsp; &nbsp; 
								 <b>총결제금액 </b>:  상품(<b><?=number_format($prd_price)?>원</b>)  + 배송비(<b><?=number_format($deliver_price)?>원</b>) = <span class="price"><?=number_format($total_price)?>원</span>
							    </td>
							  </tr>
							</table>
							<script language="JavaScript">
                     <!--
                     function goOrder(){
                     <?
                     if(!$basket_exist) echo "alert('주문할 상품이 없습니다.');";
                     else echo "document.location='order_form.php';";
                     ?>
                     }
                     -->
                     </script>