<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../koneksi/koneksi.php';
$title_web = 'Hapus Tujuan';
include '../header.php';

session_start();

if (empty($_SESSION['USER'])) {
    echo '<script>alert("Silakan login terlebih dahulu."); window.location="index.php";</script>';
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!$id) {
    echo '<script>alert("ID tidak ditemukan."); window.location="index.php";</script>';
    exit;
}

try {
    $sql = "DELETE FROM tarif WHERE id = :id";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([':id' => $id]);
    echo '<script>alert("Data berhasil dihapus."); window.location="index.php";</script>';
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$koneksi = null; // Menutup koneksi PDO
?>
