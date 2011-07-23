<?
include "../../inc/global.inc"; 			// DB컨넥션, 접속자 파악
include "../../inc/oper_info.inc";
if($save == ""){
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>상품이미지 사이즈</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function inputCheck(frm){
	if(frm.prdimg_R.value == ""){
		alert("대표 이미지 사이즈를 입력하세요");
		frm.prdimg_R.focus();
		return false;
	}
	if(frm.prdimg_S.value == ""){
		alert("축소 이미지 사이즈를 입력하세요");
		frm.prdimg_S.focus();
		return false;
	}
	if(frm.prdimg_M.value == ""){
		alert("제품상세 이미지 사이즈를 입력하세요");
		frm.prdimg_M.focus();
		return false;
	}
	if(frm.prdimg_L.value == ""){
		alert("확대 이미지 사이즈를 입력하세요");
		frm.prdimg_L.focus();
		return false;
	}
}
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" onLoad="document.frm.address.focus();" style="background-color:#ffffff">
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: 상품이미지 사이즈 ::</b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"></td>
  </tr>
  <tr><td height=10 colspan=3></td></tr>
</table>
<table border=0 cellpadding=0 cellspacing=0  width=95% align=center>
<form name="frm" method="post" action="<?=$PHP_SELF?>" onSubmit="return inputCheck(this);">
<input type="hidden" name="save" value="true">
  <tr>
    <td colspan=3 style="padding:5" bgcolor=#F5F5F5 align=center>
		<table width="100%" border="0" cellpadding=0 cellspacing=0 bgcolor=#ffffff>
		  <tr>
		    <td width=50% height=25>&nbsp; 대표 이미지</td>
		    <td width=50%><input type="text" name="prdimg_R" value="<?=$oper_info->prdimg_R?>" size="6" class="form1"></td>
		  </tr>
		  <tr>
		    <td height=25>&nbsp; 축소 이미지</td>
		    <td><input type="text" name="prdimg_S" value="<?=$oper_info->prdimg_S?>" size="6" class="form1"></td>
		  </tr>
		  <tr>
		    <td height=25>&nbsp; 제품상세 이미지</td>
		    <td><input type="text" name="prdimg_M" value="<?=$oper_info->prdimg_M?>" size="6" class="form1"></td>
		  </tr>
		  <tr>
		    <td height=25>&nbsp; 확대 이미지</td>
		    <td><input type="text" name="prdimg_L" value="<?=$oper_info->prdimg_L?>" size="6" class="form1"></td>
		  </tr>
		</table>
	</td>
  </tr>
</table>
<table border=0 cellpadding=0 cellspacing=0  width=95% align=center>
  <tr><td height=10 colspan=3></td></tr>
  <tr>
    <td align=center><input type="submit" value="저 장" class="t"></td>
  </tr>
</form>
</table>
<?
}else{

	$sql = "update wiz_operinfo set prdimg_R='$prdimg_R', prdimg_S='$prdimg_S', prdimg_M='$prdimg_M', prdimg_L='$prdimg_L'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("상품이미지 사이즈 설정이 저장되었습니다.","prd_imgsize.php");

}
?>