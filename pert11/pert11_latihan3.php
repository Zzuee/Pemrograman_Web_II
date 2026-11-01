<?php
// Koneksi langsung memilih database lat_dbase di port 3309
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309) 
        or die("Gagal koneksi: " . mysqli_connect_error());

// Buat struktur tabel
$sql = "CREATE TABLE tbl_mhs (
    mhsID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(mhsID),
    FirstName varchar(15),
    LastName varchar(15),
    Age int
)";
mysqli_query($conn, $sql);

// Input data pertama
$input = mysqli_query($conn, "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Anjar', 'Prabowo', 25)");

if ($input) {
    echo "Tabel tbl_mhs berhasil dibuat dan data awal berhasil dimasukkan";
}

mysqli_close($conn);
?>