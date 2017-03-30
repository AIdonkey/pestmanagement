<?php 
require_once 'include.php';
$id=$_REQUEST['id'];
checkuserLogined();
$proInfo=getProById($id);
$proImgs=getProImgsById($id);
$proId=getProIdById($id);
$problems=getproblem($id);
if(!($proImgs &&is_array($proImgs))){
	alertMes($id, "index.php");
}
?>

<html>
<head>
<meta charset="utf-8">
<title>标本介绍</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link type="text/css" rel="stylesheet" media="all" href="styles/jquery.jqzoom.css"/>
<script src="scripts/jquery-1.6.js" type="text/javascript"></script>
<script src="scripts/jquery.jqzoom-core.js" type="text/javascript"></script>
<style> .lin</style>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script type="text/javascript">
$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false,
			title:false,
			zoomWidth:410,
			zoomHeight:410
        });
	
});	
</script>
</head>

<body class="grey">
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="#" class="collection">收藏本站</a>
			</div>
			<div class="rightArea">
				<?php if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><?php echo $_SESSION['username'];?>
				<a href="doAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
				<?php endif;?>
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
				<input type="text" class="search_text fl">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部昆虫分类<i class="shopClass_icon"></i></h3>
				<div class="shopClass_show hide">
					<dl class="shopClass_item">
						<dt><a href="#" class="b">鞘翅目</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">鳞翅目</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">双翅目</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">膜翅目</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">半翅目</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shop_Class_item">
						<dt><a href="#"class="b">广翅目</a></dt>
					</dl>
					<dl class="shopClass_item>
						<dt><a href="#"class="b">蜻蜓目</a></dt>
					</dl>
				</div>
				<div class="shopClass_list hide">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd> 
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<div class="shopList_links">
							<a href="#">文字测试内容等等<span></span></a><a href="#">文字容等等<span></span></a>
						</div>
					</div>
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">管理员登录</a></li>
				<li><a href="#">昆虫展示</a></li>
				<li><a href="#">讨论组</a></li>
			
			</ul>
		</div>
	</div>
</div>
<div class="userPosition comWidth">
	<strong><a href="index.php">首页</a></strong>
	<span>&nbsp;&gt;&nbsp;</span>
	<a href="#"><?php echo $proInfo['kingdom'];?></a>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['phylum'];?></em>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['gang']?></em>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['mu']?></em>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['ke']?></em>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['genus']?></em>
</div>
<div class="description_info comWidth">
	<div class="description clearfix">
		<div class="leftArea">
			<div class="description_imgs">
				<div class="big">
					<a href="image_800/<?php echo  $proImgs[0]['albumPath'];?>" class="jqzoom" rel='gal1'  title="triumph" >
           			 <img width="309" height="340" src="image_350/<?php  echo $proImgs[0]['albumPath'];?>"  title="triumph">
	        		</a>
				</div>
				<ul class="des_smimg clearfix" id="thumblist" >
					<?php foreach($proImgs as $key=>$proImg):?>
					<li><a class="<?php echo $key==0?"zoomThumbActive":"";?> active" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: 'image_350/<?php echo $proImg['albumPath'];?>',largeimage: 'image_800/<?php echo $proImg['albumPath'];?>'}"><img src="image_50/<?php echo $proImg['albumPath'];?>" alt="" id="<?php echo $proImg['id'] ;?>"class='i' ></a></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="rightArea">
			<div class="des_content">
				<h3 class="des_content_tit"><?php echo $proInfo['pName'];?></h3>
				<div class="dl clearfix">
					<div class="dt">图片分类</div>
					<div class="dd clearfix"><span class="des_money"><?php echo $proInfo['kingdom'];?></span></div>
				</div>
				<div class="dl clearfix">
					<div class="dt">拍摄地点</div>
					<div class="dd clearfix"><span class="des_money"><?php echo $proInfo['pNum'];?></span></div>
				</div>
				<div class="des_position">
					<div class="dl clearfix">
						<div class="dt">拍摄时间</div>
						<div class="dd clearfix">
							<span class="des_money"><?php echo $proInfo['mPrice'];?></span>
						</div>
					</div>
					<div class="dl clearfix">
						<div class="dt colorSelect">拍摄人</div>
						
							<span class="des_money"><?php echo $proInfo['iPrice'];?></span>
						
					</div>
					
					
				</div>
				<div class="des_select">
					
				</div>
				<div class="digg">
					<div id="dig_up" class="digup">
						<span id="num_up"></span>
						<p id="11">此图片是正确的</p>
						<div id="bar_up"class="bar">
							<span></span>
							<i></i>							
						</div>
					</div>
					<div id="dig_down" class="digdown">
						<span id="num_down"></span>
						<p>此图片不准确</p>
						<div id="bar_down"class="bar">
							<span></span>
							<i></i>							
						</div>
					</div>
					<div id="msg"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="rightArea">
		<div class="des_infoContent">
			<ul class="des_tit">
				<li class="active"><span>标本介绍</span></li>
				<li class="start"><span><a href="#">网友评价(12312)</a></span></li>
			</ul>
			<div class="ad ad22">
				<a href="#"><?php echo $proInfo["pDesc"];?></a>
			</div>
			<div class="ad ad11"style="display: none;">
				<?php foreach($problems as $probs):?>
				<div class="">
					<h2><a href='bbsdetail.php?id=" <?php echo $probs['id']?>"'style="color: blue;float:left;"><?php echo $probs['username'];?></a></h2><br><br>
					<text style="width: 980px;height: 50px;text-align: left;">
						<?php echo $probs['detail'];?>
					</text>
				
				</div>
					
				<?php endforeach;?>
			</div>
		</div>
		<div class="hr_15"><a href="admin/addbbs.php?id=<?php echo $id;?>">评论</a></div>
		
	</div>
</div>
<div class="hr_25"></div>
<script>

	$(".i").click(function(){
	zz=$(this).attr("id");
	getdata("do.php",zz);
	$("#dig_up").click(function(){getdata("do.php?action=like",zz);});
	$("#dig_down").click(function(){getdata("do.php?action=unlike",zz);});
	});
	//单击正确或错误按键
	
	$(function(){
	$("#dig_up").hover(function(){
		$(this).addClass("digup_on");
	},function(){
		$(this).remove("digup_on");
	});
	$("#dig_down").hover(function(){
		$(this).addClass("digdown_on");
	},function(){
		$(this).remove("digdown_on");
	});
	
});
function getdata(url,sid){
	$.getJSON(url,{"id":sid},function(data){
			if(data.success==1){
			$("#num_up").html(data.like);
			//投票成功
			$("#bar_up span").css("width",data.like_percent);
			$("#bar_up i").html(data.like_percent);
			$("#num_down").html(data.unlike);
			$("#bar_down span").css("width",data.unlike_percent);
			$("#bar_down i").html(data.unlike_percent);
		}
		else{//投票失败
			$("#msg").html(data.msg).show().css({'opacity':1,'top':'40px'}).animate({top:'-50px',opacity:0},"slow");
		}
	});
}
$(".start").click(function(){
	$(".ad22").css("display","none");
	$(".ad11").css("display","block");
})
$(".active").click(function(){
	$(".ad11").css("display","none");
	$(".ad22").css("display","block");
})
</script>
</body>
</html>
