<!DOCTYPE html>
<html>
<head>
	<?php
		$forgot = $_POST['forgot']; 
		
		if(empty($forgot)){
			echo "<script>location.href='index.php';</script>";
		}		
	?>
	<title>SD1340 - Forgot <?php echo $forgot; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/forgot.css" type="text/css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/forgot.js"></script>
	
</head>
<body>
	<section id='logo'>
		<a href="index.php" ><img src='imgs/logo.png'/></a>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Mr. Memering - Forgot <?php echo $forgot; ?></h1>
			</div>
		</header>
		<form id='forgot' onsubmit='return formValidate()' action="recoverinfo.php" method='post'>
			<div id='formwrapper'>
				<div><span id='errMsg'>*There is no account associated with this email</span></div>
				<div><span class='label'>Email:</span><input class='forgot' type='email' name='email' id='email' /></br></div>
				<input type="hidden" name="forgot" value="<?php echo $forgot; ?>">
			</div>
			<div id='buttonwrapper'><input type='submit' id='submit' name="submit" value='Submit' disabled /></div>
		</form>
	</main>
</body>
</html>
