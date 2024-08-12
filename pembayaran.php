<?php

session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if(empty($_SESSION['USER']))
{
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
}

$kode_booking = $_GET['id'];
$hasil = $koneksi->query("SELECT * FROM booking_travel WHERE kode_booking = '$kode_booking'")->fetch();

$id = $hasil['id'];
$isi = $koneksi->query("SELECT * FROM tarif WHERE id = '$id'")->fetch();

$unik  = random_int(100,999);

?>
<br>
<div class="container">
<div class="row">
    <div class="col-sm-4">

        <div class="card">
            <div class="card-body text-center">
                <h5>Pembayaran Dapat Melalui :</h5>
                <hr/>
                <p> <?= $info_web->no_rek;?> </p>
            </div>
        </div>
        <br/>
        <div class="card">
                <div class="card-body" style="background:#ddd">
                <h5 class="card-title"><?php echo $isi['nama_tujuan'];?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Estimasi Waktu Santai: <?php echo $isi['estimasi_waktu_santai'];?></li>
                    <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Estimasi Waktu Satset: <?php echo $isi['estimasi_waktu_satset'];?></li>
                    <li class="list-group-item bg-dark text-white">
                        <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>
                    </li>
                </ul>
            </div>
    </div>
    <div class="col-sm-8">
         <div class="card">
           <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Kode Booking  </td>
                            <td> :</td>
                            <td><?php echo $hasil['kode_booking'];?></td>
                        </tr>
                        <tr>
                            <td>Nama Penumpang  </td>
                            <td> :</td>
                            <td><?php echo $hasil['nama'];?></td>
                        </tr>
                        <tr>
                            <td>Tujuan  </td>
                            <td> :</td>
                            <td><?php echo $hasil['tujuan'];?></td>
                        </tr>
                        <tr>
                            <td>Mode Perjalanan  </td>
                            <td> :</td>
                            <td><?php echo $hasil['mode_perjalanan'];?></td>
                        </tr>
                        <tr>
                            <td>Estimasi Waktu </td>
                            <td> :</td>
                            <td><?php echo $hasil['estimasi_waktu'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Sewa </td>
                            <td> :</td>
                            <td><?php echo $hasil['tanggal'];?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Penumpang </td>
                            <td> :</td>
                            <td><?php echo $hasil['jumlah_penumpang'];?></td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td> :</td>
                            <td>Rp. <?php echo number_format($hasil['total_harga']);?></td>
                        </tr>
                        <tr>
                            <td>Status Pembayaran </td>
                            <td> :</td>
                            <td><?php echo $hasil['konfirmasi_pembayaran'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Booking </td>
                            <td> :</td>
                            <td><?php echo $hasil['created_at'];?></td>
                        </tr>
                    </table>

                <?php if($hasil['konfirmasi_pembayaran'] == 'Belum Bayar'){?>
                    <a href="konfirmasi.php?id=<?php echo $kode_booking;?>" 
                    class="btn btn-primary float-right">Konfirmasi Pembayaran</a>
                <?php }?>
               
           </div>
         </div> 
    </div>
</div>
</div>
<br>
<br>
<br>

<?php include 'footer.php';?>
