<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require "config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM pasien WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $no_rm = $_POST['no_rm'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $tanggal = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    mysqli_query(
        $conn,
        "UPDATE pasien SET

        no_rm='$no_rm',
        nama='$nama',
        jenis_kelamin='$jk',
        tanggal_lahir='$tanggal',
        alamat='$alamat',
        telepon='$telepon'

        WHERE id='$id'"
    );

    header("Location: pasien.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Pasien</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="container">

<h2>Edit Data Pasien</h2>

<form method="POST">

<label>No Rekam Medis</label>

<input
type="text"
name="no_rm"
value="<?php echo $data['no_rm']; ?>"
>

<label>Nama</label>

<input
type="text"
name="nama"
value="<?php echo $data['nama']; ?>"
>

<label>Jenis Kelamin</label>

<select name="jenis_kelamin">

<option>
Laki-laki
</option>

<option>
Perempuan
</option>

</select>

<label>Tanggal Lahir</label>

<input
type="date"
name="tanggal_lahir"
value="<?php echo $data['tanggal_lahir']; ?>"
>

<label>Alamat</label>

<textarea name="alamat"><?php echo $data['alamat']; ?></textarea>

<label>Telepon</label>

<input
type="text"
name="telepon"
value="<?php echo $data['telepon']; ?>"
>

<button name="update">
Update
</button>

</form>

</div>

</body>

</html>