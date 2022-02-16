<?php

include "koneksi.php";
?>

<a href="day60.php">tambah</a>
<h2>Daftar barang</h2>

<form action="search.php" method="GET">
    <input type="text" name="cari" placeholder="Cari barang">
    <input type="submit" value="cari">
</form>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($conn, "SELECT * FROM barang WHERE nama LIKE '%" . $cari . "%' ");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM barang");
    }
    $no = 1;
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
    ?> <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['total']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>"> EDIT</button></a>
                    <a onclick="return confirm('Yakin hapus data ?');" href="delete.php?id=<?php echo $data['id']; ?>"> DELETE</a>
                </td>
            </tr>

        <?php }
    } else { ?>
        <tr>Tidak ada data !!!</tr>
    <?php
    }
    ?>
    </tablebor>