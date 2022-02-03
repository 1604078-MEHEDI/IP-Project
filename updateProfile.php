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
    $f_name=$_POST["f_name"];
    $l_name=$_POST["l_name"];
    $email=$_POST["email"];
    $number=$_POST["number"];
    $password1=$_POST["password"];
    
    $cur_email=$_SESSION['user'];

    
    $sql = "UPDATE users SET f_name='$f_name',l_name='$l_name',email='$email',number='$number',password='$password1' WHERE email='$cur_email' ";

    if($connection->query($sql)){
        echo "New record is updated successfully";
        $_SESSION['cur_email'] = $email;
        header('Location: profile.php');
        exit();
    }
    else{
        $searchq=$_SESSION['cur_email'];
        $query = mysqli_query($link,"SELECT*FROM users WHERE email LIKE '%$searchq%' ") or die ("Could Not Search!!! Search Correctly!!!");
    }
}
mysqli_close($connection);
//include "home.php";
?>