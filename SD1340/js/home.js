$(document).ready(function(){
	if($('html').width()<=800){
		window.location.href="SD1340_Mobile/index.php";
	}
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