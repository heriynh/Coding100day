<?php
include "koneksi.php";

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

mysqli_query($conn, "INSERT INTO barang VALUES ('','$nama','$harga','$jumlah','$total')");
header("location:day58.php");
