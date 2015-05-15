<?php get_header();?>
	<div id="container" class="single">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post_content post_article" id="post_<?php the_id();?>">
				<h1><?php the_title();?></h1>
				<div class="entry clearfix">
					<?php if(is_page('推荐')){the_content(' ');}
					else if(is_page('网站地图')){
						echo ddsg_create_sitemap();
					}
					else{
						the_content(' ');
					}?>
				</div>
			</div>
		<?php endwhile;?>

		<?php else:?>

		<?php endif;?>
	
		<!-- 文章评论 -->
		<div class="comments-template">
			<?php comments_template(); ?>
		</div>

	</div>
	</div>
	<?php get_footer();?>
