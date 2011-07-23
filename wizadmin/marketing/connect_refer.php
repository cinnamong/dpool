<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<script language="javascript">
<!--
function openParameter(){
	var url = "connect_param.php";
	window.open(url,"orderList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
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
                                          $nowposi = "마케팅관리 &gt; <strong>접속경로분석</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>접속리스트 </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                          <form name="frm" action="<?=$PHP_SELF?>" method="get">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>분석방법</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <input type="radio" name="analy_type" value="RA" onClick="this.form.search_engin.value='';this.form.submit();" <? if($analy_type == "RA" || $analy_type == "") echo "checked"; ?>>접속경로
                                              <input type="radio" name="analy_type" value="RB" onClick="this.form.search_engin.value='';this.form.submit();" <? if($analy_type == "RB") echo "checked"; ?>>검색엔진,링크사이트
                                              <input type="radio" name="analy_type" value="RC" onClick="this.form.search_engin.value='';this.form.submit();" <? if($analy_type == "RC") echo "checked"; ?>>검색키워드
                                              <a href="javascript:openParameter();"><font color="red">[검색파라메터설정]</font></a>
                                              </td>
                                              </tr>
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>검색엔진</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <select name="search_engin">
                                                <option value="">:: 검색엔진 선택 ::
                                                <option value="yahoo" <? if($search_engin == "yahoo") echo "selected"; ?>>Yahoo
                                                <option value="naver" <? if($search_engin == "naver") echo "selected"; ?>>Naver
                                                <option value="empas" <? if($search_engin == "empas") echo "selected"; ?>>Empas
                                                <option value="daum" <? if($search_engin == "daum") echo "selected"; ?>>Daum
                                                <option value="msn" <? if($search_engin == "msn") echo "selected"; ?>>Msn
                                                <option value="google" <? if($search_engin == "google") echo "selected"; ?>>Google
                                                <option value="nate" <? if($search_engin == "nate") echo "selected"; ?>>Nate
                                                <option value="korea" <? if($search_engin == "korea") echo "selected"; ?>>Korea.com
                                                <option value="dreamwiz" <? if($search_engin == "dreamwiz") echo "selected"; ?>>DreamWiz
                                                <option value="netian" <? if($search_engin == "netian") echo "selected"; ?>>Netian
                                                </select>
                                                <input type="submit" value="검색" class="t">
                                              </td>
                                              </tr>
                                              </table>
                                              </td>
                                            </tr>
                                          </form>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td></td></tr>
                                          </table> 
                                          <?

                                          if(!empty($prev_year)){
							                        $prev_period = $prev_year."".$prev_month."".$prev_day."00";
							                        $next_period = $next_year."".$next_month."".$next_day."24";
							                        $period_sql = " where time >= '$prev_period' and time <= '$next_period' ";
							                     }
							                     
														// 접속시간별
														if($analy_type == "RA" || $analy_type == ""){
															
															$sql = "select sum(cnt) as total_cnt from wiz_conrefer";
                                          	$result = mysql_query($sql) or error(mysql_error());
                                          	$row = mysql_fetch_object($result);
                                          	$total_cnt = $row->total_cnt;
                                          
															echo "<table width='97%' border='0' cellspacing='0' cellpadding='0'>\n";
	                                          echo "  <tr align='center' bgcolor='E9E7E7'> \n";
	                                          echo "    <td width='7%'>번호</td>";
	                                          echo "    <td width='73%'height='30'>방문경로</td>\n";
	                                          echo "    <td width='10%'>접속자수</td>\n";
	                                          echo "    <td width='10%'>비율</td>\n";
	                                          echo "  </tr>\n";
	                                          echo "  <tr><td bgcolor='DEDEDE' colspan='5'></td></tr>\n";
	
								                     $sql = "select * from wiz_conrefer where host like '%$search_engin%' order by cnt desc";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     
								                     $lists = 5;
								                     $rows = 20;
								                     if(empty($page)) $page = 1;
								                     $total = mysql_num_rows($result);
								                     $page_count = ceil($total/$rows);
								                     $start = ($page-1)*$rows;
								                     $no = $total-$start;
								                     
								                     if($start>1) mysql_data_seek($result,$start);
								                   	
								                     while(($row = mysql_fetch_object($result)) && $rows){
								                     	if(($no%2) == 0) $bgcolor="#ffffff";
								                     	else $bgcolor="#F3F3F3";
								                     	
								                     	$percent = ceil(($row->cnt/$total_cnt)*100);
																
																if(empty($row->referer)) $row->referer = "즐겨찾기나 직접방문";
																
	                                             echo "<tr bgcolor='".$bgcolor."'> \n";
	                                             echo "  <td align='center'>$no</td>";
	                                             echo "  <td height='30'><a href='$row->referer' target='_blank'>$row->referer</a></td>\n";
	                                             echo "  <td align='center'>".$row->cnt."</td>\n";
	                                             echo "  <td align='center'>".$percent."%</td>\n";
	                                             echo "</tr>\n";
	                                            
	                                       		$no--;
								                        $rows--;
								                    }
								                    echo "</table>\n";
								                    
								                  }else if($analy_type == "RB"){
								                  	
								                  	$sql = "select sum(cnt) as total_cnt from wiz_conrefer where referer <> ''";
                                          	$result = mysql_query($sql) or error(mysql_error());
                                          	$row = mysql_fetch_object($result);
                                          	$total_cnt = $row->total_cnt;
                                          	
								                  	echo "<table width='97%' border='0' cellspacing='0' cellpadding='0'>\n";
	                                          echo "  <tr align='center' bgcolor='E9E7E7'> \n";
	                                          echo "    <td width='7%'>번호</td>";
	                                          echo "    <td width='43%'height='30'>검색엔진</td>\n";
	                                          echo "    <td width='10%'>접속자수</td>\n";
	                                          echo "    <td width='10%'>비율</td>\n";
	                                          echo "    <td width='30%'>그래프</td>\n";
	                                          echo "  </tr>\n";
	                                          echo "  <tr><td bgcolor='DEDEDE' colspan='5'></td></tr>\n";
	
								                     $sql = "select sum(cnt) as cnt, host from wiz_conrefer where host <> '' and host like '%$search_engin%' group by host order by cnt desc";
								                     $result = mysql_query($sql) or error(mysql_error());
								                     
								                     $lists = 5;
								                     $rows = 20;
								                     $total = mysql_num_rows($result);
								                     $page_count = ceil($total/$rows);
								                     if(!$page || $page > $page_count) $page = 1;
								                     $start = ($page-1)*$rows;
								                     $no = $total-$start;
								                     
								                     if($start>1) mysql_data_seek($result,$start);
								                   	
								                   	while(($row = mysql_fetch_object($result)) && $rows){
								                   	
								                     	if(($no%2) == 0) $bgcolor="#ffffff";
								                     	else $bgcolor="#F3F3F3";
								                     	
								                     	$percent = ceil(($row->cnt/$total_cnt)*100);

	                                             echo "<tr bgcolor='".$bgcolor."'> \n";
	                                             echo "  <td align='center'>$no</td>";
	                                             echo "  <td height='30'><a href='http://$row->host' target='_blank'>$row->host</a></td>\n";
	                                             echo "  <td align='center'>$row->cnt</td>\n";
	                                             echo "  <td align='center'>".$percent."%</td>\n";
	                                             echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
	                                             echo "</tr>\n";
	                                            
	                                       		$no--;
								                        $rows--;
								                    }
								                    echo "</table>\n";
								                  	
								                  }else if($analy_type == "RC"){
								                  	
															// 분석할 파라메터 가져오기
                                           	$sql = "select con_parameter from wiz_operinfo";
                                           	$result = mysql_query($sql) or error(mysql_error());
                                       		$row = mysql_fetch_object($result);
                                       		$parameter = explode(",",$row->con_parameter);
                                       		
								                  	$sql = "select sum(cnt) as total_cnt from wiz_conrefer where referer <> ''";
                                          	$result = mysql_query($sql) or error(mysql_error());
                                          	$row = mysql_fetch_object($result);
                                          	$total_cnt = $row->total_cnt;
                                          	
								                  	echo "<table width='97%' border='0' cellspacing='0' cellpadding='0'>\n";
	                                          echo "  <tr align='center' bgcolor='E9E7E7'> \n";
	                                          echo "    <td width='7%'>번호</td>";
	                                          echo "    <td width='53%'height='30'>키워드</td>\n";
	                                          echo "    <td width='10%'>접속자수</td>\n";
	                                          echo "    <td width='10%'>비율</td>\n";
	                                          echo "    <td width='20%'>그래프</td>\n";
	                                          echo "  </tr>\n";
	                                          echo "  <tr><td bgcolor='DEDEDE' colspan='5'></td></tr>\n";
	                                          
								                  	$sql = "select * from wiz_conrefer where host like '%$search_engin%' order by cnt desc";
								                  	$result = mysql_query($sql) or error(mysql_error());
								                  	$key_list_tmp = "";
															$no = 0;
								                  	while($row = mysql_fetch_object($result)){

								                  		if($row->referer != ""){
								                  			
								                  			for($ii=0; $ii < count($parameter) && $parameter[$ii] != ""; $ii++){

									                  			$key_start = strpos($row->referer, $parameter[$ii]."=");
									                  			if($key_start > 0){
									                  				$key_start = $key_start + strlen($parameter[$ii]."=");
									                  				$key_end =  strpos($row->referer, "&", $key_start);
									                  				if($key_end <= 0) $key_end = strlen($row->referer);
									                  				
									                  				$keyword = substr($row->referer, $key_start, $key_end-$key_start);
									                  				$keyword = urldecode($keyword);
	
									                  				$key_list_tmp[$no][name] = $keyword;
									                  				$key_list_tmp[$no][cnt] = $row->cnt;
									                  				
									                  			}
								                  				
								                  				$no++;
								                  			}
								                  			
								                  		}
								                  		
								                  		
								                  	}

								                  	if(count($key_list_tmp) > 1) sort($key_list_tmp);
								                  	
								                  	$key_name_tmp = "";
								                  	$key_cnt_tmp = 0;
								                  	$no = -1;
								                  	
								                  	for($ii=0; $ii < count($key_list_tmp); $ii++){
								                  		
								                  		if($key_name_tmp != $key_list_tmp[$ii][name]){
								                  			$no++;
								                  			$key_name_tmp = $key_list_tmp[$ii][name];
								                  			$key_list[$no][cnt] = $key_list_tmp[$ii][cnt];
								                  			$key_list[$no][name] = $key_list_tmp[$ii][name];
								                  		}else{
								                  			$key_list[$no][cnt] += $key_list_tmp[$ii][cnt];
								                  		}
								                  	}
								                  	
								                  	if(count($key_list) > 0) rsort($key_list);
								                  	$no = count($key_list);
								                  	
								                  	$lists = 5;
								                     $rows = 20;
								                     if(empty($page)) $page = 1;
								                     $total = count($key_list);
								                     $page_count = ceil($total/$rows);
								                     $start = ($page-1)*$rows;
								                     $no = $total-$start;
								                     
								                     if($total_cnt > 0){
								                     	
								                  	for($ii=$start; $ii < count($key_list) && $rows > 0; $ii++){
								                  		
								                  		if(!empty($key_list[$ii][name])){
								                  			
								                  			$percent = ceil(($key_list[$ii][cnt]/$total_cnt)*100);
								                  			
								                  			if(($no%2) == 0) $bgcolor="#ffffff";
								                     		else $bgcolor="#F3F3F3";
								                     	
								                  			echo "<tr bgcolor='".$bgcolor."'> \n";
	                                             	echo "  <td align='center'>$no</td>";
	                                             	echo "  <td height='30'>".$key_list[$ii][name]."</td>\n";
	                                             	echo "  <td align='center'>".$key_list[$ii][cnt]."</td>\n";
	                                             	echo "  <td align='center'>".$percent."%</td>\n";
	                                             	echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
	                                             	echo "</tr>\n";
	                                             }
	                                             
	                                             $rows--;
	                                             $no--;
								                  	}
								                  	
								                  	}

								                  }
								               	?>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          
                                          <? print_pagelist($page, $lists, $page_count, "&analy_type=$analy_type&search_engin=$search_engin"); ?>
                                          
                                          <table width="97%" height="175" border="0" cellpadding="0" cellspacing="0">
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