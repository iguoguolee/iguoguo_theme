<?php get_header();?>
	<div id="container" class="single clearfix">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div class="post_content company" id="post_<?php the_id();?>">
				<img src="<?php $key="web_url2"; echo get_post_meta($post->ID, $key, true); ?>" id="companyLogo"/>
				<h1><?php the_title();?></h1>
				
				<div class="postmetadata">
					城市：<?the_tags('','   ','');?>&nbsp;&nbsp;
					<a href="<?php $key="web_url"; echo get_post_meta($post->ID, $key, true); ?>" class="downloadBtn rightTop" target="_blank">官方网站</a>
				</div>
				
				<div class="clearfix">
					
					<div class="companyWorks clearfix">
					<div class="companyDetail"><?php the_content();?></div>	
					<h3>经典作品：</h3>	
					<?php
							$title = get_the_title(get_the_id());

							$companyName = $title;
							$args = array(
							    'post_type'         => 'post',
							    'post_status'       => 'publish',
							    'posts_per_page'    => -1,
							    'meta_query' => array(
							        array(
							            'key'       => 'author',
							            'value'     => $companyName
							        )
							    )
							);

							$works = new WP_Query( $args );

							if ( $works -> have_posts() ) {
							    while ( $works ->have_posts() ) : $works ->the_post();?>						 
								 <div class="post">
									<?php
										
										$szPostContent = $post->post_content;
										$szSearchPattern = '~<img [^\>]*\ />~';
										preg_match_all( $szSearchPattern, $szPostContent, $aPics );
										$iNumberOfPics = count($aPics[0]);
										if ( $iNumberOfPics > 0 ) {
									?>
									<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
										<?php
											echo str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$aPics[0][0]);
											};
										?>
									</a>
									<div class="hiddenTitle"><span><?php the_title();?></span></div>
								</div>
							   <?php endwhile; 
							}
						 ?>
					</div>
				</div>
				
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
