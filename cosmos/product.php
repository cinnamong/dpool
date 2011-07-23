<?
include "../inc/global.inc";

header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='euc-kr'?> ";
echo "<ProdCust>";

$sql = "select wp.prdcode,wp.MallID,wp.ProdInc,wp.Sprice,wp.prdimg_R,wc.catcode from wiz_product wp, wiz_cprelation wc where wp.prdcode = wc.prdcode order by wp.prior desc";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
?>
<Product>
   <CustID>yesusa</CustID>
   <MallID><?=$row->MallID?></MallID>
   <ProdInc><?=$row->ProdInc?></ProdInc>
   <Sprice><?=$row->Sprice?></Sprice>
   <Purl><?=$row->prdimg_R?></Purl>
   <CateInfo><?=$row->prdcode?></CateInfo>
   <Stock>1</Stock>
</Product>
<?
}
echo "</ProdCust>";
?>