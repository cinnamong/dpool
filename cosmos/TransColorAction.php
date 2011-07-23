<?
include "../inc/global.inc";
/*********************************************************
CustID,MallID,ProdInc,ColorInfo
**********************************************************/

// 컬러 업데이트

$color_list = explode("***",$ColorInfo);
for($ii=0; $ii < count($color_list); $ii++){
   
   $color_info = explode("~~",$color_list[$ii]);
   $color_url = explode("^",$color_info[1]);
   
   $ColorTxt = $color_info[0];
   $BigImg = $color_url[0];
   $SwatchImg = $color_url[1];
   $ZoomImg1 = $color_url[2];
   $ZoomImg2 = $color_url[3];
   
   if($ColorTxt != ""){
      $sql = "select idx from wiz_colorsize where ProdInc='$ProdInc' and ColorTxt='$color_info[0]'";
      $result = mysql_query($sql) or error(mysql_error());
      
      if($row = mysql_fetch_object($result)){
         $sql = "update wiz_colorsize set BigImg='$BigImg',SwatchImg='$SwatchImg',ZoomImg1='$ZoomImg1',ZoomImg2='$ZoomImg2=' where idx = '$row->idx'";
         mysql_query($sql) or error(mysql_error());
      }else{
         $sql = "insert into wiz_colorsize values('','$ProdInc','$MallID','$ColorTxt','$BigImg','$SwatchImg','$ZoomImg1','$ZoomImg2','')";
         mysql_query($sql) or error(mysql_error());
      }
   }
}

?>