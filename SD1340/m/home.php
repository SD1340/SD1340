<html>
<head>
	<title>SD1340 - Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<script type="text/javascript" src='js/jquery.js'></script>
		<link rel="stylesheet" href="css/nav.css" type="text/css">
		<link rel="stylesheet" href="css/slider.css" type="text/css">
		<link rel="stylesheet" href="css/home.css" type="text/css">
		<script type="text/javascript" src="js/jssor.js"></script>
		<script type="text/javascript" src="js/jssor.slider.js"></script>
		<script type="text/javascript" src="js/slider.js"></script>
		<script type="text/javascript" src="js/home.js"></script>
		<script type="text/javascript" src="js/nav.js"></script>
		
</head>
<body>
	<?php
		session_start();
		$username = $_SESSION['username'];
		$url = $_SERVER['HTTP_HOST'];
		$testing = strpos($url, 'host');
		if($testing == 0){
			$filepath = 'http://sd1340.herobo.com/imgs/userimages/';
		}else{
			$filepath = '../imgs/userimages/';
		}
		$image = $_SESSION['userimage'];
		if (empty($image)){
			$image='default.png';
		}
		$userimage = $filepath . $image;
		if(empty($username)){
			echo "<script>location.href='index.php';</script>";
		}
	?>
	<nav id='topnav'>
		<ul>
			<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='imgs/buttons/menu.png'/></a></li>
			<li id='btn2' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
			<li id='btn3' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='imgs/icons/assignments.png'/><span class='topnav_txt'>Assignments</span></a>
				<ul style="width: 225%;">
					<li><a href='#'>Assignment 1</a></li>
					<li><a href='#'>Assignment 2</a></li>
					<li><a href='#'>Assignment 3</a></li>
					<li><a href='#'>Assignment 4</a></li>
					<li><a href='#'>Assignment 5</a></li>
				</ul>
			</li>
			<li id='btn4' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='imgs/icons/labs.png'/><span class='topnav_txt'>Labs</span></a>
				<ul style="width: 125%;">
					<li><a href='#'>Lab 1</a></li>
					<li><a href='#'>Lab 2</a></li>
					<li><a href='#'>Lab 3</a></li>
					<li><a href='#'>Lab 4</a></li>
					<li><a href='#'>Lab 5</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<nav id='hideaway'>
		<ul>
			<li><a href='#' class='hideaway'><?php echo $username; ?><img class="icon" id="userimg" src="<?php echo $userimage; ?>" href='#'/></a></li>
			<li><a href='#' class='hideaway'>Dashboard<img class='icon' src='imgs/icons/dashboard.png'/></a></li>
			<li><a href='#' class='hideaway'>Schedule<img class='icon' src='imgs/icons/schedule.png'/></a></li>
			<li><a href='#' class='hideaway'>Turn In<img class='icon' src='imgs/icons/turnin.png'/></a></li>
			<li><a href='#' class='hideaway'>Downloads<img class='icon' src='imgs/icons/download.png'/></a></li>
			<li><a href='#' class='hideaway'>Forum<img class='icon' src='imgs/icons/forum.png'/></a></li>
			<li><a href='#' class='hideaway'>Presentations/Projects<img class='icon' src='imgs/icons/presentation.png'/></a></li>
			<li><a href='useroptions/uploaduserimage.php' class='hideaway'>User Options<img class='icon' src='imgs/icons/useroptions.png'/></a></li>
			<li><a href='php/logout.php' class='hideaway'>Log Out</a></li>
		</ul>
	</nav>
	<section id='logo'>
		<img src='imgs/logo.png'/>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Mr. Memering</h1>
			</div>
		</header>
		<!-- Jssor Slider Begin -->
		<div id='slider' class='slider'>
			<!-- To move inline styles to css file/block, please specify a class name for each element. --> 
			<div id="slider2_container" class='slider_container'>

				<!-- Loading Screen -->
				<div u="loading" class='loading_div'>
					<div class='loading_1'>
					</div>
					<div class='loading_2'>
					</div>
				</div>

				<!-- Slides Container -->
				<div u="slides" class='slide_inside'>
					<div><a u=image href="#"><img src="imgs/carousel/01.jpg" /></a></div>                               
					<div><a u=image href="#"><img src="imgs/carousel/02.jpg" /></a></div>                               
					<div><a u=image href="#"><img src="imgs/carousel/03.jpg" /></a></div>
					<div><a u=image href="#"><img src="imgs/carousel/04.jpg" /></a></div>
				</div>
				<!-- bullet navigator container -->
				<div u="navigator" class="jssorb01" style="bottom: 16px; right: 10px;">
					<!-- bullet navigator item prototype -->
					<div u="prototype"></div>
				</div>
				<!-- Arrow Left -->
				<span u="arrowleft" class="jssora05l" style="top: 123px; left: 8px;"></span>
				<!-- Arrow Right -->
				<span u="arrowright" class="jssora05r" style="top: 123px; right: 8px;"></span>
			</div>
		</div>
		<!-- Jssor Slider End -->
		<div id='section'>
			<div>
				<p>Lorem ipsum dolor sit amet, mel integre vivendo denique an, eum labitur ocurreret no. 
				Ei graeco sapientem efficiendi mei, vel nisl diam iriure ex. Dico diam consul ne nam, an 
				mundi signiferumque vim. Cum id fierent invenire ullamcorper, utinam regione ius an.</p>
				<p>Salutatus delicatissimi at pri, ut adhuc civibus maluisset ius, in sea atqui error 
				patrioque. Iudicabit liberavisse te mel, quo ut deterruisset necessitatibus. An vix nibh 
				paulo congue, tale admodum nusquam ea ius. Ei usu suas clita, hinc phaedrum indoctum ea 
				vel, his an case cibo dicat. Vix cu menandri euripidis neglegentur, viris lobortis sea 
				no, ad electram sadipscing duo. Ponderum signiferumque cu qui. His in mentitum electram 
				vulputate, dicunt reprehendunt eum ei.</p>
				<p>Ne ocurreret posidonium has, cu stet cibo delenit sea, unum debitis reformidans ea est. 
				At tota iusto voluptaria eum, ne ius partem hendrerit. No mei debet dolore. Tritani 
				constituam mea ex, error gubergren necessitatibus an quo, ei eam vidit posse. Duo ut 
				laudem iisque, ne essent scribentur vix. Ut tale ocurreret tincidunt has, no assum everti 
				fuisset cum, in nullam quaeque posidonium qui.</p>
				<p>Dicant alterum maluisset te duo, qui quod efficiantur id. Quot augue blandit nam an, 
				ut soluta principes pro. Sed option euismod theophrastus ut. Id iudico definitiones mei, 
				illud splendide mel in. Eam te platonem philosophia, nam an omnium latine.</p>
				<p>Eum quem denique iudicabit ei, utamur tincidunt referrentur id sit, equidem inciderint 
				vim no. Sit ornatus utroque ea, an semper prompta vix. Aperiam vivendum constituam ei eum. 
				Est dicam cetero te.</p>
			</div>
		</div>
	</main>
	<footer>
		<div id='footer_div'>
			<ul id='left_footer' class='inner_footer'>
				<li><a href='#'>Home</a></li>
				<li><a href='#'>Assignments</a></li>
				<li><a href='#'>Labs</a></li>
			</ul>
			<ul id='center_footer' class='inner_footer'>
				<li><a href='#'>Dashboard</a></li>
				<li><a href='#'>Schedule</a></li>
				<li><a href='#'>Turn In</a></li>
			</ul>
			<ul id='right_footer' class='inner_footer'>
				<li><a href='#'>Downloads</a></li>
				<li><a href='#'>Forum</a></li>
				<li><a href='#'>Pres./Projects</a></li>
				<li><a href='#'>User Options</a></li>
			</ul>
		</div>
	</footer>
</body>
</html>
