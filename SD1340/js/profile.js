$(document).ready(function(){
	$('#changecontactinfo').click(function(){
		$('#changecontactinfo').hide();
		$('.label').hide();
		$('#updatecontactinfo').show();
		$('#contactinfo_form input').show();
		$('#cancel').show();
	});
	$('#updatecontactinfo').click(function(){
		validPassword = validatecontactinfo();
		if(validPassword){
			$('#updatecontactinfo').hide();
			$('#contactinfo_form input').hide();
			$('.label').show();
			$('#changecontactinfo').show();
		}
	});
	$('#cancel').click(function (){
		$('#updatecontactinfo').hide();
		$('#contactinfo_form input').hide();
		$('.label').show();
		$('#changecontactinfo').show();
		$('#cancel').hide();
	});
});

function validatepassword(){
	if ($('#currentpassword').val() == ''){
		alert("Please type in your current password");
		return false;
	}
	if ($('#newpassword').val() == ''){
		alert("Please enter a new password");
		return false;
	}
	if ($('#newpassword').val() != ''){
		var regexPassword = /^(?=.{8})(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*\d)/;
		var inputPassword = $('#newpassword').val();
		PasswordisValid = regexPassword.test(inputPassword);
		if(!PasswordisValid){
			alert("New password must be at least 8 characters, contain upper and lower case letters, and have at least 2 numbers");
		}
	}
	if ($('#retypenewpassword').val() == ''){
		alert("Please re-type your new password");
		return false;
	}
	if ($('#retypenewpassword').val() != ''){
		alert("New password and re-typed password do not match");
		return false;
	}
	return true;
}

function validatecontactinfo(){
	if($('#firstname').val() == ''){
		alert("Please enter a first name");
		return false;
	}
	if ($('#lastname').val() == ''){
		alert("Please enter a last name");
		return false;
	}
	if ($('#phone').val() == ''){
		alert("Please enter a phone number");
		return false;
	}
	if ($('#phone').val() != ''){
		var regexPhone = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
		var inputPhone = $('#phone').val();
		PhoneisValid = regexPhone.test(inputPhone);
		if (!PhoneisValid){
			alert("Please enter a valid phone number");
		}
	}
	if ($('#email').val() == ''){
		alert("Please enter an email address");
		return false;
	}
	if ($('#email').val() != ''){
		var regexEmail= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var inputEmail = $('#email').val();
		EmailisValid = regexEmail.test(inputEmail);
		if (!EmailisValid){
			alert("Please enter a valid email address");
			return false;
		}
	}
}