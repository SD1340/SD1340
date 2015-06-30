$(document).ready(function(){
	if($('html').width()<=800){
		window.location="http://m.sd1340.herobo.com";
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