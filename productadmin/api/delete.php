<?php
// Fungsi untuk menghapus produk berdasarkan ID

function deleteProduct($conn, $product_id)
{
    // Mengambil nama gambar dari database
    $stmt = $conn->prepare("SELECT img FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Menyimpan nama gambar
        $image_path = '../../products/' . $product['img'];

        // Menghapus gambar jika ada
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Menghapus produk dari database
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);

        return $stmt->execute(); // True jika berhasil
    }

    return false; // Gagal jika produk tidak ditemukan
}


?>