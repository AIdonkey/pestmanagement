<?php
	require_once "include.php";
	$a=$_POST['name'];
	$b=mujson($a);
	$sql="select cId4  from imooc_mu join imooc_pro as p on imooc_mu.id=p.cId3  where imooc_mu.mu={$b} ";
	$result=fetchAll($sql);
	foreach($result as $r){
		$sql="select ke from imooc_ke where {$r['cId4']}=id";
		$result1=fetchAll($sql);
		foreach($result1 as $re){
			echo $re['ke'];
		}
	}
	function mujson($id){
	return json_encode($id,JSON_UNESCAPED_UNICODE);
	}
?>