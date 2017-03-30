<?php 
require_once '../include.php';
checkLogined();
$rows=getAllCate();
$rows1=getAllPhylum();
$rows2=getAllGang();
$rows3=getAllMu();
$rows4=getAllKe();
$rows5=getAllGenus();
if(!$rows){
	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
$id=$_REQUEST['id'];
$proInfo=getProById($id);

//print_r($proInfo);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3>修改图片</h3>
<form action="doAdminAction.php?act=editPro&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">图片名称</td>
		<td><input type="text" name="pName"  value="<?php echo $proInfo['pName'];?>"/></td>
	</tr>
	<tr>
		<td align="right">图片分类</td>
		<td>
		<select name="cId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$proInfo['cId']?"selected='selected'":null;?>><?php echo $row['kingdom'];?></option>
			<?php endforeach;?>
		</select>
		<select name="cId1">
			<?php foreach($rows1 as $row1):?>
				<option value="<?php echo $row1['id'];?>" <?php echo $row1['id']==$proInfo['cId1']?"selected='selected'":null;?>><?php echo $row1['phylum'];?></option>
			<?php endforeach;?>
		</select>
			<select name="cId2">
			<?php foreach($rows2 as $row2):?>
				<option value="<?php echo $row2['id'];?>" <?php echo $row2['id']==$proInfo['cId2']?"selected='selected'":null;?>><?php echo $row2['gang'];?></option>
			<?php endforeach;?>
		</select>
			<select name="cId3">
			<?php foreach($rows3 as $row3):?>
				<option value="<?php echo $row3['id'];?>" <?php echo $row3['id']==$proInfo['cId3']?"selected='selected'":null;?>><?php echo $row3['mu'];?></option>
			<?php endforeach;?>
		</select>
			<select name="cId4">
			<?php foreach($rows4 as $row4):?>
				<option value="<?php echo $row4['id'];?>" <?php echo $row4['id']==$proInfo['cId4']?"selected='selected'":null;?>><?php echo $row4['ke'];?></option>
			<?php endforeach;?>
		</select>
			<select name="cId5">
			<?php foreach($rows5 as $row5):?>
				<option value="<?php echo $row5['id'];?>" <?php echo $row5['id']==$proInfo['cId5']?"selected='selected'":null;?>><?php echo $row5['genus'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">拍摄人</td>
		<td><input type="text" name="iPrice"  value="<?php echo $proInfo['iPrice'];?>"/></td>
	</tr>
	<tr>
		<td align="right">拍摄地点</td>
		<td><input type="text" name="pNum"  value="<?php echo $proInfo['pNum'];?>"/></td>
	</tr>
	<tr>
		<td align="right">拍摄时间</td>
		<td><input type="text" name="mPrice"  value="<?php echo $proInfo['mPrice'];?>"/></td>
	</tr>
	
	<tr>
		<td align="right">图片描述</td>
		<td>
			<textarea name="pDesc" id="editor_id" style="width:100%;height:150px;"><?php echo $proInfo['pDesc'];?></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">图像</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑图像"/></td>
	</tr>
</table>
</form>
</body>
</html>