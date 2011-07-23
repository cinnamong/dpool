<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/bbs_info.inc"; 	 	// 게시판 정보

// 목록보기 권한체크
if(empty($wiz_session[level])) $wiz_session[level] = "ZM";
if($bbs_info->lpermi < $wiz_session[level]) error("목록보기 권한이 없습니다.");
if($bbs_info->wpermi >= $wiz_session[level])
$write_btn = "<a href=input.php?code=$code&mode=write><img src=/images/bbsimg/btn_write.gif border=0></a>";

$list_btn = "<a href=list.php?code=$code&page=$page><img src=/images/bbsimg/btn_list.gif border=0></a>&nbsp;&nbsp;";

$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; <b>$bbs_info->title</b>";

include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
					
               <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td style="padding:15 0 0 0" align=center>
					<table border="0" cellpadding="0" cellspacing="0" width="686"><tr><td>
					
						<?
						if($bbs_info->bbstype == "BBS") include "list_skin.inc";
						else if($bbs_info->bbstype == "PHOTO") include "photo_skin.inc";
						?>
						
						<table border="0" cellpadding="0" cellspacing="0" width="98%">
						<tr><td colspan="5" style="padding:10 0 10 0">
							<table border="0" cellpadding="0" cellspacing="0" width=100%>
							<tr><td align=center>
								<? print_pagelist($page, $bbs_info->lists, $page_count, "&code=$code"); ?>
							</td></tr>
							</table>
						</td></tr>
						<tr><td colspan="5" align="center" height=63 background="/images/bbsimg/bar_bottom_bg.gif">
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<form action="<?=$PHP_SELF?>">
							<input type="hidden" name="code" value="<?=$code?>">
							<tr>
							   <td width=15><img src="/images/bbsimg/bar_bottom_bg_l.gif"></td>
								<td width=300><?=$list_btn?><?=$write_btn?></td>
								<td width=15></td>
								<td width=40>
								   <select name="search_option">
									<option value="subject">제 목</option>
									<option value="name">작성자</option>
									<option value="memid">아이디</option>
									<option value="content">내 용</option>
									</select>
								</td>
								<td width=120><input type="text" name="keyword" value="<?=$keyword?>" size=10 class="input">&nbsp;<input type="image" src="/images/bbsimg/btn_search.gif" align="absmiddle" border="0"></td>
								<td width=8><img src="/images/bbsimg/bar_bottom_bg_r.gif"></td></tr>
							</form>
							</table>
						</td></tr>
						</table>
					</td></tr></table>
					</td></tr>
					</table>


<?

include "../inc/footer.inc"; 		// 하단디자인

?>