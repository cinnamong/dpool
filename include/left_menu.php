            <script language="javascript">
				<!--
				function displayLay(getno){
					var x;
					var y;
					var xdistance;
					var ydistance;
					var ydis = new Array();
	        	    x = document.body.scrollLeft+event.clientX;
    	 	   		y = document.body.scrollTop+event.clientY;
					xdistance=100;
					ydistance=23;
				
					ydis[0]=183;
					for(i=0; i<document.all.displayer.length; i++){
					document.all.displayer[i].style.display='none';	
					if(i!=0) ydis[i]=ydis[i-1]+ydistance;
					}

					if(document.all.displayer.length==null) {
                    document.all.displayer.style.position='absolute';
					document.all.displayer.style.top=y+ydistance;
                    document.all.displayer.style.left=xdistance;
					document.all.displayer.style.display='block';
					}
					else {
//                  document.all.displayer[getno].style.position='relative';
                    document.all.displayer[getno].style.top=ydis[getno];
//					document.all.displayer[getno].style.top=y+ydistance;
                    document.all.displayer[getno].style.left=xdistance;
					document.all.displayer[getno].style.display='block';
					}
				}
				
				function disableLay(getno){
					if(document.all.displayer.length==null) {
					document.all.displayer.style.display='none';
					}
					else {
					document.all.displayer[getno].style.display='none';
					}
				}
				-->
				</script>
<table width="184" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td style="padding:0 0 5 0"><img src="/img/category_title.gif" width="184" height="24"></td>
        </tr>
        <tr> 
          <td>
<?
$sql = "select * from wiz_category where depthno = 1 order by depthno asc, priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql) or error(mysql_error());
$i=0;
while($prow = mysql_fetch_object($result)){
?>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr> 
                <td height="22" class="menu" onmouseover="displayLay('<?=$i?>');"><img src="/img/category_dot.gif" width="20" height="3" align="absmiddle"><a href=/shop/prd_list.php?catcode=<?=$prow->catcode?>><?=$prow->catname?></a></td>

              </tr>
              <tr> 
                <td height="1" colspan="2" bgcolor="e9e9e9"> </td>
              </tr>
            </table>
<?
$i++;
}
?>
			</td>
        </tr>
      </table>
                  
      <br>
      <!--table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="center" bgcolor="fde5c7" style="padding:7 0 7 0"><a href="mailto:dmbpool@naver.com"><img src="/img/left_customer.gif" width="170" height="124" border="0"></a></td>
        </tr>
        <tr> 
          <td align="center" bgcolor="fde5c7"><img src="/img/left_account.gif" width="170" height="124"></td>
        </tr>
        <tr> 
          <td align="center" bgcolor="fde5c7" style="padding:5 0 5 0"><a href="/center/faq.php"><img src="/img/left_faq.gif" width="169" height="34" border="0"></a></td>
        </tr>
      </table--> </td>
  </tr>
</table>

<?
$sql = "select * from wiz_category where depthno = 1 order by depthno asc, priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql) or error(mysql_error());
$i=0;
while($prow = mysql_fetch_object($result)){
?>
				      <div id='displayer' style='display:none; position:absolute ;left:; width:100; z-index:1;'>
				      <table width='150' cellpadding=3 cellspacing=0 style="border: 1 solid #CCCCCC" onmouseover=displayLay('<?=$i?>'); onmouseout=disableLay('<?=$i?>')>
<?
$catcode1 = substr($prow->catcode,0,2);
$sql2 = "select * from wiz_category where catcode like '$catcode1%' and depthno = 2 order by depthno asc, priorno01 asc, priorno02 asc, priorno03 asc";
$result2 = mysql_query($sql2) or error(mysql_error());
$j=0;
while($prow2 = mysql_fetch_object($result2)){
?>
				      				        <tr><td bgcolor='#CCCCCC'></td></tr>
				        <tr>
				          <td bgcolor='#ffffff'> &nbsp; <a href=/shop/prd_list.php?catcode=<?=$prow2->catcode?>><?=$prow2->catname?></a></td>
				        </tr>
<?
$j++;
}
?>
				      </table></div>
<?
$i++;
}
?>
