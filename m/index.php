<!DOCTYPE html>
<html lang="zh-CN" manifest="cache.manifest">
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
    <script src="http://www.iguoguo.net/wp-content/themes/iguoguo/m/js/dataLocal.js"></script>
    <script src="http://www.iguoguo.net/wp-content/themes/iguoguo/m/js/main.js"></script>

</head>
<body>
	<header>
		<!--
            描述：humburg icon
        -->
		<div class="roundNav">
			<span class="navIcon"></span>
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
			<input type="text" name="keywords" id="keywords" disabled  />
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
        <div id="login">
            <label for="username">用户名</label><input type="text" name="username" id="username" />
            <label for="psw">密码</label><input type="password" name="psw" id="psw" />
            <input type="button" value="登录" id="login_btn" />
            <div id="error" class="hidden"></div>
        </div>
        <nav id="user_nav" class="hidden">
            <img src="" />
            <h4></h4>
            <a href="#" action="1"><span class="iconfont">&#xe64c; </span>我的收藏</a>
            <a href="#" action="2"><span class="iconfont">&#xe665; </span>我的作品</a>
            <a href="#" action="3"><span class="iconfont">&#xe659; </span>退出登录</a>
        </nav>
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
		
	</div>
	<div id="overlay"></div>
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
		<div id="detail_co">
			
		</div>
		<div class="loading hidden" id="post_loading"></div>
    </div>
    
    <!--文章详情页底部工具-->
    <div id="detail_toolbar" data_id="" >
    	<a href="#" id="like_btn"><span class="iconfont">&#xe669;</span>喜欢<span id="likes"></span></a>
    	<a href="#" id="visit_btn" target="_blank"><span class="iconfont">&#xe6eb;</span>浏览</a>
    	<a href="#" id="download_btn" target="_blank"><span class="iconfont">&#xe703;</span>下载</a>
    	<a href="#" id="comment_btn"><span class="iconfont">&#xe667;</span>评论<span id="comments"></span></a>
    </div>

	<!--网页浏览其-->
    <div id="web_viewer">
    	<div id="close_btn"> <span class="iconfont">&#xe646;</span></div>
    	<iframe src="" scrolling="yes" frameborder="0" allowfullscreen width="100%" height="100%"></iframe>
    </div>
    
</body>
</html>