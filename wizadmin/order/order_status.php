<html>
<head>
<title>:: �ֹ����� �ϰ�ó�� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body topmargin=0 leftmargin=0>
<table width="100%"cellpadding=0 cellspacing=0>
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: �ֹ����� �ϰ�ó�� ::</b></font>
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
    <td height="23"><b>���¼���</b></td>
    <td>
    <select name="chg_status" style="width:90">
    <option value="OR">�ֹ�����
    <option value="OY">�����Ϸ�
    <option value="DR">����غ���
    <option value="DI">�����
    <option value="DC">��ۿϷ�
    <option value="OC">�ֹ����
    <option value="">----------
    <option value="RD">ȯ�ҿ�û
    <option value="RC">ȯ�ҿϷ�
    <option value="CD">��ȯ��û
    <option value="CC">��ȯ�Ϸ�
    </select>
    </td>
  </tr>
  <tr>
    <td height="50" align="center" colspan="2">
    <input type="submit" value="�� ��" class="t">
    <input type="button" value="�� ��" onClick="self.close();" class="t">
    </td>
  </tr>
</form>
</table>
</body>