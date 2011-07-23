<?
$code = "faq";
include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/bbs_info.inc"; 	 	// 게시판 정보

$now_position = "<a href=/>Home</a> &gt; 고객센터 &gt; <b>자주하는질문</b>";
$page_type = "faq";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td style="padding:15">
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<form name="frm" action="faq.php" method="post">
							<tr><td><img src="/images/faq_search.gif"></td>
								<td><input type=text name="keyword" value="<?=$keyword?>" size=45 class="input"></input></td>
								<td><input type="image" src="/images/but_search.gif" border=0></a></td></tr>
							</form>
							</table>
					</td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=5 cellspacing=0 width=98%>
							<tr><td background="/images/faq_bar.gif" style="padding:0 10 0 0">
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td><img src="/images/faq_t_01.gif"></td>
									<td align=right>
										<table border=0 cellpadding=0 cellspacing=0>
										<tr><td><a href="faq.php?grp=주문/결제"><img src="/images/faq_b_<? if($grp != "주문/결제") echo "b_"; ?>01.gif" border=0></a></td>
											<td><a href="faq.php?grp=배송관련"><img src="/images/faq_b_<? if($grp != "배송관련") echo "b_"; ?>02.gif" border=0></a></td>
											<td><a href="faq.php?grp=반품/취소"><img src="/images/faq_b_<? if($grp != "반품/취소") echo "b_"; ?>03.gif" border=0></a></td>
											<td><a href="faq.php?grp=회원정보"><img src="/images/faq_b_<? if($grp != "회원정보") echo "b_"; ?>04.gif" border=0></a></td>
											<td><a href="faq.php?grp=기타관련"><img src="/images/faq_b_<? if($grp != "기타관련") echo "b_"; ?>05.gif" border=0></a></td></tr>
										</table>
									</td></tr>
									</table>
							</td></tr>
                     <?
                     if($bbs_info->rows == "") $bbs_info->rows = 12;
					   	if($bbs_info->lists == "") $bbs_info->lists = 5;
                     if(!$page || $page > $page_count) $page = 1;
                     
                     $sql = "select * from wiz_bbs where code = '$code' order by idx desc";
                     
                     if($keyword != "")
                     	$sql = "select * from wiz_bbs where code = '$code' and (subject like '%$keyword%' or content like '%$keyword%') order by idx desc";
                     
                     if($grp != "")
                     	$sql = "select * from wiz_bbs where code = '$code' and grp = '$grp' order by idx desc";
                     	
                     $result = mysql_query($sql) or error(mysql_error());
                     $total = mysql_num_rows($result);
                     $start = ($page-1)*$rows;
					   	$no = $total-$start;
                     while(($row = mysql_fetch_object($result)) && $bbs_info->rows){
                     ?>
							<tr><td bgcolor=#E3D0EB height=1></td></tr>
							<tr><td height=30><font color="#A54ACF"><b><?=$no?>. <?=$row->subject?></b></font></td></tr>
							<tr><td bgcolor=#E3D0EB height=1></td></tr>
							<tr><td style="padding:10 15 10 15"><?=$row->content?></td></tr>
							<tr><td height=4 background="/images/customer_r_line.gif"></td></tr>
							<?
								$no--;
								$bbs_info->rows--;
							}
							?>
							</table>
							<br>
							<? print_pagelist($page, $bbs_info->lists, $page_count, "&code=$code"); ?>
							
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>