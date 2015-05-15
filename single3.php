<?php get_header();?>
	<div id="container" class="single ui clearfix">
	<?php if(have_posts()):?><?php while(have_posts()){the_post();?>
		<div id="detail_top">
			<h1><?php the_title();?></h1>
			<div class="postmetadata">
				标签：<?php the_tags('','   ','');?>
				<?php
					$wpId = strval(get_the_time('Y'))."".strval(get_the_id());
					$title = get_the_title(get_the_id());
				 ?>
				<a href="javascript:like('<?php echo $wpId;?>','<?php echo get_content_first_image(get_the_content());?>','<?php echo $title;?>',2)" id="likeButton"><span class="iconfont">&#xe64c;</span>收藏</a>
				<a href="#downloadNow" class="downloadBtn rightTop"><span class="iconfont">&#xe703;</span>下载</a>
				<script type="text/javascript">
					checkLike('<?php echo $wpId;?>');
				</script>
			</div>
     </div>
		<?php get_sidebar();?>
		<div id="container_left">
		
			<div class="post_content" id="post_<?php the_id();?>">
				
				<div class="entry clearfix">
					
					<?php
						$szPostContent = $post->post_content;
						$szSearchPattern = '~<img [^\>]*\ />~';
						preg_match_all( $szSearchPattern, $szPostContent, $aPics );
						$iNumberOfPics = count($aPics[0]);
						if ( $iNumberOfPics > 0 ) {
					?>
					<?php

					  $custom_fields = get_post_custom($post->id);
					  $my_custom_field = $custom_fields['web_url'];
					  if(isset($my_custom_field)){
						 foreach ( $my_custom_field as $key => $value )
							$weburl= $value;
						}

					?>
					<?php } ?>

					<div id="intro">
						<?php 
						$content_str = get_the_content();
						$content_str =  str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$content_str);
						$content_str = str_replace("http://bcs.duapp.com/iguoguo-pic/uploads/auto_save_image/","http://www.iguoguo.net/wp-content/uploads/auto_save_image/",$content_str);
						echo $content_str;
						?>
						
					</div>
					<a id="downloadNow"></a>
					<div class="downBtnWrap">
						<?php if(!get_post_meta($post->ID, "web_url2", true)): ?>
						<a href="<?php $key="web_url"; echo get_post_meta($post->ID, $key, true); ?>" class="downloadBtn" target="_blank"><span class="iconfont inline">&#xe703;</span> 本站下载</a>
						<?php endif; ?>
						<?php if(get_post_meta($post->ID, "web_url2", true)): ?>
						<a href="<?php $key2="web_url2"; echo get_post_meta($post->ID, $key2, true); ?>" class="downloadBtn" target="_blank"><span class="iconfont inline">&#xe703;</span> 百度云下载</a>
						<?php endif; ?>
						<?php if(get_post_meta($post->ID, "web_url3", true)): ?>
						<a href="<?php $key3="web_url3"; echo get_post_meta($post->ID, $key3, true); ?>" class="downloadBtn" target="_blank"><span class="iconfont inline">&#xe703;</span> 源址下载</a>
						<?php endif; ?>
						<strong>特别提示</strong>
						本站所有资源均来自互联网，版权归原作者所有，仅供研究学习使用。<br />
						对资源有任何异议或资源损坏等可留言告知我们。
					</div>
					<script>document.write(unescape('%3Cdiv id="hm_t_29165"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://crs.baidu.com/t.js?siteId=359fa55d8f0a9a34c16d0b5937bb1a39&planId=29165&async=0&referer=') + encodeURIComponent(document.referrer) + '&title=' + encodeURIComponent(document.title) + '&rnd=' + (+new Date) + unescape('"%3E%3C/script%3E'));</script>					
					<div id="wumiiDisplayDiv"></div>
				</div>
			</div>
				

				<!-- 文章评论 -->
				<div class="comments-template">
					<?php comments_template(); ?>
				</div>


		<?php }?>

		<?php else:?>
			<div class="post">
				<h2><?php _e('没有找到主题');?></h2>
			</div>
		<?php endif;?>
	</div>
	</div>
	</div>
	<?php get_footer();?>
