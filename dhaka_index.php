
<html>

<head>
    <link rel="stylesheet" href="styles.css">
<body>
    <?php
    $server      = "localhost";
    $password    = "";
    $user        = "root";
    $database    = "foodpanda";
    $db = mysqli_connect($server, $user, $password, $database);

    if ($db) echo "success";
    else echo "Error";

    $sql = "SELECT *FROM dhaka_resturent";
                    $resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($dbpatrol));
                    while( $record = mysqli_fetch_assoc($resultset) ) {
                    ?>

                <div class="album py-5 bg-light">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                          <div>
                            <img class="card-img-top" src="<?php echo $record['images']; ?>" alt="Card image cap">
                          </div>
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $record['name']; ?></h5>
                            <p class="card-text"><?php echo $record['location']; ?></p>
                            <p class="card-text"><?php echo $record['id']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                             <a href="home.php" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                    <?php }?>

</body>
</head>

</html>