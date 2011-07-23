<html>
<head>


<script language="JavaScript">

var viewMode = 1; // WYSIWYG
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

function doCol( type )
{
   window.open('/common/color_picker.php?frame=&type=' + type, 'color_pick', 'toolbar=no,scrollbars=no,menubar=no,width=307,height=178') ;
}

function doTable(value)
{
   window.open('./table.php', 'doTable', 'width=600,height=350,resizeable=yes,scrollbars=yes');
}

function doLink()
{
   window.open('./link.php', 'doLink', 'width=600,height=350,resizeable=yes,scrollbars=yes');
   //iView.document.execCommand('createlink');
   //iView.document.execCommand('createlink', false, "http://wizshop.net");
   //iView.focus() ;
}

function doImage()
{
   window.open('./image.php', 'doImage', 'width=600,height=350,resizeable=yes,scrollbars=yes');
   
   //var imgSrc = prompt('Enter image location', '');
   //if(imgSrc != null)    
   //iView.document.execCommand('insertimage', false, imgSrc);
   //iView.focus() ;
}

function doRule()
{
   iView.document.execCommand('inserthorizontalrule', false, null);
   iView.focus() ;
}

function doFont(fName)
{
   if(fName != '')
      iView.document.execCommand('fontname', false, fName);
   
   font_name = fName ;
   iView.focus() ;
}

function doSize(fSize)
{
   if(fSize != '')
      iView.document.execCommand('fontsize', false, fSize);
   
   iView.focus() ;
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
      sel_ctrl.style.display = 'none' ;
      //selFont.style.display = 'none';
      //selSize.style.display = 'none';
      //selHeading.style.display = 'none';
      iView.focus();
      
      viewMode = 2; // Code
   }
   else
   {
      iText = iView.document.body.innerText;
      iView.document.body.innerHTML = iText;
      
      // Show all controls
      tblCtrls.style.display = 'inline';
      sel_ctrl.style.display = 'inline' ;
      //selFont.style.display = 'inline';
      //selSize.style.display = 'inline';
      //selHeading.style.display = 'inline';
      iView.focus();
      
      viewMode = 1; // WYSIWYG
   }
   
   iView.focus() ;
}

function inputCheck(form){
   iHTML = iView.document.body.innerHTML;
   //iView.document.body.innerText = iHTML;
   form.content.value = iHTML;
}

-->
</script>
</head>
<body topmargin=0 leftmargin=0 onLoad="Init()">

<form name=frm action="save.php" method=post onSubmit="inputCheck(this);">
<input type=hidden name=content value="aaaaaaaaaaaaaaaaa">
<input type=hidden name=description>
  <table id="tblCtrls" width="500" height="30px" border="0" cellspacing="0" cellpadding="0" bgcolor="#D6D3CE">
    <tr> 
      <td class="tdClass"> <img alt="Bold" class="butClass" src="images/bold.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doBold()"> 
        <img alt="Italic" class="butClass" src="images/italic.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doItalic()"> 
        <img alt="Underline" class="butClass" src="images/underline.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doUnderline()"> 
        <img alt="Left" class="butClass" src="images/left.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doLeft()"> 
        <img alt="Center" class="butClass" src="images/center.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doCenter()"> 
        <img alt="Right" class="butClass" src="images/right.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doRight()"> 
        <img alt="Ordered List" class="butClass" src="images/ordlist.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doOrdList()"> 
        <img alt="Bulleted List" class="butClass" src="images/bullist.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doBulList()"> 
        <img alt="Text Color" class="butClass" src="images/forecol.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doCol( 'fore' )"> 
        <img alt="Background Color" class="butClass" src="images/bgcol.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doCol( 'back' )"> 
        <img alt="Hyperlink" class="butClass" src="images/link.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doLink()"> 
        <img alt="Image" class="butClass" src="images/image.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doImage()"> 
        <img alt="Horizontal Rule" class="butClass" src="images/rule.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doRule()"> 
        <img alt="Image" class="butClass" src="images/table.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doTable()" width="23" height="22"> 
      </td>
    </tr>
  </table>
  <div id=editctrl style='display:show'><iframe id="iView" style="width: 500; height:300;" scrolling='YES'></iframe></div>
  <table width="500" height="30px" border="0" cellspacing="0" cellpadding="0" bgcolor="#D6D3CE">
    <tr> 
      <td class="tdClass" colspan="1" width="65%" id="sel_ctrl"> 
        <select id="selFont" name="selFont" onChange="doFont(this.options[this.selectedIndex].value)">
          <option value="">-- Font --</option>
          <option value="±¼¸²">±¼¸²</option>
          <option value="Arial">Arial</option>
          <option value="Courier">Courier</option>
          <option value="Sans Serif">Sans Serif</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Verdana">Verdana</option>
          <option value="Wingdings">Wingdings</option>
        </select>
        <select name="selSize" onChange="doSize(this.options[this.selectedIndex].value)">
          <option value="">-- Size --</option>
          <option value="1">8pt</option>
          <option value="2">10pt</option>
          <option value="3">12pt</option>
          <option value="4">14pt</option>
          <option value="5">18pt</option>
          <option value="6">24pt</option>
          <option value="7">36pt</option>
        </select>
        <select name="selHeading" onChange="doHead(this.options[this.selectedIndex].value)">
          <option value="">-- Heading --</option>
          <option value="<h1>">H1</option>
          <option value="<h2>">H2</option>
          <option value="<h3>">H3</option>
          <option value="<h4>">H4</option>
          <option value="<h5>">H5</option>
          <option value="<h6>">H6</option>
        </select>
      </td>
      <td class="tdClass" colspan="1" width="35%" align="right"> 
        <input type=radio name=btn_design_m checked onclick="doToggleView()">
        Code 
        <input type=radio name=btn_design_m onclick="doToggleView()">
        HTML <img alt="Toggle Mode" class="butClass" src="images/mode.gif" onMouseOver="selOn(this)" onMouseOut="selOff(this)" onMouseDown="selDown(this)" onMouseUp="selUp(this)" onClick="doToggleView()"> 
        &nbsp;&nbsp;&nbsp; </td>
    </tr>
    <tr>
      <td><input type="submit" value="È®ÀÎ">
      </td>
    </tr>
  </table>
</form>
</body>
</html>