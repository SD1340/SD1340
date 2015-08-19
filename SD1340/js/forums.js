$(document).ready(function() {
	if($("main").attr("id") == "forums"){
		forums_load();
	}
});

function forums_load(){
	$action = "load";
	$username = $('#forums #username').val();
	$.ajax({
		method: "POST",
		url: "forums-posts.php",
		data: {action: $action, username: $username}
	})
		.done(function( html ){
			$("#forums #forum").html( html );
		});
}

function forums_post(){
	$action = "new";
	$username = $('#forums #username').val();
	$title = $('#forums #title').val();
	
	if($title == ''){
		alert("Forum title cannot be blank.");
	}else{
		$.ajax({
			method: "POST",
			url: "forums-posts.php",
			data: {action: $action, title: $title, username: $username}
		})
		.done(function( html ){
			$("#forums #forum").html( html );
		});
		
		$('#forums #title').val("");
		$('#forums #title').focus();
	}
}