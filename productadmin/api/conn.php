<?php
// Konfigurasi database
$host = 'localhost'; // Server database
$username = 'root'; // Username database
$password = ''; // Password database
$database = 'pagimotley'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";
?>