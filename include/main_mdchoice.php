					  <table width="100%" height="447" border="0" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td valign="top" background="img/mdchioce.gif" style="padding:10 0 0 154"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td height="210" valign="top"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td colspan="2" style="padding:15 0 0 0"><img src="img/hot_item3_title.gif"></td>
                                      </tr>
                                      <tr> 
<?
//전용 네비게이션
$hot_catcode = "191300";

//$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.recom = 'Y' and wc.catcode ='$hot_catcode' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 2";
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.recom = 'Y' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 2";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result))){

if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
else $row->prdimg_R = "/prdimg/$row->prdimg_R";

$row->prdname = cut_str($row->prdname,12);
?>		
                                        <td width="50%" style="padding:10 0 0 0"><table width="130" border="0" cellspacing="0" cellpadding="3">
                                            <tr> 
                                              <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="dddddd">
                                                  <tr> 
                                                    <td align="center" bgcolor="#FFFFFF"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><img src="<?=$row->prdimg_R?>" width="100" height="100" border="0"></a></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                            <tr> 
                                              <td align="center" valign="top" style="padding:10 0 5 0"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><font color="cd5806"><?=$row->prdname?></font></a></td>
                                            </tr>
                                            <tr> 
                                              <td align="center" class="price" style="padding:5 0 5 0"><font color="ff6666"><?=number_format($row->sellprice)?> yen</font></td>
                                            </tr>
                                          </table></td>
<?
}
?>
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr> 
                                  <td height="7"> </td>
                                </tr>
                                <tr> 
                                  <td height="210" valign="top"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td colspan="2" style="padding:15 0 0 0"><img src="img/hot_item3_title.gif"></td>
                                      </tr>
                                      <tr> 
<?
//아이나비 네비게이션
$hot_catcode = "191600";

//$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.recom = 'Y' and wc.catcode ='$hot_catcode' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 2";
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.recom = 'Y' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 2,2";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_object($result))){

if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
else $row->prdimg_R = "/prdimg/$row->prdimg_R";

$row->prdname = cut_str($row->prdname,12);
?>	
                                        <td width="50%" style="padding:10 0 0 0"><table width="130" border="0" cellspacing="0" cellpadding="3">
                                            <tr> 
                                              <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="dddddd">
                                                  <tr> 
                                                    <td align="center" bgcolor="#FFFFFF"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><img src="<?=$row->prdimg_R?>" width="100" height="100" border="0"></a></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                            <tr> 
                                              <td align="center" valign="top" style="padding:10 0 5 0"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><font color="cd5806"><?=$row->prdname?></font></a></td>
                                            </tr>
                                            <tr> 
                                              <td align="center" class="price" style="padding:5 0 5 0"><font color="ff6666"><?=number_format($row->sellprice)?> yen</font></td>
                                            </tr>
                                          </table></td>
<?
}
?>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>