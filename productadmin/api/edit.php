<?php
// Menghubungkan ke database
include 'conn.php'; // Pastikan Anda sudah memiliki koneksi ke database

// Cek jika form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $current_img = $product['img'];
    // Memeriksa jika gambar baru diunggah
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        // Mendapatkan ekstensi file
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        // Membuat nama file baru
        $new_img_name = "product_" . substr(md5(rand()), 0, 8) . "." . $img_ext;
        $img_path = '../../products/' . $new_img_name;
        // Memindahkan gambar yang diunggah ke folder produk
        if (move_uploaded_file($img_tmp, $img_path)) {
            // Mengambil nama gambar lama dari database untuk dihapus
            $stmt = $conn->prepare("SELECT img FROM products WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
            // Menghapus gambar lama jika ada
            $old_img_path = '../../products/' . $product['img'];
            if (file_exists($old_img_path)) {
                unlink($old_img_path);
            }
            $img_name = $new_img_name; // Simpan nama file baru di database
        } else {
            echo "Failed to upload the new image.";
            exit();
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $img_name = $_POST['current_img'];
    }

    // Query untuk update data produk
    $query = "UPDATE products SET product_name = ?, product_desc = ?, category = ?, price = ?, img = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssisi", $product_name, $product_desc, $category, $price, $img_name, $product_id);

    if ($stmt->execute()) {
        // Redirect ke halaman lain (misalnya 'products.php') setelah update berhasil
        header("Location: ../");
        exit(); // Menghentikan eksekusi lebih lanjut
    } else {
        // Jika gagal, tetap di halaman edit dan tampilkan pesan error
        echo "Failed to update product.";
    }
}
?>
