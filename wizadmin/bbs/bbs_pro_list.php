<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

<script language="JavaScript" type="text/javascript">
<!--
function deleteBbs(code){
   if(confirm('선택한 게시판을 삭제하시겠습니까?\n\n삭제한 데이타는 복구할수 없습니다.')){
      document.location = 'bbs_pro_save.php?mode=delete&code=' + code;
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
                                          $nowposi = "커뮤니티관리 &gt; <strong>게시판관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>게시판목록</strong></td>
                                            </tr>
                                          </table>
                                          <?
                                          	$sql = "select * from wiz_bbsinfo";
									                  $result = mysql_query($sql) or error(mysql_error());
									                  $total = mysql_num_rows($result);

									                  $rows = 20;
									    	            $lists = 5;
									                	$page_count = ceil($total/$rows);
									                	if(!$page || $page > $page_count) $page = 1;
									                	$start = ($page-1)*$rows;
									                	$no = $total-$start;
									                	if($start>1) mysql_data_seek($result,$start);
								                  ?>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td>총 게시판수 : <b><?=$total?></b></td>
                                              <td align="right"><input type="submit" class="t" value="게시판추가" onClick="document.location='bbs_pro_input.php?mode=insert';"></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="50" height="30" bgcolor="E9E7E7" align="center">번호</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">영문명</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">게시판명</td>
                                              <td width="70" bgcolor="E9E7E7" align="center">사용</td>
                                              <td width="70" bgcolor="E9E7E7" align="center">게시판타입</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">목록보기</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">읽기</td>
                                              <td width="60" bgcolor="E9E7E7" align="center">쓰기</td>
                                              <td width="200" bgcolor="E9E7E7" align="center">기능</td>
                                            </tr>
                                            <tr><td colspan="20" bgcolor="DEDEDE"></td></tr>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															if($rows%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
														?>
														  <tr bgcolor="<?=$bgcolor?>"> 
                                              <td height="30" align="center"><?=$no?></td>
                                              <td align="center"><?=$row->code?></td>
                                              <td align="center"><?=$row->title?></td>
                                              <td align="center"><? if($row->usetype == "Y") echo "사용함"; else echo "사용안함"; ?></td>
                                              <td align="center"><? if($row->bbstype == "BBS") echo "게시판"; else echo "포토갤러리"; ?></td>
                                              <td align="center"><?=user_level($row->lpermi)?></td>
                                              <td align="center"><?=user_level($row->rpermi)?></td>
                                              <td align="center"><?=user_level($row->wpermi)?></td>
                                              <td align="center">
                                              <input type="button" value="게시물관리" class="xbtn" onClick="document.location='bbs_list.php?code=<?=$row->code?>'">
                                              <input type="button" value="수정" class="xbtn" onClick="document.location='bbs_pro_input.php?mode=update&code=<?=$row->code?>'">
                                              <input type="button" value="삭제" class="xbtn" onClick="deleteBbs('<?=$row->code?>');">
                                              </td>
                                            </tr>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                                          
							                   	if($total <= 0){
							                   	   echo "<tr><td colspan=20 bgcolor=DEDEDE></td></tr>";
							                   		echo "<tr><td height='30' colspan=8 align=center>등록된 게시판이 없습니다.</td></tr>";
							                   		echo "<tr><td colspan=20 bgcolor=DEDEDE></td></tr>";
							                   	}
								                  ?>
                                            <tr><td colspan="9" bgcolor="DEDEDE"></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td align="center"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
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