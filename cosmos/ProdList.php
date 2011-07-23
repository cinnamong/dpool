<? include "../inc/global.inc"; ?>

<table border="1">

<?
$MallID = str_replace(".","",$MallID);
$sql = "select ProdInc,prdcode,prdname,Lprice,Sprice,prdimg_R,Purl from wiz_product where MallID='$MallID'";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
   
   $OptList = "";
   $sql = "select ColorTxt,SizeList from wiz_colorsize where ProdInc = '$row->ProdInc'";
   $c_result = mysql_query($sql) or error(mysql_error());
   while($c_row = mysql_fetch_object($c_result)){
      
      $size_list = explode("^",$c_row->SizeList);
      for($ii=0;$ii<count($size_list)-1;$ii++){
         $OptList .= $c_row->ColorTxt."¢¹".$size_list[$ii]."¢º";
      }
      
   }
   $OptList = rtrim($OptList,'¢º');
   
?>
<tr>
<td class='ProdInc'><?=$row->ProdInc?></td>
<td class='Pcode'><?=$row->prdcode?></td>
<td class='Pname'><?=$row->prdname?></td>
<td class='Lprice'><?=$row->Lprice?></td>
<td class='Sprice'><?=$row->Sprice?></td>
<td class='Stock'>1</td>
<td class='Purl'><?=$row->Purl?></td>
<td class='OptList'><?=$OptList?></td>
</tr>
<?
}
?>
</table>