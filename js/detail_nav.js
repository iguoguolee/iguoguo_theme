$(document).ready(function(){
	disSet = 100;
	initDetailNav();
	fixedElement("#fixedAd",true);
	
});

var disSet,bdTop;

function initDetailNav(){
	bdTop = $(".bdsharebuttonbox").offset().top;
	$(".entry h3,.entry h4").each(function(index){
		$(this).data("rel",index);
		$(this).data("offTop",$(this).offset().top);
		$(this).clone(true).html($(this).text().substring(0,32)).appendTo($("#detailNav"));
	});

	$("#detailNav h4").prepend("<span>|--</span>");

	$("#detailNav h3,#detailNav h4").each(function(){
	}).bind("click",function(e){
		var index = $(this).data("rel"),
			toTop = $(".entry h3,.entry h4").eq(index).offset().top-disSet;
		$(window).scrollTop(toTop);
		$("#detailNav h3,#detailNav h4").removeClass("current");
		$(this).addClass("current");
		e.preventDefault();
	});
}

function scrollContent()
{
	if($(window).scrollTop()>=bdTop)
	{
		$("#detailNav").css("display","none");
		return;
	}else{
		$("#detailNav").css("display","block");
	}
	var obj = {
		index:-1,
		dis:200
	};
	$(".entry h3,.entry h4").each(function(index){
		var dis = $(this).data("offTop")-$(window).scrollTop();
		if(Math.abs(dis)<obj.dis)
		{
			obj.index = index;
			obj.dis = dis;
		}
	});
	if(obj.index!=-1){
		$("#detailNav h3,#detailNav h4").removeClass("current").eq(obj.index).addClass("current");
	}
}