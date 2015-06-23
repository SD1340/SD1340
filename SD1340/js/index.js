$(document).ready(function(){
	
});

function formValidate(){
	var username = 'derrickadkins';
	var password = 'DAMFusmc.11';
	if($('#username').val()!=username | $('#password').val()!=password){
		$('#errMsg').show();
		return false;
	}else{
		return true;
	}
}