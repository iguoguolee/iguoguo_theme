if(!Array.indexOf){
	Array.prototype.indexOf = function(item){
		for(var i=0;i<this.length;i++)
		{
			if(this[i]==item)return i;
		}
		return -1;
	}
}

var utils = (function(){
	return{
		//设置地址栏hash
		setLocation:function (prop,num)
		{
			var hash = "#"+prop+"_"+num;
			window.location.hash = hash;
		},
		//判断地址栏参数
		//#cat_1: 栏目id:1列表
		//#tag_2: 标签id:2列表
		//#id_1 : 文章id:1内容
		checkHash:function()
		{
			var hash = window.location.hash,
				params;
			if(hash=="") return false;

			params = hash.split("_");
			switch(params[0]){
				case "#cat":////////////////////////////////////////
					dataManager.loadCat(params[1]);
					break;
				case"#id":
					dataManager.loadPost(params[1])
					break;
				case "#tag":
					dataManager.loadTag(params[1])
					break;			
			}
			return true;
		}
	}
})();

var htmlRender = (function(contentList,loadingAnimation){

	var container = $(contentList),
		loading = $(loadingAnimation);

	function parsePost(data,page){
		var postHtml = '<li class="clearfix" pager="'+page+'"  id="post_'+data["id"]+'">'+
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
		//console.warn(detailHtml);
		return detailHtml;
	}

	return{
		/*
		* 渲染post列表
		* datas:文章列表数据，json格式
		*/
		showPostList:function (datas,page){
			var newElements = "";
			$.each(datas,function(index,data){
				newElements += parsePost(data,page);
			});
			//container.append(newElements);
			$(newElements).appendTo(contentList);
			$("#main").on("scroll",onListScroll);
		},
		/*
		* 渲染文章详情页
		* data:文章数据
		*/
		showPostContent:function(data,postCover)
		{
			var postDetail = parsePostDetail(data,postCover);
			//console.warn(postDetail.html());
			$("#detail_co").html(postDetail);
			$("#likes").html(data.likes);
			$("#comment_btn").show().find("#comments").html(data.comments);
			config.top = 0;
			$("#details").on("scroll",onDetailScroll);
			$("#detail_toolbar").addClass("showDetail");
		},
		/*
		* 移除列表中重复的缓存信息
		*/
		removeCacheData:function(page){
			container.find("li[pager='"+page+"']").remove();
		},
		/*
		* 显示加载动画
		*/
		showLoading:function(isLoading){
			if(isLoading)
			{
				loading.removeClass("hidden");
			}else{
				loading.addClass("hidden");
			}
		}
	}
})(".content_list","#list_loading");

var dataManager = (function(pStorage,userSession,htmlRender){
	var pager = {
		page:1,
		totalPage:1	,
		top:0,
		numPerpage:8
		},
		config = {
			disSet:20,
			cat:1,
			id:0,
			tag:0
		};

	return {
		/*
		* 加载新列表内容
		*/
		loadNewList:function(num){
			if(num)pager.page++;
			var is_cache = false;
				cacheData = pStorage.getCat(config.cat,pager.page);

			if(cacheData&&cacheData!="")
			{
				is_cache = true;
				htmlRender.showPostList(cacheData,pager.page);
			}
			$.ajax({
				type:"get",
				dataType:"json",
				url:"http://www.iguoguo.net",
				data:{'page':pager.page,'cat':config.cat,'tag':config.tag,'action':'ajax_webapp'},
				async:"true",
				beforeSend:function(){
					if(!is_cache) htmlRender.showLoading(true);
				},
				success:function(datas){
					
					htmlRender.showLoading(false);

					if(is_cache){
						htmlRender.removeCacheData(pager.page);
					}

					htmlRender.showPostList(datas,pager.page);
					pStorage.setCat(config.cat,pager.page,datas);
					console.warn(222);
				}
			})
		},
		/*
		* 加载文章详情
		* post: postId 或者 
		* post{
		*	postTitle,pic,postId
		* }
		*/
		loadPost:function(post){
			var postId,
				postCover="",
				is_cache,
				cachePost;

			if(post.postId&&post.postId!="")
			{
				postId = encodeURIComponent(post.postId);
			}else{
				postId = encodeURIComponent(post);
			}

			cachePost = pStorage.getPost(postId);
			if(cachePost&&cachePost!="")
			{
				is_cache = true;
				htmlRender.showPostContent(cachePost,postCover);
			}
			$.ajax({
				type:"get",
				dataType:"json",
				url:"http://www.iguoguo.net/",
				data:{'pid':postId,'action':'ajax_webapp'},
				async:true,
				cache:true,
				beforeSend:function(){
					if(!is_cache)htmlRender.showLoading(true);
				},
				success:function(data){
					htmlRender.showLoading(false);
					if(!is_cache){
						htmlRender.showPostContent(data,postCover);
					}
					pStorage.setPost(postId,data);
				}
			});
		},
		/*
		* 加载指定id 分类
		* catId：分类id
		*/
		loadCat:function(catId){
			if(config.cat==catId) return;
			config.cat = catId;
			config.tag = 0;
			pager.page = 1;

			this.loadNewList();
		},
		/*
		* 按标签加载类别
		* tagId：标签Id
		*/
		loadTag:function(tagId){
			if(config.tag==tagId) return;
			config.cat = 0;
			config.tag = tagId;
			pager.page = 1;

			this.loadNewList();
		},
		/*
		* 用户登录
		* email：登录邮箱
		* psw:登录密码
		*/
		login:function(email,psw)
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
						userSession.login(data.uid,data.username,psw,email);
						checkSession();
						err = true;
					}
				},
				error:function(err2){
					err = "登录失败,请重试:"+err2.toString();
				}

			});
			return err;
		}
	}
})(postStorage,userSession,htmlRender);

