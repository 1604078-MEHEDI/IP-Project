<?php
session_start();

// initializing variables
$f_name = "";
$l_name = "";
$number = "";
$email    = "";
$errors = array();

// connect to the database
$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "foodpanda";
$db = mysqli_connect($server, $user, $password, $database);


if($db){
   // echo"Success";
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $f_name = mysqli_real_escape_string($db, $_POST['f_name']);
  $l_name = mysqli_real_escape_string($db, $_POST['l_name']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "User already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (f_name, l_name, number, email, password)
  			  VALUES('$f_name','$l_name', '$number', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['f_name'] = $f_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: homePage.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['f_name'] = $f_name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: homePage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>