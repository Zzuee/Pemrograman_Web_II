<?php
// Inisialisasi variabel
$nilai1 = "";
$nilai2 = "";
$operator = "+";
$hasil = "";
$pesan_error = "";
$sudah_dihitung = false;

// Proses jika tombol submit ditekan
if (isset($_POST['submit'])) {
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $operator = $_POST['operator'];

    // Validasi apakah nilai berupa angka
    if ($nilai1 === "" || $nilai2 === "") {
        $pesan_error = "Harap masukkan Nilai I dan Nilai II!";
    } elseif (!is_numeric($nilai1) || !is_numeric($nilai2)) {
        $pesan_error = "Nilai harus berupa angka numerik!";
    } else {
        // Melakukan perhitungan berdasarkan operator aritmatika
        switch ($operator) {
            case '+':
                $hasil = $nilai1 + $nilai2;
                $sudah_dihitung = true;
                break;
            case '-':
                $hasil = $nilai1 - $nilai2;
                $sudah_dihitung = true;
                break;
            case '*':
                $hasil = $nilai1 * $nilai2;
                $sudah_dihitung = true;
                break;
            case '/':
                if ($nilai2 == 0) {
                    $pesan_error = "Kesalahan: Pembagian dengan angka 0 tidak terdefinisi!";
                } else {
                    $hasil = $nilai1 / $nilai2;
                    $sudah_dihitung = true;
                }
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KALKULATOR</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px 40px;
        }

        /* Header Area */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
        }

        /* Logo / Judul Kiri dengan efek emboss/bayangan 3D */
        .title-left {
            font-family: 'Arial Black', Impact, sans-serif;
            font-size: 26px;
            line-height: 1.1;
            color: #2b2b2b;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6), 
                         0 0 10px rgba(0, 0, 0, 0.4);
            user-select: none;
        }

        .title-left span {
            display: block;
        }

        /* Tulisan Selamat Mencoba */
        .title-right {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            font-size: 24px;
            color: #b84318;
            margin-top: 40px;
            margin-right: 60px;
        }

        /* Form Container */
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        /* Label Kolom Nilai I dan Nilai II */
        .labels-row {
            display: flex;
            justify-content: center;
            width: 480px;
            margin-bottom: 8px;
            font-family: 'Times New Roman', serif;
            font-size: 22px;
            font-weight: bold;
            color: #8b0000;
        }

        .label-col {
            flex: 1;
            text-align: center;
        }

        /* Baris Input Field */
        .input-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
        }

        .input-box {
            width: 170px;
            height: 26px;
            border: 1px solid #7f9db9;
            padding: 2px 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .select-op {
            height: 26px;
            border: 1px solid #7f9db9;
            font-size: 16px;
            padding: 0 4px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .btn-submit {
            height: 26px;
            padding: 0 14px;
            border: 1px solid #7f9db9;
            background-color: #f0f0f0;
            cursor: pointer;
            font-size: 15px;
            margin-left: 4px;
            box-sizing: border-box;
        }

        .btn-submit:hover {
            background-color: #e4e4e4;
        }

        /* Area Hasil Perhitungan */
        .result-box {
            margin-top: 30px;
            text-align: center;
            font-size: 20px;
            font-family: Arial, sans-serif;
            color: #1a5276;
            font-weight: bold;
        }

        .error-box {
            margin-top: 20px;
            text-align: center;
            color: #c0392b;
            font-weight: bold;
            font-size: 16px;
        }

        /* Footer */
        .footer-text {
            margin-top: 100px;
            text-align: center;
            color: #0000cc;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>

    <!-- Form Kalkulator -->
    <form method="POST" action="">
        <div class="form-container">
            <!-- Label Kolom -->
            <div class="labels-row">
                <div class="label-col">Nilai I</div>
                <div class="label-col">Nilai II</div>
            </div>

            <!-- Input & Tombol -->
            <div class="input-row">
                <input type="text" name="nilai1" class="input-box" value="<?php echo htmlspecialchars($nilai1); ?>" required autocomplete="off">
                
                <select name="operator" class="select-op">
                    <option value="+" <?php if ($operator == '+') echo 'selected'; ?>>+</option>
                    <option value="-" <?php if ($operator == '-') echo 'selected'; ?>>-</option>
                    <option value="*" <?php if ($operator == '*') echo 'selected'; ?>>*</option>
                    <option value="/" <?php if ($operator == '/') echo 'selected'; ?>>/</option>
                </select>

                <input type="text" name="nilai2" class="input-box" value="<?php echo htmlspecialchars($nilai2); ?>" required autocomplete="off">

                <input type="submit" name="submit" value="submit" class="btn-submit">
            </div>

            <!-- Tampilan Hasil / Pesan Error di Halaman yang Sama -->
            <?php if ($sudah_dihitung): ?>
                <div class="result-box">
                    Hasil Perhitungan: <br>
                    <?php echo "{$nilai1} {$operator} {$nilai2} = <u>{$hasil}</u>"; ?>
                </div>
            <?php elseif (!empty($pesan_error)): ?>
                <div class="error-box">
                    <?php echo $pesan_error; ?>
                </div>
            <?php endif; ?>
        </div>
    </form>

    <!-- Footer Identitas Mahasiswa -->
    <div class="footer-text">
        Created by Ahmad Bazuri, Nim : 221011450143
    </div>

</body>
</html>