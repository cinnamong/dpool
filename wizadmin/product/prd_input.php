<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<?

if($shortpage == "Y") $listpage_url = "prd_shortage.php";
else $listpage_url = "prd_list.php";

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&showset=$showset&searchopt=$searchopt&searchkey=$searchkey&page=$page&shortpage=$shortpage";
//--------------------------------------------------------------------------------------------------

if(empty($mode)) $mode = "insert";

if($mode == "insert"){
	
	$catcode01 = $dep_code;
   $catcode02 = $dep_code.$dep2_code;
   $catcode03 = $dep_code.$dep2_code.$dep3_code;
   
// 상품정보를 가져온다.
}else if($mode == "update"){
   
   $sql = "select wp.*, wc.idx, wc.catcode from wiz_product wp, wiz_cprelation wc where wp.prdcode = '$prdcode' and wp.prdcode = wc.prdcode";
   $result = mysql_query($sql) or error(mysql_error());
   $prd_row = mysql_fetch_object($result);
   
   $relidx = $prd_row->idx;
   $catcode01 = substr($prd_row->catcode,0,2);
   $catcode02 = substr($prd_row->catcode,0,4);
   $catcode03 = substr($prd_row->catcode,0,6);
   
   $prd_row->content = str_replace("\"", "'", $prd_row->content);

}

// 적립금 사용여부와 적용률을 가저온다.
$sql = "select reserve_use, reserve_buy from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$reserve_use = $row->reserve_use;
$reserve_buy = $row->reserve_buy;

?>
<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
  var loding = false;
  var prd_class = new Array();
<?
   $no = 0;
   $sql = "select catcode, catname, depthno from wiz_category order by priorno01, priorno02, priorno03 asc";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   while($row = mysql_fetch_object($result)){
      
      $code01 = substr($row->catcode,0,2);
      $code02 = substr($row->catcode,0,4);
      $code03 = substr($row->catcode,0,6);
      
      if($row->depthno == 1){ $catcode = $code01; $parent = 0; }
      if($row->depthno == 2){ $catcode = $code02; $parent = $code01; }
      if($row->depthno == 3){ $catcode = $code03; $parent = $code02; }
?>

  prd_class[<?=$no?>] = new Array();
  prd_class[<?=$no?>][0] = "<?=$catcode?>";
  prd_class[<?=$no?>][1] = "<?=$row->catname?>";
  prd_class[<?=$no?>][2] = "<?=$parent?>";
  prd_class[<?=$no?>][3] = "<?=$row->depthno?>";

<?
   	$no++;
   }
?>
var tno = <?=$total?>;

function setClass01(){

  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");

  arrayClass.options[0] = new Option(":: 대분류 ::","");
  arrayClass1.options[0] = new Option(":: 중분류 ::","");
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='1'){
		 arrayClass.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
}

function changeClass01(){
  
  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");
  
  var selidx = arrayClass.selectedIndex;
  var selvalue = arrayClass.options[selidx].value;
  
  arrayClass1.options.length=0;
  arrayClass2.options.length=0;
  arrayClass1.options[0] = new Option(":: 중분류 ::","");
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='2' && prd_class[no][2]==selvalue){
		 arrayClass1.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
  
}

