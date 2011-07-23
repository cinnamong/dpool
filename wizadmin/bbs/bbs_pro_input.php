<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_info = mysql_fetch_object($result);
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.code.value == ""){
      alert('게시판 영문명(db명)을 입력하세요.');
      frm.code.focus();
      return false;
   }
   
   if(frm.title.value == ""){
      alert('게시판 한글명 입력하세요.');
      frm.title.focus();
      return false;
   }
   
   if(frm.rows.value == ""){
      alert('페이지출력수 입력하세요.');
      frm.rows.focus();
      return false;
   }
   if(frm.lists.value == ""){
      alert('리스트출력수 입력하세요.');
      frm.lists.focus();
      return false;
   }

}
//-->
</script>
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
                                          $nowposi = "커뮤니티관리 &gt; <strong>게시판관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>게시판정보</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="bbs_pro_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
                                          <input type="hidden" name="mode" value="<?=$mode?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;영문명(db명)</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="code" type="text" size="30" value="<?=$bbs_info->code?>" <? if($mode == "update") echo "readonly"; ?> class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;한글명</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3"><input name="title" type="text" size="30" value="<?=$bbs_info->title?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;타이들이미지</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    if($bbs_info->titleimg != "") echo "<img src=/bbs/upfile/$bbs_info->titleimg width=500><a href=bbs_pro_save.php?mode=del_titleimg&code=$code><font color=red>[삭제]</font></a><br>";
                                                    ?>
                                                    <input name="titleimg" type="file" size="30" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;게시판주소</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    http://<?=$HTTP_HOST?>/bbs/list.php?code=<?=$bbs_info->code?> &nbsp; 
                                                    <a href="http://<?=$HTTP_HOST?>/bbs/list.php?code=<?=$bbs_info->code?>" target="_blank"><font color=red>미리보기</font></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;카테고리</td>
                                                    <td width="200" bgcolor="F8F8F8" colspan="3">쉼표로 분리 예)공지,분류1,분류2<br><input name="grp" type="text" size="60" value="<?=$bbs_info->grp?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;사용여부</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="usetype" value="Y" <? if($bbs_info->usetype == "Y" || $bbs_info->usetype == "") echo "checked"; ?>>사용함
                                                      <input type="radio" name="usetype" value="N" <? if($bbs_info->usetype == "N") echo "checked"; ?>>사용안함
                                                    </td> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;게시판타입</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="bbstype" value="BBS" <? if($bbs_info->bbstype == "BBS" || empty($bbs_info->bbstype)) echo "checked"; ?>>게시판
                                                      <input type="radio" name="bbstype" value="PHOTO" <? if($bbs_info->bbstype == "PHOTO") echo "checked"; ?>>갤러리
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;권한</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr bgcolor="EAEAEA">
                                                          <td width="20%" align="center" height="25">목록보기</td>
                                                          <td width="20%" align="center">내용보기</td>
                                                          <td width="20%" align="center">내용쓰기</td>
                                                          <td width="20%" align="center">답글쓰기</td>
                                                          <td width="20%" align="center">코멘트쓰기</td>
                                                        </tr>
                                                        <tr>
                                                          <td align="center" height="25">
                                                            <select name="lpermi">
                                                            <option value="AM" <? if($bbs_info->lpermi == "AM") echo "selected"; ?>>전체관리자
                                                            <option value="BM" <? if($bbs_info->lpermi == "BM") echo "selected"; ?>>우수회원
                                                            <option value="CM" <? if($bbs_info->lpermi == "CM") echo "selected"; ?>>회원
                                                            <option value="ZM" <? if($bbs_info->lpermi == "ZM" || $bbs_info->lpermi == "") echo "selected"; ?>>비회원
                                                            </select>&nbsp; 
                                                          </td>
                                                          <td align="center">
                                                            <select name="rpermi">
                                                            <option value="AM" <? if($bbs_info->rpermi == "AM") echo "selected"; ?>>전체관리자
                                                            <option value="BM" <? if($bbs_info->rpermi == "BM") echo "selected"; ?>>우수회원
                                                            <option value="CM" <? if($bbs_info->rpermi == "CM") echo "selected"; ?>>회원
                                                            <option value="ZM" <? if($bbs_info->rpermi == "ZM" || $bbs_info->rpermi == "") echo "selected"; ?>>비회원
                                                            </select>&nbsp; 
                                                          </td>
                                                          <td align="center">
                                                            <select name="wpermi">
                                                            <option value="AM" <? if($bbs_info->wpermi == "AM") echo "selected"; ?>>전체관리자
                                                            <option value="BM" <? if($bbs_info->wpermi == "BM") echo "selected"; ?>>우수회원
                                                            <option value="CM" <? if($bbs_info->wpermi == "CM") echo "selected"; ?>>회원
                                                            <option value="ZM" <? if($bbs_info->wpermi == "ZM" || $bbs_info->wpermi == "") echo "selected"; ?>>비회원
                                                            </select>
                                                          </td>
                                                          <td align="center">
                                                            <select name="apermi">
                                                            <option value="AM" <? if($bbs_info->apermi == "AM") echo "selected"; ?>>전체관리자
                                                            <option value="BM" <? if($bbs_info->apermi == "BM") echo "selected"; ?>>우수회원
                                                            <option value="CM" <? if($bbs_info->apermi == "CM") echo "selected"; ?>>회원
                                                            <option value="ZM" <? if($bbs_info->apermi == "ZM" || $bbs_info->cpermi == "") echo "selected"; ?>>비회원
                                                            </select>
                                                          </td>
                                                          <td align="center">
                                                            <select name="cpermi">
                                                            <option value="AM" <? if($bbs_info->cpermi == "AM") echo "selected"; ?>>전체관리자
                                                            <option value="BM" <? if($bbs_info->cpermi == "BM") echo "selected"; ?>>우수회원
                                                            <option value="CM" <? if($bbs_info->cpermi == "CM") echo "selected"; ?>>회원
                                                            <option value="ZM" <? if($bbs_info->cpermi == "ZM" || $bbs_info->cpermi == "") echo "selected"; ?>>비회원
                                                            </select>
                                                          </td>
                                                        </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;자동 비밀글</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="checkbox" name="privacy" value="Y" <? if($bbs_info->privacy == "Y") echo "checked"; ?>>작성자와 운영자만 연람가능
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;답글 메일알림</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="remail" value="Y" <? if($bbs_info->remail == "Y") echo "checked"; ?>>허용함
                                                      <input type="radio" name="remail" value="N" <? if($bbs_info->remail == "N" || empty($bbs_info->remail)) echo "checked"; ?>>허용안함
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;파일업로드</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="upfile" value="Y" <? if($bbs_info->upfile == "Y" || empty($bbs_info->upfile)) echo "checked"; ?>>허용함
                                                      <input type="radio" name="upfile" value="N" <? if($bbs_info->upfile == "N") echo "checked"; ?>>허용안함
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;코멘트 허용</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                      <input type="radio" name="comment" value="Y" <? if($bbs_info->comment == "Y") echo "checked"; ?>>허용함
                                                      <input type="radio" name="comment" value="N" <? if($bbs_info->comment == "N" || empty($bbs_info->comment)) echo "checked"; ?>>허용안함
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;페이지출력수</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="rows" type="text" value="<? if($bbs_info->rows == "") echo "20"; else echo $bbs_info->rows; ?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;리스트출력수</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="lists" type="text" value="<? if($bbs_info->lists == "") echo "5"; else echo $bbs_info->lists; ?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;new 기간설정</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="new" type="text" value="<? if($bbs_info->new == "") echo "2"; else echo $bbs_info->new; ?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hot 조회수설정</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="hot" type="text" value="<? if($bbs_info->hot == "") echo "300"; else echo $bbs_info->hot; ?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;욕설,비방글<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;필터링</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                      <input type="checkbox" name="abuse" value="Y" <? if($bbs_info->abuse == "Y") echo "checked"; ?>>사용함 &nbsp; (공백없이 단어를 입력하시고, 단어와 단어사이에는 콤마(,)로 구분하세요.)<br>
                                                      <textarea name="abtxt" rows="3" cols="80" class="textarea"><?=$bbs_info->abtxt?></textarea></td>
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
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>도움말</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                              - 영문명은 반드시 영문으로 작성하고 변경이 불가합니다.<br>
                                              - 권한설정은 각 상황별 회원분류에따라 접근권한을 설정합니다.<br>
                                              - 욕설,비방글 설정을 통하여 글 작성시 욕설 비방글을 방지할 수 있습니다.
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='bbs_pro_list.php';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="document.location='bbs_pro_list.php';"></td>
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