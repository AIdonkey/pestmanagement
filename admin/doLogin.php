<?php 
require_once'../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=$_POST['password'];
$autoFlag=$_POST['autoFlag'];
$sql="select * from imooc_admin where username='{$username}' and password='{$password}'";
$row=checkAdmin($sql);
	if($row){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		alertMes("登陆成功","index.php");
	}else{
		print_r($row);
		alertMes("登陆失败，重新登陆","login.php");
		
	}
