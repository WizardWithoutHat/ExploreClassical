<?php
	$servername = "localhost";
	$username = "exc";
	$password = "gxez2G:Pwfd5";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?>

<html>
	<head>
		<title>Home | Explore Classical</title>
		
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
						<li class="active"> <a href="index.php"> Home </a> </li>
						<li> <a href="Concerts.php"> Live Concerts </a> </li>
						<li> <a href="Discussions.php"> Discussions </a> </li>
						<li> <a href="FAQ.php"> FAQ </a> </li>
						<li> <a href="About.php"> About </a> </li>
						<li> <a href="ContactUs.php"> Contact Us </a> </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li> <a href="LoginAndSignup/LoginHome.php">Login</a> </li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="jumbotron">
			<h1 class="text-danger text-center">WEBSITE UNDER CONSTRUCTION</h1>
			<p class="text-danger text-center">Below is purely conceptual information</p>
		</div>
		
		<div class="jumbotron">
			<h1 class="text-primary" style="padding-left:5%;">Welcome to Explore Classical! </h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4"> 
					<div class="container-fluid">	
						<div class="page-header text-center">
							<h1 class="text-important">Go Exploring!</h1>
						</div>
						
						<p> This website offers you access to the world of one of the greatest genres of music in the history of man, Classical Music. 
						Classical music has been around for centuries, and has usually been seen as the educated mans music, which has led to it being less prevalent in the modern scene.
						This website aims to correct this by bringing you the wonders of the classical genre, to prove that this has more to offer to the modern society than you'd think. </p>
					
						<p> To the right you can have a taste of what we will show you. 
						This website utilises Spotify, so in order to use it properly you should have it installed on your computer from <a href="https://www.spotify.com">their website</a>.
						Spotify is a free service, and if you have Facebook, you can simply use that to log in and listen.
						This website aims to help you browse through the vast catalogue, thereby bringing you both well known and lesser known gems that you might not have experienced otherwise.
						</p>
					</div>
				</div>
			
				<div class="col-sm-8">
					<div class="page-header text-center">
						<h1 class="text-important">Here is a small taste of what you may discover</h1>
					</div>
					<h4 class="text-danger text-center">This music track right here is currently chosen from only 5 different tracks, but is chosen at random, as to really make people discover something new!</h4>
					<center>
						<div class="container-fluid">
							<iframe id="randomMusic" src="about:blank" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
						</div>
						
						<button type="button" class="btn btn-primary" onclick="pickNumber()">Discover Another!</button>
						<script src="js/RandomMusic.js"></script>
						<script>pickNumber()</script>
					</center>
				</div>
			</div>
		</div>
	</body>
</html>
