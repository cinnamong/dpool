<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/bbs_info.inc"; 	 	// 게시판 정보

$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; <b>$bbs_info->title</b>";

include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

// 글보기 권한체크
if(empty($wiz_session[level])) $wiz_session[level] = "ZM";
if($bbs_info->rpermi < $wiz_session[level]) error("글보기 권한이 없습니다.");
if($wiz_session[level] <= $bbs_info->wpermi){
	$write_btn = "<a href=input.php?code=$code&mode=write&idx=$idx&page=$page><img src=/images/bbsimg/btn_write.gif border=0></a>&nbsp;&nbsp;";
	$modify_btn = "<a href=auth.php?code=$code&smode=modify&idx=$idx&page=$page><img src=/images/bbsimg/btn_edit.gif border=0></a>&nbsp;&nbsp;";
	$delete_btn = "<a href=auth.php?code=$code&smode=delete&idx=$idx&page=$page><img src=/images/bbsimg/btn_del.gif border=0></a>&nbsp;&nbsp;";
}

// 답글쓰기 권한체크
if($wiz_session[level] <= $bbs_info->apermi){
	$reply_btn = "<a href=input.php?code=$code&mode=reply&idx=$idx&page=$page><img src=/images/bbsimg/btn_re.gif border=0></a>";
}
$list_btn = "<a href=list.php?code=$code&page=$page><img src=/images/bbsimg/btn_list.gif border=0></a>&nbsp;&nbsp;";

// 조회수 증가
$sql = "update wiz_bbs set count = count+1 where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());


// 게시물 정보
$sql = "select * from wiz_bbs where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_row = mysql_fetch_object($result);

// 비밀글 권한체크
if($bbs_row->privacy == "Y" && $_SESSION[bbsauth_idx] != $idx) error("비밀글입니다.");

if(isImgtype("./upfile/".$code."/thumbM_".$bbs_row->upfile)) $bbs_row->upimg .= "<a href=javascript:openImg('$bbs_row->upfile');><img src='./upfile/$code/thumbM_".$bbs_row->upfile."' border='0'></a><br>";
if(isImgtype("./upfile/".$code."/thumbM_".$bbs_row->upfile2)) $bbs_row->upimg .= "<a href=javascript:openImg('$bbs_row->upfile2');><img src='./upfile/$code/thumbM_".$bbs_row->upfile2."' border='0'></a><br>";
if(isImgtype("./upfile/".$code."/thumbM_".$bbs_row->upfile3)) $bbs_row->upimg .= "<a href=javascript:openImg('$bbs_row->upfile3');><img src='./upfile/$code/thumbM_".$bbs_row->upfile3."' border='0'></a><br>";

if($bbs_row->category != "") $bbs_row->subject = "[".$bbs_row->category."] ".$bbs_row->subject;
$bbs_row->content = str_replace("\n", "<br>", $bbs_row->content);

if($bbs_row->upfile != "") $bbs_row->upfile = "<a href='down.php?code=$code&idx=$idx'>$bbs_row->upfile_name</a><br>";
if($bbs_row->upfile2 != "") $bbs_row->upfile .= "<a href='down.php?code=$code&idx=$idx&no=2'>$bbs_row->upfile2_name</a><br>";
if($bbs_row->upfile3 != "") $bbs_row->upfile .= "<a href='down.php?code=$code&idx=$idx&no=3'>$bbs_row->upfile3_name</a>";



// 이전글
$sql = "select idx,subject from wiz_bbs where code = '$code' and idx > '$bbs_row->idx' order by idx asc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_object($result)) $prev = "<img src='/images/bbsimg/view_prev.gif' align='absmiddle'>: <a href='view.php?code=$code&idx=$row->idx'>$row->subject</a><br>";



// 다음글
$sql = "select idx,subject from wiz_bbs where code = '$code' and idx < '$bbs_row->idx' order by idx desc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_object($result)) $next = "<img src='/images/bbsimg/view_next.gif' align='absmiddle'>: <a href='view.php?code=$code&idx=$row->idx'>$row->subject</a>";

?>
<script language="javascript">
<!--
function openImg(img){
   var url = "openimg.php?code=<?=$code?>&img=" + img;
   window.open(url,"openImg","width=300,height=300,scrollbars=yes");
}
//-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr><td style="padding:15 0 0 0" align=center>
					<table border="0" cellpadding="0" cellspacing="0" width="686">
					  <tr><td align=center>
						<table border="0" cellpadding="0" cellspacing="0" width="98%">
						<tr><td>
							<table border="0" cellspacing="0" cellpadding="0" width="100%">
							<tr><td width="62"><img src="/images/bbsimg/view_t_title.gif"></td>
								<td background="/images/bbsimg/bar_bg1.gif" style="padding:5 0 0 15"><?=$bbs_row->subject?></td>
								<td background="/images/bbsimg/bar_bg1.gif" align=right><img src="/images/bbsimg/view_t_title_bg.gif"></td></tr>
							</table>
						</td></tr>
						<tr><td style="padding:7 0 7 0">
							<table border="0" cellspacing="0" cellpadding="0" width="100%">
							<tr>
							   <td style="padding:0 0 0 10" width="25%"><img src="/images/bbsimg/view_t_name.gif" align="absmiddle">: <?=$bbs_row->name?></td>
								<td width="25%"><img src="/images/bbsimg/view_t_date.gif" align="absmiddle">: <?=$bbs_row->wdate?></td>
								<td width="25%"><img src="/images/bbsimg/view_t_click.gif" align="absmiddle">: <?=$bbs_row->count?></td>
								<td width="25%"><img src="/images/bbsimg/view_t_file2.gif" align="absmiddle">: <?=$bbs_row->upfile?></td></tr>
							</table>
						</td></tr>
						<tr><td height="2" background="/images/bbsimg/board_bg.gif"></td></tr>
						<tr>
						  <td style="padding:10 20 10 20" valign="top" align="justify" height=200>
						  	 <?=$bbs_row->upimg?><?=$bbs_row->content?>
						  </td>
						</tr>
						<tr><td><? include "./comment.inc"; ?></td></tr>
						<tr>
						  <td colspan="5" align="center" height=63 background="/images/bbsimg/bar_bottom_bg.gif">
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr><td width=15><img src="/images/bbsimg/bar_bottom_bg_l.gif"></td>
								<td><?=$prev?><?=$next?></td>
								<td align=right><?=$list_btn?><?=$write_btn?><?=$modify_btn?><?=$delete_btn?><?=$reply_btn?></td>
								<td width=8><img src="/images/bbsimg/bar_bottom_bg_r.gif"></td></tr>
							</table>
						</td></tr></table>
				    </td></tr></table>
             </td></tr></table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>