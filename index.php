<?php

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $email = $_POST['email'];

    if (isset($_POST['jurusan'])) {
        $jurusan = $_POST['jurusan'];
    } else {
        $jurusan = "";
    }

    $perusahaan = $_POST['perusahaan'];
    $alasan = $_POST['alasan'];

    if (empty($nama) || empty($nis)) {
        $pesan = "Nama Lengkap dan NIS wajib diisi!";
        $berhasil = false;
    } else {
        $pesan = "Pendaftaran berhasil!";
        $berhasil = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta PKL</title>
    <link rel="stylesheet" href="style(2).css">
</head>

<body>

<header>
    <h1>Pendaftaran Peserta PKL</h1>
    <p>Formulir Pendaftaran Praktik Kerja Lapangan</p>
</header>

<div class="container">

    <h2>Form Pendaftaran</h2>

    <?php if (isset($pesan)) { ?>
        <div class="pesan">
            <?php echo $pesan; ?>
        </div>
    <?php } ?>

    <form method="post">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama">
        </div>

        <div class="form-group">
            <label>NIS</label>
            <input type="number" name="nis">
        </div>

        <div class="form-group">
            <label>Email Siswa</label>
            <input type="email" name="email">
        </div>

        <div class="form-group">
            <label>Kompetensi Keahlian / Jurusan</label>
            <div class="pilihan">
                <label><input type="radio" name="jurusan" value="SIJA"> SIJA</label>
                <label><input type="radio" name="jurusan" value="TJAT"> TJAT</label>
                <label><input type="radio" name="jurusan" value="TJA"> TJA</label>
            </div>
        </div>

        <div class="form-group">
            <label>Pilihan Perusahaan PKL</label>
            <select name="perusahaan">
                <option value="">-- Pilih Perusahaan --</option>
                <option value="Telkom Indonesia">Telkom Indonesia</option>
                <option value="PT. MKI">PT. MKI</option>
                <option value="PT. kevin irwansyah">PT. kevin irwansyah</option>
            </select>
        </div>

        <div class="form-group">
            <label>Kompetensi / Tech Stack yang Dikuasai</label>
            <div class="pilihan">
                <label><input type="checkbox" name="tech[]" value="HTML"> HTML</label>
                <label><input type="checkbox" name="tech[]" value="CSS"> CSS</label>
                <label><input type="checkbox" name="tech[]" value="PHP"> PHP</label>
                <label><input type="checkbox" name=
                "tech[]" value="MySQL"> MySQL</label>
            </div>
        </div>

        <div class="form-group">
            <label>Alasan Memilih Perusahaan</label>
            <textarea name="alasan"></textarea>
        </div>

        <button type="submit" name="submit">KIRIM PENDAFTARAN</button>

    </form>

    <?php
    if (isset($berhasil) && $berhasil == true) {
        echo '<div class="hasil">';
        echo '<h2>Data Pendaftaran</h2>';
        echo '<p><strong>Nama Lengkap:</strong> ' . $nama . '</p>';
        echo '<p><strong>NIS:</strong> ' . $nis . '</p>';
        echo '<p><strong>Email:</strong> ' . $email . '</p>';
        echo '<p><strong>Jurusan:</strong> ' . $jurusan . '</p>';
        echo '<p><strong>Perusahaan PKL:</strong> ' . $perusahaan . '</p>';
        echo '<p><strong>Kompetensi / Tech Stack:</strong> ';
        if (isset($_POST['tech'])) {
            echo implode(", ", $_POST['tech']);
        } else {
            echo "Tidak ada";
        }
        echo '</p>';
        echo '<p><strong>Alasan:</strong> ' . $alasan . '</p>';
        echo '</div>';
    }
    ?>

</div>

<footer>
    <p>&copy; 2026 Pendaftaran PKL</p>
</footer>

</body>
</html>
