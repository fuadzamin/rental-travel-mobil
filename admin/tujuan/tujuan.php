<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../koneksi/koneksi.php';
$title_web = 'Daftar Tarif Travel';
include '../header.php';

session_start();

if (empty($_SESSION['USER'])) {
    echo '<script>alert("Silakan login terlebih dahulu."); window.location="index.php";</script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Manage Tujuan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Manage Tujuan</h1>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Tujuan</th>
                <th>Harga</th>
                <th>Estimasi Waktu Santai</th>
                <th>Estimasi Waktu Satset</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, nama_tujuan, harga, estimasi_waktu_santai, estimasi_waktu_satset FROM tarif";

            try {
                $stmt = $koneksi->query($sql);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) > 0) {
                    foreach ($result as $row) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama_tujuan']}</td>
                                <td>{$row['harga']}</td>
                                <td>{$row['estimasi_waktu_santai']}</td>
                                <td>{$row['estimasi_waktu_satset']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
    <a href="add.php" class="btn btn-success">Add New Tujuan</a>
</div>
</body>
</html>

<?php
$koneksi = null; // Menutup koneksi PDO
?>
