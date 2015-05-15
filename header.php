<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="<?php bloginfo('charset');?>" />
<meta name="keywords" content="<?php if(is_category()){ echo category_description();}else{?>爱果果,酷站,H5酷站欣赏,酷站欣赏,韩国酷站,html5酷站,jQuery酷站,ui素材下载,psd下载,网页模板<?php }?>"/>
<meta name="Description" content="<?php if(is_single()) {the_excerpt();} else{?>爱果果iguoguo是一个专门从事酷站收藏、酷站欣赏、网页设计推荐、UI推荐、优秀UI素材下载的网页设计分享网站，设计师自己的酷站收藏、酷站欣赏、UI设计家园<?php }?>" />
<link rel="stylesheet" href="http://www.iguoguo.net/wp-content/themes/iguoguo/css/style.css" type="text/css" media="screen"/>
<?php if(is_single()&&in_category(array(1,498))){?>
<link rel="stylesheet" href="http://www.iguoguo.net/wp-content/themes/iguoguo/css/cool.css" type="text/css" media="screen"/>
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes,minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-title" content="爱果果" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-57×57.png" />
<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114×114.png" />
<link rel="apple-touch-startup-image" href="320X640.png" />
<link rel="Shortcut Icon" href="favicon.ico" />
<link rel="stylesheet" href="http://www.iguoguo.net/wp-content/themes/iguoguo/css/layout.css" type="text/css" media="screen"/>
<script src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/jquery-1.8.2.min.js"></script>
<?php if(!is_single()&&in_category(1)||is_home()){?>
	<link rel="stylesheet" href="http://www.iguoguo.net/wp-content/themes/iguoguo/css/tipTip.css" type="text/css" media="screen"/>
	<script src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/jquery.tipTip.minified.js"></script>
	<script>
		$(function(){
			$(".tip").tipTip({"defaultPosition":"top"});
		});
	</script>
<?php } ?>
<!--[if lt IE 9]>
<script src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/html5shiv.js"></script>
<script src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/css3-mediaqueries.js"></script>
<![endif]-->
<?php if(!is_single()&&!is_home()&&in_category(92)){?>
	<script src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/jquery.masonry.min.js"></script>
	<script>
		$(function(){
			var $container = $('#post_container');
			$container.masonry({
			  itemSelector: '.fxlist'
			});
		});
	</script>
<?php } ?>
<script type="text/javascript" name="baidu-tc-cerfication" src="http://apps.bdimg.com/cloudaapi/lightapp.js#21c76cc494376475b0b8a907320d317a"></script><script type="text/javascript">window.bd && bd._qdc && bd._qdc.init({app_id: '29e9325d5aa089ed1187ec7a'});</script>

<script src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/u_common.js"></script>

<?php if(!is_single()){ ?>
	<script type="text/javascript">
		$("a").each(function(){
			$(this).attr("href") = $(this).attr("href").replace("https://","http://");
		})
	</script>
<?php }?>
<title><?php if(is_home()){?>爱果果--酷站|H5酷站欣赏|酷站欣赏|韩国酷站|html5酷站|jQuery酷站|网页模板|psd下载|ui素材下载<?php }else{bloginfo('name');wp_title();}?></title>
</head>
<body <?php if(is_single()){?>id="mobDetail"<?php }?>>
<?php if(is_home()){?>
	<div id="fixed-menu">
		<div class="wechat">
			<i class="iconfont">&#xf0106</i>
			<img src="http://www.iguoguo.net/wp-content/themes/iguoguo/images/wechat.jpg" />
		</div>
		<div class="weibo">
			<a href="http://www.weibo.com/craboy" target="_blank" title="进入微博"><i class="iconfont">&#xf0105</i></a>
		</div>
	</div>
<?php }?>

<!-- Start: header -->
<header>
	<div id="headerWrapper">
	<?php if(!is_home()){ ?>
		<a href="javascript:history.go(-1)">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" viewBox="0 0 26 26" id="menu_prev">
			<polyline points="16,4 2,11 16,20" style="fill:none;stroke:#2f2211;stroke-width:2"/>
		</svg>
		</a>
	<?php }?>
		<div id="logo"><a href="http://www.iguoguo.net/newlogo" ><img src="http://www.iguoguo.net/wp-content/themes/iguoguo/images/logo.svg" /></a></div>
		<nav id="mainMenu">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26px" height="23px" viewBox="0 0 26 23" enable-background="new 0 0 26 23" xml:space="preserve" id="menu_burger">
				<line fill="none" stroke="#2f2211" stroke-width="2" stroke-miterlimit="10" x1="0" y1="3" x2="22" y2="3"></line>
				<line fill="none" stroke="#2f2211" stroke-width="2" stroke-miterlimit="10" x1="0" y1="11" x2="22" y2="11"></line>
				<line fill="none" stroke="#2f2211" stroke-width="2" stroke-miterlimit="10" x1="0" y1="19" x2="22" y2="19"></line>
			</svg>
			<ul>
				<li <?php if(is_home()):?> class="menuSelected" <?php endif ?> >
					<a href="/"  title="<?php bloginfo('name');?>">首页</a>
				</li>
				<li <?php if(in_category('1')&&!is_home()):?> class="menuSelected" <?php endif ?> >
					<a href="/category/酷站欣赏" title="酷站欣赏">酷站</a>
				</li>
				<li <?php if(in_category('144')&&!is_home()):?> class="menuSelected" <?php endif ?>>
					<a href="/category/UI">UI</a>
				</li>
				<li <?php if(in_category('92')&&!is_home()):?> class="menuSelected" <?php endif ?>>
					<a href="/category/分享">专题</a>
				</li>
				<li id="dpcool">
					<a href="http://www.iguoguo.net/dpcool" target="_blank">电商</a>
				</li>
			</ul>
		</nav>

		<form id="topSearch" action="http://www.iguoguo.net/index.php">
			<input type="text" name="s" id="s" value="扁平化设计" />
			<input type="submit" value="搜索" id="searchBtn" />
		</form>
	</div>
</header>
<?php if(is_home()){?>
	<div id="guoguoad" style="background:#000;">
		<a href="http://www.iguoguo.net/html5"><img src="http://WWW.iguoguo.net/wp-content/themes/iguoguo/images/h5banner.jpg" /></a>
	</div>
<?php }?>
<?php if(in_category('1')&&!is_home()&&!is_single()){?>
	<div id="sub_nav">
		<ul class="sub_nav_co">
			<li class="sub_list n1">形式
				<ul>
					<li><a href="http://www.iguoguo.net/tag/html5" title="html5酷站">html5</a></li>
					<li><a href="http://www.iguoguo.net/tag/flash" title="flash酷站">flash</a></li>
					<li><a href="http://www.iguoguo.net/tag/css" title="css酷站">css</a></li>
					<li><a href="http://www.iguoguo.net/tag/jQuery" title="jQuery酷站">jQuery</a></li>
					<li><a href="http://www.iguoguo.net/tag/视频" title="视频酷站">视频</a></li>
					<li><a href="http://www.iguoguo.net/tag/3D" title="3D酷站">3D</a></li>
					<li><a href="http://www.iguoguo.net/tag/手绘" title="手绘酷站">手绘</a></li>
				</ul>
			</li>
			<li class="sub_list n2">地区
				<ul>
					<li><a href="http://www.iguoguo.net/tag/中国" title="中国酷站">中国</a></li>
					<li><a href="http://www.iguoguo.net/tag/韩国" title="韩国酷站">韩国</a></li>
					<li><a href="http://www.iguoguo.net/tag/日本" title="日本酷站">日本</a></li>
					<li><a href="http://www.iguoguo.net/tag/欧美" title="欧美酷站">欧美</a></li>
					<li><a href="http://www.iguoguo.net/tag/巴西" title="巴西酷站">巴西</a></li>
					<li><a href="http://www.iguoguo.net/tag/俄罗斯" title="俄罗斯酷站">俄罗斯</a></li>
					<li><a href="http://www.iguoguo.net/tag/德国" title="德国酷站">德国</a></li>
					<li><a href="http://www.iguoguo.net/tag/意大利" title="意大利酷站">意大利</a></li>
					<li><a href="http://www.iguoguo.net/tag/台湾" title="中国台湾酷站">中国台湾</a></li>
					<li><a href="http://www.iguoguo.net/tag/立陶宛" title="立陶宛酷站">立陶宛</a></li>
					<li><a href="http://www.iguoguo.net/tag/英国" title="英国酷站">英国</a></li>
					<li><a href="http://www.iguoguo.net/tag/法国" title="法国酷站">法国</a></li>
					<li><a href="http://www.iguoguo.net/tag/澳大利亚" title="澳大利亚酷站">澳大利亚</a></li>
					<li><a href="http://www.iguoguo.net/tag/波兰" title="波兰酷站">波兰</a></li>
					<li><a href="http://www.iguoguo.net/tag/荷兰" title="荷兰酷站">荷兰</a></li>
				</ul>
			</li>
			<li class="sub_list n3">内容
				<ul>
					<li><a href="http://www.iguoguo.net/tag/地产" title="地产酷站">地产</a></li>
					<li><a href="http://www.iguoguo.net/tag/手机" title="手机酷站">手机</a></li>
					<li><a href="http://www.iguoguo.net/tag/汽车" title="汽车酷站">汽车</a></li>
					<li><a href="http://www.iguoguo.net/tag/化妆品" title="化妆品酷站">化妆品</a></li>
					<li><a href="http://www.iguoguo.net/tag/时尚" title="时尚酷站">时尚</a></li>
					<li><a href="http://www.iguoguo.net/tag/网页设计" title="网页设计酷站">网页设计</a></li>
					<li><a href="http://www.iguoguo.net/tag/设计创作" title="设计创作酷站">设计创作</a></li>
					<li><a href="http://www.iguoguo.net/tag/摄影" title="摄影酷站">摄影</a></li>
					<li><a href="http://www.iguoguo.net/tag/饮食" title="饮食酷站">饮食</a></li>
					<li><a href="http://www.iguoguo.net/tag/个人" title="个人酷站">个人</a></li>
					<li><a href="http://www.iguoguo.net/tag/儿童" title="儿童酷站">儿童</a></li>
					<li><a href="http://www.iguoguo.net/tag/活动专题" title="活动专题酷站">活动专题</a></li>
					<li><a href="http://www.iguoguo.net/tag/数码" title="数码酷站">数码</a></li>
					<li><a href="http://www.iguoguo.net/tag/科技" title="科技酷站">科技</a></li>
					<li><a href="http://www.iguoguo.net/tag/酒类" title="酒类酷站">酒类</a></li>
					<li><a href="http://www.iguoguo.net/tag/酒店" title="酒店酷站">酒店</a></li>
					<li><a href="http://www.iguoguo.net/tag/运动" title="运动酷站">运动</a></li>
					<li><a href="http://www.iguoguo.net/tag/企业" title="企业酷站">企业</a></li>
					<li><a href="http://www.iguoguo.net/tag/电子" title="电子酷站">电子</a></li>
					<li><a href="http://www.iguoguo.net/tag/shop" title="shop酷站">shop</a></li>
					<li><a href="http://www.iguoguo.net/tag/旅游" title="旅游酷站">旅游</a></li>
					<li><a href="http://www.iguoguo.net/tag/电影" title="电影酷站">电影</a></li>
					<li><a href="http://www.iguoguo.net/tag/中国风" title="中国风酷站">中国风</a></li>
				</ul>
			</li>
			<li class="sub_list n4">颜色
				<ul>
					<li><a href="http://www.iguoguo.net/tag/红色" title="红色酷站">红色</a></li>
					<li><a href="http://www.iguoguo.net/tag/黑色" title="黑色酷站">黑色</a></li>
					<li><a href="http://www.iguoguo.net/tag/蓝色" title="蓝色酷站">蓝色</a></li>
					<li><a href="http://www.iguoguo.net/tag/黄色" title="黄色酷站">黄色</a></li>
					<li><a href="http://www.iguoguo.net/tag/金色" title="金色酷站">金色</a></li>
					<li><a href="http://www.iguoguo.net/tag/绿色" title="绿色酷站">绿色</a></li>
					<li><a href="http://www.iguoguo.net/tag/橙色" title="橙色酷站">橙色</a></li>
					<li><a href="http://www.iguoguo.net/tag/灰色" title="灰色酷站">灰色</a></li>
					<li><a href="http://www.iguoguo.net/tag/白色" title="白色酷站">白色</a></li>
					<li><a href="http://www.iguoguo.net/tag/紫色" title="紫色酷站">紫色</a></li>
					<li><a href="http://www.iguoguo.net/tag/多彩" title="多彩酷站">多彩</a></li>
					<li><a href="http://www.iguoguo.net/tag/粉色" title="粉色酷站">粉色</a></li>
				</ul>
			</li>
		</ul>
	</div>
<?php }?>
<?php if(in_category('144')&&!is_home()&&!is_single()){?>
	<div id="sub_nav">
		<ul class="sub_nav_co">
			<li class="sub_list n1">格式
				<ul>
					<li><a href="http://www.iguoguo.net/tag/psd" title="psd下载">psd</a></li>
					<li><a href="http://www.iguoguo.net/tag/ai" title="ai素材下载">ai</a></li>
					<li><a href="http://www.iguoguo.net/tag/矢量" title="矢量素材下载">矢量</a></li>
					<li><a href="http://www.iguoguo.net/tag/png" title="png素材下载">png</a></li>
					<li><a href="http://www.iguoguo.net/tag/svg" title="svg素材下载">svg</a></li>
				</ul>
			</li>
			<li class="sub_list n2">UI
				<ul>
					<li><a href="http://www.iguoguo.net/tag/app" title="app gui下载">app GUI</a></li>
					<li><a href="http://www.iguoguo.net/tag/网页模板" title="网页模板下载">网页模板</a></li>
					<li><a href="http://www.iguoguo.net/tag/iphone" title="iphone素材下载">iphone</a></li>
					<li><a href="http://www.iguoguo.net/tag/ipad" title="ipad素材下载">ipad</a></li>
					<li><a href="http://www.iguoguo.net/tag/后台" title="后台界面下载">后台界面</a></li>
					<li><a href="http://www.iguoguo.net/tag/界面" title="界面下载">界面</a></li>
				</ul>
			</li>
			<li class="sub_list n3">元素
				<ul>
					<li><a href="http://www.iguoguo.net/tag/主题包" title="ui主题包下载">ui主题包</a></li>
					<li><a href="http://www.iguoguo.net/tag/图标" title="图标下载">图标</a></li>
					<li><a href="http://www.iguoguo.net/tag/按钮" title="按钮下载">按钮</a></li>
					<li><a href="http://www.iguoguo.net/tag/导航" title="导航下载">导航</a></li>
					<li><a href="http://www.iguoguo.net/tag/滚动条" title="滚动条下载">滚动条</a></li>
					<li><a href="http://www.iguoguo.net/tag/表单" title="表单设计下载">表单</a></li>
					<li><a href="http://www.iguoguo.net/tag/搜索框" title="搜索框设计下载">搜索框</a></li>
					<li><a href="http://www.iguoguo.net/tag/下拉列表" title="下拉列表下载">下拉列表</a></li>
					<li><a href="http://www.iguoguo.net/tag/开关按钮" title="开关按钮">开关按钮</a></li>
				</ul>
			</li>
			<li class="sub_list n4">其他
				<ul>
					<li><a href="http://www.iguoguo.net/tag/图层样式" title="图层样式">图层样式</a></li>
				</ul>
			</li>
		</ul>
	</div>
<?php }?>
<?php if (is_single() || is_home() || in_category(array(92,498)))  {?>
	<div id="headerBtm"></div>
<?php }?>
<!-- End: header -->
	<?php if(!is_home()){ ?>
	<div id="bannerAd"  <?php if(is_single()) { ?>class="singlePageAd"<?php } ?>>
		<div class="badCo ">
			<script type="text/javascript">
			/*底部横幅*/
			var cpro_id = "u1182817";
			</script>
			<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
		</div>
	</div>
	<?php } ?><!--banner ad end-->
	<div id="wrapper" class="clearfix">
		
		<div id="content" class="clearfix <?php if(is_single()) { ?>detailpange<?php } ?>">