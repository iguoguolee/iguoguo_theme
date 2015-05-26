Zepto(function($){

	//打开关闭左侧菜单
	$(".roundNav").on("tap",function(){
		webUI.toggleMenu();
	});
	//打开关闭右侧菜单
	$("#user_btn").on("tap",function(){
		webUI.toggleUserPanel();	
	});
	
	//展开文章详情页
	$(".content_list").on("click","li",function(event){
		
		var post = {};
		post.postId = $(this).prop("id").split("_")[1];
		post.postTitle = $(this).find("h3").text();
		post.postMeta = $(this).find(".listMeta");
		post.pic = $(this).find('img').eq(0).prop("src");

		dataManager.loadPost(post);
		utils.setLocation("id",post.postId);
		webUI.openDetail(true,post);
		event.preventDefault();
	});
	//关闭详情页
	$("#back_btn").on("tap",function(event){
		
		utils.setLocation("cat",config.cat);
		webUI.openDetail(false);
		event.preventDefault();
	});


	if(!utils.checkHash()){//判断地址参数
		dataManager.loadNewList();
	}

	$('#details').on("swipeRight",function(e){
		webUI.openDetail(false)	
	});

	$("#overlay").on("tap",function(e){
		if(show_left) $('.roundNav').trigger("tap");
		if(shown_right) $("#user_btn").trigger("tap");
	});
	//导航
	$(".main_menu").on("tap","a",function(e){
		var catId = $(this).data("catid");

		$(".content_list").html("");
		$(this).addClass('current').siblings().removeClass('current');
		$(".roundNav").trigger("tap");
		dataManager.loadCat(catId);

		utils.setLocation("cat",catId);

	});
	$("#visit_btn,#download_btn").on("touchstart",function(e){
		webUI.showWebViews($(this).prop("href"));
	});

	$("#login_btn").on("touchstart",function(e){
		var username = $("#username").val(),
			psw      = $("#psw").val();
		var islogin  = dataManager.login(username,psw);

		if(islogin==true){
			checkSession();
			$("#error").addClass("hidden");
		}else{
			$("#error").text(islogin).removeClass("hidden");
		}
	})
});

var config = {
	disSet:50,
	top:0
}
//列表滚动加载
function onListScroll (){
	var curTop = $("#main")[0].scrollTop ;
		if(curTop>=$("#main").height()-$(window).height()-config.disSet)
		{
			dataManager.loadNewList(1);
			$("#main").off("scroll",onListScroll);
		}
}
//详情页滚动显示或隐藏底部工具条
function onDetailScroll(){
	var curTop = $("#details")[0].scrollTop ;
	if(curTop>=config.top)
	{
		$("#detail_toolbar").removeClass("showDetail");
	}else{
		$("#detail_toolbar").addClass("showDetail");
	}
	config.top = curTop;
}