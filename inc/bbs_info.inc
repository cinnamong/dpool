<?

// 게시판 정보
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$bbs_info = mysql_fetch_object($result);
if($total <= 0 || $bbs_info->usetype != "Y") error("해당게시판이 존재하지 않습니다.");

if($bbs_info->titleimg != "") $subimg = "<img src=/bbs/upfile/$bbs_info->titleimg>";


?>