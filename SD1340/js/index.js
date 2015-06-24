$(document).ready(function(){
	$('#registerbtn').click(function(){
		window.location.href = 'register.html';
	});
});

function formValidate(){
		var username = 'derrickadkins';
		var password = 'DAMFusmc.11';
		if($('#username_input').val()!=username | $('#password').val()!=password){
			$('#errMsg').show();
			return false;
		}else{
			return true;
		}
}