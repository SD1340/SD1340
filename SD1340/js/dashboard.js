$(document).ready(function() {
	if($("main").attr("id") == "dashboard"){
		dashboard_load();
	}
});

function dashboard_load(){
	$action = "load";
	$username = $('#dashboard #username').val();
	$.ajax({
		method: "POST",
		url: "dashboard-posts.php",
		data: {action: $action, username: $username}
	})
		.done(function( html ){
			$("#dashboard #posts").html( html );
		});
}

function dashboard_post(){
	$action = "new";
	$username = $('#dashboard #username').val();
	$message = $('#dashboard #message').val().trim();
	$type = $('#dashboard #type').val();
	
	if($message == ''){
		alert("Message cannot be blank.");
	}else{
		$.ajax({
			method: "POST",
			url: "dashboard-posts.php",
			data: {action: $action, message: $message, type: $type, username: $username}
		})
		.done(function( html ){
			$("#dashboard #posts").html( html );
		});
		
		$('#dashboard #message').val("");
		$('#dashboard #type').val("Information");
		$('#dashboard #message').focus();
	}
}