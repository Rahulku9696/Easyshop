<?php
include "../includes/config.php";

if(isset($_POST["register"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);

  $check = $conn->query("SELECT * FROM users WHERE email='$email'");
  if($check->num_rows > 0){
    echo "<script>alert('Email already exists!');</script>";
  } else {
    $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
    header("Location: login.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register - EasyShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="formBox">
  <h2>Create Account</h2>
  <form method="post">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="register" class="btn btn-primary">Register</button>
  </form>
</div>

</body>
</html>
