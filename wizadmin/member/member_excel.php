<?
if($exceldown != "ok"){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>:: �ֹ����� �ٿ�ε� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function selBasic(frm){
	
	frm.c_id.checked = true;
	frm.c_passwd.checked = true;
	frm.c_name.checked = true;
	frm.c_resno.checked = true;
	frm.c_email.checked = true;
	frm.c_tphone.checked = true;
	frm.c_hphone.checked = true;
	frm.c_level.checked = false;
	frm.c_post.checked = true;
	frm.c_address.checked = true;
	frm.c_recom.checked = false;
	frm.c_reserve.checked = false;
	frm.c_reemail.checked = false;
	frm.c_resms.checked = false;
	
	frm.c_marriage.checked = false;
	frm.c_memorial.checked = false;
	frm.c_job.checked = false;
	frm.c_scholarship.checked = false;
	frm.c_birthday.checked = false;
	frm.c_income.checked = false;

}

function selAll(frm){
	
	frm.c_id.checked = true;
	frm.c_passwd.checked = true;
	frm.c_name.checked = true;
	frm.c_resno.checked = true;
	frm.c_email.checked = true;
	frm.c_tphone.checked = true;
	frm.c_hphone.checked = true;
	frm.c_level.checked = true;
	frm.c_post.checked = true;
	frm.c_address.checked = true;
	frm.c_recom.checked = true;
	frm.c_reserve.checked = true;
	frm.c_reemail.checked = true;
	frm.c_resms.checked = true;
	
	frm.c_marriage.checked = true;
	frm.c_memorial.checked = true;
	frm.c_job.checked = true;
	frm.c_scholarship.checked = true;
	frm.c_birthday.checked = true;
	frm.c_income.checked = true;
	
}
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="5" topmargin="5">
	<table width="560" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
	<form name="frm" action="" method="post">
	<input type="hidden" name="exceldown" value="ok">

	<input type="hidden" name="searchopt" value="<?=$searchopt?>">
	<input type="hidden" name="keyword" value="<?=$keyword?>">
	<input type="hidden" name="birthday" value="<?=$birthday?>">
	<input type="hidden" name="memorial" value="<?=$memorial?>">
	<input type="hidden" name="age" value="<?=$age?>">
	<input type="hidden" name="address" value="<?=$address?>">
	<input type="hidden" name="job" value="<?=$job?>">
	<input type="hidden" name="marriage" value="<?=$marriage?>">
	
	<input type="hidden" name="prev_year" value="<?=$prev_year?>">
	<input type="hidden" name="prev_month" value="<?=$prev_month?>">
	<input type="hidden" name="prev_day" value="<?=$prev_day?>">
	
	<input type="hidden" name="next_year" value="<?=$next_year?>">
	<input type="hidden" name="next_month" value="<?=$next_month?>">
	<input type="hidden" name="next_day" value="<?=$next_day?>">
	
	  <tr>
	    <td bgcolor="ffffff">
	    <table><tr><td></td></tr></table>
       <table cellspacing="2" cellpadding="0" border="0">
         <tr>
	        <td><font color="2369C9"><b>���ñ���</b></font></td>
	        <td><input type="radio" name="sel_gubun" onClick="selBasic(this.form);" checked><font color="red"><b>�⺻����</b></font></td>
			  <td><input type="radio" name="sel_gubun" onClick="selAll(this.form);"><font color="red"><b>��ü����</b></font></td>
			  <td></td>
			  <td></td>
			</tr>
			<tr><td height="6"></td></tr>
	      <tr>
	        <td width="80"><font color="2369C9"><b>�⺻����</b></font></td>
	        <td width="100"><input type="checkbox" name="c_id" value="Y" checked>���̵�</td>
			  <td width="100"><input type="checkbox" name="c_passwd" value="Y" checked>��й�ȣ</td>
			  <td width="100"><input type="checkbox" name="c_name" value="Y" checked>�̸�</td>
			  <td width="100"><input type="checkbox" name="c_resno" value="Y" checked>�ֹι�ȣ</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="c_email" value="Y" checked>�̸���</td>
			  <td><input type="checkbox" name="c_tphone" value="Y" checked>��ȭ��ȣ</td>
			  <td><input type="checkbox" name="c_hphone" value="Y" checked>�޴���</td>
			  <td><input type="checkbox" name="c_level" value="Y">ȸ�����</td>
			</tr>
         <tr>
			  <td></td>
			  <td><input type="checkbox" name="c_post" value="Y" checked>�����ȣ</td>
			  <td><input type="checkbox" name="c_address" value="Y" checked>�ּ�</td>
			  <td><input type="checkbox" name="c_recom" value="Y">��õ��</td>
			  <td><input type="checkbox" name="c_reserve" value="Y">������</td>
			</tr>
			<tr>
			  <td></td>
			  <td><input type="checkbox" name="c_reemail" value="Y">�̸��� ����</td>
			  <td><input type="checkbox" name="c_resms" value="Y">SMS ����</td>
			  <td></td>
			  <td></td>
			</tr>
		   <tr><td height="6"></td></tr>
			<tr>
			   <td><font color="2369C9"><b>��Ÿ����</b></font></td>
				<td><input type="checkbox" name="c_marriage" value="Y">��ȥ ����</td>
				<td><input type="checkbox" name="c_memorial" value="Y">��ȥ�����</td>
				<td><input type="checkbox" name="c_job" value="Y">����</td>
				<td><input type="checkbox" name="c_scholarship" value="Y">�з�</td>
			</tr>
			<tr>
			   <td><font color="2369C9"><b>��Ÿ����</b></font></td>
				<td><input type="checkbox" name="c_birthday" value="Y">�������</td>
				<td><input type="checkbox" name="c_income" value="Y">���ɺо�</td>
				<td></td>
				<td></td>
			</tr>
	    </table>                              
     </td>
   </tr>
  </table>
  <table align="center">
    <tr><td height="10"></td></tr>
    <tr>
      <td width="50"><input type="submit" class="t" value="��������"></td>
      <td width="50"><input type="button" class="t" value="�� ��" onClick="self.close();"></td>
    </tr>
  </form>
  </table>
</body>
</html>
<?
}else{

	include "../../inc/global.inc";
	include "../../inc/util_lib.inc";
	
	$filename = "ȸ������[".date('Ymd')."].xls";

	header( "Content-type: application/vnd.ms-excel" ); 
	header( "Content-Disposition: attachment; filename=$filename" ); 
	header( "Content-Description: PHP4 Generated Data" ); 

	echo "<style>\n";
	echo ".xl40\n";
	echo "        {mso-style-parent:style0;\n";
	echo "        mso-number-format:'0_ ';\n";
	echo "        text-align:center;\n";
	echo "        border:.5pt solid black;\n";
	echo "        background:white;\n";
	echo "        mso-pattern:auto none;\n";
	echo "        white-space:normal;}\n";
	echo "-->\n";
	echo "</style>\n";

	$sql = "select id from wiz_member";
	$result = mysql_query($sql) or error(mysql_error());
	$all_total = mysql_num_rows($result);
	
	
   $today = date('n-d');
   $toyear = date('Y');
   
   $age_syear = substr($toyear-($age+9),-2)+1;
   $age_eyear = substr($toyear-$age,-2)+2;
   
   $join_sdate = $prev_year."-".$prev_month."-".$prev_day;
   $join_edate = $next_year."-".$next_month."-".$next_day;
   
      
   $sql = "select * from wiz_member where id != ''";
   if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate'";
   if($searchopt != "")   $sql .= " and $searchopt like '%$keyword%'";
   if($birthday == "Y") $sql .= " and birthday like '%$today'";
   if($memorial == "Y") $sql .= " and memorial like '%$today'";
   if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
   if($address != "")   $sql .= " and address like '%$address%'";
   if($job != "")       $sql .= " and job = '$job'";
   if($marriage != "")  $sql .= " and marriage = '$marriage'";
   $sql .=" order by wdate desc";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);


	echo "<table border=1>\n";
   echo "  <tr align=center style=font-weight:bold>\n";
   if($c_id == "Y") echo "<td bgcolor=#C0C0C0>���̵�</td>\n";
   if($c_passwd == "Y") echo "<td bgcolor=#C0C0C0>��й�ȣ</td>\n";
   if($c_name == "Y") echo "<td bgcolor=#C0C0C0>�̸�</td>\n";
   if($c_resno == "Y") echo "<td bgcolor=#C0C0C0>�ֹι�ȣ</td>\n";
   if($c_email == "Y") echo "<td bgcolor=#C0C0C0>�̸���</td>\n";
   if($c_tphone == "Y") echo "<td bgcolor=#C0C0C0>��ȭ��ȣ</td>\n";
   if($c_hphone == "Y") echo "<td bgcolor=#C0C0C0>�޴���</td>\n";
   if($c_level == "Y") echo "<td bgcolor=#C0C0C0>ȸ�����</td>\n";
   if($c_post == "Y") echo "<td bgcolor=#C0C0C0>�����ȣ</td>\n";
   if($c_address == "Y") echo "<td bgcolor=#C0C0C0>�ּ�</td>\n";
   if($c_recom == "Y") echo "<td bgcolor=#C0C0C0>��õ��</td>\n";
   if($c_reserve == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_reemail == "Y") echo "<td bgcolor=#C0C0C0>�̸��� ����</td>\n";
   if($c_resms == "Y") echo "<td bgcolor=#C0C0C0>SMS����</td>\n";

   if($c_marriage == "Y") echo "<td bgcolor=#C0C0C0>��ȥ����</td>\n";
   if($c_memorial == "Y") echo "<td bgcolor=#C0C0C0>��ȥ�����</td>\n";
   if($c_job == "Y") echo "<td bgcolor=#C0C0C0>����</td>\n";
   if($c_scholarship == "Y") echo "<td bgcolor=#C0C0C0>�з�</td>\n";
   if($c_birthday == "Y") echo "<td bgcolor=#C0C0C0>�������</td>\n";
   if($c_income == "Y") echo "<td bgcolor=#C0C0C0>���ɺо�</td>\n";
   echo "   </tr>";

	while($row = mysql_fetch_object($result)){

		echo "<tr>\n";
	   if($c_id == "Y") echo "<td>$row->id</td>\n";
	   if($c_passwd == "Y") echo "<td>$row->passwd</td>\n";
	   if($c_name == "Y") echo "<td>$row->name</td>\n";
	   if($c_resno == "Y") echo "<td>$row->resno</td>\n";
	   if($c_email == "Y") echo "<td>$row->email</td>\n";
	   if($c_tphone == "Y") echo "<td>$row->tphone</td>\n";
	   if($c_hphone == "Y") echo "<td>$row->hphone</td>\n";
	   if($c_level == "Y") echo "<td>$row->level</td>\n";
	   if($c_post == "Y") echo "<td>$row->post</td>\n";
	   if($c_address == "Y") echo "<td>$row->address $row->address2</td>\n";
	   if($c_recom == "Y") echo "<td>$row->recom</td>\n";
	   if($c_reserve == "Y") echo "<td>$row->reserve</td>\n";
	   if($c_reemail == "Y") echo "<td>$row->reemail</td>\n";
	   if($c_resms == "Y") echo "<td>$row->resms</td>\n";
	
	   if($c_marriage == "Y") echo "<td>$row->marriage</td>\n";
	   if($c_memorial == "Y") echo "<td>$row->memorial</td>\n";
	   if($c_job == "Y") echo "<td>$row->job</td>\n";
	   if($c_scholarship == "Y") echo "<td>$row->scholarship</td>\n";
	   if($c_birthday == "Y") echo "<td>$row->birthday</td>\n";
	   if($c_income == "Y") echo "<td>$row->income</td>\n";
	   echo "   </tr>";

	}
	
	echo "</table>\n";
}
?>