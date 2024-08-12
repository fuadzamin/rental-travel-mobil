    <?php
    require 'koneksi/koneksi.php';

    // Mulai sesi jika belum ada
    if (empty($_SESSION['USER'])) {
        session_start();
    }

    include 'header.php';

    // Query untuk mengambil tujuan perjalanan dari database
    $query = "SELECT id, nama_tujuan, harga, estimasi_waktu_santai, estimasi_waktu_satset FROM tarif ORDER BY nama_tujuan";
    $stmt = $koneksi->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$results) {
        die('Query Error: ' . $stmt->errorInfo()[2]);
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h2>Formulir Pemesanan Travel</h2>
                <form method="post" action="koneksi/proses.php?id=travel" id="bookingForm">
                    <div class="form-group">
                        <label for="nama">Nama Penumpang</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan Perjalanan</label>
                        <select name="tujuan" id="tujuan" class="form-control" required>
                            <option value="">Pilih Tujuan</option>
                            <?php
                            foreach ($results as $row) {
                                echo "<option value='" . $row['id'] . "' 
                                            data-harga='" . $row['harga'] . "' 
                                            data-santai='" . $row['estimasi_waktu_santai'] . "' 
                                            data-satset='" . ($row['estimasi_waktu_satset'] * 0.8) . "'>" . 
                                            $row['nama_tujuan'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mode_perjalanan">Mode Perjalanan</label>
                        <select name="mode_perjalanan" id="mode_perjalanan" class="form-control" required>
                            <option value="Santai">Santai</option>
                            <option value="Sat Set">Sat Set</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estimasi_waktu">Estimasi Waktu (jam)</label>
                        <input type="text" name="estimasi_waktu" id="estimasi_waktu" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Berangkat</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_penumpang">Jumlah Penumpang</label>
                        <input type="number" name="jumlah_penumpang" id="jumlah_penumpang" class="form-control" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="total_harga">Total Harga</label>
                        <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION['USER']['id_login'];?>" name="id_login">
                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Fungsi untuk memformat angka ke format uang Indonesia
        function formatRupiah(angka, prefix) {
            var numberString = angka.toString().replace(/[^,\d]/g, ''),
                split = numberString.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // Tambahkan titik jika ada ribuan
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function updateEstimasiWaktu() {
            var tujuanElement = document.getElementById('tujuan');
            var modeElement = document.getElementById('mode_perjalanan');
            var jumlahPenumpang = document.getElementById('jumlah_penumpang').value;

            var estimasiWaktu = modeElement.value === 'Sat Set' ?
                parseFloat(tujuanElement.options[tujuanElement.selectedIndex].getAttribute('data-satset')) :
                parseFloat(tujuanElement.options[tujuanElement.selectedIndex].getAttribute('data-santai'));

            document.getElementById('estimasi_waktu').value = estimasiWaktu.toFixed(2);

            var harga = parseFloat(tujuanElement.options[tujuanElement.selectedIndex].getAttribute('data-harga'));
            var multiplier = modeElement.value === 'Sat Set' ? 1.2 : 1;

            var totalHarga = harga * multiplier * jumlahPenumpang;

            // Format totalHarga ke dalam format uang Indonesia
            var formattedHarga = formatRupiah(totalHarga, 'Rp. ');

            // Set nilai elemen dengan id 'total_harga' ke nilai yang sudah diformat
            document.getElementById('total_harga').value = formattedHarga;
        }

        // Panggil updateEstimasiWaktu() saat halaman pertama kali dimuat
        window.onload = updateEstimasiWaktu;

        // Tambahkan event listener untuk memanggil updateEstimasiWaktu() saat dropdown berubah
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tujuan').addEventListener('change', updateEstimasiWaktu);
            document.getElementById('mode_perjalanan').addEventListener('change', updateEstimasiWaktu);
            document.getElementById('jumlah_penumpang').addEventListener('input', updateEstimasiWaktu);
        });
    </script>
