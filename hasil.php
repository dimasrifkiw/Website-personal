<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan</title>
</head>
<body>
    <h1>Hasil Transaksi</h1>
    <hr>

    <?php
    if (isset($_POST['submit'])) {
        $nomor_barang = $_POST['nomor_barang'];
        $nama_barang = $_POST['nama_barang'];
        $jumlah_barang = $_POST['jumlah_barang'];
        $harga_barang = $_POST['harga_barang'];

        $total = 0;

        foreach ($nomor_barang as $index => $nomor) {
            if (!empty($nomor) && !empty($nama_barang[$index]) && !empty($jumlah_barang[$index]) && !empty($harga_barang[$index])) {
                $total_barang = $jumlah_barang[$index] * $harga_barang[$index];
                echo "Nomor Barang: " . $nomor . "<br>";
                echo "Nama Barang: " . $nama_barang[$index] . "<br>";
                echo "Jumlah: " . $jumlah_barang[$index] . "<br>";
                echo "Harga Barang: " . $harga_barang[$index] . "<br>";
                echo "Total " . $nama_barang[$index] . ": " . $total_barang . "<br><hr>"; // Tambahkan garis pembatas
                $total += $total_barang;
            } else {
                echo "Mohon isi semua data untuk barang " . ($index + 1) . "<br>";
            }
        }

        if ($total > 0) {
            echo "<h2>Total Keseluruhan: " . $total . "</h2>";
        }
    } else {
        echo "Tidak ada data yang dikirimkan. Silakan kembali ke halaman sebelumnya.";
    }
    ?>

    <br>
    <a href="transaksi.php">Kembali ke Halaman Utama</a>
</body>
</html>
