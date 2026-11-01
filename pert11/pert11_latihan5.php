<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);
$hasil = mysqli_query($conn, "SELECT * FROM tbl_mhs");

// Menampilkan berdasarkan indeks angka kolom (0 = mhsID, 1 = FirstName, 2 = LastName)
while ($data = mysqli_fetch_row($hasil)) {
    echo "$data[0] $data[1] $data[2]<br>";
}

mysqli_close($conn);
?>