<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require "config/koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM pasien"
);

$data = mysqli_fetch_assoc($query);

$total = $data['total'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="navbar">

<b>Sistem Informasi Pasien</b>

<a href="logout.php">Logout</a>

</div>

<div class="container">

<h2>Dashboard</h2>

<p>
Selamat datang,
<?php echo $_SESSION['username']; ?>
</p>

<div class="card">

<h3>Total Pasien</h3>

<h1>
<?php echo $total; ?>
</h1>

</div>

<br>

<a class="button" href="pasien.php">
Data Pasien
</a>

<a class="button" href="tambah.php">
Tambah Pasien
</a>

</div>

</body>

</html>