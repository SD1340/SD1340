$(document).ready(function(){
	$('#next').click(function(){
		if($('#panel1').css('display') !== 'none'){
			validateUserName();
			validatePassword();
			validateCPassword(); 
			console.log('username is valid: '+UNameisValid);
			console.log('password is valid: '+PasswordisValid);
			console.log('passwords match: '+CPasswordisValid);
			if(UNameisValid && PasswordisValid && CPasswordisValid){
				$('.errMsg').hide();
				console.log('print');
				showPanel2();
			}else{
				if(!UNameisValid)showUNameMsg();
				if(!PasswordisValid)showPasswordMsg();
				if(!CPasswordisValid)showCPasswordMsg();
			}
		}else if($('#panel2').css('display') !== 'none'){
			validateFirstName();
			validateLastName();
			if(FNameisValid && LNameisValid){
				$('.errMsg').hide();
				showPanel3();
			}else{
				if(!FNameisValid)showFNameMsg();
				if(!LNameisValid)showLNameMsg();
			}
		}
	});
	$('#back').click(function(){
		if($('#panel2').css('display') !== 'none'){
			validateFirstName();
			validateLastName();
			if(FNameisValid && LNameisValid){
				$('.errMsg').hide();
				showPanel1();
			}else{
				if(!FNameisValid)showFNameMsg();
				if(!LNameisValid)showLNameMsg();
			}
		}else if($('#panel3').css('display') !== 'none'){
			validateEmail();
			validatePhone();
			if(EmailisValid && PhoneisValid){
				$('.errMsg').hide();
				showPanel2();
			}else{
				if(!EmailisValid)showEmailMsg();
				if(!PhoneisValid)showPhoneMsg();
			}
		}
	});
	$('#progress1').click(function(){
		if($('#panel2').css('display') !== 'none'){
			validateFirstName();
			validateLastName();
			if(FNameisValid && LNameisValid){
				$('.errMsg').hide();
				showPanel1();
			}else{
				if(!FNameisValid)showFNameMsg();
				if(!LNameisValid)showLNameMsg();
			}
		}else if($('#panel3').css('display') !== 'none'){
			validateEmail();
			validatePhone();
			if(EmailisValid && PhoneisValid){
				$('.errMsg').hide();
				showPanel1();
			}else{
				if(!EmailisValid)showEmailMsg();
				if(!PhoneisValid)showPhoneMsg();
			}
		}else{}
	});
	$('#progress2').click(function(){
		if($('#panel1').css('display') !== 'none'){
			validateUserName();
			validatePassword();
			validateCPassword();
			if(UNameisValid && PasswordisValid && CPasswordisValid){
				$('.errMsg').hide();
				showPanel2();
			}else{
				if(!UNameisValid)showUNameMsg();
				if(!PasswordisValid)showPasswordMsg();
				if(!CPasswordisValid)showCPasswordMsg();
			}
		}else if($('#panel3').css('display') !== 'none'){
			validateEmail();
			validatePhone();
			if(EmailisValid && PhoneisValid){
				$('.errMsg').hide();
				showPanel2();
			}else{
				if(!EmailisValid)showEmailMsg();
				if(!PhoneisValid)showPhoneMsg();
			}
		}else{}
	});
	$('#progress3').click(function(){
		if($('#panel1').css('display') !== 'none'){
			validateUserName();
			validatePassword();
			validateCPassword();
			if(UNameisValid && PasswordisValid && CPasswordisValid){
				$('.errMsg').hide();
				showPanel3();
			}else{
				if(!UNameisValid)showUNameMsg();
				if(!PasswordisValid)showPasswordMsg();
				if(!CPasswordisValid)showCPasswordMsg();
			}
		}else if($('#panel2').css('display') !== 'none'){
			validateFirstName();
			validateLastName();
			if(FNameisValid && LNameisValid){
				$('.errMsg').hide();
				showPanel3();
			}else{
				if(!FNameisValid)showFNameMsg();
				if(!LNameisValid)showLNameMsg();
			}
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
	if($('#password').val()!= ''){
		var regexPassword = /^(?=.{8})(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*\d)/;
		var inputPassword = $('#password').val();
		PasswordisValid = regexPassword.test(inputPassword);
	}else{PasswordisValid=true;}
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
	if($('#email').val() != ''){
		var regexEmail= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var inputEmail = $('#email').val();
		EmailisValid = regexEmail.test(inputEmail);
	}else{EmailisValid=true;}
}
function showEmailMsg(){
	$('#EmailMsg').show();
}
function validatePhone(){
	if ($('#phone').val()){
		var regexPhone = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
		var inputPhone = $('#phone').val();
		PhoneisValid = regexPhone.test(inputPhone);
	}else{PhoneisValid=true;}
}
function showPhoneMsg(){
	$('#PhoneMsg').show();
}
function formValidate(){
		if($('username').val()!=''&&$('#password').val()!=''&&$('#cpassword').val()!=''){
			if($('#fname').val()!=''&&$('#lname').val()!=''){
				validateEmail();
				validatePhone();
				if($('#email').val()!=''&&$('#phone').val()!=''&&EmailisValid&&PhoneisValid){
						return true;
				}else{
					if($('#email').val()==''){
						showEmailMsg();
					}else{
						$('#EmailMsg').hide();
					}
					if($('#phone').val()==''){
						showPhoneMsg();
					}else{
						$('#PhoneMsg').hide();
					}
					return false;
				}
			}else{
				showPanel2();
				if($('#fname').val()=='')showFNameMsg();
				if($('#lname').val()=='')showLNameMsg();
				return false;
			}
		}else{
			showPanel1();
			validateCPassword();
			if($('#username').val()=='')showUNameMsg();
			if($('#password').val()=='')showPasswordMsg();
			if(!CPasswordisValid)showCPasswordMsg();
			return false;
		}
	}