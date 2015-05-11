<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<html>
	<head>
		<title>Register | Explore Classical</title>
		
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
						<li> <a href="http://explore-classical.com/index.php"> Home </a> </li>
						<li> <a href="http://explore-classical.com/Concerts.php">Live Concerts </a> </li>
						<li> <a href="http://explore-classical.com/Discussions.php"> Discussions </a> </li>
						<li> <a href="http://explore-classical.com/FAQ.php"> FAQ </a> </li>
						<li> <a href="http://explore-classical.com/About.php"> About </a> </li>
						<li> <a href="http://explore-classical.com/ContactUs.php"> Contact Us </a> </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li > <a href="LoginAndSignup/LoginHome.php">Login</a> </li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="jumbotron">
			<h1 class="text-danger text-center">WEBSITE UNDER CONSTRUCTION</h1>
			<p class="text-danger text-center">Below is purely conceptual information</p>
		</div>
		
		<div class="jumbotron">
			<h1 class="text-primary" style="padding-left:5%;">Welcome Aboard Explore Classical</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
	
		<div class="container-fluid">
			<div class="page-header text-center">
				<h1 class="text-primary">Account Succesfully Created!</h1>
				<h3 class="text-primary">Enjoy Beauty!</h3>
			</div>
			
			<div class="row">
				<div class="col-sm-4">
					<div class="page-header text-center">
						<h1 class="text-important">Your Profile</h1>
					</div>
					<p>Your profile has been created, and should be reachable after logging in back on the <a href="http://explore-classical.com/LoginHome.php">Login Page</a>. There you will in the future be able to find information such as playlists and forum posts of your own.</p>
				</div>
			
				<div class="col-sm-4">
					<div class="page-header text-center">
						<h1 class="text-important">Playlists</h1>
					</div>
					<p>Playlists are a list of tracks that you find to be related in some way, be it that they are from a certain timeperiod, share a mood or if you just find them to be great in general and want to have them sorted. This should all be explained to you on your profile.</p>
				</div>
				
				<div class="col-sm-4">
					<div class="page-header text-center">
						<h1 class="text-important">Discussions</h1>
					</div>
					<p>Like creating playlists, you can now start posting on the <a href="http://explore-classical.com/Discussions.php">Discussion Boards</a> using your account. Here, you will be able to chat and interact with the classical community to share what you've discovered!</p>
				</div>
			</div>
		</div>
	</body>
</html>