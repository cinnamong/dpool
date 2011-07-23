<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>


                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          
                                          <?
                                          $nowposi = "마케팅관리 &gt; <strong>회원통계 </strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <!--     성별통계     -->
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>성별통계 </strong></td>
                                              <td align="right"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="20%" height="30" bgcolor="E9E7E7">성별</td>
                                              <td width="20%" bgcolor="E9E7E7">회원수</td>
                                              <td width="20%" bgcolor="E9E7E7">비율</td>
                                              <td bgcolor="E9E7E7">그래프</td>
                                            </tr>
                                            <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
                                          <?
								                     $sql = "select count(resno) as sexnum from wiz_member group by substring(resno,8,1)";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $row = mysql_fetch_object($result);
								                     $man_total = $row->sexnum;
								                     if($man_total == "") $man_total = 0;
								                     
								                     $row = mysql_fetch_object($result);
								                     $woman_total = $row->sexnum;
								                     if($woman_total == "") $woman_total = 0;
								                     
								                     $total = $man_total + $woman_total;
								                     if($total == 0) $total = 1;
								                     $man_percent = ($man_total/$total)*100;
								                     $woman_percent = ($woman_total/$total)*100;
								                     
								                     $man_percent = substr($man_percent,0,strpos($man_percent,'.')+3);
								                     $woman_percent = substr($woman_percent,0,strpos($woman_percent,'.')+3);
								                  ?>
                                            <tr bgcolor="#F3F3F3"> 
                                              <td height="30" align="center">남</td>
                                              <td align="center"><?=$man_total?></td>
                                              <td align="center"><?=$man_percent?>%</td>
                                              <td><img src="../image/mark_bar.gif" width="<?=$man_percent*2?>" height="10"></td>
                                            </tr>
                                            <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
                                            <tr> 
                                              <td height="30" align="center">여</td>
                                              <td align="center"><?=$woman_total?></td>
                                              <td align="center"><?=$woman_percent?>%</td>
                                              <td><img src="../image/mark_bar.gif" width="<?=$woman_percent*2?>" height="10"></td>
                                            </tr>
                                            <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                  </table><br>
								                  
								                  
								                  
								                  <!--     연령 통계     -->
								                  <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>연령통계 </strong></td>
                                              <td align="right"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="20%" height="30" bgcolor="E9E7E7">연령</td>
                                              <td width="20%" bgcolor="E9E7E7">회원수</td>
                                              <td width="20%" bgcolor="E9E7E7">비율</td>
                                              <td bgcolor="E9E7E7">그래프</td>
                                            </tr>
                                            <?
								                     $now_year = date('y')+101;
								                     $sql = "select substring(($now_year-substring(resno,1,2)),1,1) as age, count(resno) agetotal from wiz_member group by substring(($now_year-substring(resno,1,2)),1,1);";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = 0;
								                     while($row = mysql_fetch_object($result)){
								                        $arr_age[$row->age] = $row->agetotal;
								                        $total += $row->agetotal;
								                     }
								                     if($total == 0) $total = 1;
								                     
								                     $ten_percent = ($arr_age["1"]/$total)*100;
								                     $two_percent = ($arr_age["2"]/$total)*100;
								                     $three_percent = ($arr_age["3"]/$total)*100;
								                     $four_percent = ($arr_age["4"]/$total)*100;
								                     $five_percent = ($arr_age["5"]/$total)*100;
								                     $six_percent = ($arr_age["6"]/$total)*100;
								                     $seven_percent = ($arr_age["7"]/$total)*100;
								                     
								                     $ten_percent = substr($ten_percent,0,strpos($ten_percent,'.')+3);
								                     $two_percent = substr($two_percent,0,strpos($two_percent,'.')+3);
								                     $three_percent = substr($three_percent,0,strpos($three_percent,'.')+3);
								                     $four_percent = substr($four_percent,0,strpos($four_percent,'.')+3);
								                     $five_percent = substr($five_percent,0,strpos($five_percent,'.')+3);
								                     $six_percent = substr($six_percent,0,strpos($six_percent,'.')+3);
								                     $seven_percent = substr($seven_percent,0,strpos($seven_percent,'.')+3);
								                     
								                  ?>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">10대</td>
								                      <td align="center"><?=$arr_age["1"]?></td>
								                      <td align="center"><?=$ten_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$ten_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">20대</td>
								                      <td align="center"><?=$arr_age["2"]?></td>
								                      <td align="center"><?=$two_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$two_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">30대</td>
								                      <td align="center"><?=$arr_age["3"]?></td>
								                      <td align="center"><?=$three_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$three_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">40대</td>
								                      <td align="center"><?=$arr_age["4"]?></td>
								                      <td align="center"><?=$four_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$four_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">50대</td>
								                      <td align="center"><?=$arr_age["5"]?></td>
								                      <td align="center"><?=$five_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$five_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">60대</td>
								                      <td align="center"><?=$arr_age["6"]?></td>
								                      <td align="center"><?=$six_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$six_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">70대</td>
								                      <td align="center"><?=$arr_age["7"]?></td>
								                      <td align="center"><?=$seven_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$seven_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                  </table><br>
								                  
								                  
								                  
								                  <!--     지역별통계     -->
								                  <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>지역별통계 </strong></td>
                                              <td align="right"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="20%" height="30" bgcolor="E9E7E7">지역</td>
                                              <td width="20%" bgcolor="E9E7E7">회원수</td>
                                              <td width="20%" bgcolor="E9E7E7">비율</td>
                                              <td bgcolor="E9E7E7">그래프</td>
                                            </tr>
								                  <?
								                     $sql = "select substring(address,1,2) as address, count(address) areatotal from wiz_member group by substring(address,1,2) order by areatotal";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = 0;
								                     while($row = mysql_fetch_object($result)){
								                           $arr_address[$row->address] = $row->areatotal;
								                           $total += $row->areatotal;
								                     }
								                     if($total == 0) $total = 1;
								                     
								                     $posi1_percent = ($arr_address["서울"]/$total)*100;
								                     $posi2_percent = ($arr_address["경기"]/$total)*100;
								                     $posi3_percent = ($arr_address["인천"]/$total)*100;
								                     $posi4_percent = ($arr_address["대전"]/$total)*100;
								                     $posi5_percent = ($arr_address["대구"]/$total)*100;
								                     $posi6_percent = ($arr_address["광주"]/$total)*100;
								                     $posi7_percent = ($arr_address["울산"]/$total)*100;
								                     $posi8_percent = ($arr_address["부산"]/$total)*100;
								                     $posi9_percent = ($arr_address["제주"]/$total)*100;
								                     $posi10_percent = ($arr_address["강원"]/$total)*100;
								                     $posi11_percent = ($arr_address["경북"]/$total)*100;
								                     $posi12_percent = ($arr_address["경남"]/$total)*100;
								                     $posi13_percent = ($arr_address["전북"]/$total)*100;
								                     $posi14_percent = ($arr_address["전남"]/$total)*100;
								                     $posi15_percent = ($arr_address["충북"]/$total)*100;
								                     $posi16_percent = ($arr_address["충남"]/$total)*100;
								                     
								                     $posi1_percent = substr($posi1_percent,0,strpos($posi1_percent,'.')+3);
								                     $posi2_percent = substr($posi2_percent,0,strpos($posi2_percent,'.')+3);
								                     $posi3_percent = substr($posi3_percent,0,strpos($posi3_percent,'.')+3);
								                     $posi4_percent = substr($posi4_percent,0,strpos($posi4_percent,'.')+3);
								                     $posi5_percent = substr($posi5_percent,0,strpos($posi5_percent,'.')+3);
								                     $posi6_percent = substr($posi6_percent,0,strpos($posi6_percent,'.')+3);
								                     $posi7_percent = substr($posi7_percent,0,strpos($posi7_percent,'.')+3);
								                     $posi8_percent = substr($posi8_percent,0,strpos($posi8_percent,'.')+3);
								                     $posi9_percent = substr($posi9_percent,0,strpos($posi9_percent,'.')+3);
								                     $posi10_percent = substr($posi10_percent,0,strpos($posi10_percent,'.')+3);
								                     $posi11_percent = substr($posi11_percent,0,strpos($posi11_percent,'.')+3);
								                     $posi12_percent = substr($posi12_percent,0,strpos($posi12_percent,'.')+3);
								                     $posi13_percent = substr($posi13_percent,0,strpos($posi13_percent,'.')+3);
								                     $posi14_percent = substr($posi14_percent,0,strpos($posi14_percent,'.')+3);
								                     $posi15_percent = substr($posi15_percent,0,strpos($posi15_percent,'.')+3);
								                     $posi16_percent = substr($posi16_percent,0,strpos($posi16_percent,'.')+3);
								                     
								                     
								                  ?>
								                    <tr><td bgcolor="#D0D0D0" height="1" colspan="4"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">서울</td>
								                      <td align="center"><?=$arr_address["서울"]?></td>
								                      <td align="center"><?=$posi1_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi1_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">경기</td>
								                      <td align="center"><?=$arr_address["경기"]?></td>
								                      <td align="center"><?=$posi2_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi2_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">인천</td>
								                      <td align="center"><?=$arr_address["인천"]?></td>
								                      <td align="center"><?=$posi3_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi3_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">대전</td>
								                      <td align="center"><?=$arr_address["대전"]?></td>
								                      <td align="center"><?=$posi4_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi4_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">대구</td>
								                      <td align="center"><?=$arr_address["대구"]?></td>
								                      <td align="center"><?=$posi5_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi5_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">광주</td>
								                      <td align="center"><?=$arr_address["광주"]?></td>
								                      <td align="center"><?=$posi6_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi6_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">울산</td>
								                      <td align="center"><?=$arr_address["울산"]?></td>
								                      <td align="center"><?=$posi7_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi7_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">부산</td>
								                      <td align="center"><?=$arr_address["부산"]?></td>
								                      <td align="center"><?=$posi8_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi8_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">제주</td>
								                      <td align="center"><?=$arr_address["제주"]?></td>
								                      <td align="center"><?=$posi9_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi9_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">강원</td>
								                      <td align="center"><?=$arr_address["강원"]?></td>
								                      <td align="center"><?=$posi10_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi10_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">경북</td>
								                      <td align="center"><?=$arr_address["경북"]?></td>
								                      <td align="center"><?=$posi11_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi11_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">경남</td>
								                      <td align="center"><?=$arr_address["경남"]?></td>
								                      <td align="center"><?=$posi12_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi12_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">전북</td>
								                      <td align="center"><?=$arr_address["전북"]?></td>
								                      <td align="center"><?=$posi13_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi13_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">전남</td>
								                      <td align="center"><?=$arr_address["전남"]?></td>
								                      <td align="center"><?=$posi14_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi14_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr bgcolor="#F3F3F3">
								                      <td height="28" align="center">충북</td>
								                      <td align="center"><?=$arr_address["충북"]?></td>
								                      <td align="center"><?=$posi15_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi15_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                    <tr>
								                      <td height="28" align="center">충남</td>
								                      <td align="center"><?=$arr_address["충남"]?></td>
								                      <td align="center"><?=$posi16_percent?>%</td>
								                      <td><img src="../image/mark_bar.gif" width="<?=$posi16_percent*2?>" height="10"></td>
								                    </tr>
								                    <tr><td colspan="4" bgcolor="DEDEDE"></td></tr>
								                  </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>