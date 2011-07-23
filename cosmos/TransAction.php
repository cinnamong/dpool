<?
include "../inc/global.inc";

/*******************************************************************
Pname 상품명
Brand 브랜드

ProdInc CosMos 상품코드값
Pcode 고객사 상품코드값
CustID 고객사ID : 정민지정값
MallID 외국몰 도메인
ItemCode 외국몰 SKU(상품코드)

Sprice 달러판매가 Sale Price
Lprice 달러정가 List Price
Purl 상품경로
Pimg 작은이미지
MDID 운영자ID

Depth 대분류:1,중분류:2,소분류:3,세분류:4
Ccode1 대분류코드
Ccode2 중분류코드
Ccode3 소분류코드
Ccode4 세분류코드

Story  영문상품설명
ColorInfo  Color값(아래형식참조)
SizeInfo Size값(아래형식참조)
*********************************************************************/

$sql = "select ProdInc from wiz_product where ProdInc = '$ProdInc'";
$result = mysql_query($sql);
$total = mysql_num_rows($result);

// 정보업데이트
if($total > 0){
   
   $sql = "update wiz_product set prdname = '$Pname', Purl='$Purl', Sprice = '$Sprice',  Lprice = '$Lprice', MallID = '$MallID', brand = '$Brand', prdimg_R = '$Purl' where prdcode = '$ProdInc'";
   $result = mysql_query($sql) or error(mysql_error());
   
// 신규등록
}else{
   
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
   
   // 상품정보 저장
   $sql = "insert into wiz_product values(   
						'$prdcode','$Pname','$prdcom','$prdnum','$ProdInc','$Purl','$MallID','$Sprice','$Lprice','$Brand','Y',10,'$savestock','$prior','$viewcnt','$deimgcnt', '$basketcnt', '$ordercnt', '$cancelcnt', '$comcnt',
						'$sellprice','$conprice','$reserve','$new','$popular','$recom','$sale','$shortage','$prefer',
						'$opttitle','$optcode','$opttitle2','$optcode2','$opttitle3','$optcode3',
						'$Pimg', '$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name','$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name',
						'$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name','$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name',
						'$searchkey','$stortexp','$Story')";
   echo $sql."<br>";
	$result = mysql_query($sql) or error(mysql_error());
	
	
	// 카테고리정보 저장
	if($Ccode2 == "0") $Ccode2 = "00";
	if($Ccode3 == "0") $Ccode3 = "00";
	$catcode = $Ccode1.$Ccode2.$Ccode3;
	$sql = "select idx from wiz_cprelation where prdcode='$prdcode' and catcode='$catcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	if($total <= 0){
      $sql = "insert into wiz_cprelation values('', '$prdcode', '$catcode')";
      echo $sql."<br>";
      $result = mysql_query($sql) or error(mysql_error());
   }
   
}
?>