<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "artikel_db";
$dbport = 3309;

// Menghubungkan ke server MySQL dan memilih database
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);

if (!$connection) {
    die("Koneksi ke database '$dbname' gagal: " . mysqli_connect_error());
}

echo "Koneksi ke database <b>$dbname</b> berhasil terhubung.";
?>