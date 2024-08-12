<?php

require '../../koneksi/koneksi.php';

if (empty($_SESSION['USER'])) {
    session_start();
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit' && isset($_GET['id'])) {
    $gambar = $_POST['gambar_cek'];
    $id = $_GET['id'];

    $data = [
        $_POST['no_plat'],
        $_POST['merk'],
        $_POST['harga'],
        $_POST['deskripsi'],
        $_POST['status']
    ];

    $allowedImageType = ["image/gif", "image/JPG", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", 'image/webp'];
    $allowedTypes = ['image/png' => 'png', 'image/jpeg' => 'jpg', 'image/gif' => 'gif', 'image/jpg' => 'jpeg', 'image/webp' => 'webp'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
        $filepath = $_FILES['gambar']['tmp_name'];
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $filepath);

        if (!in_array($filetype, array_keys($allowedTypes))) {
            echo '<script>alert("You can only upload JPG, PNG, and GIF files");window.location="edit.php?id=' . $id . '"</script>';
            exit();
        }

        if ($_FILES['gambar']["error"] > 0) {
            echo '<script>alert("Error file");history.go(-1)</script>';
            exit();
        }

        if (round($_FILES['gambar']["size"] / 1024) > 4096) {
            echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");history.go(-1)</script>';
            exit();
        }

        $dir = '../../assets/image/';
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $temp = explode(".", $_FILES["gambar"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_path = $dir . basename($newfilename);

        if (move_uploaded_file($tmp_name, $target_path)) {
            if (file_exists($dir . $gambar)) {
                unlink($dir . $gambar);
            }
            $data[] = $newfilename;
        } else {
            echo '<script>alert("Error file");history.go(-1)</script>';
            exit();
        }
    } else {
        $data[] = $gambar;
    }

    $data[] = $id;
    $sql = "UPDATE mobil SET no_plat = ?, merk = ?, harga = ?, deskripsi = ?, status = ?, gambar = ? WHERE id_mobil = ?";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    if ($row->rowCount() > 0) {
        echo '<script>alert("sukses");window.location="mobil.php"</script>';
    } else {
        echo '<script>alert("Update failed");history.go(-1)</script>';
    }
}
?>
