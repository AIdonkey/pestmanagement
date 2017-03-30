<?php
require_once 'include.php';
$action=$_GET['action'];
$id=$_GET['id'];
$ip=$_SERVER[REMOTE_ADDR];
if($action=="like"){
	likes(1,$id,$ip);
}elseif($action=="unlike"){
	likes(0,$id,$ip);
}
else{
	echo jsons($id);
}
?>
