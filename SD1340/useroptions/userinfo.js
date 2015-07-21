var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;
	
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
		
		return xmlHttp;
	}
}

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
		setTimeout('updateuserinfo()',1000);
	}
}

function handleServerResponse(){
	if(xmlHttp.readyState==4){
		if(xmlHttp.status==200){
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			userinfo = xmlDocumentElement.firstChild.data;
			$('#contactinfodiv').innerHtml(userinfo);
			console.log("server response handled");
		}
	}
}






