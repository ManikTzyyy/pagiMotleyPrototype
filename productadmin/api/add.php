<?php
// Include database connection
include 'conn.php'; // Gantilah dengan file koneksi ke database Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $date = date("Y-m-d");
    $time = date("H:i:s");

    // Proses upload gambar
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];
    $img_error = $_FILES['img']['error'];

    if ($img_error === 0) {
        // Rename gambar dengan ID produk nanti
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $new_img_name = "product_" . substr(md5(rand()), 0, 8) . "." . $img_ext;


        // Tentukan folder penyimpanan gambar
        $img_upload_path = '../../products/' . $new_img_name;

        // Pindahkan gambar ke folder tujuan
        if (move_uploaded_file($img_tmp, $img_upload_path)) {
            // Insert data ke database
            $sql = "INSERT INTO products (product_name, product_desc, category, price, img, date, time) 
                    VALUES ('$product_name', '$product_desc', '$category', '$price', '$new_img_name', '$date', '$time')";

            if (mysqli_query($conn, $sql)) {
                // Jika berhasil, arahkan ke halaman productadmin.php
                header('Location: ../');
                exit(); // Jangan lupa untuk memanggil exit() setelah header untuk menghentikan eksekusi lebih lanjut
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Error with image upload.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
