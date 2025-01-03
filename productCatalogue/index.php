<?php
require '../productadmin/api/read.php';
$products = getProducts($conn);


$waMsgTemplate = "Halo, saya tertarik dengan produk {product_name}. Harga: {price}.";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pagi Motley</title>
  <link rel="icon" type="image/png" href="../assets/logo/pagimotley.webp" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- mycss -->
  <link rel="stylesheet" href="../style/style.css" />
  <link rel="stylesheet" href="./product.css" />
</head>

<body>
  <!-- Navbar -->
  <div id="navbar">
    <div class="navbar">
      <div class="logo">
        <p>Pagi Motley</p>
      </div>
      <div class="nav-list" id="navList">
        <a href="../home/">home</a>
        <a href="../productCatalogue/" class="active">product</a>
        <a href="../about/">about</a>
        <a href="../workshop/">workshop</a>
        <a href="../contact/">contact</a>
      </div>
      <div class="bar">
        <a href="javascript:void(0);" id="menuToggle">
          <p>
            Menu
            <span><i class="fa-solid fa-angle-down" id="menuIcon"></i></span>
          </p>
        </a>
      </div>
    </div>
  </div>
  <!-- End Navbar -->

  <section id="header-hero">
    <h1>Pagi Motley</h1>
  </section>

  <!-- Product Show -->
  <section id="product-show">
    <div class="container column">
      <h3>A Selection of Exquisite Clothing, Crafted with Natural Dyes</h3>
      <div class="container-category-button row">
        <div class="button-cat active">
          <a href="?category=all#product-show">All</a>
        </div>
        <div class="button-cat"><a href="">New</a></div>
        <div class="button-cat"><a href="">Head</a></div>
        <div class="button-cat"><a href="">top</a></div>
        <div class="button-cat"><a href="">botom</a></div>
        <div class="button-cat"><a href="">other</a></div>
      </div>
      <div class="content row">
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $product): ?>
            <?php
            // Membuat pesan WhatsApp dinamis
            $waMsg = str_replace(
              ["{product_name}", "{price}"],
              [$product['product_name'], number_format($product['price'], 0, ',', '.')],
              $waMsgTemplate
            );
            // Encode pesan untuk URL
            $waLink = "https://wa.me/+6281337586061?text=" . urlencode($waMsg);
            ?>
            <div class="card-product">
              <div class="button-buy-mobile">
                <a href="<?= htmlspecialchars($waLink) ?>"><i class="fa-solid fa-cart-shopping"></i></a>
              </div>
              <img src="../products/<?= htmlspecialchars($product['img']) ?>"
                alt="<?= htmlspecialchars($product['product_name']) ?>" />
              <div class="container-info row">
                <div class="text">
                  <p><?= htmlspecialchars($product['product_name']) ?></p>
                  <h5><?= htmlspecialchars($product['product_desc']) ?></h5>
                </div>
                <div class="price">
                  <h4>IDR <?= number_format($product['price'], 0, ',', '.') ?></h4>
                  <div class="button-buy">
                    <a href="<?= htmlspecialchars($waLink) ?>">
                      <p>Check Out <span><i class="fa-solid fa-cart-shopping"></i></span></p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <h4>No products found</h4>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- end Product Show -->

  <!-- footer  -->
  <section id="footer">
    <div class="container">
      <div class="content row">
        <div class="link-wrapper row">
          <div class="link about column">
            <h4>About</h4>
            <a href="../about/">About us</a>
            <a href="../productCatalogue/">Product</a>
          </div>
          <div class="link support column">
            <h4>Support</h4>
            <a href="../contact/">Contact us</a>
            <a href="https://wa.me/+6281337586061">Whatsapp</a>
            <a href="https://www.instagram.com/pagimotley?igsh=aHE5dzNjYnBnazl5">Instagram</a>
          </div>
        </div>
        <div class="social column">
          <h4>Natural Dye</h4>
          <p>
            Every piece tells a story of craftsmanship, nature, and elegance,
            bringing eco-friendly fashion to your wardrobe.
          </p>
          <div class="content-social row">
            <a href="https://wa.me/+6281337586061"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/pagimotley?mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/pagimotley?igsh=aHE5dzNjYnBnazl5"><i
                class="fa-brands fa-instagram"></i></a>
            <a href="https://youtube.com/@pagimotley6710?si=uJ5Niji5vjanTeU4"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <p class="copy">Copyright 2024 All Right Reserved.</p>
    </div>
  </section>
  <!-- end footer -->
  <!-- scripts -->
  <script src="../scripts/navbar.js"></script>
</body>

</html>