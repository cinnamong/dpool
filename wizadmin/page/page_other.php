<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>


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
                                          $nowposi = "���������� &gt; <strong>��Ÿ������</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>��Ÿ������ </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="page_save.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="other">
                                          <input type="hidden" name="type" value="<?=$type?>">
                                          <input type="hidden" name="content" value="<?=$page_info->content?>">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����Ʈ��</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
																	 $type = "sitemap";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);

                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="sitemap_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAQ</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "faq";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="faq_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�α���</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "login";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="login_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���̼���</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "myshop";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="myshop_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ֹ��Է�</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "orderform";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="orderform_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����ϱ�</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "orderpay";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="orderpay_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ֹ��Ϸ�</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "ordercom";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="ordercom_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ǰ�˻�</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "prdsearch";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="prdsearch_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ż�ǰ</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "new";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="new_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��õ��ǰ</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "recom";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="recom_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�α��ǰ</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "popular";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="popular_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                  <tr> 
                                                   <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ϻ�ǰ</td>
                                                   <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <?
                                                    $type = "sale";
																	 $sql = "select * from wiz_page where type='$type'";
																	 $result = mysql_query($sql) or error(mysql_error());
																	 $page_info = mysql_fetch_object($result);
																	 
                                                    if($page_info->subimg != "") echo "<img src='/images/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[����]</font></a><br>";
                                                    ?>
                                                   <input type="file" name="sale_subimg" class="form1"> &nbsp; 
                                                   </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>����</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8">
                                            <tr>
                                              <td>
                                                - ��ܿ� ��ġ�� �����͸� �̿��Ͽ� �̹��� ����, ��Ʈ ũ��,���� ��ġ �̵��� �����մϴ�.<br>
                                                - ���� �ҽ� ������ �Ͻǰ�� �ϴܿ� "html����" �� üũ�ϼ���.
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
                                              <td width="60" align="right"><input type="submit" class="t" value=" Ȯ �� "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="left"><input type="button" class="t" value=" �� �� " onClick="history.go(-1);"></td>
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
                            <td><img src="..../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>