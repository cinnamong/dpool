<? include "../../inc/global.inc"; ?>
<? include "../../inc/util_lib.inc"; ?>
<? include "../inc/admin_check.inc"; ?>
<? include "../inc/header.inc"; ?>
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
		if(document.forms[i].idx != null){
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
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//���û�� ����
function qnaDelete(){

	var i;
	var selconsult = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selconsult = selconsult + document.forms[i].idx.value + "|";
				}
			}
	}

	if(selconsult == ""){
		alert("������ ����� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ����� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "member_save.php?mode=condelete&selconsult=" + selconsult;
		}else{
			return;
		}
	}
	return;
	
}

function searchEstimate(searchopt,keyword){
	document.searchForm.searchopt.value = searchopt;
	document.searchForm.keyword.value = keyword;
	document.searchForm.page.value = "1";
	document.searchForm.submit();
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
                                          $nowposi = "ȸ������ &gt; <strong>1:1������</strong>";
                                          include "../inc/nowposi.inc";
                                          ?>
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"><img src="../image/mark_arrowR.gif" width="12" height="12"> <strong>1:1�����  </strong></td>
                                            </tr>
                                          </table>
                                          <table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td></td>
                                              <td align="right">
                                              <table cellspacing="2" cellpadding="0" border="0">
                                              <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
                                              <input type="hidden" name="page" value="<?=$page?>">
                                              <tr>
                                              <td>
                                              <select name="searchopt" onChange="this.form.page.value=1;" style="BACKGROUND: #2369C9;width:100; COLOR: #ffffff; FONT: 9pt ����">
			                                     <option value="">:: ���� ::
			                                     <option value="name" <? if($searchopt == "name") echo "selected"; ?>>�۾���
			                                     <option value="memid" <? if($searchopt == "memid") echo "selected"; ?>>���̵�
			                                     </select>
                                              </td>
                                              <td><input type="text" name="keyword" value="<?=$keyword?>" size="13" class="form1"></td>
                                              <td><input type="submit" class="t" value="�˻�"></td>
                                              </tr>
                                              </table>
                                              </td>
                                            </tr>
                                            <tr><td height="3"></td></tr>
                                          </table> 
                                          <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                          <form>
                                            <tr align="center"> 
                                              <td height="30" bgcolor="E9E7E7" align="center"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></td>
                                              <td width="60" height="30" bgcolor="E9E7E7">��ȣ</td>
                                              <td width="80" bgcolor="E9E7E7">ó����Ȳ</td>
                                              <td width="350" bgcolor="E9E7E7">����</td>
                                              <td width="80" bgcolor="E9E7E7">�ۼ���</td>
                                              <td width="80" bgcolor="E9E7E7">�ۼ���</td>
                                            </tr>
                                          </form>
                                          <tr><td bgcolor="DEDEDE"></td></tr>
                                          <?
                                          if(!empty($searchopt)) $search_sql = " where $searchopt like '%$keyword%' ";
                                          
                                          $sql = "select * from wiz_consult $search_sql order by idx desc";
							                     $result = mysql_query($sql) or error(mysql_error());
							                     $total = mysql_num_rows($result);
							                     
							                     $rows = 12;
							                     $lists = 5;
							                     $page_count = ceil($total/$rows);
							                     if(!$page || $page > $page_count) $page = 1;
							                     $start = ($page-1)*$rows;
							                     $no = $total-$start;
							                     if($start>1) mysql_data_seek($result,$start);
							                   	
							                     while(($row = mysql_fetch_object($result)) && $rows){
							                     	if(($no%2) == 0) $bgcolor="#ffffff";
							                     	else $bgcolor="#F3F3F3";
                                          ?>
                                          
                                          <form>
                                          <input type="hidden" name="idx" value="<?=$row->idx?>">
                                            <tr bgcolor="<?=$bgcolor?>"> 
                                              <td align="center" height="30"><input type="checkbox" name="select_checkbox"></td>
                                              <td align="center" align="center"><?=$no?></td>
                                              <td align="center"><? if($row->status == "Y") echo "<font color=red>[�亯�Ϸ�]</font>"; else echo "[�����Ϸ�]"; ?></td>
                                              <td><a href="member_qna_input.php?idx=<?=$row->idx?>"><?=$row->subject?></a></td>
                                              <td align="center"><a href="javascript:searchEstimate('name','<?=$row->name?>');" class="3"><?=$row->name?></a>(<a href="javascript:searchEstimate('memid','<?=$row->memid?>');" class="3"><?=$row->memid?></a>)</td>
                                              <td align="center"><?=$row->wdate?></td>
                                            </tr>
                                          </form>
                                          <tr><td></td></tr>
                                          <?
                                          		$no--;
								                        $rows--;
								                    }
								                    if($total <= 0){
							                   	   echo "<tr><td colspan=10 bgcolor=DEDEDE></td></tr>";
							                   		echo "<tr><td height='30' colspan=10 align=center>��ϵ� ����� �����ϴ�.</td></tr>";
							                   		echo "<tr><td colspan=10 bgcolor=DEDEDE></td></tr>";
							                   	  }
								                  ?>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td></td>
                                            </tr>
                                          </table>
                                          <table width="97%" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                              <td width="60"><input type="button" value="���û���" onClick="qnaDelete();" class="t"></td>
                                              <td width="640"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
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