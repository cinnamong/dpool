<?

	$imgpath = "../../prdimg";		// 이미지 위치
	
	// 상품이미지 자동저장
   if($realimg_size > 0){
		
		$realimg_ext = strtolower(substr($realimg_name,-3));
		$realimg_name = $prdcode."_tmp";
   	exec("cp $realimg ../../prdimg/$realimg_name");
   	
   	$prdimg_R_name = $prdcode."_R.".$realimg_ext;
   	$prdimg_L1_name = $prdcode."_L1.".$realimg_ext;
   	$prdimg_M1_name = $prdcode."_M1.".$realimg_ext;
   	$prdimg_S1_name = $prdcode."_S1.".$realimg_ext;
   	
   	prdimg_resize($realimg_name, $prdimg_R_name, $imgpath, $oper_info->prdimg_R, $oper_info->prdimg_R);
   	prdimg_resize($realimg_name, $prdimg_L1_name, $imgpath, $oper_info->prdimg_L, $oper_info->prdimg_L);
   	prdimg_resize($realimg_name, $prdimg_M1_name, $imgpath, $oper_info->prdimg_M, $oper_info->prdimg_M);
   	prdimg_resize($realimg_name, $prdimg_S1_name, $imgpath, $oper_info->prdimg_S, $oper_info->prdimg_S);
   	
		exec("rm -f $imgpath/$realimg_name");

	}
	if($realimg2_size > 0){
		
		$realimg2_ext = strtolower(substr($realimg2_name,-3));
		$realimg2_name = $prdcode."_tmp";
   	exec("cp $realimg2 $imgpath/$realimg2_name");
   	
   	$prdimg_L2_name = $prdcode."_L2.".$realimg2_ext;
   	$prdimg_M2_name = $prdcode."_M2.".$realimg2_ext;
   	$prdimg_S2_name = $prdcode."_S2.".$realimg2_ext;
   	
   	prdimg_resize($realimg2_name, $prdimg_L2_name, $imgpath, $oper_info->prdimg_L, $oper_info->prdimg_L);
   	prdimg_resize($realimg2_name, $prdimg_M2_name, $imgpath, $oper_info->prdimg_M, $oper_info->prdimg_M);
   	prdimg_resize($realimg2_name, $prdimg_S2_name, $imgpath, $oper_info->prdimg_S, $oper_info->prdimg_S);
   	
		exec("rm -f $imgpath/$realimg2_name");

	}
	if($realimg3_size > 0){
		
		$realimg3_ext = strtolower(substr($realimg3_name,-3));
		$realimg3_name = $prdcode."_tmp";
   	exec("cp $realimg3 $imgpath/$realimg3_name");
   	
   	$prdimg_L3_name = $prdcode."_L3.".$realimg3_ext;
   	$prdimg_M3_name = $prdcode."_M3.".$realimg3_ext;
   	$prdimg_S3_name = $prdcode."_S3.".$realimg3_ext;
   	
   	prdimg_resize($realimg3_name, $prdimg_L3_name, $imgpath, $oper_info->prdimg_L, $oper_info->prdimg_L);
   	prdimg_resize($realimg3_name, $prdimg_M3_name, $imgpath, $oper_info->prdimg_M, $oper_info->prdimg_M);
   	prdimg_resize($realimg3_name, $prdimg_S3_name, $imgpath, $oper_info->prdimg_S, $oper_info->prdimg_S);
   	
		exec("rm -f $imgpath/$realimg3_name");

	}
	if($realimg4_size > 0){
		
		$realimg4_ext = strtolower(substr($realimg4_name,-3));
		$realimg4_name = $prdcode."_tmp";
   	exec("cp $realimg4 $imgpath/$realimg4_name");
   	
   	$prdimg_L4_name = $prdcode."_L4.".$realimg4_ext;
   	$prdimg_M4_name = $prdcode."_M4.".$realimg4_ext;
   	$prdimg_S4_name = $prdcode."_S4.".$realimg4_ext;
   	
   	prdimg_resize($realimg4_name, $prdimg_L4_name, $imgpath, $oper_info->prdimg_L, $oper_info->prdimg_L);
   	prdimg_resize($realimg4_name, $prdimg_M4_name, $imgpath, $oper_info->prdimg_M, $oper_info->prdimg_M);
   	prdimg_resize($realimg4_name, $prdimg_S4_name, $imgpath, $oper_info->prdimg_S, $oper_info->prdimg_S);
   	
		exec("rm -f $imgpath/$realimg4_name");

	}

   // 상품이미지 개별저장
   if($realimg_size <= 0){
   
	   if($prdimg_R_size > 0){
	       $prdimg_R_ext = strtolower(substr($prdimg_R_name,-3));
	       $prdimg_R_name = $prdcode."_R.".$prdimg_R_ext;
		    exec("cp $prdimg_R $imgpath/$prdimg_R_name");
		    exec("chmod 606 $imgpath/$prdimg_R_name");
	   }
	   
	   if($prdimg_L1_size > 0){
	       $prdimg_L1_ext = strtolower(substr($prdimg_L1_name,-3));
	       $prdimg_L1_name = $prdcode."_L1.".$prdimg_L1_ext;
		    exec("cp $prdimg_L1 $imgpath/$prdimg_L1_name");
		    exec("chmod 606 $imgpath/$prdimg_L1_name");
	   }
	   if($prdimg_M1_size > 0){
	      $prdimg_M1_ext = strtolower(substr($prdimg_M1_name,-3));
	      $prdimg_M1_name = $prdcode."_M1.".$prdimg_M1_ext;
		   exec("cp $prdimg_M1 $imgpath/$prdimg_M1_name");
		   exec("chmod 606 $imgpath/$prdimg_M1_name");
	   }
	   if($prdimg_S1_size > 0){
	      $prdimg_S1_ext = strtolower(substr($prdimg_S1_name,-3));
	      $prdimg_S1_name = $prdcode."_S1.".$prdimg_S1_ext;
		   exec("cp $prdimg_S1 $imgpath/$prdimg_S1_name");
		   exec("chmod 606 $imgpath/$prdimg_S1_name");
	   }
	   
	}
	
	
	if($realimg2_size <= 0){
		
	   if($prdimg_L2_size > 0){
	       $prdimg_L2_ext = strtolower(substr($prdimg_L2_name,-3));
	       $prdimg_L2_name = $prdcode."_L2.".$prdimg_L2_ext;
		    exec("cp $prdimg_L2 $imgpath/$prdimg_L2_name");
		    exec("chmod 606 $imgpath/$prdimg_L2_name");
	   }
	   if($prdimg_M2_size > 0){
	      $prdimg_M2_ext = strtolower(substr($prdimg_M2_name,-3));
	      $prdimg_M2_name = $prdcode."_M2.".$prdimg_M2_ext;
		   exec("cp $prdimg_M2 $imgpath/$prdimg_M2_name");
		   exec("chmod 606 $imgpath/$prdimg_M2_name");
	   }
	   if($prdimg_S2_size > 0){
	      $prdimg_S2_ext = strtolower(substr($prdimg_S2_name,-3));
	      $prdimg_S2_name = $prdcode."_S2.".$prdimg_S2_ext;
		   exec("cp $prdimg_S2 $imgpath/$prdimg_S2_name");
		   exec("chmod 606 $imgpath/$prdimg_S2_name");
	   }
	}
	
	if($realimg3_size <= 0){
		
	   if($prdimg_L3_size > 0){
	       $prdimg_L3_ext = strtolower(substr($prdimg_L3_name,-3));
	       $prdimg_L3_name = $prdcode."_L3.".$prdimg_L3_ext;
		    exec("cp $prdimg_L3 $imgpath/$prdimg_L3_name");
		    exec("chmod 606 $imgpath/$prdimg_L3_name");
	   }
	   if($prdimg_M3_size > 0){
	      $prdimg_M3_ext = strtolower(substr($prdimg_M3_name,-3));
	      $prdimg_M3_name = $prdcode."_M3.".$prdimg_M3_ext;
		   exec("cp $prdimg_M3 $imgpath/$prdimg_M3_name");
		   exec("chmod 606 $imgpath/$prdimg_M3_name");
	   }
	   if($prdimg_S3_size > 0){
	      $prdimg_S3_ext = strtolower(substr($prdimg_S3_name,-3));
	      $prdimg_S3_name = $prdcode."_S3.".$prdimg_S3_ext;
		   exec("cp $prdimg_S3 $imgpath/$prdimg_S3_name");
		   exec("chmod 606 $imgpath/$prdimg_S3_name");
	   }
	
	}

   if($realimg4_size <= 0){
   	
	   if($prdimg_L4_size > 0){
	       $prdimg_L4_ext = strtolower(substr($prdimg_L4_name,-3));
	       $prdimg_L4_name = $prdcode."_L4.".$prdimg_L4_ext;
		    exec("cp $prdimg_L4 $imgpath/$prdimg_L4_name");
		    exec("chmod 606 $imgpath/$prdimg_L4_name");
	   }
	   if($prdimg_M4_size > 0){
	      $prdimg_M4_ext = strtolower(substr($prdimg_M4_name,-3));
	      $prdimg_M4_name = $prdcode."_M4.".$prdimg_M4_ext;
		   exec("cp $prdimg_M4 $imgpath/$prdimg_M4_name");
		   exec("chmod 606 $imgpath/$prdimg_M4_name");
	   }
	   if($prdimg_S4_size > 0){
	      $prdimg_S4_ext = strtolower(substr($prdimg_S4_name,-3));
	      $prdimg_S4_name = $prdcode."_S4.".$prdimg_S4_ext;
		   exec("cp $prdimg_S4 $imgpath/$prdimg_S4_name");
		   exec("chmod 606 $imgpath/$prdimg_S4_name");
	   }
	
	}
	
?>