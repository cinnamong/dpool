<?
$code = "notice";
include "inc/bbs_info.inc"; 	 	// 게시판 정보

$sql = "select * from wiz_bbs where code = 'notice' order by idx desc limit 3";

$result = mysql_query($sql) or error(mysql_error());
?>

							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="25%"><img src="img/hotnews.gif" height="54"></td>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
<?
while(($row = mysql_fetch_object($result))){

$row->subject = cut_str($row->subject,30);

$today = date('Ymd');
//if(($today-str_replace("-", "", $row->wdate)) < $bbs_info->new) $row->subject .= " <img src=bbs/bbsimg/new.gif align=absmiddle> ";	// new
?>
                                      <tr> 
                                        <td width="3%"><img src="img/black_dot.gif" width="2" height="2"></td>
                                        <td class="notice">[NEWS] <a href="/bbs/view.php?code=notice&idx=<?=$row->idx?>"><?=$row->subject?></a></td>
                                      </tr>
<?
}
?>
                                    </table></td>
                                </tr>
                              </table>