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
						<li> <a href="Search.php"> Music</a> </li>
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
							<p>The Explore Classical project aims to make digital and live classical music easily accessible for people of all ages with an interest for classical music, but who does not have the knowledge or experience to navigate the massive catalogue of hundreds of years of compositions and thousands of recordings.</p>
							<p>The product will in its final state involve a digital database of live classical concerts, a streaming service specialized for classical music, aimed to create a tailor-made experience while also categorizing the vast and sometimes incomprehensible catalogue of classical music. </p>
							<p>From interactions with the user, a complex system would ideally be able to predict the exact piece of music which would fit the users mood, personality, experience with classical music and much more. </p>
							<p>This is but one of the many possibilities for unique experiences that can be achieved through the exploration of the classical genre. </p>
			
							<p>We wish to create a useful tool for experienced listeners and newcomers alike, and thereby reduce the otherwise strong misrepresentation of classical music as something exclusive or old-fashioned. </p>
							<p>We want to take advantage of our time's increasing interest for classical music, the increase in the amount of concertgoers and of young people attending classical concerts, and give even more people an opportunity to experience this strongly enriching and important part of our cultural heritage. </p>
							<p>Classical music is deeply engrained in the western culture, and is a universal, broadly appealing and constantly actual art form, which we believe should be accessible by all. </p>
							<p>The project is primarily a cultural educational and enlightenment project with the aim of raising awareness about the timeliness and value of the classical genre. </p>
							<p>The project does not wish to prove classical music to be above any other musical genre, but neither does it attempt to abase it, and making it less than it is. </p>
							<p>With Explore Classical we want to break down the old niche about classical music, help people of all ages and social statuses to discover the world of classical music, and at the same time secure and and prepare future audiences for classical concerts. </p>
							<p>We will use the increasing interest for classical music, and utilize the many advantages of social media and streaming services to bring classical music into the 21. century - both for the gain of the classical music industry, but most of all to promote spiritual and cultural growth amongst all human beings. </p>
							<footer><p class="text-primary">Erik Danciu, Project Manager</p>
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
						<footer><p class="text-primary">Plato, Greek Philosopher</p></footer>
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
