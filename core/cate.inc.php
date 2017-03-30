<?php 
/**
 * 添加分类的操作
 * @return string
 */
function addCate(){
	$arr=$_POST;
	if($arr['kingdom']){
	if(insert("imooc_cate", $arr)){
		$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
	}
	}
	elseif($arr['phylum']){
		if(insert("imooc_phylum",$arr)){
			$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listphylum.php'>查看分类</a> ";
		}
	}
	elseif($arr['gang']){
		if(insert("imooc_gang",$arr)){
			$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listgang.php'>查看分类</a> ";
		}
	}
	elseif($arr['mu']){
		if(insert("imooc_mu",$arr)){
			$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listmu.php'>查看分类</a> ";
		}
	} 
	elseif($arr['ke']){
		if(insert("imooc_ke",$arr)){
			$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listke.php'>查看分类</a> ";
		}
	} 
	elseif($arr['genus']){
		if(insert("imooc_genus",$arr)){
			$mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listgenus.php'>查看分类</a> ";
		}
	}  else{
		$mes="分类添加失败！<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
	}
	return $mes;
}

/**
 * 根据ID得到指定分类信息
 * @param int $id
 * @return array
 */
function getCateById($id){
	$sql="select kingdom from imooc_cate where id={$id}";
	return fetchOne($sql);
}
function getPhylumById($id){
	$sql="select phylum	from imooc_phylum where id={$id}";
	return fetchOne($sql);
}
function getgangById($id){
	$sql="select gang from imooc_gang where id={$id}";
	return fetchOne($sql);
}
function getmuById($id){
	$sql="select mu from imooc_mu where id={$id}";
	return fetchOne($sql);
}
function getkeById($id){
	$sql="select ke from imooc_ke where id={$id}";
	return fetchOne($sql);
}
function getgenusById($id){
	$sql="select genus from imooc_genus where id={$id}";
	return fetchOne($sql);
}
/**
 * 修改分类的操作
 * @param string $where
 * @return string
 */
function editCate($where){
	$arr=$_POST;
	if($arr['kingdom']){
	if(update("imooc_cate", $arr,$where)){
		$mes="分类修改成功!<br/><a href='listCate.php'>查看分类</a>";
	}}elseif($arr['phylum']){
		if(update("imooc_phylum", $arr,$where)){
			$mes="分类修改成功!<br/><a href='listphylum.php'>查看分类</a>";
		}
	}elseif($arr['gang']){
		if(update("imooc_gang", $arr,$where)){
			$mes="分类修改成功!<br/><a href='listgang.php'>查看分类</a>";
		}
	}elseif($arr['mu']){
		if(update("imooc_mu", $arr,$where)){
			$mes="分类修改成功!<br/><a href='listpmu.php'>查看分类</a>";
		}
	}elseif($arr['ke']){
		if(update("imooc_ke", $arr,$where)){
			$mes="分类修改成功!<br/><a href='listke.php'>查看分类</a>";
		}
	}elseif($arr['genus']){
		if(update("imooc_genus", $arr,$where)){
			$mes="分类修改成功!<br/><a href='listgenus.php'>查看分类</a>";
		}
	}
	else{
		$mes="分类修改失败!<br/><a href='listCate.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除分类
 * @param string $where
 * @return string
 */
function delCate($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_cate",$where)){
			$mes="分类删除成功!<br/><a href='listCate.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listCate.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的图片", "listPro.php");
	}
}
function delphylum($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_phylum",$where)){
			$mes="分类删除成功!<br/><a href='listphylum.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listphylum.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的图片", "listPro.php");
	}
}
function delgenus($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_genus",$where)){
			$mes="分类删除成功!<br/><a href='listgenus.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listgenus.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的图片", "listPro.php");
	}
}
function delgang($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_gang",$where)){
			$mes="分类删除成功!<br/><a href='listgang.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listgang.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的图片", "listPro.php");
	}
}
function delke($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_ke",$where)){
			$mes="分类删除成功!<br/><a href='listke.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listke.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的图片", "listPro.php");
	}
}
function delmu($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_mu",$where)){
			$mes="分类删除成功!<br/><a href='listmu.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listmu.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的图片", "listPro.php");
	}
}
/**
 * 得到所有分类
 * @return array
 */
function getAllCate(){
	$sql="select * from imooc_cate";
	$rows=fetchAll($sql);
	return $rows;
}
function getAllPhylum(){
	$sql="select * from imooc_phylum";
	$rows=fetchAll($sql);
	return $rows;
}
function getAllGang(){
	$sql="select * from imooc_gang";
	$rows=fetchAll($sql);
	return $rows;
}
function getAllMu(){
	$sql="select * from imooc_mu";
	$rows=fetchAll($sql);
	return $rows;
}function getAllKe(){
	$sql="select * from imooc_ke";
	$rows=fetchAll($sql);
	return $rows;
}function getAllGenus(){
	$sql="select * from imooc_genus";
	$rows=fetchAll($sql);
	return $rows;
}