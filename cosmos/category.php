<?
include "../inc/global.inc";

header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='euc-kr'?> ";
echo "<CateCust>";

$sql = "select * from wiz_category order by priorno01, priorno02, priorno03 asc";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
   $Ccode1 = substr($row->catcode,0,2);
   $Ccode2 = substr($row->catcode,2,2);
   $Ccode3 = substr($row->catcode,3,2);
   if($Ccode2 == "00") $Ccode2 = "0";
   if($Ccode3 == "00") $Ccode3 = "0";
?>
<Category>
   <CustID>yesusa</CustID>
   <Ccode1><?=$Ccode1?></Ccode1>
   <Ccode2><?=$Ccode2?></Ccode2>
   <Ccode3><?=$Ccode3?></Ccode3>
   <Ccode4>0</Ccode4>
   <Depth><?=$row->depthno?></Depth>
   <CateName><?=$row->catname?></CateName>
</Category>
<?
}
echo "</CateCust>";
?>