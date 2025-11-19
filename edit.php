<?php
include 'koneksi.php';

// Cek apakah ada parameter ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data berdasarkan ID
    $query = "SELECT * FROM alumni WHERE Id_alumni = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
    
    if(!$data) {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// Proses UPDATE ketika form disubmit
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $jurusan = $_POST['jurusan'];
    $pekerjaan = $_POST['pekerjaan'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    
    $query = "UPDATE alumni SET 
              Nama_Lengkap = '$nama',
              Tahun_Lulus = '$tahun',
              Jurusan = '$jurusan',
              Pekerjaan_Saat_Ini = '$pekerjaan',
              Nomor_Telepon = '$telepon',
              Email = '$email',
              Alamat = '$alamat'
              WHERE Id_alumni = '$id'";
    
    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal update data: " . mysqli_error($koneksi) . "'); window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Alumni</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 100px;
            resize: vertical;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        .btn-update {
            flex: 1;
            padding: 12px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-update:hover {
            background: #218838;
        }
        .btn-kembali {
            flex: 1;
            padding: 12px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: block;
        }
        .btn-kembali:hover {
            background: #5a6268;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>EDIT DATA ALUMNI</h2>
    
    <form method="POST" action="">
        <input type="hidden" name="Id" value="<?php echo $data['Id_Alumni']; ?>">
        
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="Nama_Lengkap" value="<?php echo $data['Nama_Lengkap']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Tahun Lulus:</label>
            <input type="text" name="Tahun_Lulus" value="<?php echo $data['Tahun_Lulus']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="Jurusan" value="<?php echo $data['Jurusan']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Pekerjaan Saat Ini:</label>
            <input type="text" name="Pekerjaan_Saat_Ini" value="<?php echo $data['Pekerjaan_Saat_Ini']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Nomor Telepon:</label>
            <input type="text" name="Nomor_Telepon" value="<?php echo $data['Nomor_Telepon']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="Email" value="<?php echo $data['Email']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="Alamat" required><?php echo $data['Alamat']; ?></textarea>
        </div>
        
        <div class="btn-group">
            <button type="submit" name="update" class="btn-update">UPDATE DATA</button>
            <a href="index.php" class="btn-kembali">KEMBALI</a>
        </div>
    </form>
</div>

</body>
</html>