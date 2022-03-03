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

    //hitung stock yang ada
    $hitung1 = mysqli_query($c, "SELECT * FROM produk WHERE idproduk ='$idproduk'");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['stock'];

    if ($stocksekarang >= $qty) {

        //kurangi stock
        $selisih = $stocksekarang - $qty;

        //stock cukup
        $insert = mysqli_query($c, "INSERT INTO detailpesanan (idpesanan, idproduk, qty) VALUES ('$idp','$idproduk','$qty')");
        $update = mysqli_query($c, "UPDATE produk SET stock = '$selisih' WHERE idproduk='$idproduk' ");
        if ($insert && $update) {
            header("location: view.php?idp=" . $idp);
        } else {
            echo "<script>
            alert('Gagal menambah pesanan baru');
            window.location.href='view.php?idp=", $idp, " ';
            </script>";
        }
    } else {
        //stock tidak cukup
        echo "<script>
        alert('Stock tidak cukup');
        window.location.href='view.php?idp=", $idp, " ';
        </script>";
    }
}


//menembah barang masuk
if (isset($_POST['barangmasuk'])) {
    $idproduk = $_POST['idproduk'];
    $qty = $_POST['qty'];

    //cari tahu stock sekarang berapa
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idproduk'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    //stock sekarang
    $newstock = $stocksekarang + $qty;

    $insertb = mysqli_query($c, "INSERT INTO masuk (idproduk,qty) VALUES ('$idproduk','$qty')");
    $updatetb = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idproduk'");

    if ($insertb && $updatetb) {
        header("location:masuk.php");
    } else {
        echo "<script>
        alert('Gagal');
        window.location.href='masuk.php';
        </script>";
    }
}

//hapusprodukpesanan
if (isset($_POST['hapusprodukpesanan'])) {
    $idp = $_POST['idp'];
    $idpr = $_POST['idpr'];
    $idorder = $_POST['idorder'];

    //cek qty sekarang
    $cek1 = mysqli_query($c, "SELECT * FROM detailpesanan WHERE iddetailpesanan");
    $cek2 = mysqli_fetch_array($cek1);
    $qtysekarang = $cek2['qty'];

    //cek stock sekarang
    $cek3 = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idpr'");
    $cek4 = mysqli_fetch_array($cek3);
    $stocksekarang = $cek4['stock'];


    $hitung = $stocksekarang + $qtysekarang;

    $update = mysqli_query($c, "UPDATE produk  SET stock='$hitung' WHERE idproduk='$idpr'"); //update stock
    $hapus = mysqli_query($c, "DELETE fROM detailpesanan WHERE idproduk='$idpr' AND iddetailpesanan='$idp'");

    if ($update && $hapus) {
        header("location: view.php?idp=" . $idorder);
    } else {
        echo "<script>
        alert('Gagal menghapus barang');
        window.location.href='view.php?idp=", $idorder, " ';
        </script>";
    }
}

//Edit barang

if (isset($_POST['editbarang'])) {
    $np = $_POST['namaproduk'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $idp = $_POST['idp'];

    $query = mysqli_query($c, "UPDATE produk SET namaproduk='$np', deskripsi='$desc', harga='$harga' WHERE idproduk='$idp'");
    if ($query) {
        header("location:stock.php");
    } else {
        echo "<script>
        alert('Gagal Edit barang');
        window.location.href='stock.php';
        </script>";
    }
}


//Delete barang

if (isset($_POST['hapusbarang'])) {
    $idp = $_POST['idp'];

    $query = mysqli_query($c, "DELETE FROM produk WHERE idproduk='$idp'");
    if ($query) {
        header("location:stock.php");
    } else {
        echo "<script>
        alert('Gagal Edit barang');
        window.location.href='stock.php';
        </script>";
    }
}

//Edit pelanggan

if (isset($_POST['editpelanggan'])) {
    $np = $_POST['namapelanggan'];
    $nt = $_POST['notelp'];
    $a = $_POST['alamat'];
    $id = $_POST['idpl'];

    $query = mysqli_query($c, "UPDATE pelanggan SET namapelanggan='$np', notelp='$nt', alamat='$a' WHERE idpelanggan='$id'");
    if ($query) {
        header("location:pelanggan.php");
    } else {
        echo "<script>
        alert('Gagal Edit pelanggan');
        window.location.href='pelanggan.php';
        </script>";
    }
}

//Delete pelanggan

if (isset($_POST['hapuspelanggan'])) {
    $id = $_POST['idpl'];

    $query = mysqli_query($c, "DELETE FROM pelanggan WHERE idpelanggan='$id'");
    if ($query) {
        header("location:pelanggan.php");
    } else {
        echo "<script>
        alert('Gagal Edit barang');
        window.location.href='pelanggan.php';
        </script>";
    }
}

//e4dit data barang masuk

if (isset($_POST['editdatabarangmasuk'])) {
    $qty = $_POST['qty'];
    $idm = $_POST['idm'];
    $idp = $_POST['idp'];

    //cari tau qty sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM masuk WHERE idmasuk='$idm'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['qty'];

    //cari tahu stock sekarang berapa
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idp'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    if ($qty >= $qtysekarang) {
        # kalau inputan user lebih besar
        $selisih = $qty - $qtysekarang;
        $newstock = $stocksekarang + $selisih;

        $query1 = mysqli_query($c, "UPDATE masuk SET qty='$qty' WHERE idmasuk='$idm'");
        $query2 = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idp'");

        if ($query1 &&  $query2) {
            header("location:masuk.php");
        } else {
            echo "<script>
            alert('Gagal');
            window.location.href='masuk.php';
            </script>";
        }
    } else {
        //kalau lebih kecil
        //hitung selisih
        $selisih = $qtysekarang - $qty;
        $newstock = $stocksekarang - $selisih;

        $query1 = mysqli_query($c, "UPDATE masuk SET qty='$qty' WHERE idmasuk='$idm'");
        $query2 = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idp'");

        if ($query1 &&  $query2) {
            header("location:masuk.php");
        } else {
            echo "<script>
            alert('Gagal');
            window.location.href='masuk.php';
            </script>";
        }
    }
}

