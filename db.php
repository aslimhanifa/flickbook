<?php
// db.php
$servername = "localhost"; //  server
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "movies"; //  database name

//create connection
$conn = new mysqli($servername, $username, $password,$dbname);

//check connection
if ($conn->connect_error)
{
	die("Connection failed :". $conn->connect_error);
}

?>
