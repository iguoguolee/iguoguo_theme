				<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$toCat = $_GET['toCat']?$_GET['toCat']:0;
					if($toCat==0){
						$args = array(
							'paged' => $paged,
							'category__and'=>array(536),
							'showposts'=>12,
							'order'=>'DESC'
							);
					}else if($toCat==92){
						$args = array(
							'paged' => $paged,
							'category__and'=>array($toCat),
							'tag' =>'h5',
							'showposts'=>12,
							'order'=>'DESC'
						);
					}else{
						$args = array(
							'paged' => $paged,
							'category__not_in'=>array(536),
							'tag' =>'html5',
							'showposts'=>12,
							'order'=>'DESC'
						);
					}
					$query = query_posts($args);
				?>
				<?php if(have_posts()){?>
					<?php while(have_posts()):the_post();?>
					<?php
						$key="author"; 
						$author=get_post_meta($post->ID, $key, true);
					?>
				<li class="depth0"  id="post_<?php the_id();?>">
					<div class="imgBox"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" target="_blank">
					<img src="<?php 	 echo get_content_first_image(false); ?>" title="<?php the_title();?>" >
					
					</a></div>
					<h3><?php the_title();?></h3>
					<div class="listMeta">
						<i class="iconfont">&#xe65f;</i>
						<span><?php the_time("20y-m-d");?></span>
						<i class="iconfont">&#xe7e6;</i>
						<span><?php if(function_exists('the_views')) { the_views(); } ?></span>
					</div>
				</li>
				<?php endwhile; wp_reset_query();?>
			<?php }else{ ?>
				<div id="nomoreData">没有更多的内容了，爱果果会持续更新哒,请多关注哦！</div>
				<script>
					isNoMoreData = true;
				</script>
			<?php }?>