<?php get_header();?>
	<div id="container" class="clearfix">
		<div id="indexTitle"><?php
					printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?> </div>
		<div id="post_container" class="clearfix">
			<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post post_article fxList" id="post_<?php the_id();?>">
					<?php
						$szPostContent = $post->post_content;
						$szSearchPattern = '~<img [^\>]*\ />~';
						preg_match_all( $szSearchPattern, $szPostContent, $aPics );
						$iNumberOfPics = count($aPics[0]);
						if ( $iNumberOfPics > 0 ) {

					?>
					<div class="imgBox">
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"  target="_blank">
						<?php
							echo $aPics[0][0];
						?>
					</a>
					</div>
					<?php } ?>
				<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
				<div class="fxMetadata">
					Tags： <?php the_tags('',' , ','');?>&nbsp;
					<?php edit_post_link('编辑','| ','')?>&nbsp;
					<?php the_date();?>&nbsp;&nbsp;
					<?php if(function_exists('the_views')) { the_views(); } ?>
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