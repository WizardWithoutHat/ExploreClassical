<?php

?>

<html>
	<head>
		<title>Live Concerts | Explore Classical</title>
		
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
						<li class="active"> <a href="Concerts.php">Live Concerts </a> </li>
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
			<h1 class="text-primary" style="padding-left:5%;">Live Concerts Near You</h1>
			<p class="text-primary" style="padding-left:10%;">Explore Classical ~ Discover Beauty</p>
		</div>
		
		<div class="container-fluid">
			<h1 class="text-danger">[NOT IMPLEMENTED]</h1>
			<div class="row">
				<div class="col-sm-4"> 
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1 class="text-important">To find a concert</h1>
						</div>
						<p>Classical music is not only about hearing the music made in the past, it is also about the present. 
						Many masterful orchestras practice Classical music around the globe, and to experience them brings a new level to the experience.
						Here you will eventually (when implemented) be able to find a list of Live Concerts being played soon near you! </p>

						<p>The way this is supposed to work is to use HTML Geolocation in javascript to calculate which concerts are closest within a certain timeframe, say, a week.
						It could maybe ask for the location of the computer as of right now (the easier solution), or maybe choose from Google Maps.</p>
						
						<p>All of the nearby concerts should then be shown in a table on the right column.</p>
					</div>
				</div>
			
				<div class="col-sm-8">
					<div class="container-fluid">
						<div class="page-header text-center">
							<h1 class="text-important">The concerts</h1>
						</div>
						<p class="text-danger"> This section is yet to be implemented, but it could for example be presented as such:</p>
						<table class="table">
							<thead>
								<tr>
									<th>Title</th>
									<th>Author</th>
									<th>Date</th>
									<th>Location</th>
								</tr>
							</thead>
							<tbody>
								<tr class="success">
									<td>Hymne til Kærligheden</td>
									<td>Aarhus Symfoniorkester</td>
									<td>23. April - 2015</td>
									<td>Musikhuset Aarhus</td>
								</tr>
								<tr class="danger">
									<td>Åben Generalprøve</td>
									<td>DR Symfoniorkester</td>
									<td>7. maj - 2014</td>
									<td>DR Koncerthuset</td>
								</tr>
								<tr class="info">
									<td>Mahlers 3.</td>
									<td>DR Symfoniorkester</td>
									<td>30. maj - 2014</td>
									<td>DR Koncerthuset</td>
								</tr>
							</tbody>
						</table>						
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>
