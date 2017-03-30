<?php
require_once 'include.php';
$cates = getAllcate();
$phylums=getAllPhylum();
$gangs=getAllGang();
$mus=getAllMu();
$kes=getAllKe();
$genuss=getAllGenus();
if (!($cates && is_array($cates))) {
	alertMes("不好意思，网站维护中!!!", "http ://www.baidu.com");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<script type="text/javascript" src="admin/scripts/jquery-1.6.4.js" ></script>
<script type="text/javascript"src="scripts/vue.min.js"></script>
<!--[if IE 6]>
    script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"><//////////script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script><![endif]-->
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
			<div id="search_auto"style="z-index: 102;"></div>
		</div>
	</div>
		<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部图片分类<i class="shopClass_icon"></i><select name="全部图片">
					<option value="虫害"><h3>虫害</h3></option>
					<option value="虫害"><h3>寄主</h3></option>
				</select></h3>
				<div class="shopClass_show">
					<?php foreach($mus as $mu):?>
						<dl class="shopClass_item">
						<dt><h1 class="b"><a><?php echo $mu['mu'];?></a></h1></dt>
					   </dl>
					<?php endforeach;?>
				</div>
				<div class="shopClass_list "style="z-index: 100;">
					<div class="shopClass_cont i">
						<?php 
						    $sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom,h.phylum,g.gang,m.mu,k.ke,n.genus from imooc_pro as p join imooc_cate c on p.cId=c.id join imooc_phylum h on p.cId1=h.id join imooc_gang g on p.cId2=g.id join imooc_mu m on p.cId3=m.id join imooc_ke k on p.cId4=k.id join imooc_genus n on p.cId5=n.id ";
							$rows=fetchAll($sql);
						 	?>
						 	
						<?php foreach($rows as $row):?>
						<dl class="shopList_item ">	
							<dt>科</dt>
							<dd>
								<a href="bbs.php"class="as"><?php echo $row['ke']; ?></a>
							</dd>
						</dl>
						<dl class="shopList_item ii"style="display: block;">
							<dt>属</dt>
							<dd>
								<a href="#"class="shushu"><?php echo $row['genus'];?></a>
							</dd>
						</dl>
						<?php endforeach;?>
						
						
					</div>
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">昆虫展示</a></li>
				<li><a href="admin/login.php">管理员登录</a></li>
				<li><a href="bbs.php">讨论</a></li>
				
			</ul>
		</div>
	</div>
</div>
<div class="banner comWidth clearfix">
	<div class="banner_bar banner_big">
		>
		<div class="imgNum">
			<a href="#" class="active"><img src="."></a><a href="#"></a><a href="#"></a><a href="#"></a>
		</div>
	</div>
</div>
<?php foreach($cates as $cate):?>
<div class="shopTit comWidth">
	<span class="icon"></span><h3><?php echo $cate['kingdom']; ?></h3>
	<a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
		
				<li><a href="#"><img src="images/banner/fpic8670.jpg" alt="banner"width="190px",height="500px"></a></li>
				<li><a href="#"><img src="images/banner/fpic8670.jpg" alt="banner"width="190px",height="500px"></a></li>
		
			</ul>
		
			<div class="imgNum">
				<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
			</div>
		</div>
		
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
		<?php 
			$pros=getProsByCid($cate['id']);
			if($pros &&is_array($pros)):
			foreach($pros as $pro):
			$proImg=getProImgById($pro['id']);
		?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id']; ?>" target="_blank"><img height="200" width="187" src="image_220/<?php echo $proImg['albumPath']; ?>" alt=""></a>
				</div>
				<h6><?php echo $pro['pName']; ?></h6>
				<p><?php echo $pro['iPrice']; ?></p>
			</div>
			<?php
				endforeach;
				endif;
			?>
			
		</div>
		<div class="shopList_sm clearfix">
		<?php 
			$prosSmall=getSmallProsByCid($cate['id']);
			if($prosSmall &&is_array($prosSmall)):
			foreach($prosSmall as $proSmall):
			$proSmallImg=getProImgById($proSmall['id']);
		?>
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href="proDetails.php?id=<?php echo $proSmall['id']; ?>" target="_blank"><img width="95" height="95" src="image_220/<?php echo $proSmallImg['albumPath']; ?>" alt=""></a>
				</div>
				<div class="shopItem_text">
					<p><?php echo $proSmall['pName']; ?></p>
					<h3><?php echo $proSmall['iPrice']; ?></h3>
				</div>
			</div>
			<?php
				endforeach; 
				endif;
			?>
		</div>
	</div>
</div>
<?php endforeach; ?>
<div class="hr_25"></div>

<script>//$(document).ready(function() {
//
//		$(".b").toggle(function() {
//			$(".slist").animate({
//				height: 'toggle',
//				opacity: 'toggle'
//			}, "slow");
//			$(this).next(".slist").animate({
//				height: 'toggle',
//				opacity: 'toggle'
//			}, "slow");
//		}, function() {
//			$(".slist").animate({
//				height: 'toggle',
//				opacity: 'hide'
//			}, "slow");
//			$(this).next(".slist").animate({
//				height: 'toggle',
//				opacity: 'toggle'
//			}, "slow");
//		});
//		 $(".l2").toggle(function () {
//          $(this).next(".sslist").animate({ height: 'toggle', opacity: 'toggle' }, "slow");
//      }, function () {
//          $(this).next(".sslist").animate({ height: 'toggle', opacity: 'toggle' }, "slow");
//      });
//
//      $(".l2").click(function () {
//          $(".l3").removeClass("currentl3");
//          $(".l2").removeClass("currentl2");
//          $(this).addClass("currentl2");
//      });
//
//      $(".l3").click(function () {
//          $(".l3").removeClass("currentl3");
//          $(this).addClass("currentl3");
//      });
//
//      $(".close").toggle(function () {
//          $(".slist").animate({ height: 'toggle', opacity: 'show' }, "fast");
//          $(".sslist").animate({ height: 'toggle', opacity: 'show' }, "fast");
//      }, function () {
//          $(".slist").animate({ height: 'toggle', opacity: 'hide' }, "fast");
//          $(".sslist").animate({ height: 'toggle', opacity: 'hide' }, "fast");
//      });
//	})
	//搜索框的制作
$(function() {
	$("#search_auto").css({
		'width': $('#sousuo').width() + 10
	});
	$("#sousuo").keyup(function() {
		$.post('search.php', {
			'value': $(this).val()
		}, function(data) {
			if(data == '0') $("#search_auto").html('').css('display', 'none');
			else $('#search_auto').html(data).css('display', 'block','z-index','99');
		});
	});
});
//$(document).ready(function() {
//	$(".shopClass_cont").mouseover(function() {
//		$(".shopList_item").show();
//	});
//	$(".shopList_item").hover(null, function() {
//		$(".shopList_item").hide();
//	});
//});
//图片轮播
var index=0;
var pic=$(".banner_big ul li");
var si=$(".nihao");
si.eq(0);

function show(){
	pic.eq(index).find(".img1").animate({"left":"0px"},1000);
}
function change(){
	index++;
	if(index>=pic.length){
		index=0;
	}
    pic.eq(index).fadeIn();
    pic.eq(index).siblings().fadeOut();
    
}
show();
setInterval("change()",2000);
//无限极分类实现方法
//$(".keke").click(function(){
//	$(".i").css("display","none");
//	$(".ii").css("display","block");
//});
$(".b").click(function(){
	$(".shopClass_list").animate({height: "toggle", opacity:"toggle"},"slow");
	var $a=$(this).children().html();
	$.ajax({
		scriptCharset:'utf-8',
		type:'POST',
		url:"do1.php",
		data: {'name':$a},
		success:function(data){
			 console.log(data); 
			 $(".as").html(data);
		} 
	});  
});
</script>
</body>
</html>
