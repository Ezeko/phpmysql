<?php

// connecting server
$servername ="localhost";
$username ="root";
$password = "";
$database = "user";
$conn = new mysqli ($servername, $username, $password, $database);

//test connection
if ($conn->connect_error){
	die ("Connection to server failed!!!!" . $conn->error);
}
else {
	//echo "Connected to server and database!!!! ". "<br><br>";
}
?>