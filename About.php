<?php
// include the configs / constants for the database connection
require_once("LoginAndSignup/config/db.php");

// load the login class
require_once("LoginAndSignup/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
?>

<html>
	<head>
		<title>About | Explore Classical</title>
		
		<!-- CSS Stylesheet -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- jQuery library CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript CDN -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Explore Classical</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li> <a href="index.php"> Home </a> </li>
						<li> <a href="Concerts.php">Live Concerts </a> </li>
						<li> <a href="Discussions.php"> Discussions </a> </li>
						<li> <a href="FAQ.php"> FAQ </a> </li>
						<li class="active"> <a href="About.php"> About </a> </li>
						<li> <a href="ContactUs.php"> Contact Us </a> </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php $login = new Login();
						//asks if we are logged in here:
						if ($login->isUserLoggedIn() == true) {
							// the user is logged in. you can do whatever you want here.
							// for demonstration purposes, we simply show the "you are logged in" view.
							echo '<li> <a href="LoginHome.php">Profile</a> </li>';
							echo '<li> <a href="LoginHome.php?logout">Logout</a> </li>';
						} else {
							// the user is not logged in. you can do whatever you want here.
							// for demonstration purposes, we simply show the "you are not logged in" view.
							echo '<li> <a href="LoginHome.php">Login</a> </li>';
						} ?>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="jumbotron">
			<h1 class="text-danger text-center">WEBSITE UNDER CONSTRUCTION</h1>
			<p class="text-danger text-center">Below is purely conceptual information</p>
		</div>
		
		<div class="jumbotron">
			<h1 class="text-primary" style="padding-left:5%;">About Explore Classical</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6"> 
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1 class="text-important">Why Explore Classical?</h1>
						</div>
						
						<blockquote>
							<p>The Explore Classical project aims to make digital and live classical music readily available for people of all ages with an interest for classical music, but who doens't have the knowledge or experience to explore and navigate the massive catalogue composed over the years.</p>
							<p>The product will in its final state involve a digital database of live classical concerts, a streaming service specialised for classical music, aimed to achieve a tailor-made experience while also categoriseing the vast and sometimes incomprehensible catalogue of classical music.</p>
							<p>From interactions with the user, a complex system would ideally be able to predict the exact piece of music which would fit the users mood, personality, experience with classical music and much more. </p>
							<p>This is but one of the many possibilities for unique experiences that can be achieved through the exploration of the classical genre.</p>
			
							<p>We want to create a useful tool for experienced music fans and newcomers alike of all ages, and thereby reduce the otherwise strong misrepresentation that classical musik belongs to the times of old, and specifically for the exclusivity of the elite.</p>
							<p>We want to take advantage of our time's increasing interest for classical music, ammount of concertgoers and of young people attending classical concerts, and thereby bring everyone an oppurtunity to experience this enriching and educational part of our cultural heritage.</p>
							<p>The classical music is deeply engrained in the western cultures, and is a universal, broadly appealing and constantly current form of art, which we believe should be accessible by all.</p>
							<p>The project is primarily a cultural educational and enlightenment project with the aim of raiseing awareness about the timeliness and usefullness inherent to the classical genre.</p>
							<p>The project however does not wish to prove classical music to be above any other musical genre, but neither does it attempt to abase it, and thereby give it less credit than it is due.</p>
							<p>With Explore Classical we attempt to break down the traditional niche inherent in classical music, help people of all ages and social status to discover the world of classical music, and improve and secure an audience for this musical heritage.</p>
							<p>We will use our times increasing interest for the genre, and utilise the many advantages of social media and streaming services to bring the massive genre into the 21. century - both to the aid of the present classical music industry, but most of all to promote spiritual and cultural education for everyone.</p>
							<footer><p>Erik Danciu, Project Manager</p>
							<p>Studying for a Master's degree in violin at the Royal Danish Academy of Music</p>
						</blockquote>
					</div>
				</div>
			
				<div class="col-sm-6">
					<div class="page-header text-center">
						<h1>Why love Classical Music?</h1>
					</div>
					<blockquote>
						<p class="lead">Music is a moral law. It gives soul to the universe, wings to the mind, flight to the imagination, and charm and gaiety to life and to everything.<p>
						<footer><p>Plato, Greek Philosopher</p></footer>
					</blockquote>
					<center>
						<iframe src="https://embed.spotify.com/?uri=spotify%3Atrack%3A0aAHipKwUxMlVLHL5TOPqo" width="300" height="380" align="center" frameborder="0" allowtransparency="true"></iframe>
					</center>
				</div>
			</div>
		</div>
		
		<div class="container-fluid">

		</div>
	</body>
</html>
