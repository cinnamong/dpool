<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 게시물 정보
$sql = "select * from wiz_bbs where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_row = mysql_fetch_object($result);

if(isImgtype("../../bbs/upfile/".$code."/thumbM_".$bbs_row->upfile)) $bbs_row->upimg .= "<a href=javascript:openImg('$bbs_row->upfile');><img src='../../bbs/upfile/$code/thumbM_".$bbs_row->upfile."' border='0'></a><br>";
if(isImgtype("../../bbs/upfile/".$code."/thumbM_".$bbs_row->upfile2)) $bbs_row->upimg .= "<a href=javascript:openImg('$bbs_row->upfile2');><img src='../../bbs/upfile/$code/thumbM_".$bbs_row->upfile2."' border='0'></a><br>";
if(isImgtype("../../bbs/upfile/".$code."/thumbM_".$bbs_row->upfile3)) $bbs_row->upimg .= "<a href=javascript:openImg('$bbs_row->upfile3');><img src='../../bbs/upfile/$code/thumbM_".$bbs_row->upfile3."' border='0'></a><br>";
if($bbs_row->category != "") $bbs_row->subject = "[".$bbs_row->category."] ".$bbs_row->subject;
$bbs_row->content = str_replace("\n", "<br>", $bbs_row->content);

if($bbs_row->upfile != "") $bbs_row->upfile = "<a href='bbs_down.php?code=$code&idx=$idx'>$bbs_row->upfile_name</a><br>";
if($bbs_row->upfile2 != "") $bbs_row->upfile .= "<a href='bbs_down.php?code=$code&idx=$idx&no=2'>$bbs_row->upfile2_name</a><br>";
if($bbs_row->upfile3 != "") $bbs_row->upfile .= "<a href='bbs_down.php?code=$code&idx=$idx&no=3'>$bbs_row->upfile3_name</a>";

?>
<script language="JavaScript" type="text/javascript">
<!--
function openImg(img){
   var url = "bbs_openimg.php?code=<?=$code?>&img=" + img;
   window.open(url,"openImg","width=300,height=300,scrollbars=yes");
}
function deleteConfirm(idx){
   if(confirm('선택한 글을 삭제하시겠습니까?')){
      document.location = "bbs_save.php?code=<?=$code?>&mode=delete&idx=" + idx + "&page=<?=$page?>";
   }
}
//-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="87%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          
                                          <?
                                          $nowposi = "커뮤니티관리 &gt; <strong>게시물관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>게시물관리</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                          <form action="bbs_list.php" method="post">
                                            <tr>
                                              <td width="80"><b>선택게시판 :</b></td>
                                              <td>
                                              <select name="code" onChange="this.form.submit();">
								                      <?
								                        $sql = "select code, title from wiz_bbsinfo";
								                        $result = mysql_query($sql) or error(mysql_error());
								                        while($row = mysql_fetch_object($result)){
								                      ?>
								                        <option value="<?=$row->code?>" <? if($code == $row->code) echo "selected"; ?>>&nbsp; <?=$row->title?>&nbsp; 
								                      <?
								                        }
								                      ?>
								                      </select>
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </form>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="6">
                                                  <tr>
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이름</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3"><?=$bbs_row->name?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이메일</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3"><?=$bbs_row->email?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;작성일</td>
                                                    <td width="250" bgcolor="F8F8F8"><?=$bbs_row->wdate?></td>
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;파일첨부</td>
                                                    <td width="300" bgcolor="F8F8F8"><a href="bbs_down.php?code=<?=$code?>&idx=<?=$idx?>"><?=$bbs_row->upfile?></a></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;제목</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3"><?=$bbs_row->subject?></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="10" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;내용</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?=$bbs_row->upimg?>
                                                    <?=$bbs_row->content?>
                                                    </td>
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
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="300"><input type="button" value="목록보기" onClick="document.location='bbs_list.php?code=<?=$code?>&page=<?=$page?>';" class="t"></td>
                                              <td width="300"></td>
                                              <td width="60"><input type="button" class="t" value=" 수 정 " onClick="document.location='bbs_input.php?mode=update&code=<?=$code?>&idx=<?=$idx?>&page=<?=$page?>';"></td>
                                              <td width="60"><input type="button" class="t" value=" 답 변 " onClick="document.location='bbs_input.php?mode=reply&code=<?=$code?>&idx=<?=$idx?>&page=<?=$page?>';"></td>
                                              <td width="60"><input type="button" class="t" value=" 삭 제 " onClick="javascript:deleteConfirm('<?=$idx?>');"></td>
                                            </tr>
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