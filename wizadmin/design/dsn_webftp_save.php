<? include "../../inc/global.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<?
// ������ ��������
if(empty($file_path) || substr($file_path, 0,1) == "/" || strpos($file_path, "../", 6) > 0){
   echo "<script>alert('������ �� �����ϴ�.');self.close();</script>";
   exit;
}

if($mode == "insert"){
   
   // ���Ͼ��ε�
   if($submode == "createfile"){

      $check_ext = substr($create_file_name,-3);
      $check2_ext = substr($create_file2_name,-3);
      $check3_ext = substr($create_file3_name,-3);
      $check4_ext = substr($create_file4_name,-3);
      $check5_ext = substr($create_file5_name,-3);
      
      if($create_file_size > 0 && $check_ext){
          exec("rm -f $file_path/$create_file_name");
          exec("cp $create_file $file_path/$create_file_name");
		    exec("chmod 700 $file_path/$create_file_name");
   	}
   	if($create_file2_size > 0 && $check2_ext){
          exec("rm -f $file_path/$create_file2_name");
          exec("cp $create_file2 $file_path/$create_file2_name");
		    exec("chmod 700 $file_path/$create_file2_name");
   	}
   	if($create_file3_size > 0 && $check3_ext){
          exec("rm -f $file_path/$create_file3_name");
          exec("cp $create_file3 $file_path/$create_file3_name");
		    exec("chmod 700 $file_path/$create_file3_name");
   	}
   	if($create_file4_size > 0 && $check4_ext){
          exec("rm -f $file_path/$create_file4_name");
          exec("cp $create_file4 $file_path/$create_file4_name");
		    exec("chmod 700 $file_path/$create_file_name");
   	}
   	if($create_file5_size > 0 && $check5_ext){
          exec("rm -f $file_path/$create_file5_name");
          exec("cp $create_file5 $file_path/$create_file5_name");
		    exec("chmod 700 $file_path/$create_file5_name");
   	}
   	
   	echo "<script>alert('�̹����� �߰��Ǿ����ϴ�.');self.close();opener.document.location='dsn_webftp.php?file_path=$file_path&page=$page';</script>";
   
   
   // ��������
	}else if($submode == "createdir"){
		
		if(!empty($create_dir)){
			exec("mkdir $file_path/$create_dir");
			echo "<script>alert('���丮�� �����Ǿ����ϴ�.');self.close();opener.document.location='dsn_webftp.php?file_path=$file_path&page=$page';</script>";
		}else{
			echo "<script>alert('���丮���� �Է��ϼ���');history.go(-1);</script>";
		}
		
	}



// �̹���,��������
}else if($mode == "update"){
   
	for($ii=0; $ii < count($selname); $ii++){
		
		if($_FILES[upfile][size][$ii] > 0 ){

		   move_uploaded_file($_FILES['upfile']['tmp_name'][$ii], "$file_path/$selname[$ii]");
		   
		}
	
	}
	for($ii=0; $ii < count($seldir); $ii++){
		if($upname[$ii] != "")
			exec("mv $file_path/$seldir[$ii] $file_path/$upname[$ii]");
		
	}
	
	echo "<script>alert('�����Ǿ����ϴ�.');document.location='dsn_webftp_input.php?mode=update&page=&file_path=$file_path&selfile=$selfile';</script>";


// ���ϻ���
}else if($mode == "delete"){
   
   $i=0;
	$array_selfile = explode("|",$selfile);
	while($array_selfile[$i]){
		exec("rm -rf $file_path/$array_selfile[$i]");
		$i++;
	}

   echo "<script>alert('������ ������ �����Ͽ����ϴ�.');document.location='dsn_webftp.php?page=$page&file_path=$file_path';</script>";
   
}

?>