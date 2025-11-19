<?php
include 'koneksi.php';

// Cek apakah ada parameter ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk menghapus data
    $query = "DELETE FROM alumni WHERE Id_alumni = '$id'";
    
    // Eksekusi query
    if(mysqli_query($koneksi, $query)) {
        // Jika berhasil
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location='index.php';
              </script>";
    } else {
        // Jika gagal
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location='index.php';
              </script>";
    }
} else {
    // Jika tidak ada ID
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location='index.php';
          </script>";
}
?>