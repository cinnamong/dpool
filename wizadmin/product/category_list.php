<script language="JavaScript" src="../js/Tree_manager.js"></script>
<script language="JavaScript" src="../js/Tree.js"></script>

<script language="JavaScript">
<!--
function goUrl(url){
	document.location=url;
}

function onReload()
{
	//parent.frames[0].location.reload();
}

	/*	 Create Tree		*/
	var tree = new Tree();
	tree.color = "black";
	tree.bgColor = "white";
	tree.borderWidth = 0;


	/*	Create Root node	*/
	var rootnode = new TreeNode(" ÃÖ»óÀ§ ", "../image/tree/ServerMag_Etc_Root.gif","../image/tree/ServerMag_Etc_Root.gif");
	rootnode.action = "javascript:goUrl('prd_category.php')";
	rootnode.expanded = true;	

	/*	Create Root node of Code	*/
	<?
	$sql = "select * from wiz_category order by depthno asc, priorno01 asc, priorno02 asc, priorno03 asc";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){

		$catcode1 = substr($row->catcode,0,2);
		$catcode2 = substr($row->catcode,2,2);
		$catcode3 = substr($row->catcode,4,2);
		
		if($row->catcode == $catcode) $row->catname = "<b>".$row->catname."</b>";
		
		if($row->depthno == 1){

			echo "var node_$catcode1 = new TreeNode(\"$row->catname\", \"../image/tree/Common_TreeNode_CodeManage.gif\", \"../image/tree/Common_TreeNode_CodeManage.gif\");\n";
			echo "node_$catcode1.expanded = true;\n";	
			echo "node_$catcode1.action = \"javascript:goUrl('prd_category.php?mode=update&catcode=$row->catcode&depthno=$row->depthno&prior=$row->prior')\";\n";
			echo "rootnode.addNode(node_$catcode1);\n";

		}else if($row->depthno == 2){

			echo "var groupnode_$catcode2 = new TreeNode(\"$row->catname\",TREE_FOLDER_CLOSED_IMG,TREE_FOLDER_OPEN_IMG);\n";
			if($catcode2 == substr($catcode,2,2))
				echo "groupnode_$catcode2.expanded = true;\n";	
			echo "groupnode_$catcode2.action = \"javascript:goUrl('prd_category.php?mode=update&catcode=$row->catcode&depthno=$row->depthno&prior=$row->prior')\";\n";
			echo "node_$catcode1.addNode(groupnode_$catcode2);\n";

		}else{
		
			echo "var subnode_$catcode3 = new TreeNode(\"$row->catname\", \"../image/tree/Common_TreeNode_Note.gif\", \"../image/tree/Common_TreeNode_Note.gif\");\n";
			echo "subnode_$catcode3.action = \"javascript:goUrl('prd_category.php?mode=update&catcode=$row->catcode&depthno=$row->depthno&prior=$row->prior')\";\n";
			echo "groupnode_$catcode2.addNode(subnode_$catcode3);\n";
		}
	}
	?>
	
	tree.addNode(rootnode);
//-->
</script>

<body>
<script>
//CodeMainMenu.draw();
//codeMenu.draw();
</script>

<div id=TREE_BAR style="margin:5;">
<script>		
tree.draw();
tree.nodes[0].select();
</script>
</div>