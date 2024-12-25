<?php

require 'conn.php';
function getProducts($conn)
{
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $products = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    // Jangan menutup koneksi di sini.
    return $products;
}
?>