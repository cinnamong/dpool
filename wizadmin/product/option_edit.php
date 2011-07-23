<? include "../../inc/global.inc"; ?>
<?
$sql = "select optcode from wiz_product where prdcode = '$prdcode'";
$result = mysql_query($sql) or error(mysql_error());
$opt_row = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: 可记荐沥 ::</title>
<script language="javascript">
<!--
function setOption(){
	var optvalue = "";
	var optcode_01 = "";
	var optcode_02 = "";
	var optcode_03 = "";
	
	for(i=0;i<document.forms.length;i++){
		
		optcode_01 = document.forms[i].optcode_01.value;
		optcode_02 = document.forms[i].optcode_02.value;
		optcode_03 = document.forms[i].optcode_03.value;
		
		optvalue += optcode_01 + "^" + optcode_02 + "^" + optcode_03 + "^^";

	}
	
	document.location = 'prd_save.php?mode=optedit&prdcode=<?=$prdcode?>&optvalue=' + optvalue;

}

//-->
</script>
</head>
<link href="../style.css" rel="stylesheet" type="text/css">
<body  bgcolor="#909090">
<table bgcolor="#909090" align="center">
  <tr>
    <td><b><font color="#ffffff">可记亲格汲沥</font></b></td>
    <td colspan="2" align="right">
      <input type="button" value=" 利 侩 " class="xbtn" onClick="setOption();">
      <input type="button" value=" 秒 家 " class="xbtn" onClick="self.close();">
    </td>
  </tr>


	<?
	$no = 0;
	$opt_list = explode("^^",$opt_row->optcode);
	for($ii=0; $ii < count($opt_list)-1; $ii++){
		
		$opt_list2 = explode("^",$opt_list[$ii]);
		
	?>
  <form name="frm_<?=$no?>">
  <tr>
    <td><input type="text" size="12" name="optcode_01" value="<?=$opt_list2[0]?>" class="form1"></td>
    <td><input type="text" size="12" name="optcode_02" value="<?=$opt_list2[1]?>" class="form1"></td>
    <td><input type="text" size="12" name="optcode_03" value="<?=$opt_list2[2]?>" class="form1"></td>
  </tr>
  </form>
	<?
	  $no++;
	}
	?>

</table>
</body>
</html>