<?
if($exceldown != "ok"){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: �ֹ����� �ٿ�ε� ::</title>
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
	
	frm.c_prdgroup.checked = true;
	frm.c_prdname.checked = true;
	frm.c_prdcom.checked = true;
	frm.c_origin.checked = false;
	frm.c_showset.checked = false;
	frm.c_shortage.checked = false;
	frm.c_stock.checked = false;
	frm.c_category.checked = true;
	
	frm.c_sellprice.checked = true;
	frm.c_conprice.checked = true;
	frm.c_reserve.checked = false;
	frm.c_option.checked = true;
	
	frm.c_image.checked = true;
	frm.c_stortexp.checked = false;
	frm.c_content.checked = true;
	

}

function selAll(frm){
	
	frm.c_prdgroup.checked = true;
	frm.c_prdname.checked = true;
	frm.c_prdcom.checked = true;
	frm.c_category.checked = true;
	frm.c_origin.checked = true;
	frm.c_showset.checked = true;
	frm.c_shortage.checked = true;
	frm.c_stock.checked = true;
	
	frm.c_sellprice.checked = true;
	frm.c_conprice.checked = true;
	frm.c_reserve.checked = true;
	frm.c_option.checked = true;
	
	frm.c_image.checked = true;
	frm.c_stortexp.checked = true;
	frm.c_content.checked = true;
	
	
}
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="5" topmargin="5">
	<table width="560" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
	<form name="frm" action="" method="post">
	<input type="hidden" name="exceldown" value="ok">
	
	<input type="hidden" name="dep_code" value="<?=$dep_code?>">
	<input type="hidden" name="dep2_code" value="<?=$dep2_code?>">
	<input type="hidden" name="dep3_code" value="<?=$dep3_code?>">
	<input type="hidden" name="special" value="<?=$special?>">
	<input type="hidden" name="showset" value="<?=$showset?>">
	<input type="hidden" name="searchopt" value="<?=$searchopt?>">
	<input type="hidden" name="searchkey" value="<?=$searchkey?>">
	
	  <tr>
	    <td bgcolor="ffffff">
	    <table><tr><td></td></tr></table>
       <table cellspacing="2" cellpadding="0" border="0">
         <tr>
	        <td><font color="2369C9"><b>���ñ���</b></font></td>
	        <td><input type="radio" name="sel_gubun" onClick="selBasic(this.form);" checked><font color="red"><b>�⺻����</b></font></td>
			  <td><input type="radio" name="sel_gubun" onClick="selAll(this.form);"><font color="red"><b>��ü����</b></font></td>
			  <td></td>
			  <td></td>
			</tr>
			<tr><td height="6"></td></tr>
	      <tr>
	        <td width="80"><font color="2369C9"><b>�⺻����</b></font></td>
	        <td width="100"><input type="checkbox" name="c_prdcode" value="Y" checked>��ǰ�ڵ�</td>
			  <td width="100"><input type="checkbox" name="c_prdname" value="Y" checked>��ǰ��</td>
			  <td width="100"><input type="checkbox" name="c_prdgroup" value="Y" checked>��ǰ�׷�</td>
			  <td width="100"><input type="checkbox" name="c_prdcom" value="Y" checked>������</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="c_category" value="Y" checked>ī�װ�</td>
			  <td><input type="checkbox" name="c_origin" value="Y">������</td>
			  <td><input type="checkbox" name="c_showset" value="Y">��ǰ����</td>
			  <td><input type="checkbox" name="c_shortage" value="Y">ǰ������</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="c_stock" value="Y">���</td>
			  <td></td>
			  <td></td>
			  <td></td>
			</tr>
		   <tr><td height="6"></td></tr>
			<tr>
			   <td><font color="2369C9"><b>���ݹ׿ɼ�</b></font></td>
				<td><input type="checkbox" name="c_sellprice" value="Y" checked>�ǸŰ�</td>
				<td><input type="checkbox" name="c_conprice" value="Y" checked>����</td>
				<td><input type="checkbox" name="c_reserve" value="Y">������</td>
				<td><input type="checkbox" name="c_option" value="Y" checked>�ɼ�</td>
			</tr>
			<tr><td height="6"></td></tr>
			<tr>
			   <td><font color="2369C9"><b>��ǰ����/����</b></font></td>
				<td><input type="checkbox" name="c_image" value="Y" checked>��ǰ����</td>
				<td><input type="checkbox" name="c_stortexp" value="Y">��������</td>
				<td><input type="checkbox" name="c_content" value="Y" checked>�󼼼���</td>
				<td></td>
			</tr>
	    </table>                              
     </td>
   </tr>
  </table>
  <table align="center">
    <tr><td height="10"></td></tr>
    <tr>
      <td width="50"><input type="submit" class="t" value="��������"></td>
      <td width="50"><input type="button" class="t" value="�� ��" onClick="self.close();"></td>
    </tr>
  </form>
  </table>
