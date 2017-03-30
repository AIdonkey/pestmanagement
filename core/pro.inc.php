<?php 

/**
 * 添加图片
 * @return string
 */
  
function addPro(){
	$arr=$_POST;
	$arr['pubTime']=time();
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("imooc_pro",$arr);
	$pid=getInsertId();
	if($res&&$pid){
		foreach($uploadFiles as $uploadFile){
			$arr1['pid']=$pid;
			$arr1['albumPath']=$uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功!</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看图片列表</a>";
		echo $res;
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
		
	}
	return $mes;
}
function addbbs(){
	session_start();
	$i=$_SESSION['username'];
	$arr=$_POST;
	$sql="select id from imooc_user where username= '$i'";
	$pid=fetchOne($sql);
	$result=$pid['id'];
	$arr['pubTime']=time();
	$arr['id']=$result;
	$path="./uploads";
	
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
//	if($result){
//		foreach($uploadFiles as $uploadFile){
//			$arr['albumpath']=$uploadFile['name'];
//			insert("imooc_problem",$arr);
//		}
//		$mes="<p>发送成功!</p><a href='../proDetails.php'>返回上一页</a>";
//	}
	if($result){
		insert("imooc_problem",$arr);
		$mes="<p>发送成功!</p><a href='../proDetails.php'>返回上一页</a>";
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addbbs.php'>重新发帖</a>";
		
	}
	return $mes;
}
/**
 *编辑图片
 * @param int $id
 * @return string
 */
function editPro($id){
	$arr=$_POST;
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res=update("imooc_pro",$arr,$where);
	$pid=$id;
	if($res&&$pid){
		if($uploadFiles &&is_array($uploadFiles)){
			foreach($uploadFiles as $uploadFile){
				$arr1['pid']=$pid;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看图片列表</a>";
	}else{
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
	}
		$mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}
function editbbs($id){
	$arr=$_POST;
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res=update("imooc_problem",$arr,$where);
	$pid=$id;
	if($res&&$pid){
		if($uploadFiles &&is_array($uploadFiles)){
			foreach($uploadFiles as $uploadFile){
				$arr1['pid']=$pid;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看图片列表</a>";
	}else{
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
	}
		$mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}
function delPro($id){
	$where="id=$id";
	$res=delete("imooc_pro",$where);
	$proImgs=getAllImgByProId($id);
	if($proImgs&&is_array($proImgs)){
		foreach($proImgs as $proImg){
			if(file_exists("uploads/".$proImg['albumPath'])){
				unlink("uploads/".$proImg['albumPath']);
			}
			if(file_exists("../image_50/".$proImg['albumPath'])){
				unlink("../image_50/".$proImg['albumPath']);
			}
			if(file_exists("../image_220/".$proImg['albumPath'])){
				unlink("../image_220/".$proImg['albumPath']);
			}
			if(file_exists("../image_350/".$proImg['albumPath'])){
				unlink("../image_350/".$proImg['albumPath']);
			}
			if(file_exists("../image_800/".$proImg['albumPath'])){
				unlink("../image_800/".$proImg['albumPath']);
			}
			
		}
	}
	$where1="pid={$id}";
	$res1=delete("imooc_album",$where1);
	if($res&&$res1){
		$mes="删除成功!<br/><a href='listPro.php' target='mainFrame'>查看图片列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
	}
	return $mes;
}


/**
 * 得到图片的所有信息
 * @return array
 */
function getAllProByAdmin(){
	$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom from imooc_pro as p join imooc_cate c on p.cId=c.id";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据图片id得到图片图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id){
	$sql="select a.albumPath from imooc_album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}
//function getAllUserImgByProId($id){
//	$sql="select "
//}

/**
 * 根据id得到图片的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){
		$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,p.cId1,p.cId2,c.kingdom,h.phylum,g.gang,m.mu,k.ke,n.genus from imooc_pro as p join imooc_cate c on p.cId=c.id join imooc_phylum h on p.cId1=h.id join imooc_gang g on p.cId2=g.id join imooc_mu m on p.cId3=m.id join imooc_ke k on p.cId4=k.id join imooc_genus n on p.cId5=n.id  where p.id={$id}";
		$row=fetchOne($sql);
		return $row;
}
/**
 * 检查分类下是否有产品
 * @param int $cid
 * @return array
 */
function checkProExist($cid){
	$sql="select * from imooc_pro where cId={$cid}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有图片
 * @return array
 */
function getAllPros(){
	$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id ";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据cid得到4条产品
 * @param int $cid
 * @return Array
 */
function getProsByCid($cid){
	$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到下4条产品
 * @param int $cid
 * @return array
 */
function getSmallProsByCid($cid){
	$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到图片ID和图片名称
 * @return array
 */
function getProInfo(){
	$sql="select id,pName from imooc_pro order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}
function  getproblem($id){
	$sql="select p.id,p.problem,p.detail, u.username from imooc_problem as p join imooc_user u on p.id=u.id where  p.pid={$id}  order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}

/*
// * 点击赞同或者否定
 * */
function likes($type,$id,$ip){
	$ip_sql=@mysql_query("select id from votes_ip where ip='$ip'and id='$id'");
	$count=@mysql_num_rows($ip_sql);
	if($count==0){//还没赞同过
		if($type==1){//赞同
			$sql="update votes set likes=likes+1 where id=".$id;
			@mysql_query($sql);	
		}
		else{//不赞同
			$sql="update votes set unlikes=unlikes+1 where id=".$id;
			@mysql_query($sql);	
		}
		$sql_in="insert into votes_ip(id,ip)values('$id','$ip')";
		@mysql_query($sql_in);
		if(@mysql_insert_id()>0){
			echo jsons($id);
		}
		else {
			$arr['success']=0;
			$arr['msg']='操作失败,请重试';
			echo json_encode($arr);
		}
	}else {
		$msg=$type==1?'您已经赞过了':'您已经否定过了';
		$arr['success']=0;
		$arr['msg']=$msg;
		echo json_encode($arr);
	}
}
function jsons($id){
	$query1=@mysql_query("select * from votes where id='$id'");
	if(@mysql_num_rows($query1)<1){
	$sql_in="insert into votes(id,likes,unlikes)values('$id','1','1')";
	@mysql_query($sql_in);}
	$query=@mysql_query("select * from votes where id='$id'");
	$row=@mysql_fetch_array($query);
	$like=$row['likes'];
	$unlike=$row['unlikes'];
	$arr['success']=1;
	$arr['like']=$like;
	$arr['unlike']=$unlike;
	$like_percent=round($like/($like+$unlike),3)*100;
	$arr['like_percent']=$like_percent.'%';
	$unlike_percent=round($unlike/($like+$unlike),3)*100;
	$arr['unlike_percent']=$unlike_percent.'%';
	return json_encode($arr);
}

