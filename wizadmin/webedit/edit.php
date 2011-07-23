<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
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


var viewMode = 1;
var font_name = '' ;

function Init()
{
   iView.document.designMode = 'On';
   iView.document.write("<style> P {margin-top:2px;margin-bottom:2px;}</style>" ) ;
   if( document.frm.content.value.length > 0 )
   {
      iView.document.write(document.frm.content.value ) ;
   }
   else
   {
      iView.document.write("&nbsp;") ;
   }
}

function selOn(ctrl)
{
   ctrl.style.borderColor = '#000000';
   ctrl.style.backgroundColor = '#B5BED6';
   ctrl.style.cursor = 'hand';
}

function selOff(ctrl)
{
   ctrl.style.borderColor = '#D6D3CE';  
   ctrl.style.backgroundColor = '#D6D3CE';
}

function selDown(ctrl)
{
   ctrl.style.backgroundColor = '#8492B5';
}

function selUp(ctrl)
{
   ctrl.style.backgroundColor = '#B5BED6';
}

function doBold()
{
   iView.document.execCommand('bold', false, null);
   iView.focus() ;
}

function doItalic()
{
   iView.document.execCommand('italic', false, null);
   iView.focus() ;
}

function doUnderline()
{
   iView.document.execCommand('underline', false, null);
   iView.focus() ;
}

function doLeft()
{
   iView.document.execCommand('justifyleft', false, null);
   iView.focus() ;
}

function doCenter()
{
   iView.document.execCommand('justifycenter', false, null);
   iView.focus() ;
}

function doRight()
{
   iView.document.execCommand('justifyright', false, null);
   iView.focus() ;
}

function doOrdList()
{
   iView.document.execCommand('insertorderedlist', false, null);
   iView.focus() ;
}

function doBulList()
{
   iView.document.execCommand('insertunorderedlist', false, null);
   iView.focus() ;
}

function doRule()
{
   iView.document.execCommand('inserthorizontalrule', false, null);
   iView.focus() ;
}

// 테이블 삽입
function doTable()
{
   window.open('./table.php', 'doTable', 'width=354,height=286,resizeable=yes,scrollbars=no');
}

// 링크걸기
function doLink()
{
   window.open('./link.php', 'doLink', 'width=378,height=116,resizeable=yes,scrollbars=no');
}

// 멀티미디어 링크
function doMultilink(){
   window.open('./multimedia.php', 'doMultilink', 'width=378,height=116,resizeable=yes,scrollbars=no');
}

// 이미지 삽입
function doImage()
{
   window.open('./image.php', 'doImage', 'width=407,height=332');
}

// 글자색
function doForcol( type )
{
   window.open('./font_color.php', 'doForcol', 'toolbar=no,scrollbars=no,menubar=no,width=210,height=350') ;
}

// 글자배경색
function doBgcol()
{
   window.open('./font_bg.php', 'doBgcol', 'toolbar=no,scrollbars=no,menubar=no,width=210,height=360') ;
   
}

// 폰트타입
function doFont()
{
   window.open('./font_type.php', 'doImage', 'width=215, height=150');
}

// 폰트사이즈
function doSize(fSize)
{
   window.open('./font_size.php', 'doImage', 'width=300, height=230');
}

function doHead(hType)
{
   if(hType != '')
   {
      iView.document.execCommand('FormatBlock', false, hType);  
      doFont( font_name );
   }
   
   iView.focus() ;
}

function doToggleView()
{  
   if(viewMode == 1)
   {
      iHTML = iView.document.body.innerHTML;
      iView.document.body.innerText = iHTML;
      
      // Hide all controls
      tblCtrls.style.display = 'none';
      iView.focus();
      
      viewMode = 2;
   }
   else
   {
      iText = iView.document.body.innerText;
      iView.document.body.innerHTML = iText;
      
      // Show all controls
      tblCtrls.style.display = 'inline';
      iView.focus();
      
      viewMode = 1;
   }
   
   iView.focus() ;
}

function inputCheck(form){
   if(viewMode == 1){
   iHTML = iView.document.body.innerHTML;
   form.content.value = iHTML;
   }else{
   iText = iView.document.body.innerText;
   iView.document.body.innerHTML = iText;
   form.content.value = iHTML;
   }
}

//-->
</script>
</head>

<body leftmargin="0" topmargin="0" onLoad="Init();MM_preloadImages('image/wtool1_1.gif','image/wtool2_1.gif','image/wtool3_1.gif','image/wtool4_1.gif','image/wtool5_1.gif','image/wtool6_1.gif','image/wtool7_1.gif','image/wtool8_1.gif','image/wtool9_1.gif','image/wtool11_1.gif','image/wtool13_1.gif','image/wtool10_1.gif','image/wtool12_1.gif','image/wtool14_1.gif','image/bt_html_1.gif','image/bt_source_1.gif')">


