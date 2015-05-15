//获取用户面板数据
function getUserPanel()
{
	$.ajax({
		url:"http://www.iguoguo.net/u/main/userPanel",
		type:"get",
		cache:true,
		dataType:"html",
		data:"",
		success:function(userData){
			var urserPanelHtml = "";
			urserPanelHtml = userData;
			$("#headerWrapper").append(urserPanelHtml);
		}

	})
}

//喜欢或者不喜欢
function like(bid,thumb,title,type)
{
	$("#likeButton span").html("saving");
	callback = window.location.href;
	$.ajax({
		url:"http://www.iguoguo.net/u/blog/likes",
		type:"get",
		cache:true,
		dataType:"html",
		data:"bid="+bid+"&thumb="+thumb+"&is_wp="+type+"&title="+title+"&callback="+callback,
		success:function(userData){

			switch(userData)
			{
				case '1':
					$("#likeButton span").html("&#xe64b;");
					$("#likeButton").addClass("cur");
					break;
				case '2':
					$("#likeButton span").html("&#xe64c;");
					$("#likeButton").removeClass("cur");
					break;
				case 'erro':
					alert("请先登录！");
					window.location.href="http://www.iguoguo.net/u/login?callback="+callback;
					break;
				default:
					break;
			}
			
		}

	})
}

//检查文章是否已经被用户喜欢过

function checkLike(bid)
{

	$.ajax({
		url:"http://www.iguoguo.net/u/blog/checkIsLike",
		type:"get",
		cache:true,
		dataType:"html",
		data:"bid="+bid,
		success:function(userData){
			if(userData==2){
				$("#likeButton span").html("&#xe64b;");
				$("#likeButton").addClass("cur");
			}
			else{
				$("#likeButton span").html("&#xe64c;");
				$("#likeButton").removeClass("cur");
			}
			
		}

	})
}

function fixedElement(ele,isDetail)
{
	fixedEle = $(ele);
	fixedEle.data("fixedPos",fixedEle.offset().top);
	$(window).bind("scroll",function(){
		var curPos = $(window).scrollTop();
		if(curPos>fixedEle.data('fixedPos')-80)
		{
			fixedEle.addClass('fixed');
		}else{
			fixedEle.removeClass('fixed');
		}
		if(isDetail){
			scrollContent();
		}
	})
}

$(function(){
	var fixedEle,
		isSearching = false,
		defaultVal = "";

	$("#s").val(defaultVal);
	$("#searchBtn").click(function(){
		if(isSearching){
			if($("#s").val()=="")
			{
				$("#s").focus();
				return false;
			}
			return true;
		}
		$("#topSearch").addClass("curr");
		isSearching = true;
		$(this).blur();
		$("#s").focus();
		return false;
	});
	$("#s").blur(function(){
		if(!$(this).val())
		{
			$("#topSearch").removeClass("curr");
			isSearching = false;
		}
	})
})