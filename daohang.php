<?php
/*
Template Name: daohang
*/
?>
<?php get_header();?>
<script type="text/javascript" src="http://dpcool.net/tplv2/js/jquery.masonry.min.js"></script>
<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
	<h1><?php the_title();?></h1>
	<div id="container" class="full_cross">
			<div class="post_content post_article" id="daohang">
				
				<div class="postmetadata"> 			</div> 
				<div class="entry clearfix">
				<div id="post_container" class="clearfix">
						<?php the_content(' ');?>
				</div>
				</div>
			</div>
		<?php endwhile;?>

		<?php else:?>

		<?php endif;?>
<script>
	$(function(){
		var container = $("#post_container");
		container.masonry({  
		    itemSelector : '.post' 
		  }); 
	});
</script>
	
</div>
	</div>
	<?php get_footer();?>
