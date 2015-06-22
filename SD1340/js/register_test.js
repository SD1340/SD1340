$(document).ready(function(){
	$('#next').click(function(){
		if($('#panel1').css('display') !== 'none'){
				showPanel2();
		}else if($('#panel2').css('display') !== 'none'){
				showPanel3();
		}
	});
	$('#back').click(function(){
		if($('#panel2').css('display') !== 'none'){
				showPanel1();
		}else if($('#panel3').css('display') !== 'none'){
				showPanel2();
		}
	});
	$('#progress1').click(function(){
		if($('#panel2').css('display') !== 'none'){
				showPanel1();
		}else if($('#panel3').css('display') !== 'none'){
				showPanel1();
		}else{}
	});
	$('#progress2').click(function(){
		if($('#panel1').css('display') !== 'none'){
				showPanel2();
		}else if($('#panel3').css('display') !== 'none'){
				showPanel2();
		}else{}
	});
	$('#progress3').click(function(){
		if($('#panel1').css('display') !== 'none'){
				$('.errMsg').hide();
				showPanel3();
		}else if($('#panel2').css('display') !== 'none'){
				showPanel3();
		}else{}
	});
});

function showPanel1(){
	$('#panel1').show();
	$('#panel2').hide();
	$('#panel3').hide();
	$('#next').show();
	$('#back').hide();
	$('#registerbtn').hide();
	$('#progressbar').css('backgroundColor', '#b8b8b8');
	$('#progress1').css('backgroundColor', '#ff9933');
	$('#progress2').css('backgroundColor', '#b8b8b8');
}
function showPanel2(){
	$('#panel1').hide();
	$('#panel2').show();
	$('#panel3').hide();
	$('#next').show();
	$('#back').show();
	$('#registerbtn').hide();
	$('#progress1').css('backgroundColor', '#b8b8b8');
	$('#progress2').css('backgroundColor', '#ff9933');
	$('#progressbar').css('backgroundColor', '#b8b8b8');
}
function showPanel3(){
	$('#panel1').hide();
	$('#panel2').hide();
	$('#panel3').show();
	$('#next').hide();
	$('#back').show();
	$('#registerbtn').show();
	$('#progressbar').css('backgroundColor', '#ff9933');
	$('#progress2').css('backgroundColor', '#b8b8b8');
	$('#progress1').css('backgroundColor', '#b8b8b8');
}

/*-----------Form Validation Functions-------------*/

/*----Initialize Variables-----*/
var UNameisValid = true;
var FNameisValid = true;
var LNameisValid = true;
var PasswordisValid = true;
var CPasswordisValid = true;
var EmailisValid = true;
var PhoneisValid = true;

function validateUserName(){
	
}
function showUNameMsg(){
	$('#UNameMsg').show();
}
function validatePassword(){
	var regexPassword = /^(?=.{8})(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*\d)/;
	var inputPassword = $('#password').val();
	PasswordisValid = regexPassword.test(inputPassword);
}
function showPasswordMsg(){
	$('#PasswordMsg').show();
}
function validateCPassword(){
	if ($('#password').val() == $('#cpassword').val()){
		CPasswordisValid = true;
	}else{
		CPasswordisValid = false;
	}
}
function showCPasswordMsg(){
	$('#CPasswordMsg').show();
}
function validateFirstName(){
	
}
function showFNameMsg(){
	$('#FNameMsg').show();
}
function validateLastName(){
	
}
function showLNameMsg(){
	$('#LNameMsg').show();
}
function validateEmail(){
	var regexEmail= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	var inputEmail = $('#email').val();
	EmailisValid = regexEmail.test(inputEmail);
}
function showEmailMsg(){
	$('#EmailMsg').show();
}
function validatePhone(){
	var regexPhone = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
	var inputPhone = $('#phone').val();
	PhoneisValid = regexPhone.test(inputPhone);
}
function showPhoneMsg(){
	$('#PhoneMsg').show();
}