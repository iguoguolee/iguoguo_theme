<div id="right">
<?php if(is_home()){?>
<div id="book">
	<a href="http://t.sina.com/craboy" title="进入我们的新浪微博" target="_blank">进入我们的新浪微博</a>
	<a href="<?php bloginfo('rss2_url');?>" title="rss订阅"  target="_blank">rss订阅</a>
</div>
<?php } ?>
<div id="sideBar">
		
		<ul>
			<li class="rightAD">

					<script type="text/javascript">
					/*底部正方形广告*/
					var cpro_id = "u1258004";
					</script>
					<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
			</li>
			<?php if(in_category('144')):?>
			<li class="sideCell">
				<h4>UI标签云</h4>
				<div class="tagCloud">
					<a href='http://www.iguoguo.net/tag/app' class='tag-link-20' title='app GUI下载'>app GUI</a>
					<a href='http://www.iguoguo.net/tag/网页模板' class='tag-link-24' title='网页模板下载'>网页模板</a>
					<a href='http://www.iguoguo.net/tag/psd' class='tag-link-24' title='psd格式UI下载'>psd</a>
					<a href='http://www.iguoguo.net/tag/png' class='tag-link-20' title='png格式UI下载'>png</a>
					<a href='http://www.iguoguo.net/tag/矢量' class='tag-link-20' title='矢量UI下载'>矢量</a>
					<a href='http://www.iguoguo.net/tag/主题包' class='tag-link-20' title='UI主题包下载'>UI主题包</a>
					<a href='http://www.iguoguo.net/tag/界面' class='tag-link-20' title='界面下载'>界面</a>
					<a href='http://www.iguoguo.net/tag/图标' class='tag-link-20' title='按钮'>图标</a>
					<a href='http://www.iguoguo.net/tag/导航' class='tag-link-20' title='导航'>导航</a>
					<a href='http://www.iguoguo.net/tag/按钮' class='tag-link-20' title='按钮'>按钮</a>
					<a href='http://www.iguoguo.net/tag/下拉列表' class='tag-link-20' title='下拉列表'>下拉列表</a>
					<a href='http://www.iguoguo.net/tag/滚动条' class='tag-link-20' title='滚动条'>滚动条</a>
					<a href='http://www.iguoguo.net/tag/搜索框' class='tag-link-20' title='搜索框'>搜索框</a>
					<a href='http://www.iguoguo.net/tag/表单' class='tag-link-20' title='按钮'>表单</a>
					<a href='http://www.iguoguo.net/tag/单选框' class='tag-link-20' title='单选框'>单选框</a>
					<a href='http://www.iguoguo.net/tag/复选框' class='tag-link-20' title='复选框'>复选框</a>
					<a href='http://www.iguoguo.net/tag/开关按钮' class='tag-link-20' title='开关按钮'>开关按钮</a>
					<a href='http://www.iguoguo.net/tag/iphone' class='tag-link-20' title='iphone'>iphone</a>
					<a href='http://www.iguoguo.net/tag/ipad' class='tag-link-20' title='ipad'>ipad</a>
				</div>
			</li>
				
			<?php endif;?>
			
			<?php if(function_exists('get_most_viewed_category')&&in_category('92')):?>
				<li class="sideCell">
					<h4>热门分享</h4>
					<ul class="hotArticle">
						<?php get_most_viewed_category(92,'both',6); ?>   
					</ul>
				</li>

			<?php endif; ?>  
			<?php if(function_exists('get_most_viewed_category')&&in_category('144')):?>
				<li class="sideCell">
					<h4>热门UI资源</h4>
					<ul class="hotArticle">
						<?php get_most_viewed_category(144,'both',6); ?>   
					</ul>
				</li>
			<?php endif; ?> 
			<li class="rightAD" id="fixedAd">
					<div class="rightAD">
					<script type="text/javascript">
					/*底部正方形广告*/
					var cpro_id = "u1258004";
					</script>
					<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
					</div>
					<div id="detailNav"></div>
			</li>
			<?php if(is_single()&&in_category('92')):?>
			<script type="text/javascript" src="http://www.iguoguo.net/wp-content/themes/iguoguo/js/detail_nav.js"></script>
			<?php endif?>
		</ul>
	</div>
</div>