<?php
/******************************************************************************
 * Wizshop library
 *
 * 마지막 수정일자 : 2005. 6. 15
 *
 * by FEEL (feel@wizshop.net)
 *
 ******************************************************************************/
 
	// 모든페이지에서 세션사용
	session_start();
	
	
	// 에러 메세지 출력
	function error($error_msg, $go_url=""){
		
		if($go_url == "")
			echo "<script>alert(\"$error_msg\");history.go(-1);</script>";
		else
			echo "<script>alert(\"$error_msg\");document.location=\"$go_url\";</script>";
	   exit;
	   
	}
	
	// 완료 경고창 출력
	function comalert($com_msg, $go_url=""){
		
		if($go_url == "")
			echo "<script>alert(\"$com_msg\");history.go(-1);</script>";
		else
			echo "<script>alert(\"$com_msg\");document.location=\"$go_url\";</script>";
			
	}
	
	// 완료 메세지 출력
	function complete($com_msg, $go_url=""){
	
		if($go_url == "")
			echo "<script>window.setTimeout(\"history.go(-1)\",600);</script>";
		else
			echo "<script>window.setTimeout(\"document.location='$go_url';\",600);</script>";
		
		echo "<body><table width=100% height=100%><tr><td align=center><font size=2>$com_msg</font></td></tr></table></body>";
	
	}
	
	/******************************************************************************
 	* 접속상황 및 이동경로 파악
 	*****************************************************************************/
	$con_path = $_SERVER['DOCUMENT_ROOT']."connect/".$_SERVER['REMOTE_ADDR'];
	exec("touch $con_path");




	/******************************************************************************
 	* 모든페이지에서 DB접속
 	*****************************************************************************/
	//$_SERVER['DOCUMENT_ROOT'] == 'C:/wamp/www/dmbpool/';
	include ($_SERVER['DOCUMENT_ROOT']."dbcon.php");
	$connect = @mysql_connect($db_host, $db_user, $db_pass) or error("DB 접속시 에러가 발생했습니다.");
	@mysql_select_db($db_name, $connect) or error("DB Select 에러가 발생했습니다");
	
?>