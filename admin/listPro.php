<?php 
require_once '../include.php';
checkLogined();
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where p.pName like '%{$keywords}%'":null;
//得到数据库中所有图片
$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom from imooc_pro as p join imooc_cate c on p.cId=c.id {$where}  ";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom,h.phylum,g.gang,m.mu,k.ke,n.genus from imooc_pro as p join imooc_cate c on p.cId=c.id join imooc_phylum h on p.cId1=h.id join imooc_gang g on p.cId2=g.id join imooc_mu m on p.cId3=m.id join imooc_ke k on p.cId4=k.id join imooc_genus n on p.cId5=n.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>上传时间：</span>
                                <div class="bui_select">
                                 <select id="" class="select" onchange="change(this.value)">
                                 	<option>-请选择-</option>
                                        <option value="pubTime desc" >最新发布</option>
                                        <option value="pubTime asc">历史发布</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="5%">编号</th>
                                <th width="5%">图片名称</th>
                                <th width="10%">图片分类</th>
                                <th width="10%">拍摄地点</th>
                                <th width="15%">上传时间</th>
                                <th width="5%">拍摄人</th>
                                <th width="20%">图像</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['pName']; ?></td>
                                <td><?php echo $row['kingdom'];?><?php echo $row['phylum']?><?php echo $row['gang']?><?php echo $row['mu']?><?php echo $row['ke']?><?php echo $row['genus']?></td>
                                <td>
                                	<?php echo $row['pNum'];?>
                                </td>
                                 <td><?php echo date("Y-m-d H:i:s",$row['pubTime']);?></td>
                                  <td><?php echo $row['iPrice'];?></td>
                                  <td><?php $proImgs=getAllImgByProId($row['id']);
					                        foreach($proImgs as $img):
					                        ?>
					                        <img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
					                        <?php endforeach;?></td>
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['pName'];?>')"><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['id'];?>)">
					                            <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">图片名称</td>
					                        			<td><?php echo $row['pName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">图片类别</td>
					                        			<td><?php echo $row['kingdom'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">拍摄人</td>
					                        			<td><?php echo $row['iPrice'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">拍摄地点</td>
					                        			<td><?php echo $row['pNum'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">拍摄时间</td>
					                        			<td><?php echo $row['mPrice'];?></td>
					                        		</tr>
					                        		
					                        		<tr>
					                        			<td width="20%"  align="right">图片</td>
					                        			<td>
					                        			<?php 
					                        			$proImgs=getAllImgByProId($row['id']);
					                        			foreach($proImgs as $img):
					                        			?>
					                        			<img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
					                        			<?php endforeach;?>
					                        			</td>
					                        		</tr>
					                        		
					                        	</table>
					                        	<span style="display:block;width:80%; ">
					                        	图片描述<br/>
					                        	<?php echo $row['pDesc'];?>
					                        	</span>
					                        </div>
                                
                                </td>
                            </tr>
                           <?php  endforeach;?>
                           <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="8"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"图片名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
	}
</script>
</body>
</html>