$(document).ready(function(){
	$('#registerbtn_index').click(function(){
		window.location.href = 'register.php';
	});
});

function forgot(id){
	if (id == 'Username'){
		$('#forgotval_index').val("Username");
	}else{
		$('#forgotval_index').val("Password");
	}
	$('#forgot_form_index').submit();
}