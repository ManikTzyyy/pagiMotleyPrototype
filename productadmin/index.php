<?php

require './api/read.php';
require './api/delete.php';

$products = getProducts($conn);


if (isset($_GET['delete_id'])) {
  $product_id = $_GET['delete_id'];

  // Menghapus produk dengan ID yang diberikan
  if (deleteProduct($conn, $product_id)) {
    // Redirect kembali ke halaman produk setelah berhasil menghapus
    header('Location: ./');
    exit();
  } else {
    // Menampilkan pesan error jika penghapusan gagal
    echo "Failed to delete product.";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <link rel="icon" type="image/png" href="../assets/logo/pagimotley.webp" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="../style/style.css" />
  <link rel="stylesheet" href="./admin.css" />
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
        <a href="../productCatalogue/">product</a>
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
    <h1>Admin</h1>
  </section>

  <div class="button-fix">
    <a href="./addData.php" class="btn btn-success rounded-circle">
      <i class="fa-solid fa-plus"></i>
    </a>
  </div>

  <section id="table-product">
    <div class="button-wrapper-add">
      <a href="./addData.php" class="btn btn-success">Add Product</a>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($products)): ?>
            <?php foreach ($products as $index => $product): ?>
              <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= htmlspecialchars($product['product_name']) ?></td>
                <td><?= htmlspecialchars($product['product_desc']) ?></td>
                <td><?= htmlspecialchars($product['category']) ?></td>
                <td>IDR <?= number_format($product['price'], 0, ',', '.') ?></td>
                <td>
                  <div class="img-wrapper">
                    <img src="../products/<?= htmlspecialchars($product['img']) ?>"
                      alt="<?= htmlspecialchars($product['product_name']) ?>" />
                  </div>
                </td>
                <td>
                  <div class="button-wrapper">
                    <a href="editProduct.php?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="?delete_id=<?= $product['id'] ?>" class="btn btn-danger"
                      onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7">No products found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- <div id="loading-screen">
      <div class="logo-container">
        <img src="../assets/logo/pagimotley.webp" alt="Logo" class="logo" />
      </div>
    </div> -->

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
  <!-- <script src="../scripts/loading.js"></script> -->
  <script src="../scripts/navbar.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>