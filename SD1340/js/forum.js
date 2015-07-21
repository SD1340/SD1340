$(document).ready(function() {
	load();
});

function load(){
	$action = "load";
	$username = $('#username').val();
	$.ajax({
		method: "POST",
		url: "forum-posts.php",
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
	
	if($message == ''){
		alert("Message cannot be blank.");
	}else{
		$.ajax({
			method: "POST",
			url: "forum-posts.php",
			data: {action: $action, message: $message, username: $username}
		})
		.done(function( html ){
			$("#posts").html( html );
		});
		
		$('#message').val("");
		$('#type').val("Information");
		$('#message').focus();
	}
}