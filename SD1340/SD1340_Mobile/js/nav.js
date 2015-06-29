$(document).ready(function(){
	$('#menu_div').click(function(){
		menu();
	});
	
	//on page load, show/hide appropriate items, also do the same thing on resize.
	dynamic_nav();
	$(window).resize(function(){
		dynamic_nav();
	});
	
	$('#hideaway').width(hideawayWidth);
	$('#hideaway').css("left", function(){
		var hw = ((hideawayWidth+1)*-1)+"px";
		return hw;
	});
});

var hideawayWidth = $('html').width() * .90;
	
function dynamic_nav(){
	navWidth = $('#topnav').width();
	if(navWidth<800){
		$('.topnav_txt').hide();
		$('#assignments_list').css("width", "230%");
		$('#labs_list').css("width", "130%");
	}
	else{
		$('.topnav_txt').show();
		$('#assignments_list').css("width", "100%");
		$('#labs_list').css("width", "100%");
	}
}

var menuIsVisible=false;
function menu(){
	if (menuIsVisible){
		$('.topnav_li').animate({left: '+=460px'}, 500);
		$('.topnav_li').delay(500).animate({zIndex: '99'}, 0);
		$('#hideaway').animate({left: '-='+hideawayWidth}, 500);
		menuIsVisible=false;
	}else{
		$('.topnav_li').css('z-index', '-1');
		$('.topnav_li').animate({left: '-=460px'}, 500);
		menuIsVisible=true;
		$('#hideaway').animate(
			{left: '+='+hideawayWidth},
			{duration:500}
		);
	}
}
