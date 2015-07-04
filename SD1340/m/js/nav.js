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
	
	$('#btn3').click(function(){
		$('#btn3 ul').toggle();
		$('#btn4 ul').hide();
	});
	$('#btn4').click(function(){
		$('#btn4 ul').toggle();
		$('#btn3 ul').hide();
	});
});

var hideawayWidth = $('html').width() * .90;
	
function dynamic_nav(){
	navWidth = $('#topnav').width();
	halWidth = navWidth - $('#btn1').width();
	if(navWidth<800){
		$('.topnav_txt').hide();
		$('#assignments_list').css("width", "230%");
		$('#labs_list').css("width", "130%");
		$('.topnav_li').css("width", function(){
			return halWidth/3;
		});
		$('#btn3 ul').css("left", function(){
			return ($('#btn3 ul').width() - $('#btn3').width())*-1;
		});
		$('#btn4 ul').css("left", function(){
			return ($('#btn4 ul').width() - $('#btn4').width())*-1;
		});
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
		$('#btn3 ul').hide(); $('#btn4 ul').hide();
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
