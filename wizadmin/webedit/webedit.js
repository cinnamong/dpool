var viewMode = 1;
var font_name = '' ;

function Init()
{
   iView.document.designMode = 'On';
   iView.document.open();
   iView.document.write("<style>P {margin-top:0px;margin-bottom:0px;};</style>" ) ;
   
   if( document.frm.content.value.length > 0 )
   {
      iView.document.write(document.frm.content.value ) ;		
   }
   else
   {
      iView.document.write("<p>&nbsp;</p>");
   }
   iView.document.body.style.fontSize = "10pt";
   iView.document.body.style.fontFamily = "굴림";
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
   window.open('../webedit/table.php', 'doTable', 'width=354,height=286,resizeable=yes,scrollbars=no,left=200, top=200');
}

// 링크걸기
function doLink()
{
   window.open('../webedit/link.php', 'doLink', 'width=378,height=116,resizeable=yes,scrollbars=no,left=200, top=200');
}

// 멀티미디어 링크
function doMultilink(){
   window.open('../webedit/multimedia.php', 'doMultilink', 'width=378,height=116,resizeable=yes,scrollbars=no,left=200, top=200');
}

// 이미지 삽입
function doImage()
{
   window.open('../webedit/image.php', 'doImage', 'width=407,height=332,left=200, top=200');
}

// 글자색
function doForcol( type )
{
   window.open('../webedit/font_color.php', 'doForcol', 'toolbar=no,scrollbars=no,menubar=no,width=210,height=350,left=200, top=200') ;
}

// 글자배경색
function doBgcol()
{
   window.open('../webedit/font_bg.php', 'doBgcol', 'toolbar=no,scrollbars=no,menubar=no,width=210,height=360,left=200, top=200') ;
   
}

// 폰트타입
function doFont()
{
   window.open('../webedit/font_type.php', 'doImage', 'width=215, height=150,left=200, top=200');
}

// 폰트사이즈
function doSize(fSize)
{
   window.open('../webedit/font_size.php', 'doImage', 'width=300, height=230,left=200, top=200');
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

function doToggle(){
	if(document.frm.toggle.checked == true) doToggleHtml();
	else doToggleText();
}

function doToggleHtml()
{  
	if(viewMode != 2){
		iHTML = iView.document.body.innerHTML;
		iView.document.body.innerText = iHTML;
		// Hide all controls
		tblCtrls.style.display = 'none';
		iView.focus();      
		viewMode = 2;
	}   
   iView.focus() ;
}

function doToggleText()
{  
	if(viewMode != 1){
		iText = iView.document.body.innerText;
		iView.document.body.innerHTML = iText;
		// Show all controls
		tblCtrls.style.display = 'inline';
		iView.focus();
		viewMode = 1;
	}  
   iView.focus() ;
}