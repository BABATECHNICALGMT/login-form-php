<?php
$showalert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
  
  include 'public/_dbconnect.php';
  $username = $_POST['Username'];
  $password = $_POST['Password'];
  $cpassword = $_POST['cPassword'];
  // check whether this username Exists
  $exitSql = "SELECT * FROM `users` WHERE username = '$username'"; 
  $resule =  mysqli_query($conn, $exitSql);
  $numExitRows = mysqli_num_rows($resule);

  if($numExitRows > 0){
    $exited = true;
  }else{
    $exited = false;
  }

  if(($password == $cpassword) && $exited == false){

    $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
    $resule = mysqli_query($conn, $sql);
    if($resule){
      $showalert = true;
    }
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

    <title>sign page</title>
  </head>
  <body>


    <?php require 'public/_nav.php'?>
    <!-- alert echo -->
    <?php
    if($showalert){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success !</strong> your account is now created and you can login.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> ';
    }
    if($showError){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error ! </strong> Passwords do not match or Username Already Exists.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
			</div>';
			}
    ?>

  
    <div class="container">
    <h1 class="text-center text-uppercase" >signup to our  website</h1>
    <form action="/loginform/signup.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="Username" aria-describedby="emailHelp" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="cPassword"> Confirm Password</label>
        <input type="password" class="form-control" id="cPassword" name="cPassword" placeholder="Password">
        <small id="emailHelp" class="form-text text-muted">Make sure to type the same password.</small>
      </div>
      <button type="submit" class="btn btn-primary">sign up</button>
    </form>
    </div>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>