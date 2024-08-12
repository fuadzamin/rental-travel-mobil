<?php
session_start();
require 'koneksi/koneksi.php';
include 'header.php';

// Pastikan user sudah login
if (empty($_SESSION['USER'])) {
    echo '<script>alert("Harap login !"); window.location="index.php";</script>';
}

// Ambil kode booking dan tipe pemesanan dari parameter URL
$kode_booking = $_GET['kode_booking'];
$type = $_GET['type'];

// Query untuk mendapatkan detail pemesanan berdasarkan kode booking dan tipe pemesanan
if ($type == 'travel') {
    $query = "SELECT * FROM booking_travel WHERE kode_booking = ?";
} else {
    $query = "SELECT * FROM booking_travel WHERE id_booking = ?";
}
$stmt = $koneksi->prepare($query);
$stmt->execute([$kode_booking]);
$booking = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$booking) {
    die('Pemesanan tidak ditemukan.');
}
?>

<div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 mx-auto">

        <div class="card">
            <div class="card-body text-center">
                <h5>Pembayaran Dapat Melalui :</h5>
                <hr/>
                <p> <?= $info_web->no_rek;?> </p>
            </div>
        </div>
        <br/>
        </div>
        <div class="card">
        <div class="card-body">
            <h2>Detail Pemesanan</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Kode Booking</th>
                        <td><?php echo $booking['kode_booking']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td><?php echo $booking['nama']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tujuan</th>
                        <td><?php echo $type == 'travel' ? $booking['tujuan'] : $booking['tujuan']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Mode Perjalanan</th>
                        <td><?php echo $type == 'travel' ? $booking['mode_perjalanan'] : ''; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Estimasi Waktu</th>
                        <td><?php echo $type == 'travel' ? $booking['estimasi_waktu'] : ''; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td><?php echo $booking['tanggal']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Penumpang</th>
                        <td><?php echo $type == 'travel' ? $booking['jumlah_penumpang'] : ''; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Total Harga</th>
                        <td><?php echo 'Rp. ' . number_format($booking['total_harga']); ?></td>
                    </tr>
                    <tr>
                            <td>Status </td>
                            <td> :</td>
                            <td><?php echo $booking['konfirmasi_pembayaran'];?></td>
                        </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td><?php echo $booking['konfirmasi_pembayaran']; ?></td>
                    </tr>
                </tbody>
            </table>
            
            <?php if($booking['konfirmasi_pembayaran'] == 'Belum Bayar'){ ?>
                <a href="konfirmasi_travel.php?id=<?php echo $kode_booking;?>" class="btn btn-primary float-right">Konfirmasi Pembayaran</a>
            <?php } ?>
        </div>
        </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
