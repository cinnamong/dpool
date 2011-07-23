<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "status=$status&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day&next_year=$next_year&next_month=$next_month&next_day=$next_day";
$param .= "&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<?
$sql = "select * from wiz_shopinfo";
$result = mysql_query($sql) or error(mysql_error());
$shopinfo = mysql_fetch_array($result);
?>
<script language="javascript">
<!--
// 고객 메일발송
function sendEmail(name,email){
	var url = "../member/send_email.php?name=" + name + "&email=" + email;
	window.open(url,"sendEmail","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 고객 sms발송
function sendSms(name,hphone){
	var url = "../member/send_sms.php?name=" + name + "&hphone=" + hphone;
	window.open(url,"sendSms","height=350, width=270, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// 우편번호 찾기
function searchZip(){
	document.frm.send_address.focus();
	var url = "../member/search_zip.php?kind=send_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
function searchZip2(){
	document.frm.rece_address.focus();
	var url = "../member/search_zip.php?kind=rece_";
	window.open(url,"searchZip2","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="624" height="3"></td>
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
                                          $nowposi = "주문관리 &gt; <strong>주문목록</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>주문정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="70" height="30" bgcolor="E9E7E7" align="center">상품코드</td>
                                              <td width="50" bgcolor="E9E7E7"></td>
                                              <td width="245" bgcolor="E9E7E7" align="center">상품명</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">상품가격</td>
                                              <td width="90" bgcolor="E9E7E7" align="center">옵션</td>
                                              <td width="90" bgcolor="E9E7E7" align="center">수량</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">적립금</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
							                        // 주문정보 가져오기
														   $sql = "select * from wiz_order where orderid = '$orderid'";
														   $result = mysql_query($sql) or error(mysql_error());
														   $order_info = mysql_fetch_object($result);
														   
							                        $basketid = $order_info->basketid;
							                        $sql = "select * from wiz_basket where basketid = '$basketid'";
														   $result = mysql_query($sql) or error(mysql_error());
														   $total = mysql_num_rows($result);
														   
														   while($row = mysql_fetch_object($result)){
														   	
														   	if($row->prdimg == "") $row->prdimg = "/images/noimage.gif";
																else $row->prdimg = "/prdimg/$row->prdimg";
															
														   	$prd_price += $row->prdprice*$row->amount;
														   	$reserve_price += $row->prdreserve*$row->amount;
							   							?>
	                                           <tr bgcolor="#FFFFFF"> 
                                              <td height="30" align="center"><?=$row->prdcode?></td>
                                              <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><img src='<?=$row->prdimg?>' width='50' height='50' border='0'></a></td>
                                              <td><a href='/shop/prd_view.php?prdcode=<?=$row->prdcode?>' target='_blank'><?=$row->prdname?></a></td>
                                              <td align="center"><?=number_format($row->prdprice)?>원</td>
                                              <td align="center">
                                              <?
																if($row->opttitle != '') echo "$row->opttitle : $row->optcode <br>";
																if($row->opttitle2 != '') echo "$row->opttitle2 : $row->optcode2 <br>";
																if($row->opttitle3 != '') echo "$row->opttitle3 : $row->optcode3 <br>";
															 ?>
									                   </td>
                                              <td align="center"><?=$row->amount?></td>
                                              <td align="center"><?=number_format($row->prdreserve*$row->amount)?>원</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                            <?
                                            }
                                            ?>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0" height="38">
						                          <tr><td height="10"></td></tr>
						                          <tr>
						                            <td align="center">
						                            상품합계( <b><font color="#ED1C24"><?=number_format($order_info->prd_price)?>원</font></b> ) + 
						                            배송비( <b><font color="#ED1C24"><?=number_format($order_info->deliver_price)?>원</font></b> ) - 
						                            적립금( <b><font color="#ED1C24"><?=number_format($order_info->reserve_use)?>원</font></b> )
						                             
						                            = 
						                            <b><font color="#000000">총 결제금액 :</font> <font color="#ED1C24"><?=number_format($order_info->total_price)?>원</font></b>
						                            </td>
						                          </tr>
						                          <tr><td height="10"></td></tr>
						                        </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="order_save.php" method="post">
                                          <input type="hidden" name="mode" value="update">
                                          <input type="hidden" name="page" value="<?=$page?>">
                                          <input type="hidden" name="orderid" value="<?=$orderid?>">
                                          
                                          <input type="hidden" name="status" value="<?=$status?>">
                                          <input type="hidden" name="prev_year" value="<?=$prev_year?>">
                                          <input type="hidden" name="prev_month" value="<?=$prev_month?>">
                                          <input type="hidden" name="prev_day" value="<?=$prev_day?>">
                                          <input type="hidden" name="next_year" value="<?=$next_year?>">
                                          <input type="hidden" name="next_month" value="<?=$next_month?>">
                                          <input type="hidden" name="next_day" value="<?=$next_day?>">
                                          <input type="hidden" name="searchopt" value="<?=$searchopt?>">
                                          <input type="hidden" name="searchkey" value="<?=$searchkey?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주문번호</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$orderid?></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;결제방법</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=pay_method($order_info->pay_method)?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주문일자</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$order_info->order_date?></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;결제계좌</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$order_info->account?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;운송장번호</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="deliver_num" type="text" value="<?=$order_info->deliver_num?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;입금인</td>
                                                    <td width="200" bgcolor="F8F8F8"><?=$order_info->account_name?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;처리상태</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    <select name="chg_status">
                                                    <?
		                      									if($order_info->status == "OR"){
		                      								 ?>
		                                              <option value="OR" <? if($order_info->status == "OR") echo "selected"; ?>>주문접수
		                                              <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>결제완료
		                      								 <?
		                      									}else{
		                      								 ?>
		                                              <option value="OY" <? if($order_info->status == "OY") echo "selected"; ?>>결제완료
		                                              <option value="DR" <? if($order_info->status == "DR") echo "selected"; ?>>배송준비중
		                                              <option value="DI" <? if($order_info->status == "DI") echo "selected"; ?>>배송중
		                                              <option value="DC" <? if($order_info->status == "DC") echo "selected"; ?>>배송완료
		                                              <option value="OC" <? if($order_info->status == "OC") echo "selected"; ?>>주문취소
		                                              <option>----------
		                                              <option value="RD" <? if($order_info->status == "RD") echo "selected"; ?>>환불요청
		                                              <option value="RC" <? if($order_info->status == "RC") echo "selected"; ?>>환불완료
		                                              <option value="CD" <? if($order_info->status == "CD") echo "selected"; ?>>교환요청
		                                              <option value="CC" <? if($order_info->status == "CC") echo "selected"; ?>>교환완료
		                                              <?
		                                             	}
		                                              ?>
                                                    </select>
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="200" bgcolor="F8F8F8"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;처리시간</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr bgcolor="EAEAEA">
                                                          <td width="25%" align="center" height="25">주문접수</td>
                                                          <td width="25%" align="center">결제완료</td>
                                                          <td width="25%" align="center">배송완료</td>
                                                          <td width="25%" align="center">주문취소</td>
                                                        </tr>
                                                        <tr>
                                                          <td align="center" height="25"><? if($order_info->order_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->order_date; ?></td>
                                                          <td align="center"> <? if($order_info->pay_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->pay_date; ?> </td>
                                                          <td align="center"> <? if($order_info->send_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->send_date; ?> </td>
                                                          <td align="center"> <? if($order_info->cancel_date == "0000-00-00 00:00:00") echo "-"; else echo $order_info->order_date; ?> </td>
                                                        </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>배송자정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주문자명</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_name" type="text" value="<?=$order_info->send_name?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이메일</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_email" type="text" value="<?=$order_info->send_email?>" class="form1"> <a href="javascript:sendEmail('<?=$order_info->send_name?>','<?=$order_info->send_email?>')";><font color=red>[발송]</font></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전화번호</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_tphone" type="text" value="<?=$order_info->send_tphone?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;휴대폰</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="send_hphone" type="text" value="<?=$order_info->send_hphone?>" class="form1"> <a href="javascript:sendSms('<?=$order_info->send_name?>','<?=$order_info->send_hphone?>')";><font color=red>[발송]</font></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우편번호</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$order_info->send_post); ?>
                                                      <input name="send_post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="send_post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" 찾 기 " onClick="searchZip();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주소</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="send_address" type="text" value="<?=$order_info->send_address?>" size="60" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>수취인정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;수취인명</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="rece_name" type="text" value="<?=$order_info->rece_name?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전화번호</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="rece_tphone" type="text" value="<?=$order_info->rece_tphone?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;휴대폰</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="rece_hphone" type="text" value="<?=$order_info->rece_hphone?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우편번호</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$order_info->rece_post); ?>
                                                      <input name="rece_post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="rece_post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" 찾 기 " onClick="searchZip2();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주소</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="rece_address" type="text" value="<?=$order_info->rece_address?>" size="60" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;요청사항</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><textarea name="demand" rows="6" cols="60" class="textarea"><?=$order_info->demand?></textarea></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관리자메모</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><textarea name="descript" rows="6" cols="60" class="textarea"><?=$order_info->descript?></textarea></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="115" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 목록으로 " onClick="document.location='order_list.php?page=<?=$page?>&<?=$param?>';"></td>
                                            </tr>
                                          </form>
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