$(document).ready(function(){
	dynamic();
	$(window).resize(function(){
		dynamic();
	});
});

function dynamic(){
	var windowWidth = $(window).width();
	if(windowWidth>800){
		$('#logo').show();
	}else if(windowWidth<=800){
		$('#logo').hide();
	}
}