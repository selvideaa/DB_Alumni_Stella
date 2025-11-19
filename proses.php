<?php
include 'koneksi.php'; // Hubungkan ke database

// Cek apakah ada data yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aksi'])) {
    
    $aksi = $_POST['aksi'];

    if ($aksi == 'tambah') {
        // --- PROSES TAMBAH DATA (AMAN) ---
        
        // Ambil data dari form
        $Nama_Lengkap                    = mysqli_real_escape_string($koneksi, $_POST['Nama_Lengkap']);
        $Tahun_Lulus             = mysqli_real_escape_string($koneksi, $_POST['Tahun_Lulus']);
        $Jurusan                  = mysqli_real_escape_string($koneksi, $_POST['Jurusan']);
        $Pekerjaan_Saat_Ini       = mysqli_real_escape_string($koneksi, $_POST['Pekerjaan_Saat_Ini']);
        $Nomor_Telepon             = mysqli_real_escape_string($koneksi, $_POST['Nomor_Telepon']);
        $Email                   = mysqli_real_escape_string($koneksi, $_POST['Email']);
        $Alamat                  = mysqli_real_escape_string($koneksi, $_POST['Alamat']);

        // Query INSERT
        $sql = "INSERT INTO alumni (Nama_Lengkap, Tahun_Lulus, Jurusan, Pekerjaan_Saat_Ini, Nomor_Telepon, Email, Alamat) 
                VALUES ('$Nama_Lengkap', '$Tahun_Lulus', '$Jurusan', '$Pekerjaan_Saat_Ini', '$Nomor_Telepon', '$Email', '$Alamat')";

        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("location:index.php?pesan=tambah_sukses");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }

    } elseif ($aksi == 'edit') {
        // --- PROSES EDIT DATA (AMAN) ---
        
        // Ambil ID yang akan diedit
        $id_alumni       = mysqli_real_escape_string($koneksi, $_POST['Id_alumni']);
        
        // Ambil data yang diperbarui
        $Nama_Lengkap                     = mysqli_real_escape_string($koneksi, $_POST['Nama_Lengkap']);
        $Tahun_Lulus              = mysqli_real_escape_string($koneksi, $_POST['Tahun_Lulus']);
        $Jurusan                 = mysqli_real_escape_string($koneksi, $_POST['Jurusan']);
        $Pekerjaan_Saat_Ini      = mysqli_real_escape_string($koneksi, $_POST['Pekerjaan_Saat_Ini']);
        $Nomor_Telepon           = mysqli_real_escape_string($koneksi, $_POST['Nomor_Telepon']);
        $Email                    = mysqli_real_escape_string($koneksi, $_POST['Email']);
        $Alamat                  = mysqli_real_escape_string($koneksi, $_POST['Alamat']);

        // Query UPDATE
        $sql = "UPDATE alumni SET 
                Nama_Lengkap='$Nama_Lengkap', 
                Tahun_Lulus='$Tahun_lulus', 
                Jurusan='$Jurusan', 
                Pekerjaan_Saat_Ini='$Pekerjaan_Saat_Ini', 
                Nomor_Telepon='$Nomor_Telepon', 
                Email='$Email', 
                Alamat='$Alamat' 
                WHERE Id_alumni='$Id_alumni'";

        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("location:index.php?pesan=edit_sukses");
        } else {
            echo "Error updating record: " . mysqli_error($koneksi);
        }

    } else {
        // Jika aksi tidak valid
        header("location:index.php");
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    // --- PROSES HAPUS DATA (SUDAH DIPERBAIKI) ---

    // Ambil ID yang akan dihapus
    if (isset($_GET['Id'])) {
        // Variabel yang menyimpan ID dari URL (id alumni yang akan dihapus)
        $Id_alumni_hapus = mysqli_real_escape_string($koneksi, $_GET['id']); 
        
        // Query DELETE
        // Menggunakan variabel yang benar: $id_alumni_hapus
        $sql = "DELETE FROM alumni WHERE Id_alumni='$id_alumni_hapus'"; 

        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("location:index.php?pesan=hapus_sukses");
        } else {
            echo "Error deleting record: " . mysqli_error($koneksi);
        }
    } else {
        header("location:index.php");
    }
}
// Tutup koneksi
mysqli_close($koneksi);
?>