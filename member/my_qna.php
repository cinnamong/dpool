<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/login_check.inc";	// �α��� üũ
include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; <b>1:1 Q&A</b>";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ
include "../inc/mem_info.inc"; 		// ȸ�� ����


$page_type = "join";
include "../inc/page_info.inc"; 		// ������ ����
// �Է����� ��뿩��
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// �Է����� �ʼ�����
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>

					<table border=0 cellpadding=0 cellspacing=0 width=100%>
					  <tr><td align=center style="padding:5 0 10 0">
							
							<table border=0 cellpadding=0 cellspacing=0 width=696>
							<tr><td><a href="../member/my_shop.php"><img src="/images/myshop_m_01.gif" border=0></a></td>
								<td><a href="../member/my_order.php"><img src="/images/myshop_m_02.gif" border=0></a></td>
								<td><a href="../member/my_reserve.php"><img src="/images/myshop_m_03.gif" border=0></a></td>
								<td><a href="../member/my_qna.php"><img src="/images/myshop_m_o_04.gif" border=0></a></td>
								<td><a href="../member/my_wish.php"><img src="/images/myshop_m_05.gif" border=0></a></td>
								<td><a href="../member/my_info.php"><img src="/images/myshop_m_06.gif" border=0></a></td>
								<td><a href="../member/my_passwd.php"><img src="/images/myshop_m_07.gif" border=0></a></td>
								<td><a href="../member/my_out.php"><img src="/images/myshop_m_08.gif" border=0></a></td></tr>
							<tr><td colspan=8 background="/images/myshop_01.gif" height=57 style="padding:0 0 0 25">
								<img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font>
							</td></tr>
							</table>


					</td></tr>
					<tr><td align=center>
							
							<? include "my_view.inc"; ?>

					</td></tr>

					<!--��������-->
					<!--1:1������Ȳ-->
					<tr><td style="padding:20 0 0 5"><img src="/images/myshop_m04_01.gif"></td></tr>
					<tr><td align=center>
							<table border=0 cellpadding=0 cellspacing=0 width=690>
							<tr><td colspan=5 bgcolor=#939393 height=3></td></tr>
							<tr height=33>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray" width=110>ó����Ȳ</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray">���ǳ���</td>
								<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
								<td background="/images/shop_nomal_bar.gif" align=center class="gray" width=110>�ۼ���</td>
							</tr>
							<tr><td colspan=5 bgcolor=#f7f7f7 height=3></td></tr>
							<?
							$sql = "select * from wiz_consult where memid = '$wiz_session[id]' order by idx desc";
		               $result = mysql_query($sql) or error(mysql_error());
		               $total = mysql_num_rows($result);
			            
			            $rows = 12;
			            $lists = 5;
			            $page_count = ceil($total/$rows);
			            if(!$page || $page > $page_count) $page = 1;
			            $start = ($page-1)*$rows;
			            if($start>1) mysql_data_seek($result,$start);
			            
			            while(($row = mysql_fetch_object($result)) && $rows){
			            	if($row->status == "N") $row->status = "�����Ϸ�";
			            	else $row->status = "�亯�Ϸ�";
			            ?>
							<tr align=center height=28>								
								<td><b><?=$row->status?></b></td>
								<td></td>
								<td align=left>��<a href="my_qnaview.php?idx=<?=$row->idx?>"><?=$row->subject?></a></td>
								<td></td>
								<td><?=$row->wdate?></td></tr>
							<tr><td colspan=5 bgcolor=#dddddd height=1></td></tr>
							<?
							}
							if($total <= 0){
							?>
							<tr><td colspan=5 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> ���� ���ǳ����� �����ϴ�.</td></tr>
							<?
							}
							?>
							<tr><td colspan=5 bgcolor=#f7f7f7 height=3></td></tr>
							</table>
					</td></tr>
					<tr>
					  <td height=50>
							<table border=0 cellpadding=0 cellspacing=0 width=100%>
							  <tr>
							    <td style="padding:0 0 0 20"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
							    <td width="80" align=center><a href="../member/my_qnainput.php"><img src="/images/bbsimg/btn_write.gif" border=0></a>&nbsp;&nbsp;</td>
							  </tr>
							</table>
						</td>
				   </tr>
					</form>
					<!---���̼��� ���� ��---------------------------------------------------------------------------------------------------------------------->
					</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>