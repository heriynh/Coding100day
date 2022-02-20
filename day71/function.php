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

//tambah pelanggan

if (isset($_POST['tambahpelanggan'])) {

    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($c, "INSERT INTO pelanggan (namapelanggan,notelp,alamat) VALUES ('$namapelanggan','$notelp','$alamat')");
    if ($insert) {
        header("location:pelanggan.php");
    } else {
        echo "<script>
        alert('Gagal menambah pelanggan baru');
        window.location='pelanggan.php';
        </script>";
    }
}

//tambah pesanan
if (isset($_POST['tambahpesanan'])) {

    $idpelanggan = $_POST['idpelanggan'];

    $insert = mysqli_query($c, "INSERT INTO pesanan (idpelanggan) VALUES ('$idpelanggan')");
    if ($insert) {
        header("location:index.php");
    } else {
        echo "<script>
        alert('Gagal menambah pesanan baru');
        window.location='index.php';
        </script>";
    }
}


//add produk


if (isset($_POST['addproduk'])) {

    $idproduk = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty'];

    $insert = mysqli_query($c, "INSERT INTO pesanan (idpelanggan) VALUES ('$idpelanggan')");
    if ($insert) {
        header("location:index.php");
    } else {
        echo "<script>
        alert('Gagal menambah pesanan baru');
        window.location='index.php';
        </script>";
    }
}
