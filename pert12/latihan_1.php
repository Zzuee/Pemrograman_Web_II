<?php
// Koneksi ke database lat_dbase port 3309
$con = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menjalankan query UPDATE
$sql = "UPDATE tbl_mhs SET Age = '36' WHERE FirstName = 'Karina' AND LastName = 'Suwandi'";
$query = mysqli_query($con, $sql);

if ($query) {
    echo "<h3>Proses Update Berhasil</h3>";
    echo "Jumlah data yang diperbarui: " . mysqli_affected_rows($con) . " baris.";
} else {
    echo "Gagal memperbarui data: " . mysqli_error($con);
}

mysqli_close($con);
?>