$(document).ready(function(){
	$('#registerbtn').click(function(){
		window.location.href = 'register.php';
	});
});
function showErrMsg(){
	$('#errMsg').show();
}
function forgot(){
	if($(this).attr("id") == "getusername"){
		$('#forgotaction').val('username');
	}else{
		$('#forgotaction').val('passowrd');
	}
	$('#forgotform').submit();
}