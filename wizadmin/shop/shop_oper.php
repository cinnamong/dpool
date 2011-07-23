<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../inc/header.inc"; ?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
// 적립금 비율 다시적용
function setReserve(frm){
   
   var reserve_per = frm.reserve_per.value;
   
   if(Check_Num(reserve_per)){
   	if(confirm("모든 상품의 적립금이 상품가격의 "+reserve_per+"% 로 일괄적용 됩니다.\n\n진행하시겠습니까?")){
      	document.location = "shop_save.php?mode=setreserve&reserve_per=" + reserve_per;
      }
   }else{
      alert("숫자를 입력하세요");
      frm.reserve_per.value = "";
      frm.reserve_per.focus();
   }
}
//-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="86%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">

                                          <?
                                          $nowposi = "상점관리 &gt; <strong>운영정보설정</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>결제정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="shop_save.php" method="post">
                                          <input type="hidden" name="mode" value="oper_info">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;결제방법</td>
                                                    <td width="80%" bgcolor="F8F8F8">
																	<?
																	$pay_list = explode("/",$oper_info->pay_method);
																	for($ii=0; $ii<count($pay_list); $ii++){
																	$pay_method[$pay_list[$ii]] = true;
																	}
																	?>
                                                    <input type="checkbox" name="pay_method[]" value="PB" <? if($pay_method["PB"]==true) echo "checked";?>>무통장입금
                                                    <input type="checkbox" name="pay_method[]" value="PC" <? if($pay_method["PC"]==true) echo "checked";?>>카드결제
                                                    <input type="checkbox" name="pay_method[]" value="PH" <? if($pay_method["PH"]==true) echo "checked";?>>휴대폰결제
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;결제시스템ID</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input name="pay_id" value="<?=$oper_info->pay_id?>" type="text" class="form1"> &nbsp;
                                                    <input name="pay_agent" value="KCP" type="radio" class="form1" <? if($oper_info->pay_agent == "KCP") echo "checked"; ?>> KCP &nbsp;
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;은행계좌번호</td>
                                                    <td bgcolor="F8F8F8"><textarea cols="50" rows="5" name="pay_account" class="textarea"><?=$oper_info->pay_account?></textarea></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" cellpadding="0" cellspacing="0">
                                            <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>결제시스템ID</b></td>
                                               <td>: 카드결제 시스템 아이디 와 결제시스템 회사입니다. </td>
                                             </tr>
                                             <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>은행계좌번호</b></td>
                                               <td>: 주문시 사용할 은행계좌를 한줄에 하나씩 입력합니다. ex) 국민은행 484201-01-127831, 예금주: 위즈샵</td>
                                             </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>배송료설정 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;배송무료</td>
                                                    <td width="80%" bgcolor="F8F8F8">
                                                    <input type="radio" name="del_method" value="DA" <? if($oper_info->del_method == "DA") echo "checked"; ?>>
                                                    배송비 전액무료</td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;수신자부담</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input type="radio" name="del_method" value="DB" <? if($oper_info->del_method == "DB") echo "checked"; ?>>
                                                    수신자부담 (착불)</td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;고정값</td>
                                                    <td bgcolor="F8F8F8">
                                                    <input type="radio" name="del_method" value="DC" <? if($oper_info->del_method == "DC") echo "checked"; ?>>
                                                    <input name="del_fixprice" type="text" value="<?=$oper_info->del_fixprice?>" class="form1">원</td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;구매가격별</td>
                                                    <td bgcolor="F8F8F8">
                                                      <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td>
                                                            <input type="radio" name="del_method" value="DD" <? if($oper_info->del_method == "DD") echo "checked"; ?>>
                                                            <input type="text" name="del_staprice" value="<?=$oper_info->del_staprice?>" class="form1">
                                                          </td>
                                                          <td>&nbsp;이상구매시 <input type="text" name="del_staprice2" value="<?=$oper_info->del_staprice2?>" class="form1"> 원</td>
                                                        </tr>                  
                                                        <tr>
                                                          <td></td>
                                                          <td>&nbsp;이하구매시 <input type="text" name="del_staprice3" value="<?=$oper_info->del_staprice3?>" class="form1"> 원</td>
                                                        </tr>   
                                                      </table>   
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;지역할증</td>
                                                    <td bgcolor="F8F8F8">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td>우편번호</td>
                                                        <td>할증료</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td> 
                                                        <input name="del_extrapost1" type="text" value="<?=$oper_info->del_extrapost1?>" class="form1" size="9"> 부터  
                                                        <input name="del_extrapost12" type="text" value="<?=$oper_info->del_extrapost12?>" class="form1" size="9"> 까지 
                                                        </td>
                                                        <td>
                                                        <input name="del_extraprice1" type="text" value="<?=$oper_info->del_extraprice1?>" class="form1" size="20">원
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td> 
                                                        <input name="del_extrapost2" type="text" value="<?=$oper_info->del_extrapost2?>" class="form1" size="9"> 부터  
                                                        <input name="del_extrapost22" type="text" value="<?=$oper_info->del_extrapost22?>" class="form1" size="9"> 까지 
                                                        </td>
                                                        <td>
                                                        <input name="del_extraprice2" type="text" value="<?=$oper_info->del_extraprice2?>" class="form1" size="20">원
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td width="10"></td>
                                                        <td> 
                                                        <input name="del_extrapost3" type="text" value="<?=$oper_info->del_extrapost3?>" class="form1" size="9"> 부터  
                                                        <input name="del_extrapost32" type="text" value="<?=$oper_info->del_extrapost32?>" class="form1" size="9"> 까지 
                                                        </td>
                                                        <td>
                                                        <input name="del_extraprice3" type="text" value="<?=$oper_info->del_extraprice3?>" class="form1" size="20">원
                                                        </td>
                                                      </tr>
                                                    </table>
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" cellpadding="0" cellspacing="0">
                                            <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>배송료 선택</b></td>
                                               <td>: 배송료를 4가지 형태로 구분하며 각 상황별 배송료 설정을 합니다.</td>
                                             </tr>
                                             <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="100"> <img src="../image/mark_dotblue.gif"> <b>지역할증</b></td>
                                               <td>: 각지역별로 할증 배송료를 설정 합니다. 북제주군 한경면인 경우 695840 부터 695844 까지 2000원</td>
                                             </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>적립금설정 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사용여부</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="radio" name="reserve_use" value="Y" <? if($oper_info->reserve_use == "Y") echo "checked"; ?>>사용함
                                                    <input type="radio" name="reserve_use" value="N" <? if($oper_info->reserve_use == "N") echo "checked"; ?>>사용안함</td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;회원가입 적립금</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="reserve_join" type="text" value="<?=$oper_info->reserve_join?>" class="form1"></td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;추천인 적립금</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="reserve_recom" type="text" value="<?=$oper_info->reserve_recom?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;최소사용 적립금</td>
                                                    <td bgcolor="F8F8F8"><input name="reserve_min" type="text" value="<?=$oper_info->reserve_min?>" class="form1"></td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1회 최대사용 적립금</td>
                                                    <td bgcolor="F8F8F8"><input name="reserve_max" type="text" value="<?=$oper_info->reserve_max?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품구매시 적립금</td>
                                                    <td bgcolor="F8F8F8"><input name="reserve_buy" type="text" value="<?=$oper_info->reserve_buy?>" class="form1"> %</td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;적립금 일괄적용</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="reserve_per" type="text" value="<?=$oper_info->reserve_per?>" class="form1" size="10"> % &nbsp;
                                                      <input type="button" class="t" value=" 적 용 " onClick="setReserve(this.form);">
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="10"></td>
                                            </tr>
                                          </table>
                                          <table width="97%" cellpadding="0" cellspacing="0">
                                            <tr>
                                               <td width="10"></td>
                                               <td valign="top" width="110"> <img src="../image/mark_dotblue.gif"> <b>사용여부</b></td>
                                               <td>: 상품구입시 적립금 누적/사용 , 회원가입시, 추천인인경우 등 적립금 사용이 가능합니다.</td>
                                             </tr>
                                             <tr>
                                               <td></td>
                                               <td valign="top"> <img src="../image/mark_dotblue.gif"> <b>상품구매시 적립금</b></td>
                                               <td>: 상품등록시 판매금액에 작성한 퍼센트를 적용하여 적립금이 자동계산됩니다.</td>
                                             </tr>
                                             <tr>
                                               <td></td>
                                               <td valign="top"> <img src="../image/mark_dotblue.gif"> <b>적립금 일괄적용</b></td>
                                               <td>: 현재 등록되어있는 상품에 적립금을 작성한 퍼센트로 다시 적용합니다.</td>
                                             </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>상품평설정 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사용여부</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                    <input type="radio" name="review_use" value="Y" <? if($oper_info->review_use == "Y") echo "checked"; ?>>사용함
                                                    <input type="radio" name="review_use" value="N" <? if($oper_info->review_use == "N") echo "checked"; ?>>사용안함
                                                    </td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;작성권한</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                    <input type="radio" name="review_level" value="E" <? if($oper_info->review_level == "E") echo "checked"; ?>>회원+비회원
                                                    <input type="radio" name="review_level" value="M" <? if($oper_info->review_level == "M") echo "checked"; ?>>회원만
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table><br>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif"> <strong>도움말</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                              - 이해가 가지 않는 부분이나 의문점이 있으시면 위즈샵 help@wizshop.net 으로 문의하시기 바랍니다.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="115" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
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