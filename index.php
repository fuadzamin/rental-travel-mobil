<?php

require 'koneksi/koneksi.php';
if(empty($_SESSION['USER']))
{
    session_start();
}
include 'header.php';

?>

<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php 
            $querymobil =  $koneksi -> query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
            $no =1;
            foreach($querymobil as $isi)
            {
        ?>
        <li data-target="#carouselId" data-slide-to="<?= $no;?>" class="<?php if($no == '1'){ echo 'active';}?>"></li>
        <?php $no++;}?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php 
            $no =1;
            foreach($querymobil as $isi)
            {
        ?>
        <div class="carousel-item"  alt="First slide">
            <img src="assets/image/BG travel kebumen 3.png"
            class="img-fluid" style="object-fit:cover;width:100%;height:600px;">
        </div>
        <div class="carousel-item <?php if($no == '2'){ echo 'active';}?>">
            <img src="assets/image/<?= $isi['gambar'];?>" 
            class="img-fluid" style="object-fit:cover;width:100%;height:600px;">
        </div>
        <div class="carousel-item">
            <img src="assets/image/BG travel kebumen 2.png"
            class="img-fluid" style="object-fit:cover;width:100%;height:600px;">
        </div>
        <div class="carousel-item">
            <img src="assets/image/BG travel kebumen 4.png"
            class="img-fluid" style="object-fit:cover;width:100%;height:600px;">
        </div>
        <?php $no++;}?>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>Silakan Pilih Layanan</h2>
            <a href="rental.php" class="btn btn-primary btn-lg mx-2">Rental</a>
            <a href="travel.php" class="btn btn-secondary btn-lg mx-2">Travel</a>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="card" style=" background: #ddd">
                <div class="card-body">
                    <?php if($_SESSION['USER']){?>
                        Selamat Datang , <?php echo $_SESSION['USER']['nama_pengguna'];?>
                        <br/>
                        <br/>
                        <center>
                            <?php if($_SESSION['USER']['level'] == 'admin'){?>
                                <a href="admin/index.php" class="btn btn-primary mb-2 btn-block">Dashboard</a>
                            <?php }else{?>
                                <a href="blog.php" class="btn btn-primary mb-2 btn-block">Booking Sekarang !</a>
                            <?php }?>
                            <!-- Button trigger modal -->
                            <a href="admin/logout.php" class="btn btn-danger text-white btn-block">
                                Logout
                            </a>
                        </center>
                    <?php }else{?>
                    <form method="post" action="koneksi/proses.php?id=login">
                        <center><h5 class="card-title">Login</h5></center>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="user" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <center><button class="btn btn-primary">Login</button>
                        
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modelId">
                            Daftar
                         </a></center>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
       
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="post" action="koneksi/proses.php?id=daftar">
                    <div class="form-group">
                    <label for="">Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="user" id="" class="form-control"  required placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="pass" id="" class="form-control" required placeholder="" aria-describedby="helpId">
                    </div> <div class="modal-footer">
                <a class="btn btn-secondary text-white" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>