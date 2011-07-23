<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>

                        <script language="JavaScript" type="text/javascript">
								<!--
								function delContent(idx){
								   if(confirm('해당페이지를 삭제하시겠습니까?')){
								      document.location = "dsn_save.php?mode=delete&idx=" + idx;
								   }
								}
								//-->
								</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="624" height="3"></td>
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
                                          $nowposi = "디자인관리 &gt; <strong>페이지추가 </strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>페이지목록 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center"> 
                                              <td width="10%" height="30" bgcolor="E9E7E7">번호</td>
                                              <td width="20%" bgcolor="E9E7E7">설명</td>
                                              <td width="50%" bgcolor="E9E7E7">주소</td>
                                              <td width="20%" bgcolor="E9E7E7">기능</td>
                                            </tr>
                                            <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          $sql = "select * from wiz_content where type = 'new' order by idx desc";
                                          $result = mysql_query($sql) or error(mysql_error());
							                     $total = mysql_num_rows($result);
							
							       	            $rows = 12;
							       	            $lists = 5;
							                   	if(!$page) $page = 1;
							                   	$page_count = ceil($total/$rows);
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
                                              <td><a href="http://<?=$HTTP_HOST?>/content.php?idx=<?=$row->idx?>" target="_blank">http://<?=$HTTP_HOST?>/content.php?idx=<?=$row->idx?></a></td>
                                              <td>
                                                <input name="Button3" type="button" class="xbtn" value="수정" onclick="document.location='dsn_content_input.php?mode=update&idx=<?=$row->idx?>'">
                                                <input name="Button3" type="button" class="xbtn" value="삭제" onclick="delContent('<?=$row->idx?>');">
                                              </td>
                                            </tr>
                                          <?
                                          		$no--;
								                        $rows--;
								                    }
								                  ?>
								                    <tr><td colspan="10" bgcolor="DEDEDE"></td></tr>
								                  </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, ""); ?>
                                          
                                          <table width="97%" height="175" border="0" cellpadding="0" cellspacing="0">
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