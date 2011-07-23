<?
include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>아이디 중복 체크</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
// 입력값 체크
function inputCheck(){
	
	if(frm.id.value.length < 3 || frm.id.value.length > 12){
		alert("아이디는 3 ~ 12자리만 가능합니다.");
		frm.id.focus();
		return false;
	}else{
      if(!Check_Char(frm.id.value)){
      	alert("아이디는 특수문자를 사용할수 없습니다.");
      	frm.id.focus();
      	return false;
      }
   }
   
}

// 아이디 입력폼으로 전송
function setId(){
	opener.frm.id.value = '<?=$id?>';
	opener.frm.passwd.focus();
	self.close();
}
//-->
</script>
</head>

<body onLoad="document.frm.id.focus();" style="background-color:#F6F6F6">
<?
   $sql = "select id from wiz_member where id='$id'";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   
   if($id != ""){
      if($total > 0){
         $message = "<font color=#00BCBC><b>\"$id\"</b></font> 는 이미사용중인 아이디 입니다.";
      }else{
         $message = "<font color=#00BCBC><b>\"$id\"</b></font> 는 사용가능한 아이디 입니다.<br><a href='javascript:setId();'><img src='/images/but_use.gif' border=0></a>";
      }
   }
?>
		<table border=0 cellpadding=0 cellspacing=0 width=350 height=200>
		<form name="frm" action="<?=$PHP_SELF?>" method="post" onSubmit="return inputCheck(this);">
		<tr><td height=55><img src="/images/id_check_01.gif"></td></tr>
		<tr><td bgcolor=#ffffff valign=top>
			 <table border=0 cellpadding=0 cellspacing=0 align=center>
				<tr height=70>
					<td><img src="/images/id_check_id.gif"></td>
					<td><input type="text" name="id" class="input"></td>
					<td width=60 align=right><input type="image" src="/images/but_idcheck.gif" border=0></a></td></tr>
				<tr>
				  <td colspan=3 align=center><?=$message?></td>
				</tr>
			 </table>
		</td></tr>
		<tr><td bgcolor=#E0E0E0 height=1></td></tr>
		<tr><td height=30 align=right style="padding:0 30 0 0"><a href="javascript:self.close();"><img src="/images/id_check_close.gif" border=0></a></td></tr>
		</form>
		</table>
</body>
</html>
