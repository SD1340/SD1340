$(document).ready(function() {
	load();
});

function load(){
	$action = "load";
	$username = $('#username').val();
	$.ajax({
		method: "POST",
		url: "posts.php",
		data: {action: $action, username: $username}
	})
		.done(function( html ){
			$("#posts").html( html );
		});
}

function post(){
	$action = "new";
	$username = $('#username').val();
	$message = $('#message').val().trim();
	$type = $('#type').val();
	
	if($message == ''){
		alert("Message cannot be blank.");
	}else{
		$.ajax({
			method: "POST",
			url: "posts.php",
			data: {action: $action, message: $message, type: $type, username: $username}
		})
		.done(function( html ){
			$("#posts").html( html );
		});
		
		$('#message').val("");
		$('#type').val("Information");
	}
}