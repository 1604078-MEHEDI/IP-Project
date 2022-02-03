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

        * {
            box-sizing: border-box;
        }

        .header {
            height: 100vh;
            background-image: linear- gradient(rgb(0, 0, 0, 0, 5), rgba(0, 0, 0, 0, 5)), url(img_food2.png);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        .search-field {
            height: 100px;
            padding: 10px;
            border: none;
            outline: none;
        }

        .location {
            height: 40px;
            width: 400px;
        }

        .search-btn {
            height: 40px;
            width: 150px;
            background: darkred;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        .form-box {
            background: rgba(0, 0, 0, 0, 5);
            padding: 30px;
        }

        .pic {

            margin: 5px;
            border: 1px solid transparent;
            float: left;
            width: 350px;
            padding: 15px;

        }

        .pic:hover {

            border: 1px solid transparent;

        }

        .pic img {

            width: 100%;
            height: 180px;

        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            right: 600px;
            padding: 50px;
        }
    </style>
</head>

<body>

    <div class="header">
        <form action="search.php" method="GET">
            <h2 style=" float: left;text-align: right;padding: 15px 30px;color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">It's the food you love, delivered</h2>
            <div class="form-box">
                <input type="text" class="search-find location" name="query" placeholder="Enter your area (e.q. CUET, Chittagong)">
                <button class="search-btn" type="submit" value="search">Search</button>
            </div> <br><br><br>

            <h3 style="color: white; padding: 15px 30px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Find us in your city</h3>

            <div class="pic">
                <a href="Dhaka.php">
                    <img src="Dhaka.jpg" alt="Dhaka" width="600" height="400">
                </a>
                <div style="padding: 1px; text-align: center;">
                    <h4 style="color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Dhaka</h4>
                </div>
            </div>

            <div class="pic">
                <a href="Chittagong.php">
                    <img src="Chittagong.png" alt="Chittagong" width="600" height="400">
                </a>
                <div style="padding: 1px; text-align: center;">
                    <h4 style="color: white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Chittagong</h4>
                </div>
            </div>

        </form>
    </div>

    <h3 style="color: white; padding: 16px 32px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Popular Cuisines</h3>
    <footer style="background-color: darkred;padding: 10px;text-align: center;color: white;">
        <ul style="margin: 0;padding: 0; list-style: none; font-size: 16px;-webkit-columns: 4; -moz-columns: 4; columns: 4; column-width: auto; column-count: 4;">

            <li>American</li>
            <li>Bakery &amp; Cake</li>
            <li>Burger</li>
            <li>Chinese</li>
            <li>Dessert</li>
            <li>Fast food</li>
            <li>Healthy food</li>
            <li>Indian</li>
            <li>Italian</li>
            <li>Japanese</li>
            <li>Korean</li>
            <li>Mexican</li>
            <li>Middle Eastern</li>
            <li>Pizza</li>
            <li>Seafood</li>
            <li>Thai</li>
            <li>Vegetarian</li>
            <li>Western</li>
        </ul>
    </footer>

</body>

</html>