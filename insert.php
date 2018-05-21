<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$reg = date("d/m/Y");

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Timothy', 'Olugbade', 'timstot@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>