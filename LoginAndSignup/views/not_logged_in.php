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
						<li> <a href="index.php"> Home </a> </li>
						<li> <a href="Search.php"> Music</a> </li>
						<li> <a href="Concerts.php">Live Concerts </a> </li>
						<li> <a href="http://www.explore-classical.com/Forum/index.php"> Discussions </a> </li>
						<li> <a href="FAQ.php"> FAQ </a> </li>
						<li> <a href="About.php"> About </a> </li>
						<li> <a href="ContactUs.php"> Contact Us </a> </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"> <a href="LoginHome.php">Login</a> </li>
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
					<div class="container-fluid" style="padding-left:15%; padding-right:15%;">
						<!-- login form box -->
						<form role="form" method="post" action="LoginHome.php" name="loginform">
							<div class="form-group">
								<label for="login_input_username">Username</label>
								<input id="login_input_username" class="login_input form-control" type="text" placeholder="Enter Username" name="user_name" required />
							</div>
							
							<div class="form-group">
								<label for="login_input_password">Password</label>
								<input id="login_input_password" class="login_input form-control" type="password" placeholder="Enter Password"  name="user_password" autocomplete="off" required />
							</div>
							<center><button type="submit" class="btn btn-primary"  name="login" value="Log in"> Submit </button></center>
						</form>
					</div>
				</div>
			
				<div class="col-sm-6">
					<div class="page-header text-center">
						<h1 class="text-primary">Sign Up</h1>
					</div>
					
					<div class="container-fluid" style="padding-left:15%; padding-right:15%;">
						<!-- Registration form box -->
						<form role="form" method="post" action="register.php" name="registerform">
							<div class="form-group">
								<!-- the user name input field uses a HTML5 pattern check -->
								<label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
								<input id="login_input_username" class="login_input form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" placeholder="Enter desired Username" name="user_name" required />
							</div>
							<div class="form-group">
								<!-- the email input field uses a HTML5 email type check -->
								<label for="login_input_email">User's email</label>
								<input id="login_input_email" class="login_input form-control" type="email" placeholder="Enter valid Email"name="user_email" required />
							</div>
							<div class="form-group">
								<label for="login_input_password_new">Password (min. 6 characters)</label>
								<input id="login_input_password_new" class="login_input form-control" type="password" placeholder="Enter secure password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
							</div>
							<div class="form-group">
								<label for="login_input_password_repeat">Repeat password</label>
								<input id="login_input_password_repeat" class="login_input form-control" type="password" placeholder="Repeat secure password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
							</div>
					    <center><button type="submit"  class="btn btn-primary" name="register" value="Register">Register</button></center>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

