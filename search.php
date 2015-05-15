<?php get_header();?>
<style type="text/css">
	#header{margin-top:0;}
</style>
	<div id="container" class="clearfix">
		<div id="indexTitle">搜索结果</div>
		<div id="post_container" class="clearfix">
			<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post post_article fxlist" id="post_<?php the_id();?>">
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
							$imgUrl =  str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$aPics[0][0]);
							$imgUrl = str_replace("http://bcs.duapp.com/iguoguo-pic/uploads/auto_save_image/","http://www.iguoguo.net/wp-content/uploads/auto_save_image/",$imgUrl);
							echo $imgUrl;
						?>
					</a>
					</div>
					<?php } ?>
				<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
				<div class="fxMetadata">
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