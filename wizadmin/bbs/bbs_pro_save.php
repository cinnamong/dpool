<?
include "../../inc/global.inc";
include "../inc/admin_check.inc";

if($mode == "insert"){

	if($titleimg_size > 0){
		$ext = substr($titleimg_name,-3);
		$titleimg_name = $code."_title.".$ext;
		exec("cp $titleimg ../../bbs/upfile/$titleimg_name");
		exec("chmod 606 ../../bbs/upfile/$titleimg_name");
	}
	
	$sql = "insert into wiz_bbsinfo values('$code', '$title', '$titleimg_name', '$grp', '$lpermi', '$rpermi', '$wpermi', '$apermi', '$cpermi', 
								'$bbstype', '$skintype', '$usetype', '$privacy', '$upfile', '$comment', '$remail', '$imgview', '$abuse', '$abtxt', 
								'$rows', '$lists', '$new', '$hot')";
				
	$result = mysql_query($sql);
	
	if(mysql_errno() > 0) echo "<script>alert('�̹̻����� �Խ����Դϴ�.');history.go(-1);</script>";
	else complete("�Խ����� �߰� �Ͽ����ϴ�.","bbs_pro_input.php?mode=update&code=$code");

	
}else if($mode == "update"){
	
	if($titleimg_size > 0){
		$ext = substr($titleimg_name,-3);
		$titleimg_name = $code."_title.".$ext;
		exec("cp $titleimg ../../bbs/upfile/$titleimg_name");
		exec("chmod 606 ../../bbs/upfile/$titleimg_name");
		$titleimg_sql = "titleimg='$titleimg_name', ";
	}
	
	$sql = "update wiz_bbsinfo set title='$title', $titleimg_sql grp='$grp', lpermi='$lpermi', rpermi='$rpermi', wpermi='$wpermi', apermi='$apermi', cpermi='$cpermi', 
								bbstype='$bbstype', skintype='$skintype', usetype='$usetype', privacy='$privacy', upfile='$upfile', comment='$comment', remail='$remail', 
								abuse='$abuse',abtxt='$abtxt', rows='$rows', lists='$lists', new='$new', hot='$hot'  
								where code = '$code'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("�Խ��� ������ �����Ͽ����ϴ�.","bbs_pro_input.php?mode=update&code=$code");
	
	
}else if($mode == "delete"){
	

	$sql = "delete from wiz_bbsinfo where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�ش�Խ����� �����Ǿ����ϴ�.","bbs_pro_list.php");
	

}else if($mode == "del_titleimg"){
	
	$titleimg_name = $code."_title*";
	exec("rm -f ../../bbs/upfile/$titleimg_name");
	
	$sql = "update wiz_bbsinfo set titleimg='' where code = '$code'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("Ÿ��Ʋ �̹����� ���� �Ͽ����ϴ�.","bbs_pro_input.php?mode=update&code=$code");
	
}
?>