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
<title>:: �ɼ��׸� ���� ::</title>
<script language="javascript">
<!--
function inputCheck(frm){
	if(frm.opttitle.value == ""){
		alert("�ɼǸ��� �Է��ϼ���.");
		frm.opttitle.focus();
		return false;
	}
	if(frm.optcode.value == ""){
		alert("�ɼ��׸��� �Է��ϼ���.");
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
    <td><font color="#ffffff">�ɼǸ�</font></td>
    <td><input type="text" size="41" name="opttitle" value="<?=$row->opttitle?>" class="form1"></td>
  </tr>
  <tr>
    <td><font color="#ffffff">�ɼ��׸�</font></td>
    <td><textarea name="optcode" rows="6" cols="40"  class="textarea"><?=$row->optcode?></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><font color="#ffffff">* ���ٿ� �ϳ��� �ɼ��� �Է��ϼ���</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value=" Ȯ �� " class="xbtn"> &nbsp; 
      <input type="button" value=" �� �� " class="xbtn" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
</body>
</html>