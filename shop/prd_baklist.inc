                  <script language="JavaScript" src="/js/util_lib.js"></script>
						<script language="javascript">
						<!--
						
						// ���� ����
						function incAmount(idx){
							
							var ii = 0;
							for(ii=0; document.forms[ii].amount == null; ii++){}
							idx = eval(idx) + eval(ii);

							var amount = document.forms[idx].amount.value;
							document.forms[idx].amount.value = ++amount;
							
						}
						
						// ���� ����
						function decAmount(idx){
							
							var ii = 0;
							for(ii=0; document.forms[ii].amount == null; ii++){}
							idx = eval(idx) + eval(ii);
							
						   var amount = document.forms[idx].amount.value;
							if(amount > 1)
								document.forms[idx].amount.value = --amount;
							
						}
						
						// ����üũ
						function checkAmount(frm){
							
							var amount = frm.amount.value;
						   if(!Check_Num(amount)){
						   	frm.amount.value = "1";
							}
							
						}
						
						// ���ø���Ʈ �߰�
						function addWish(prdcode){
						<?
                  if(empty($wiz_session[id])){
                    echo "alert('�α����� �ʿ��մϴ�.\\n\\nȸ�������� ���� ������ ���� ������ �̿��Ͻñ� �ٶ��ϴ�.');";
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
										<td background="/images/form_bar_bg1.gif" height=39 width=80>�̹���</td>
										<td background="/images/form_bar_bg1.gif" width=236>���Ż�ǰ����</td>
										<td background="/images/form_bar_bg1.gif" width=90>��ǰ����</td>
										<td background="/images/form_bar_bg1.gif" width=80>�� ��</td>
										<td background="/images/form_bar_bg1.gif" width=70>����Ʈ</td>
										<td background="/images/form_bar_bg1.gif" width=70>��ǰ������</td>
										<td background="/images/form_bar_bg1.gif" width=60>����</td>
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
										<td class="price" align=center><?=number_format($basket_list[$ii][prdprice])?>��</td>
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
										<td align=center><?=number_format($basket_list[$ii][prdreserve]*$basket_list[$ii][amount])?>��</td>
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
										echo "<tr><td colspan=7 height=30 align=center>��ٱ��ϰ� ����ֽ��ϴ�.</td></tr>";
										echo "<tr><td colspan=7 height=1 bgcolor=#E5E5E5></td></tr>";
									}
									
									// ��ۺ�
	                     	if($oper_info->del_method == "DA"){ // ��ۺ� ���׹���
	                     		
	                     		$deliver_price = 0;
	                     		$deliver_msg = "��ۺ� ���׹���";
	                     		
	                        }else if($oper_info->del_method == "DB"){ // �����ںδ� (����)
	                        	
	                     		$deliver_price = 0;
	                     		$deliver_msg = "�����ںδ� (����)";
	                     		
	                        }else if($oper_info->del_method == "DC"){ // ������
	                        	
	                     		$deliver_price = $oper_info->del_fixprice;
	                     		$deliver_msg = "���� ".number_format($oper_info->del_fixprice)."��";
	                     		
	                        }else if($oper_info->del_method == "DD"){ // ���Ű��ݺ�
	                        	
	                        	if($oper_info->del_staprice < $prd_price){
	                        		
	                        		$deliver_price = $oper_info->del_staprice2;
	                        		
										}else{
										
											$deliver_price = $oper_info->del_staprice3;
											
										}
										
										$deliver_msg = number_format($oper_info->del_staprice)."�� �̻� ���Ž� ";
										
										if($oper_info->del_staprice2 == 0) $deliver_msg .= "����";
	                        	else $oper_info->del_staprice2 = $deliver_msg .= number_format($oper_info->del_staprice2)."��";
	                        	
	                     	}
									
									if($prd_num <= 0) $deliver_price = 0;
									
	                     	// ��ü�����ݾ�
	                     	$total_price = $prd_price + $deliver_price;
	                     	
									?>
									</table>
							    </td>
							  </tr>
							  <tr>
							    <td height=38 background="/images/form_bar_bg2.gif">
							    &nbsp;[��ۺ� �ȳ� : <?=$deliver_msg?>] &nbsp; &nbsp; 
								 <b>�Ѱ����ݾ� </b>:  ��ǰ(<b><?=number_format($prd_price)?>��</b>)  + ��ۺ�(<b><?=number_format($deliver_price)?>��</b>) = <span class="price"><?=number_format($total_price)?>��</span>
							    </td>
							  </tr>
							</table>
							<script language="JavaScript">
                     <!--
                     function goOrder(){
                     <?
                     if(!$basket_exist) echo "alert('�ֹ��� ��ǰ�� �����ϴ�.');";
                     else echo "document.location='order_form.php';";
                     ?>
                     }
                     -->
                     </script>