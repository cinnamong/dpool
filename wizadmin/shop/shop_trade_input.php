<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
if($trade_mode == "update"){
	$sql = "select * from wiz_tradecom where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$cominfo = mysql_fetch_array($result);
}
?>
								<script language="JavaScript" type="text/javascript">
								<!--
								
								function inputCheck(frm){
								   
								   if(frm.com_name.value == ""){
								      alert("상호를 입력하세요");
								      frm.com_name.focus();
								      return false;
								   }
								   if(frm.com_type.value == ""){
								      alert("업체구분을 선택하세요");
								      frm.com_type.focus();
								      return false;
								   }
								}
								
								// 우편번호 찾기
								function searchPost(){
								   document.frm.com_address.focus();
								   var url = "../member/search_post.php?kind=com_";
								   window.open(url, "searchPost", "height=250, width=417, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
								}
								//-->
								</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="624" height="3"></td>
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
                                          $nowposi = "상점관리 &gt; <strong>거래처관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>거래처 정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                <form name="frm" action="shop_save.php" method="post" onSubmit="return inputCheck(this);">
                                                <input type="hidden" name="mode" value="shop_trade">
                                                <input type="hidden" name="trade_mode" value="<?=$trade_mode?>">
                                                <input type="hidden" name="idx" value="<?=$idx?>">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사업자등록번호</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                      <input name="com_num" value="<?=$cominfo[com_num]?>" type="text" class="form1">
                                                    </td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;업체구분</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                      <select name="com_type">
                                                      <option value="">:: 선택 ::
                                                      <option value="BUY" <? if($cominfo[com_type] == "BUY") echo "selected"; ?>>매입처
                                                      <option value="SAL" <? if($cominfo[com_type] == "SAL") echo "selected"; ?>>매출처
                                                      <option value="DEL" <? if($cominfo[com_type] == "DEL") echo "selected"; ?>>배송업체
                                                      <option value="OTH" <? if($cominfo[com_type] == "OTH") echo "selected"; ?>>기타
                                                      </select>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상호</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="com_name" value="<?=$cominfo[com_name]?>" type="text"  class="form1">
                                                    </td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;대표자</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="com_owner" value="<?=$cominfo[com_owner]?>" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사업장주소</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <? list($com_post, $com_post2) = explode("-", $cominfo[com_post]); ?>
                                                      <input type="text" name="com_post" value="<?=$com_post?>" size="6" class="form1">
                                                      <input type="text" name="com_post2" value="<?=$com_post2?>" size="6" class="form1">
                                                      <input name="com_address" value="<?=$cominfo[com_address]?>" type="text" size="50" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;업태</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="com_kind" value="<?=$cominfo[com_kind]?>" type="text" class="form1">
                                                    </td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;종목</td>
                                                    <td bgcolor="F8F8F8">
                                                       <input name="com_class" value="<?=$cominfo[com_class]?>" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table><br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전화번호</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                      <input name="com_tel" value="<?=$cominfo[com_tel]?>" type="text" class="form1">
                                                    </td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;팩스</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                      <input name="com_fax" value="<?=$cominfo[com_fax]?>" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;거래은행</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="com_bank" value="<?=$cominfo[com_bank]?>" type="text" class="form1">
                                                    </td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;계좌번호</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="com_account" value="<?=$cominfo[com_account]?>" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;홈페이지</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <input name="com_homepage" value="<?=$cominfo[com_homepage]?>" size="30" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table><br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                                  <tr> 
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;담당자</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                      <input name="charge_name" value="<?=$cominfo[charge_name]?>" type="text" class="form1">
                                                    </td>
                                                    <td width="20%" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;담당자 이메일</td>
                                                    <td width="30%" bgcolor="F8F8F8">
                                                      <input name="charge_email" value="<?=$cominfo[charge_email]?>" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;담당자 휴대폰</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="charge_hand" value="<?=$cominfo[charge_hand]?>" type="text" class="form1">
                                                    </td>
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;담당자 전화</td>
                                                    <td bgcolor="F8F8F8">
                                                      <input name="charge_tel" value="<?=$cominfo[charge_tel]?>" type="text" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기타사항</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <textarea name="descript" cols="70" rows="5" class="textarea"><?=$cominfo[descript]?></textarea>
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
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='shop_trade.php';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td>
                                          </tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                        </td>
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