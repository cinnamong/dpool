<?
if(!$garo){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: ǥ ����� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="F9F8F8" leftmargin="2" topmargin="2">
<table width="312" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#999999"><table width="312" border="0" cellspacing="1" cellpadding="2">
        <tr>
          <td bgcolor="#FFFFFF">

            <table width="312" border="0" cellspacing="1" cellpadding="15">
            <form>
              <tr>
                <td bgcolor="F9F8F8"><table width="308" border="0" align="center" cellpadding="0" cellspacing="0" class="fon2">
                    <tr> 
                      <td height="35" align="center" bgcolor="DBDADA">��:
                        <input name="sero" type="text" value="1" size="5">
                        &nbsp; ��: 
                        <input name="garo" type="text"value="1"  size="5"></td>
                      <td align="center" bgcolor="DBDADA">��: 
                        <input name="width" type="text" value="100" size="5">
                        <select name="width_opt" size="1">
                          <option value="%">%</option>
                          <option value="">�ȼ�</option>
                        </select> </td>
                    </tr>
                  </table>
                  <br>
                  <table width="308" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="167" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="B8B7B7"><table width="167" border="0" cellspacing="1" cellpadding="0">
                                <tr>
                                  <td bgcolor="F9F8F8"><table width="167" border="0" cellpadding="2" cellspacing="0" class="fon2">
                                      <tr>
                                        <td width="70" height="20" valign="bottom">&nbsp;<strong>��ġ</strong></td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="70" height="25" valign="bottom">&nbsp;����</td>
                                        <td><select name="align" size="1">
                                            <option value="left">�⺻</option>
                                            <option value="left">����</option>
                                            <option value="center">���</option>
                                            <option value="right">������</option>
                                          </select></td>
                                      </tr>
                                      <tr>
                                        <td width="70" height="30">&nbsp;�׵θ�����</td>
                                        <td><input name="border" type="text" value="0" size="5"></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      <td width="15">&nbsp;</td>
                      <td width="127"><table width="127" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="B8B7B7"><table width="127" border="0" cellspacing="1" cellpadding="0">
                                <tr>
                                  <td bgcolor="F9F8F8"><table width="127" border="0" cellpadding="2" cellspacing="0" class="fon2">
                                      <tr> 
                                        <td width="48" height="20" valign="bottom">&nbsp;<strong>����</strong></td>
                                        <td width="59">&nbsp;</td>
                                      </tr>
                                      <tr> 
                                        <td width="48" height="25" valign="bottom">&nbsp;�� ����</td>
                                        <td><input name="cellpadding" type="text" value="0" size="5"></td>
                                      </tr>
                                      <tr> 
                                        <td width="48" height="30">&nbsp;�� ����</td>
                                        <td><input name="cellspacing" type="text" value="0" size="5"></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr><td height="2"></td></tr>
                    <tr>
                      <td colspan="3">
                        <table width="310" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="B8B7B7"><table width="310" border="0" cellspacing="1" cellpadding="0">
                                <tr>
                                  <td bgcolor="F9F8F8"><table width="310" border="0" cellpadding="2" cellspacing="0" class="fon2">
                                      <tr> 
                                        <td width="48" height="20" valign="bottom">&nbsp;<strong>����</strong></td>
                                        <td width="59">&nbsp;</td>
                                      </tr>
                                      <tr> 
                                        <td width="70" height="25" valign="bottom">&nbsp;������ ����</td>
                                        <td><input name="thcolor" type="text" value="#efefef" size="8"></td>
                                        <td width="70" height="25" valign="bottom">&nbsp;���̺� ����</td>
                                        <td><input name="bgcolor" type="text" value="#ffffff" size="8"></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table><br><br>
                  <table width="95" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="image" src="image/bt_surre.gif" width="45" height="22" border="0"></td>
                      <td width="5">&nbsp;</td>
                      <td><a href="javascript:self.close();"><img src="image/bt_cancel.gif" width="45" height="22" border="0"></a></td>
                    </tr>
                  </form>
                  </table>
                  </td>
              </tr>
            </table>
            
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>

</body>
</html>
<? 
}else {
?> 
<form name=f>
<input type='hidden' name='ttt' value="
<?
   echo "<table border='$border' bgcolor='$bgcolor' width='$width$width_opt' align='$align' cellpadding='$cellpadding' cellspacing='$cellspacing'>";
   for($i = 1 ; $i <=$garo ; $i++ ) {
      echo "<tr>";
      for ($j = 1 ;$j <= $sero ; $j ++ ) {
         if($i == 1) {
            echo "<th bgcolor=$thcolor>&nbsp</th>";
         }else {
            echo "<td></td>";  
         }
      }
      echo "</tr>";
   }
   echo "</table>";
?>
">
</form>
<script language=javascript>
<!--
      opener.iView.focus();
      var value = document.f.ttt.value ;
      var ssl = opener.iView.document ;
      ssl.selection.createRange().pasteHTML(value);

      opener.iView.focus();
      self.close();
 -->	
</script>
<?
}
?>