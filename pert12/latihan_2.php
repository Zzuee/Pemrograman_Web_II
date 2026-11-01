<?php
// Koneksi ke database lat_dbase port 3309
$con = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menjalankan query DELETE
$sql = "DELETE FROM tbl_mhs WHERE LastName = 'Prabowo'";
$query = mysqli_query($con, $sql);

if ($query) {
    echo "<h3>Proses Hapus Berhasil</h3>";
    echo "Jumlah data yang terhapus: " . mysqli_affected_rows($con) . " baris.";
} else {
    echo "Gagal menghapus data: " . mysqli_error($con);
}

mysqli_close($con);
?>