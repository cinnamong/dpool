<script language=javascript>

function doBlink() {
var blink = document.all.tags("BLINK")
for (var i=0; i<blink.length; i++)
blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
if (document.all)
setInterval("doBlink()",500)
}
window.onLoad = startBlink();


var xdistance=0;
var ydistance=0;
var timer;
var x,y;
var open_submenu;
var close_submenu;
var activated=false;

function initiate() {        
           if (document.all) {
                       close_submenu=eval("document.all.empty_layer.style");
                       activated=true;
           }
           if (document.layers) {
                       close_submenu=eval("document.empty_layer");
                       activated=true;
           }
}

function menu_menu_layer(menu_menu) {
           if (activated) {   
                       if (document.all) {
                                   close_submenu.visibility="hidden";
                                   close_submenu=eval("document.all."+menu_menu+".style");
                                   open_submenu=eval("document.all."+menu_menu+".style");
                                   open_submenu.posTop=y+ydistance;
                                   open_submenu.posLeft=x+xdistance;
                                   open_submenu.visibility="visible";
                       }
                       if (document.layers) {
                                   close_submenu.visibility="hidden";
                                   close_submenu=eval("document."+menu_menu);
                                   open_submenu=eval("document."+menu_menu);
                                   open_submenu.top=y+ydistance;
                                   open_submenu.left=x+xdistance;
                                   open_submenu.visibility="visible";
                       }
           }
}
       
function hidesubmenu() {
           close_submenu.visibility="hidden";
           open_submenu.visibility="hidden";
}


function handlerMM(e){
           x = (document.layers) ? e.pageX : document.body.scrollLeft+event.clientX;
           y = (document.layers) ? e.pageY : document.body.scrollTop+event.clientY;
}

function body_click(){
           if (event.srcElement.tagName != "A"){
                       menu_menu_layer('empty_layer');
                       return false;
           }
}


function go_link(url){
           window.open(url, '','');
}

function menuFavor(menu,menu2) {
window.external.AddFavorite(menu, menu2);
}

function homepage(url) {

if(document.all)

document.body.style.behavior='url(#default#homepage)';

document.body.setHomePage(url);

}

if (document.layers){
document.captureEvents(Event.MOUSEMOVE);
}
document.onmousemove=handlerMM;
window.onload=initiate;
</script>


<body onclick="body_click();">
<div id="empty_layer" style="width:0px; height:18px; position:absolute; left:50px; top:50px; z-index:1; visibility:hidden;">
   <p> </p>
</div>

<table id='menu_id_layer' style="visibility:hidden;position:absolute;width:247;cursor:hand;">
<tr>
<td bgcolor=#DBDBDB>

<table width=100% cellspacing=0 cellpadding=5 border=0 bgcolor=ffffff>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="go_link('http://kangjaeg.x-y.net');" title=' kangjaeg'>
<img src='./img/bluesquare.png' align='absbottom' width="8" height="8" border="0"> kangjaeg</td>
</tr>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="javascript:history.go(-1);" title=' kangjaeg'>
<img src='./img/bluesquare.png' align='absbottom' width="8" height="8" border='0'> 이전화면</td>
</tr>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="javascript:history.go(+1);" title=' kangjaeg'>
<img src='./img/bluesquare.png' align='absbottom' width="8" height="8" border='0'> 다음화면</td>
</tr>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="javascript:location.reload();" title=' kangjaeg'>
<img src='./img/bluesquare.png' align="absbottom" width="8" height="8" border='0'> 새로고침</td>
</tr>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="javascript:menuFavor('http://kangjaeg.x-y.net/', '자바스크립트');" title=' kangjaeg'>
<img src='./img/bluesquare.png' align='absbottom' width="8" height="8" border='0'> 즐겨찾기</td>
</tr>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="javascript:homepage('http://kangjaeg.x-y.net');" title=' kangjaeg'>
<img src='./img/bluesquare.png' align="absbottom" width="8" height="8" border='0'> 시작 홈페이지 설정</td>
</tr>

<tr onMouseover="this.className='menu_m_over'" onMouseout="this.className='menu_m_out'">
<td onclick="go_link('http://kangjaeg.x-y.net');" title=' kangjaeg'>
<img src='./img/bluesquare.png' align='absbottom' width="8" height="8" border='0'> My Home</td>
</tr>

</table>

</td></tr></table>

<center>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br><br><br>
<a href="javascript:menu_menu_layer('menu_id_layer')">클릭 해 보세요</a>
</center>
</body>