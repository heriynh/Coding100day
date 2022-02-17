<?php
session_start();

//koneksi
$c = mysqli_connect("localhost", "root", "", "kasir");

//login
if (isset($_POST['login'])) {
    //initiative variabel
    $username = $_POST['username'];
    $password = $_POST['password'];


    $cek = mysqli_query($c, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung > 0) {
        //data berhasil ditemukan berhasil logn

        $_SESSION['login'] = 'true';
        header("location:index.php");
    } else {
        //data tidak ditemukan gagal login
        echo "<script>
        alert('Username atau password salah');
        window.location='login.php';
        
        </script>";
    }
}

//tambah barang

if (isset($_POST['tambahbarang'])) {
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($c, "INSERT INTO produk (namaproduk,deskripsi,harga,stock) VALUES ('$namaproduk','$deskripsi','$harga','$stock')");
    if ($insert) {
        header("location:stock.php");
    } else {
        echo "<script>
        alert('Gagal menambah barang baru');
        window.location='stock.php';
        </script>";
    }
}
