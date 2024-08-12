<?php

require 'koneksi/koneksi.php';
if(empty($_SESSION['USER']))
{
    session_start();
}
include 'header.php';

?>
<div class="col-sm-9">
            <div class="row">
                <?php 
                    $query =  $koneksi -> query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
                    $no =1;
                    foreach($query as $isi)
                    {
                ?>
                <br/>
                <br/>
                <div class="col-sm-4">
                    <div class="card">
                    <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;">
                        <div class="card-body" style="background:#ddd">
                        <h5 class="card-title"><?php echo $isi['merk'];?></h5>
                        </div>
                        <ul class="list-group list-group-flush">

                        <?php if($isi['status'] == 'Tersedia'){?>

                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Available
                            </li>

                        <?php }else{?>

                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Not Available
                            </li>

                        <?php }?>
                    
                    
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                        </li>
                        </ul>
                        <div class="card-body">
                        <center><a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-success">Booking now!</a>
                        <a href="detail.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-info">Detail</a></center>
                        </div>
                    </div>
                </div>
                <?php $no++;}?>
            </div>
        </div>
    </div>

    </div>
</div>

            </form>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>