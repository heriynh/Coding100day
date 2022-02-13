<?php
include "koneksi.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$cek = mysqli_num_rows($result);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);
}
?>
<table>
    <form action="update.php" method="post">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            <td><input type="hidden" name="id" value="<?php echo $data['id']; ?>"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>"></td>
        </tr>
        <tr>
            <td>total</td>
            <td><input type="text" name="total" value="<?php echo $data['total']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Update"></td>
        </tr>
    </form>
</table>