var webUI = (function(){
	var show_menu     = false,
		show_userPanel = false,
		show_detail    = false,
		show_webView   = false,
		show_userNav   = false
		animate_time   = 500;

	return{
		openMenu:function(isOpen){
			if(isOpen&&!show_menu)
			{
				show_menu = true;
				$(".roundNav").addClass("open");
				$("#main,header,#overlay").addClass("show_left");
				$("#left_side").addClass("shown");
				$("body").on("touchmove",function(){//禁止拖动
					return false;
				});
				return
			}
			if(!isOpen&&show_menu){
				show_menu = false;
				$(".roundNav").removeClass("open");
				$("#main,header,#overlay").removeClass("show_left");
				setTimeout(function(){//动画完成后隐藏
					$("#left_side").removeClass("shown");
				 },animate_time);
				$("body").off("touchmove")
			}
		},
		toggleMenu:function(){
			this.openMenu(!show_menu);
		},
		toggleUserPanel:function(){
			this.openUserPanel(!show_userPanel);
		},
		openUserPanel:function(isOpen){
			if(isOpen&&!show_userPanel)
			{
				show_userPanel = true;
				$("#user_btn").addClass("open");
				$("#main,header,#overlay").addClass("show_right");
				$("#right_side").addClass("shown");
				$("body").on("touchmove",function(){//禁止拖动
					return false;
				});
				return
			}
			if(!isOpen&&show_userPanel){
				show_userPanel = false;
				$("#user_btn").removeClass("open");
				$("#main,header,#overlay").removeClass("show_right");
				setTimeout(function(){
					$("#right_side").removeClass("shown");
				 },animate_time);
				$("body").off("touchmove")
			}
		},
		openDetail:function(isOpen,post){
			if(isOpen&&!show_detail){
				if(post.postId&&post.postId!=""){
					$("#detail_title").text(post.postTitle);
					postCover = post.pic&&post.pic!=""?'<div class="aCover"><img src="'+post.pic+'"  /></div>':'';
					$("#detail_co").html("").html(postCover);
				}

				$("#main,header,#details,#detail_header").addClass("showDetail");
				return
			}
			if(!isOpen&&show_detail){
				$("#main,header,#details,#detail_header,#detail_toolbar").removeClass("showDetail");
				$("#details").off("scroll");
			}
		},
		openWebView:function(url){
			$("#web_viewer").css('display','block').addClass("shown").find("iframe").prop("src",url);
			$("#close_btn").on("touchstart",function(){
				$("#web_viewer").removeClass("shown").find("iframe").prop("src","");
				$("#close_btn").off("touchstart");
				setTimeout(function(){$("#web_viewer").css('display','none')},animate_time);
			});
		},
		openUserNav:function(isOpen){
			var userPanel = $("#user_nav"),
				loginPanel = $("#login");
			if(isOpen&&!show_userNav){
				userPanel.find("img").prop("src","http://www.iguoguo.net/u/avatar.php?uid="+userSession.uid()+"&size=big");
				userPanel.find("h4").text(userSession.uname());

				userPanel.on("touchstart","a",function(e){
					var action= $(this).attr("action");
					switch(action){
						case "1":
							break;
						case "2":
							break;
						case "3":
							userSession.logout();
							checkSession();
							break;
						default:
							break;
					}
					e.preventDefault();
				});

				show_userNav = true;
				userPanel.addClass("hidden");
				loginPanel.removeClass("hidden");
				return;
			}
			if(!isOpen&&show_userNav)
			{
				show_userNav = false;
				userPanel.removeClass("hidden");
				loginPanel.addClass("hidden");
			}
		}
	}
})();

function checkSession(){
	if(userSession.uid()&&userSession.uid()!=0)
	{
		showUserPanel();
	}else{
		hideUserPanel();
	}
}