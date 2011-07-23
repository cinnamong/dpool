<?
include "../../inc/global.inc";
?>
<html>
<head>
<title>:: 옵션항목 관리 ::</title>
<script language="javascript">
<!--
function chgOption(frm){
	var idx = frm.opttitle.value;
	document.location = "option_list.php?idx=" + idx + "&optno=<?=$optno?>";
}

function selOption(frm){
	
	var opttext = "";
	var optvalue = "";
	var optlist = "";
	var optlist_2 = "";
	var opttitle = frm.opttitle.options[frm.opttitle.selectedIndex].text;
	var optcode = frm.optcode.value;
	var tmp_optcode = optcode.split("\n");
	var objReg = /[^A-Za-z0-9_ㄱ-ㅎ가-힝]/g;
	
<?
	if($optno == "opt1"){
?>
	for(ii=0; ii < tmp_optcode.length; ii++){
		
		tmp_optcode[ii] = tmp_optcode[ii].replace(objReg,'');
		optvalue = "" + tmp_optcode[ii] + "^0^0^^";
		opttext = "" + tmp_optcode[ii] + " - 0원 : 0개^^";
		
		optlist = optlist + optvalue;
		optlist_2 = optlist_2 + opttext;
	}

	opener.document.frm.opttitle.value = opttitle;
	
	opener.document.frm.optlist.value = optlist;
	opener.document.frm.opttext.value = optlist_2;
	opener.document.frm.opttitle.focus();
	
	
<?
	}else if($optno == "opt2"){
?>
	
	for(ii=0; ii < tmp_optcode.length; ii++){
		
		tmp_optcode[ii] = tmp_optcode[ii].replace(objReg,'');
		optvalue = ""+tmp_optcode[ii]+",";
		
		optlist = optlist + optvalue;
	}
	optlist = optlist.substring(0,optlist.length-1);
	opener.document.frm.opttitle2.value = opttitle;
	opener.document.frm.optcode2.value = optlist;

	
<?
	}else if($optno == "opt3"){
?>

	for(ii=0; ii < tmp_optcode.length; ii++){
		
		tmp_optcode[ii] = tmp_optcode[ii].replace(objReg,'');
		optvalue = ""+tmp_optcode[ii]+",";
		
		optlist = optlist + optvalue;
	}
	optlist = optlist.substring(0,optlist.length-1);
	opener.document.frm.opttitle3.value = opttitle;
	opener.document.frm.optcode3.value = optlist;

	
<?
	}
?>
	self.close();
}
//-->
</script>
</head>
<link href="../style.css" rel="stylesheet" type="text/css">
<body  bgcolor="#909090">
<table width="100%" bgcolor="#909090" align="center">
<form name="frm">
  <tr>
    <td><font color="#ffffff">옵션명</font></td>
    <td>
      <select name="opttitle" onChange="chgOption(this.form);">
      <?
      $sql = "select idx, opttitle, optcode from wiz_option order by idx desc";
      $result = mysql_query($sql) or error(mysql_error());
      $no = 0;
	   while($row = mysql_fetch_object($result)){
	   	if($idx == "" && $no == 0) $optcode = $row->optcode; 
	   	if($idx == $row->idx) $selected = "selected";
	   	else $selected = "";
	   	echo "<option value='$row->idx' $selected>$row->opttitle\n";
	   	
	   	$no++;
	   }
      ?>
      </select>
    </td>
  </tr>
  <tr>
    <td><font color="#ffffff">옵션항목</font></td>
    <td>
    <?
    if($idx != ""){
	    $sql = "select * from wiz_option where idx='$idx'";
	    $result = mysql_query($sql) or error(mysql_error());
	    $row = mysql_fetch_object($result);
	    $optcode = $row->optcode; 
    }
    ?>
    <textarea name="optcode" rows="6" cols="40"  class="textarea"><?=$optcode?></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><font color="#ffffff">* 한줄에 하나의 옵션을 입력하세요</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="button" value=" 적 용 " class="xbtn" onClick="selOption(this.form);"> &nbsp; 
      <input type="button" value=" 취 소 " class="xbtn" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
</body>
</html>