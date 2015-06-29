$(document).ready(function(){
	$('#menu_div').click(function(){
		menu();
	});
	
	//on page load, show/hide appropriate items, also do the same thing on resize.
	dynamic_nav();
	$(window).resize(function(){
		dynamic_nav();
	});
});

hideawayWidth = $('html').width() * .90;
$('#hideaway').width(hideawayWidth);
$('#hideaway').css("left", function(){
	return ((hideawayWidth+1)*-1);
});
	
function dynamic_nav(){
	navWidth = $('#topnav').width();
	userWidth = $('#user').width()+(navWidth*.1);
	if(userWidth+550 >= navWidth){
		$('.topnav_txt').hide();
	}
	else{
		$('.topnav_txt').show();
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
