$(document).ready(function() {
	if($("main").attr("id") == "forum"){
		forum_load();
	}
});

function forum_load(){
	$action = "load";
	$username = $('#forum #username').val();
	$forumid = $('#forum #forumid').val();
	$.ajax({
		method: "POST",
		url: "forum-posts.php",
		data: {action: $action, username: $username, forumid: $forumid}
	})
		.done(function( html ){
			$("#forum #posts").html( html );
		});
}

function forum_post(){
	$action = "new";
	$username = $('#forum #username').val();
	$forumid = $('#forum #forumid').val();
	$message = CKEDITOR.instances.message.getData();
	
	if($message == ''){
		alert("Message cannot be blank.");
	}else{
		$.ajax({
			method: "POST",
			url: "forum-posts.php",
			data: {action: $action, message: $message, username: $username, forumid: $forumid}
		})
		.done(function( html ){
			$("#forum #posts").html( html );
		});
		
		CKEDITOR.instances.message.setData("");
		$('#forum #message').focus();
	}
}