function changeClass02(){
   
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");
  
  var selidx = arrayClass1.selectedIndex;
  var selvalue = arrayClass1.options[selidx].value;
  
  arrayClass2.options.length=0;
  arrayClass2.options[0] = new Option(":: 소분류 ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='3' && prd_class[no][2]==selvalue){
		 arrayClass2.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
  
}

function changeClass03(){
}

// 상품카테고리 설정
function setCategory(){

  var arrayClass01 = eval("document.frm.class01");
  var arrayClass02 = eval("document.frm.class02");
  var arrayClass03 = eval("document.frm.class03");
  
  for(no=1; no < arrayClass01.length; no++){
    if(arrayClass01.options[no].value == '<?=$catcode01?>'){
      arrayClass01.options[no].selected = true;
      changeClass01();
    }
  }
  
  for(no=1; no < arrayClass02.length; no++){
    if(arrayClass02.options[no].value == '<?=$catcode02?>'){
      arrayClass02.options[no].selected = true;
      changeClass02();
    }
  }
  
  for(no=1; no < arrayClass03.length; no++){
    if(arrayClass03.options[no].value == '<?=$catcode03?>')
      arrayClass03.options[no].selected = true;
  }

}

function inputCheck(frm){
   
   if(loding == false){
   	alert("상품정보를 가져오고 있습니다. 잠시후 재시도 하세요");
   	return false;
   }
	if(frm.prdname.value == ""){
		alert("상품명을 입력하세요");
		frm.prdname.focus();
		return false;
	}
	if(frm.sellprice.value == ""){
		alert("판매가를 입력하세요");
		frm.sellprice.focus();
		return false;
	}
	
	var optvalue = "";
	var length = frm.optcode_tmp.length;
	for(ii = 0; ii < length; ii++){ optvalue += frm.optcode_tmp.options[ii].value+"^^"; }
	frm.optcode.value = optvalue;
	
	
	document.frm.toggle.checked = true; doToggle();
	iText = iView.document.body.innerText;
   frm.content.value = iText;
   
}

//해당 이미지를 삭제한다.
function deleteImage(prdcode, prdimg, imgpath){
	if(imgpath == ""){
		alert("삭제할 이미지가 없습니다.");
		return;
	}else{
	if(confirm("이미지를 삭제하시겠습니까?"))
		document.location = "prd_save.php?mode=delete_image&prdcode="+prdcode+"&prdimg="+prdimg+"&imgpath="+imgpath;  
	}
	return;
}

function appendOption(){
	
	var frm = document.frm;
	var length = frm.optcode_tmp.length;
	
	var optcode_01 = frm.optcode_01.value;
	var optcode_02 = frm.optcode_02.value;
	var optcode_03 = frm.optcode_03.value;
	
	if(optcode_01 == ""){
		alert("옵션을 입력하세요.");
		frm.optcode_01.focus();
		return;
	}
	if(optcode_02 == "") optcode_02 = "0";
	if(optcode_03 == "") optcode_03 = "0";

	if(!Check_Num(optcode_02)){
		alert("가격은 숫자만 가능합니다.");
		frm.optcode_02.focus();
		return;
	}
	if(!Check_Num(optcode_03)){
		alert("재고는 숫자만 가능합니다.");
		frm.optcode_03.focus();
		return;
	}
	
	var opttxt = optcode_01+" - "+optcode_02+"원 : "+optcode_03+"개";
	var optvalue = optcode_01+"^"+optcode_02+"^"+optcode_03;
	
	var option1 = new Option(opttxt, optvalue, true);
	frm.optcode_tmp.options[length] = option1;
	
	frm.optcode_01.value = "";
	frm.optcode_02.value = "";
	frm.optcode_03.value = "";

}

function deleteOption(){
	
	var frm = document.frm;
	var index = frm.optcode_tmp.selectedIndex;

	if(index >= 0){
		frm.optcode_tmp.options[index] = null;
	}
	frm.optcode_01.value = "";
	frm.optcode_02.value = "";
	frm.optcode_03.value = "";
}

function editOption(){

	var frm = document.frm;
	var length = frm.optcode_tmp.length;
	
	var optcode_01 = frm.optcode_01.value;
	var optcode_02 = frm.optcode_02.value;
	var optcode_03 = frm.optcode_03.value;
	
	if(optcode_01 == ""){
		alert("옵션을 입력하세요.");
		frm.optcode_01.focus();
		return;
	}
	if(optcode_02 == "") optcode_02 = "0";
	if(optcode_03 == "") optcode_03 = "0";

	if(!Check_Num(optcode_02)){
		alert("가격은 숫자만 가능합니다.");
		frm.optcode_02.focus();
		return;
	}
	if(!Check_Num(optcode_03)){
		alert("재고는 숫자만 가능합니다.");
		frm.optcode_03.focus();
		return;
	}
	
	var idx = document.frm.optcode_tmp.selectedIndex;
	var opttxt = optcode_01+" - "+optcode_02+"원 : "+optcode_03+"개";
	var optvalue = optcode_01+"^"+optcode_02+"^"+optcode_03;
	
	document.frm.optcode_tmp.options[idx].text = opttxt;
	document.frm.optcode_tmp.options[idx].value = optvalue;

}

function openOption(optno){
	
	var url = "option_list.php?optno=" + optno;
	var sFeatures = "dialogWidth: 350px; dialogHeight: 220px; center: yes; help: no; resizable: no; status: no; scroll: no;"; 
   window.open(url,"","height=200, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");
	   
}


function chgOption(){

	var tmp_optcode = document.frm.optlist.value.split("^^");
	var tmp_opttext = document.frm.opttext.value.split("^^");
   var length = document.frm.optcode_tmp.length;
	for(ii=0; ii < (tmp_optcode.length-1); ii++){
		var option1 = new Option(tmp_opttext[ii], tmp_optcode[ii], true);
		document.frm.optcode_tmp.options[length] = option1;
		
		length++;
	}

	return false;
}

function setOption(){
	var idx = document.frm.optcode_tmp.selectedIndex;
	if(idx >= 0){
		var tmp_optcode = document.frm.optcode_tmp.options[idx].value.split("^");
		frm.optcode_01.value = tmp_optcode[0];
		frm.optcode_02.value = tmp_optcode[1];
		frm.optcode_03.value = tmp_optcode[2];
	}

}


function optUp(){
	
	var frm = document.frm;
	var sel_idx = frm.optcode_tmp.selectedIndex;
	
	if(sel_idx > 0){
		
		chg_idx = sel_idx - 1;

		var sel_txt = frm.optcode_tmp.options[sel_idx].text;
		var sel_val = frm.optcode_tmp.options[sel_idx].value;
		var chg_txt = frm.optcode_tmp.options[chg_idx].text;
		var chg_val = frm.optcode_tmp.options[chg_idx].value;
	
		
		frm.optcode_tmp.options[chg_idx].text = sel_txt;
		frm.optcode_tmp.options[chg_idx].value = sel_val;
		frm.optcode_tmp.options[sel_idx].text = chg_txt;
		frm.optcode_tmp.options[sel_idx].value = chg_val;
		
		frm.optcode_tmp.options[chg_idx].selected = true;
		
	}
	
	
	
}

function optDown(){
	
	var frm = document.frm;
	var sel_idx = frm.optcode_tmp.selectedIndex;
	var opt_len = document.frm.optcode_tmp.length;

	if(-1 < sel_idx && sel_idx < (opt_len-1)){
		
		var chg_idx = sel_idx + 1;

		var sel_txt = frm.optcode_tmp.options[sel_idx].text;
		var sel_val = frm.optcode_tmp.options[sel_idx].value;
		var chg_txt = frm.optcode_tmp.options[chg_idx].text;
		var chg_val = frm.optcode_tmp.options[chg_idx].value;
	
		
		frm.optcode_tmp.options[chg_idx].text = sel_txt;
		frm.optcode_tmp.options[chg_idx].value = sel_val;
		frm.optcode_tmp.options[sel_idx].text = chg_txt;
		frm.optcode_tmp.options[sel_idx].value = chg_val;
		
		frm.optcode_tmp.options[chg_idx].selected = true;
		
	}

}

function prdlayCheck(){
	<?
	if($prd_row->prdimg_S2 != "") echo "document.frm.prdlay_check2.checked = true; prdlay2.style.display='';";
	if($prd_row->prdimg_S3 != "") echo "document.frm.prdlay_check3.checked = true; prdlay3.style.display='';";
	if($prd_row->prdimg_S4 != "") echo "document.frm.prdlay_check4.checked = true; prdlay4.style.display='';";
	if($prd_row->opttitle != "" || $prd_row->optcode != "") echo "document.frm.prdlay_opt.checked = true; prdopt.style.display='';";
	?>
}

// 상품가격에 따른 적립금 적용 퍼센트에따라 적립금 적용
function setReserve(frm){

   if(frm.reserve != null){
   	var sellprice = frm.sellprice.value;
   	if(!Check_Num(sellprice)){
			alert("판매가는 숫자이어야 합니다.");
			frm.sellprice.value = "";
			frm.sellprice.focus();
		}else{
	      var reserve = "" + sellprice*(<?=$reserve_buy?>/100)
	      reserve = reserve.split('.');
	      frm.reserve.value = reserve[0];
	   }
   }
   
}

function lodingComplete(){
	loding = true;
}

function prdCategory(){
   var url = "prd_catlist.php?prdcode=<?=$prdcode?>";
   window.open(url, "prdCategory", "height=330, width=560, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}

function setImgsize(){
	var url = "prd_imgsize.php";
   window.open(url, "setImgsize", "height=200, width=300, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}

//-->
</script>
<body onLoad="setClass01();setCategory();Init();prdlayCheck();lodingComplete();">
<? include "../inc/header.inc"; ?>


                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          <?
                                          $nowposi = "상품관리 &gt; <strong>상품등록</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>기본정보 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form name="frm" action="prd_save.php?<?=$param?>" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
                                          <input type="hidden" name="mode" value="<?=$mode?>">
                                          <input type="hidden" name="optlist" value="">
                                          <input type="hidden" name="opttext" value="">
                                          <input type="hidden" name="prdcode" value="<?=$prdcode?>">
                                          <input type="hidden" name="relidx" value="<?=$relidx?>">
                                          <input type="hidden" name="optcode" value="<?=$optcode?>">
                                          <textarea name="content" style="display:none" ><?=$prd_row->content?></textarea>
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품분류</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <select name="class01" onChange="changeClass01();">
										                      </select>
										                      <select name="class02" onChange="changeClass02();">
										                      </select>
										                      <select name="class03" onChange="changeClass03();">
										                      </select>&nbsp; 
										                      <? if($mode == "update"){ ?>
										                      	<a href="javascript:prdCategory()"><font color=red> >> 분류추가</font></a>
										                      <? } ?>
										                      </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품그룹</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="checkbox" name="new" value="Y" <? if($prd_row->new == "Y") echo "checked"; ?>><img src="/images/icon_new.gif" border="0"> &nbsp;
										                        <input type="checkbox" name="popular" value="Y" <? if($prd_row->popular == "Y") echo "checked"; ?>><img src="/images/icon_hit.gif" border="0"> &nbsp;
										                        <input type="checkbox" name="recom" value="Y" <? if($prd_row->recom == "Y") echo "checked"; ?>><img src="/images/icon_rec.gif" border="0"> &nbsp;
										                        <input type="checkbox" name="sale" value="Y" <? if($prd_row->sale == "Y") echo "checked"; ?>><img src="/images/icon_sale.gif" border="0"> &nbsp;
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품명 <font color="red">*</font></td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <input type="text" name="prdname" value="<?=$prd_row->prdname?>" size="60" class="form1">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;제조사</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="prdcom" type="text" value="<?=$prd_row->prdcom?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;원산지</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="origin" type="text" value="<?=$prd_row->origin?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;상품진열</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    <input type="radio" name="showset" value="Y" <? if($prd_row->showset == "Y" || empty($prd_row->showset)) echo "checked"; ?>>진열함&nbsp;
                                                    <input type="radio" name="showset" value="N" <? if($prd_row->showset == "N") echo "checked"; ?>>진열안함
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;품절여부</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    <input type="checkbox" name="shortage" value="Y" <? if($prd_row->shortage == "Y") echo "checked"; ?>><img src="/images/icon_not.gif" border="0"> &nbsp;
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우선순위</td>
                                                    <td bgcolor="F8F8F8"> 
                                                    <input type="text" name="prior" value="<? if(empty($prd_row->prior)) echo date(ymdHis); else echo $prd_row->prior; ?>" maxlength="12" class="form1">
                                                    </td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;선호도</td>
                                                    <td width="200" bgcolor="F8F8F8">
                                                    <select name="prefer">
                                                    <option value="1" <? if($prd_row->prefer == "1") echo "selected"; ?>>별1
                                                    <option value="2" <? if($prd_row->prefer == "2") echo "selected"; ?>>별2
                                                    <option value="3" <? if($prd_row->prefer == "3" || $prd_row->prefer == "") echo "selected"; ?>>별3
                                                    <option value="4" <? if($prd_row->prefer == "4") echo "selected"; ?>>별4
                                                    <option value="5" <? if($prd_row->prefer == "5") echo "selected"; ?>>별5
                                                    </select>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="2"></td></tr>
                                            <tr>
                                              <td width="140"></td>
                                              <td>(숫자가 클수록 진열시 앞에 나옵니다. 최대 12자리) </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>가격및옵션 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;판매가 <font color="red">*</font></td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="sellprice" type="text" value="<?=$prd_row->sellprice?>" class="form1" onchange="setReserve(this.form);"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;정가</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="conprice" type="text" value="<?=$prd_row->conprice?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;적립금 <? if($reserve_use == "Y") echo "(판매가 ".$reserve_buy." %)"; ?></td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="reserve" type="text" value="<?=$prd_row->reserve?>" class="form1"></td>
                                                    <td width="150" height="30" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;재고량</td>
                                                    <td width="200" bgcolor="F8F8F8"><input name="stock" type="text" value="<?=$prd_row->stock?>" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;옵션</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    옵션별 가격/재고관리가 가능합니다.
                                                    <input type="checkbox" name="prdlay_opt" onClick="if(this.checked==true) prdopt.style.display=''; else prdopt.style.display='none';"><font color="red">설정하기</font><br>
                                                    <div id="prdopt" style="display:none">
                                                    	
                                                 	    <table border="0" cellpadding="0" cellspacing="0">
                                                 	    <tr>
                                                 	    <td colspan=5>옵션명 : <input type="text" name="opttitle" onFocus="chgOption();" value="<?=$prd_row->opttitle?>" size="12" class="form1">
                                                 	    <input type="button" name="callopt" value="불러오기" class="xbtn" onClick="openOption('opt1');">
                                                 	    </td>
                                                       <tr>
                                                       <td>
                                                        <select name="optcode_tmp" size="4" style="width:250;" onChange="setOption();">
                                                        <?
                                                        
                                                        $opt_list = explode("^^",$prd_row->optcode);
                                                        for($ii=0; $ii < count($opt_list)-1; $ii++){
                                                        	$opt_code = explode("^",$opt_list[$ii]);
                                                        	$opt_text = $opt_code[0]." - ".$opt_code[1]."원 : ".$opt_code[2]."개";
                                                        	echo "<option value='$opt_list[$ii]'>$opt_text";
                                                        }
                                                        ?>
                                                        </select>
                                                       </td>
                                                       <td width="20" align="center">
                                                         <a href="javascript:optUp();"><img src="../image/up_icon.gif" border="0"></a><br><br>
	                                                      <a href="javascript:optDown();"><img src="../image/down_icon.gif" border="0"></a>
	                                                    </td>
                                                       <td>
                                                         옵 션 : <input type="text" name="optcode_01" value="" size="21" class="form1"><br>
                                                         가 격 : <input type="text" name="optcode_02" value="" size="21" class="form1"><br>
                                                         재 고 : <input type="text" name="optcode_03" value="" size="21" class="form1">
                                                       </td>
                                                       <td width="2"></td>
                                                       <td>
                                                        <input type="button" value="추가" class="xbtn" onClick="appendOption();"><br>
                                                        <input type="button" value="삭제" class="xbtn" onClick="deleteOption();"><br>
                                                        <input type="button" value="적용" class="xbtn" onClick="editOption();">
                                                       </td>
                                                       </tr>
                                                       </table>
                                                     </div>
                                                     
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;옵션1</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    옵션명 : <input type="text" name="opttitle2" value="<?=$prd_row->opttitle2?>" size="12" class="form1">
                                                    &nbsp; 옵션 : <input type="text" name="optcode2" value="<?=$prd_row->optcode2?>" size="40" class="form1">
                                                    <input type="button" name="callopt" value="불러오기" class="xbtn" onClick="openOption('opt2');">
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;옵션2</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    옵션명 : <input type="text" name="opttitle3" value="<?=$prd_row->opttitle3?>" size="12" class="form1">
                                                    &nbsp; 옵션 : <input type="text" name="optcode3" value="<?=$prd_row->optcode3?>" size="40" class="form1">
                                                    <input type="button" name="callopt" value="불러오기" class="xbtn" onClick="openOption('opt3');"><br>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="2"></td></tr>
                                            <tr>
                                              <td width="320"></td>
                                              <td>옵션은 컴마(,)로 구분하세요 &nbsp; ex(95,100,105...)</td>
                                            </tr>
                                          </table>
                                          <table width="675" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>제품컬러/사이즈 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="695" border="0">
                                          <?
                                          $c_sql = "select * from wiz_colorsize where ProdInc = '$prd_row->ProdInc'";
                                          $c_result = mysql_query($c_sql);
                                          while($c_row = mysql_fetch_object($c_result)){
                                          ?>
                                            <tr>
                                              <td bgcolor="#efefef"><b><?=$c_row->ColorTxt?></b></td>
                                              <td bgcolor="#efefef">
                                                <a href="<?=$c_row->BigImg?>" target="_blank">BigImg</a> / 
                                                <a href="<?=$c_row->SwatchImg?>" target="_blank">SwatchImg</a> / 
                                                <a href="<?=$c_row->ZoomImg1?>" target="_blank">ZoomImg1</a> / 
                                                <a href="<?=$c_row->ZoomImg2?>" target="_blank">ZoomImg2</a><br>
                                                <?=$c_row->SizeList?>
                                              </td>
                                            </tr>
                                          <?
                                          }
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td width="22%" height="35"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>상품사진 </strong></td>
                                              <td>
                                                <a href="javascript:setImgsize();"><font color="red">이미지사이즈 설정</font></a> &nbsp; &nbsp; 
                                                <input type="checkbox" name="prdlay_check2" onClick="if(this.checked==true) prdlay2.style.display=''; else prdlay2.style.display='none';"><font color="red">이미지추가2</font>
                                                <input type="checkbox" name="prdlay_check3" onClick="if(this.checked==true) prdlay3.style.display=''; else prdlay3.style.display='none';"><font color="red">이미지추가3</font>
                                                <input type="checkbox" name="prdlay_check4" onClick="if(this.checked==true) prdlay4.style.display=''; else prdlay4.style.display='none';"><font color="red">이미지추가4</font>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="28%" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>원본 이미지</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input type="file" name="realimg" class="form1"> [GIF, JPG, PNG]<br>원본이미지를 등록하면 나머지 이미지가 자동생성 됩니다.</td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>대표 이미지</b> <font color="red">*</font><br>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⇒ 위치: 상품목록</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_R" class="form1"> (크기 : <?=$oper_info->prdimg_R?>*<?=$oper_info->prdimg_R?>)<br>
                                                    <?
                                                    if($prd_row->prdimg_R != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg1.src='../../prdimg/<?=$prd_row->prdimg_R?>';"><?=$prd_row->prdimg_R?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_R','<?=$prd_row->prdimg_R?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>소(小) 이미지1</b><br>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⇒ 위치: 축소이미지</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_S1" class="form1"> (크기 : <?=$oper_info->prdimg_S?>*<?=$oper_info->prdimg_S?>)<br>
                                                    <?
                                                    if($prd_row->prdimg_S1 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg1.src='../../prdimg/<?=$prd_row->prdimg_S1?>';"><?=$prd_row->prdimg_S1?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_S1','<?=$prd_row->prdimg_S1?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>중(中) 이미지1</b> <font color="red">*</font><br>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⇒ 위치: 제품상세</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_M1" class="form1"> (크기 : <?=$oper_info->prdimg_M?>*<?=$oper_info->prdimg_M?>)<br>
                                                    <?
                                                    if($prd_row->prdimg_M1 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg1.src='../../prdimg/<?=$prd_row->prdimg_M1?>';"><?=$prd_row->prdimg_M1?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_M1','<?=$prd_row->prdimg_M1?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>대(大) 이미지1</b> <font color="red">*</font><br>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⇒ 위치: 확대보기</td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_L1" class="form1"> (크기 : <?=$oper_info->prdimg_L?>*<?=$oper_info->prdimg_L?>)<br>
                                                    <?
                                                    if($prd_row->prdimg_L1 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg1.src='../../prdimg/<?=$prd_row->prdimg_L1?>';"><?=$prd_row->prdimg_L1?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_L1','<?=$prd_row->prdimg_L1?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                              <td bgcolor="ffffff" width="200" height="100%">
                                                <table height="100%" bgcolor="#ffffff" bordercolor="D5D3D3" width="199" border="1" cellspacing="1" cellpadding="2">
                                                  <tr>
                                                    <td align="center">
                                                    <?
                                                    if($prd_row->prdimg_R != "")
                                                    	echo "<img src='../../prdimg/$prd_row->prdimg_R' name='prdimg1' width='100' height='100'>";
                                                    else
                                                    	echo "No<br>Image";
																	 ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <div id="prdlay2" style="display:none">
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="28%" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>원본 이미지</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input type="file" name="realimg2" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>소(小) 이미지2</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_S2" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_S2 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg2.src='../../prdimg/<?=$prd_row->prdimg_S2?>';"><?=$prd_row->prdimg_S2?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_S2','<?=$prd_row->prdimg_S2?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>중(中) 이미지2</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_M2" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_M2 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg2.src='../../prdimg/<?=$prd_row->prdimg_M2?>';"><?=$prd_row->prdimg_M2?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_M2','<?=$prd_row->prdimg_M2?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>대(大) 이미지2</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_L2" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_L2 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg2.src='../../prdimg/<?=$prd_row->prdimg_L2?>';"><?=$prd_row->prdimg_L2?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_L2','<?=$prd_row->prdimg_L2?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                              <td bgcolor="ffffff" width="200" height="100%">
                                                <table height="100%" bgcolor="#ffffff" bordercolor="D5D3D3" width="199" border="1" cellspacing="1" cellpadding="2">
                                                  <tr>
                                                    <td align="center">
                                                    <?
                                                    if($prd_row->prdimg_M2 != "")
                                                    	echo "<img src='../../prdimg/$prd_row->prdimg_M2' name='prdimg2' width='100' height='100'>";
                                                    else
                                                    	echo "No<br>Image";
																	 ?>
																	 </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          </div>
                                          <div id="prdlay3" style=display:none>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="28%" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>원본 이미지</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input type="file" name="realimg3" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>소(小) 이미지3</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_S3" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_S3 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg3.src='../../prdimg/<?=$prd_row->prdimg_S3?>';"><?=$prd_row->prdimg_S3?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_S3','<?=$prd_row->prdimg_S3?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>중(中) 이미지3</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_M3" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_M3 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg3.src='../../prdimg/<?=$prd_row->prdimg_M3?>';"><?=$prd_row->prdimg_M3?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_M3','<?=$prd_row->prdimg_M3?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>대(大) 이미지3</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_L3" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_L3 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg3.src='../../prdimg/<?=$prd_row->prdimg_L3?>';"><?=$prd_row->prdimg_L3?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_L3','<?=$prd_row->prdimg_L3?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                              <td bgcolor="ffffff" width="200" height="100%">
                                                <table height="100%" bgcolor="#ffffff" bordercolor="D5D3D3" width="199" border="1" cellspacing="1" cellpadding="2">
                                                  <tr>
                                                    <td align="center">
                                                    <?
                                                    if($prd_row->prdimg_M3 != "")
                                                    	echo "<img src='../../prdimg/$prd_row->prdimg_M3' name='prdimg3' width='100' height='100'>";
                                                    else
                                                    	echo "No<br>Image";
																	 ?>
																	 </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          </div>
                                          <div id="prdlay4" style=display:none>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="28%" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>원본 이미지</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3"><input type="file" name="realimg4" class="form1"></td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>소(小) 이미지4</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_S4" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_S4 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg4.src='../../prdimg/<?=$prd_row->prdimg_S4?>';"><?=$prd_row->prdimg_S4?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_S4','<?=$prd_row->prdimg_S4?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>중(中) 이미지4</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_M4" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_M4 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg4.src='../../prdimg/<?=$prd_row->prdimg_M4?>';"><?=$prd_row->prdimg_M4?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_M4','<?=$prd_row->prdimg_M4?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                  <tr> 
                                                    <td height="25" align="left" bgcolor="EAEAEA">
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>대(大) 이미지4</b></td>
                                                    <td bgcolor="F8F8F8" colspan="3">
                                                    <input type="file" name="prdimg_L4" class="form1"><br>
                                                    <?
                                                    if($prd_row->prdimg_L4 != ""){
                                                    ?>
                                                    등록이미지 : <a href="#" onMouseOver="document.prdimg4.src='../../prdimg/<?=$prd_row->prdimg_L4?>';"><?=$prd_row->prdimg_L4?></a> &nbsp; 
                                                    <a href="javascript:deleteImage('<?=$prd_row->prdcode?>','prdimg_L4','<?=$prd_row->prdimg_L4?>');"><font color="red">[삭제]</font></a>
                                                    <?
                                                    }
                                                    ?>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                              <td bgcolor="ffffff" width="200" height="100%">
                                                <table height="100%" bgcolor="#ffffff" bordercolor="D5D3D3" width="199" border="1" cellspacing="1" cellpadding="2">
                                                  <tr>
                                                    <td align="center">
                                                    <?
                                                    if($prd_row->prdimg_M4 != "")
                                                    	echo "<img src='../../prdimg/$prd_row->prdimg_M4' name='prdimg4' width='100' height='100'>";
                                                    else
                                                    	echo "No<br>Image";
																	 ?>
																	 </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          </div>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td height="10"></td></tr>
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>상품설명</strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="D5D3D3">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                                  <tr> 
                                                    <td width="150" height="25" align="left" bgcolor="EAEAEA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;관라자주석</td>
                                                    <td width="550" bgcolor="F8F8F8" colspan="3">
                                                    <textarea name="stortexp" rows="3" cols="90" class="textarea"><?=$prd_row->stortexp?></textarea>
                                                    </td>
                                                  </tr>
                                                  
                                                  <? $webedit_title = "상세설명"; include "../webedit/webedit.inc"; ?>
                                                  
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <div id="floater" style="position:absolute; left:870px; top:300px; width:140; height:353px; z-index:0">
                                          <table>
                                          <tr><td><input type="image" src="../image/but_admin_save.gif"></td></tr>
                                          <tr><td><a href='<?=$listpage_url?>?<?=$param?>''><img src="../image/but_admin_list.gif" border="0"></a></td></tr>
                                          </table>
                                          </div>
                                          <script language="JavaScript" type="text/javascript">
														<!--
														self.onError=null;
															currentX = currentY = 0; 
															whichIt = null; 
															lastScrollX = 0; lastScrollY = 0;
															NS = (document.layers) ? 1 : 0;
															IE = (document.all) ? 1: 0;
															
															function heartBeat() {
																if(IE) { 
																	diffY = document.body.scrollTop; 
																	diffX = 0; 
																}
																if(NS) { diffY = self.pageYOffset; diffX = self.pageXOffset; }
																if(diffY != lastScrollY) {
																	percent = .05 * (diffY - lastScrollY);
																	if(percent > 0) percent = Math.ceil(percent);
																	else percent = Math.floor(percent);
																	if(IE) document.all.floater.style.pixelTop += percent;
																	if(NS) document.floater.top += percent; 
																	lastScrollY = lastScrollY + percent;
																}
																if(diffX != lastScrollX) {
																	percent = .05 * (diffX - lastScrollX);
																	if(percent > 0) percent = Math.ceil(percent);
																	else percent = Math.floor(percent);
																	if(IE) document.all.floater.style.pixelLeft += percent;
																	if(NS) document.floater.top += percent;
																	lastScrollY = lastScrollY + percent;
																} 
															} 
															if(NS || IE) action = window.setInterval("heartBeat()",1);
														//-->
														</script>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <tr><td><input type="button" class="t" value=" 목 록 " onclick="document.location='<?=$listpage_url?>?<?=$param?>';"></td>
                                          <td width="100%" align="center">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="60"><input type="submit" class="t" value=" 확 인 "></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="54" align="right"><input type="button" class="t" value=" 취 소 " onClick="history.go(-1);"></td>
                                            </tr>
                                          </form>
                                          </table>
                                          </td></tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          </td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="..../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>