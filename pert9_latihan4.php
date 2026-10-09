<html>
<head>
    <title>Tanggal</title>
</head>
<body>
    <font size="10px">
    <?php
    // Menampilkan tanggal sekarang (format: hari-Bulan-Tahun)
    echo "Sekarang tanggal ";
    echo date('d-F-Y');

    // Menampilkan jam sekarang (format: 12 jam:menit:detik AM/PM)
    echo "<br>dan jam ";
    echo date('h:i:s A');
    ?>
    </font>
</body>
</html>