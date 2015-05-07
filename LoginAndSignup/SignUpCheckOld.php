<?php
	$servername = "localhost";
	$username = "exc_admin";
	$password = "eSGq#muX9ddJ";
	$dbname = "exc_main";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$Brugernavn = $_REQUEST["user_name"];
	$Password = $_REQUEST["pass_word"];
	// Gemmer indtastet data fra login i nye variabler.
	$datstring="SELECT * FROM Users WHERE Username='" . $Brugernavn . "'";

	$recordset = $conn->query($datstring);
	
	// If-løkke som tjekker om der står noget i tabellen.
	if ($recordset->num_rows == 0) 
	{   
		// Tjekker om der står noget i password feltet.
		if ($Password !== "") 
		{    
			$insertSQL = "insert into Users (Username, Password) values ('$Brugernavn', '$Password')";  // indsætter de indtastet data i tabellen.
			if ($conn->query($insertSQL) === TRUE)
			{
				echo "Your profile has been created, welcome to explore classical. Press the Button to return to the front page.";
			}
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else
		{
			echo "Cant have empty password <br>";
		}
	}
	else
	{ 
		echo "Username is taken, please choose another. <br> <br>";
	}
?>

<html>
	<form method="post" action="http://explore-classical.com">
		<input type="submit" value="Back to Home Page"> <br>
		<!-- Man bliver sendt tilbage til startsiden lige meget hvad tilsidst, men burde nemt kunne ændres -->
	</form>
</html>