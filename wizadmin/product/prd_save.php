<?
include "../../inc/global.inc";
include "../inc/admin_check.inc";
include "../../inc/oper_info.inc";
include "../../inc/util_lib.inc";

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------
$param = "page=$page&dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&showset=$showset&searchopt=$searchopt&searchkey=$searchkey&stock_opt=$stock_opt&page=$page&shortpage=$shortpage";
//--------------------------------------------------------------------------------------------------

if($mode == "insert"){
	
	// 상품넘버 만들기
   $sql = "select max(prdcode) as prdcode from wiz_product";
   $result = mysql_query($sql) or error(mysql_error());
   if($row = mysql_fetch_object($result)){
      
      $datenum = substr($row->prdcode,0,6);
      $prdnum = substr($row->prdcode,6,4);
      $prdnum = substr("000".(++$prdnum),-4);
      
      if($datenum == date('ymd')) $prdcode = $datenum.$prdnum;
      else $prdcode = date('ymd')."0001";
      
   }else{
      $prdcode = date('ymd')."0001";
   }
   
   
   // 상품이미지 저장
   include "./prd_imgin.inc";
	
   $prdname = str_replace("'","′",$prdname);
	
	// 상품정보 저장
   $sql = "insert into wiz_product values(   
						'$prdcode','$prdname','$prdcom','$ProdInc','$Purl','$MallID','$Sprice','$Lprice','$origin','$showset','$stock','$savestock','$prior','$viewcnt','$deimgcnt', '$basketcnt', '$ordercnt', '$cancelcnt', '$comcnt',
						'$sellprice','$conprice','$reserve','$new','$popular','$recom','$sale','$shortage','$prefer',
						'$opttitle','$optcode','$opttitle2','$optcode2','$opttitle3','$optcode3',
						'$prdimg_R_name', '$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name','$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name',
						'$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name','$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name',
						'$searchkey','$stortexp','$content')";

	$result = mysql_query($sql) or error(mysql_error());


	// 카테고리정보 저장
   if(!empty($class03)){
      $catcode = $class03;
   }else{
      if(!empty($class02)) $catcode = $class02."00";
      else $catcode = $class01."0000";
   }
   $sql = "insert into wiz_cprelation values('', '$prdcode', '$catcode')";
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("상품이 입력되었습니다.","prd_input.php?mode=update&prdcode=$prdcode&$param");   
   
}else if($mode == "update"){

	// 상품이미지 저장
   include "./prd_imgup.inc";

	$prdname = str_replace("'","′",$prdname);

   // 상품정보 저장
   $sql = "update wiz_product set
                        prdcode='$prdcode',prdname='$prdname',prdcom='$prdcom',origin='$origin',showset='$showset',shortage='$shortage',prefer='$prefer',stock='$stock',prior='$prior',
								sellprice='$sellprice', conprice='$conprice', reserve='$reserve', new='$new', popular='$popular', recom='$recom', sale='$sale',
								opttitle='$opttitle', optcode='$optcode', opttitle2='$opttitle2', optcode2='$optcode2', opttitle3='$opttitle3', optcode3='$optcode3',
								prdimg_R='$prdimg_R_name',prdimg_L1='$prdimg_L1_name', prdimg_M1='$prdimg_M1_name', prdimg_S1='$prdimg_S1_name', prdimg_L2='$prdimg_L2_name', prdimg_M2='$prdimg_M2_name', prdimg_S2='$prdimg_S2_name',
								prdimg_L3='$prdimg_L3_name', prdimg_M3='$prdimg_M3_name', prdimg_S3='$prdimg_S3_name', prdimg_L4='$prdimg_L4_name', prdimg_M4='$prdimg_M4_name', prdimg_S4='$prdimg_S4_name',
								searchkey='$searchkey',stortexp='$stortexp',content='$content' where prdcode = '$prdcode'";
                        
   $result = mysql_query($sql) or error(mysql_error());
   
   // 카테고리 정보 저장
   if(!empty($class03)){
      $catcode = $class03;
   }else{
      if(!empty($class02)) $catcode = $class02."00";
      else $catcode = $class01."0000";
   }
   
   $sql = "update wiz_cprelation set catcode = '$catcode' where prdcode = '$prdcode' and idx = '$relidx'";
   $result = mysql_query($sql) or error(mysql_error());

	complete("상품정보가 수정되었습니다.","prd_input.php?mode=update&prdcode=$prdcode&$param");   



	
}else if($mode == "delete"){
	
	if($prdcode){
		
		// 카테고리 연관 삭제
		$sql = "delete from wiz_cprelation where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
		
		// 관련련상품 연관 삭제
		$sql = "delete from wiz_prdrelation where prdcode = '$prdcode' || relcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
		
		// 상품데이타 삭제
		exec("rm -f ../../prdimg/$prdcode"."*");
		$sql = "delete from wiz_product where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
		
	}else{
	
		$array_selected = explode("|",$selected);
		$i=0;
		while($array_selected[$i]){
			
			$tmp_prdcode = $array_selected[$i];
			
			// 카테고리 연관 삭제
			$sql = "delete from wiz_cprelation where prdcode = '$tmp_prdcode'";
			$result = mysql_query($sql) or error(mysql_error());
			
			// 관련련상품 연관 삭제
			$sql = "delete from wiz_prdrelation where prdcode = '$tmp_prdcode' || relcode = '$tmp_prdcode'";
			$result = mysql_query($sql) or error(mysql_error());
			
			//상품데이타 삭제
			exec("rm -f ../../prdimg/$tmp_prdcode"."*");
			$sql = "delete from wiz_product where prdcode = '$tmp_prdcode'";
			$result = mysql_query($sql) or error(mysql_error());	

			$i++;
		}
		
	}
	
	complete("선택한 상품을 삭제하였습니다.","prd_list.php?page=$page&$param");   
	
	
	
// 상품이미지 삭제
}else if($mode == "delete_image"){

	$sql = "update wiz_product set $prdimg='' where prdcode='$prdcode'";	
   	$result = mysql_query($sql) or error(mysql_error());
	exec("rm -f ../../prdimg/$imgpath");
	
	complete("상품 이미지를 삭제하였습니다.","prd_input.php?mode=update&prdcode=$prdcode&$param");




// 진열순서
}else if($mode == "prior"){
   
   if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
   if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
   if(!empty($showset)) $showset_sql = "wp.showset = '$showset' and ";
   if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
   
   $sql = "select wp.prdcode, wp.prdname, wp.prior from wiz_product wp, wiz_cprelation wc 
                  where $catcode_sql $special_sql $showset_sql $search_sql wc.prdcode = wp.prdcode";
   
   // 1단계위로
   if($posi == "up"){
   	
   	$sql .= " and wp.prior >= '$prior' and wp.prdcode != '$prdcode' order by wp.prior asc  limit 10";
   	
		$result = mysql_query($sql) or error(mysql_error());
   
	   if($row = mysql_fetch_object($result)){
	   	$prior = $row->prior+1;
		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
	
		}
	
	// 1단계아래로
	}else if($posi == "down"){
		
		$sql .= " and wp.prior <= '$prior' and wp.prdcode != '$prdcode' order by wp.prior desc  limit 10";

		$result = mysql_query($sql) or error(mysql_error());
	   
	   if($row = mysql_fetch_object($result)){
	   	$prior = $row->prior-1;
	   	
		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
	
		}
	
	// 10단계위로
	}else if($posi == "upup"){
		
   	$sql .= " and wp.prior >= '$prior'  and wp.prdcode != '$prdcode' order by wp.prior asc  limit 10";
   	
   	$result = mysql_query($sql) or error(mysql_error());
   	$total = mysql_num_rows($result);
   	
	   while($row = mysql_fetch_object($result)){
	   	$prior = $row->prior+1;
		}

		if($total > 0){
		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}

	// 10단계아래로
	}else if($posi == "downdown"){
		
	   $sql .= " and wp.prior <= '$prior' and wp.prdcode != '$prdcode' order by wp.prior desc  limit 10";
	   $result = mysql_query($sql) or error(mysql_error());
	   $total = mysql_num_rows($result);
	   
	   while($row = mysql_fetch_object($result)){
	   	$prior = $row->prior-1;
	   }	

		if($total > 0){
		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}
	}
   
   complete("진열순서를 변경하였습니다.","prd_list.php?$param");


// 상품평 삭제
}else if($mode == "delesti"){
	
	
	
	// 1개 상품평 삭제
	if($estiidx){

		$sql = "delete from wiz_comment where idx = '$estiidx'";
		$result = mysql_query($sql) or error(mysql_error());
		
		
		
	// 선택 상품평 삭제
	}else{
	
		$array_selected = explode("|",$selected);
		$i=0;
		while($array_selected[$i]){
			
			$tmp_estiidx = $array_selected[$i];
			
			$sql = "delete from wiz_comment where idx = '$tmp_estiidx'";
			$result = mysql_query($sql) or error(mysql_error());

			$i++;
		}
		
	}
	
	complete("선택한 상품평을 삭제하였습니다.","prd_estimate.php?page=$page");
	


// 재고관리
}else if($mode == "stock"){
	
	$sql = "update wiz_product set stock='$stock', savestock='$savestock' where prdcode='$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("선택한 상품재고를 수정하였습니다.","prd_shortage.php?$param");

// 옵션수정
}else if($mode == "optedit"){
	
	if(!empty($prdcode)){
		
		$sql = "update wiz_product set optcode = '$optvalue' where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
		echo "<script>alert('옵션항목이 적용되었습니다.');opener.document.location.reload();self.close();</script>";
		
	}else{
		echo "<script>alert('상품코드가 없습니다.');self.close();</script>";
	}
	
}else if($mode == "catlist"){

	if($submode == "insert"){
		
		if(!empty($class03)){
	      $catcode = $class03;
	   }else{
	      if(!empty($class02)) $catcode = $class02."00";
	      else $catcode = $class01."0000";
	   }
		   
		$sql = "select * from wiz_cprelation where prdcode = '$prdcode' and catcode = '$catcode'";
		$result = mysql_query($sql) or error(mysql_error());
		
		if($row = mysql_fetch_object($result)){
			
			error('이미등록된 분류입니다.');
			
		}else{
	
		   $sql = "insert into wiz_cprelation values('', '$prdcode', '$catcode')";
		   $result = mysql_query($sql) or error(mysql_error());
			
			complete('분류를 추가하였습니다.','');
		}
		
	}else if($submode == "delete"){
		
		$sql = "delete from wiz_cprelation where prdcode = '$prdcode' and catcode = '$catcode'";
		$result = mysql_query($sql) or error(mysql_error());
		
		complete('선택한 분류를 삭제하였습니다.','');
		
	}

}

?>