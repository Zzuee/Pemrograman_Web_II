<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);
$hasil = mysqli_query($conn, "SELECT * FROM tbl_mhs");

$hit = mysqli_num_rows($hasil);
echo "jumlah record $hit";

mysqli_close($conn);
?>