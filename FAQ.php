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
		<title>FAQ | Explore Classical</title>
		
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
						<li class="active"> <a href="FAQ.php"> FAQ </a> </li>
						<li> <a href="About.php"> About </a> </li>
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
			<h1 class="text-primary" style="padding-left:5%;">Frequently Asked Questions</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
	
		<div class="container">
			<div class="page-header text-center">
				<h1 class="text-important">The Questions</h1>
			</div>
			<ul style=list-style-type:none>
				<li>
					<div class="panel panel-default">
						<div class="panel-heading">What is Explore Classical?</div>
						<div class="panel-body">
						Explore Classical is a cultural educational project which strives to bring the wonders of classical music to everyone. 
						Explore Classical strives to become the main source of discovering new classical music, both digitally and live.
						Whether you are a newcomer to classical music or have many years of experience, we will help you find exactly the music that suits your mood, age and much more. 
						See more on the <a href="About.php">about</a> page.</div>
					</div>
				</li>
				<li>
					<div class="panel panel-danger">
						<div class="panel-heading">Why can't I play the music?</div>
						<div class="panel-body">The music on this site uses Spotify. In order to have a smooth experience, you need <a href="https://www.spotify.com">Spotify</a> installed and opened.</div>
					</div>
				</li>				
				<li>
					<div class="panel panel-primary">
						<div class="panel-heading">Why do I need spotify?</div>
						<div class="panel-body">Spotify hosts a large number of classical pieces for free, meaning we can have good quality music with minimal disturbances.</div>
					</div>
				</li>
				<li>
					<div class="panel panel-success">
						<div class="panel-heading">Do I need to create a user both here and on Spotify?</div>
						<div class="panel-body">Fortunately, you need not create a user here for this site to use it's features in its current state.
						You do however need a spotify account for the most smooth experience, but this should not be a problem, as Spotify uses Facebook Login. </div>
					</div>
				</li>
				<li>
					<div class="panel panel-info">
						<div class="panel-heading">Are you making money off of this site?</div>
						<div class="panel-body">Currently this site is not monetised in any way. 
						The few adds that might occur during the music is from Spotify itself, and can be avoided by getting a subscription there, though it is not neccesary at all.</div>
					</div>
				</li>
				<li>
					<div class="panel panel-warning">
						<div class="panel-heading">Who are you?</div>
						<div class="panel-body">The organisation behind Explore Classical is based out of Copenhagen, and has the sole focus of bringing classical music to the people.</div>
					</div>
				</li>
			</div>
		</div>
	</body>
</html>
