<?
/******************************************************************************
 * Wizshop library
 *
 * ������ �������� : 2005. 6. 15
 *
 * by FEEL (feel@wizshop.net)
 *
 ******************************************************************************/
 
	// ������������� ���ǻ��
	session_start();
	
	
	// ���� �޼��� ���
	function error($error_msg, $go_url=""){
		
		if($go_url == "")
			echo "<script>alert(\"$error_msg\");history.go(-1);</script>";
		else
			echo "<script>alert(\"$error_msg\");document.location=\"$go_url\";</script>";
	   exit;
	   
	}
	
	// �Ϸ� ���â ���
	function comalert($com_msg, $go_url=""){
		
		if($go_url == "")
			echo "<script>alert(\"$com_msg\");history.go(-1);</script>";
		else
			echo "<script>alert(\"$com_msg\");document.location=\"$go_url\";</script>";
			
	}
	
	// �Ϸ� �޼��� ���
	function complete($com_msg, $go_url=""){
	
		if($go_url == "")
			echo "<script>window.setTimeout(\"history.go(-1)\",600);</script>";
		else
			echo "<script>window.setTimeout(\"document.location='$go_url';\",600);</script>";
		
		echo "<body><table width=100% height=100%><tr><td align=center><font size=2>$com_msg</font></td></tr></table></body>";
	
	}
	
	/******************************************************************************
 	* ���ӻ�Ȳ �� �̵���� �ľ�
 	*****************************************************************************/
	$con_path = $DOCUMENT_ROOT."/connect/".$_SERVER['REMOTE_ADDR'];
	exec("touch $con_path");




	/******************************************************************************
 	* ������������� DB����
 	*****************************************************************************/
	include "$DOCUMENT_ROOT/dbcon.php";
	$connect = @mysql_connect($db_host, $db_user, $db_pass) or error("DB ���ӽ� ������ �߻��߽��ϴ�.");
	@mysql_select_db($db_name, $connect) or error("DB Select ������ �߻��߽��ϴ�");
	
?>