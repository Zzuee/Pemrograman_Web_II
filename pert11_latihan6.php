<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);
$hasil = mysqli_query($conn, "SELECT * FROM tbl_mhs");

// Menampilkan langsung berdasarkan nama kolom tabel
while ($data = mysqli_fetch_array($hasil)) {
    echo "$data[FirstName] $data[LastName] $data[Age]<br>";
}

mysqli_close($conn);
?>