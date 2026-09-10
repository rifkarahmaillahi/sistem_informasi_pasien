<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require "config/koneksi.php";

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM pasien WHERE id='$id'"
);

header("Location: pasien.php");

exit;

?>