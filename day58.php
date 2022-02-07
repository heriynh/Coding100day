<?php

$conn = mysqli_connect("localhost", "root", "", "penjualan");
?>

<h2>Daftar barang</h2>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
    <?php
    $no = 0;
    $result = mysqli_query($conn, "SELECT * FROM barang");
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['total']; ?></td>
            </tr>

        <?php }
    } else { ?>
        <tr>Tidak ada data !!!</tr>
    <?php
    }
    ?>
    </tablebor>