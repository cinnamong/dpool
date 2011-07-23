<?
if($bbs_info->comment == "Y"){
?>
<script language="javascript">
<!--
function deleteComment(idx){
	var url = "save.php?mode=delco&code=<?=$code?>&bbs_idx=<?=$idx?>&idx=" + idx;
	window.open(url, "deleteComment", "height=175, width=300, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=250, top=250");
}

function memberCheck(){
<?
	if($wiz_session[level] > $bbs_info->cpermi){ 
		echo "alert('작성권한이 없습니다.'); document.comment.name.value=''; comment.name.blur(); comment.passwd.blur(); comment.content.blur(); return false;";
	}else {
		echo "return true;";
	}
?>
}

function commentCheck(){
	
	if(memberCheck()){
		if(frm.content.value == ""){
	      alert("내용을 입력하세요");
	      frm.content.focus();
	      return false;
	   }
	   if(frm.name.value == ""){
	      alert("이름을 입력하세요");
	      frm.name.focus();
	      return false;
	   }
	   if(frm.passwd.value == ""){
	      alert("비밀번호를 입력하세요");
	      frm.passwd.focus();
	      return false;
	   }
	}else{
		return false;
	}
}
-->
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
	$sql = "select * from wiz_comment where bbsidx='$idx' order by idx desc";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
		$row->content = str_replace("\n", "<br>", $row->content);
?>
	<tr>
	  <td width="10%" height="25">&nbsp; <b><?=$row->name?></b></td>
	  <td width="90%">
	  <?=$row->content?><font color="red" style="cursor:hand" onClick="if(co_<?=$row->idx?>.style.display == 'none') co_<?=$row->idx?>.style.display=''; else co_<?=$row->idx?>.style.display='none'; ">x</font>
	  <div id='co_<?=$row->idx?>' style="display:none">
	  <table>
	  <form action="save.php">
	  <input type="hidden" name="mode" value="delco">
     <input type="hidden" name="code" value="<?=$code?>">
     <input type="hidden" name="bbs_idx" value="<?=$idx?>">
     <input type="hidden" name="idx" value="<?=$row->idx?>">
	  <tr>
	  <td><input type="password" name="passwd" size="10" class="input"></td>
	  <td><input type="submit" value="삭제" class="input"></td>
	  </tr>
	  </form>
	  </table>
	  </div>
	  </td>
	</tr>
<?
	}
?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="comment" action="save.php" method="post" onSubmit="return commentCheck(this);">
<input type="hidden" name="mode" value="comment">
<input type="hidden" name="code" value="<?=$code?>">
<input type="hidden" name="idx" value="<?=$idx?>">
<tr><td height=35>
		<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr>
		   <td>&nbsp; <b>덧글달기</b></td>
			<td width=140 align=right>이름 <input type=text name=name value="<?=$wiz_session[name]?>" onClick="memberCheck();" size=10 class="input"></td>
			<td width=140 align=right>비밀번호 <input type=password name=passwd onClick="memberCheck();" size=10 class="input"></td>
			<td width=70 align=right><table cellpadding="0" cellspacing="0"><tr><td></td></tr></table><input type="image" src="/images/but_comment_write.gif" border=0></a></td></tr>
		</table>
</td></tr>
<tr><td align=center><textarea name="content" cols="111" rows="3" onClick="memberCheck();" class="input"></textarea></td></tr>
</form>
</table><br>
<?
}
?>
