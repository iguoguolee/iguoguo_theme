	
</div>
</div>
<!--banner ad start-->
	<?php if(!is_home()){ ?>
	<div id="bannerAd" class="footer">
		<div class="badCo">
			<script type="text/javascript">
			/*底部横幅*/
			var cpro_id = "u1182817";
			</script>
			<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
		</div>
	</div>
	<?php } ?><!--banner ad end-->
	
<div id="footer">
	<div id="footerWrapper">
		<div id="footerLinks">
			<a href="http://www.iguoguo.net/关于">关于我们</a>
			<a href="http://www.iguoguo.net/联系">联系我们</a>
			<a href="http://www.iguoguo.net/推荐酷站">推荐酷站</a>
			<a href="http://www.iguoguo.net/daohang">设计导航</a>
		</div>

		<div id="copyright"> 
			Copyright © 2010-2015 <a href="http://www.iguoguo.net">iguoguo.net</a> .All Rights Reserved  鲁icp备12028629号 QQ:278653847
			<br />官方QQ群：<font color="white">252535200</font>, 微信公众号:<font color="white">iguoguo_net</font>
		</div>

		<div id="useTip">
			建议使用1280*800以上分辨率，使用Chrome、Firefox、Safari、ie10版本浏览器。
			<br />
			<script src="http://s15.cnzz.com/stat.php?id=2334704&web_id=2334704" language="JavaScript"></script>
				<!--百度统计-->
			  	<script type="text/javascript">
					var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
					document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F359fa55d8f0a9a34c16d0b5937bb1a39' type='text/javascript'%3E%3C/script%3E"));
				</script>
		</div>
	</div>
</div>

</div>
  <script type="text/javascript">
  <!--
	$(document).ready(init);
	function init()
	{
		getUserPanel();
		<?php if(is_single()) {?>
		if($("#intro img").length>1){
			$("#intro img:first").css("display","none");
		}
		if($("#sitePics img").length>1){
			$("#sitePics img:first").css("display","none");
		}
		<?php }?>
	}
  //-->
  </script>
  <?php wp_footer();?>
</body>
</html>