<!DOCTYPE html>
<html>
<head>
    <title>Parkir Kendaraan</title>
</head>
<body>
    <h1>Sistem Parkir Kendaraan</h1>
    <form method="post" action="">
        <label for="no_plat">Nomor Plat Kendaraan:</label>
        <input type="text" name="no_plat" id="no_plat" required><br><br>
        
        <label for="jenis_kendaraan">Jenis Kendaraan:</label>
        <select name="jenis_kendaraan" id="jenis_kendaraan" required>
            <option value="motor">Motor</option>
            <option value="mobil">Mobil</option>
            <option value="sepeda">Sepeda</option>
        </select><br><br>
        
        <label for="jam_masuk">Jam Masuk (hh:mm):</label>
        <input type="text" name="jam_masuk" id="jam_masuk" required><br><br>
        
        
        <label for="jam_keluar">Jam Keluar (hh:mm):</label>
        <input type="text" name="jam_keluar" id="jam_keluar" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $no_plat = $_POST["no_plat"];
        $jenis_kendaraan = $_POST["jenis_kendaraan"];
        $jam_masuk = $_POST["jam_masuk"];
        $jam_keluar = $_POST["jam_keluar"];

        // Menghitung selisih waktu masuk dan keluar
        $masuk = explode(":", $jam_masuk);
        $keluar = explode(":", $jam_keluar);
        $selisih_jam = $keluar[0] - $masuk[0];
        $selisih_menit = $keluar[1] - $masuk[1];
        if ($selisih_menit < 0) {
            $selisih_jam--;
            $selisih_menit += 60;
        }

        // Menghitung biaya parkir berdasarkan jenis kendaraan
        $biaya_per_jam = 0;
        if ($jenis_kendaraan == "motor") {
            $biaya_per_jam = 3000;
        } elseif ($jenis_kendaraan == "mobil") {
            $biaya_per_jam = 5000;
        } elseif ($jenis_kendaraan == "sepeda") {
            $biaya_per_jam = 2000;
        }

        // Menghitung total biaya parkir
        $total_biaya = ceil(($selisih_jam + $selisih_menit / 60) * $biaya_per_jam);

        // Menampilkan hasil perhitungan
        echo "<h2>Data Yang Masuk</h2>";
        echo "Nomor Plat Kendaraan: " . $no_plat . "<br>";
        echo "Jenis Kendaraan: " . $jenis_kendaraan . "<br>";
        echo "Jam Masuk: " . $jam_masuk . "<br>";
        echo "Jam Keluar: " . $jam_keluar . "<br>";
        echo "Biaya Parkir: Rp " . $total_biaya . "<br>";
   
    }
    ?>
</body>
</html>