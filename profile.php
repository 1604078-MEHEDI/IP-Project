<?php include 'nav.php'; ?>

<html>

<head>
    <title>CUET Panda</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(img_food2.png);
            background-size: cover;
            position: relative;
        }
        
        .form-container {
            position: fixed;
            right: 600px;
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }
        
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
        
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }
        
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }

    </style>
</head>

<body>
    <?php

$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "foodpanda";
$connection = mysqli_connect($server, $user, $password, $database);

//if($_SERVER["REQUEST_METHOD"]=="POST"){
    //$password1=$_POST["password"];
    $email=$_SESSION['user'];
    


    $query = "SELECT * FROM users WHERE email='$email'";
    $sql = mysqli_query($connection, $query);
    $psd = mysqli_fetch_array($sql, MYSQLI_ASSOC);
    ?>

   <div class="form-container">
       <form action="updateProfile.php" method="post">
    
       <h1>USER'S PROFILE</h1>

        <lebel for="f_name"><b>First Name</b></lebel>
        <input type="text" placeholder="<?php echo $psd['f_name'] ?>" name="f_name" required>

        <lebel for="l_name"><b>Last Name</b></lebel>
        <input type="text" placeholder="<?php echo $psd['l_name'] ?>" name="l_name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="<?php echo $psd['email'] ?>" name="email" required>

        <label for="mobile"><b>Mobile Number</b></label>
        <input type="text" placeholder="<?php echo $psd['number'] ?>" name="number" required>

        <label for="psw"><b>Change Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="btn">Update</button>
           
       </form>
       
    </div>

</body>

</html>