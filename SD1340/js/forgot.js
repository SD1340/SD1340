$(document).ready(function(){
	$('#email').bind('change keyup mouseover', function(){
		liveValidate();
	});
	$(document).bind('mouseover', function(){
		liveValidate();
	});
});

function formValidate(){
	var email = 'derrick.l.adkins@gmail.com';
	if($('#email').val() != email){
		$('#errMsg').show();
		return false;
	}else{
		return true;
	}
}

function liveValidate(){
	var regexEmail= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	var inputEmail = $('#email').val();
	EmailisValid = regexEmail.test(inputEmail);
	if(EmailisValid){
		$('#submit').prop('disabled', false);
	}else{
		$('#submit').prop('disabled', true);
	}
}

function outputMsg(){
	$('#forgot').hide();
	output = "<center><p>An email has been sent to "+$('#email').val()+", have a nice day!</p></br><a href='index.php'>Continue to login page</a></center>";
	$('main').append(output);
}