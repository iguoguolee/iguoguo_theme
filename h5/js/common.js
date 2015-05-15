$(function(){
	
	menuTop = $(".menuBar").offset().top;
	windowTop = 0;
	disSet = 50;
	paged = 1;
	$(window).bind("scroll",onScroll);
	
	$('.overlay').bind('click',function(e){
		$(".iguoguoHeader").removeClass("open");
		$('body').removeClass('openMenu');
	});
	
	$(".roundNav").click(function(){
		$(".iguoguoHeader").toggleClass("open");
		$('body').toggleClass('openMenu');
	});

	$(".menuBar a").bind('click',function(e){
		
		var newCat = $(this).attr('rel');
		console.warn(newCat);
		newCat = parseInt(newCat);
		e.preventDefault();
		
		if(curCat == newCat) return;
		loadCat(newCat);
		$(".menuBar a").removeClass('current');
		$(this).addClass('current');
		$(this).unfocus();
	})
	
});

var menuTo,
	windowTop,
	disSet,
	paged,
	isNoMoreData = false,
	isLoading = false,
	curCat = 0;

function loadNewData(page){
	$.ajax({
			type:"get",
			dataType:"html",
			url:"http://www.iguoguo.net/h5/",
			data:{paged:page,action:'ajaxPageLoad',toCat:curCat},
			async:true,
			beforeSend:function(){
				isLoading = true;
				$("#loading").removeClass('hidden');
			},
			success:function(data){
				if(data=="NULL"){
					isNoMoreData = true;
					$('#nomoreData').removeClass('hidden');
				}else{
					$('.coList').append(data);
					paged = page;
				}
				
				$("#loading").addClass('hidden');
				isLoading = false;
			},
			error:function(error){
				console.warn(error);
				isLoading = false;
			}
		});
}

function loadCat(catid)
{
	$('.coList').html('');
	curCat = catid;
	paged = 0;
	isNoMoreData = false;
	loadNewData(1);
}

function onScroll()
{
	var curTop = $(window).scrollTop();
	if(curTop>=menuTop){
		$('.menuBar').addClass('fixed')
	}else{
		$('.menuBar').removeClass('fixed');
	}
	if(curTop>windowTop){
		$('.menuBar').addClass('hidden')
	}else{
		$('.menuBar').removeClass('hidden');
	}	
		
	if(curTop>=$(document).height()-$(window).height()-disSet)
	{
		if(!isNoMoreData&&!isLoading){
			loadNewData(paged+1);	
		}
	}
	
	windowTop = curTop;
}
