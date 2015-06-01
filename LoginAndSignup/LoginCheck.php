<html>
	<head>
		<title> Explore Classical </title>
	</head>
	<body>
		<?php
			$servername = "localhost";
			$username = "exc";
			$password = "gxez2G:Pwfd5";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password);

			if($conn)
			{
				print mysql_error();
			
				$datstring = mysql_num_rows(mysql_query
				("
					SELECT * FROM Users
					WHERE `Username` = '$_POST[user_name]' AND `Password` = '$_POST[user_name]'
				"));

				if ($datstring == 0) // hvis den ikke finder nogle rækker i tabellen får brugeren en fejlmeddelelse.
				{
					echo 	"Username and Password do not match
							<form method='post' action='Index.php'>
							<input type='submit' value='Back to Home Page'>
							</form>";
				}
				else
				{
					// Hvad der end sker efter man har logget ind (redirect til profil?)
				}
			} 
		?>
	</body>
</html>