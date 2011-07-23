<?
include "../../inc/global.inc";

$sql = "select upfile,upfile2,upfile3,upfile_name,upfile2_name,upfile3_name from wiz_bbs where code = '$code' and idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);

if($no == ""){
	$file = "../../bbs/upfile/$code/$row->upfile"; $filename = $row->upfile_name;
}else if($no == "2"){
	$file = "../../bbs/upfile/$code/$row->upfile2"; $filename = $row->upfile2_name;
}else if($no == "3"){
	$file = "../../bbs/upfile/$code/$row->upfile3"; $filename = $row->upfile3_name;
}

if(file_exists($file)) {
   
   if( strstr($HTTP_USER_AGENT,"MSIE 5.5")){ 
       header("Content-Type: doesn/matter"); 
       header("Content-Disposition: filename=$filename"); 
       header("Content-Transfer-Encoding: binary"); 
       header("Pragma: no-cache"); 
       header("Expires: 0"); 
   }else{ 
       Header("Content-type: file/unknown"); 
       Header("Content-Disposition: attachment; filename=$filename"); 
       Header("Content-Description: PHP3 Generated Data"); 
       header("Pragma: no-cache"); 
       header("Expires: 0"); 
   }
   
   if(is_file("$file")){ 
       $fp = fopen("$file","r"); 
       if(!fpassthru($fp)) {
           fclose($fp);
       }
   }
 
}else{
   echo "<script>alert('첨부파일이 존재하지 않습니다.');history.go(-1);</script>";
}

?>