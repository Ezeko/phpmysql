<?php
include ("con_dat.php");

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
/*echo $fullname;
echo $username;
echo $email;
echo $address;
echo $password;*/

$sql = "INSERT INTO visitors (fullname,username,email,address,password) VALUES ('$fullname', '$username', '$email', '$address', '$password')";

// check insertion

if ($conn->query($sql)=== true){
	echo "Registration successful!!!". "<br>" . "user added into database";
}
else{
echo "Registration failed". $conn->error;
}

$conn->close();
?>