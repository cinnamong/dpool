<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/login_check.inc";	// 로그인 체크
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; 마이쇼핑 &gt; <b>1:1 Q&A</b>";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치
include "../inc/mem_info.inc"; 		// 회원 정보


$page_type = "join";
include "../inc/page_info.inc"; 		// 페이지 정보
// 입력정보 사용여부
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// 입력정보 필수여부
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					  <tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_o_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> 님의 마이쇼핑입니다.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
							<? include "my_view.inc"; ?>

					</td></tr>

					<!--정보수정-->
					<!--1:1문의현황-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m04_01.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td colspan=5 bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray" width=110>처리현황</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">문의내용</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray" width=110>작성일</td>
							</tr>
							<tr><td colspan=5 bgcolor=#f7f7f7 height=3></td></tr>
							<?
							$sql = "select * from wiz_consult where memid = '$wiz_session[id]' order by idx desc";
		               $result = mysql_query($sql) or error(mysql_error());
		               $total = mysql_num_rows($result);
			            
			            $rows = 12;
			            $lists = 5;
			            $page_count = ceil($total/$rows);
			            if(!$page || $page > $page_count) $page = 1;
			            $start = ($page-1)*$rows;
			            if($start>1) mysql_data_seek($result,$start);
			            
			            while(($row = mysql_fetch_object($result)) && $rows){
			            	if($row->status == "N") $row->status = "접수완료";
			            	else $row->status = "답변완료";
			            ?>
							<tr align=center height=28>								
								<td><b><?=$row->status?></b></td>
								<td></td>
								<td align=left>ㆍ<a href="my_qnaview.php?idx=<?=$row->idx?>"><?=$row->subject?></a></td>
								<td></td>
								<td><?=$row->wdate?></td></tr>
							<tr><td colspan=5 bgcolor=#dddddd height=1></td></tr>
							<?
							}
							if($total <= 0){
							?>
							<tr><td colspan=5 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> 현재 문의내용이 없습니다.</td></tr>
							<?
							}
							?>
							<tr><td colspan=5 bgcolor=#f7f7f7 height=3></td></tr>
							</table>
					</td></tr>
					<tr>
					  <td height=50>
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							  <tr>
							    <td style="padding:0 0 0 20"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
							    <td width="80" align=center><a href="../member/my_qnainput.php"><img src="/images/bbsimg/btn_write.gif" border=0></a>&nbsp;&nbsp;</td>
							  </tr>
							</table>
						</td>
				   </tr>
					</form>
					<!---마이쇼핑 내용 끝---------------------------------------------------------------------------------------------------------------------->
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>