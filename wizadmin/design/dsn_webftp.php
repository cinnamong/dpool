<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// 상위로 접근차단
if(empty($file_path) || $file_path == "../../images" || substr($file_path, 0,1) == "/" || strpos($file_path, "../", 6) > 0){
   $file_path = "../../images";
   $par_path = "../../images";
}else{

	$path_list = explode( "/", $file_path);
	for($ii = 0; $ii < count($path_list)-1; $ii++){
		$par_path .= $path_list[$ii]."/";
	}
	$par_path = substr($par_path,0,strlen($par_path)-1);
	
}

           
?>
<script language="JavaScript" type="text/javascript">
<!--
function displayLay(getno){
	if(document.all.displayer.length==null) document.all.displayer.style.display='block';
	else document.all.displayer[getno].style.display='block';
}

function disableLay(getno){

	if(document.all.displayer.length==null) document.all.displayer.style.display='none';
	else document.all.displayer[getno].style.display='none';				
}

function confirmDelete(file_name){
   
   if(confirm('폴더인경우 하위파일까지 모두 삭제됩니다.\n\n선택한 파일을 정말 삭제하시겠습니까?')){
      document.location = "dsn_webftp_save.php?mode=delete&page=<?=$page?>&file_path=<?=$file_path?>&file_name=" + file_name;
   }
}

function insertFiledir(){
   var url = "dsn_webftp_input.php?mode=insert&file_path=<?=$file_path?>&page=<?=$page?>";
   window.open(url, "insertFiledir", "height=210, width=450, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=100");
}

//체크박스선택 반전
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty();
	}
}

//체크박스 전체선택
function selectAll(){
	
	var i; 	
	
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

//체크박스 선택해제
function selectEmpty(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//선택파일 삭제
function fileDelete(){

	var i;
	var selfile = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selfile = selfile + document.forms[i].filename.value + "|";
				}
			}
	}

	if(selfile == ""){
		alert("삭제할 파일을 선택하지 않았습니다.");
		return;
	}else{
		if(confirm("선택한 파일을 정말 삭제하시겠습니까?\n\n폴더인경우 하위파일까지 모두 삭제됩니다.")){
			document.location = "dsn_webftp_save.php?mode=delete&page=<?=$page?>&file_path=<?=$file_path?>&selfile=" + selfile;
		}else{
			return;
		}
	}
	return;
	
}

