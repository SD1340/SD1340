$(document).ready(function(){
	$('#registerbtn').click(function(){
		window.location.href = 'register.php';
	});
});

function forgot(){
	id = $(this).attr('id');
	if (id == 'getusername'){
		$('#forgotval').val("username");
	}else{
		$('#forgotval').val("password");
	}
	$('#forgot_form').submit();
}