</body>
</html>
<?
}else{

	include "../../dbcon.php";
	include "../inc/admin_lib.inc";
	
	$filename = "��ǰ����[".date('Ymd')."].xls";

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

	$sql = "select prdcode from wiz_product";
	$result = mysql_query($sql) or error(mysql_error());
   $all_total = mysql_num_rows($result);
	
   if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
   if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
   if(!empty($showset)) $showset_sql = "wp.showset = '$showset' and ";
   if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
   
   $sql = "select wp.*, wy.cat_name from wiz_product wp, wiz_cprelation wc , wiz_category wy 
                  where $catcode_sql $special_sql $showset_sql $search_sql wc.prdcode = wp.prdcode and wc.catcode = wy.catcode order by wp.prior desc, wp.prdcode desc";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);


	echo "<table border=1>\n";
   echo "  <tr align=center style=font-weight:bold>\n";
   if($c_prdcode == "Y") echo "<td bgcolor=#C0C0C0>��ǰ�ڵ�</td>\n";
   if($c_prdname == "Y") echo "<td bgcolor=#C0C0C0>��ǰ��</td>\n";
   if($c_category == "Y") echo "<td bgcolor=#C0C0C0>��ǰī�װ�</td>\n";
   if($c_prdgroup == "Y") echo "<td bgcolor=#C0C0C0>��ǰ�׷�</td>\n";
   if($c_prdcom == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_origin == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_showset == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����</td>\n";
   if($c_shortage == "Y") echo "<td bgcolor=#C0C0C0>ǰ������</td>\n";
   if($c_stock == "Y") echo "<td bgcolor=#C0C0C0>���</td>\n";
   if($c_sellprice == "Y") echo "<td bgcolor=#C0C0C0>�ǸŰ�</td>\n";
   if($c_conprice == "Y") echo "<td bgcolor=#C0C0C0>����</td>\n";
   if($c_reserve == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_option == "Y") echo "<td bgcolor=#C0C0C0>�ɼǸ�1</td>\n";
   if($c_option == "Y") echo "<td bgcolor=#C0C0C0>�ɼ��׸�1</td>\n";
   if($c_option == "Y") echo "<td bgcolor=#C0C0C0>�ɼǸ�2</td>\n";
   if($c_option == "Y") echo "<td bgcolor=#C0C0C0>�ɼ��׸�2</td>\n";
   if($c_option == "Y") echo "<td bgcolor=#C0C0C0>�ɼǸ�3</td>\n";
   if($c_option == "Y") echo "<td bgcolor=#C0C0C0>�ɼ��׸�3</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ��ǥ����</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����1</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����2</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����3</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����4</td>\n";
   if($c_stortexp == "Y") echo "<td bgcolor=#C0C0C0>��������</td>\n";
   if($c_content == "Y") echo "<td bgcolor=#C0C0C0>�󼼼���</td>\n";
   echo "   </tr>";

	while($row = mysql_fetch_object($result)){

		if($row->new == "Y") $row->prdgroup .= "/�Ż�ǰ";
		if($row->popular == "Y") $row->prdgroup .= "/�α��ǰ";
		if($row->recom == "Y") $row->prdgroup .= "/��õ��ǰ";
		if($row->sale == "Y") $row->prdgroup .= "/���ϻ�ǰ";
		
		echo "<tr>\n";
	   if($c_prdcode == "Y") echo "<td>$row->prdcode</td>\n";
	   if($c_prdname == "Y") echo "<td>$row->prdname</td>\n";
	   if($c_category == "Y") echo "<td>$row->cat_name</td>\n";
	   if($c_prdgroup == "Y") echo "<td>$row->prdgroup</td>\n";
	   if($c_prdcom == "Y") echo "<td>$row->prdcom</td>\n";
	   if($c_origin == "Y") echo "<td>$row->origin</td>\n";
	   if($c_showset == "Y") echo "<td>$row->showset</td>\n";
	   if($c_shortage == "Y") echo "<td>$row->shortage</td>\n";
	   if($c_stock == "Y") echo "<td>$row->stock</td>\n";
	   if($c_sellprice == "Y") echo "<td>$row->sellprice</td>\n";
	   if($c_conprice == "Y") echo "<td>$row->conprice</td>\n";
	   if($c_reserve == "Y") echo "<td>$row->reserve</td>\n";
	   if($c_option == "Y") echo "<td>$row->opttitle</td>\n";
	   if($c_option == "Y") echo "<td>$row->optcode</td>\n";
	   if($c_option == "Y") echo "<td>$row->opttitle2</td>\n";
	   if($c_option == "Y") echo "<td>$row->optcode2</td>\n";
	   if($c_option == "Y") echo "<td>$row->opttitle3</td>\n";
	   if($c_option == "Y") echo "<td>$row->optcode3</td>\n";
	   if($c_image == "Y") echo "<td>$row->prdimg_R</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L1/$row->prdimg_L1/$row->prdimg_L1/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L2/$row->prdimg_L2/$row->prdimg_L2/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L3/$row->prdimg_L3/$row->prdimg_L3/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L4/$row->prdimg_L4/$row->prdimg_L4/</td>\n";
	   if($c_image == "Y") echo "<td>$row->image</td>\n";
	   if($c_stortexp == "Y") echo "<td>$row->stortexp</td>\n";
	   if($c_content == "Y") echo "<td>$row->content</td>\n";
	   echo "   </tr>";

	}
	
	echo "</table>\n";
}
?>