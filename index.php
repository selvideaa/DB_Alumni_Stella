<?php
// Sertakan file koneksi database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA ALUMNI SMK TELKOM LAMPUNG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>APLIKASI DATA ALUMNI</h1>
        <h2>DATA ALUMNI SMK TELKOM LAMPUNG</h2>
        <a href="tambah.php" class="btn-tambah">TAMBAH DATA</a>
    </div>

    <div class="search-section">
        <form method="GET" action="index.php">
            <input type="text" name="cari" placeholder="Pencarian Data..." value="">
            <button type="submit" class="btn-cari">Cari Data</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tahun Lulus</th>
                <th>Jurusan</th>
                <th>Pekerjaan</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php
$no = 1;
$query = "SELECT * FROM alumni";

// Logika pencarian
if(isset($_GET['cari']) && $_GET['cari'] != '') {
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $query .= " WHERE Nama_Lengkap LIKE '%$cari%' OR Jurusan LIKE '%$cari%' OR Pekerjaan_Saat_Ini LIKE '%$cari%'";
}

$data = mysqli_query($koneksi, $query);

while($d = mysqli_fetch_array($data)){
    $id = $d['Id_Alumni'];
    $nama = $d['Nama_Lengkap'];
    $tahun = $d['Tahun_Lulus'];
    $jurusan = $d['Jurusan'];
    $pekerjaan = $d['Pekerjaan_Saat_Ini'];
    $telepon = $d['Nomor_Telepon'];
    $email = $d['Email'];
    $alamat = $d['Alamat'];
?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $tahun; ?></td>
                <td><?php echo $jurusan; ?></td>
                <td><?php echo $pekerjaan; ?></td>
                <td><?php echo $telepon; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $alamat; ?></td>
                <td class="aksi">
                 <a href="edit.php?id=<?php echo $id; ?>" class="aksi-edit" title="Edit">
                        <i class="fas fa-edit"></i>
</a>
                   <a href="hapus.php?id=<?php echo $id; ?>" class="aksi-hapus" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
    <i class="fas fa-trash"></i>
</a>
                </td>
            </tr>
<?php 
}
?>
        </tbody>
    </table>
</div>

</body>
</html>