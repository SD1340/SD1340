<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Home</title>
	<?php include 'resources.html';?>
	<script type="text/javascript" src="/js/jssor.js"></script>
	<script type="text/javascript" src="/js/slider.js"></script>
	<script type="text/javascript" src="/js/jssor.slider.js"></script>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<div id="main"> <!--for dumbasses with explorer --->
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
	</div>
	<?php include 'footer.html';?>
</body>
</html>
