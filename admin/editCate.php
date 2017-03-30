<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$row=getCateById($id);
$row1=getPhylumById($id);
$row2=getgangById($id);
$row3=getmuById($id);
$row4=getkeById($id);
$row5=getgenusById($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>修改分类</h3>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">界的名称</td>
		<td><input type="text" name="kingdom" placeholder="<?php echo $row['kingdom'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改分类"/></td>
	</tr>
</table>
</form>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">门的名称</td>
		<td><input type="text" name="phylum" placeholder="<?php echo $row1['phylum'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改分类"/></td>
	</tr>
</table>
</form>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">纲的名称</td>
		<td><input type="text" name="gang" placeholder="<?php echo $row2['gang'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改分类"/></td>
	</tr>
</table>
</form>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">目的名称</td>
		<td><input type="text" name="mu" placeholder="<?php echo $row3['mu'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改分类"/></td>
	</tr>
</table>
</form>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">科的名称</td>
		<td><input type="text" name="ke" placeholder="<?php echo $row4['ke'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改分类"/></td>
	</tr>
</table>
</form>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">属的名称</td>
		<td><input type="text" name="genus" placeholder="<?php echo $row5['genus'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改分类"/></td>
	</tr>
</table>
</form>
</body>
</html>