<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require "config/koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM pasien ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Data Pasien</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="navbar">

<b>Sistem Informasi Pasien</b>

<a href="dashboard.php">
Dashboard
</a>

</div>

<div class="container">

<h2>Data Pasien</h2>

<a class="button" href="tambah.php">
+ Tambah Pasien
</a>

<br><br>

<table>

<tr>

<th>No</th>
<th>No RM</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>Tanggal Lahir</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Aksi</th>

</tr>

<?php

$no = 1;

while ($data = mysqli_fetch_assoc($query)) {

?>

<tr>

<td>
<?php echo $no++; ?>
</td>

<td>
<?php echo $data['no_rm']; ?>
</td>

<td>
<?php echo $data['nama']; ?>
</td>

<td>
<?php echo $data['jenis_kelamin']; ?>
</td>

<td>
<?php echo $data['tanggal_lahir']; ?>
</td>

<td>
<?php echo $data['alamat']; ?>
</td>

<td>
<?php echo $data['telepon']; ?>
</td>

<td>

<a href="edit.php?id=<?php echo $data['id']; ?>">
Edit
</a>

|

<a
href="hapus.php?id=<?php echo $data['id']; ?>"
onclick="return confirm('Hapus data?')"
>
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>