<? include "../../inc/global.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<script language="javascript">
<!--
function searchZip(){
	document.frm.com_address.focus();
	var url = "../member/search_zip.php?kind=com_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
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
                                  <td align="center" valign="top" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">

                                          <?
                                          $nowposi = "상점관리 &gt; <strong>기본정보설정</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>관리자정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="shop_save.php" method="post">
                                          <input type="hidden" name="mode" value="shop_info">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;쇼핑몰 이름</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="shop_name" value="<?=$shop_info->shop_name?>" type="text" class="form1"></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관리자 아이디</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="shop_id" type="text" value="<?=$shop_info->shop_id?>" class="form1" readonly></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관리자 비밀번호</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="shop_pw" type="text" value="<?=$shop_info->shop_pw?>" class="form1" size="20"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관리자 e-mail</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="shop_email" type="text" value="<?=$shop_info->shop_email?>" size="28" class="form1"></td>
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관리자 휴대폰</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="shop_hand" type="text" value="<?=$shop_info->shop_hand?>" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <br>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>사업자정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사업자등록번호</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="com_num" type="text" value="<?=$shop_info->com_num?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상호</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="com_name" type="text" value="<?=$shop_info->com_name?>" class="form1"></td>
                                                    <td width="20%" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;대표자명</td>
                                                    <td width="30%" bgcolor="F8F8F8"><input name="com_owner" type="text" value="<?=$shop_info->com_owner?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우편번호</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <? list($post, $post2) = explode("-",$shop_info->com_post); ?>
                                                      <input name="com_post" type="text" value="<?=$post?>" size="5" class="form1"> - 
                                                      <input name="com_post2" type="text" value="<?=$post2?>" size="5" class="form1"> 
                                                      <input name="Button" type="button" class="t" value=" 찾 기 " onClick="searchZip();">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주소</td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input name="com_address" type="text" value="<?=$shop_info->com_address?>" size="50" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;업태</td>
                                                    <td bgcolor="F8F8F8"><input name="com_kind" type="text" value="<?=$shop_info->com_kind?>" class="form1"></td>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;종목</td>
                                                    <td bgcolor="F8F8F8"><input name="com_class" type="text" value="<?=$shop_info->com_class?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전화번호</td>
                                                    <td bgcolor="F8F8F8"><input name="com_tel" type="text" value="<?=$shop_info->com_tel?>" class="form1"></td>
                                                    <td align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;팩스번호</td>
                                                    <td bgcolor="F8F8F8"><input name="com_fax" type="text" value="<?=$shop_info->com_fax?>" class="form1"></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>도움말</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                                <table width="670" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td width="5"></td>
                                                    <td valign="top" width="100"> - 관리자 비밀번호</td>
                                                    <td>: 관리자페이지 로그인시 비밀번호 입니다.</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td valign="top" width="100"> - 관리자 이메일</td>
                                                    <td>: 주문현황, 회원탈퇴등 고객으로부터 메일을 받는 주소입니다.</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td valign="top" width="100"> - 관리자 휴대폰</td>
                                                    <td>: SMS 사용시 주문,가입 알림 메세지를 받는 번호입니다.</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td valign="top" width="100"> - 사업자정보</td>
                                                    <td>: 사이트 운영에 반영되므로 실제 상점 운영자의 정보를 입력해야합니다.</td>
                                                  </tr>
                                                </table>
                                              </td>
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
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
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