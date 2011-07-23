<?

$ordmail = "
       <table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
			<tr><td>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td style='padding:0 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/sett_t01.gif></td>
						<td></td></tr>
					</table>
			</td></tr>
			<tr><td>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr align=center>
						<td background=http://$HTTP_HOST/images/form_bar_bg1.gif height=39 width=138>이미지</td>
						<td background=http://$HTTP_HOST/images/form_bar_bg1.gif align=center>구매상품정보</td>
						<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=100>제품가격</td>
						<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=80>적립금</td>
						<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=80>구매수량</td>
					</tr>
";

      $sql = "select * from wiz_basket where basketid = '$order_info->basketid'";
	   $result = mysql_query($sql) or error(mysql_error());
	   $prd_num = mysql_num_rows($result);
	   
		$no = 0;
	   while($row = mysql_fetch_object($result)){
	   	
	   	$prd_price += ($row->prdprice * $row->amount);
	   	if($row->prdimg == "") $row->prdimg = "http://$HTTP_HOST/images/noimage.gif";
	   	else $row->prdimg = "http://$HTTP_HOST/prdimg/".$row->prdimg;
			
			$optcode = "";
			if($row->opttitle != '') $optcode = "$row->opttitle : $row->optcode / ";
			if($row->opttitle2 != '') $optcode .= "$row->opttitle2 : $row->optcode2 / ";
			if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $row->optcode3 / ";
							
$ordmail .= "
               <tr>
						<td style=padding:10 align=center><a href='http://$HTTP_HOST/shop/prd_view.php?prdcode=$row->prdcode' target='prdview'><img src='$row->prdimg' border='0' width='50' height='50'></a></td>
						<td><a href='http://$HTTP_HOST/shop/prd_view.php?prdcode=$row->prdcode' target='prdview'>$row->prdname</a><br>$optcode</td>
						<td class=price align=center>".number_format($row->prdprice)."원</td>
						<td align=center><b>".number_format($row->prdreserve*$row->amount)."원</b></td>
						<td align=center><b>".$row->amount."</b></td>
					</tr>";
		
			$no++;
		}

$ordmail .= "
         <tr><td colspan=5 height=2 bgcolor=#E5E5E5></td></tr>
					<tr><td height=38 background=http://$HTTP_HOST/images/form_bar_bg2.gif align=center colspan=5>
							<b>총결제금액 </b>:  상품(<b>".number_format($order_info->prd_price)."원)</b>  + 배송비(<b>".number_format($order_info->deliver_price)."원</b>) - 포인트사용(<b>".number_format($order_info->reserve_use)."원</b>) = <span class=price>".number_format($order_info->total_price)."원</span>
						
					</td></tr>
					</table>
			</td></tr>
			<tr><td><br></td></tr>
			<tr><td>
			      <table border=0 cellpadding=5 cellspacing=0 width=100%>
					<tr>
					  <td width=50%><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문번호 : $order_info->orderid</td>
					  <td width=50%><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문일 : $order_info->order_date</td>
					</tr>
					<tr>
					  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>운송장번호 : $order_info->deliver_num</td>
					  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>결제방법 : ".pay_method($order_info->pay_method)."</td>
					</tr>
					<tr>
					  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>입금계좌 : $order_info->account</td>
					  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>입금자명 : $order_info->account_name</td>
					</tr>
					</table>
			</td></tr>
			<tr><td>
				<table border=0 cellpadding=5 cellspacing=0 width=100%>
				<tr><td>
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr><td style='padding:10 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/order_title02.gif></td></tr>
							<tr><td height=3 bgcolor=#999999></td></tr>
							<tr><td height=1 bgcolor=#dadada></td></tr>
							<tr><td height=5></td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문하시는 분 : $order_info->send_name</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>전화번호 : $order_info->send_tphone</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>휴대전화번호 : $order_info->send_hphone</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>이메일 : $order_info->send_email</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주소 : [$order_info->send_post] $order_info->send_address</td></tr>
							</table>
					</td>
			   </tr>
			   </table>
				   
			</td></tr>
			<tr><td>
			   <table border=0 cellpadding=5 cellspacing=0 width=100%>
					<td valign=top>
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr><td style='padding:10 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/order_title03.gif></td></tr>
							<tr><td height=3 bgcolor=#999999></td></tr>
							<tr><td height=1 bgcolor=#dadada></td></tr>
							<tr><td height=5></td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>받으시는 분 : $order_info->rece_name</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>전화번호 : $order_info->rece_tphone</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>휴대전화번호 : $order_info->rece_hphone</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주소 : [$order_info->rece_post] $order_info->rece_address</td></tr>
							</table>
					</td></tr>
					</table>
						
					 </td>
				</tr>
			</table>
";

?>