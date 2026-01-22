<?php
include "../includes/config.php";

if(!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

if(!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0){
  die("Cart is empty ❌");
}

/* user id */
$email = $_SESSION["email"];
$userData = $conn->query("SELECT * FROM users WHERE email='$email'")->fetch_assoc();
$user_id = $userData["id"];

/* total */
$ids = implode(",", array_keys($_SESSION["cart"]));
$result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");

$total = 0;
$items = [];

while($p = $result->fetch_assoc()){
  $qty = $_SESSION["cart"][$p["id"]];
  $total += $p["price"] * $qty;
  $items[] = ["id"=>$p["id"], "qty"=>$qty, "price"=>$p["price"]];
}

/* save order */
$conn->query("INSERT INTO orders(user_id,total) VALUES('$user_id','$total')");
$order_id = $conn->insert_id;

/* save items */
foreach($items as $it){
  $pid = $it["id"];
  $qty = $it["qty"];
  $price = $it["price"];
  $conn->query("INSERT INTO order_items(order_id,product_id,qty,price)
                VALUES('$order_id','$pid','$qty','$price')");
}

/* clear cart */
$_SESSION["cart"] = [];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
  <div class="logo">Easy<span>Shop</span></div>
  <div>
    <a href="../index.php">Home</a>
    <a href="cart.php">Cart</a>
  </div>
</nav>

<div class="container">
  <h2>✅ Order Placed Successfully!</h2>
  <p style="color:#cbd5e1;margin-top:10px;">Thanks for shopping with EasyShop.</p>
  <h3 style="margin-top:15px;">Total Paid: ₹<?= $total ?></h3>
</div>

</body>
</html>
