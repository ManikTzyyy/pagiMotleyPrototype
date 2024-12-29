<?php
// Konfigurasi database
$host = ''; // Server database
$username = ''; // Username database
$password = ''; // Password database
$database = ''; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";
?>
