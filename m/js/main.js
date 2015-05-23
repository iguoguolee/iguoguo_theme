Zepto(function($){
	var show_left   = false,
		shown_right = false;

	//打开关闭左侧菜单
	$(".roundNav").on("tap",function(){
		show_left = !show_left;
		$(this).toggleClass("open");
		$("#main,header").toggleClass("show_left");	
		if(show_left){
			$("#left_side,#overlay").addClass("shown");
			$("body").on("touchmove",function(){//禁止拖动
				return false;
			})
		}else{
			setTimeout(function(){//动画完成后隐藏
				$("#left_side,#overlay").removeClass("shown");
			 },500);
			$("body").off("touchmove")
		}
			
	});
	//打开关闭右侧菜单
	$("#user_btn").on("tap",function(){
		shown_right = !shown_right;
		$(this).toggleClass("open");
		$("#main,header").toggleClass("show_right");
		if(shown_right){
			$("#right_side,#overlay").addClass("shown");
			$("body").on("touchmove",function(){//禁止拖动
				return false;
			})
		}else{
			setTimeout(function(){
				$("#right_side,#overlay").removeClass("shown");
			 },500);
			$("body").off("touchmove")
		}		
	});
	
	//展开文章详情页
	$(".content_list").on("click","li",function(event){
		
		var post = {};
		post.postId = $(this).prop("id").split("_")[1];
		post.postTitle = $(this).find("h3").text();
		post.postMeta = $(this).find(".listMeta");
		showPost(post);
		event.preventDefault();
	});
	//关闭详情页
	$("#back_btn").on("tap",function(event){
		$("#main,header,#details,#detail_header").removeClass("showDetail");
		event.preventDefault();
	});


	if(!checkHash()){//判断地址参数
		loadNewList();
	}

	$('#details').on("swipeRight",function(e){
		$('#back_btn').trigger("tap");		
	});

	$("#overlay").on("click",function(e){
		if(show_left) $('.roundNav').trigger("tap");
		if(show_right)$("#user_btn").trigger("tap");
	});
	//导航
	$(".main_menu").on("tap","a",function(e){
		var catId = $(this).data("catid");
		if(config.cat==catId||!catId||catId=='')return;
		config.cat = catId;
		config.tag = 0;
		pager.page = 1;

		$(".content_list").html("");
		$(this).addClass('current').siblings().removeClass('current');
		$(".roundNav").trigger("tap");
		loadNewList();

	});
});
//列表滚动加载
function onListScroll (){
	var curTop = document.body.scrollTop ;
		console.warn(curTop);
		if(curTop>=$(document).height()-$(window).height()-config.disSet)
		{
			pager.page++
			loadNewList();
			$(window).off("scroll",onListScroll);
		}
}
var pager = {
		page:1,
		totalPage:1	
	},
	config = {
		disSet:150,
		cat:1,
		id:0,
		tag:0
	},
	curPost ={
		
	};

//判断地址栏参数
//#cat_1: 栏目id:1列表
//#tag_2: 标签id:2列表
//#id_1 : 文章id:1内容
function checkHash()
{
	var hash = window.location.hash;
	if(hash=="") return false;
	console.warn(hash);
	var params = hash.split("_");
	console.warn(params);
	switch(params[0]){
		case "#cat":
			config.cat = param[1];
			pager.page =param[2]?param[2]:1;
			pager.tag = "";
			loadNewList(pager.page);
			break;
		case"#id":
			config.id = params[1];
			showPost(config.id);
			loadNewList(pager.page);
			break;
		case "#tag":
			config.tag = param[1];
			pager.cat = "";
			pager.page =param[2]?param[2]:1;
			loadNewList(pager.page);
			break;			
	}
	return true;
	
}
//文章详情
//post: 文章id,或者文章参数Object
function showPost(post)
{
	var postId;
	$("#main,header,#details,#detail_header").addClass("showDetail");
	if(post.postId&&post.postId!="")
	{
		$("#detail_title").text(post.postTitle);
		$("#details .listMeta").html(post.postMeta.html());
		$("#detail_co").html("");
		
		postId = post.postId;
	}else{
		postId = post;
	}
	$.ajax({
		type:"get",
		dataType:"json",
		url:"http://www.iguoguo.net/",
		data:{'pid':postId,'action':'ajax_webapp'},
		async:true,
		beforeSend:function(){
			$('#post_loading').removeClass('hidden');
		},
		success:function(data){
			parsePostDetail(data).appendTo("#detail_co").find('img').eq(0).css('display','none');
			$('.detail_toolbar').data("id",postId);
			$("#likes").html(data.likes);
			if(data.web_url&&data.is_site){
				$("#visit_btn").prop("href",data.web_url).show();
			}
			if(data.web_url2&&data.is_ui)
			{
				$("#download_btn").prop("href",data.web_url2).show();
			}
			$("#comment_btn").show().find("#comments").html(data.comments);
			$('#post_loading').addClass('hidden');

		}
	});
	
}

//加载新的列表内容
function loadNewList(){
		$.ajax({
				type:"get",
				dataType:"json",
				url:"http://www.iguoguo.net/",
				data:{'page':pager.page,'cat':config.cat,'tag':config.tag,'action':'ajax_webapp'},
				async:true,
				beforeSend:function(){
					$('#list_loading').removeClass('hidden');
				},
				success:function(datas){
					var newElements = "";
					$.each(datas,function(index,data){
						newElements += parsePost(data);
					});
					$(newElements).appendTo(".content_list");
					$(window).on("scroll",onListScroll);
					$('#list_loading').addClass('hidden');
				}
			});
	}

//文章列表中内容解析成HTML
function parsePost(data)
{
	var postHtml = '<li class="clearfix"  id="post_'+data["id"]+'">'+
		'<div class="imgBox">'+
			'<a href="?id='+data["id"]+'" title="'+data["title"]+'" target="_blank">'+
				'<img src="'+data["pic"]+'" title="'+data["title"]+'" >	'+				
			'</a>'+
		'</div>'+
		'<h3>'+data["title"]+'</h3>'+
		'<div class="listMeta">'+
			'<i class="iconfont">&#xe65f;</i>'+
			'<span>'+data["time"]+'</span>'+
			'<i class="iconfont">&#xe7e6;</i>'+
			'<span>'+data["views"]+'</span>'+
		'</div>'+
	'</li>';
	return postHtml;
}
//解析文章详情页
function parsePostDetail(data){
	var detailHtml = "";
	//data = $.parseJSON(data);
	var tagsArr = data.tags.split('|');

	if(data.tags&&tagsArr.length>0){
		detailHtml+='<div id="tags">';
		$.each(tagsArr, function(index,tag){
			if(index>=tagsArr.length-1) return;
			detailHtml+='<a href="tag_"'+tag+'>'+tag+'</a>';
		});
		detailHtml+='</div>';
	}
	if(data.cats&&data.cats.length>0){
		detailHtml+='<div id="cats">';
		$.each(data.cats, function(cat){
			detailHtml+='<a href="cat_"'+cat+'>'+cat+'</a>';
		});
		detailHtml+='</div>';
	}
	if(data.author&&data.author!="")
	{
		detailHtml+='<div id="author">'+data.author+'</div>';
	}
	detailHtml+='<div id="post_content">'+data.content+'</div>';
	
	return $(detailHtml);
}
