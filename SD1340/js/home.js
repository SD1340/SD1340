$(document).ready(function(){
	dynamic();
	$(window).resize(function(){
		dynamic();
	});
});

function dynamic(){
	var windowWidth = $(window).width();
	if(windowWidth>800){
		$('.topnav_txt').show();
		$('.topnav').show();
		$('#logo').show();
		$('#username').show()
		$('main').css('width', '80%');
	}else if(windowWidth<=800 && windowWidth>=500){
		$('.topnav_txt').hide();
		$('.topnav').show();
		$('#logo').hide();
		$('#username').hide()
		$('main').css('width', '100%');
	}else{
		$('.topnav').hide();
		$('#logo').hide();
		$('main').css('width', '100%');
	}
	
	if(windowWidth<=1000){
		$('#username').hide()
	}
}