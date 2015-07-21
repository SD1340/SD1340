$(document).ready(function(){
	$('#hideaway')
	.mouseenter(function(){
		stopAutoHide();
	})
	.mouseleave(function(){
		if(menuIsVisible){
			startAutoHide();
		}
	});
	$('#menu_div').click(function(){
		console.log('menu button clicked');
		if(menuIsVisible){
			stopAutoHide();
			menu();
		}else{
			menu();
			startAutoHide();
		}
	});
	$('html').click(function(e){
		if(menuIsVisible 
		&& e.target.id != 'hideaway' 
		&& e.target.id != 'menu_div'
		&& e.target.id != 'menubtn'){
			console.log('event target id: ' + e.target.id);
			stopAutoHide();
			menu();
		}
	});
	
	//on page load, show/hide appropriate items, also do the same thing on resize.
	dynamic_nav();
	$(window).resize(function(){
		dynamic_nav();
	});
});

function dynamic_nav(){
	navWidth = $('#topnav').width();
	userWidth = $('#user').width()+(navWidth*.1);
	if(userWidth+550 >= navWidth){
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
var timeout;
function menu(){
	if (menuIsVisible){
		$('.topnav_li').animate({left: '+=460px'}, 500);
		$('.topnav_li').delay(500).animate({zIndex: '99'}, 0);
		$('#hideaway').animate({left: '-=360px'}, 500);
		menuIsVisible=false;
		console.log('menuIsVisible: '+menuIsVisible);
	}else{
		$('.topnav_li').css('z-index', '-1');
		$('.topnav_li').animate({left: '-=460px'}, 500);
		$('.topnav_li').delay(400).animate({zIndex: '-1'}, 0);
		menuIsVisible=true;
		$('#hideaway').animate(
			{left: '+=360px'},
			{duration:500}
		);
	}
}
function stopAutoHide(){
	console.log('stop auto hide');
	window.clearTimeout(timeout);
}
function startAutoHide(){
	if(menuIsVisible){
		console.log('menuIsVisible: '+menuIsVisible);
		console.log('start auto hide');
		timeout = window.setTimeout(menu, 3000);
	}
}
