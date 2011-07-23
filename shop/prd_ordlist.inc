					      <table border=0 cellpadding=0 cellspacing=0 width=686>
							  <tr>
							    <td>
								 <table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr align=center>
										<td background="/images/form_bar_bg1.gif" height=39 width=138>이미지</td>
										<td background="/images/form_bar_bg1.gif" width=138>구매상품정보</td>
										<td background="/images/form_bar_bg1.gif" width=100>제품가격</td>
										<td background="/images/form_bar_bg1.gif" width=80>수 량</td>
										<td background="/images/form_bar_bg1.gif" width=80>포인트</td>
									</tr>
									<?
	                        $sql = "select * from wiz_basket where basketid = '$order_info->basketid'";
								   $result = mysql_query($sql) or error(mysql_error());
								   $prd_num = mysql_num_rows($result);
								   
									$no = 0;
								   while($row = mysql_fetch_object($result)){
								   	
								   	$prd_price += ($row->prdprice * $row->amount);
								   	if($row->prdimg == "") $row->prdimg = "/images/noimage.gif";
								   	else $row->prdimg = "/prdimg/".$row->prdimg;
								   	
								   	$optcode = "";
										if($row->opttitle != '') $optcode = "$row->opttitle : $row->optcode / ";
										if($row->opttitle2 != '') $optcode .= "$row->opttitle2 : $row->optcode2 / ";
										if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $row->optcode3 / ";
										
									?>
									<tr>
										<td style="padding:10" align=center><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="prdview"><img src="<?=$row->prdimg?>" border="0" width="50" height="50"></a></td>
										<td><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="prdview"><?=$row->prdname?></a><br><?=$optcode?></td>
										<td class="price" align=center><?=number_format($row->prdprice)?>원</td>
										<td align=center><?=$row->amount?></td>
										<td align=center><?=number_format($row->prdreserve*$row->amount)?>원</td>
									</tr>
									<tr><td colspan=7 height=2 bgcolor=#E5E5E5></td></tr>
									<?
										$no++;
									}
									?>
									</table>
							    </td>
							  </tr>
							  <tr>
							    <td height=38 background="/images/form_bar_bg2.gif" align="right">
								 <b>총결제금액 </b>:  
								 상품(<b><?=number_format($order_info->prd_price)?>원</b>) 
								 + 배송비(<b><?=number_format($order_info->deliver_price)?>원</b>) 
								 - 적립금 사용(<b><?=number_format($order_info->reserve_use)?>원</b>)
								 = <span class="price"><?=number_format($order_info->total_price)?>원</span>
							    &nbsp; 
							    </td>
							  </tr>
							</table>
							<script language="JavaScript">
                     <!--
                     function goOrder(){
                     <?
                     if($prd_num <= 0) echo "alert('주문할 상품이 없습니다.');";
                     else echo "document.location='order_form.php';";
                     ?>
                     }
                     -->
                     </script>