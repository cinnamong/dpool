<?
include "../../inc/global.inc";

function print_position($catcode){
	
	global $prdcode;
	
   $catcode1 = substr($catcode,0,2);
   $catcode2 = substr($catcode,0,4);
   $sql = "select * from wiz_category where catuse != 'N' and (catcode like '$catcode1%' and depthno = 1)
                                                or (catcode like '$catcode2%' and depthno = 2)
                                                or (catcode = '$catcode')";
   $result = mysql_query($sql) or error(mysql_error());
   
   $now_position = " &nbsp; Home";
   while($row = mysql_fetch_object($result)){
      $now_position .= " &gt; $row->catname";
   }
   
   $now_position .= " <a href=prd_save.php?mode=catlist&submode=delete&prdcode=$prdcode&catcode=$catcode><font color=red>[삭제]</font></a>";
   
   return $now_position;
}

?>
<html>
<head>
<title>:: 상품 카테고리 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript">
<!--
var prd_class = new Array();
<?
   $no = 0;
   $sql = "select catcode, catname, depthno from wiz_category order by priorno01 asc, priorno02 asc, priorno03 asc";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   while($row = mysql_fetch_object($result)){
      
      $code01 = substr($row->catcode,0,2);
      $code02 = substr($row->catcode,0,4);
      $code03 = substr($row->catcode,0,6);
      
      if($row->depthno == 1){ $catcode = $code01; $parent = 0; }
      if($row->depthno == 2){ $catcode = $code02; $parent = $code01; }
      if($row->depthno == 3){ $catcode = $code03; $parent = $code02; }
?>

prd_class[<?=$no?>] = new Array();
prd_class[<?=$no?>][0] = "<?=$catcode?>";
prd_class[<?=$no?>][1] = "<?=$row->catname?>";
prd_class[<?=$no?>][2] = "<?=$parent?>";
prd_class[<?=$no?>][3] = "<?=$row->depthno?>";

<?
   $no++;
   }
?>
var tno = <?=$total?>;

function setClass01(){
   
  var arrayClass = eval("document.write_form.class01");
  var arrayClass1 = eval("document.write_form.class02");
  var arrayClass2 = eval("document.write_form.class03");

  arrayClass.options[0] = new Option(":: 대분류 ::","");
  arrayClass1.options[0] = new Option(":: 중분류 ::","");
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='1'){
		 arrayClass.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
}

function changeClass01(){
  
  var arrayClass = eval("document.write_form.class01");
  var arrayClass1 = eval("document.write_form.class02");
  var arrayClass2 = eval("document.write_form.class03");
  
  var selidx = arrayClass.selectedIndex;
  var selvalue = arrayClass.options[selidx].value;
  
  arrayClass1.options.length=0;
  arrayClass2.options.length=0;
  arrayClass1.options[0] = new Option(":: 중분류 ::","");
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='2' && prd_class[no][2]==selvalue){
		 arrayClass1.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
  
}

function changeClass02(){
   
  var arrayClass1 = eval("document.write_form.class02");
  var arrayClass2 = eval("document.write_form.class03");
  
  var selidx = arrayClass1.selectedIndex;
  var selvalue = arrayClass1.options[selidx].value;
  
  arrayClass2.options.length=0;
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='3' && prd_class[no][2]==selvalue){
		 arrayClass2.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
  
}

function changeClass03(){
}

function showChangeprice(){
   if(write_form.changeprice.checked == true){
    divprice.style.display = '';
  }else{
    divprice.style.display='none';
  }
}
function showOption02(){
   if(option02.style.display == ''){
    option02.style.display = 'none';
  }else{
    option02.style.display='';
  }
}
function showOption03(){
   if(option03.style.display == ''){
    option03.style.display = 'none';
  }else{
    option03.style.display='';
  }
}

-->
</script>
<body onLoad="setClass01();" topmargin=0 leftmargin=0>
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: <?=$product?>상품 카테고리 ::</b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"><input type="button" value="닫 기" onClick="self.close();" class="t"> &nbsp; </td>
  </tr>
  <tr><td height=1 colspan=3></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="3" height="25">
<form name="write_form" action="prd_save.php" method="post" onSubmit="return inputCheck(this)">
<input type="hidden" name="mode" value="catlist">
<input type="hidden" name="submode" value="insert">
<input type="hidden" name="prdcode" value="<?=$prdcode?>">
  <tr> 
    <td height="25" width="120" bgcolor="f0f0f0">&nbsp;&nbsp;&nbsp;
      현재분류<br>
    </td>
    <td height="25" width="380">
      <table>
      <?
      $sql = "select * from wiz_cprelation where prdcode='$prdcode'";
      $result = mysql_query($sql) or error(mysql_error());
      while($row = mysql_fetch_object($result)){
      	echo "<tr><td>".print_position($row->catcode)."</td></tr>";
      }
      ?>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="D0D0D0" height="1" colspan="4"></td>
  </tr>
  <tr> 
    <td height="25" width="120" bgcolor="f0f0f0">&nbsp;&nbsp;&nbsp;분류추가<br></td>
    <td height="25" width="380"> &nbsp; 
    <select name="class01" onChange="changeClass01();">
    </select>
    <select name="class02" onChange="changeClass02();">
    </select>
    <select name="class03" onChange="changeClass03();">
    </select>&nbsp; 
    <input type="submit" value=" 추 가 " class="t">
    </td>
  </tr>
  <tr> 
    <td bgcolor="D0D0D0" height="1" colspan="4"></td>
  </tr>
</table>
</form>
</body>
</html>