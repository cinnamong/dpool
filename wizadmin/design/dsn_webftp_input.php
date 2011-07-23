<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?

// 상위로 접근차단
if(empty($file_path) || substr($file_path, 0,1) == "/" || strpos($file_path, "../", 6) > 0){
   echo "<script>alert('접근할 수 없습니다.');self.close();</script>";
   exit;
}

$web_path = $HTTP_HOST."/".str_replace("../../", "", $file_path);

?>
<html>
<head>
<title>:: WEB-FTP ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/valueCheck.js"></script>
<script language="JavaScript">
<!--
//-->
</script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b> &nbsp; 현재위치 : http://<?=$web_path?> </b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"><input type="button" value="닫 기" onClick="self.close();" class="t"> &nbsp; </td>
  </tr>
  <tr><td height=1 colspan=3></td></tr>
</table>

<?
if($mode == "" || $mode == "insert"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form name="inputForm" action="dsn_webftp_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="submode" value="createfile">
<input type="hidden" name="file_path" value="<?=$file_path?>">
  <tr>
    <td bgcolor="D5D3D3">
      <table width="100%" border="0" cellspacing="1" cellpadding="6">
        <tr> 
          <td width="120" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이미지업로드</td>
          <td bgcolor="F8F8F8" colspan="3">
          <input type="file" name="create_file" class="form1"><br>
          <input type="file" name="create_file2" class="form1"><br>
          <input type="file" name="create_file3" class="form1"><br>
          <input type="file" name="create_file4" class="form1"><br>
          <input type="file" name="create_file5" class="form1">
          <input type="submit" value="확 인" class="t">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</form>
</table>

<table width="100%" height="10" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr><td></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form name="inputForm" action="dsn_webftp_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="submode" value="createdir">
<input type="hidden" name="file_path" value="<?=$file_path?>">
  <tr>
    <td bgcolor="D5D3D3">
      <table width="100%" border="0" cellspacing="1" cellpadding="6">
        <tr> 
          <td width="120" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;디렉토리생성</td>
          <td bgcolor="F8F8F8" colspan="3">
          <input type="text" name="create_dir" value="<?=$file_name?>" class="form1">
          <input type="submit" value="확 인" class="t">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</form>
</table>

<?
}else if($mode == "update"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form action="dsn_webftp_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="file_path" value="<?=$file_path?>">
<input type="hidden" name="selfile" value="<?=$selfile?>">
<input type="hidden" name="page" value="<?=$page?>">
  <tr>
    <td bgcolor="D5D3D3">
<?
	$i=0;
	$array_selfile = explode("|",$selfile);
	while($array_selfile[$i]){
		if(is_file("$file_path/$array_selfile[$i]")){
?>
      <table width="100%" border="0" cellspacing="1" cellpadding="6">
        <tr> 
          <td width="120" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;파일변경</td>
          <td bgcolor="F8F8F8" colspan="3">
          <img src="<?=$file_path?>/<?=$array_selfile[$i]?>"><br>
          <input type="hidden" name="selname[]" value="<?=$array_selfile[$i]?>">
          <input type="file" name="upfile[]" class="form1">
          </td>
        </tr>
      </table>
      <table bgcolor="#ffffff" width="100%" height="5" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr><td></td></tr>
      </table>
<?
		}else{
?>
		<table width="100%" border="0" cellspacing="1" cellpadding="6">
        <tr> 
          <td width="120" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;폴더명변경</td>
          <td bgcolor="F8F8F8" colspan="3">
          <input type="hidden" name="seldir[]" value="<?=$array_selfile[$i]?>">
          <input type="text" name="upname[]" value="<?=$array_selfile[$i]?>" class="form1">
          </td>
        </tr>
      </table>
      <table bgcolor="#ffffff" width="100%" height="5" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr><td></td></tr>
      </table>
<?
		}
		$i++;
	}
?>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="35">
  <tr> 
    <td align="center">
      <input type="submit" value="확 인" class="t"> &nbsp; 
      <input type="button" value="취 소" class="t" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
<?
}
?>
</body>
</html>