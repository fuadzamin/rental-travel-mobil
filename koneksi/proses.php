<?php
require 'koneksi.php';

if($_GET['id'] == 'login'){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ? AND password = md5(?)");
    $row->execute(array($user, $pass));
    $hitung = $row->rowCount();

    if($hitung > 0) {
        session_start();
        $hasil = $row->fetch();
        $_SESSION['USER'] = $hasil;

        if($_SESSION['USER']['level'] == 'admin') {
            echo '<script>alert("Login Sukses"); window.location="../admin/index.php";</script>';    
        } else {
            echo '<script>alert("Login Sukses"); window.location="../index.php";</script>'; 
        }
    } else {
        echo '<script>alert("Login Gagal"); window.location="../index.php";</script>'; 
    }
}

if($_GET['id'] == 'daftar') {
    $data[] = $_POST['nama'];
    $data[] = $_POST['user'];
    $data[] = md5($_POST['pass']);
    $data[] = 'pengguna';

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ?");
    $row->execute(array($_POST['user']));
    $hitung = $row->rowCount();

    if($hitung > 0) {
        echo '<script>alert("Daftar Gagal, Username Sudah digunakan "); window.location="../index.php";</script>'; 
    } else {
        $sql = "INSERT INTO `login`(`nama_pengguna`, `username`, `password`, `level`) VALUES (?,?,?,?)";
        $row = $koneksi->prepare($sql);
        $row->execute($data);
        echo '<script>alert("Daftar Sukses Silahkan Login"); window.location="../index.php";</script>'; 
    }
}

if($_GET['id'] == 'booking')
{
    $total = $_POST['total_harga'] * $_POST['lama_sewa'];
    $unik  = random_int(100,999);
    $total_harga = $total+$unik;

    $data[] = time();
    $data[] = $_POST['id_login'];
    $data[] = $_POST['id_mobil'];
    $data[] = $_POST['ktp'];
    $data[] = $_POST['nama'];
    $data[] = $_POST['alamat'];
    $data[] = $_POST['no_tlp'];
    $data[] = $_POST['tanggal'];
    $data[] = $_POST['lama_sewa'];
    $data[] = $total_harga;
    $data[] = "Belum Bayar";
    $data[] = date('Y-m-d');

    $sql = "INSERT INTO booking (kode_booking, id_login, id_mobil, ktp, nama, alamat,no_tlp, 
    tanggal, lama_sewa, total_harga, konfirmasi_pembayaran, tgl_input) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    echo '<script>alert("Anda Sukses Booking silahkan Melakukan Pembayaran");
    window.location="../bayar.php?id='.time().'";</script>'; 
}

    if($_GET['id'] == 'konfirmasi')
    {

        $data[] = $_POST['id_booking'];
        $data[] = $_POST['no_rekening'];
        $data[] = $_POST['nama'];
        $data[] = $_POST['nominal'];
        $data[] = $_POST['tgl'];

        $sql = "INSERT INTO `pembayaran`(`id_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) 
        VALUES (?,?,?,?,?)";
        $row = $koneksi->prepare($sql);
        $row->execute($data);

        $data2[] = 'Sedang di proses';
        $data2[] = $_POST['id_booking'];
        $sql2 = "UPDATE `booking` SET `konfirmasi_pembayaran`=? WHERE id_booking=?";
        $row2 = $koneksi->prepare($sql2);
        $row2->execute($data2);

        echo '<script>alert("Kirim Sukses , Pembayaran anda sedang diproses");history.go(-2);</script>'; 
    }
    

    if($_GET['id'] == 'konfirmasi_travel')
    {

        $data[] = $_POST['kode_booking'];
        $data[] = $_POST['no_rekening'];
        $data[] = $_POST['nama'];
        $data[] = $_POST['nominal'];
        $data[] = $_POST['tgl'];

        $sql = "INSERT INTO `pembayaran_travel`(`kode_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) 
        VALUES (?,?,?,?,?)";
        $row = $koneksi->prepare($sql);
        $row->execute($data);

        $data2[] = 'Sedang di proses';
        $data2[] = $_POST['kode_booking'];
        $sql2 = "UPDATE `booking_travel` SET `konfirmasi_pembayaran`=? WHERE kode_booking=?";
        $row2 = $koneksi->prepare($sql2);
        $row2->execute($data2);

        echo '<script>alert("Kirim Sukses , Pembayaran anda sedang diproses");history.go(-2);</script>'; 
    }

