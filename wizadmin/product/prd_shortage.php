<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&searchopt=$searchopt&searchkey=$searchkey&stock_opt=$stock_opt";
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
			document.location = "prd_save.php?mode=delete&<?=$param?>&selected=" + selected;
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

function editOption(prdcode){

	var url = "option_edit.php?prdcode=" + prdcode;
	window.open(url,"editOption","height=300, width=300, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no");

}
//-->
</script>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><img src="../image/bg_shadowtop.gif" width="100%" height="3"></td>
                          </tr>
                        </table>
                        <table width="100%" height="87%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td align="center" valign="top" background="../image/bg_shadowm.gif">
                              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td align="center" bgcolor="E4E4E4">
                                    <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr> 
                                        <td align="center" valign="top" bgcolor="#FFFFFF">
                                         
                                         
                                          <?
                                          $nowposi = "��ǰ���� &gt; <strong>������</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>����� </strong></td>
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
						                           $sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1";
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
						                              $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%'";
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
						                              $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%'";
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
			                                    <option value="">:: ���� ::
			                                    <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
			                                    <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
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
                                              <td width="70">&nbsp; <font color="2369C9"><b>������</b></font></td>
                                              <td width="2"></td>
                                              <td>
                                                <input type="radio" name="stock_opt" value="all" onclick="this.form.submit();" <? if($stock_opt=="all" || $stock_opt=="") echo "checked"; ?>>��ü 
                                                <input type="radio" name="stock_opt" value="shortage" onclick="this.form.submit();" <? if($stock_opt=="shortage") echo "checked"; ?>>ǰ�� 
                                                <input type="radio" name="stock_opt" value="lack" onclick="this.form.submit();" <? if($stock_opt=="lack") echo "checked"; ?>>���� 
                                                <input type="radio" name="stock_opt" value="reserve" onclick="this.form.submit();" <? if($stock_opt=="reserve") echo "checked"; ?>>���� 
                                                <input type="radio" name="stock_opt" value="showset" onclick="this.form.submit();" <? if($stock_opt=="showset") echo "checked"; ?>>�������� 
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
								                     
								                     //if($stock_opt == "shortage") $stock_sql = "wp.shortage = 'Y' and ";
								                     //if($stock_opt == "lack") $stock_sql = "wp.stock <= wp.savestock and ";
								                     //if($stock_opt == "reserve") $stock_sql = "wp.stock > wp.savestock and ";
								                     //if($stock_opt == "showset") $stock_sql = "wp.showset = 'N' and ";
								                     
								                     if($stock_opt == "shortage") $stock_sql = "wp.optcode like '%^ǰ��^%' and ";
								                     if($stock_opt == "lack") $stock_sql = "wp.optcode like '%^1^%' and ";
								                     if($stock_opt == "reserve") $stock_sql = "wp.optcode not like '%^ǰ��^%' and ";
								                     if($stock_opt == "showset") $stock_sql = "wp.showset = 'N' and ";
								                     
								                     if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
								                     
								                     $sql = "select distinct wp.prdcode, wp.optcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock, wp.savestock from wiz_product wp, wiz_cprelation wc 
								                                    where $catcode_sql $stock_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
								                                    
								                     $result = mysql_query($sql) or error(mysql_error());
								                     $total = mysql_num_rows($result);
								
								       	            $rows = 20;
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
                                              <td align="right"></td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                              <td width="70" height="30" bgcolor="E9E7E7" align="center">��ǰ�ڵ�</td>
                                              <td width="50" bgcolor="E9E7E7" align="center"></td>
                                              <td width="245" bgcolor="E9E7E7" align="center">��ǰ��</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">�ǸŰ�</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">����</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">���</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">�������</td>
                                              <td width="80" bgcolor="E9E7E7" align="center">���</td>
                                            </tr>
                                            <tr><td colspan="8" bgcolor="DEDEDE"></td></tr>
                                          <?
														while(($row = mysql_fetch_object($result)) && $rows){
															
															if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
															else $row->prdimg_R = "/prdimg/$row->prdimg_R";
															
															if($no%2 == 0) $bgcolor="#F3F3F3";
															else $bgcolor="#FFFFFF";
															$reserve = $row->stock - $row->savestock;
															
															// �ɼǺ� ��������ǰ
															$short_list = "";
															$opt_list = explode("^^",$row->optcode);
															for($ii=0; $ii < count($opt_list)-1; $ii++){
																$opt_list2 = explode("^",$opt_list[$ii]);
																if($opt_list2[2] <= 1) $short_list .= "<font color='red'>".$opt_list2[0]." - ".$opt_list2[2]."��</font><br>";
																else $short_list .= "<font color='blue'>".$opt_list2[0]." - ".$opt_list2[2]."��</font><br>";
															}
															
														?>
														  <form action="prd_save.php?<?=$param?>" method="post">
														  <input type="hidden" name="mode" value="stock">
														  <input type="hidden" name="page" value="<?=$page?>">
														  <input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
													     <tr bgcolor="<?=$bgcolor?>"> 
                                              <td width="70" height="52" align="center"><?=$row->prdcode?></td>
                                              <td width="50"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&shortpage=Y&<?=$param?>&page=<?=$page?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
                                              <td width="245" align="center"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&shortpage=Y&<?=$param?>&page=<?=$page?>"><?=$row->prdname?></a><br><?=$short_list?></td>
                                              <td width="80" align="center"><?=number_format($row->sellprice)?>��</td>
                                              <td width="80" align="center"><?=$reserve?></td>
                                              <td width="75" align="center"><input type="text" size="6" name="stock" value="<?=$row->stock?>" <? if($row->stock > 0) echo "class='formB'"; else echo "class='formR'"; ?>></td>
                                              <td width="75" align="center"><input type="text" size="6" name="savestock" value="<?=$row->savestock?>" class="form1"></td>
                                              <td width="90" align="center"><input type="submit" class="xbtn" value="����"> <input type="button" class="xbtn" value="�ɼ�" onClick="editOption('<?=$row->prdcode?>');"></td>
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
                                          
                                          <? print_pagelist($page, $lists, $page_count, "&$param"); ?>

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