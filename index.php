<?php get_header();?>
	<div id="container" class="clearfix siteList">
		<div id="indexTitle">
			<a href="http://www.iguoguo.net/category/酷站欣赏" class="more">更多酷站欣赏&gt;&gt;</a>
			<span>酷站欣赏</span>
			<a href="http://www.iguoguo.net/category/H5" title="H5酷站">H5酷站</a>
			<a href="http://www.iguoguo.net/tag/flash" title="flash酷站">flash</a>
			<a href="http://www.iguoguo.net/tag/css" title="css酷站">css</a>
			<a href="http://www.iguoguo.net/tag/jquery" title="jquery酷站">jquery</a>
			<a href="http://www.iguoguo.net/tag/韩国" title="韩国酷站">韩国</a>
			<a href="http://www.iguoguo.net/tag/地产" title="地产酷站">地产</a>
			<a href="http://www.iguoguo.net/tag/html5" title="html5酷站">html5</a>
		</div>
		<?php query_posts('cat=1&showposts=12');?>
		<div id="post_container" class="clearfix">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post();?>
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
							echo str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$aPics[0][0]);
							};
						?>
					</a>
	
				</div>
				<div class="postmetadata">
					<?php if($author){?>
					<span class="author tip" title="<?php echo $author; ?>"></span>
					<?php } ?>
					<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
				</div>
			</div>
			<?php endwhile;?>
			<?php wp_reset_query();?>
		
		<?php endif;?>
		</div>
	<div id="bannerAd" class="center">
		<div class="badCo">
			<script type="text/javascript">
			/*960*90，创建于2013-1-6*/
			var cpro_id = "u1182713";
			</script>
			<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
		</div>
	</div>
	
	<div id="indexTitle">
		<a href="http://www.iguoguo.net/category/ui"  class="more">更多UI素材&gt;&gt;</a>
		<span>UI素材</span>
		<a href="http://www.iguoguo.net/tag/app" title="app GUI 下载">app</a>
		<a href="http://www.iguoguo.net/tag/主题包" title="ui主题包下载">ui主题包</a>
		<a href="http://www.iguoguo.net/tag/psd" title="psd下载">psd</a>
		<a href="http://www.iguoguo.net/tag/网页模板" title="网页模板下载">网页模板</a>
		<a href="http://www.iguoguo.net/tag/图标" title="图标下载">图标</a>
	</div>
		<?php query_posts('cat=144&showposts=8');?>
		<div id="post_container" class="clearfix">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post();?>
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
						<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
						<?php
							echo str_replace("http://www.iguoguo.net/wp-content/","http://bcs.duapp.com/iguoguo-pic/",$aPics[0][0]);
							};
						?>
					</a>
	
				</div>
				<div class="postmetadata">
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?> 
					<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
				</div>
			</div>
			<?php endwhile;?>
			<?php wp_reset_query();?>
	
		<?php endif;?>
		</div>
	<div id="indexTitle">
		<a href="http://www.iguoguo.net/category/分享"  class="more">更多专题分享&gt;&gt;</a>
		<span>专题分享</span>
		<a href="http://www.iguoguo.net/tag/交互设计" title="交互设计" >交互设计</a>
		<a href="http://www.iguoguo.net/tag/响应式设计" title="响应式网页设计">响应式网页设计</a>
		<a href="http://www.iguoguo.net/tag/jquery插件" title="jquery插件">jquery插件</a>
		<a href="http://www.iguoguo.net/tag/css3" title="css3">css3</a>
	</div>
		<?php query_posts('cat=92&showposts=4');?>
		<div id="post_container" class="clearfix indexfx">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post();?>
			<div class="post fxlist" id="post_<?php the_id();?>">
				<div class="imgBox">
					<?php
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
	
				</div>
				<div class="postmetadata">
					<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
				</div>
			</div>
			<?php endwhile;?>
			<?php wp_reset_query();?>
	
		<?php endif;?>
		</div>
	<div id="bannerAd" class="center">
		<div class="badCo">
			<script type="text/javascript">
			/*底部横幅*/
			var cpro_id = "u1182817";
			</script>
			<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
		</div>
	</div>

	<div id="flinks">
				<ul>
					<li>友情链接：</li>
					<?php get_links_list();?>
				</ul>
	</div>
	
	</div><script type="text/javascript" name="baidu-tc-cerfication" src="http://apps.bdimg.com/cloudaapi/lightapp.js#21c76cc494376475b0b8a907320d317a"></script><script type="text/javascript">window.bd && bd._qdc && bd._qdc.init({app_id: '29e9325d5aa089ed1187ec7a'});</script>
	<?php get_footer();?>