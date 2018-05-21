<?php
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];


echo "<p>"; echo ("USERNAME: ". $username); echo "</p>";
echo "<p>"; echo ("password: ". $password); echo "</p>";
echo "<p>"; echo ("FIRSTNAME: ". $fname); echo "</p>";
echo "<p>"; echo ("LASTNAME: ". $lname); echo "</p>";
echo "<p>"; echo ("ADDRESS: ". $address); echo "</p>";
echo "<p>"; echo ("CONTACT: ". $contact); echo "</p>";
echo "<p>"; echo ("GENDER: ". $gender); echo "</p>";

?>