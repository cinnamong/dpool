<?
if($catcode != "" && $cat_info->recom_use == "Y"){
?>
             <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align="center">
						<?
						$tmpcode = substr($catcode,0,2);
						$sql = "select wp.prdcode, wp.prdname, wp.stortexp, wp.prdcom, wp.reserve, wp.sellprice, wp.prdimg_M1, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.sale, wp.stock, wp.conprice from wiz_cprelation wc, wiz_product wp where wc.catcode like '$tmpcode%' and wp.recom = 'Y' and wc.prdcode = wp.prdcode and wp.showset != 'N' order by wp.prior desc, prdcode desc limit 4";
						$result = mysql_query($sql) or error(mysql_error());
						$total = mysql_num_rows($result);
						
						$no = 0;
						while($row = mysql_fetch_object($result)){
							
							$recomprd[$no][prdcode] = $row->prdcode;
							$recomprd[$no][prdname] = $row->prdname;
							$recomprd[$no][prdimg_M1] = $row->prdimg_M1;
							$recomprd[$no][prdimg_R] = $row->prdimg_R;
							$recomprd[$no][sellprice] = $row->sellprice;
							
							$no++;
						}
						
						if($total > 0){
						?>
                        <table border=0 cellpadding=0 cellspacing=0 align=center width=692>
							     <tr><td><img src="/images/shop_title_rec.gif"></td></tr>
							     <tr><td><img src="/images/shop_title_bar.gif"></td></tr>
							   </table>
                        <table bgcolor="#FFFFFF" width="692" height="350" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td valign="top"></td>
                            <td width="340"> 
                              <table width="340" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="340" align="center"> <a href="/shop/prd_view.php?prdcode=<?=$recomprd[0][prdcode]?>"><img src="/prdimg/<?=$recomprd[0][prdimg_M1]?>" border="0" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td width="340" align="center"> 
                                    <table width="250" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td align="left"><?=$recomprd[0][prdname]?></td>
                                      </tr>
                                    </table>
                                    <table border="0" cellspacing="0" cellpadding="0" height="15">
                                      <tr> 
                                        <td width="5">&nbsp;</td>
                                        <td class="price"><?=number_format($recomprd[0][sellprice])?>원 </td>
                                        <td width="5">&nbsp;</td>
                                        <td></td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td valign="top">
                              <table width="325" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" valign="top"> 
												<?
												if($recomprd[1][prdcode] != ""){
												?>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td valign="top"></td>
                                        <td height="130" width="130" align="center"><a href="/shop/prd_view.php?prdcode=<?=$recomprd[1][prdcode]?>"><img src="/prdimg/<?=$recomprd[1][prdimg_R]?>" width="120" border="0"></a></td>
                                        <td width=10></td>
                                        <td>
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td  colspan="6"><?=$recomprd[1][prdname]?></td>
                                            </tr>
                                            <tr> 
                                              <td class="price"><?=number_format($recomprd[1][sellprice])?>원 </td>
                                              <td width="5">&nbsp;</td>
                                              <td class="price"></td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                    <?
                                 	}
                                 	?>
                                  </td>
                                </tr>
                                <tr><td background="/images/dot.gif"></td></tr>
                                <tr>
                                  <td align="center" valign="top"> 
                                    <?
												if($recomprd[2][prdcode] != ""){
												?>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td valign="top"></td>
                                        <td height="130" width="130" align="center"><a href="/shop/prd_view.php?prdcode=<?=$recomprd[2][prdcode]?>"><img src="/prdimg/<?=$recomprd[2][prdimg_R]?>" width="120" border="0"></a></td>
                                        <td width=10></td>
                                        <td>
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td colspan="6"><?=$recomprd[2][prdname]?></td>
                                            </tr>
                                            <tr> 
                                              <td class="price"><?=number_format($recomprd[2][sellprice])?>원 </td>
                                              <td width="5">&nbsp;</td>
                                              <td class="price"></td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                    <?
                                 	}
                                 	?>
                                  </td>
                                </tr>
                                <tr><td background="/images/dot.gif"></td></tr>
                                <tr> 
                                  <td align="center" valign="top"> 
                                    <?
												if($recomprd[3][prdcode] != ""){
												?>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td valign="top"></td>
                                        <td height="130" width="130" align="center"><a href="/shop/prd_view.php?prdcode=<?=$recomprd[3][prdcode]?>"><img src="/prdimg/<?=$recomprd[3][prdimg_R]?>" width="120" border="0"></a></td>
                                        <td width=10></td>
                                        <td>
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td colspan="6"><?=$recomprd[3][prdname]?></td>
                                            </tr>
                                            <tr> 
                                              <td class="price"><?=number_format($recomprd[3][sellprice])?>원 </td>
                                              <td width="5">&nbsp;</td>
                                              <td class="price"></td>
                                            </tr>
                                          </table>
                                        </td>
                                    </table>
                                    <?
                                 	}
                                 	?>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
								<?
								}
								?>
						    </td>
						  </tr>
						</table>
<?
}
?>