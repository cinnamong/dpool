<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
if($save != "true"){
	
// �м��� �Ķ���� ��������
$sql = "select con_parameter from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: �м��Ķ���� ���� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/valueCheck.js"></script>
</head>
<body topmargin=0 leftmargin=0>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
<form name="frm" action="<?=$PHP_SELF?>" method="post">
<input type="hidden" name="save" value="true">
  <tr>
    <td height=35 bgcolor="659EBE" colspan="2">
      <font color="ffffff"><b>:: �м��Ķ���� ���� ::</b></font>
    </td>
    <td bgcolor="659EBE" align="right"><input type="button" value="�� ��" onClick="self.close();" class="t"> &nbsp; </td>
  </tr>
  <tr><td height=1 colspan=2></td></tr>
  <tr><td height="5"></td></tr>
  <tr>
    <td height=35 colspan="2">
      &nbsp; <b>�м��Ķ����</b> &nbsp;<input type="text" name="parameter" value="<?=$row->con_parameter?>" size="60" class="form3">
    </td>
    <td align="right"><input type="submit" value="����" class="t"> &nbsp; </td>
  </tr>
  <tr><td height="5"></td></tr>
</form>
</table>

<table width="98%" border="4" cellpadding="10" cellspacing="0" bordercolor="E8E8C8" align="center">
  <tr>
    <td height="23" colspan=3>
    &nbsp;�� �˻����� ���� �м��ؾ��� �Ķ���� ���� �ٸ��ϴ�.<br>
    &nbsp;ex) ���̹����� "�Ƶ�ٽ�"�� �˻��Ѱ�� ��� �ּҴ� ������ �����ϴ�.<br>
    &nbsp;http://search.naver.com/search.naver?where=nexearch&<font color='red'><b>query</b></font>=%BE%C6%B5%F0%B4%D9%BD%BA&frm=t1<br>
    &nbsp;�̰�� �м��ؾ��� �Ķ���ʹ� <font color='red'><b>query</b></font>�� �˴ϴ�.<br>
    &nbsp;���� �м��Ķ���Ϳ� �� �Ķ���͸� �ĸ��� �����Ͽ� �����Ͻø� �˴ϴ�.<br>
    </td>
  </tr>
</table>
</body>
</html>
<?
}else{
	
	$sql = "update wiz_operinfo set con_parameter = '$parameter'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("����Ǿ����ϴ�.","$PHP_SELF");
	
}
?>