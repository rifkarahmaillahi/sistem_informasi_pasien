<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "sitem_informasi_pasien";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if (!$conn) {
    die("Koneksi database gagal");
}

?>