<?
include "../inc/global.inc";

/*******************************************************************
Pname ��ǰ��
Brand �귣��

ProdInc CosMos ��ǰ�ڵ尪
Pcode ���� ��ǰ�ڵ尪
CustID ����ID : ����������
MallID �ܱ��� ������
ItemCode �ܱ��� SKU(��ǰ�ڵ�)

Sprice �޷��ǸŰ� Sale Price
Lprice �޷����� List Price
Purl ��ǰ���
Pimg �����̹���
MDID ���ID

Depth ��з�:1,�ߺз�:2,�Һз�:3,���з�:4
Ccode1 ��з��ڵ�
Ccode2 �ߺз��ڵ�
Ccode3 �Һз��ڵ�
Ccode4 ���з��ڵ�

Story  ������ǰ����
ColorInfo  Color��(�Ʒ���������)
SizeInfo Size��(�Ʒ���������)
*********************************************************************/

$sql = "select ProdInc from wiz_product where ProdInc = '$ProdInc'";
$result = mysql_query($sql);
$total = mysql_num_rows($result);

// ����������Ʈ
if($total > 0){
   
   $sql = "update wiz_product set prdname = '$Pname', Purl='$Purl', Sprice = '$Sprice',  Lprice = '$Lprice', MallID = '$MallID', brand = '$Brand', prdimg_R = '$Purl' where prdcode = '$ProdInc'";
   $result = mysql_query($sql) or error(mysql_error());
   
// �űԵ��
}else{
   
   // ��ǰ�ѹ� �����
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
   
   // ��ǰ���� ����
   $sql = "insert into wiz_product values(   
						'$prdcode','$Pname','$prdcom','$prdnum','$ProdInc','$Purl','$MallID','$Sprice','$Lprice','$Brand','Y',10,'$savestock','$prior','$viewcnt','$deimgcnt', '$basketcnt', '$ordercnt', '$cancelcnt', '$comcnt',
						'$sellprice','$conprice','$reserve','$new','$popular','$recom','$sale','$shortage','$prefer',
						'$opttitle','$optcode','$opttitle2','$optcode2','$opttitle3','$optcode3',
						'$Pimg', '$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name','$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name',
						'$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name','$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name',
						'$searchkey','$stortexp','$Story')";
   echo $sql."<br>";
	$result = mysql_query($sql) or error(mysql_error());
	
	
	// ī�װ����� ����
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