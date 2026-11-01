<?php
// Hostname dan akun server database
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$port       = 3309; // Mengarah ke port aktif di XAMPP

// Hubungkan dengan menyertakan port 3309
$link = mysqli_connect($servername, $dbusername, $dbpassword, "", $port) 
        or die("Not able to connect to server");

if ($link) {
    echo "ok....koneksi berhasil";
}
?>