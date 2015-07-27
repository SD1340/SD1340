$(document).ready(function() {
	if($("main").attr("id") == "forum"){
		forum_load();
	}
});

function forum_load(){
	$action = "load";
	$username = $('#forum #username').val();
	$.ajax({
		method: "POST",
		url: "forum-posts.php",
		data: {action: $action, username: $username}
	})
		.done(function( html ){
			$("#forum #posts").html( html );
		});
}

function forum_post(){
	$action = "new";
	$username = $('#forum #username').val();
	$message = $('#forum #message').val().trim();
	
	if($message == ''){
		alert("Message cannot be blank.");
	}else{
		$.ajax({
			method: "POST",
			url: "forum-posts.php",
			data: {action: $action, message: $message, username: $username}
		})
		.done(function( html ){
			$("#forum #posts").html( html );
		});
		
		$('#forum #message').val("");
		$('#forum #message').focus();
	}
}