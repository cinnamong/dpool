<? include "./inc/global.inc"; ?>
<?
$sql = "select title,linkurl,content from wiz_content where idx = '$idx'";
$result = mysql_query($sql);
$popup_info = mysql_fetch_object($result);
?>
<html>
<head>
<title><?=$popup_info->title?></title>
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
<script language="javascript">
<!--
  function popupClose(){
    setCookie("popupDayClose<?=$idx?>", "true", 1);
    self.close();
  }
  
  function setCookie( name, value, expiredays ) 
  { 
    var todayDate = new Date(); 
    todayDate.setDate( todayDate.getDate() + expiredays ); 
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
  } 
//-->
</script>
</head>
<body topmargin="0" leftmargin="0">
<table border="0" cellpadding="0" cellspacing="0" onclick="javascript:opener.location = '<?=$popup_info->linkurl?>';window.close();">
<tr><td><?=$popup_info->content?></td></tr>
</table>
<table width="100%" height="25" bgcolor="#909090" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font color=#ffffff>오늘하루 열지않음</font> <input type="checkbox" onClick="popupClose();">&nbsp; </td>
  </tr>
</table>
</body>
</html>