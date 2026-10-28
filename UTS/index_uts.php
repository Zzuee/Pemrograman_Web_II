<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql_tabel = "CREATE TABLE IF NOT EXISTS calon_mhs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tgl_input DATE NOT NULL,
    kode VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jk VARCHAR(15) NOT NULL,
    tempat_lahir VARCHAR(50) NOT NULL,
    tgl_lahir DATE NOT NULL,
    asal_sekolah VARCHAR(100) NOT NULL,
    pekerjaan_ortu VARCHAR(50) NOT NULL,
    tempat_tes VARCHAR(50) NOT NULL,
    mat FLOAT NOT NULL,
    bing FLOAT NOT NULL,
    umum FLOAT NOT NULL,
    rata FLOAT NOT NULL,
    keterangan VARCHAR(20) NOT NULL
)";
mysqli_query($conn, $sql_tabel);

$pesan_status = "";
if (isset($_POST['simpan'])) {
    $tgl_input      = $_POST['tgl_input'];
    $kode           = strtoupper(trim($_POST['kode']));
    $nama           = mysqli_real_escape_string($conn, $_POST['nama']);
    $jk             = $_POST['jk'];
    $asal_sekolah   = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
    $pekerjaan_ortu = mysqli_real_escape_string($conn, $_POST['pekerjaan_ortu']);
    $tempat_lahir   = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $tgl_lahir      = $_POST['tgl_lahir'];

    $mat  = (float)$_POST['mat'];
    $bing = (float)$_POST['bing'];
    $umum = (float)$_POST['umum'];

    // 1. Hitung Nilai Rata-Rata
    $rata = ($mat + $bing + $umum) / 3;

    // 2. Tentukan Keterangan Kelulusan
    if ($rata >= 70) {
        $keterangan = "Lulus";
    } elseif ($rata >= 60) {
        $keterangan = "Cadangan";
    } else {
        $keterangan = "Tidak Lulus";
    }

    // 3. Ekstraksi Kode Tempat Tes
    $kode_awal = substr($kode, 0, 1);
    switch ($kode_awal) {
        case "A": $tempat_tes = "Gedung A"; break;
        case "B": $tempat_tes = "Gedung B"; break;
        case "V": $tempat_tes = "Viktor"; break;
        default:  $tempat_tes = "Tidak Diketahui"; break;
    }

    // 4. Query Simpan ke Tabel calon_mhs
    $sql_insert = "INSERT INTO calon_mhs (
        tgl_input, kode, nama, jk, tempat_lahir, tgl_lahir, 
        asal_sekolah, pekerjaan_ortu, tempat_tes, mat, bing, umum, rata, keterangan
    ) VALUES (
        '$tgl_input', '$kode', '$nama', '$jk', '$tempat_lahir', '$tgl_lahir', 
        '$asal_sekolah', '$pekerjaan_ortu', '$tempat_tes', $mat, $bing, $umum, $rata, '$keterangan'
    )";

    if (mysqli_query($conn, $sql_insert)) {
        $pesan_status = "<p style='color: green; font-weight: bold;'>Data calon mahasiswa berhasil disimpan ke database!</p>";
    } else {
        $pesan_status = "<p style='color: red; font-weight: bold;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa (Database)</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }
        .container {
            width: 950px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 { text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td { border: 1px solid black; }
        th, td {
            padding: 8px;
            text-align: center;
            font-size: 13px;
        }
        th { background: #e0e0e0; }
        input[type=text],
        input[type=number],
        input[type=date] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .btn {
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn:hover { background: darkblue; }
        .info {
            margin-top: 20px;
            padding: 10px;
            background: #eef;
            border-left: 5px solid blue;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <?php echo $pesan_status; ?>

    <form method="POST" action="">

        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" value="<?php echo date('Y-m-d'); ?>" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki" checked required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" step="any" min="0" max="100" name="mat" required>

        <label>Bahasa Inggris</label>
        <input type="number" step="any" min="0" max="100" name="bing" required>

        <label>Umum</label>
        <input type="number" step="any" min="0" max="100" name="umum" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>

    </form>

    <hr style="margin-top: 30px;">

    <!-- TABEL DATA DARI DATABASE -->
    <h2>DAFTAR CALON MAHASISWA</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>JK</th>
            <th>TTL</th>
            <th>Asal Sekolah</th>
            <th>Pekerjaan Ortu</th>
            <th>Tempat Tes</th>
            <th>MAT</th>
            <th>B. Inggris</th>
            <th>Umum</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
        </tr>

        <?php
        $query_tampil = mysqli_query($conn, "SELECT * FROM calon_mhs ORDER BY id DESC");
        $no = 1;

        if (mysqli_num_rows($query_tampil) > 0) {
            while ($row = mysqli_fetch_array($query_tampil)) {
                echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . htmlspecialchars($row['kode']) . "</td>
                    <td>" . htmlspecialchars($row['nama']) . "</td>
                    <td>" . htmlspecialchars($row['jk']) . "</td>
                    <td>" . htmlspecialchars($row['tempat_lahir']) . ", " . $row['tgl_lahir'] . "</td>
                    <td>" . htmlspecialchars($row['asal_sekolah']) . "</td>
                    <td>" . htmlspecialchars($row['pekerjaan_ortu']) . "</td>
                    <td>" . htmlspecialchars($row['tempat_tes']) . "</td>
                    <td>" . $row['mat'] . "</td>
                    <td>" . $row['bing'] . "</td>
                    <td>" . $row['umum'] . "</td>
                    <td>" . number_format($row['rata'], 2) . "</td>
                    <td><b>" . htmlspecialchars($row['keterangan']) . "</b></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='13'>Belum ada data pendaftar tersimpan.</td></tr>";
        }
        ?>
    </table>

    <?php
    // Perhitungan Rekapitulasi Otomatis dari Tabel Database
    $query_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM calon_mhs");
    $data_total  = mysqli_fetch_assoc($query_total);
    $total_mhs   = $data_total['total'];

    $query_lulus = mysqli_query($conn, "SELECT COUNT(*) as total_lulus FROM calon_mhs WHERE keterangan = 'Lulus'");
    $data_lulus  = mysqli_fetch_assoc($query_lulus);
    $total_lulus = $data_lulus['total_lulus'];

    $query_tdk_lulus = mysqli_query($conn, "SELECT COUNT(*) as total_tdk FROM calon_mhs WHERE keterangan != 'Lulus'");
    $data_tdk_lulus  = mysqli_fetch_assoc($query_tdk_lulus);
    $total_tdk_lulus = $data_tdk_lulus['total_tdk'];
    ?>

    <div class="info">
        <h3>Rekap Data (Database):</h3>
        <p>Jumlah Pendaftar: <b><?php echo $total_mhs; ?></b></p>
        <p>Jumlah Peserta Lulus: <b><?php echo $total_lulus; ?></b></p>
        <p>Jumlah Tidak Lulus / Cadangan: <b><?php echo $total_tdk_lulus; ?></b></p>
    </div>

    <div class="info">
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata &ge; 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata &lt; 60 = Tidak Lulus</li>
        </ul>
    </div>

</div>

</body>
</html>
<?php
mysqli_close($conn);
?>