// 선택파일 수정
function fileEdit(){

	var i;
	var selfile = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].filename != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selfile = selfile + document.forms[i].filename.value + "|";
				}
			}
	}

	if(selfile == ""){
		alert("수정할 파일을 선택하지 않았습니다.");
		return;
	}else{
		var url = "dsn_webftp_input.php?mode=update&page=<?=$page?>&file_path=<?=$file_path?>&selfile=" + selfile;
   	window.open(url, "fileEdit", "height=300, width=450, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, left=150, top=100");
	}
	return;
	
}
//-->
</script>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                          
                                          
                                          <?
                                          $nowposi = "디자인관리 &gt; <strong>WEB-FTP </strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form action='<?=$PHP_SELF?>'>
                                          <input type="hidden" name="file_path" value="<?=$file_path?>">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                                <td width="70">&nbsp; <font color="2369C9"><b>검 색</b></font></td>
                                                <td width="2"></td>
                                                <td>파일명 : <input type="text" name="file_search" class="form1"></td>
                                                <td><input type="submit" value="확인" class="xbtn"></td>
                                              </tr>
                                              </table>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="35"><img src="../image/mark_arrowR.gif" width="12" height="12" > 
                                                <strong>위치 : http://<? echo $HTTP_HOST."/".str_replace("../../", "", $file_path); ?></strong>
                                              </td>
                                              <td align="right">
                                              <input name="Button3" type="button" class="t" value="파일/디렉토리추가" onclick="insertFiledir();">
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="5%" height="30" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="5%" height="30" bgcolor="E9E7E7" align="center">번호</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">파일형식</td>
                                              <td width="60%" bgcolor="E9E7E7">파일명</td>
                                              <td width="20%" bgcolor="E9E7E7" align="center">파일사이즈</td>
                                            </tr>
                                            <tr><td colspan="7" bgcolor="DEDEDE"></td></tr>
                                          <?
                                          $start_Y = 289;
                                          
                                          if($file_path != "../../images"){
                                          	$start_Y += 26;
                                          ?>
                                            <tr>
                                              <td align="center" height="26"><input type="checkbox"></td>
                                              <td align="center">..</td>
                                              <td align="center"><img src="../image/icon_dir.gif"></td>
                                              <td><a href='<?=$PHP_SELF?>?file_path=<?=$par_path?>'><img src="http://iconclub.hihome.com/data/lr/arrow_up.gif" border="0"><font color="red"><b>상위로</b></font></a></td>
                                              <td align="center">..</td>
                                            </tr>
                                          <?
                                       	}
                                       	?>
                                          </form>
                                          </table>
                                          <?
                                          if($file_search != "")
                                          	exec("ls ".$file_path."/".$file_search."*", $file_array, $return_val);
                                          else
                                          	exec("ls -X $file_path", $file_array, $return_val);

							                     $posi = 0;
							                     $no = 0;
							                     $total = count($file_array);
							                     $rows = 20;
							       	            $lists = 5;
							       	            
														$page_count = ceil($total/$rows);
														if($page < 1 || $page > $page_count) $page = 1;
														$start = ($page-1)*$rows;
														$num = $total-$start;
														
														while( $no < $total && $rows){
														   
														   if($no >= $start){
														      
								                        $file_name = str_replace($file_path."/","",$file_array[$no]);
								                        
								                        if(is_file("$file_path/$file_name")){
								                           $file_size = round(filesize("$file_path/$file_name")/1024, 2)."K";
								                           $file_type = substr($file_name,-3);
								                           if($file_type == "bmp" ||
								                           	$file_type == "doc" ||
								                           	$file_type == "gif" ||
								                           	$file_type == "jpg" ||
								                           	$file_type == "ppt" ||
								                           	$file_type == "psd" ||
								                           	$file_type == "xls" ||
								                           	$file_type == "zip"
								                           	){
								                           }else{
								                           	$file_type = "etc";
								                           }
								                           	
								                        }else{
								                           $file_size = "0K";
								                           $file_type = "dir";
								                        }
								                        
								                        if(($posi%2) != 0) $bgcolor="#F3F3F3";
							                     		else $bgcolor="#ffffff";
							                        
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                          <input type="hidden" name="filename" value="<?=$file_name?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td width="5%" align="center" height="26"  <? if($file_type != "dir") echo "onmouseover=displayLay('$posi'); onmouseout=disableLay('$posi');"; ?> style="cursor:hand"><input type="checkbox" name="select_checkbox"></td>
                                              <td width="5%" align="center"><?=$num?></td>
                                              <td width="10%" align="center"><img src="../image/icon_<?=$file_type?>.gif"></td>
                                              <td width="60%">
                                              <?
                                              if($file_type != "dir")
                                              	echo "<a href='$file_path/$file_name' target='_blank' onmouseover=displayLay('$posi'); onmouseout=disableLay('$posi');>$file_name</a></td>";
                                              else
                                              	echo "<a href='$PHP_SELF?file_path=$file_path/$file_name'>$file_name</a></td>";
                                              ?>
                                              <td width="20%" align="center"><?=$file_size?></td>
                                            </tr>
                                          </form>
                                          </table>
                                          <div style="display:none;position:absolute;top:<?=(26*$posi + $start_Y)?>;left:470;" id="displayer">
								                    <img src="<?=$file_path?>/<?=$file_name?>" align=absmiddle style="border:1px dddddd solid;"></a> 
								                  </div>
                                          <?
                                          		$posi++;
							                           $rows--;
							                           $num--;
							                        }
							                  		$no++;
							                     }
								                  ?>

                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="200"><input type="button" value=" 수정 " onClick="fileEdit();" class="t">&nbsp;<input type="button" value=" 삭제 " onClick="fileDelete();" class="t"></td>
                                              <td width="500"><? print_pagelist($page, $lists, $page_count, "&file_path=$file_path&file_search=$file_search"); ?></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="../image/bg_shadowb.gif" width="100%" height="2"></td>
                          </tr>
                        </table>

<? include "../inc/footer.inc"; ?>