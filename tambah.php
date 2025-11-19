<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Tambah Data Alumni</h1>
        <a href="index.php" class="btn-tambah" style="background-color: #6c757d;">KEMBALI</a>
    </div>

    <form method="POST" action="proses.php">
        <input type="hidden" name="aksi" value="tambah"> 

        <label for="Nama_Lengkap">Nama Alumni:</label>
        <input type="text" id="Nama_Lengkap" name="Nama_Lengkap" required>

        <label for="Tahun_Lulus">Tahun Lulus:</label>
        <input type="number" id="Tahun_Lulus" name="Tahun_Lulus" required min="1900" max="<?php echo date('Y'); ?>">
        
        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="ANIMASI">ANIMASI</option>
        </select>
        
        <label for="Pekerjaan_Saat_Ini">Pekerjaan:</label>
        <input type="text" id="pekerjaan_saat_ini" name="Pekerjaan_Saat_Ini">

        <label for="Nomor_Telepon">Nomor Telepon:</label>
        <input type="text" id="Nomor_Telepon" name="Nomor_Telepon">
        
        <label for="Email">Email:</label>
        <input type="Email" id="Email" name="Email">

        <label for="alamat">Alamat:</label>
        <textarea id="Alamat" name="Alamat"></textarea>

        <button type="submit" class="btn-tambah" style="margin-top: 20px;">SIMPAN DATA</button>
    </form>
</div>

</body>
</html>

<style>
    form {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    input[type="text"], input[type="number"], input[type="email"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box; /* Penting agar padding tidak melebarkan input */
    }
    textarea {
        resize: vertical;
    }
</style>