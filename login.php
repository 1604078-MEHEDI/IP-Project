<?php
session_start();
?>

<?php

$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "foodpanda";
$connection = mysqli_connect($server, $user, $password, $database);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $password1=$_POST["password"];
    $email=$_POST["email"];


    $query = "SELECT password FROM users WHERE email='$email'";
    $sql = mysqli_query($connection, $query);
    $psd = mysqli_fetch_array($sql, MYSQLI_ASSOC);
    if($password1 == $psd['password']){
        echo "login Successful";
        $_SESSION['user'] = $email;
        header('Location: homePage.php');
    }
    else{
        $row = mysqli_num_rows($sql);
        if($row == 0){
            echo "Email nai";
        }
        else{
            echo "password did not match";
        }
    }
}
mysqli_close($connection);
//include "home.php";
?>