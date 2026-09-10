<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require "config/koneksi.php";

if (isset($_POST['simpan'])) {

    $no_rm = $_POST['no_rm'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $tanggal = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    mysqli_query(
        $conn,
        "INSERT INTO pasien
        (no_rm,nama,jenis_kelamin,tanggal_lahir,alamat,telepon)

        VALUES
        ('$no_rm','$nama','$jk','$tanggal',
        '$alamat','$telepon')"
    );

    header("Location: pasien.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Tambah Pasien</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Tambah Data Pasien</h2>

<form method="POST">

<label>No Rekam Medis</label>

<input
type="text"
name="no_rm"
required
>

<label>Nama Pasien</label>

<input
type="text"
name="nama"
required
>

<label>Jenis Kelamin</label>

<select name="jenis_kelamin">

<option>Laki-laki</option>

<option>Perempuan</option>

</select>

<label>Tanggal Lahir</label>

<input
type="date"
name="tanggal_lahir"
required
>

<label>Alamat</label>

<textarea
name="alamat"
required
></textarea>

<label>No Telepon</label>

<input
type="text"
name="telepon"
required
>

<button name="simpan">
Simpan
</button>

</form>

</div>

</body>

</html>