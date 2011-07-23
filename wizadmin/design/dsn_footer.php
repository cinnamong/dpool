<? include "../../inc/global.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<? include "../inc/admin_check.inc"; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: 하단주소 관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function inputCheck(frm){
	
	document.frm.toggle.checked = true; doToggle();
	iText = iView.document.body.innerText;
   frm.content.value = iText;
   
}
-->
</script>
</head>
<body onLoad="Init();">

<table width="675" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
<input type="hidden" name="mode" value="footer">
<textarea name="content" style="display:none" ><?=$design_info->footer_html?></textarea>
  <tr>
    <td><img src="../image/mark_arrowR.gif" width="12" height="12" > <strong>하단주소 관리</strong></td>
  </tr>
  <tr><td height="5"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td bgcolor="D5D3D3">
<table width="100%" height="200" border="0" cellspacing="1" cellpadding="2">

<? $webedit_title = "하단주소 내용"; $webedit_height = 200; include "../webedit/webedit.inc"; ?>

</table>
</td>
</tr>
</table><br>
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