<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<title>H5/html5--爱果果</title>
		<meta name="keywords" content="h5,html5"/>
		<meta name="description" content=""/>
		<link rel="stylesheet" type="text/css" href="http://www.iguoguo.net/wp-content/themes/iguoguo/h5/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="http://www.iguoguo.net/wp-content/themes/iguoguo/h5/css/layout.css"/>
		<script type="text/javascript" src="http://www.iguoguo.net/wp-content/themes/iguoguo/h5/js/jquery-2.1.0.js" ></script>
		<script type="text/javascript" src="http://www.iguoguo.net/wp-content/themes/iguoguo/h5/js/common.js"></script>
	</head>
	<body>
		<!--
        	作者：278653847@qq.com
        	时间：2015-03-18
        	描述：头部导航区域
        -->
		<header>
			<div class="iguoguoHeader">
				<div class="resWrapper">
					<div class="roundNav">
						<span class="navIcon"></span>
						<svg x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40">
							<circle fill="transparent" stroke="#ffffff" stroke-width="1" cx="20px" cy="20px" r="18px" stroke-dasharray="150,150" stroke-dashoffset="150" ></circle>
						</svg>
					</div>
				</div>
				<nav class="iguoguoMenu resWrapper" >
					<h1>爱果果</h1>
					<ul>
						<li><a href="http://www.iguoguo.net/">首页</a></li>
						<li><a href="http://www.iguoguo.net/category/酷站欣赏">酷站</a></li>
						<li><a href="http://www.iguoguo.net/category/ui">UI</a></li>
						<li><a href="http://www.iguoguo.net/category/分享">专题</a></li>
						<li><a href="http://www.dpcool.net/">电商</a></li>
					</ul>
				</nav>
				<div class="overlay"></div>
				<span class="channelName">HTML5</span>
			</div>
			<div class="menuBar depth1">
				<nav class="resWrapper">
					<a href="/" class="current" rel="0">H5欣赏</a>
					<a href="?cat=92" rel="92">H5文章</a>
					<a href="?tag=html5" rel="1">HTML5酷站</a>
				</nav>
			</div>
		</header>
		<!--
        	作者：278653847@qq.com
        	时间：2015-03-18
        	描述：主内容区域
        -->
		<div class="main resWrapper">
			<ul class="coList clearfix">
				<li class="focusList depth0">
					<?php $args = array(
						'paged' => $paged,
						'category__and'=>array(92),
						'tag'=>'h5',
						'showposts'=>1,
						'order'=>'DESC'
						);
					$query = query_posts($args);?>
					<?php if(have_posts()):?>
					<?php while(have_posts()):the_post();?>
					<div class="imgBox"><a href="<?php the_permalink();?>" target="_blank"><img src="<?php 	 echo get_content_first_image(false); ?>" title="<?php the_title();?>" ></a></div>
					<h3><?php the_title();?>
					<div class="listMeta">
						<i class="iconfont">&#xe65f;</i>
						<span><?php the_time("20y-m-d");?></span>
						<i class="iconfont">&#xe7e6;</i>
						<span><?php if(function_exists('the_views')) { the_views(); } ?></span>
					</div>
					</h3>
					<?php endwhile; wp_reset_query();?>
					<?php endif;?>
					
				</li>
				<?php include_once TEMPLATEPATH.'/h5/h5_list.php' ?>
				
			</ul>
			

			<div id="loading" class="hidden"></div>
			<div id="nomoreData" class="hidden">没有更多的内容了，爱果果会持续更新的</div>
		</div>
		
		<footer>
			
		</footer>
	</body>
</html>
