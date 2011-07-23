<?

include "../inc/global.inc"; 			// DB컨넥션, 접속자 파악

// 상품정보 가져오기
$sql = "select * from wiz_product wp, wiz_cprelation wc where wp.prdcode='$prdcode' and wc.prdcode = wp.prdcode limit 1";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$prd_info = mysql_fetch_object($result);
if($prdcode == "" || $total <= 0) error("존재하지 않는 상품입니다.");
if(empty($catcode)) $catcode = $prd_info->catcode;

include "../inc/util_lib.inc"; 		// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/cat_info.inc"; 		// 카테고리정보
include "../inc/oper_info.inc";		// 운영정보

include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

// 인기,신상,추천...
if($prd_info->popular == "Y") $sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
if($prd_info->recom == "Y") $sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
if($prd_info->new == "Y") $sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
if($prd_info->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; $sellprice = "<s>".number_format($prd_info->conprice)." 원</s> → "; }
if($prd_info->shortage == "Y" || $prd_info->stock <= 0) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";
	
	
// 상품조회수 증가
$sql = "update wiz_product set viewcnt = viewcnt + 1 where prdcode='$prdcode'";
mysql_query($sql) or error(mysql_error());


// 다음이전 상품
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


// 오늘본 상품목록에 추가
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
// 상품옵션 가져오기
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

// 상품이미지 팝업
function prdZoom(){
   
   var url = "prd_zoom.php?prdcode=<?=$prdcode?>";
   window.open(url,"prdZoom","width=798,height=600,scrollbars=no");
   
}

// 가격설정
function setSellprice(sellprice){
	
	document.getElementById("sellprice").innerHTML = ":&nbsp;&nbsp; <span class='price_b'>"+ won_Comma(sellprice) +"원";
	
}

// 수량 증가
function incAmount(){
	
	var amount = document.prdForm.amount.value;
	document.prdForm.amount.value = ++amount;
	checkAmount();
	
}

// 수량 감소
function decAmount(){

   var amount = document.prdForm.amount.value;
	if(amount > 1)
		document.prdForm.amount.value = --amount;
	checkAmount();
	
}

// 수량체크
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
		   		 alert("재고량이 부족합니다.");
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
		   		 alert("재고량이 부족합니다.");
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


// 가격변동,품절옵션 체크
function checkOpt01(){
	
	if(document.prdForm.optcode != null){
		
		var optval = document.prdForm.optcode.value;
		var optlist = optval.split("^");
	
		if(optval == ""){
			setSellprice('<?=$prd_info->sellprice?>');
		}
		
		if(optlist[2] == "0"){
			
			alert('품절된 상품입니다.');
			document.prdForm.optcode[0].selected = true;
			setSellprice('<?=$prd_info->sellprice?>');
			
			return false;
		
		// 옵션별 가격 적용	
		}else{
			setSellprice(optlist[1]);
		}
		
	}
	
	return checkAmount();
	
}

// 옵션체크
function checkOption(){

	if( document.prdForm.optcode != null){
      if(document.prdForm.optcode.value == ""){
         alert("옵션을 선택하세요");
         document.prdForm.optcode.focus();
         return false;
      }
   }
   if( document.prdForm.optcode2 != null){
      if(document.prdForm.optcode2.value == ""){
         alert("옵션을 선택하세요");
         document.prdForm.optcode2.focus();
         return false;
      }
   }
   if( document.prdForm.optcode3 != null){
      if(document.prdForm.optcode3.value == ""){
         alert("옵션을 선택하세요");
         document.prdForm.optcode3.focus();
         return false;
      }
   }
   
   return checkOpt01();
   
}


// 장바구니에 담기
function saveBasket(direct){
  <?
  if($prd_info->shortage == "Y" || $prd_info->stock <= 0) echo "alert('죄송합니다. 품절상품 입니다.');";
  else echo "if(checkOption()){ document.prdForm.direct.value = direct; document.prdForm.submit(); }";
  ?>
}

