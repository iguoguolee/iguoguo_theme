Zepto(function($){
	var show_left   = false,
		shown_right = false;

	checkSession();

	//打开关闭左侧菜单
	$(".roundNav").on("tap",function(){
		show_left = !show_left;
		$(this).toggleClass("open");
		$("#main,header,#overlay").toggleClass("show_left");	
		if(show_left){
			$("#left_side").addClass("shown");
			$("body").on("touchmove",function(){//禁止拖动
				return false;
			})
		}else{
			setTimeout(function(){//动画完成后隐藏
				$("#left_side").removeClass("shown");
			 },500);
			$("body").off("touchmove")
		}
			
	});
	//打开关闭右侧菜单
	$("#user_btn").on("tap",function(){
		shown_right = !shown_right;
		$(this).toggleClass("open");
		$("#main,header,#overlay").toggleClass("show_right");
		if(shown_right){
			$("#right_side").addClass("shown");
			$("body").on("touchmove",function(){//禁止拖动
				return false;
			})
		}else{
			setTimeout(function(){
				$("#right_side").removeClass("shown");
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
		post.pic = $(this).find('img').eq(0).prop("src");
		showPost(post);
		setLocation("id",post.postId);
		event.preventDefault();
	});
	//关闭详情页
	$("#back_btn").on("tap",function(event){
		$("#main,header,#details,#detail_header,#detail_toolbar").removeClass("showDetail");
		setLocation("cat",config.cat);
		$("#details").off("scroll");
		//event.preventDefault();
	});


	if(!checkHash()){//判断地址参数
		loadNewList();
	}

	$('#details').on("swipeRight",function(e){
		$('#back_btn').trigger("tap");		
	});

	$("#overlay").on("tap",function(e){
		if(show_left) $('.roundNav').trigger("tap");
		if(shown_right) $("#user_btn").trigger("tap");
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

		setLocation("cat",config.cat);

	});
	$("#visit_btn,#download_btn").on("touchstart",function(e){
		showWebViews($(this).prop("href"));
	});

	$("#login_btn").on("touchstart",function(e){
		var username = $("#username").val(),
			psw      = $("#psw").val();
		var islogin  = login(username,psw);
		console.warn(islogin);

		if(islogin==true){
			checkSession();
			$("#error").addClass("hidden");
		}else{
			$("#error").text(islogin).removeClass("hidden");
		}
	})
});
//列表滚动加载
function onListScroll (){
	var curTop = $("#main")[0].scrollTop ;
		console.warn(curTop);
		if(curTop>=$("#main").height()-$(window).height()-config.disSet)
		{
			pager.page++
			loadNewList();
			$("#main").off("scroll",onListScroll);
		}
}
//详情页滚动显示或隐藏底部工具条
function onDetailScroll(){
	var curTop = $("#details")[0].scrollTop ;
	if(curTop>=pager.top)
	{
		$("#detail_toolbar").removeClass("showDetail");
	}else{
		$("#detail_toolbar").addClass("showDetail");
	}
	pager.top = curTop;
}
var pager = {
		page:1,
		totalPage:1	,
		top:0
	},
	config = {
		disSet:50,
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
			config.cat = params[1];
			pager.page =params[2]?params[2]:1;
			pager.tag = "";
			loadNewList(pager.page);
			break;
		case"#id":
			config.id = params[1];
			showPost(config.id);
			loadNewList(pager.page);
			break;
		case "#tag":
			config.tag = params[1];
			pager.cat = "";
			pager.page =params[2]?params[2]:1;
			loadNewList(pager.page);
			break;			
	}
	return true;
	
}
//文章详情
//post: 文章id,或者文章参数Object
function showPost(post)
{
	var postId,
		postCover="";
	$("#main,header,#details,#detail_header").addClass("showDetail");
	if(post.postId&&post.postId!="")
	{
		$("#detail_title").text(post.postTitle);
		postCover = post.pic&&post.pic!=""?'<div class="aCover"><img src="'+post.pic+'"  /></div>':'';
		$("#detail_co").html("").html(postCover);
		
		postId = encodeURIComponent(post.postId);
	}else{
		postId = encodeURIComponent(post);
	}
	$.ajax({
		type:"get",
		dataType:"json",
		url:"http://www.iguoguo.net/",
		data:{'pid':postId,'action':'ajax_webapp'},
		async:true,
		cache:true,
		beforeSend:function(){
			$('#post_loading').removeClass('hidden');
		},
		success:function(data){
			parsePostDetail(data,postCover).appendTo("#detail_co").find('img').eq(0).css('display','none');
			$('#detail_toolbar').data("id",postId);
			$("#likes").html(data.likes);
			$("#comment_btn").show().find("#comments").html(data.comments);
			$('#post_loading').addClass('hidden');

			pager.top = 0;
			$("#details").on("scroll",onDetailScroll);
			$("#detail_toolbar").addClass("showDetail");
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
					$("#main").on("scroll",onListScroll);
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
function parsePostDetail(data,postCover){
	var detailHtml = data.pic&&data.pic!=""&&postCover==''?'<div class="aCover"><img src="'+data.pic+'"  /></div>':'',
		catArr  = data.catids&&data.catids!=''?data.catids.split('|'):'',
		catClass= "coolsite",
		tagsArr = data.tags&&data.tags!=''?data.tags.split('|'):'';
	
	if(catArr.indexOf("92")>-1){
		catClass = "shareArticle";
		$("#download_btn,#visit_btn").addClass("hidden");
		$("#like_btn,#comment_btn").addClass("harfWidth");

	}else if(catArr.indexOf("144")>-1){
		catClass = "ui";
		$("#download_btn").prop("href",data.web_url2);
		$("#download_btn").removeClass("hidden");
		$("#visit_btn").addClass("hidden");
		$("#like_btn,#comment_btn").removeClass("harfWidth");
	}else if(data.web_url!=""){
		$("#visit_btn").prop("href",data.web_url);
		$("#visit_btn").removeClass("hidden");
		$("#download_btn").addClass("hidden");
		$("#like_btn,#comment_btn").removeClass("harfWidth");
	}else{
		$("#download_btn,#visit_btn").addClass("hidden");
		$("#like_btn,#comment_btn").addClass("harfWidth");
	}

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

	detailHtml+='<div id="post_content" class="'+catClass+'">'+data.content+'</div>';
	
	return $(detailHtml);
}


if(!Array.indexOf){
	Array.prototype.indexOf = function(item){
		for(var i=0;i<this.length;i++)
		{
			if(this[i]==item)return i;
		}
		return -1;
	}
}

function showWebViews(url)
{
	$("#web_viewer").css('display','block').addClass("shown").find("iframe").prop("src",url);
	$("#close_btn").on("touchstart",function(){
		$("#web_viewer").removeClass("shown").find("iframe").prop("src","");
		$("#close_btn").off("touchstart");
		setTimeout(function(){$("#web_viewer").css('display','none')},500);
	});

}

function setLocation(prop,num)
{
	var hash = "#"+prop+"_"+num;
	window.location.hash = hash;
}

/*本地数据存储*/

function checkStorageSupport(){
	if(!window.sessionStorage||!window.localStorage)
	{
		console.warn("您现在所有的浏览器不支持本地存储");
		return false;
	}
	return true;
}

function login(email,psw)
{
	var err="";
	if(email==""||psw=="")
	{
		err= "请完整填写用户名密码!";
		return err;
	}
	$.ajax({
		type:"get",
		dataType:"json",
		url:"http://www.iguoguo.net/u/ajax/login",
		data:{'email':email,'password':psw},
		async:false,
		cache:true,
		contentType: "application/x-www-form-urlencoded; charset=utf-8", 
		success:function(data){
			if(data.uid==0){
				err="用户名或密码错误,请重试!"
			}else{
				jsSession.login(data.uid,data.username,psw,email);
				err = true;
			}
		},
		error:function(err2){
			err = "登录失败,请重试:"+err2.toString();
		}

	});
	return err;
}

function logout(){
	jsSession.logout();
}

/*session 数据本地化*/
function JsSession(){
	var sstorage = checkStorageSupport()?window.localStorage:null;
	this.login = function(id,name,pwd,mail){
		if(sstorage)
		{
			sstorage.setItem("userId",id);
			sstorage.setItem("userName",name);
			sstorage.setItem("userPwd",pwd);
			sstorage.setItem("email",mail)
			return sstorage;
		}
		return false;
	}

	this.logout = function(){
		if(sstorage)
		{
			sstorage.setItem("userId",0);
			sstorage.setItem("userName","");
			sstorage.setItem("userPwd",'');

			return true;
		}
		return false;
	}

	this.getSession = function(){
		if(sstorage&&sstorage.getItem("userId"))
		{
			return sstorage;
		}
		return 0;
	}
}

var jsSession = new JsSession();

function showUserPanel(){
	var userPanel = $("#user_nav"),
		sstorage = jsSession.getSession();

	userPanel.find("img").prop("src","http://www.iguoguo.net/u/avatar.php?uid="+sstorage.userId+"&size=big");
	userPanel.find("h4").text(sstorage.userName);

	userPanel.removeClass("hidden");
	$("#login").addClass("hidden");
}

function checkSession(){
	var sstorage = jsSession.getSession();
	if(sstorage.userId&&sstorage.userId!=0)
	{
		showUserPanel();
	}
}