<form name=frm action="save.php" method=post onSubmit="inputCheck(this);">
<input type=hidden name=content value="">
<input type=hidden name=description>
<table width="540" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td bgcolor="D1D0D0">
      <table id="tblCtrls" width="540" border="0" cellspacing="1" cellpadding="0">
        <tr> 
          <td bgcolor="F9F8F8"><table width="540" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="98" height="56"><table width="81" height="56" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr align="center" valign="bottom"> 
                      <td height="26"><a href="javascript:doBold();" onMouseOver="MM_swapImage('Image1','','/image/webedit/wtool1_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool1.gif" name="Image1" width="19" height="18" border="0" id="Image1"></a></td>
                      <td><a href="javascript:doItalic();" onMouseOver="MM_swapImage('Image2','','/image/webedit/wtool2_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool2.gif" name="Image2" width="19" height="18" border="0" id="Image2"></a></td>
                      <td><a href="javascript:doUnderline();" onMouseOver="MM_swapImage('Image3','','/image/webedit/wtool3_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool3.gif" name="Image3" width="19" height="18" border="0" id="Image3"></a></td>
                    </tr>
                    <tr> 
                      <td height="3" colspan="3"></td>
                    </tr>
                    <tr align="center" valign="top"> 
                      <td height="27"><a href="javascript:doLeft();" onMouseOver="MM_swapImage('Image8','','/image/webedit/wtool8_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool8.gif" name="Image8" width="19" height="18" border="0" id="Image8"></a></td>
                      <td><a href="javascript:doCenter();" onMouseOver="MM_swapImage('Image9','','/image/webedit/wtool9_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool9.gif" name="Image9" width="19" height="18" border="0" id="Image9"></a></td>
                      <td><a href="javascript:doRight();" onMouseOver="MM_swapImage('Image10','','/image/webedit/wtool10_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool10.gif" name="Image10" width="19" height="18" border="0" id="Image10"></a></td>
                    </tr>
                  </table></td>
                <td width="2"><img src="image/bar.gif" width="2" height="39" align="absmiddle"></td>
                <td width="102"><table width="104" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="104" height="27" align="center" valign="bottom"><a href="javascript:doFont();" onMouseOver="MM_swapImage('Image4','','/image/webedit/wtool4_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool4.gif" name="Image4" width="84" height="22" border="0" id="Image4"></a></td>
                    </tr>
                    <tr>
                      <td height="2"></td>
                    </tr>
                    <tr> 
                      <td height="27" align="center" valign="top"><a href="javascript:doSize();" onMouseOver="MM_swapImage('Image11','','/image/webedit/wtool11_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool11.gif" name="Image11" width="84" height="22" border="0" id="Image11"></a></td>
                    </tr>
                  </table></td>
                <td width="2"><img src="image/bar.gif" width="2" height="39" align="absmiddle"></td>
                <td width="112"><table width="112" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="27" align="center" valign="bottom"><a href="javascript:doForcol();" onMouseOver="MM_swapImage('Image5','','/image/webedit/wtool5_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool5.gif" name="Image5" width="95" height="22" border="0" id="Image5"></a></td>
                    </tr>
                    <tr> 
                      <td height="2"></td>
                    </tr>
                    <tr> 
                      <td height="27" align="center" valign="top"><a href="javascript:doBgcol();" onMouseOver="MM_swapImage('Image12','','/image/webedit/wtool12_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool12.gif" name="Image12" width="95" height="22" border="0" id="Image12"></a></td>
                    </tr>
                  </table></td>
                <td width="2"><img src="image/bar.gif" width="2" height="39" align="absmiddle"></td>
                <td width="92"><table width="92" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="27" align="center" valign="bottom"><a href="javascript:doImage();" onMouseOver="MM_swapImage('Image6','','/image/webedit/wtool6_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool6.gif" name="Image6" width="73" height="22" border="0" id="Image6"></a></td>
                    </tr>
                    <tr> 
                      <td height="2"></td>
                    </tr>
                    <tr> 
                      <td height="27" align="center" valign="top"><a href="javascript:doTable();" onMouseOver="MM_swapImage('Image13','','/image/webedit/wtool13_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool13.gif" name="Image13" width="73" height="22" border="0" id="Image13"></a></td>
                    </tr>
                  </table></td>
                <td width="2"><img src="image/bar.gif" width="2" height="39" align="absmiddle"></td>
                <td width="126"><table width="126" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="27" align="center" valign="bottom"><a href="javascript:doLink();" onMouseOver="MM_swapImage('Image7','','/image/webedit/wtool7_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool7.gif" name="Image7" width="74" height="22" border="0" id="Image7"></a></td>
                    </tr>
                    <tr> 
                      <td height="2"></td>
                    </tr>
                    <tr> 
                      <td height="27" align="center" valign="top"><a href="javascript:doMultilink();" onMouseOver="MM_swapImage('Image14','','/image/webedit/wtool14_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/wtool14.gif" name="Image14" width="111" height="22" border="0" id="Image14"></a></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="170" valign="top"><iframe id="iView" style="width: 542; height:300;" scrolling='YES'></iframe></td>
  </tr>
  <tr>
    <td height="40" valign="top"><table width="186" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td><a href="javascript:doToggleView();" onMouseOver="MM_swapImage('Image15','','/image/webedit/bt_html_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/bt_html.gif" name="Image15" width="93" height="23" border="0" id="Image15"></a></td>
          <td><a href="javascript:doToggleView();" onMouseOver="MM_swapImage('Image16','','/image/webedit/bt_source_1.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="image/bt_source.gif" name="Image16" width="93" height="23" border="0" id="Image16"></a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><input type="submit"></td>
  </tr>
</table>
</form>



</body>
</html>
