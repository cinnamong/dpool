<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/bbs_info.inc"; 	 	// 게시판 정보

$now_position = "<a href=/>Home</a> &gt; 커뮤니티 &gt; <b>$bbs_info->title</b>";

include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

if(empty($wiz_session[level])) $wiz_session[level] = "ZM";
$list_btn = "<a href=list.php?code=$code><img src=/images/bbsimg/btn_list.gif border=0></a>&nbsp;&nbsp;";
$confirm_btn = "<input type=image src=/images/bbsimg/btn_ok.gif border=0>";
$cancel_btn = "<img src=/images/bbsimg/btn_cancel.gif border=0 onClick=history.go(-1) style=cursor:hand>";

// 작성
if($mode == "write"){
	
	if($bbs_info->wpermi < $wiz_session[level]) error("글작성 권한이 없습니다.");
	
	$bbs_row->name = $wiz_session[name];
	$bbs_row->email = $wiz_session[email];

// 수정
}else if($mode == "modify"){
	
	if($_SESSION[bbsauth_idx] != $idx) error("해당게시물을 수정할 수 없습니다.");
	$sql = "select * from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_object($result);

// 답변
}else if($mode == "reply"){

	$sql = "select subject,content from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_object($result);

}

?>

<script language="JavaScript">
<!--
function inputCheck(frm){

  if(frm.name.value == ""){
    alert("작성자를 입력하세요.");
    frm.name.focus();
    return false;
  }
  if(frm.passwd.value == ""){
    alert("비밀번호를 입력하세요.");
    frm.passwd.focus();
    return false;
  }
  if(frm.subject.value == ""){
    alert("제목을 입력하세요.");
    frm.subject.focus();
    return false;
  }
  if(frm.content.value == ""){
    alert("내용을 입력하세요.");
    frm.content.focus();
    return false;
  }
  
}
-->
</script>
          

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<form name="frm" action="save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
               <input type="hidden" name="code" value="<?=$code?>">
               <input type="hidden" name="mode" value="<?=$mode?>">
               <input type="hidden" name="idx" value="<?=$idx?>">
               <input type="hidden" name="page" value="<?=$page?>">
					<tr><td style="padding:15 0 0 0" align=center>
					<table border="0" cellpadding="0" cellspacing="0" width="686">
					  <tr>
					  <td>
						<table border="0" cellpadding="1" cellspacing="0" width="100%">
						<tr><td colspan="2" height="2" background="/images/bbsimg/board_bg.gif"></td>
						</tr>
						<tr><td height="30" width="100"><img src="/images/bbsimg/view_t_writer.gif"></td>
							<td><input type="text" name="name" value="<?=$bbs_row->name?>" size="20" class="input"></td>
						</tr>
						<tr><td colspan="2" height="1" background="/images/bbsimg/board_bg.gif"></td>
						</tr>
						<tr><td height="30"><img src="/images/bbsimg/write_t_email.gif"></td>
							<td><input type="text" name="email" value="<?=$bbs_row->email?>" size="40" class="input"></td>
						</tr>
						<tr><td colspan="2" height="1" background="/images/bbsimg/board_bg.gif"></td>
						</tr>
						<tr><td height="30"><img src="/images/bbsimg/write_t_password.gif"></td>
							<td><input type="password" name="passwd" value="<?=$bbs_row->passwd?>" size="20" class="input">&nbsp;
							<input type="checkbox" name="privacy" value="Y" <? if($bbs_row->privacy == "Y" || $bbs_info->privacy == "Y") echo "checked"; ?> style="border:0px; background-color:transparent;"> 비밀글</td>
						</tr>
						<?
						if($bbs_info->upfile == "Y"){
						?>
						<tr><td colspan="2" height="1" background="/images/bbsimg/board_bg.gif"></td></tr>
						<tr><td height="30"><img src="/images/bbsimg/view_t_file.gif"></td>
							<td><input type="file" name="upfile" size="30" class="input"></td>
						</tr>
						<?
						}
						?>
						<tr><td colspan="2" height="1" background="/images/bbsimg/board_bg.gif"></td></tr>
						<tr>
						  <td height="30"><img src="/images/bbsimg/write_t_title.gif"></td>
						  <td>
						  <?
	                 if($bbs_info->grp != ""){
	                 	$catlist = explode(",",$bbs_info->grp);
	                 ?>
                      <select name="grp">
                      <option value="">grp
                    <?
                    for($ii=0;$ii<count($catlist);$ii++){
                      if($bbs_row->grp == $catlist[$ii]) $selected = "selected";
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
                    <input type="text" name="subject" value="<?=$bbs_row->subject?>" size="60" class="input"></td>
						</tr>
						<tr><td colspan="2" height="1" background="/images/bbsimg/board_bg.gif"></td></tr>
						<tr><td height="30">
								<table border="0" cellpadding="0" cellspacing="0" width="63" height="100%">
								<tr><td background="/images/bbsimg/write_t_bg1.gif" height="4"></td></tr>
								<tr><td background="/images/bbsimg/write_t_bg2.gif"><img src="/images/bbsimg/write_t_contents.gif"></td></tr>
								<tr><td background="/images/bbsimg/write_t_bg3.gif" height="4"></td></tr>
								</table>
							</td>
							<td style="padding:5 0 5 0"><textarea name="content" cols="85" rows="13" class="input"><?=$bbs_row->content?></textarea></td></tr>
						<tr><td colspan="2" height="1" bgcolor=#ffffff></td></tr>
						<tr><td colspan="2" height="2" background="/images/bbsimg/board_bg.gif"></td></tr>
						</table>

					</td></tr>
					<tr>
					  <td>
					  <table border="0" cellpadding="1" cellspacing="0" width="100%">
					  <td width="70"><?=$list_btn?></td>
					  <td align="center" height=63><?=$confirm_btn?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cancel_btn?></td>
					  </table>
					  </td>
					</tr></table>
					</td></tr>
					</form>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>