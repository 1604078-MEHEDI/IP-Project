<?php
include 'nav.php';
?>
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
    </style>
</head>

<body>

    <div class="header">
        <form action="search.php" method="GET">
            <h2 style="float: left;text-align: right;padding: 15px 30px;color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Food Delivery from Chittagong’s Best Restaurants</h2><br>
            <p style="float: left;text-align: right;padding: 15px 30px; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">The meals you love, delivered with care</p>
            <div class="form-box">
                <input type="text" class="search-find location" name="query" placeholder="Enter your area (e.q. CUET, Chittagong)">
                <button class="search-btn" type="submit">Search</button>
            </div>

        </form>
    </div>

</body>

</html>