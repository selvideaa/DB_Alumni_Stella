<?php
$host = "localhost"; // Nama host server database
$user = "root";      // Username default XAMPP
$pass = "";          // Password default XAMPP (kosong)
$db   = "DB_Alumni_Stella";  // Nama database yang telah kita buat

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>