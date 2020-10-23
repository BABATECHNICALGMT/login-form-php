<?php

$login = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
  
  include 'public/_dbconnect.php';
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  $sql = "select * from users where username='$username' and password='$password'";

  $result = mysqli_query($conn,$sql);

  $num = mysqli_num_rows($result);

  if($num==1){
    $login = true;
    session_start();

    $_SESSION['loggedin']= true;
    $_SESSION['username']= $username;
    header("location: webcome.php");

  }else{
    $showError = true;
  }
}


?>


<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>login page</title>
  </head>
  <body>

    <?php require 'public/_nav.php'?>

    <!-- alert echo -->
    <?php
    if($login){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success !</strong> you are logged in.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> ';
    }
    if($showError){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error ! </strong> Invalid Credentials.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
			</div>';
			}
    ?>

  
    <div class="container">
    <h1 class="text-center text-uppercase" >login to our  website</h1>
    <form action="/loginform/login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="Username" aria-describedby="emailHelp" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">login</button>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>