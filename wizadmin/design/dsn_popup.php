<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>


                        <script language="JavaScript" type="text/javascript">
								<!--
								function delContent(idx){
								   if(confirm('해당팝업을 삭제하시겠습니까?')){
								      document.location = "dsn_save.php?mode=delete&idx=" + idx;
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
                                          $nowposi = "디자인관리 &gt; <strong>팝업관리</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>팝업목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="10%" height="30" bgcolor="E9E7E7">번호</td>
                                              <td width="40%" bgcolor="E9E7E7">제목</td>
                                              <td width="20%" bgcolor="E9E7E7">공지기간</td>
                                              <td width="15%" bgcolor="E9E7E7">등록일</td>
                                              <td width="15%" bgcolor="E9E7E7">기능</td>
                                            </tr>
                                            <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          $sql = "select * from wiz_content where type = 'popup' order by idx desc";
                                          $result = mysql_query($sql) or error(mysql_error());
							                     $total = mysql_num_rows($result);
							
							       	            $rows = 12;
							       	            $lists = 5;
							                   	$page_count = ceil($total/$rows);
							                   	if($page < 1 || $page > $page_count) $page = 1;
							                   	$start = ($page-1)*$rows;
							                   	$no = $total-$start;
							                   	if($start>1) mysql_data_seek($result,$start);
							                   	
							                     while(($row = mysql_fetch_object($result)) && $rows){
							                     	if(($no%2) == 1) $bgcolor="#F3F3F3";
							                     	else $bgcolor="#ffffff";
                                          ?>
                                            <tr align="center" bgcolor="<?=$bgcolor?>"> 
                                              <td height="30" align="center"><?=$no?></td>
                                              <td><?=$row->title?></td>
                                              <td><?=$row->sdate?>~<?=$row->edate?></td>
                                              <td><?=$row->wdate?></td>
                                              <td>
                                                <input name="Button3" type="button" class="xbtn" value="수정" onclick="document.location='dsn_popup_input.php?mode=update&idx=<?=$row->idx?>'">
                                                <input name="Button3" type="button" class="xbtn" value="삭제" onclick="delContent('<?=$row->idx?>');">
                                              </td>
                                            </tr>
                                          <?
                                          		$no--;
								                        $rows--;
								                    }
								                    
								                    if($total <= 0) echo "<tr><td colspan='5' align='center'>작성된 팝업이 없습니다.</td></tr>";
								                  ?>
								                    <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
								                  </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, ""); ?>

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