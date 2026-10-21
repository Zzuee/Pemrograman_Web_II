<?php
$conn = mysqli_connect("localhost", "root", "", "", 3309) 
        or die("Gagal koneksi: " . mysqli_connect_error());

$dbname = "lat_dbase";
$cek = mysqli_query($conn, "CREATE DATABASE $dbname") 
       or die("Couldn't Create Database: $dbname. " . mysqli_error($conn));

if ($cek) {
    echo "Database $dbname berhasil dibuat";
}

mysqli_close($conn);
?>