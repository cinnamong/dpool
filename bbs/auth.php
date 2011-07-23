<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/bbs_info.inc"; 	 	// 게시판 정보

$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; <b>$bbs_info->title</b>";

include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<form action="save.php" method="post">
               <input type="hidden" name="code" value="<?=$code?>">
               <input type="hidden" name="mode" value="auth">
               <input type="hidden" name="smode" value="<?=$smode?>">
               <input type="hidden" name="idx" value="<?=$idx?>"> 
               <input type="hidden" name="page" value="<?=$page?>">
					<tr><td align=center height=200>
							<table border=0 cellpadding=0 cellspacing=0 width=300>
							<tr><td colspan="5" align="center" height=63 background="/images/bbsimg/bar_bottom_bg.gif">
								<table border=0 cellpadding=0 cellspacing=0 width=100%>
								<tr><td width=15><img src="/images/bbsimg/bar_bottom_bg_l.gif"></td>
									<td style="padding:0 0 0 30">비밀번호 : <input type=password name="passwd" size=25 class="input"></input></td>
									<td width=8><img src="/images/bbsimg/bar_bottom_bg_r.gif"></td></tr>
								</table>
							</td></tr>
							<tr><td height=50 align=center>
								<input type="image" src="/images/bbsimg/btn_ok.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="/images/bbsimg/btn_cancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
							</td></tr>
							</table>
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>