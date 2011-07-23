<? include "../../inc/global.inc"; ?>
<?
if($mode == "update"){
	$sql = "select * from wiz_option where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
}
?>
<html>
<head>
<title>:: 옵션항목 관리 ::</title>
<script language="javascript">
<!--
function inputCheck(frm){
	if(frm.opttitle.value == ""){
		alert("옵션명을 입력하세요.");
		frm.opttitle.focus();
		return false;
	}
	if(frm.optcode.value == ""){
		alert("옵션항목을 입력하세요.");
		frm.optcode.focus();
		return false;
	}
}

//-->
</script>
</head>
<link href="../style.css" rel="stylesheet" type="text/css">
<body  bgcolor="#909090">
<table width="100%" bgcolor="#909090" align="center">
<form name="frm" action="option_save.php" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="idx" value="<?=$idx?>">
  <tr>
    <td><font color="#ffffff">옵션명</font></td>
    <td><input type="text" size="41" name="opttitle" value="<?=$row->opttitle?>" class="form1"></td>
  </tr>
  <tr>
    <td><font color="#ffffff">옵션항목</font></td>
    <td><textarea name="optcode" rows="6" cols="40"  class="textarea"><?=$row->optcode?></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><font color="#ffffff">* 한줄에 하나의 옵션을 입력하세요</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value=" 확 인 " class="xbtn"> &nbsp; 
      <input type="button" value=" 취 소 " class="xbtn" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
</body>
</html>