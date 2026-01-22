<!-- ✅ Load Main CSS (Correct Absolute Path) -->
<link rel="stylesheet" href="/EasyShop/css/style.css">

<!-- ✅ NAVBAR -->
<nav>
  <div class="logo">Easy<span>Shop</span></div>

  <div>
    <a href="/EasyShop/index.php">Home</a>
    <a href="/EasyShop/pages/cart.php">Cart 🛒</a>

    <?php if(isset($_SESSION["user"])) { ?>
      <a href="/EasyShop/pages/logout.php">Logout</a>

      <?php if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
        <a href="/EasyShop/admin/admin.php">Admin</a>
        <a href="/EasyShop/admin/orders.php">Orders</a>
      <?php } ?>

    <?php } else { ?>
      <a href="/EasyShop/pages/login.php">Login</a>
      <a href="/EasyShop/pages/register.php">Register</a>
    <?php } ?>
  </div>
</nav>

<!-- ✅ CATEGORY BAR WITH IMAGES + PRICE TAGS (WORKING LINKS) -->
<div class="categoryBar">

  <div class="catCard">
    <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="minutes">
    <p>Minutes</p>
    <span class="tag">New</span>
  </div>

  <!-- ✅ Mobiles -->
  <div class="catCard dropdown">
    <img src="https://cdn-icons-png.flaticon.com/512/3144/3144456.png" alt="mobiles">
    <p>Mobiles & Tablets</p>
    <span class="priceTag">From ₹6,999</span>

    <div class="menu">
      <a href="/EasyShop/pages/category.php?cat=mobiles">Smartphones</a>
      <a href="/EasyShop/pages/category.php?cat=mobiles">Tablets</a>
      <a href="/EasyShop/pages/category.php?cat=mobiles">5G Phones</a>
      <a href="/EasyShop/pages/category.php?cat=mobiles">Accessories</a>
    </div>
  </div>

  <!-- ✅ Fashion -->
  <div class="catCard dropdown">
    <img src="https://cdn-icons-png.flaticon.com/512/892/892458.png" alt="fashion">
    <p>Fashion</p>
    <span class="priceTag">Min 40% OFF</span>

    <div class="menu twoCol">
      <div class="menuCol">
        <h4>Men</h4>
        <a href="/EasyShop/pages/category.php?cat=fashion">Top Wear</a>
        <a href="/EasyShop/pages/category.php?cat=fashion">Bottom Wear</a>
        <a href="/EasyShop/pages/category.php?cat=fashion">Footwear</a>
        <a href="/EasyShop/pages/category.php?cat=fashion">Watches</a>
      </div>

      <div class="menuCol">
        <h4>Women</h4>
        <a href="/EasyShop/pages/category.php?cat=fashion">Ethnic Wear</a>
        <a href="/EasyShop/pages/category.php?cat=fashion">Western Wear</a>
        <a href="/EasyShop/pages/category.php?cat=fashion">Footwear</a>
        <a href="/EasyShop/pages/category.php?cat=fashion">Bags</a>
      </div>
    </div>
  </div>

  <!-- ✅ Electronics -->
  <div class="catCard dropdown">
    <img src="https://cdn-icons-png.flaticon.com/512/1042/1042339.png" alt="electronics">
    <p>Electronics</p>
    <span class="priceTag">From ₹999</span>

    <div class="menu">
      <a href="/EasyShop/pages/category.php?cat=electronics">Laptops</a>
      <a href="/EasyShop/pages/category.php?cat=electronics">Headphones</a>
      <a href="/EasyShop/pages/category.php?cat=electronics">Smart Watches</a>
      <a href="/EasyShop/pages/category.php?cat=electronics">Gaming</a>
    </div>
  </div>

  <!-- ✅ Home -->
  <div class="catCard dropdown">
    <img src="https://cdn-icons-png.flaticon.com/512/2933/2933820.png" alt="home">
    <p>Home & Furniture</p>
    <span class="priceTag">From ₹499</span>

    <div class="menu">
      <a href="/EasyShop/pages/category.php?cat=home">Beds</a>
      <a href="/EasyShop/pages/category.php?cat=home">Sofas</a>
      <a href="/EasyShop/pages/category.php?cat=home">Dining</a>
      <a href="/EasyShop/pages/category.php?cat=home">Decor</a>
    </div>
  </div>

  <!-- ✅ Beauty & Food -->
  <div class="catCard dropdown">
    <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="beauty">
    <p>Beauty & Food</p>
    <span class="priceTag">Min 20% OFF</span>

    <div class="menu">
      <a href="/EasyShop/pages/category.php?cat=beauty">Skincare</a>
      <a href="/EasyShop/pages/category.php?cat=beauty">Makeup</a>
      <a href="/EasyShop/pages/category.php?cat=food">Snacks</a>
      <a href="/EasyShop/pages/category.php?cat=food">Groceries</a>
    </div>
  </div>

</div>