$id = $_GET['id'];

try {
    if ($id == 'travel') {
        $nama = $_POST['nama'];
        $tujuan_id = $_POST['tujuan'];
        $mode_perjalanan = $_POST['mode_perjalanan'];
        $estimasi_waktu = $_POST['estimasi_waktu'];
        $tanggal = $_POST['tanggal'];
        $jumlah_penumpang = $_POST['jumlah_penumpang'];
        $total_harga = str_replace(['Rp. ', '.'], '', $_POST['total_harga']);

        // Query untuk mendapatkan nama tujuan berdasarkan id
        $query = "SELECT nama_tujuan FROM tarif WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->execute([$tujuan_id]);

        $tujuan = $stmt->fetch(PDO::FETCH_ASSOC)['nama_tujuan'];

        if (!$tujuan) {
            throw new Exception("Tujuan tidak ditemukan.");
        }

        // Insert ke tabel booking_travel
        $insertQuery = "INSERT INTO booking_travel (kode_booking, nama, tujuan, mode_perjalanan, estimasi_waktu, tanggal, jumlah_penumpang, total_harga, konfirmasi_pembayaran) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Belum Bayar')";
        $kode_booking = uniqid('TRV-'); // Membuat kode booking unik
        $stmt = $koneksi->prepare($insertQuery);

        $success = $stmt->execute([$kode_booking, $nama, $tujuan, $mode_perjalanan, $estimasi_waktu, $tanggal, $jumlah_penumpang, $total_harga]);

        if (!$success) {
            throw new Exception("Gagal memasukkan data ke database.");
        }

        // Redirect ke halaman pembayaran
        header('Location: ../proses_pembayaran.php?kode_booking=' . $kode_booking . '&type=travel');
        exit();
    } else if ($id == 'booking') {
        // Proses untuk pemesanan sewa kendaraan
        // ...
    }
} catch (Exception $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '"); window.history.back();</script>';
}

if ($_GET['id'] == 'konfirmasi_travel') {
    // Ambil data dari POST
    $id_booking = $_POST['id_booking'];
    $no_rekening = $_POST['no_rekening'];
    $nama_rekening = $_POST['nama'];
    $nominal = $_POST['nominal'];
    $tanggal = $_POST['tgl'];

    // Lakukan penyimpanan data ke dalam database
    $sql_insert_pembayaran = "INSERT INTO pembayaran_travel (id_booking, no_rekening, nama_rekening, nominal, tanggal) 
                              VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql_insert_pembayaran);
    $stmt->bind_param("issss", $id_booking, $no_rekening, $nama_rekening, $nominal, $tanggal);
    
    if ($stmt->execute()) {
        // Jika penyimpanan berhasil, update status konfirmasi pembayaran di tabel booking_travel
        $sql_update_booking = "UPDATE booking_travel SET konfirmasi_pembayaran = 'Sedang di proses' WHERE id_booking = ?";
        $stmt_update = $koneksi->prepare($sql_update_booking);
        $stmt_update->bind_param("i", $id_booking);
        
        if ($stmt_update->execute()) {
            // Redirect ke halaman atau berikan feedback bahwa proses berhasil
            echo '<script>alert("Kirim Sukses, Pembayaran anda sedang diproses"); window.location.href = "index.php";</script>';
        } else {
            // Handle jika gagal update status booking
            echo '<script>alert("Gagal memperbarui status pembayaran"); window.location.href = "index.php";</script>';
        }
    } else {
        // Handle jika gagal menyimpan data pembayaran
        echo '<script>alert("Gagal menyimpan data pembayaran"); window.location.href = "index.php";</script>';
    }

    // Tutup statement
    $stmt->close();
    $stmt_update->close();
} else {
    // Jika id tidak sesuai, arahkan kembali ke halaman lain atau berikan pesan error
    echo '<script>alert; window.location.href = "index.php";</script>';
}
?>

