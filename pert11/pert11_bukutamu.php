<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

// Simpan data jika tombol kirim ditekan
if (isset($_POST['kirim'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    mysqli_query($conn, "INSERT INTO tbl_bukutamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')");
    header("Location: pert11_bukutamu.php");
    exit();
}

// Konfigurasi Paginasi 5 record per halaman
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$data_total = mysqli_query($conn, "SELECT * FROM tbl_bukutamu");
$jumlah_data = mysqli_num_rows($data_total);
$total_halaman = ceil($jumlah_data / $batas);

$data_tamu = mysqli_query($conn, "SELECT * FROM tbl_bukutamu LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
</head>
<body>
    <h2>Form Buku Tamu</h2>
    <form action="" method="post">
        Nama:<br><input type="text" name="nama" required><br><br>
        Email:<br><input type="email" name="email" required><br><br>
        Pesan:<br><textarea name="pesan" rows="4" cols="30" required></textarea><br><br>
        <input type="submit" name="kirim" value="Kirim Pesan">
    </form>

    <hr>

    <h2>Daftar Buku Tamu</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
        </tr>
        <?php if (mysqli_num_rows($data_tamu) > 0): ?>
            <?php while ($row = mysqli_fetch_array($data_tamu)): ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['pesan'])); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" align="center">Belum ada data buku tamu.</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>
    <div>
        Halaman: 
        <?php for ($i = 1; $i <= $total_halaman; $i++): ?>
            <?php if ($i == $halaman): ?>
                <b>[<?php echo $i; ?>]</b>
            <?php else: ?>
                <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</body>
</html>