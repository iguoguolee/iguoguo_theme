<?php get_header();?>
	<div id="container" class="clearfix siteList">
		
		<div id="post_container" class="clearfix">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post" id="post_<?php the_id();?>">
				<div class="entry">
					<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
					<img src="<?php $key="web_url2"; echo get_post_meta($post->ID, $key, true); ?>" id="companyLogo"/>
					</a>
					<div class="hiddenTitle"><span><?php the_title();?></span></div>
				</div>
			</div>
		<?php endwhile;?>
		</div>
			<div class="posts_nav">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
			</div>
		<?php else:?>
			<div class="post">
				<h2><?php _e('没有找到主题');?></h2>
			</div>
		<?php endif;?>
	</div>
	<?php get_footer();?>