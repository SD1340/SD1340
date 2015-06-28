$(document).ready(function(){
	dynamic();
	$(window).resize(function(){
		dynamic();
	});
});

function dynamic(){
	var windowWidth = $(window).width();
	if(windowWidth>800){
		//$('.topnav').show();
		$('#logo').show();
	}else if(windowWidth<=800 && windowWidth>=500){
		//$('.topnav').show();
		$('#logo').hide();
	}else{
		$('#logo').hide();
	}
}