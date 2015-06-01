<?php>
	$servername = "localhost";
	$username = "exc";
	$password = "gxez2G:Pwfd5";
	$dbname = "exc_main";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, 'utf8');

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

$AlbumID= $_GET["AlbumID"];
$recordset = mysqli_query($conn, "SELECT * FROM Albums WHERE ArtistName = '" . $AlbumID . "'");
$result = $recordset->fetch_assoc();
$Album_Title = $result["Album_Title"]
$Description = $result["Description"];
$Year = $result["Year"];
$recordset->free();
?>


<html>
	<head>
		<title> <?php echo $Album_Title; ?> | Explore Classical</title>
		
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
						<li class="active"> <a href="Artists.php"> Artists</a> </li>
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
							echo '<li> <a href="LoginHome.php">Profile</a> </li>';
							echo '<li> <a href="LoginHome.php?logout">Logout</a> </li>';
						} else {
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
			<h1 class="text-primary" style="padding-left:5%;"> 
				<?php 
					echo $ArtistName
				?> 
			</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">		
			<div class="row">
				<div class="col-sm-4"> 
					<div class="page-header text-center">
						<h1 class="text-important">Description</h1>
					</div>
					<?php
							echo $Description;
						?>
				</div>
			
				<div class="col-sm-8">
					<div class="page-header text-center">
						<h1 class="text-important">Albums</h1>
					</div>
					<!--Her vil vi give en liste over albums. -->
					<?php 
						$counter = 0
						$recordset = mysqli_query($conn, "SELECT * FROM Music WHERE AlbumID = '" . $AlbumID. "'");
						if($recordset->num_rows > 0){
							while($result = $recordset->fetch_assoc()){
								if($counter % 2 == 0){
									echo '<a href="Music.php?ID='.$result[TrackID].'" class="list-group-item active">';
									$counter = $counter + 1;
								} else {
									echo '<a href="Music.php?ID='.$result[TrackID].'" class="list-group-item">';	
									$counter = $counter + 1;
								}
								echo '<h4 class="list-group-item-heading">' . $result["Album_Title"] . ' </h4>';
								echo '<p class="list-group-item-text">' . $result["Artist_Name"] . ', ' . $result["Year"] . '</p>';
								echo '</a>';
							}
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>