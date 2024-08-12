<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../koneksi/koneksi.php';
$title_web = 'Daftar Travel';
include '../header.php';

session_start();

if (empty($_SESSION['USER'])) {
    header("Location: ../login.php"); // redirect to login page if session is not set
    exit();
}

$kode_booking = null; // Define the variable outside the if block

if(!empty($_GET['id'])){
    $kode_booking = strip_tags($_GET['id']); // Assign value to $kode_booking
    $sql = "SELECT tujuan, booking_travel.* FROM booking_travel JOIN tarif ON 
            booking_travel.id_booking=tarif.id WHERE kode_booking = '$kode_booking' ORDER BY id_booking DESC";
}else{
    $sql = "SELECT tujuan, booking_travel.* FROM booking_travel JOIN tarif ON 
            booking_travel.id_booking=tarif.id ORDER BY id_booking DESC";
}

try {
    $hasil = $koneksi->query($sql)->fetchAll();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>

<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5 class="card-title">
                Daftar Travel
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Kode Booking</th>
                            <th>Nama Tujuan</th>
                            <th>Nama Penumpang</th>
                            <th>Tanggal Berangkat</th>
                            <th>Mode Perjalanan</th>
                            <th>Jumlah Penumpang</th>
                            <th>Total Harga</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($hasil)) {
                            $no = 1; 
                            foreach ($hasil as $isi) {?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?= $isi['kode_booking'];?></td>
                                    <td><?= $isi['tujuan'];?></td>
                                    <td><?= $isi['nama'];?></td>
                                    <td><?= $isi['created_at'];?></td>
                                    <td><?= $isi['mode_perjalanan'];?></td>
                                    <td><?= $isi['jumlah_penumpang'];?></td>
                                    <td>Rp. <?= number_format($isi['total_harga']);?></td>
                                    <td><?= $isi['konfirmasi_pembayaran'];?></td>
                                    <td>
                                        <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking'];?>" 
                                           role="button">Detail</a>   
                                    </td>
                                </tr>
                            <?php $no++;
                            }
                        } else {
                            echo "<tr><td colspan='10'>No data found</td></tr>";
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../footer.php';?>
