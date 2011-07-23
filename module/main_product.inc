<?

$sql = "select * from wiz_prdmain where isuse != 'N' order by prior asc";
$prd_result = mysql_query($sql) or error(mysql_error());

while($prd_row = mysql_fetch_object($prd_result)){
	if(is_file("./images/mainimg/$prd_row->barimg")) $prd_row->barimg = "<a href='/shop/prd_list.php?grp=$prd_row->type'><img src='/images/mainimg/$prd_row->barimg' border='0'></a>";
   else $prd_row->barimg = "";

	$main_product .= "<table border=0 cellpadding=0 cellspacing=0 width=100%>
						   <tr><td>".$prd_row->html."</td></tr>
							<tr><td>".$prd_row->barimg."</td></tr>
							<tr><td align=center>
							<table width=100% border=0 cellpadding=7 cellspacing=0>";

	$no = 0;
	$type = $prd_row->type;
	$sql = "select prdcode,prdname,sellprice,prdimg_R from wiz_product where $type = 'Y' order by prior desc limit $prd_row->prd_num";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
		$row->prdimg_R = "<a href=/shop/prd_view.php?prdcode=$row->prdcode><img src='/prdimg/$row->prdimg_R' border=0 width='$prd_row->prd_width' height='$prd_row->prd_height'></a>";
		$row->prdname = "<a href=/shop/prd_view.php?prdcode=$row->prdcode>$row->prdname</a>";
		if($no%4 == 0) $main_product .= "<tr>";

	   $main_product .= "<td valign=top align=center>
								<table width=130 border=0 cellpadding=0 cellspacing=0>
								<tr><td align=center>".$row->prdimg_R."</td></tr>
								<tr><td align=center class='name' style='padding:5 0 5 0'>".$row->prdname."</td></tr>
								<tr><td align=center class='price'>".number_format($row->sellprice)."¿ø</td></tr>
								</table>
								</td>";

		$no++;
	}

	$main_product .= "</table>
							</td></tr>
							</table>";

}
?>