<?php get_header();?>
	<div id="container" class="single clearfix">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post_content" id="post_<?php the_id();?>">
				<h1><?php the_title();?>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
				<div class="postmetadata">
					标签：<?php the_tags('','   ','');?>
					<?php
						$wpId = strval(get_the_time('Y'))."".strval(get_the_id());
						$title = get_the_title(get_the_id());
						$key="web_url"; 
						$url = get_post_meta($post->ID, $key, true);
					 ?>
					<a href="javascript:like('<?php echo $wpId;?>','<?php echo get_content_first_image(get_the_content());?>','<?php echo $title;?>',1)" id="likeButton"  class="<?php if($url=='') echo 'right'; ?>"><span class="iconfont">&#xe64c;</span>收藏</a>
					<?php if($url!="") {?>
					<a href="<?php  echo $url;?>" class="downloadBtn rightTop" target="_blank"><span class="iconfont">&#xe6eb;</span> 浏览酷站</a>
					<?php } ?>
					<script type="text/javascript">
						checkLike('<?php echo $wpId;?>');
					</script>
				</div>
				<div class="entry clearfix">
					<div id="sitePics" class="clearfix">
						<?php 
						$content_str = get_the_content();
						echo str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$content_str);
						?>
					
						
					</div>
					<?php if($url!="") {?>
					<div id="downBtnWrap">
						<a href="<?php $key="web_url"; echo get_post_meta($post->ID, $key, true); ?>" class="downloadBtn" target="_blank"><span class="iconfont">&#xe6eb;</span>浏览酷站</a>
					<div>
					<?php } ?>
				</div>
				
			</div>
			<div id="contentBtmAd">
					<div class="baidu">
						<script type="text/javascript">
						/*底部正方形广告*/
						var cpro_id = "u1258004";
						</script>
						<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
					</div>
					<div class="baidu">
						<script type="text/javascript">
						/*底部正方形广告*/
						var cpro_id = "u1258004";
						</script>
						<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
					</div>

					<div class="google">
						<script type="text/javascript">
						/*底部正方形广告*/
						var cpro_id = "u1258004";
						</script>
						<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
					</div>
				</div>
				<div id="baiduTJ">
				<script>document.write(unescape('%3Cdiv id="hm_t_38446"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://crs.baidu.com/t.js?siteId=359fa55d8f0a9a34c16d0b5937bb1a39&planId=38446&async=0&referer=') + encodeURIComponent(document.referrer) + '&title=' + encodeURIComponent(document.title) + '&rnd=' + (+new Date) + unescape('"%3E%3C/script%3E'));</script>
				</div>

				<!-- 文章评论 -->
				<div class="comments-template">
					<?php comments_template(); ?>
				</div>
		<?php endwhile;?>
			
		<?php else:?>
			<div class="post">
				<h2><?php _e('没有找到主题');?></h2>
			</div>
		<?php endif;?>

	</div>
	</div>
	</div>
	<?php get_footer();?>