//hapus data barang masuk
if (isset($_POST['hapusdatabarangmasuk'])) {
    $idm = $_POST['idm'];
    $idp = $_POST['idp'];

    //cari tau qty sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM masuk WHERE idmasuk='$idm'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['qty'];

    //cari tahu stock sekarang berapa
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idp'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    //hitung selisih
    $newstock = $stocksekarang - $qtysekarang;

    $query1 = mysqli_query($c, "DELETE FROM masuk WHERE idmasuk='$idm'");
    $query2 = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idp'");

    if ($query1 &&  $query2) {
        header("location:masuk.php");
    } else {
        echo "<script>
     alert('Gagal');
     window.location.href='masuk.php';
     </script>";
    }
}

//hapus ordeer
if (isset($_POST['hapusorder'])) {
    $ido = $_POST['ido'];

    $cekdata = mysqli_query($c, "SELECT * FROM detailpesanan dp WHERE idpesanan='$ido'");
    while ($ok = mysqli_fetch_array($cekdata)) {

        //balikin stock
        $qty = $ok['qty'];
        $idproduk = $ok['idproduk'];
        $iddp = $ok['iddetailpesanan'];

        //cari tahu stock sekarang berapa
        $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idproduk'");
        $caristock2 = mysqli_fetch_array($caristock);
        $stocksekarang = $caristock2['stock'];

        $newstock = $stocksekarang + $qty;

        $queryupdate = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idproduk'");

        //hapus data
        $querydelete = mysqli_query($c, "DELETE FROM detailpesanan WHERE iddetailpesanan='$iddp'");
    }

    $query = mysqli_query($c, "DELETE FROM pesanan WHERE idpesanan='$ido'");
    if ($queryupdate && $queryupdate && $query) {
        header("location:index.php");
    } else {
        echo "<script>
        alert('Gagal hapus pesanan');
        window.location.href='index.php';
        </script>";
    }
}

//edit data detail pesanan

if (isset($_POST['editdetail'])) {
    $qty = $_POST['qty'];
    $iddp = $_POST['iddp'];
    $idpr = $_POST['idpr'];
    $idp = $_POST['idp'];

    //cari tau qty sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM detailpesanan WHERE iddetailpesanan='$iddp'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['qty'];

    //cari tahu stock sekarang berapa
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idpr'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];


    if ($qty >= $qtysekarang) {
        # kalau inputan user lebih besar
        $selisih = $qty - $qtysekarang;
        $newstock = $stocksekarang - $selisih;

        $query1 = mysqli_query($c, "UPDATE detailpesanan SET qty='$qty' WHERE iddetailpesanan='$iddp'");
        $query2 = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idpr'");

        if ($query1 &&  $query2) {
            header("location:view.php?idp=" . $idp);
        } else {
            echo "<script>
            alert('Gagal');
            window.location.'view.php?idp=" . $idp . "'
            </script>";
        }
    } else {
        //kalau lebih kecil
        //hitung selisih
        $selisih = $qtysekarang - $qty;
        $newstock = $stocksekarang + $selisih;

        $query1 = mysqli_query($c, "UPDATE detailpesanan SET qty='$qty' WHERE iddetailpesanan='$iddp'");
        $query2 = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idpr'");

        if ($query1 &&  $query2) {
            header("location:view.php?idp=" . $idp);
        } else {
            echo "<script>
            alert('Gagal');
            window.location.href='view.php?idp=" . $idp . "'
            </script>";
        }
    }
}
