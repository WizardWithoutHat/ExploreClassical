<?php>
	$servername = "localhost";
	$username = "exc";
	$password = "gxez2G:Pwfd5";
	$dbname = "exc_main";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// include the configs / constants for the database connection
	require_once("LoginAndSignup/config/db.php");

	// load the login class
	require_once("LoginAndSignup/classes/Login.php");

	// create a login object. when this object is created, it will do all login/logout stuff automatically
	// so this single line handles the entire login process. in consequence, you can simply ...
	$login = new Login();

	$TrackName = "%" . $_GET["Track_Name"] . "%";
	$ArtistName = "%" . $_GET["Artist_Name"] . "%";
	$Year = $_GET["Year"];

	$recordset = mysqli_query($conn, "SELECT * FROM Music WHERE (Track_Name LIKE '". $TrackName ."') OR (Artist_Name LIKE '". $ArtistName ."') OR (Year = " . $Year . ")");
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
					<a class="navbar-brand" href="http://explore-classical.com/index.php">Explore Classical</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li> <a href="index.php"> Home </a> </li>
						<li class="active"> <a href="Search.php"> Music </a> </li>
						<li> <a href="Concerts.php"> Live Concerts </a> </li>
						<li> <a href="Discussions.php"> Discussions </a> </li>
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
							echo '<li> <a href="http://explore-classical.com/LoginHome.php">Profile</a> </li>';
							echo '<li> <a href="http://explore-classical.com/LoginHome.php?logout">Logout</a> </li>';
						} else {
							// the user is not logged in. you can do whatever you want here.
							// for demonstration purposes, we simply show the "you are not logged in" view.
							echo '<li> <a href="http://explore-classical.com/LoginHome.php">Login</a> </li>';
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
			<h1 class="text-primary" style="padding-left:5%;">Exploration in Music</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">		
			 <div class="list-group">
				<?php
					$counter = 0;
					if($recordset->num_rows > 0){
						while( $result = $recordset->fetch_assoc()){
							if($counter % 2 == 0){
								echo '<a href="Music.php?ID='.$result[TrackID].'" class="list-group-item active">';
								$counter = $counter + 1;
							} else {
								echo '<a href="Music.php?ID='.$result[TrackID].'" class="list-group-item">';
								$counter = $counter + 1;
							}
							echo '<h4 class="list-group-item-heading">' . $result[Track_Name] . ' </h4>';
							echo '<p class="list-group-item-text">' . $result[Artist_Name] . ', ' . $result[Year] . '</p>';
							echo '</a>';
						}
					}
				?>
			</div>
		</div>
	</body>
</html>