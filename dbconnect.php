<?php

//$db = mysqli_connect("localhost", "root", "", "webproj") or die(mysqli_error());

$servername = "localhost";
$username = "root";
$password = "";


// Create connection

$conn = new mysqli ($servername, $username, $password, "webproj");
// Check connection

if ($conn->connect_error) {

     die ("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>