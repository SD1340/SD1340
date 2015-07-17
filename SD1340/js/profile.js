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
	$('#changeuserimage').click(function(){
		window.location.href = "uploaduserimage.php";
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
			return false;
		}
	}
	if ($('#retypenewpassword').val() == ''){
		alert("Please re-type your new password");
		return false;
	}
	if ($('#retypenewpassword').val() != ''){
		if($('#retypenewpassword').val() != $('#newpassword').val()){
		alert("New password and re-typed password do not match");
		return false;
		}
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
			return false;
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
	
	updateuserinfo();
	return true;
}

/*AJAX CODE STARTS HERE*/

var xmlHttp;

$(document).ready(function(){

	if(window.ActiveXObject){
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp = false;
		}
	}else{
		try{
			xmlHttp = new XMLHttpRequest();
		}catch(e){
			xmlHttp = false;
		}
	}
	
	if(!xmlHttp){
		alert("Couldn't Load User Info");
	}else{
		console.log("xmlHttp created");
	}
	console.log(xmlHttp);
	console.log("loading user info...");
	loaduserinfo();
});

function loaduserinfo(){
	if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
		username = $('#username').val();
		firstname = $('#userfirstname').val();
		lastname = $('#userlastname').val();
		phone = $('#userphone').val();
		email = $('#useremail').val();
		xmlHttp.open("GET", "updateuserinfo.php?username="+username+"&firstname="+firstname+"&lastname="+lastname+"&phone="+phone+"&email="+email, true);
		xmlHttp.onreadystatechange = handleServerResponse();
		xmlHttp.send(null);
		console.log("user info loaded");
	}else{
		console.log("waiting...");
		setTimeout('loaduserinfo()',1000);
	}
}

function updateuserinfo(){
	if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
		username = $('#username').val();
		firstname = $('#firstname').val();
		lastname = $('#lastname').val();
		phone = $('#phone').val();
		email = $('#email').val();
		xmlHttp.open("GET", "updateuserinfo.php?username="+username+"&firstname="+firstname+"&lastname="+lastname+"&phone="+phone+"&email="+email, true);
		xmlHttp.onreadystatechange = handleServerResponse();
		xmlHttp.send(null);
		console.log("user info updated");
		alert("Contact Info Updated");
	}else{
		console.log("waiting...");
		setTimeout('updateuserinfo()',1000);
	}
}

function handleServerResponse(){
	console.log("handling server response...");
	if(xmlHttp.readyState==4){
		if(xmlHttp.status==200){
			console.log("xmlHttp.responseXML: "+xmlHttp.responseXML);
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			userinfo = xmlDocumentElement.firstChild.data;
			$('#contactinfodiv').innerHTML(userinfo);
			console.log("server response handled");
		}else{
			console.log("status: "+xmlHttp.status);
		}
	}else{
		console.log("readystate: "+xmlHttp.readyState);
	}
}