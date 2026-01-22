<?php
include "../includes/config.php";

if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
  die("Access Denied ❌ Admin only");
}

/* add product */
if(isset($_POST["add"])) {
  $name = $_POST["name"];
  $price = $_POST["price"];
  $image = $_POST["image"];

  $conn->query("INSERT INTO products(name,price,image) VALUES('$name','$price','$image')");
  header("Location: admin.php");
  exit();
}

/* delete */
if(isset($_GET["delete"])) {
  $id = $_GET["delete"];
  $conn->query("DELETE FROM products WHERE id='$id'");
  header("Location: admin.php");
  exit();
}

$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
  <div class="logo">Easy<span>Shop</span> Admin</div>
  <div>
    <a href="../index.php">Home</a>
    <a href="orders.php">Orders</a>
    <a href="../pages/logout.php">Logout</a>
  </div>
</nav>

<div class="container">
  <h2>Add Product</h2>

  <form method="post" style="max-width:500px;margin-top:15px;">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" name="price" placeholder="Price" required>
    <input type="text" name="image" placeholder="Image URL" required>
    <button class="btn btn-primary" name="add">Add Product</button>
  </form>

  <h2 style="margin-top:30px;">All Products</h2>

  <div class="grid">
    <?php while($row = $products->fetch_assoc()) { ?>
      <div class="card">
        <img src="<?= $row["image"] ?>" alt="">
        <div class="info">
          <h3><?= $row["name"] ?></h3>
          <p class="price">₹<?= $row["price"] ?></p>
          <br>
          <a href="admin.php?delete=<?= $row["id"] ?>">
            <button class="btn btn-danger">Delete</button>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
