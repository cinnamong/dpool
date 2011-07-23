              <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td class="product_title" height=45>&nbsp;<img src="/images/product_title_icon.gif" align=absmiddle><?=$catname?></td></tr>
					<tr><td align=center style="padding:0 0 20 0">
					<?
					
					
					if($cat_info->depthno == 1) $tmp_catcode = substr($catcode,0,2);
					else if($cat_info->depthno == 2) $tmp_catcode = substr($catcode,0,4);
					else if($cat_info->depthno == 3) $tmp_catcode = substr($catcode,0,4);
					if($cat_info->depthno < 3) $cat_info->depthno++;
					
					$sql = "select catcode, catname, depthno from wiz_category where catuse != 'N' and catcode like '$tmp_catcode%' and depthno = $cat_info->depthno order by priorno02, priorno03 asc";
					$result = mysql_query($sql) or error(mysql_error());
               $total = mysql_num_rows($result);
                              
					if($catcode != "" && $total > 0){
					?>
							<table border=0 cellpadding=0 cellspacing=0 width=97%>
							  <tr>
							    <td width=10 height=10 background="/images/box_cor01.gif"></td>
								 <td background="/images/box_t.gif"></td>
								 <td width=10 background="/images/box_cor02.gif"></td></tr>
							  <tr>
							    <td background="/images/box_l.gif"></td>
								 <td>
										<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<?
                              $no = 0;
										while($row = mysql_fetch_object($result)){
											
											if($catcode == $row->catcode) $row->catname = "<font color=red>".$row->catname."</font>";
											if($no%4 == 0) echo "<tr>";
	                           	echo "<td width=150>¤ý<a href='/shop/prd_list.php?catcode=$row->catcode'>$row->catname</a></td>";
											$no++;
											
										}
										?>
										</table>
								 </td>
								 <td background="/images/box_r.gif"></td></tr>
							  <tr>
							    <td height=10 background="/images/box_cor03.gif"></td>
								 <td background="/images/box_b.gif"></td>
								 <td background="/images/box_cor04.gif"></td>
							  </tr>
							</table>
					<?
					}
					?>
					</td></tr>
					</table>