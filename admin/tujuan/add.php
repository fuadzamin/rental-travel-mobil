<?php
require '../../koneksi/koneksi.php';
$title_web = 'Konfirmasi';
include '../header.php';

session_start();

if (empty($_SESSION['USER'])) {
    echo '<script>alert("Silakan login terlebih dahulu."); window.location="index.php";</script>';
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_tujuan = $_POST['nama_tujuan'];
    $harga = $_POST['harga'];
    $estimasi_waktu_santai = $_POST['estimasi_waktu_santai'];
    $estimasi_waktu_satset = $_POST['estimasi_waktu_satset'];

    $sql = "INSERT INTO tarif (nama_tujuan, harga, estimasi_waktu_santai, estimasi_waktu_satset) VALUES ('$nama_tujuan', '$harga', '$estimasi_waktu_santai', '$estimasi_waktu_satset')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Tujuan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Add New Tujuan</h1>
    <form method="post" action="add.php">
        <div class="form-group">
            <label for="nama_tujuan">Nama Tujuan</label>
            <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="estimasi_waktu_santai">Estimasi Waktu Santai</label>
            <input type="text" class="form-control" id="estimasi_waktu_santai" name="estimasi_waktu_santai">
        </div>
        <div class="form-group">
            <label for="estimasi_waktu_satset">Estimasi Waktu Satset</label>
            <input type="text" class="form-control" id="estimasi_waktu_satset" name="estimasi_waktu_satset">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
