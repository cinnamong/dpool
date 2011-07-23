<?

$upfile_path = "../../bbs/upfile/".$code;		// 업로드파일 위치
$upfile_idx = date('Ymdhis').rand(1,9);		// 업로드파일명
$thumbS_width = 120; $thumbS_height = 120;	// 스몰섬네일 크기
$thumbM_width = 600; $thumbM_height = 600;	// 중간섬네일 크기

if(!is_dir($upfile_path)){							// 업로드 디렉토리 생성
	echo exec("mkdir $upfile_path");
	exec("chmod 707 $upfile_path");
}

if($upfile_size > 0){
	
	$upfile_tmp = $upfile_idx.".".substr($upfile_name,-3);
	exec("cp $upfile $upfile_path/$upfile_tmp");
	exec("chmod 606 $upfile_path/$upfile_tmp");
	if($row->upfile != "") exec("rm -f $upfile_path/*$row->upfile");
	$upfile_sql = " , upfile='$upfile_tmp', upfile_name='$upfile_name' ";
	
	// 썸네일 만들기
	if(isImgtype($upfile_path."/".$upfile_tmp)){
		$srcimg = $upfile_tmp;
		$dstimg = "thumbS_".$upfile_tmp;
		bbsimg_resize($srcimg, $dstimg, $upfile_path, $thumbS_width, $thumbS_height);
	
		$dstimg = "thumbM_".$upfile_tmp;
		bbsimg_resize($srcimg, $dstimg, $upfile_path, $thumbM_width, $thumbM_height);
	}
	
}

if($upfile2_size > 0){
	
	$upfile2_tmp = $upfile_idx."_2.".substr($upfile2_name,-3);
	exec("cp $upfile2 $upfile_path/$upfile2_tmp");
	exec("chmod 606 $upfile_path/$upfile2_tmp");
	if($row->upfile2 != "") exec("rm -f $upfile_path/*$row->upfile2");
	$upfile2_sql = ", upfile='$upfile2_tmp', upfile_name='$upfile2_name'";
	
	if(isImgtype($upfile_path."/".$upfile2_tmp)){
		$srcimg = $upfile2_tmp;
		$dstimg = "thumbM_".$upfile_tmp;
		bbsimg_resize($srcimg, $dstimg, $upfile_path, $thumbM_width, $thumbM_height);
	}
	
}

if($upfile3_size > 0){
	
	$upfile3_tmp = $upfile_idx."_3.".substr($upfile3_name,-3);
	exec("cp $upfile3 $upfile_path/$upfile3_tmp");
	exec("chmod 606 $upfile_path/$upfile3_tmp");
	if($row->upfile3 != "") exec("rm -f $upfile_path/*$row->upfile3");
	$upfile3_sql = ", upfile='$upfile3_tmp', upfile_name='$upfile3_name'";
	
	if(isImgtype($upfile_path."/".$upfile3_tmp)){
		$srcimg = $upfile3_tmp;
		$dstimg = "thumbM_".$upfile_tmp;
		bbsimg_resize($srcimg, $dstimg, $upfile_path, $thumbM_width, $thumbM_height);
	}
	
}

?>