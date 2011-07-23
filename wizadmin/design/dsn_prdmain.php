<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: 로고관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?
$sql = "select * from wiz_prdmain where type='$grp'";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
?>
<table width="675" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="prdmain">
<input type="hidden" name="grp" value="<?=$grp?>">
  <tr><td height="10"></td></tr>
  <tr>
    <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
      <strong><?=$row->typename?></strong></td>
  </tr>
</table>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="D5D3D3">
      <table width="700" border="0" cellspacing="1" cellpadding="2">
        <tr> 
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사용여부</td>
          <td width="200" bgcolor="F8F8F8">
          <input type="radio" name="<?=$row->type?>_isuse" value="Y" <? if($row->isuse == "Y" || $row->isuse == "") echo "checked"; ?> class="form1">사용함 
          <input type="radio" name="<?=$row->type?>_isuse" value="N" <? if($row->isuse == "N") echo "checked"; ?> class="form1">사용안함
          </td>
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;진열순서</td>
          <td width="200" bgcolor="F8F8F8">
          <select name="<?=$row->type?>_prior">
          <option value="1" <? if($row->prior == "1") echo "selected"; ?>>1
          <option value="2" <? if($row->prior == "2") echo "selected"; ?>>2
          <option value="3" <? if($row->prior == "3") echo "selected"; ?>>3
          <option value="4" <? if($row->prior == "4") echo "selected"; ?>>4
          </select>
          </td>
        </tr>
        <tr> 
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;정렬방식</td>
          <td width="200" bgcolor="F8F8F8">
          <select name="<?=$row->type?>_skin_type">
          <option value="type01" <? if($row->skin_type == "type01") echo "selected"; ?>>type01
          <!--
          <option value="type02" <? if($row->skin_type == "type02") echo "selected"; ?>>type02
          <option value="type03" <? if($row->skin_type == "type03") echo "selected"; ?>>type03
          -->
          </select>
          </td>
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품수</td>
          <td width="200" bgcolor="F8F8F8">
          <input type="text" name="<?=$row->type?>_prd_num" value="<?=$row->prd_num?>" class="form1">
          </td>
        </tr>
        <tr> 
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품사이즈</td>
          <td width="550" bgcolor="F8F8F8" colspan="3">
          가로<input type="text" name="<?=$row->type?>_prd_width" value="<?=$row->prd_width?>" size="9" class="form1"> x 
          세로<input type="text" name="<?=$row->type?>_prd_height" value="<?=$row->prd_height?>" size="9" class="form1">
          &nbsp; (기본 100x100)
          </td>
        </tr>
        <tr> 
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;바이미지</td>
          <td width="550" bgcolor="F8F8F8" colspan="3">
          <?
          if(is_file("../../images/mainimg/$row->barimg")) echo "<img src=/images/mainimg/$row->barimg width=450> <a href='dsn_save.php?mode=prdbar_delete&type=$row->type&file=$row->barimg'><font color=red>[삭제]</font></a><br>";
          ?>
          <input type="file" name="<?=$row->type?>_barimg" class="form1">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table><br>

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="D5D3D3">
      <table width="700" border="0" cellspacing="1" cellpadding="2">
        <tr> 
          <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;신상품 상단<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HTML</td>
          <td width="550" bgcolor="F8F8F8">
          <textarea name="<?=$row->type?>_html" rows="10" cols="80" class="textarea"><?=$row->html?></textarea>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?
}
?>



<table width="700" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
    <td width="10">&nbsp;</td>
    <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="self.close();"></td>
  </tr>
</form>
</table>
</body>
</html>