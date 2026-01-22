<?php
include "includes/config.php";
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
  <title>EasyShop - All Brands Store</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include "includes/header.php"; ?>

<section class="hero">
  <div class="heroText">
    <h1>Shop Smart with <span>EasyShop</span></h1>
    <p>All brands in one place ✅ Fashion, Electronics, Shoes, Watches and more.</p>
    <a href="#products"><button class="btn btn-primary">Shop Now</button></a>
  </div>

  <div class="heroImg">
    <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f?auto=format&fit=crop&w=900&q=80" alt="banner">
  </div>
</section>

<div class="container" id="products">
  <h2>Trending Products</h2>
  <p style="color:#cbd5e1;margin-top:8px;">Top selling items for you</p>

  <div class="grid">
    <?php while($row = $result->fetch_assoc()) { ?>
      <div class="card">
        <img src="<?= $row["image"] ?>" alt="product">
        <div class="info">
          <h3><?= $row["name"] ?></h3>
          <p class="price">₹<?= $row["price"] ?></p>

          <br>
          <form method="post" action="pages/cart.php">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <button class="btn btn-primary">Add to Cart</button>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include "includes/footer.php"; ?>

</body>
</html>
