<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&showset=$showset&searchopt=$searchopt&searchkey=$searchkey";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" type="text/javascript">
<!--

//üũ�ڽ����� ����
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty(); 
	}
}

//üũ�ڽ� ��ü����
function selectAll(){
	
	var i; 	
	
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

//üũ�ڽ� ��������
function selectEmpty(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].action == "product_save.php"){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//���û�ǰ ����
function prdDelete(){

	var i;
	var selected = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selected = selected + document.forms[i].prdcode.value + "|";
				}
			}
	}

	if(selected == ""){
		alert("������ ��ǰ�� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ��ǰ�� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "prd_save.php?mode=delete&page=<?=$page?>&<?=$param?>&selected=" + selected;
		}else{
			return;
		}
	}
	return;
	
}

function catChange(form, idx){
   if(idx == "1"){
      form.dep2_code.options[0].selected = true;
      form.dep3_code.options[0].selected = true;
   }else if(idx == "2"){
      form.dep3_code.options[0].selected = true;
   }
   	form.page.value = 1;
   	form.submit();
}

// ��ǰ���� �����ٿ�
function excelDown(){
	var url = "prd_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=230, width=570, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
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
                                          $nowposi = "��ǰ���� &gt; <strong>��ǰ���</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>��ǰ��� </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="6" cellpadding="0" cellspacing="0" bordercolor="DEEAF1">
                                            <tr>
                                              <td bgcolor="ffffff">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
                                              <input type="hidden" name="page" value="<?=$page?>">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>��ǰ�з�</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="dep_code" onChange="catChange(this.form,'1');" class="select">
						                            <option value=''>:: ��з� ::
						                           <?
						                           $sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1 order by priorno01 asc";
						                           $result = mysql_query($sql) or error(mysql_error());
						                           while($row = mysql_fetch_object($result)){
						                              if($row->catcode == $dep_code)
						                                 echo "<option value='$row->catcode' selected>$row->catname";
						                              else
						                                 echo "<option value='$row->catcode'>$row->catname";
						                           }
						                           ?>
						                            </select>
                                              <select name="dep2_code" onChange="catChange(this.form,'2');" class="select">
						                            <option value=''>:: �ߺз� ::
						                           <?
						                           if($dep_code != ''){
						                              $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%' order by priorno02 asc";
						                              $result = mysql_query($sql) or error(mysql_error());
						                              while($row = mysql_fetch_object($result)){
						                                 if($row->catcode == $dep2_code)
						                                    echo "<option value='$row->catcode' selected>$row->catname";
						                                 else
						                                    echo "<option value='$row->catcode'>$row->catname";
						                              }
						                           }
						                           ?>
						                            </select>
                                              <select name="dep3_code" onChange="catChange(this.form,'3');" class="select">
						                            <option value=''>:: �Һз� ::
						                           <?
						                           if($dep_code != '' && $dep2_code != ''){
						                              $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%' order by  priorno03 asc";
						                              $result = mysql_query($sql) or error(mysql_error());
						                              while($row = mysql_fetch_object($result)){
						                                 if($row->catcode == $dep3_code)
						                                    echo "<option value='$row->catcode' selected>$row->catname";
						                                 else
						                                    echo "<option value='$row->catcode'>$row->catname";
						                              }
						                           }
						                           ?>
						                            </select>
                                              </td>
                                              <td width="10"></td>
                                              <td>
                                              <select name="searchopt" onChange="this.form.page.value=1;" style="BACKGROUND: #2369C9;width:100; COLOR: #ffffff; FONT: 9pt ����">
			                                     <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
			                                     <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
			                                     <option value="prdcom" <? if($searchopt == "prdcom") echo "selected"; ?>>������
			                                     </select>
                                              </td>
                                              <td>
                                              <input type="text" size="18" name="searchkey" value="<?=$searchkey?>" class="form1">
                                              </td>
                                              <td width="5"></td>
                                              <td>
                                              <input name="Button3" type="submit" class="xbtn" value="�˻�">
                                              </td>
                                              </table>
                                              
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <tr>
                                              <td width="70">&nbsp; <font color="2369C9"><b>�׷�</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="special" onChange="this.form.page.value=1;this.form.submit();">
					                               <option value="">:: �׷켱�� ::
					                               <option value="new" <? if($special == "new") echo "selected"; ?>>�Ż�ǰ
					                               <option value="popular" <? if($special == "popular") echo "selected"; ?>>�α��ǰ
					                               <option value="recom" <? if($special == "recom") echo "selected"; ?>>��õ��ǰ
					                               <option value="sale" <? if($special == "sale") echo "selected"; ?>>���ϻ�ǰ
					                               <option value="stock" <? if($special == "stock") echo "selected"; ?>>ǰ����ǰ
					                               </select>
                                              </td>
                                              <td width="86" align="right"><font color="2369C9"><b>��������</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                              <select name="showset" onChange="this.form.page.value=1;this.form.submit();">
					                               <option value="">:: ���� ::
					                               <option value="Y" <? if($showset == "Y") echo "selected"; ?>>������
					                               <option value="N" <? if($showset == "N") echo "selected"; ?>>��������
					                               </select>
                                              </td>
                                              </form>
                                              </table>
                                              </td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr><td height="10"></td></tr>
                                          </table> 
                                          <?
                                          	$sql = "select prdcode from wiz_product";
                                          	$result = mysql_query($sql) or error(mysql_error());
								                     $all_total = mysql_num_rows($result);
                                          	
								                     if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
								                     if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
								                     if(!empty($showset)) $showset_sql = "wp.showset = '$showset' and ";
								                     if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
								                     
								                     $sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc 
								                                    where $catcode_sql $special_sql $showset_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
													//echo $sql;
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								
								       	            $rows = 16;
								       	            $lists = 5;
															$page_count = ceil($total/$rows);
															if(!$page || $page > $page_count) $page = 1;
															$start = ($page-1)*$rows;
															$no = $total-$start;
															if($start>1) mysql_data_seek($result,$start);
								                  ?>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td>�� ��ǰ�� : <b><?=$all_total?></b> , �˻� ��ǰ�� : <b><?=$total?></b></td>
                                              <td align="right">
                                              <input type="button" class="t" value="������������" onClick="excelDown();">
                                              <input type="button" class="t" value="��ǰ���" onClick="document.location='prd_input.php?<?=$param?>'">
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr> 
                                              <td width="5%" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="10%" height="30" bgcolor="E9E7E7" align="center">��ǰ�ڵ�</td>
                                              <td width="5%" bgcolor="E9E7E7"></td>
                                              <td width="40%" bgcolor="E9E7E7" align="center">��ǰ��</td>
                                              <td width="10%" bgcolor="E9E7E7" align="right">��ǰ����</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">���</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">��������</td>
                                              <td width="10%" bgcolor="E9E7E7" align="center">���</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                          </form>
														<?
														while(($row = mysql_fetch_object($result)) && $rows){
															
															if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
															else $row->prdimg_R = "/prdimg/$row->prdimg_R";
															
															if($no%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
															
														?>
													     <form name="<?=$row->prdcode?>" action="product_save.php">
						                          <input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td align="center" height="52"><input type="checkbox" name="select_checkbox"></td>
                                              <td align="center"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdcode?></a></td>
                                              <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
                                              <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdname?></a></td>
                                              <td align="right"><?=number_format($row->sellprice)?>��</td>
                                              <td align="center"><?=$row->stock?></td>
                                              <td align="center">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td><a href="prd_save.php?mode=prior&posi=upup&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/upup_icon.gif" border="0" alt="10�ܰ� ����"></a></td>
                                                  <td width="4"></td>
                                                  <td></td>
                                                </tr>
                                                <tr><td height="4"></td></tr>
                                                <tr>
                                                  <td><a href="prd_save.php?mode=prior&posi=up&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/up_icon.gif" border="0" alt="1�ܰ� ����"></a></td>
                                                  <td width="4"></td>
                                                  <td><a href="prd_save.php?mode=prior&posi=down&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/down_icon.gif" border="0" alt="1�ܰ� �Ʒ���"></a></td>
                                                </tr>
                                                <tr><td height="4"></td></tr>
                                                <tr>
                                                  <td></td>
                                                  <td width="4"></td>
                                                  <td><a href="prd_save.php?mode=prior&posi=downdown&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/downdown_icon.gif" border="0" alt="10�ܰ� �Ʒ���"></a> </td>
                                                </tr>
                                                </table>
                                              </td>
                                              <td align="center"> 
                                                <input name="Button3" type="button" class="xbtn" value="����" onclick="document.location='prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>'">
                                                <input name="Button3" type="button" class="xbtn" value="����" onclick="this.form.select_checkbox.checked=true;prdDelete('<?=$row->prdcode?>');">
                                              </td>
                                            </tr>
                                            </form>
                                         <?
                                         		$no--;
							                        $rows--;
							                     }
							                                          
							                   	if($total <= 0){
							                   		echo "<tr><td height='30' colspan=7 align=center>��ϵ� ��ǰ�� �����ϴ�.</td></tr>";
							                   	}
								                  ?>
                                            <tr><td colspan=8 bgcolor=DEDEDE></td></tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="60"><input type="button" value="���û���" onClick="prdDelete();" class="t"></td>
                                              <td width="640"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
                                            </tr>
                                          </table>
                                          <table width="717" height="60" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                        </td>
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