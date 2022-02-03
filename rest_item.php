<?php

include 'nav.php';

require_once("new_try.php");

$name = $_REQUEST['cname'];
//echo $name;

//start fucking

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {

        $query = "SELECT * FROM members WHERE name='" . $_GET["name"] . "'";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $productByCode[] = $row;
        }
        $itemArray = array($productByCode[0]["name"] => array('name' => $productByCode[0]["name"], 'quantity' => $_POST["quantity"], 'address' => $productByCode[0]["address"]));

        if (!empty($_SESSION["cart_item"])) {
          if (in_array($productByCode[0]["name"], array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
              if ($productByCode[0]["name"] == $k) {
                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
            }
          } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
          }
        } else {
          $_SESSION["cart_item"] = $itemArray;
        }
      }
      break;
    case "remove":
      if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
          if ($_GET["name"] == $k)
            unset($_SESSION["cart_item"][$k]);
          if (empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
        }
      }
      break;
    case "empty":
      unset($_SESSION["cart_item"]);
      break;
  }
}

?>

<html>

<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url(img_food2.png);
      background-size: cover;
      position: relative;
    }

    .bb {

      margin-left: 30px;
      margin-top: 15px;
      padding: 10px 16px;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #f1f1f1;
      color: black;
      font-size: 16px;
      cursor: pointer;
      text-align: center;

    }

    .bb:hover {
      background-color: deeppink;
      color: white;
    }

    .tablee {
      border-collapse: collapse;
      width: 70%;
      background-color: antiquewhite;
      margin: 100px;
    }

    th,
    td {
      padding: 16px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    th {
      background-color: deeppink;
      color: white;
    }

    .product-quantity {
      padding: 5px 10px;
      border-radius: 3px;
      border: #E0E0E0 1px solid;
    }

    .btnAddAction {
      padding: 5px 10px;
      margin-left: 5px;
      background-color: #efefef;
      border: #E0E0E0 1px solid;
      color: #211a1a;
      float: right;
      text-decoration: none;
      border-radius: 3px;
      cursor: pointer;
    }


    #shopping-cart {
      margin: 40px;
    }

    #shopping-cart table {
      width: 100%;
      background-color: #F0F0F0;
    }

    #shopping-cart table td {
      background-color: #FFFFFF;
    }

    .txt-heading {
      color: #211a1a;
      border-bottom: 1px solid #E0E0E0;
      overflow: auto;
    }

    #btnEmpty {
      background-color: #ffffff;
      border: #d00000 1px solid;
      padding: 5px 10px;
      color: #d00000;
      float: right;
      text-decoration: none;
      border-radius: 3px;
      margin: 10px 0px;
    }

    .tbl-cart {
      font-size: 0.9em;
    }

    .tbl-cart th {
      font-weight: normal;
    }

    .no-records {
      text-align: center;
      clear: both;
      margin: 38px 0px;
    }
  </style>
</head>

<body>

  <h2 style="text-align: center;color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><?php echo $name; ?></h2>
  <p style="text-align: center; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">The meals you love, delivered with care</p>




  <div id="shopping-cart">
    <div class="txt-heading">Shopping Cart</div>
    <a id="btnEmpty" href="rest_item.php?action=empty">Empty Cart</a>

    <?php
    if (isset($_SESSION["cart_item"])) {
      $total_quantity = 0;
      $total_price = 0;
      ?>
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
      <tbody>
        <tr>
          <th style="text-align:left;">Name</th>
          <th style="text-align:right;" width="5%">Quantity</th>
          <th style="text-align:right;" width="10%">Unit Price</th>
          <th style="text-align:right;" width="10%">Price</th>
          <th style="text-align:center;" width="5%">Remove</th>
        </tr>
        <?php
          foreach ($_SESSION["cart_item"] as $item) {
            $item_price = $item["quantity"] * $item["address"];
            ?>
        <tr>
          <td><?php echo $item["name"]; ?></td>
          <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
          <td style="text-align:right;"><?php echo "BDT " . $item["address"]; ?></td>
          <td style="text-align:right;"><?php echo "BDT " . number_format($item_price, 2); ?></td>
          <td style="text-align:center;"><a href="rest_item.php?action=remove&name=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
        </tr>
        <?php
            $total_quantity += $item["quantity"];
            $total_price += ($item["address"] * $item["quantity"]);
          }
          ?>
        <tr>
          <td colspan="2" align="right">Total:</td>
          <td align="right"><?php echo $total_quantity; ?></td>
          <td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <?php
    } else {
      ?>
    <div class="no-records">Your Cart is Empty</div>
    <?php
    }
    ?>
  </div>


  <table class="tablee">
    <tread>
      <tr>
        <th>Item Name</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </tread>

    <?php

    $query = "SELECT* FROM members WHERE contact = '$name'";
    $result = mysqli_query($connect, $query) or die("database error:" . mysqli_error($dbpatrol));
    while ($row = mysqli_fetch_assoc($result)) {
      $product_array[] = $row;
    }
    if (!empty($product_array)) {
      foreach ($product_array as $key => $value) {
        ?>
    <tr>
      <td><?php echo $product_array[$key]['name']; ?></td>
      <td><?php echo "BDT " . $product_array[$key]['address']; ?></td>
      <td>
        <form method="post" action="rest_item.php?action=add&name=<?php echo $product_array[$key]['name']; ?>">
          <input name='cname' value='<?php echo $name ?>' hidden>
          <div style="float:left;"><input type="text" class="product-quantity" name="quantity" value="0" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
        </form>
      </td>
    </tr>
    <?php
      }
    }
    ?>

  </table>

</body>

</html>