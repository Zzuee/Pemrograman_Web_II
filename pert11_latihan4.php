<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_query($con, "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Karina', 'Suwandi', '29')");
mysqli_query($con, "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Glenn', 'Gandari', '32')");

echo "Data Karina dan Glenn berhasil disisipkan!";

mysqli_close($con);
?>