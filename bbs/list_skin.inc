						<?
						if($bbs_info->grp != ""){
						      $catlist = explode(",",$bbs_info->grp);
						?>
                  <table border="0" cellpadding="0" cellspacing="0" width="98%">
                    <tr>
                      <td align="right" colspan="20">
                      <select name="grp" onChange="document.location='list.php?code=<?=$code?>&grp='+this.value">
                      <option value="">category
							 <?
							 for($ii=0;$ii<count($catlist);$ii++){
							 	if($grp == $catlist[$ii]) $selected = "selected";
							 	else $selected = "";
							 ?>
                      <option value="<?=$catlist[$ii]?>" <?=$selected?>><?=$catlist[$ii]?>
							 <?
							 }
							 ?>
                      </select>
                      </td>
                     </tr>
                  </table>
						<?
						}
						?>
                  <table border="0" cellpadding="0" cellspacing="0" width="98%">
						<tr>
						   <td width="51"><img src="/images/bbsimg/board_t_no.gif"></td>
							<td width="370" background="/images/bbsimg/bar_bg1.gif" align="center"><img src="/images/bbsimg/board_t_title.gif"></td>
							<td width="92"><img src="/images/bbsimg/board_t_writer.gif"></td>
							<td width="89"><img src="/images/bbsimg/board_t_date.gif"></td>
							<td width="63"><img src="/images/bbsimg/board_t_click.gif"></td></tr>
						<tr><td colspan="5" height="3"></td></tr>
						<?
                  // 공지글
                  $notice_rows = 0;
                  $sql = "select idx,name,subject,notice,wdate,count from wiz_bbs where code = '$code' and notice = 'Y'";
                  $result = mysql_query($sql) or error(mysql_error());
                  while($row = mysql_fetch_object($result)){
                  	$notice_rows++;
                  	$row->subject = "<a href='view.php?code=$code&idx=$row->idx&page=$page'><font color='B90020'>$row->subject</font></a>";
                  ?>
                  <tr>
						  <td align="center" height="25"><font color='red'><b>[공지]</b></font></td>
						  <td><?=$row->subject?></td>
						  <td align="center"><?=$row->name?></td>
						  <td align="center"><?=$row->wdate?></td>
						  <td align="center"><?=$row->count?></td></tr>
						<tr>
						  <td colspan="5" height="1" background="/images/bbsimg/board_bg.gif"></td>
						</tr>
                  <?
                  }
                  ?>
						<?
						if($grp) $grp_sql = " and grp = '$grp'";
						if($search_option)
					      $sql = "select * from wiz_bbs where code = '$code' and notice != 'Y' $grp_sql and $search_option like '%$keyword%' order by prino desc";
					   else
					      $sql = "select * from wiz_bbs where code = '$code' and notice != 'Y' $grp_sql order by prino desc";

					   $result = mysql_query($sql) or error(mysql_error());
					   
					   if($bbs_info->rows == "") $bbs_info->rows = 20;
					   if($bbs_info->lists == "") $bbs_info->lists = 5;
					   $bbs_info->rows = $bbs_info->rows - $notice_rows;
					   
					   $today = date('Ymd');
					   $total = mysql_num_rows($result);
					   $page_count = ceil($total/$bbs_info->rows);
					   if(!$page || $page > $page_count) $page = 1;
					   $start = ($page-1)*$bbs_info->rows;
					   $no = $total-$start;
					   if($start>1) mysql_data_seek($result,$start);
					   
					   while(($row = mysql_fetch_object($result)) && $bbs_info->rows){
					   	
					   	if($row->privacy == "Y") $row->subject = "<a href=auth.php?code=$code&mode=auth&smode=view&idx=$row->idx>$row->subject</a> <img src=/images/bbsimg/lock.gif>";
					   	else $row->subject = "<a href=view.php?code=$code&idx=$row->idx&page=$page>$row->subject</a>";

					   	if($row->grp != "") $row->subject = "[".$row->grp."] ".$row->subject;				// grp
					   	$re_space = ""; for($ii=0; $ii < $row->depno; $ii++) $re_space .= "&nbsp;&nbsp;";			// respace
					   	$row->subject = $re_space.$row->subject;
					   	if($row->depno != 0) $row->subject = "<img src=/images/bbsimg/re.gif>".$row->subject;		// re
					   	if(($today-str_replace("-", "", $row->wdate)) < $bbs_info->new) $row->subject .= " <img src=/images/bbsimg/new.gif> ";	// new
					   	if($row->count > $bbs_info->hot) $row->subject .= " <img src=/images/bbsimg/hot.gif> ";	// hot
					   	
					   ?>
						<tr>
						  <td align="center" height="25"><?=$no?></td>
						  <td><?=$row->subject?></td>
						  <td align="center"><?=$row->name?></td>
						  <td align="center"><?=$row->wdate?></td>
						  <td align="center"><?=$row->count?></td></tr>
						<tr>
						  <td colspan="5" height="1" background="/images/bbsimg/board_bg.gif"></td>
						</tr>
						<?
							$no--;
							$bbs_info->rows--;
						}
						?>
						</table>