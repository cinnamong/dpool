<html>
<head>
<title>:: 주문상태 일괄처리 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body topmargin=0 leftmargin=0>
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: 주문상태 일괄처리 ::</b></font>
    </td>
    <td bgcolor="659EBE" colspan="2" align="right"></td>
  </tr>
  <tr><td height=1 colspan=3></td></tr>
</table>
<table width="100%"cellpadding=0 cellspacing=0>
<form action="order_save.php">
<input type="hidden" name="mode" value="batchStatus">
<input type="hidden" name="selorder" value="<?=$selorder?>">
  <tr bgcolor=f0f0f0 align=center>
    <td height="23"><b>상태선택</b></td>
    <td>
    <select name="chg_status" style="width:90">
    <option value="OR">주문접수
    <option value="OY">결제완료
    <option value="DR">배송준비중
    <option value="DI">배송중
    <option value="DC">배송완료
    <option value="OC">주문취소
    <option value="">----------
    <option value="RD">환불요청
    <option value="RC">환불완료
    <option value="CD">교환요청
    <option value="CC">교환완료
    </select>
    </td>
  </tr>
  <tr>
    <td height="50" align="center" colspan="2">
    <input type="submit" value="적 용" class="t">
    <input type="button" value="닫 기" onClick="self.close();" class="t">
    </td>
  </tr>
</form>
</table>
</body>