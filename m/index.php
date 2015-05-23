<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>爱果果</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes,minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
	<link rel="apple-touch-icon" sizes="57x57" href="http://www.iguoguo.net/apple-touch-icon-57×57.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="http://www.iguoguo.net/apple-touch-icon-114×114.png" />
    <link rel="apple-touch-startup-image" href="http://www.iguoguo.net/320X640.png" />

    <link rel="stylesheet" type="text/css" href="http://www.iguoguo.net/wp-content/themes/iguoguo/m/css/reset.css"/>.
    <link rel="stylesheet" type="text/css" href="http://www.iguoguo.net/wp-content/themes/iguoguo/m/css/style.css"/>
    <script src="http://www.iguoguo.net/wp-content/themes/iguoguo/m/js/zepto.js"></script>
    <script src="http://www.iguoguo.net/wp-content/themes/iguoguo/m/js/main.js"></script>

</head>
<body>
	<header>
		<!--
            描述：humburg icon
        -->
		<div class="roundNav">
			<span class="navIcon"></span>
			<svg x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40">
				<circle fill="transparent" stroke="#333333" stroke-width="1" cx="20px" cy="20px" r="18px" stroke-dasharray="150,150" stroke-dashoffset="150" ></circle>
			</svg>
		</div>

		<img src="http://www.iguoguo.net/wp-content/themes/iguoguo/m/images/logo.svg" id="logo"/>
			
		<div class="user_panel">
			<div id="user_btn">
				<span class="iconfont">&#xe686;</span>
			</div>
		</div>
	</header>
	<!--
    	作者：278653847@qq.com
    	时间：2015-05-11
    	描述：左侧主导航
    -->
	<div id="left_side" class="sider_content">
		<form action="" method="post">
			<input type="text" name="keywords" id="keywords"  />
		</form>
		<nav class="main_menu">
			<a href="#" class="current" data-catid="1"><span class="iconfont">&#xe69b;</span>酷站</a>
			<a href="#" data-catid="144"><span class="iconfont">&#xe705;</span>UI</a>
			<a href="#" data-catid="92"><span class="iconfont">&#xe719;</span>专题</a>
		</nav>
	</div>
	<!--
    	作者：278653847@qq.com
    	时间：2015-05-11
    	描述：右侧登录区域
    -->
	<div id="right_side"  class="sider_content">
		
	</div>
	<!--
    	作者：278653847@qq.com
    	时间：2015-05-11
    	描述：主内容区域
    -->
	<div id="main">		
		<div id="main_panel">
			<ul class="content_list">
			</ul>
			<div class="loading hidden" id="list_loading"></div>
		</div>
		<div id="overlay"></div>
	</div>
	<!--
    	作者：278653847@qq.com
    	时间：2015-05-11
    	描述：内容详情
    -->
    <div id="detail_header">
    	<div id="back_btn" class="header_btn">
    		<span class="iconfont">&#xe679;</span>
    	</div>
    	<div id="share_btn" class="header_btn">
    		<span class="iconfont">&#xe6f3;</span>
    	</div>
    	<div id="detail_title">神州夺宝 H5微信互动游戏</div>
    </div>
    <div id="details">
    	<div class="listMeta">

		</div>
		<div id="detail_co">
			
		</div>
		<div class="loading hidden" id="post_loading"></div>
    </div>
    
    <div id="detail_toolbar" data_id="" >
    	<a href="#" id="like_btn">喜欢<span id="likes"></span></a>
    	<a href="#" id="visit_btn">浏览</a>
    	<a href="#" id="download_btn">下载</a>
    	<a href="#" id="comment_btn">评论<span id="comments"></span></a>
    </div>
    
</body>
</html>