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
						<li> <a href="Concerts.php">Live Concerts </a> </li>
						<li> <a href="Discussions.php"> Discussions </a> </li>
						<li> <a href="FAQ.php"> FAQ </a> </li>
						<li> <a href="About.php"> About </a> </li>
						<li> <a href="ContactUs.php"> Contact Us </a> </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"> <a href="LoginAndSignup/LoginHome.php">Login</a> </li>
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
					Login <br> <br>
					<form method="post" action="LoginCheck.php">
					Username: <input type="text" name="user_name">   <br> <br>
					Password: <input type="password" name="pass_word"> <br> <br>
					<input type="submit" value="Login"></form> <br>
				</div>
			
				<div class="col-sm-6">
					<div class="page-header text-center">
						<h1 class="text-primary">Sign Up</h1>
					</div>
					Sign up <br> <br>
					<form method="post" action="SignUpCheck.php">
						<!-- user_name & pass_word skal måske skiftes så man bruger forskellige variabler -->
						Username: <input type="text" name="user_name">   <br> <br>
						Password: <input type="password" name="pass_word"> <br> <br>
						<input type="submit" value="Sign up">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>