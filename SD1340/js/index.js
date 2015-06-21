$(document).ready(function(){
	$(window).resize(function(){
		var windowWidth = $(window).width();
		if(windowWidth>800){
			$('.topnav_txt').show();
			$('.topnav').show();
			$('#logo').show();
			$('main').css('width', '80%');
		}else if(windowWidth<=800 && windowWidth>=420){
			$('.topnav_txt').hide();
			$('.topnav').show();
			$('#logo').hide();
			$('main').css('width', '100%');
		}else{
			$('.topnav').hide();
			$('#logo').hide();
			$('main').css('width', '100%');
		}
	});
});