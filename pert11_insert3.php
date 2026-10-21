<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase", 3309);

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Cek apakah data dikirim dari form
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age'])) {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $age       = $_POST['age'];

    $sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age) 
            VALUES ('$firstname', '$lastname', '$age')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "1 record added";
} else {
    echo "Silakan isi form terlebih dahulu melalui form.php!";
}

mysqli_close($con);
?>