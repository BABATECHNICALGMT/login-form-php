<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "user";

// careate a server
$conn = mysqli_connect($server, $username,$password,$database);

if(!$conn){
    die("sorry " . mysqli_connect_error());
}

?>