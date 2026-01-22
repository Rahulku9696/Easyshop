<?php
include "../includes/config.php";

if(isset($_POST["login"])) {
  $email = $_POST["email"];
  $pass = $_POST["password"];

  $result = $conn->query("SELECT * FROM users WHERE email='$email'");
  $user = $result->fetch_assoc();

  if($user && password_verify($pass, $user["password"])) {
    $_SESSION["user"] = $user["name"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["role"] = $user["role"];
    header("Location: ../index.php");
  } else {
    echo "<script>alert('Invalid Email or Password');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="formBox">
  <h2>Login</h2>
  <form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login" class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>
