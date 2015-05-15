<?php get_header();?>
	<div id="container">
		<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
			<div  id="post_<?php the_id();?>">
				<h1><?php the_title();?></h1>

				<div class="entry clearfix">
					<?php
					get_template_part( 'loop', 'attachment' );
					?>
				</div>
			</div>
				
		<?php endwhile;?>
			<!--百度底部横幅广告 start-->
			<script type="text/javascript">
			/*内容也底部横幅*/
			var cpro_id = "u1176026";
			</script>
			<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
			<!--百度底部横幅广告 end-->
			
		<?php else:?>
			<div class="post">
				<h2><?php _e('没有找到主题');?></h2>
			</div>
		<?php endif;?>
			

	</div>
	</div>
