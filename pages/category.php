<?php
include "../includes/config.php";

$cat = isset($_GET["cat"]) ? $_GET["cat"] : "general";

$stmt = $conn->prepare("SELECT * FROM products WHERE category=?");
$stmt->bind_param("s", $cat);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= ucfirst($cat) ?> - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/EasyShop/css/style.css">
</head>
<body>

<nav>
  <div class="logo">Easy<span>Shop</span></div>
  <div>
    <a href="/EasyShop/index.php">Home</a>
    <a href="/EasyShop/pages/cart.php">Cart 🛒</a>
  </div>
</nav>

<div class="container">
  <h2><?= ucfirst($cat) ?> Products</h2>
  <p style="color:#cbd5e1;margin-top:8px;">Showing category: <b><?= $cat ?></b></p>

  <div class="grid">
    <?php if($result->num_rows == 0){ ?>
      <p style="color:#cbd5e1;">No products found in this category ❌</p>
    <?php } ?>

    <?php while($row = $result->fetch_assoc()) { ?>
      <div class="card">
        <img src="<?= $row["image"] ?>" alt="product">
        <div class="info">
          <h3><?= $row["name"] ?></h3>
          <p class="price">₹<?= $row["price"] ?></p>

          <br>
          <form method="post" action="/EasyShop/pages/cart.php">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <button class="btn btn-primary">Add to Cart</button>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
