<?php
include "../includes/config.php";

if(!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = []; // id => qty
}

/* Add to cart */
if(isset($_POST["id"])) {
  $id = $_POST["id"];
  if(isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id] += 1;
  } else {
    $_SESSION["cart"][$id] = 1;
  }
  header("Location: cart.php");
  exit();
}

/* Cart actions */
if(isset($_GET["action"]) && isset($_GET["id"])) {
  $id = $_GET["id"];

  if($_GET["action"] == "plus") $_SESSION["cart"][$id] += 1;

  if($_GET["action"] == "minus") {
    $_SESSION["cart"][$id] -= 1;
    if($_SESSION["cart"][$id] <= 0) unset($_SESSION["cart"][$id]);
  }

  if($_GET["action"] == "remove") unset($_SESSION["cart"][$id]);

  header("Location: cart.php");
  exit();
}

$total = 0;
$cartProducts = null;

if(count($_SESSION["cart"]) > 0){
  $ids = implode(",", array_keys($_SESSION["cart"]));
  $cartProducts = $conn->query("SELECT * FROM products WHERE id IN ($ids)");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cart - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
  <div class="logo">Easy<span>Shop</span></div>
  <div>
    <a href="../index.php">Home</a>
    <a href="checkout.php">Checkout</a>
  </div>
</nav>

<div class="container">
  <h2>Your Cart 🛒</h2>

  <?php if(count($_SESSION["cart"]) == 0){ ?>
    <p style="color:#cbd5e1;margin-top:10px;">Cart is empty 😅</p>
  <?php } else { ?>

    <div class="grid">
      <?php while($row = $cartProducts->fetch_assoc()) { 
        $qty = $_SESSION["cart"][$row["id"]];
        $sub = $row["price"] * $qty;
        $total += $sub;
      ?>
      <div class="card">
        <img src="<?= $row["image"] ?>" alt="">
        <div class="info">
          <h3><?= $row["name"] ?></h3>
          <p class="price">₹<?= $row["price"] ?></p>
          <p style="margin-top:6px;color:#cbd5e1;">Qty: <b><?= $qty ?></b></p>
          <p style="margin-top:6px;color:#cbd5e1;">Subtotal: <b>₹<?= $sub ?></b></p>

          <br>
          <a href="cart.php?action=minus&id=<?= $row["id"] ?>"><button class="btn btn-light">-</button></a>
          <a href="cart.php?action=plus&id=<?= $row["id"] ?>"><button class="btn btn-light">+</button></a>
          <a href="cart.php?action=remove&id=<?= $row["id"] ?>"><button class="btn btn-danger">Remove</button></a>
        </div>
      </div>
      <?php } ?>
    </div>

    <div class="cartRow">
      <div class="cartFlex">
        <h2>Total: ₹<?= $total ?></h2>
        <a href="checkout.php"><button class="btn btn-primary">Place Order</button></a>
      </div>
    </div>

  <?php } ?>
</div>

</body>
</html>
