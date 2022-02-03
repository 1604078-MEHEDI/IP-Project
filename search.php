<html>

<head>
    <style>
        .profile-pic {
            margin-top: 25px;
        }

        .img-responsive {
            width: 250px;
            height: 250px;
        }

        .column {
            float: left;
            padding: 17px;
        }

        .column h3 {
            color: white;
            text-align: center;
            text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
            cursor: pointer;
        }

        .container {
            padding-bottom: 50px;
        }

        .btn-primaryr {
            padding: 100px;
        }
    </style>

<body>

    <div class="container">
        <div class="row">

            <?php
            $server      = "localhost";
            $password    = "";
            $user        = "root";
            $database    = "foodpanda";
            $db = mysqli_connect($server, $user, $password, $database);

            $query = $_GET["query"];
            $query = htmlspecialchars($query);
            $sql = "SELECT *FROM dhaka_resturent where location LIKE '%$query%'";
            $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($dbpatrol));


           // $resultset = mysqli_query($db, $sql);
            while ($record = mysqli_fetch_assoc($resultset)) {
                ?>

            <div class="column">
                <div class="col-md-4 profile-pic text-center">
                    <a href="rest_item.php?cname=<?php echo $record['name'] ?>"><img src="<?php echo $record['images']; ?>" class="img-responsive"></a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="rest_item.php?cname=<?php echo $record['name'] ?>">
                        <h3><?php echo $record['name']; ?></h3>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</head>

</html>