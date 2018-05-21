<?php
$servername = "localhost";
$username = "root";
$password = "";

//to connect to database
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error){
 die("Connection to server failed" . $conn->error);
} 
else {
	 echo ("Connection to server successful") ."<br>";
}


//creating database
$sql = "CREATE DATABASE test";

//test connection

if ($conn->query($sql)=== true){
	echo "database created successfully";
}
else {
	die("could not create database" . $conn->error);
}

?>

