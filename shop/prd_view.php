<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�

// ��ǰ���� ��������
$sql = "select * from wiz_product wp, wiz_cprelation wc where wp.prdcode='$prdcode' and wc.prdcode = wp.prdcode limit 1";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$prd_info = mysql_fetch_object($result);
if($prdcode == "" || $total <= 0) error("�������� �ʴ� ��ǰ�Դϴ�.");
if(empty($catcode)) $catcode = $prd_info->catcode;

include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/cat_info.inc"; 		// ī�װ�����
include "../inc/oper_info.inc";		// �����

include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

// �α�,�Ż�,��õ...
if($prd_info->popular == "Y") $sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
if($prd_info->recom == "Y") $sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
if($prd_info->new == "Y") $sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
if($prd_info->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; $sellprice = "<s>".number_format($prd_info->conprice)." ��</s> �� "; }
if($prd_info->shortage == "Y" || $prd_info->stock <= 0) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";
	
	
// ��ǰ��ȸ�� ����
$sql = "update wiz_product set viewcnt = viewcnt + 1 where prdcode='$prdcode'";
mysql_query($sql) or error(mysql_error());


// �������� ��ǰ
$catcode01 = substr($catcode,0,2);
$catcode02 = substr($catcode,2,2);
$catcode03 = substr($catcode,4,2);
if($catcode01 == "00") $catcode01 = "";
if($catcode02 == "00") $catcode02 = "";
if($catcode03 == "00") $catcode03 = "";
$tmpcode = $catcode01.$catcode02.$catcode03;
$sql = "select wp.prdcode from wiz_cprelation wc, wiz_product wp where wc.catcode like '$tmpcode%' and wc.prdcode = wp.prdcode and wp.prior > '$prd_info->prior' order by wp.prior asc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_object($result)) $prev_prdcode = "prd_view.php?prdcode=$row->prdcode&catcode=$catcode";
else $prev_prdcode = "#";

$sql = "select wc.prdcode from wiz_cprelation wc, wiz_product wp where wc.catcode like '$tmpcode%' and wc.prdcode = wp.prdcode and wp.prior < '$prd_info->prior' order by wp.prior desc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_object($result)) $next_prdcode = "prd_view.php?prdcode=$row->prdcode&catcode=$catcode";
else $next_prdcode = "#";


// ���ú� ��ǰ��Ͽ� �߰�
$view_exist = false;
$view_idx = count($view_list);
for($ii = 0; $ii < $view_idx; $ii++){
	if($view_list[$ii][prdcode] == $prdcode){ $view_exist = true; break; }
}
if(!$view_exist){
	$view_list[$view_idx][prdcode] = $prdcode;
	$view_list[$view_idx][prdimg] = $prd_info->prdimg_R;
	session_register("view_list",$view_list);
}

?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="javascript">
<!--

var color_size = new Array();

<?
// ��ǰ�ɼ� ��������
$no = 0;
$sql = "select * from wiz_colorsize where ProdInc = '$prd_info->ProdInc' order by idx asc";
$result = mysql_query($sql) or error(mysql_error());
$color_total = mysql_num_rows($result);
while($color_info = mysql_fetch_object($result)){
   if($no == 0) $BigImg = $color_info->BigImg;
   if($color_info->ColorTxt != ""){
?>
color_size[<?=$no?>] = new Array();
color_size[<?=$no?>]["ColorTxt"] = "<?=$color_info->ColorTxt?>";
color_size[<?=$no?>]["BigImg"] = "<?=$color_info->BigImg?>";
color_size[<?=$no?>]["SwatchImg"] = "<?=$color_info->SwatchImg?>";
color_size[<?=$no?>]["SizeList"] = "<?=$color_info->SizeList?>";
<?
   }
   $no++;
}
?>

// ��ǰ�̹��� �˾�
function prdZoom(){
   
   var url = "prd_zoom.php?prdcode=<?=$prdcode?>";
   window.open(url,"prdZoom","width=798,height=600,scrollbars=no");
   
}

// ���ݼ���
function setSellprice(sellprice){
	
	document.getElementById("sellprice").innerHTML = ":&nbsp;&nbsp; <span class='price_b'>"+ won_Comma(sellprice) +"��";
	
}

// ���� ����
function incAmount(){
	
	var amount = document.prdForm.amount.value;
	document.prdForm.amount.value = ++amount;
	checkAmount();
	
}

