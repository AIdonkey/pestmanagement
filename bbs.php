<?php
	require_once 'include.php';
	$cates = getAllcate();
	if (!($cates && is_array($cates))) {
	alertMes("不好意思，网站维护中!!!", "http://www.baidu.com");
}
	$rows=getproblem();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>论坛</title>
		<link type="text/css" rel="stylesheet" href="styles/reset.css">
		<link type="text/css" rel="stylesheet" href="styles/main.css">
		<script type="text/javascript" src="admin/scripts/jquery-1.6.4.js" ></script>
	</head>
	<body>
	<div class="headerBar">
		<div class="topBar">
			<div class="comWidth">
					<div class="leftArea">
					<a href="#" class="collection">收藏本站</a>
					</div>
					<div class="rightArea">
					<?php if($_SESSION['loginFlag']):?>
					<span>欢迎您</span><?php echo $_SESSION['username']; ?>
					<a href="doAction.php?act=userOut">[退出]</a>
					<span><a href="admin/addbbs.php">我要发帖</a></span>
					<?php else: ?>
					<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="logoBar">
				<div class="comWidth">
				<div class="logo fl">
					<a href="#"><img src="images/insect blue.png"width="112px"height="
						59px" alt="pestworld"></a>
				</div>
				<div class="search_box fl">
					<input type="text" class="search_text fl"id="sousuo">
					<input type="button" value="搜 索" class="search_btn fr">
				</div>
				<div id="search_auto"></div>
			</div>
			</div>
		</div>
		<div class="navBox">
			<ul class="nav fl">
				<li><a href="#" class="active">昆虫展示</a></li>
				<li><a href="admin/login.php">管理员登录</a></li>
				<li><a href="bbs.php">讨论</a></li>
				
			</ul>
		</div>
	</div>
	<div class="comWidth bbsheader"style="border: 1px solid;">
		<div id="11">
			<div style="">
				<div id="">
					<h1 style="color: blue;"> 帖子列表</h1>
				</div>
			</div>
			<?php foreach($rows as $row):?>
				<div id="">
					<h2><a href='bbsdetail.php?id=" <?php echo $row['id']?>"'style="color: blue;"><?php echo $row['problem'];?></a></h2>
					<text style="width: 980px;height: 50px;">
						<?php echo $row['detail'];?>
					</text>
				</div>
				<?php endforeach;?>
				
		</div>
	</div>
	</body>
</html>