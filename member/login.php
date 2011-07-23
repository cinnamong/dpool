<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; <b>로그인</b>";
$page_type = "login";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

if($prev == "") $prev = $HTTP_REFERER;
?>
<script language="JavaScript">
<!--
function inputCheck(frm){
	if(frm.id.value == ""){
		alert("아이디를 입력하세요");
		frm.id.focus();
		return false;
	}
	if(frm.passwd.value == ""){
		alert("비밀번호를 입력하세요");
		frm.passwd.focus();
		return false;
	}
}
-->
</script>

					<table border=0 cellpadding=0 cellspacing=0 width=700>
					<tr><td height=150 align=center><img src="/images/member_login_01.gif"></td></tr>
					<tr><td align=center>
					
							<table border=0 cellpadding=0 cellspacing=0>
							<form name="frm" action="login_handle.php" method="post" onSubmit="return inputCheck(this);">
                     <input type="hidden" name="prev" value="<?=$prev?>">
							  <tr><td><img src="/images/member_login_t01.gif"></td></tr>
							  <tr><td background="/images/member_login_tbg1.gif" style="padding:10">
									<table border=0 cellpadding=0 cellspacing=0 align=center>
									<tr><td width=270><img src="/images/member_login_id.gif" align=absmiddle><input type="text" name="id" style="width:120px" class="input"></input></td>
										<td rowspan=2><input type="image" src="/images/member_btn_login.gif"></td></tr>
									<tr><td><img src="/images/member_login_pw.gif" align=absmiddle><input type="password" name="passwd" style="width:120px" class="input"></input></td></tr>
									</table>
							    </td>
							  </tr>
							  <tr><td height=11 background="/images/member_login_tbg2.gif"></td></tr>
							  <tr><td	style="padding:10 20 20 20">
									<table border=0 cellpadding=0 cellspacing=0>
									<tr height=30>
										<td><img src="/images/member_login_btn_join.gif"></td>
										<td><a href="join.php"><img src="/images/member_login_btn_join_01.gif" border=0></a></td>
										<td width=50></td>
										<td><img src="/images/member_login_btn_idsearch.gif"></td>
										<td><a href="id_search.php"><img src="/images/member_login_btn_idsearch_01.gif" border=0></a></td></tr>
									</table>
							</td></tr>
							</form>
							</table>
							<?
							if($order == "true"){
							?>
							<table border=0 cellpadding=0 cellspacing=0>
							<tr><td><img src="/images/member_login_02.gif"></td></tr>
							<tr><td background="/images/member_login_tbg1.gif" style="padding:10 20 0 0">
									<table border=0 cellpadding=0 cellspacing=0>
									<tr><td><img src="/images/member_login_02_01.gif"></td>
										<td><a href="/shop/order_form.php?order_guest=true"><img src="/images/member_login_btn_nomem.gif" border=0></a></td></tr>
									</table>
							</td></tr>
							<tr><td height=11 background="/images/member_login_tbg2.gif"></td></tr>
							</table>
							<?
							}
							?>
							<?
							if($orderlist == "true"){
							?>
							<table border=0 cellpadding=0 cellspacing=0>
							<form action="/shop/order_list.php" method="post">
							<input type="hidden" name="order_guest" value="true">
							<tr><td><img src="/images/member_login_03.gif"></td></tr>
							<tr><td background="/images/member_login_tbg1.gif" style="padding:10 20 0 10">
									<table border=0 cellpadding=0 cellspacing=0>
									  <tr>
									   <td width=140><img src="/images/member_login_o_name.gif" align=absmiddle><input type=text name="send_name" size=10 class="input"></input></td>
										<td width=220><img src="/images/member_login_o_no.gif" align=absmiddle><input type=text name="orderid" size=16 class="input"></input></td>
										<td><input type="image" src="/images/member_login_btn_o_nomem.gif" border=0></td></tr>
									</table>
							</td></tr>
							<tr><td height=11 background="/images/member_login_tbg2.gif"></td></tr>
							</form>
							</table>
							<?
							}
							?>
					</td></tr>
					</table>

<?

include "../inc/footer.inc"; 		// 하단디자인

?>