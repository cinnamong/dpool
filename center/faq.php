<?
$code = "faq";
include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/bbs_info.inc"; 	 	// �Խ��� ����

$now_position = "<a href=/>Home</a> &gt; ������ &gt; <b>�����ϴ�����</b>";
$page_type = "faq";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td style="padding:15">
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<form name="frm" action="faq.php" method="post">
							<tr><td><img src="/images/faq_search.gif"></td>
								<td><input type=text name="keyword" value="<?=$keyword?>" size=45 class="input"></input></td>
								<td><input type="image" src="/images/but_search.gif" border=0></a></td></tr>
							</form>
							</table>
					</td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=5 cellspacing=0 width=98%>
							<tr><td background="/images/faq_bar.gif" style="padding:0 10 0 0">
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td><img src="/images/faq_t_01.gif"></td>
									<td align=right>
										<table border=0 cellpadding=0 cellspacing=0>
										<tr><td><a href="faq.php?grp=�ֹ�/����"><img src="/images/faq_b_<? if($grp != "�ֹ�/����") echo "b_"; ?>01.gif" border=0></a></td>
											<td><a href="faq.php?grp=��۰���"><img src="/images/faq_b_<? if($grp != "��۰���") echo "b_"; ?>02.gif" border=0></a></td>
											<td><a href="faq.php?grp=��ǰ/���"><img src="/images/faq_b_<? if($grp != "��ǰ/���") echo "b_"; ?>03.gif" border=0></a></td>
											<td><a href="faq.php?grp=ȸ������"><img src="/images/faq_b_<? if($grp != "ȸ������") echo "b_"; ?>04.gif" border=0></a></td>
											<td><a href="faq.php?grp=��Ÿ����"><img src="/images/faq_b_<? if($grp != "��Ÿ����") echo "b_"; ?>05.gif" border=0></a></td></tr>
										</table>
									</td></tr>
									</table>
							</td></tr>
                     <?
                     if($bbs_info->rows == "") $bbs_info->rows = 12;
					   	if($bbs_info->lists == "") $bbs_info->lists = 5;
                     if(!$page || $page > $page_count) $page = 1;
                     
                     $sql = "select * from wiz_bbs where code = '$code' order by idx desc";
                     
                     if($keyword != "")
                     	$sql = "select * from wiz_bbs where code = '$code' and (subject like '%$keyword%' or content like '%$keyword%') order by idx desc";
                     
                     if($grp != "")
                     	$sql = "select * from wiz_bbs where code = '$code' and grp = '$grp' order by idx desc";
                     	
                     $result = mysql_query($sql) or error(mysql_error());
                     $total = mysql_num_rows($result);
                     $start = ($page-1)*$rows;
					   	$no = $total-$start;
                     while(($row = mysql_fetch_object($result)) && $bbs_info->rows){
                     ?>
							<tr><td bgcolor=#E3D0EB height=1></td></tr>
							<tr><td height=30><font color="#A54ACF"><b><?=$no?>. <?=$row->subject?></b></font></td></tr>
							<tr><td bgcolor=#E3D0EB height=1></td></tr>
							<tr><td style="padding:10 15 10 15"><?=$row->content?></td></tr>
							<tr><td height=4 background="/images/customer_r_line.gif"></td></tr>
							<?
								$no--;
								$bbs_info->rows--;
							}
							?>
							</table>
							<br>
							<? print_pagelist($page, $bbs_info->lists, $page_count, "&code=$code"); ?>
							
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>