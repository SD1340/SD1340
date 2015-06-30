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
	var windowWidth = $('html').width();
	var mainWidth = $('#main').width();
}