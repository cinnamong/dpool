                  <table border="0" cellpadding="0" cellspacing="0">
						<?
						if($search_option)
					      $sql = "select * from wiz_bbs where code = '$code' and notice != 'Y' and $search_option like '%$keyword%' order by prino desc";
					   else
					      $sql = "select * from wiz_bbs where code = '$code' and notice != 'Y' order by prino desc";

					   $result = mysql_query($sql) or error(mysql_error());
					   
					   if($bbs_info->rows == "") $bbs_info->rows = 20;
					   if($bbs_info->lists == "") $bbs_info->lists = 5;
					   $bbs_info->rows = $bbs_info->rows - $notice_rows;
					   
					   $idx = 0;
					   $total = mysql_num_rows($result);
					   $page_count = ceil($total/$bbs_info->rows);
					   if(!$page || $page > $page_count) $page = 1;
					   $start = ($page-1)*$bbs_info->rows;
					   $no = $total-$start;
					   if($start>1) mysql_data_seek($result,$start);
					   
					   while(($row = mysql_fetch_object($result)) && $bbs_info->rows){
					   	
					   	$row->subject = "<a href=view.php?code=$code&idx=$row->idx&page=$page>$row->subject</a>";
					   	
					   	if(is_file("./upfile/".$code."/thumbS_".$row->upfile)){
					   		$row->upimg = "<a href=view.php?code=$code&idx=$row->idx&page=$page><img src='./upfile/$code/thumbS_".$row->upfile."' border='0'></a>";
					   	}else{
					   		$row->upimg = "";
					   	}
					   	
					   	if($idx%4 == 0) echo "<tr>";
					   ?>
						  <td width=168 align=center>
						    <table border=0 width="135"  height="166" background="/images/bbsimg/picture_bg.gif">
						      <tr><td align="center" height="25"><?=$row->upimg?></td></tr>
						   </table>
						   <table>
								<tr><td><b><?=$row->subject?></b></td></tr>
						    </table>
						  </td>
						<?
							$idx++;
							$no--;
							$bbs_info->rows--;
						}
						?>
						</table>