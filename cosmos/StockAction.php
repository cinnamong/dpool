<?
include "../inc/global.inc";
/*********************************************************
ProdInc
Pcode
CustID
MallID
Lprice
Sprice
Stock
ColorStock
SizeStock
**********************************************************/

// 상품정보 업데이트
$sql = "update wiz_product set MallID='$MallID', Lprice='$Lprice', Sprice='$Sprice' where ProdInc='$ProdInc'";
$result = mysql_query($sql) or error(mysql_error());

// 컬러, 사이즈 등록
$sql = "delete from wiz_colorsize where ProdInc = '$ProdInc'";
$result = mysql_query($sql) or error(mysql_error());

$color_list = explode("***",$ColorInfo);
$size_list = explode("***",$SizeInfo);
for($ii=0; $ii < count($color_list); $ii++){
   
   $color_info = explode("^",$color_list[$ii]);
   $size_info = explode("^",$size_list[$ii]);
   $sql = "insert into wiz_colorsize values('','$ProdInc','$MallID','$color_info[0]','$color_info[1]','$color_info[2]','$color_info[3]','$color_info[4]','$size_info[1]')";
   mysql_query($sql) or error(mysql_error());
   
}

?>