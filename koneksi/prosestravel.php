if ($_GET['id'] == 'konfirmasi') {
    $data[] = $_POST['id_booking'];
    $data[] = $_POST['no_rekening'];
    $data[] = $_POST['nama'];
    $data[] = $_POST['nominal'];
    $data[] = $_POST['tgl'];
    $data[] = 'sewa';  // tipe booking

    $sql = "INSERT INTO pembayaran (id_booking, no_rekening, nama_rekening, nominal, tanggal, booking_type) VALUES (?,?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    $data2[] = 'Sedang di proses';
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE booking SET konfirmasi_pembayaran=? WHERE id_booking=?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Kirim Sukses, Pembayaran anda sedang diproses");history.go(-2);</script>';
}

if ($_GET['id'] == 'travel_konfirmasi') {
    $data[] = $_POST['id_booking'];
    $data[] = $_POST['no_rekening'];
    $data[] = $_POST['nama'];
    $data[] = $_POST['nominal'];
    $data[] = $_POST['tgl'];
    $data[] = 'travel';  // tipe booking

    $sql = "INSERT INTO pembayaran (id_booking, no_rekening, nama_rekening, nominal, tanggal, booking_type) VALUES (?,?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    $data2[] = 'Sedang di proses';
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE booking_travel SET konfirmasi_pembayaran=? WHERE id_booking=?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Kirim Sukses, Pembayaran anda sedang diproses");history.go(-2);</script>';
}