// ���� ����
function decAmount(){

   var amount = document.prdForm.amount.value;
	if(amount > 1)
		document.prdForm.amount.value = --amount;
	checkAmount();
	
}

// ����üũ
function checkAmount(){
	
	var amount = document.prdForm.amount.value;
   if(!Check_Num(amount) || amount < 1){
   	document.prdForm.amount.value = "1";
   }else{
   <?
   	if($prd_info->opttitle != "" && $prd_info->optcode != ""){
   ?>
	   	if( document.prdForm.amount != null){
	   		var selvalue = document.prdForm.optcode.value;
	   		var optlist = selvalue.split("^");
		   	if( amount > eval(optlist[2])){
		   		 alert("����� �����մϴ�.");
		   		 document.prdForm.amount.value = "1";
		   		 return false;
		   	}else{
		   		return true;
		   	}
	   	}
   <?
   	}else{
   ?>
		   if( document.prdForm.amount != null){
		   	if( amount > <?=$prd_info->stock?>){
		   		 alert("����� �����մϴ�.");
		   		 document.prdForm.amount.value = "1";
		   		 return false;
		   	}else{
		   		return true;
		   	}
		   }
   <?
   	}
   ?>
	}
	
}


// ���ݺ���,ǰ���ɼ� üũ
function checkOpt01(){
	
	if(document.prdForm.optcode != null){
		
		var optval = document.prdForm.optcode.value;
		var optlist = optval.split("^");
	
		if(optval == ""){
			setSellprice('<?=$prd_info->sellprice?>');
		}
		
		if(optlist[2] == "0"){
			
			alert('ǰ���� ��ǰ�Դϴ�.');
			document.prdForm.optcode[0].selected = true;
			setSellprice('<?=$prd_info->sellprice?>');
			
			return false;
		
		// �ɼǺ� ���� ����	
		}else{
			setSellprice(optlist[1]);
		}
		
	}
	
	return checkAmount();
	
}

// �ɼ�üũ
function checkOption(){

	if( document.prdForm.optcode != null){
      if(document.prdForm.optcode.value == ""){
         alert("�ɼ��� �����ϼ���");
         document.prdForm.optcode.focus();
         return false;
      }
   }
   if( document.prdForm.optcode2 != null){
      if(document.prdForm.optcode2.value == ""){
         alert("�ɼ��� �����ϼ���");
         document.prdForm.optcode2.focus();
         return false;
      }
   }
   if( document.prdForm.optcode3 != null){
      if(document.prdForm.optcode3.value == ""){
         alert("�ɼ��� �����ϼ���");
         document.prdForm.optcode3.focus();
         return false;
      }
   }
   
   return checkOpt01();
   
}


// ��ٱ��Ͽ� ���
function saveBasket(direct){
  <?
  if($prd_info->shortage == "Y" || $prd_info->stock <= 0) echo "alert('�˼��մϴ�. ǰ����ǰ �Դϴ�.');";
  else echo "if(checkOption()){ document.prdForm.direct.value = direct; document.prdForm.submit(); }";
  ?>
}

// �÷�����
function setColor(){
   
   document.prdForm.optcolor.options[0] = new Option("::�����ϼ���::","");
   for(ii=0;ii<color_size.length;ii++){
      if(color_size[ii]["ColorTxt"] != "")
      document.prdForm.optcolor.options[ii+1] = new Option(color_size[ii]["ColorTxt"],color_size[ii]["ColorTxt"]);
   }
   
}

// �÷��� ������ ����
function setSize(idx){
   
   
   document.prdForm.optsize.length = 0;
   document.prdForm.optsize.options[0] = new Option("::�����ϼ���::","");
   
   if(idx >= 0){
      var size_list = color_size[idx]["SizeList"].split("^");
      for(ii=0,sno=0;ii<size_list.length;ii++){
         if(size_list[ii] != "")
         document.prdForm.optsize.options[ii+1] = new Option(size_list[ii],size_list[ii]);
      }
   }
   
}

