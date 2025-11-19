<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "DB_Alumni_Stella";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>