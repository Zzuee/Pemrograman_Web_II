<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

$sql = "CREATE TABLE IF NOT EXISTS tbl_bukutamu (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    pesan text NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabel tbl_bukutamu siap digunakan!";
}

mysqli_close($conn);
?>