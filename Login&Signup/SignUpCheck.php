<?php
$conn = mysql_connect("localhost");
mysql_select_db($conn);
if(!$conn)
    print mysql_error();

$Brugernavn = $_REQUEST["user_name"];
$Password = $_REQUEST["pass_word"];
// Gemmer indtastet data fra login i nye variabler.

$datstring="select * from Users where Username='" . $Brugernavn . "'";
	print mysql_error();
$recordset = mysql_query($datstring);

if (mysql_num_rows($recordset) == '0') // If lykke som tjekker om der står noget i tabellen.
{
	if ($Password !== "")	// Tjekker om der står noget i password feltet.
	{
		$insertSQL = "insert into Users (Username, Password) values ('$Brugernavn', '$Password')";  // indsætter de indtastet data i tabellen.
		mysql_query ($insertSQL);
		echo "Your profile has been created, welcome to explore classical. Press the Button to return to the front page.";
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
<form method="post" action="Index.php">
<input type="submit" value="Back to Home Page"> <br>
<!-- Man bliver sendt tilbage til startsiden lige meget hvad tilsidst, men burde nemt kunne ændres -->
</form>
</html>