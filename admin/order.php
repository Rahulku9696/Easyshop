<?php
include "../includes/config.php";

if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
  die("Access Denied ❌ Admin only");
}

$orders = $conn->query("
  SELECT orders.id, users.name, users.email, orders.total, orders.order_date
  FROM orders
  JOIN users ON orders.user_id = users.id
  ORDER BY orders.id DESC
");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Orders - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
  <div class="logo">Easy<span>Shop</span> Orders</div>
  <div>
    <a href="../index.php">Home</a>
    <a href="admin.php">Admin</a>
    <a href="../pages/logout.php">Logout</a>
  </div>
</nav>

<div class="container">
  <h2>All Orders</h2>

  <table>
    <tr>
      <th>Order ID</th>
      <th>User</th>
      <th>Email</th>
      <th>Total</th>
      <th>Date</th>
    </tr>

    <?php while($o = $orders->fetch_assoc()) { ?>
      <tr>
        <td>#<?= $o["id"] ?></td>
        <td><?= $o["name"] ?></td>
        <td><?= $o["email"] ?></td>
        <td>₹<?= $o["total"] ?></td>
        <td><?= $o["order_date"] ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
