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
		<title>Contact Us | Explore Classical</title>
		
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
						<li> <a href="http://www.explore-classical.com/Forum/index.php"> Discussions </a> </li>
						<li> <a href="FAQ.php"> FAQ </a> </li>
						<li> <a href="About.php"> About </a> </li>
						<li class="active"> <a href="ContactUs.php"> Contact Us </a> </li>
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
			<h1 class="text-primary" style="padding-left:5%;">Contact Explore Classical</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">
			<h1 class="text-danger">[NOT IMPLEMENTED]</h1>
			<div class="row">
				<div class="col-sm-4"> 
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1> How to contact us! </h1>
						</div>
						<p>You can contact the staff of Explore Classical by filling in the following contact form. We will attempt to answer as soon as possible.</p>
					</div>
				</div>
			
				<div class="col-sm-8">
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1> The Contact Form</h1>
						</div>
						<p class="text-danger"> This section is yet to be implemented, but it could for example be presented as such:</p>
						
						<div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr">
						</div>
						<div class="form-group">
						  <label for="usrmail">Your Email:</label>
						  <input type="text" class="form-control" id="usrmail">
						</div>
						<div class="form-group">
						  <label for="subject">Subject:</label>
						  <input type="text" class="form-control" id="subject">
						</div>
						<div class="form-group">
							<label for="comment">Mail:</label>
							<textarea class="form-control" rows="6" id="mail"></textarea>
						</div>
						<button type="button" class="btn btn-default">Send</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
