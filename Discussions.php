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
		<title>Discussions | Explore Classical</title>
		
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
						<li class="active"> <a href="Discussions.php"> Discussions </a> </li>
						<li> <a href="FAQ.php"> FAQ </a> </li>
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
			<h1 class="text-primary" style="padding-left:5%;">Discuss Classical Exploration!</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">
			<h1 class="text-danger">[NOT IMPLEMENTED]</h1>
			<div class="row">
				<div class="col-sm-4"> 
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1 class="text-important">To discuss the music</h1>
						</div>
						<p>To really understand music one might want to discuss it with others. 
						This page is supposed to be a gateway to a forum where the topic is classical music.
						This could range from discussions about a certain symphony, composer, orchestra, genre or timeperiod.
						The possibilities for discourse are endless, and as such it has to be facilitated. 
						Here, the users of the site can freely have discussions, knowing that everyone shares their common interest in music. </p>

						<p>The way this is supposed to work is to either outsource the work to an already established forum-service, or to attempt to make one ourselves.
						To do so would require a login-system, a database for the posts to be stored, a system for moderation and so on. </p>
						
						<p>One attempt to visualize such a post on a forum could be seen to the right, in the other column. 
						Of course this is a very rough idea, with no functionality as of yet. </p>
					</div>
				</div>
			
				<div class="col-sm-8">
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1 class="text-important">The discussions</h1>
						</div>
						<p class="text-danger"> This section is yet to be implemented, but it could for example be presented as such:</p>
						<div class="panel panel-default">
							<div class="panel-heading">Example forum:
							<div class="panel-body">
								<div class="panel panel-primary">
									<div class="panel-heading">Explore Classical Forum</div>
									<div class="panel-body">
										<table class="table">
											<thead>
												<tr>
													<th>Topic</th>
													<th>Author</th>
													<th>Post Date</th>
													<th>Thread length</th>
												</tr>
											</thead>
											<tbody>
												<tr class="success">
													<td><a href="#" class="btn">Excited for Aarhus Symfoniorkester!</a></td>
													<td>Den_Aarhusianer_92</td>
													<td>20. April - 2015</td>
													<td>12</td>
												</tr>
												<tr class="important">
													<td><a href="#" class="btn">Recommend me something!</a></td>
													<td>NewGuyOnTheBlock</td>
													<td>17. April - 2015</td>
													<td>4</td>
												</tr>
												<tr class="warning">
													<td><a href="#" class="btn">What symfony made you interested in Classical Music?</a></td>
													<td>YourDad</td>
													<td>18. April - 2015</td>
													<td> 81</td>
												</tr>												
											</tbody>
										</table>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
