<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function deleteBbs(code){
   if(confirm('선택한 게시판을 삭제하시겠습니까?\n\n삭제한 데이타는 복구할수 없습니다.')){
      document.location = 'bbs_pro_save.php?mode=delete&code=' + code;
   }
}
//-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="87%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          
                                          <?
                                          $nowposi = "커뮤니티관리 &gt; <strong>게시물관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>게시물관리</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                          <form action="bbs_list.php" method="get">
                                            <tr>
                                              <td width="80"><b>선택게시판 :</b></td>
                                              <td>
                                              <select name="code" onChange="this.form.submit();">
								                      <?
								                      	$no = 0;
								                        $sql = "select code, title, grp from wiz_bbsinfo";
								                        $result = mysql_query($sql) or error(mysql_error());
								                        while($row = mysql_fetch_object($result)){
								                        	if(empty($code) && $no == 0) $code = $row->code;
								                        	if($row->code == $code) $bbs_info = $row;
								                      ?>
								                      <option value="<?=$row->code?>" <? if($code == $row->code) echo "selected"; ?>>&nbsp; <?=$row->title?>&nbsp; 
								                      <?
								                      		$no++;
								                        }
								                      ?>
								                      </select>
                                              <?
															 if($bbs_info->grp != ""){
															   $catlist = explode(",",$bbs_info->grp);
															 ?>
								                      <select name="grp" onChange="document.location='<?=$PHP_SELF?>?code=<?=$code?>&grp='+this.value">
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
															 <?
															 }
															 ?>
                                              </td>
                                              <td width="50">
                                                <select name="search_option">
                                                <option value="subject">제목
                                                <option value="content">내용
                                                <option value="name">작성자
                                                </select>
                                              </td>
                                              <td width="70"><input type="text" size="13" name="keyword" class="form1"></td>
                                              <td width="50">&nbsp;<input type="submit" value="검색" class="xbtn"></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="50" height="30" bgcolor="E9E7E7" align="center">번호</td>
                                              <td bgcolor="E9E7E7" align="center">제목</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">작성자</td>
                                              <td width="70" bgcolor="E9E7E7" align="center">작성일</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">조회</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                          <?
						                        // 공지글 가져오기
						                        $sql = "select idx,name,subject,notice,wdate,count from wiz_bbs where code = '$code' and notice = 'Y'";
						                        $result = mysql_query($sql) or error(mysql_error());
						                        while($row = mysql_fetch_object($result)){
						                        ?>
						                          <tr> 
						                            <td align="center" width="60" height="30"><font color='red'><b>[공지]</b></font></td>
						                            <td> <a href="bbs_view.php?code=<?=$code?>&idx=<?=$row->idx?>&page=<?=$page?>"><font color='B90020'><?=$row->subject?></font></a></td>
						                            <td align="center" width="80"><?=$row->name?></td>
						                            <td align="center" width="80"><?=$row->wdate?></td>
						                            <td align="center" width="70"><?=$row->count?></td>
						                          </tr>
						                        <?
						                        }
						                        ?>
														<?
														if($grp) $grp_sql = " and grp = '$grp'";
														if($search_option){
															$sql = "select * from wiz_bbs where code = '$code' and notice != 'Y' $grp_sql and $search_option like '%$keyword%' order by prino desc";
														}else{
															$sql = "select * from wiz_bbs where code = '$code' and notice != 'Y' $grp_sql order by  notice desc , prino desc";
														}
														$result = mysql_query($sql) or error(mysql_error());
							                     $total = mysql_num_rows($result);
							       	            
							       	            $rows = 20;
							       	            $lists = 5;
							                   	$page_count = ceil($total/$rows);
							                   	if(!$page || $page > $page_count) $page = 1;
							                   	$start = ($page-1)*$rows;
							                   	$no = $total-$start;
							                   	if($start>1) mysql_data_seek($result,$start);
								                   	
														while(($row = mysql_fetch_object($result)) && $rows){
															
															if($rows%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
															
													      $row->subject = "<a href='bbs_view.php?code=$code&idx=$row->idx&page=$page'>$row->subject</a>";	//	subject
													      if($row->grp != "") $row->subject = "[".$row->grp."] ".$row->subject;						// grp
													      if($row->privacy == "Y") $row->subject = "<img src=../image/bbs_lock.gif border=0>".$row->subject;	// privacy
													      $re_space = ""; for($ii=0; $ii < $row->depno; $ii++) $re_space .= "&nbsp;&nbsp;";					// respace
													   	$row->subject = $re_space.$row->subject;
													   	if($row->depno != 0) $row->subject = "<img src=../image/bbs_re.gif>".$row->subject;				// re
													   	
														?>
														  <tr bgcolor="<?=$bgcolor?>"> 
                                              <td width="70" height="30" align="center"><?=$no?></td>
                                              <td><?=$re_space?><?=$row->subject?></td>
                                              <td width="80" align="center"><?=$row->name?></td>
                                              <td width="80" align="center"><?=$row->wdate?></td>
                                              <td width="70" align="center"><?=$row->count?></td>
                                            </tr>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                     if($total <= 0) echo "<tr><td height=25 colspan=5 align=center>작성된 글이 없습니다.</td></tr>";
								                  ?>
                                            <tr><td colspan="9" bgcolor="DEDEDE"></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="130">
                                                <input type="button" value="목록보기" onClick="document.location='bbs_list.php?code=<?=$code?>';" class="t"> 
                                                <input type="button" value="글쓰기" onClick="document.location='bbs_input.php?code=<?=$code?>';" class="t"></td>
                                              <td align="center"><? print_pagelist($page, $lists, $page_count, "&code=$code&search_option=$search_option&keyword=$keyword"); ?></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>