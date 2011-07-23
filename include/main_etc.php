
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="13"><img src="img/etc_box1.gif" width="13" height="203"></td>
                      <td background="img/etc_boxbg.gif" style="padding:13 0 13 0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="229"><a href="/shop/prd_list.php?catcode=200000"><img src="img/etc_img01.gif" width="218" height="177" border="0"></a></td>
<?
//주변기기
$etc_catcode = "20";

//이미지 상품명 #1
$pro_img1="/img/etc_box1_01.gif";
//이미지 상품명 #2
$pro_img2="/img/etc_box2_01.gif";
//이미지 상품명 #3
$pro_img3="/img/etc_box3_01.gif";

//$sql = " select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wc.catcode like '20%' and wc.catcode like '$etc_catcode%' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 3";
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.sale = 'Y' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 3";
$result = mysql_query($sql) or error(mysql_error());

$i=0;
while(($row = mysql_fetch_object($result))){

if($i==0) {
$pro_img=$pro_img1;
}
elseif($i==1) {
$pro_img=$pro_img2;
}
else {
$pro_img=$pro_img3;
}

if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
else $row->prdimg_R = "/prdimg/$row->prdimg_R";

$row->prdname = cut_str($row->prdname,12);
?>
                            <td width="225" valign="top"><table width="225" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td height="47"><img src="<?=$pro_img?>"></td>
                                </tr>
                                <tr> 
                                  <td><table width="225" height="130" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td background="img/etc_box_blue.gif" style="padding:12 12 12 12"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="55%" rowspan="3" valign="top"><table width="98" border="0" cellpadding="0" cellspacing="1" bgcolor="d4ddde">
                                                  <tr> 
                                                    <td align="center" bgcolor="#FFFFFF"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><img src="<?=$row->prdimg_R?>" width="85" height="85" border="0"></a></td>
                                                  </tr>
                                                </table></td>
                                              <td valign="top"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><strong><?=$row->prdname?></strong></a></td>
                                            </tr>
                                            <tr> 
                                              <td valign="top"><img src="img/icon_hit.gif" width="54" height="14"></td>
                                            </tr>
                                            <tr> 
                                              <td class="price"><?=number_format($row->sellprice)?> yen</td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
<?
$i++;
}
?>

                          </tr>
                        </table></td>
                      <td width="13"><img src="img/etc_box2.gif" width="13" height="203"></td>
                    </tr>
                  </table>