function changeColor(){
   
   var idx = document.prdForm.optcolor.selectedIndex;
   idx--;
   if(idx >= 0){
      document.prdimg.src = color_size[idx]["BigImg"];
      document.prdForm.prdimg.value = color_size[idx]["BigImg"];
   }
   setSize(idx);

}
//-->
</script>

                     <!--��ǰ �󼼺��� ����-->
               <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align="center">
							<table border=0 cellpadding=0 cellspacing=0 width=692 align=center>
							  <tr>
							    <td>
									<table border=0 cellpadding=0 cellspacing=0>
              <tr> 
                <td><img src="noimage_280.gif" name="prdimg" width="280" height="280"></td>
              </tr>
              <tr>
                <td align=center>&nbsp;</td>
              </tr>
              <tr> 
                <td align=center> <table border=0 cellpadding=5 cellspacing=0>
                  </table>
                  <table border=0 cellpadding=0 cellspacing=0>
                    <tr> 
                      <td> <a href="<?=$prev_prdcode?>"><img src="/images/but_view_prev.gif" border=0></a></td>
                      <td><img src="/images/but_view_zoom.gif" border=0 onClick="prdZoom();" style="cursor:hand"></td>
                      <td><a href="<?=$next_prdcode?>"><img src="/images/but_view_next.gif" border=0></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
							    </td>
							    <td align=center valign=top style="padding:10 0 0 0">
							
									<table border=0 cellpadding=0 cellspacing=0 width=360>
									<form name="prdForm" action="prd_save.php" method="post">
                           <input type="hidden" name="mode" value="insert">
                           <input type="hidden" name="direct" value="">
                           <input type="hidden" name="prdcode" value="<?=$prdcode?>">
                           <input type="hidden" name="opttitle" value="<?=$prd_info->opttitle?>">
                           <input type="hidden" name="opttitle2" value="<?=$prd_info->opttitle2?>">
                           <input type="hidden" name="opttitle3" value="<?=$prd_info->opttitle3?>">
                           
									  <tr>
                  <td height=50 class="p_name" style="padding:10"> <strong><font size="2">���Ĺ� 
                    ���� �Ŀ��(12.9 oz x 6ĵ)(�̱������) </font></strong></td>
                </tr>
									  <tr><td><img src="/images/shop_p_name_bar.gif"></td></tr>
									  <tr><td height=5></td></tr>
									  <tr>
									    <td bgcolor=#f5f5f5 style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>�ǸŰ���</b></td>
												<td id="sellprice">:&nbsp;&nbsp; <span class="price_b"><? ?>��</td></tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>������</b></td>
												
                        <td>:<b>
                          <? ?>
                          </b>&nbsp;&nbsp; <b>��</b></td>
                      </tr>
											</table>
									    </td>
									  </tr>
									  <tr>
									    <td style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;��ǰ����</td>
												<td>:&nbsp;&nbsp; <?=$sp_img?></td></tr>
											  <tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;������</td>
												<td>:&nbsp;&nbsp; <? ?></td></tr>
											  <tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;������</td>
												<td>:&nbsp;&nbsp; <?=$prd_info->origin?></td></tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;�� ��</td>
												<td>
												  <table border=0 cellpadding=0 cellspacing=0>
												    <tr>
												      <td rowspan=3>:&nbsp;&nbsp; <input type=text name=amount value=1 size=2 onChange="checkAmount();" class="input">&nbsp;&nbsp;</td>
														<td><a href="javascript:incAmount();"><img src="/images/but_vol_up.gif" border=0></a></td></tr>
													 <tr>
													  <td><a href="javascript:decAmount();"><img src="/images/but_vol_down.gif" border=0></a></td></tr>
												  </table>
												</td>
											  </tr>
											  
											  <?
											  if($color_total > 0){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;Color</td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcolor" onChange="changeColor();">
												  <option value="">::�����ϼ���::</option>
												  </select>
												</td>
										     </tr>
										     <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;Size</td>
												<td>:&nbsp;&nbsp; 
												  <select name="optsize">
												  <option value="">::�����ϼ���::</option>
												  </select>
												</td>
										     </tr>
										     <script language="javascript">
											  <!--
											  setColor();
											  -->
											  </script>
											  <?
											  }
											  if($prd_info->opttitle != ""){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$prd_info->opttitle?></td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcode" onChange="checkOpt01();">
												  <option value=""> �����ϼ��� </option>
	                                   <?
                                       $opt_tmp = explode("^^",$prd_info->optcode);
                                       
                                    	for($ii=0; $ii<count($opt_tmp)-1; $ii++){
                                    		
                                    		$opt_sub_tmp = explode("^",$opt_tmp[$ii]);
                                    		if($opt_sub_tmp[2] <= 0) $opt_sub_tmp[2] = " [ǰ��]";
                                    		else $opt_sub_tmp[2] = "";
                                    		
                                    		$opt_sub_value = $opt_tmp[$ii];
                                    		$opt_sub_txt = $opt_sub_tmp[0]." / ".$opt_sub_tmp[1]."�� ".$opt_sub_tmp[2];
                                    		
                                    		echo "<option value='$opt_sub_value'>$opt_sub_txt\n";
                                    	}
	                                   ?>
												  </select>
												</td></tr>
											  <?
											  }

											  if($prd_info->opttitle2 != ""){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$prd_info->opttitle2?></td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcode2">
												  <option value=""> �����ϼ��� </option>
                                      <?
                                        $opt_list = explode(",",$prd_info->optcode2);
                                    	 for($ii=0; $ii<count($opt_list); $ii++){
                                    		echo "<option value='".$opt_list[$ii]."'>".$opt_list[$ii]."\n";
                                    	 }
                                      ?>
												  </select>
												</td></tr>
											  <?
											  }

											  if($prd_info->opttitle3 != ""){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$prd_info->opttitle3?></td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcode3">
												  <option value=""> �����ϼ��� </option>
                                      <?
                                        $opt_list = explode(",",$prd_info->optcode3);
                                    	 for($ii=0; $ii<count($opt_list); $ii++){
                                    		echo "<option value='".$opt_list[$ii]."'>".$opt_list[$ii]."\n";
                                    	 }
                                      ?>
												  </select>
												</td></tr>
											  <?
											  }
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;����ȣ��</td>
												<td>:&nbsp;&nbsp; <img src="/images/icon_star_<?=$prd_info->prefer?>.gif"></td></tr>
										  </table>
									    </td>
									  </tr>
									  <tr><td height=1 bgcolor=#999999></td></tr>
									  <tr><td height=3 bgcolor=#F4F4F4></td></tr>
									  <tr><td style="padding:10 0 0 0" align=center>

											<table border=0 cellpadding=3 cellspacing=0>
											  <tr>
											   <td><a href="prd_list.php?catcode=<?=$catcode?>&page=<?=$page?>"><img src="/images/but_view_list.gif" border=0></a></td>
											   <td><a href="javascript:saveBasket('buy');"><img src="/images/but_view_buy.gif" border=0></a></td>
												<td><a href="javascript:saveBasket('basket');"><img src="/images/but_view_cart.gif" border=0></a></td>
												<td><a href="/member/my_save.php?mode=my_wish&prdcode=<?=$prdcode?>"><img src="/images/but_view_keeping.gif" border=0></a></td>
											  </tr>
											</table>
									    </td>
									  </tr>
									</form>
									</table>
							    </td>
							  </tr>
							</table>
							
							<br>
							
							<table border=0 cellpadding=0 cellspacing=0 width=95% align=center>
							<tr><td><img src="/images/bar_view_detailinfo.gif"></td></tr>
							<tr>
          <td style="padding:15" valign=top> <font color="#990066"><strong>�ڹ̱�����ۻ�ǰ���� 
            ��ü���,������� ��ǰ�� ������ �Ұ����ϸ�, <br>
            ������۷� ������ �ݾ��Դϴ�.<br>
            ��ٱ��Ͽ� �̱������ �� �ٸ� ��ǰ�� �Բ� ���������ּ���~�� </strong></font> 
            <p> </p>
            <p>0 - 12 ���� �Ʊ⿡�� �����ϴ� �������� �Դϴ�.</p>
            <p>�������� ���� ���Ĺ��� ���ο� ����ǰ���� ���������� �ӻ����� ����� �γ� �� �÷¹ߴ޿� �߿��� DHA �� ARA�� 
              ������ ��ǰ�Դϴ�.<br>
              DHA�� ARA�� �������� �߰ߵǴ� �������� �Ʊ��� �γ������ �÷¿� �ſ� �߿��� ��� �Դϴ�.<br>
              ���� MDI(���� ���� �ߴ� ����)�� 7����Ʈ �̻�, VEP(�ð����������˻�)���� �������� �Ѵܰ� ������ �����Ǿ����ϴ�.<br>
              ���Ĺ��� DHA�� ARA�� �Է��� FAO �� WHO�� �����մϴ�.</p>
            <p></p>
            <p><br>
              <font color="#990066"><strong>������� �� ���ǻ���</strong></font></p>
            <p>�Ŀ�� �����ǰ�� ������ ���� ��ȭ�� ���۵˴ϴ�. <br>
              �����Ѱ��� ���� �Ͻð� �Ѵ��̳��� ��� ����ϼ���.</p>
            <p>4-fl oz�� 2��Ǭ�� ������ �ְ� ���� �Բ� �� ��� ���Դϴ�.<br>
              ����ź ������ ���� ������ 24�ð� ��¿����� 1�ð� �̳��� �����ϼ���.<br>
              ������ 1�ð��� ����� ������ �����ž� �մϴ�.<br>
              ������ ����÷��� �����ϴ� ����� ����ϼ���.<br>
              ����� ���ڷ����� ����Ͽ� ������ ������ ������.</p>
            <p></p>
            <p><br>
              <font color="#990066">����.</font><br>
              ���ƿ��� ���ʿ��� ������� �����, ���� �����, �ƶ�Ű���� ���̸� ������� ������ �����μ� �ſ� �߿��� ����Դϴ�. 
              <br>
              ���Ĺ� ����(Enfamil lipil��)�� ������� ������ ������ ������ �����ϰ� �ֽ��ϴ�.</p>
            <p></p>
            <p><font color="#990066">�ƹ̳��.</font><br>
              �ܹ����� ���� ���簡�� ������ ���ؼ��� �ʼ� �ƹ̳�� ��ȣ���� ������ �����ؾ� �մϴ�. ���� �ϳ��� �ʿ䷮���� ������ 
              ���簡�� ���� �˴ϴ�. <br>
              ���Ĺ� ����(Enfamil lipil��)�� ������ ����� �ƹ̳��� ��û�ܹ���, ī���� �ܹ����� ������ �����ϰ� �����ϰ� 
              �ֽ��ϴ�.</p>
            <p></p>
            <p><font color="#990066">DHA &amp; ARA �����ġ.</font><br>
              ���Ĺ� ����(Enfamil Lipil��)�� ���� ���Ƶ��� ��� ���� ���� DHA�� ARA������ ������ ���� ���̵�� 
              ������ �������� ��Ÿ������, DHA�� ARA�� �������� ���� ������ ���� ���̵麸�ٴ¿����ϰ� ���̰� ������ ����Ǿ����ϴ�.</p>
            <p></p>
            <p><font color="#990066">���������� �������� ���.</font><br>
              NIH(�̱� �������ǿ�)�� ������ ���� ������� ���Ĺи���(Enfamil lipil��) �� ���� �����ǰ�� ���� ���� 
              �ߴ�����(MDI)�� 7����Ʈ �̻��� ���� ��Ÿ������, DHA�� ARA�� �������� ���� ������ ���� ���̵麸�� �����ϰ� 
              ������ ����Ǿ����ϴ�.</p>
            <p></p>
            <p><font color="#990066">������� �÷����.</font><br>
              NIH(Natianal Institutes of Health: �̱� ���� ���ǿ�)�� ������ ���� ������� ���Ĺи���(Enfamil 
              lipil��)�� ���� ������ ��� �÷������ 12���� �Ǵ� �������� �÷���Ʈ �Ѵܰ� ������ �� �� �� �ִ� ���̸� 
              �����ְ� �ֽ��ϴ�.</p>
            <p></p>
            <p><font color="#990066">DHA�� ARA ��ġ</font><br>
              FAO(Food and Agriculture Organization : ���� �ķ� �ⱸ) �� WHO(���� ���� �ⱸ)������ 
              �� ����� �߿��� 0.33% ~ 0.35%�� DHA�� 0.65% ~ 0.70% �� ARA�� �����մϴ�.<br>
              ���Ĺи���(Enfamil lipil��)�� ��� 0.32%�� DHA �� 0.64%�� ARA�� �����Ǿ� �ֽ��ϴ�.</p>
            <p> <br>
              <br>
            </p></td></tr>
							</table>
                   </td>
                 </tr>
               </table>
<?

include "./prd_review.inc";			// ��ǰ����
include "../inc/footer.inc"; 		// �ϴܵ�����

?>