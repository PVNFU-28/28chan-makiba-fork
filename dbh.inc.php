<?php
$servername = "127.0.0.1";

$username = "username";

$password = "password";

//CREATING THE CONNECTION TO THE DATABASE !!!

$conn = mysqli_connect ($servername, $username, $password, "databasename");

//checking the connection 

if (!$conn) {
  die("Connection is not working !!!" . mysqli_connect_error ());
}

echo "The connection is working ! " ;
?>
