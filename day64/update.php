<?php
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

mysqli_query($conn, "UPDATE barang SET nama='$nama', harga='$harga',jumlah='$jumlah',total='$total' WHERE id='$id'");
header("location:day58.php");

// if ($result) {
//     echo "<script>
//     alert('data berhasil disimpan');
//     window.location='day58.php';
//     </script>";
// } else {

//     echo "<script>
//     alert('data gagal disimpan');
//     window.location='edit.php';
//     </script>";
// }
