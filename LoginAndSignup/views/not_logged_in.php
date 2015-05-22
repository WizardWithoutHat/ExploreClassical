<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}

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

<html>
	<head>
		<title>Login | Explore Classical</title>
		
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
						<li> <a href="http://explore-classical.com/"> Home </a> </li>
						<li> <a href="http://explore-classical.com/Concerts.php">Live Concerts </a> </li>
						<li> <a href="http://explore-classical.com/Discussions.php"> Discussions </a> </li>
						<li> <a href="http://explore-classical.com/FAQ.php"> FAQ </a> </li>
						<li> <a href="http://explore-classical.com/About.php"> About </a> </li>
						<li> <a href="http://explore-classical.com/ContactUs.php"> Contact Us </a> </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"> <a href="http://explore-classical.com/LoginHome.php">Login</a> </li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="jumbotron">
			<h1 class="text-danger text-center">WEBSITE UNDER CONSTRUCTION</h1>
			<p class="text-danger text-center">Below is purely conceptual information</p>
		</div>
		
		<div class="jumbotron">
			<h1 class="text-primary" style="padding-left:5%;">Login to Explore Classical</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
	
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="page-header text-center">
						<h1 class="text-primary">Login</h1>
					</div>
					login <br> <br>
					<!-- login form box -->
					<form method="post" action="LoginHome.php" name="loginform">

					    <label for="login_input_username">Username</label>
					    <input id="login_input_username" class="login_input" type="text" name="user_name" required />

					    <label for="login_input_password">Password</label>
					    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

					    <input type="submit"  name="login" value="Log in" />

					</form>
				</div>
			
				<div class="col-sm-6">
					<div class="page-header text-center">
						<h1 class="text-primary">Sign Up</h1>
					</div>
					<!-- Registration form box -->
					<form method="post" action="register.php" name="registerform">
						<!-- the user name input field uses a HTML5 pattern check -->
					    <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
					    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
						
					    <!-- the email input field uses a HTML5 email type check -->
					    <label for="login_input_email">User's email</label>
					    <input id="login_input_email" class="login_input" type="email" name="user_email" required />

					    <label for="login_input_password_new">Password (min. 6 characters)</label>
					    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
					
					    <label for="login_input_password_repeat">Repeat password</label>
					    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
					    <input type="submit"  name="register" value="Register" />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

