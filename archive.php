<?php get_header();?>
	<div id="container" class="clearfix siteList">
		<div id="indexTitle">标签：<?php single_cat_title(); ?></div>
		<div id="post_container" class="clearfix">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post" id="post_<?php the_id();?>">
				
				
				<div class="entry">
					<?php //the_content(' ');?>
					<?php
						$key="author"; 
						$author=get_post_meta($post->ID, $key, true);
						
						$szPostContent = $post->post_content;
						$szSearchPattern = '~<img [^\>]*\ />~';
						preg_match_all( $szSearchPattern, $szPostContent, $aPics );
						$iNumberOfPics = count($aPics[0]);
						if ( $iNumberOfPics > 0 ) {
					?>
					<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
						<?php
							echo $aPics[0][0];
							};
						?>
					</a>
					<div class="hiddenTitle"><span><?php the_title();?></span></div>
				</div>
				<div class="postmetadata">
					<?php if($author){?>
					<span class="author list tip" title="<?php echo $author; ?>"></span>
					<?php } ?>
					<span class="date_icon icon"></span>
					<?php the_time("20y-m-d");?>&nbsp;&nbsp;
					<div class="metaRight">
						<span class="view_icon icon"></span>
						<?php if(function_exists('the_views')) { the_views(); } ?>
					</div>
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