// 컬러세팅
function setColor(){
   
   document.prdForm.optcolor.options[0] = new Option("::선택하세요::","");
   for(ii=0;ii<color_size.length;ii++){
      if(color_size[ii]["ColorTxt"] != "")
      document.prdForm.optcolor.options[ii+1] = new Option(color_size[ii]["ColorTxt"],color_size[ii]["ColorTxt"]);
   }
   
}

// 컬러별 사이즈 세팅
function setSize(idx){
   
   
   document.prdForm.optsize.length = 0;
   document.prdForm.optsize.options[0] = new Option("::선택하세요::","");
   
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

                     <!--제품 상세보기 시작-->
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
                  <td height=50 class="p_name" style="padding:10"> <strong><font size="2">엔파밀 
                    리필 파우더(12.9 oz x 6캔)(미국직배송) </font></strong></td>
                </tr>
									  <tr><td><img src="/images/shop_p_name_bar.gif"></td></tr>
									  <tr><td height=5></td></tr>
									  <tr>
									    <td bgcolor=#f5f5f5 style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>판매가격</b></td>
												<td id="sellprice">:&nbsp;&nbsp; <span class="price_b"><? ?>원</td></tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>적립금</b></td>
												
                        <td>:<b>
                          <? ?>
                          </b>&nbsp;&nbsp; <b>원</b></td>
                      </tr>
											</table>
									    </td>
									  </tr>
									  <tr>
									    <td style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;제품상태</td>
												<td>:&nbsp;&nbsp; <?=$sp_img?></td></tr>
											  <tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;제조사</td>
												<td>:&nbsp;&nbsp; <? ?></td></tr>
											  <tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;원산지</td>
												<td>:&nbsp;&nbsp; <?=$prd_info->origin?></td></tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;수 량</td>
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
												  <option value="">::선택하세요::</option>
												  </select>
												</td>
										     </tr>
										     <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;Size</td>
												<td>:&nbsp;&nbsp; 
												  <select name="optsize">
												  <option value="">::선택하세요::</option>
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
												  <option value=""> 선택하세요 </option>
	                                   <?
                                       $opt_tmp = explode("^^",$prd_info->optcode);
                                       
                                    	for($ii=0; $ii<count($opt_tmp)-1; $ii++){
                                    		
                                    		$opt_sub_tmp = explode("^",$opt_tmp[$ii]);
                                    		if($opt_sub_tmp[2] <= 0) $opt_sub_tmp[2] = " [품절]";
                                    		else $opt_sub_tmp[2] = "";
                                    		
                                    		$opt_sub_value = $opt_tmp[$ii];
                                    		$opt_sub_txt = $opt_sub_tmp[0]." / ".$opt_sub_tmp[1]."원 ".$opt_sub_tmp[2];
                                    		
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
												  <option value=""> 선택하세요 </option>
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
												  <option value=""> 선택하세요 </option>
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
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;고객선호도</td>
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
          <td style="padding:15" valign=top> <font color="#990066"><strong>★미국직배송상품으로 
            업체배송,개별배송 상품과 묶음이 불가능하며, <br>
            국제운송료 포함한 금액입니다.<br>
            장바구니에 미국직배송 외 다른 상품과 함께 담지말아주세여~★ </strong></font> 
            <p> </p>
            <p>0 - 12 개월 아기에게 수유하는 조제분유 입니다.</p>
            <p>세계적인 분유 엔파밀의 새로운 신제품으로 전문가들의 임상결과로 증명된 두뇌 및 시력발달에 중요한 DHA 와 ARA를 
              함유한 제품입니다.<br>
              DHA와 ARA는 모유에서 발견되는 성분으로 아기의 두뇌성장과 시력에 매우 중요한 요소 입니다.<br>
              또한 MDI(유아 지능 발달 지수)가 7포인트 이상, VEP(시각유발전위검사)에서 기존보다 한단계 향상됨이 입증되었습니다.<br>
              엔파밀의 DHA와 ARA의 함량은 FAO 및 WHO에 근접합니다.</p>
            <p></p>
            <p><br>
              <font color="#990066"><strong>수유방법 및 주의사항</strong></font></p>
            <p>파우더 분유의경우 오픈후 부터 산화가 시작됩니다. <br>
              건조한곳에 보관 하시고 한달이내에 모두 사용하세요.</p>
            <p>4-fl oz당 2스푼의 분유를 넣고 물과 함께 잘 흔들어서 먹입니다.<br>
              물에탄 우유는 냉장 보관시 24시간 상온에서는 1시간 이내에 수유하세요.<br>
              수유후 1시간이 경과된 우유는 버리셔야 합니다.<br>
              우유를 데우시려면 중탕하는 방법을 사용하세요.<br>
              절대로 전자렌지를 사용하여 우유를 데우지 마세요.</p>
            <p></p>
            <p><br>
              <font color="#990066">지방.</font><br>
              유아에게 꼭필요한 지방산은 리놀레산, 알파 리놀렌산, 아라키돈산 등이며 지방산은 에너지 원으로서 매우 중요한 요소입니다. 
              <br>
              엔파밀 리필(Enfamil lipil™)은 지방산의 비율을 모유에 가깝게 제공하고 있습니다.</p>
            <p></p>
            <p><font color="#990066">아미노산.</font><br>
              단백질이 높은 영양가를 가지기 위해서는 필수 아미노산 상호간의 비율이 일정해야 합니다. 만일 하나라도 필요량보다 적으면 
              영양가가 억제 됩니다. <br>
              엔파밀 리필(Enfamil lipil™)은 모유에 가까운 아미노산과 유청단백질, 카세인 단백질을 모유와 유사하게 제공하고 
              있습니다.</p>
            <p></p>
            <p><font color="#990066">DHA &amp; ARA 흡수수치.</font><br>
              엔파밀 리필(Enfamil Lipil™)을 먹인 유아들의 경우 혈관 속의 DHA와 ARA레벨이 모유를 먹인 아이들과 
              유사한 수준으로 나타났으며, DHA와 ARA를 함유하지 않은 분유를 먹인 아이들보다는월등하게 차이가 났음이 증명되었습니다.</p>
            <p></p>
            <p><font color="#990066">지능지수의 유의적인 향상.</font><br>
              NIH(미국 국립보건원)의 지원을 받은 연구결과 엔파밀리필(Enfamil lipil™) 을 먹인 유아의경우 유아 지능 
              발달지수(MDI)가 7포인트 이상이 높게 나타났으며, DHA와 ARA를 함유하지 않은 분유를 먹인 아이들보다 월등하게 
              높음이 증명되었습니다.</p>
            <p></p>
            <p><font color="#990066">눈에띠는 시력향상.</font><br>
              NIH(Natianal Institutes of Health: 미국 국립 보건원)의 지원을 받은 연구결과 엔파밀리필(Enfamil 
              lipil™)을 먹인 유아의 경우 시력향상이 12개월 되는 시점에서 시력차트 한단계 정도를 더 볼 수 있는 차이를 
              보여주고 있습니다.</p>
            <p></p>
            <p><font color="#990066">DHA와 ARA 수치</font><br>
              FAO(Food and Agriculture Organization : 세계 식량 기구) 및 WHO(세계 보건 기구)에서는 
              총 지방산 중에서 0.33% ~ 0.35%의 DHA와 0.65% ~ 0.70% 의 ARA를 권장합니다.<br>
              엔파밀리필(Enfamil lipil™)의 경우 0.32%의 DHA 및 0.64%의 ARA가 함유되어 있습니다.</p>
            <p> <br>
              <br>
            </p></td></tr>
							</table>
                   </td>
                 </tr>
               </table>
<?

include "./prd_review.inc";			// 상품리뷰
include "../inc/footer.inc"; 		// 하단디자인

?>