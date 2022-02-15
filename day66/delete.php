<?php
include "koneksi.php";
$id = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM barang WHERE id ='$id'");

header("location:day58.php");
