<?
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.new = 'Y' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 5";
$result = mysql_query($sql) or error(mysql_error());
?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td style="padding:20 0 10 0"><a href="/shop/prd_list.php?grp=new"><img src="img/bestofbest.gif" width="950" height="29" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td style="padding:0 0 10 0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="280"><img src="img/best_item01.gif" width="260" height="182" border="0" usemap="#Map22"></td>
                            <td valign="top" style="padding:15 0 10 0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
<?
$i=0;
while(($row = mysql_fetch_object($result))){
if($i!=4) {
$bordercheck=" style='BORDER-right: #DDDDDD 1px solid'";
}
else {
$bordercheck="";
}

if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
else $row->prdimg_R = "/prdimg/$row->prdimg_R";

$row->prdname = cut_str($row->prdname,27);

?>
                                  <td width="20%" align="center" valign="top" <?=$bordercheck?>><table width="130" border="0" cellspacing="0" cellpadding="3">
                                      <tr> 
                                        <td align="center"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><img src="<?=$row->prdimg_R?>" width="100" height="100" border="0"></a></td>
                                      </tr>
                                      <tr> 
                                        <td align="center" valign="top" style="padding:10 0 5 0"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><font color="cd5806"><?=$row->prdname?></font></a></td>
                                      </tr>
                                      <tr> 
                                        <td align="center" class="price" style="padding:5 0 5 0"><?=number_format($row->sellprice)?> yen</td>
                                      </tr>
                                    </table></td>
<?
$i++;
}
?>

                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
<map name="Map22" id="Map22">
  <area shape="rect" coords="6,7,104,176" href="{LG지상파DMB PDA PM80}">
  <area shape="rect" coords="117,13,251,30" href="{LG지상파DMB PDA PM80}"><!--LG지상파DMB PDA PM80-->
  <area shape="rect" coords="117,41,210,57" href="{자이닉스 CX-220}"><!--자이닉스 CX-220-->
  <area shape="rect" coords="117,69,207,85" href="{PM80 USER KIT}"><!--PM80 USER KIT-->
  <area shape="rect" coords="116,97,198,114" href="{TUBE ND 100}"><!--TUBE ND 100-->
  <area shape="rect" coords="116,125,233,141" href="{지상파 DMB 셋탑박스}"><!--지상파 DMB 셋탑박스-->
  <area shape="rect" coords="116,153,196,171" href="{비타스 DM750}"><!--비타스 DM750-->
</map>