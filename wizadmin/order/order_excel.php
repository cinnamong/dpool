<?
if($exceldown != "ok"){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: 주문정보 다운로드 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function selBasic(frm){
	
	frm.orderid.checked = true;
	frm.orderprd.checked = true;
	frm.total_price.checked = true;
	frm.pay_method.checked = true;
	frm.order_date.checked = true;
	frm.account.checked = true;
	frm.deliver_num.checked = false;
	frm.account_name.checked = false;
	frm.status.checked = false;
	
	frm.send_name.checked = true;
	frm.send_email.checked = false;
	frm.send_tphone.checked = true;
	frm.send_hphone.checked = false;
	frm.send_post.checked = false;
	frm.send_address.checked = false;
	
	frm.rece_name.checked = true;
	frm.rece_tphone.checked = true;
	frm.rece_hphone.checked = false;
	frm.rece_post.checked = true;
	frm.rece_address.checked = true;
	frm.demand.checked = false;

}

function selAll(frm){
	
	frm.orderid.checked = true;
	frm.orderprd.checked = true;
	frm.total_price.checked = true;
	frm.pay_method.checked = true;
	frm.order_date.checked = true;
	frm.account.checked = true;
	frm.deliver_num.checked = true;
	frm.account_name.checked = true;
	frm.status.checked = true;
	
	frm.send_name.checked = true;
	frm.send_email.checked = true;
	frm.send_tphone.checked = true;
	frm.send_hphone.checked = true;
	frm.send_post.checked = true;
	frm.send_address.checked = true;
	
	frm.rece_name.checked = true;
	frm.rece_tphone.checked = true;
	frm.rece_hphone.checked = true;
	frm.rece_post.checked = true;
	frm.rece_address.checked = true;
	frm.demand.checked = true;
	
}
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="5" topmargin="5">
	<table width="560" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
	<form name="frm" action="" method="post">
	<input type="hidden" name="exceldown" value="ok">

	<input type="hidden" name="status" value="<?=$status?>">
	<input type="hidden" name="prev_year" value="<?=$prev_year?>">
	<input type="hidden" name="prev_month" value="<?=$prev_month?>">
	<input type="hidden" name="prev_day" value="<?=$prev_day?>">
	<input type="hidden" name="next_year" value="<?=$next_year?>">
	<input type="hidden" name="next_month" value="<?=$next_month?>">
	<input type="hidden" name="next_day" value="<?=$next_day?>">
	<input type="hidden" name="searchopt" value="<?=$searchopt?>">
	<input type="hidden" name="searchkey" value="<?=$searchkey?>">
	
	  <tr>
	    <td bgcolor="ffffff">
	    <table><tr><td></td></tr></table>
       <table cellspacing="2" cellpadding="0" border="0">
         <tr>
	        <td><font color="2369C9"><b>선택구분</b></font></td>
	        <td><input type="radio" name="sel_gubun" onClick="selBasic(this.form);" checked><font color="red"><b>기본선택</b></font></td>
			  <td><input type="radio" name="sel_gubun" onClick="selAll(this.form);"><font color="red"><b>전체선택</b></font></td>
			  <td></td>
			  <td></td>
			</tr>
			<tr><td height="6"></td></tr>
	      <tr>
	        <td><font color="2369C9"><b>주문정보</b></font></td>
	        <td><input type="checkbox" name="orderid" value="Y" checked>주문번호</td>
			  <td><input type="checkbox" name="orderprd" value="Y" checked>주문상품</td>
			  <td><input type="checkbox" name="total_price" value="Y" checked>총결제금액</td>
			  <td><input type="checkbox" name="pay_method" value="Y" checked>결제방법</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="order_date" value="Y" checked>주문일자</td>
			  <td><input type="checkbox" name="account" value="Y" checked>결제계좌</td>
			  <td><input type="checkbox" name="deliver_num" value="Y">운송장번호</td>
			  <td><input type="checkbox" name="account_name" value="Y" checked>입금인</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="status" value="Y">처리상태</td>
			  <td></td>
			  <td></td>
			  <td></td>
		   </tr>
		   <tr><td height="6"></td></tr>
			<tr>
			   <td><font color="2369C9"><b>주문자정보</b></font></td>
				<td><input type="checkbox" name="send_name" value="Y" checked>주문자명</td>
				<td><input type="checkbox" name="send_email" value="Y">주문자 이메일</td>
				<td><input type="checkbox" name="send_tphone" value="Y" checked>주문자 전화번호</td>
				<td><input type="checkbox" name="send_hphone" value="Y">주문자 휴대폰</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="send_post" value="Y">주문자 우편번호</td>
			  <td><input type="checkbox" name="send_address" value="Y">주문자 주소</td>
			  <td></td>
			  <td></td>
		   </tr>
		   <tr><td height="6"></td></tr>
			<tr>
			   <td><font color="2369C9"><b>수취인정보</b></font></td>
				<td><input type="checkbox" name="rece_name" value="Y" checked>수취인명</td>
				<td><input type="checkbox" name="rece_tphone" value="Y" checked>수취인 전화번호</td>
				<td><input type="checkbox" name="rece_hphone" value="Y">수취인 휴대폰</td>
				<td><input type="checkbox" name="rece_post" value="Y" checked>수취인 우편번호</td>
	      </tr>
	      <tr>
	        <td></td>
	        <td><input type="checkbox" name="rece_address" value="Y" checked>수취인주소</td>
			  <td><input type="checkbox" name="demand" value="Y">수취인요청사항</td>
	        <td></td>
	        <td></td>
	      </tr>
	    </table>                              
     </td>
   </tr>
  </table>
  <table align="center">
    <tr><td height="10"></td></tr>
    <tr>
      <td width="50"><input type="submit" class="t" value="엑셀저장"></td>
      <td width="50"><input type="button" class="t" value="취 소" onClick="self.close();"></td>
    </tr>
  </form>
  </table>
</body>
</html>
<?
}else{

	include "../../inc/global.inc";
	include "../../inc/util_lib.inc";
	
	$filename = "주문정보[".date('Ymd')."].xls";

	header( "Content-type: application/vnd.ms-excel" ); 
	header( "Content-Disposition: attachment; filename=$filename" ); 
	header( "Content-Description: PHP4 Generated Data" ); 

	echo "<style>\n";
	echo ".xl40\n";
	echo "        {mso-style-parent:style0;\n";
	echo "        mso-number-format:'0_ ';\n";
	echo "        text-align:center;\n";
	echo "        border:.5pt solid black;\n";
	echo "        background:white;\n";
	echo "        mso-pattern:auto none;\n";
	echo "        white-space:normal;}\n";
	echo "-->\n";
	echo "</style>\n";

	$sql = "select orderid from wiz_order where status != ''";
	$result = mysql_query($sql) or error(mysql_error());
   $all_total = mysql_num_rows($result);
	
   if(!empty($prev_year)){
      $prev_period = $prev_year."-".$prev_month."-".$prev_day;
      $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
      $period_sql = " and wo.order_date >= '$prev_period' and wo.order_date <= '$next_period'";
   }
   if(!empty($status)) $status_sql = "and wo.status = '$status'";
   else $status_sql = "and wo.status != ''";
   
   if(!empty($searchopt) && !empty($keyword)) $searchopt_sql = " and wo.$searchopt like '%$keyword%'";

   $sql = "select wo.*, wp.prdname from wiz_order wo, wiz_basket wb, wiz_product wp where wo.basketid = wb.basketid and wb.prdcode = wp.prdcode $status_sql 				$period_sql $searchopt_sql order by orderid desc";
   
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);

	echo "<table border=1>\n";
   echo "  <tr align=center style=font-weight:bold>\n";
   if($orderid == "Y") echo "<td bgcolor=#C0C0C0>주문번호</td>\n";
   if($orderprd == "Y") echo "<td bgcolor=#C0C0C0>주문상품</td>\n";
   if($total_price == "Y") echo "<td bgcolor=#C0C0C0>총결제금액</td>\n";
   if($pay_method == "Y") echo "<td bgcolor=#C0C0C0>결제방법</td>\n";
   if($order_date == "Y") echo "<td bgcolor=#C0C0C0>주문일자</td>\n";
   if($account == "Y") echo "<td bgcolor=#C0C0C0>결제계좌</td>\n";
   if($deliver_num == "Y") echo "<td bgcolor=#C0C0C0>운송장번호</td>\n";
   if($account_name == "Y") echo "<td bgcolor=#C0C0C0>입금인</td>\n";
   if($status == "Y") echo "<td bgcolor=#C0C0C0>처리상태</td>\n";
   
   if($send_name == "Y") echo "<td bgcolor=#C0C0C0>주문자명</td>\n";
   if($send_email == "Y") echo "<td bgcolor=#C0C0C0>주문자 이메일</td>\n";
   if($send_tphone == "Y") echo "<td bgcolor=#C0C0C0>주문자 전화번호</td>\n";
   if($send_hphone == "Y") echo "<td bgcolor=#C0C0C0>주문자 휴대폰</td>\n";
   if($send_post == "Y") echo "<td bgcolor=#C0C0C0>주문자 우편번호</td>\n";
   if($send_address == "Y") echo "<td bgcolor=#C0C0C0>주문자 주소</td>\n";
   
   if($rece_name == "Y") echo "<td bgcolor=#C0C0C0>수취인명</td>\n";
   if($rece_tphone == "Y") echo "<td bgcolor=#C0C0C0>수취인 전화번호</td>\n";
   if($rece_hphone == "Y") echo "<td bgcolor=#C0C0C0>수취인 휴대폰</td>\n";
   if($rece_post == "Y") echo "<td bgcolor=#C0C0C0>수취인 우편번호</td>\n";
   if($rece_address == "Y") echo "<td bgcolor=#C0C0C0>수취인주소</td>\n";
   if($demand == "Y") echo "<td bgcolor=#C0C0C0>수취인요청사항</td>\n";
   echo "   </tr>";
   
	$prdname = "";
	$orderid_tmp = "";
	while($row = mysql_fetch_object($result)){

		if($row_tmp->prdname != "") $prdname .= $row_tmp->prdname.":::";
		
		if($orderid_tmp != $row->orderid){
			
		   if($orderid_tmp != ""){
		   	echo "<tr>\n";
			   if($orderid == "Y") echo "<td class=xl40>$row_tmp->orderid</td>\n";
			   if($orderprd == "Y") echo "<td>$prdname</td>\n";
			   if($total_price == "Y") echo "<td>".number_format($row_tmp->total_price)."원</td>\n";
			   if($pay_method == "Y") echo "<td>".pay_method($row_tmp->pay_method)."</td>\n";
			   if($order_date == "Y") echo "<td>$row_tmp->order_date</td>\n";
			   if($account == "Y") echo "<td>$row_tmp->account</td>\n";
			   if($deliver_num == "Y") echo "<td>$row_tmp->deliver_num</td>\n";
			   if($account_name == "Y") echo "<td>$row_tmp->account_name</td>\n";
			   if($status == "Y") echo "<td>$row_tmp->status</td>\n";
			   
			   if($send_name == "Y") echo "<td>$row_tmp->send_name</td>\n";
			   if($send_email == "Y") echo "<td>$row_tmp->send_email</td>\n";
			   if($send_tphone == "Y") echo "<td>$row_tmp->send_tphone</td>\n";
			   if($send_hphone == "Y") echo "<td>$row_tmp->send_hphone</td>\n";
			   if($send_post == "Y") echo "<td>$row_tmp->send_post</td>\n";
			   if($send_address == "Y") echo "<td>$row_tmp->send_address</td>\n";
			   
			   if($rece_name == "Y") echo "<td>$row_tmp->rece_name</td>\n";
			   if($rece_tphone == "Y") echo "<td>$row_tmp->rece_tphone</td>\n";
			   if($rece_hphone == "Y") echo "<td>$row_tmp->rece_hphone</td>\n";
			   if($rece_post == "Y") echo "<td>$row_tmp->rece_post</td>\n";
			   if($rece_address == "Y") echo "<td>$row_tmp->rece_address</td>\n";
			   if($demand == "Y") echo "<td>$row_tmp->demand</td>\n";
			   echo "</tr>";
			   $prdname = "";
			 }

		}
		
		$row_tmp = $row;
		$orderid_tmp = $row->orderid;

	}
	
	$prdname .= $row_tmp->prdname.":::";
	
	echo "<tr>\n";
   if($orderid == "Y") echo "<td class=xl40>$row_tmp->orderid</td>\n";
   if($orderprd == "Y") echo "<td>$prdname</td>\n";
   if($total_price == "Y") echo "<td>".number_format($row_tmp->total_price)."원</td>\n";
   if($pay_method == "Y") echo "<td>".pay_method($row_tmp->pay_method)."</td>\n";
   if($order_date == "Y") echo "<td>$row_tmp->order_date</td>\n";
   if($account == "Y") echo "<td>$row_tmp->account</td>\n";
   if($deliver_num == "Y") echo "<td>$row_tmp->deliver_num</td>\n";
   if($account_name == "Y") echo "<td>$row_tmp->account_name</td>\n";
   if($status == "Y") echo "<td>$row_tmp->status</td>\n";
   
   if($send_name == "Y") echo "<td>$row_tmp->send_name</td>\n";
   if($send_email == "Y") echo "<td>$row_tmp->send_email</td>\n";
   if($send_tphone == "Y") echo "<td>$row_tmp->send_tphone</td>\n";
   if($send_hphone == "Y") echo "<td>$row_tmp->send_hphone</td>\n";
   if($send_post == "Y") echo "<td>$row_tmp->send_post</td>\n";
   if($send_address == "Y") echo "<td>$row_tmp->send_address</td>\n";
   
   if($rece_name == "Y") echo "<td>$row_tmp->rece_name</td>\n";
   if($rece_tphone == "Y") echo "<td>$row_tmp->rece_tphone</td>\n";
   if($rece_hphone == "Y") echo "<td>$row_tmp->rece_hphone</td>\n";
   if($rece_post == "Y") echo "<td>$row_tmp->rece_post</td>\n";
   if($rece_address == "Y") echo "<td>$row_tmp->rece_address</td>\n";
   if($demand == "Y") echo "<td>$row_tmp->demand</td>\n";
   echo "</tr>";
			   
	echo "</table>\n";
}
?>