<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../koneksi/koneksi.php';
$title_web = 'Edit Tujuan';
include '../header.php';

session_start();

if (empty($_SESSION['USER'])) {
    echo '<script>alert("Silakan login terlebih dahulu."); window.location="index.php";</script>';
    exit;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_tujuan = $_POST['nama_tujuan'];
    $harga = $_POST['harga'];
    $estimasi_waktu_santai = $_POST['estimasi_waktu_santai'];
    $estimasi_waktu_satset = $_POST['estimasi_waktu_satset'];

    $sql = "UPDATE tarif SET nama_tujuan = :nama_tujuan, harga = :harga, estimasi_waktu_santai = :estimasi_waktu_santai, estimasi_waktu_satset = :estimasi_waktu_satset WHERE id = :id";
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':nama_tujuan', $nama_tujuan);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':estimasi_waktu_santai', $estimasi_waktu_santai);
    $stmt->bindParam(':estimasi_waktu_satset', $estimasi_waktu_satset);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo '<script>alert("Data berhasil diupdate."); window.location="tujuan.php";</script>';
    } else {
        echo '<script>alert("Gagal mengupdate data."); window.location="edit.php?id='.$id.'";</script>';
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tarif WHERE id = :id";
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        echo '<script>alert("Data tidak ditemukan."); window.location="travel.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan."); window.location="index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tujuan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Edit Tujuan</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="form-group">
            <label>Nama Tujuan</label>
            <input type="text" name="nama_tujuan" class="form-control" value="<?= $data['nama_tujuan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?= $data['harga']; ?>" required>
        </div>
        <div class="form-group">
            <label>Estimasi Waktu Santai</label>
            <input type="text" name="estimasi_waktu_santai" class="form-control" value="<?= $data['estimasi_waktu_santai']; ?>" required>
        </div>
        <div class="form-group">
            <label>Estimasi Waktu Satset</label>
            <input type="text" name="estimasi_waktu_satset" class="form-control" value="<?= $data['estimasi_waktu_satset']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>

<?php
$koneksi = null; // Menutup koneksi PDO
?>
