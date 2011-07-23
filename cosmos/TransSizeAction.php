<?
include "../inc/global.inc";
/*********************************************************
CustID,MallID,ProdInc,SizeInfo
**********************************************************/

// 사이즈 업데이트

$size_list = explode("***",$SizeInfo);
for($ii=0; $ii < count($size_list); $ii++){
   
   $size_info = explode("~~",$size_list[$ii]);
   $ColorTxt = $size_info[0];
   $SizeList = $size_info[1];

   if($ColorTxt != ""){
      $sql = "select idx from wiz_colorsize where ProdInc='$ProdInc' and ColorTxt='$ColorTxt'";
      $result = mysql_query($sql) or error(mysql_error());
      
      if($row = mysql_fetch_object($result)){
         $sql = "update wiz_colorsize set SizeList='$SizeList' where idx = '$row->idx'";
         mysql_query($sql) or error(mysql_error());
      }
   }
}

?>