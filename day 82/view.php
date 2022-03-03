<?php
require "function.php";

if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];

    $ambilnamapelanggan = mysqli_query($c, "SELECT * FROM pesanan p, pelanggan pl WHERE p.idpelanggan = pl.idpelanggan AND p.idpesanan = '$idp' ");
    $np = mysqli_fetch_array($ambilnamapelanggan);
    $namapel = $np['namapelanggan'];
} else {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Stock Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Kasir</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Order
                        </a>
                        <a class="nav-link" href="stock.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stock barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang masuk
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Pelanggan
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Pesanan : <?php echo $idp; ?></h1>
                    <h1 class="mt-4">Nama pelangan : <?php echo $namapel; ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Barang
                    </button>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Pesanan
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga satuan</th>
                                        <th>Jumlah</th>
                                        <th>Sub-total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $get = mysqli_query($c, "SELECT * FROM detailpesanan p, produk pr WHERE p.idproduk=pr.idproduk AND idpesanan='$idp'");
                                    while ($p = mysqli_fetch_array($get)) {
                                        $idpr = $p['idproduk'];
                                        $iddp = $p['iddetailpesanan'];
                                        $qty = $p['qty'];
                                        $harga = $p['harga'];
                                        $namaproduk = $p['namaproduk'];
                                        $desc = $p['deskripsi'];
                                        $subtotal = $qty * $harga;

                                    ?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $namaproduk; ?></td>
                                            <td><?php echo $desc; ?></td>
                                            <td>Rp<?php echo number_format($harga); ?>
                                            <td><?php echo number_format($qty); ?></td>
                                            <td>Rp<?php echo number_format($subtotal); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#edit<?php echo $idpr; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger mb-4" data-bs-toggle="modal" data-bs-target="#delete<?php echo $idpr; ?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- The Modal Edit -->
                                        <div class="modal fade" id="edit<?php echo $idpr ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah data detail pesanan <?php echo $namaproduk ?></h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="namaproduk" class="form-control" placeholder="Nama produk" value="<?php echo $namaproduk; ?> : <?php echo $desc; ?>" disabled>
                                                            <input type="number" name="qty" class="form-control mt-2" placeholder="Harga produk" value="<?= $qty; ?>">
                                                            <input type="hidden" name="iddp" value="<?= $iddp; ?>">
                                                            <input type="hidden" name="idpr" value="<?= $idpr; ?>">
                                                            <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="editdetail">Edit detail pesanan</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="delete<?php echo $idpr; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Apakah anda yakin ingin menghapus barang ini </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus barang ini
                                                            <input type="hidden" name="idp" value="<?= $iddp; ?>">
                                                            <input type="hidden" name="idpr" value="<?= $idpr; ?>">
                                                            <input type="hidden" name="idorder" value="<?= $idp; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="hapusprodukpesanan">Ya</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">

                <!-- Modal body -->
                <div class="modal-body">
                    Pilih Barang
                    <select name="idproduk" class="form-control">
                        <?php
                        $getproduk = mysqli_query($c, "SELECT * FROM produk WHERE idproduk NOT IN (SELECT idproduk FROM detailpesanan WHERE idpesanan='$idp')");
                        while ($p = mysqli_fetch_array($getproduk)) {
                            $namaproduk = $p['namaproduk'];
                            $stock = $p['stock'];
                            $deskripsi = $p['deskripsi'];
                            $idproduk = $p['idproduk'];
                        ?>
                            <option value="<?= $idproduk; ?>"> <?= $namaproduk; ?> - <?= $deskripsi; ?> - <?= $stock; ?> </option>

                        <?php } ?>
                    </select>
                    <input type="number" name="qty" class="form-control mt-4" placeholder="Jumlah" min="1" required>
                    <input type="hidden" name="idp" value="<?= $idp; ?>">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="addproduk">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>

</html>