<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) {
    $flag = 1;
} else {
    $flag = 0;
}
?>
<html>

<head>
    <title>CUET Panda</title>
    <style>
        .nav {
            overflow: hidden;
            background-color: transparent;
            position: sticky;
            top: 0;
            z-index: 10;
            padding: 10px;
        }

        .nav h2 {
            float: left;
            text-align: right;
            padding: 15px 30px;
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
            cursor: pointer;
        }

        .nav h3 {
            float: right;
            color: white;
            text-align: left;
            padding: 16px 32px;
            text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
            cursor: pointer;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            right: 600px;
            padding: 50px;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
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

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */ 
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
        
        .dropdown {
            float: right;
            color: white;
            text-align: left;
            padding: 16px 32px;
            position: relative;
            display: inline-block;
            
        }

      .dropdown-content {
           display: none;
           position: fixed;
           background-color: #f9f9f9;
           min-width: 160px;
           box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
           z-index: 1;
           cursor: pointer;
           margin-top: 60px;
           margin-left: 20px;
      }

      .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
     }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
         display: block;
    }

        
    </style>
</head>

<body>
    <div class="nav">
        <a href="homePage.php">
            <h2>CUET <small>Panda</small></h2>
        </a>

        <?php if ($flag) { ?> <div class="dropdown"><h3><?php echo $_SESSION['user']; ?></h3><div class="dropdown-content"><a href="profile.php">Profile</a><a href="logout.php">Log Out</a></div></div>

        <?php } 
        
        else { ?> <h3 onclick="openForm()">Log in</h3>
        <?php } ?>

        <div class="form-popup" id="myForm">
            <form action="login.php" class="form-container" method="post">
                <p>Don't have an account? <span onclick="openReg()" style="color: red; cursor: pointer;">Sign up here</span></p>

                <h1>Login</h1>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" class="btn">Login</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        <div class="form-popup" id="myReg">
            <form action="server.php" class="form-container" method="post">
                <p>You have an account? <span onclick="openForm()" style="color: red; cursor: pointer;">Login</span></p>

                <h1>REGISTER</h1>

                <lebel for="f_name"><b>First name</b></lebel>
                <input type="text" placeholder="Enter First name" name="f_name" required>

                <lebel for="l_name"><b>Last name</b></lebel>
                <input type="text" placeholder="Enter Last name" name="l_name" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="mobile"><b>Mobile Number</b></label>
                <input type="text" placeholder="Enter Mobile number" name="number" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" class="btn">REGISTER</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

            </form>
        </div>
        

    </div>
    <script>
        function openForm() {

            document.getElementById("myReg").style.display = "none";
            document.getElementById("myForm").style.display = "block";
        }

        function openReg() {

            document.getElementById("myForm").style.display = "none";
            document.getElementById("myReg").style.display = "block";
        }

        function closeForm() {

            document.getElementById("myForm").style.display = "none";
            document.getElementById("myReg").style.display = "none";
        }
        
        
    </script>

</body>

</html>