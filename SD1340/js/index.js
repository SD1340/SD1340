$(document).ready(function(){
	$('#registerbtn').click(function(){
		window.location.href = 'register.php';
	});
});

function forgot(id){
	if (id == 'Username'){
		$('#forgotval').val("Username");
	}else{
		$('#forgotval').val("Password");
	}
	$('#forgot_form').submit();
}