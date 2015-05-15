<?php get_header();?>
	<div id="container" class="clearfix uiList">
		<div id="post_container" class="clearfix">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post" id="post_<?php the_id();?>">
				
				
				<div class="entry">
					<?php //the_content(' ');?>
					<?php
						$szPostContent = $post->post_content;
						$szSearchPattern = '~<img [^\>]*\ />~';
						preg_match_all( $szSearchPattern, $szPostContent, $aPics );
						$iNumberOfPics = count($aPics[0]);
						if ( $iNumberOfPics > 0 ) {
					?>
					<div class="uiImg">
					<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
						<?php
							$imgUrl =  str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$aPics[0][0]);
							$imgUrl = str_replace("http://bcs.duapp.com/iguoguo-pic/uploads/auto_save_image/","http://www.iguoguo.net/wp-content/uploads/auto_save_image/",$imgUrl);
							echo $imgUrl;
							};
						?>
					</a>
					</div>
					<div class="hiddenTitle"><span><?php the_title();?></span></div>
				</div>
				<div class="postmetadata">
					<span class="iconfont">&#xe65f;</span>
					<?php the_time("20y-m-d");?>&nbsp;&nbsp;
					<div class="metaRight">
						<span class="iconfont">&#xe652;</span>
						<?php if(function_exists('the_views')) { the_views(); } ?>
					</div>
					<!--<span class="comment_icon icon"></span>-->
					<?php //popuplink( _( '评论', 'iguoguo' ), _( '1 评论', 'iguoguo' ), __( '% 评论', 'iguoguo' ) );?>
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