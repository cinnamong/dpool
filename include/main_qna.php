<?
$code = "qna";
include "inc/bbs_info.inc"; 	 	// 게시판 정보

$sql = "select * from wiz_bbs where code = 'qna' order by idx desc limit 3";

$result = mysql_query($sql) or error(mysql_error());
?>
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="33%" valign="top"><img src="img/qnaboard.gif"></td>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1">
<?
while(($row = mysql_fetch_object($result))){

$row->subject = cut_str($row->subject,25);

$today = date('Ymd');
//if(($today-str_replace("-", "", $row->wdate)) < $bbs_info->new) $row->subject .= " <img src=/bbs/bbsimg/new.gif align=absmiddle> ";	// new
?>
                                <tr> 
                                  <td width="5%"><img src="img/black_dot.gif" width="2" height="2"></td>
                                  <td class="notice"><a href="/bbs/view.php?code=qna&idx=<?=$row->idx?>"><?=$row->subject?></a></td>
                                </tr>
<?
}
?>
                              </table></td>
                          </tr>
                        </table>