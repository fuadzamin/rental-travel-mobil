<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../koneksi/koneksi.php';
$title_web = 'Edit Status Pembayaran';
include '../header.php';

session_start();

if (empty($_SESSION['USER'])) {
    header("Location: ../login.php");
    exit();
}

$kode_booking = null;

if (!empty($_GET['id'])) {
    $kode_booking = strip_tags($_GET['id']);
    $sql = "SELECT * FROM booking_travel WHERE kode_booking = '$kode_booking'";
    $hasil = $koneksi->query($sql)->fetch();
    if (!$hasil) {
        echo "Booking not found.";
        exit();
    }
} else {
    echo "No booking selected.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $konfirmasi_pembayaran = strip_tags($_POST['konfirmasi_pembayaran']);
    $sql_update = "UPDATE booking_travel SET konfirmasi_pembayaran = :konfirmasi_pembayaran WHERE kode_booking = :kode_booking";
    $stmt = $koneksi->prepare($sql_update);
    $stmt->bindParam(':konfirmasi_pembayaran', $konfirmasi_pembayaran);
    $stmt->bindParam(':kode_booking', $kode_booking);

    if ($stmt->execute()) {
        echo "Payment status updated successfully.";
        header("Location: travel.php");
        exit();
    } else {
        echo "Failed to update payment status.";
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5 class="card-title">
                Edit Status Pembayaran
            </h5>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Kode Booking</label>
                    <input type="text" class="form-control" name="kode_booking" value="<?= $hasil['kode_booking'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Penumpang</label>
                    <input type="text" class="form-control" name="nama" value="<?= $hasil['nama'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" name="tujuan" value="<?= $hasil['tujuan'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>Status Pembayaran</label>
                    <select class="form-control" name="konfirmasi_pembayaran">
                        <option value="Belum Bayar" <?= ($hasil['konfirmasi_pembayaran'] == 'Belum Bayar') ? 'selected' : '';?>>Belum Bayar</option>
                        <option value="Sudah Bayar" <?= ($hasil['konfirmasi_pembayaran'] == 'Sudah Bayar') ? 'selected' : '';?>>Sudah Bayar</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php';?>
