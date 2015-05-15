<?php get_header();?>
	<div id="container" class="clearfix single2 ">
	<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
	<div id="detail_top">
		<h1><?php the_title();?>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
		<div class="postmetadata">
			标签：<?php the_tags('','   ','');?>
			<?php
				$wpId = strval(get_the_time('Y'))."".strval(get_the_id());
				$title = get_the_title(get_the_id());
			 ?>
			<a href="javascript:like('<?php echo $wpId;?>','<?php echo get_content_first_image(get_the_content());?>','<?php echo $title;?>',3)" id="likeButton" class="right"><span class="iconfont">&#xe64c;</span> 收藏</a>
			<script type="text/javascript">
				checkLike('<?php echo $wpId;?>');
			</script>
		</div>
	</div>
	<?php get_sidebar();?>
	<div id="container_left">
		
			<div class="post_content post_article" id="post_<?php the_id();?>">
				<div class="entry clearfix">
					<?php the_content(' ');?>
					
					<!--百度分享-->
					<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
					
					<br/><strong>=======关于爱果果======</strong><br/>
					爱果果iguoguo是一个专门从事酷站收藏、UI素材推荐、网页设计专题分享的设计分享网站，为网页设计师/交互设计师们带来全球最前沿的设计灵感及最实用的设计资源 <br/><br/>
					<b>微博:</b><a href="http://www.weibo.com/craboy" target="_blank">爱果果酷站</a><br/><br/>
					<b>微信:</b><br /> <img src="http://www.iguoguo.net/wp-content/themes/iguoguo/images/weixin.jpg" /><br /> 请扫码关注,果哥每天为你带来新鲜灵感<br/><br/>
					<b>花瓣:</b><a href="http://huaban.com/iguoguo/" target="_blank">爱果果</a><br/>看果哥平时都收藏东东啊<br/><br/>
					<b>设计导航:</b><a href="http://www.iguoguo.net/daohang">http://www.iguoguo.net/daohang</a> <br/>果哥私人设计导航拿出来献给大家<br/><br/><br/>
					
	
					
					
					<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					<!--百度推荐-->
					<script>document.write(unescape('%3Cdiv id="hm_t_29165"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://crs.baidu.com/t.js?siteId=359fa55d8f0a9a34c16d0b5937bb1a39&planId=29165&async=0&referer=') + encodeURIComponent(document.referrer) + '&title=' + encodeURIComponent(document.title) + '&rnd=' + (+new Date) + unescape('"%3E%3C/script%3E'));</script>
				
				
				<!-- 文章评论 -->
				<div class="comments-template">
					<?php comments_template(); ?>
				</div>
		<?php endwhile;?>

		</div>
		<?php else:?>
			<div class="post">
				<h2><?php _e('没有找到主题');?></h2>
			</div>
		<?php endif;?>
	
		

	</div>
	</div>
	</div>

	<?php get_footer();?>
