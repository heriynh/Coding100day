<?php
require "ceklogin.php";
//hitung jumlah pelanggan
$h1 = mysqli_query($c, "SELECT * FROM pelanggan");
$h2 = mysqli_num_rows($h1);
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
                    <h1 class="mt-4">Data Pelanggan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jumlah Pelanggan :<?= $h2; ?></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah pelanggan
                    </button>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Barang
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $get = mysqli_query($c, "SELECT * FROM pelanggan");
                                    $i = 1;
                                    while ($p = mysqli_fetch_array($get)) {
                                        $namapelanggan = $p['namapelanggan'];
                                        $notelp = $p['notelp'];
                                        $alamat = $p['alamat'];
                                        $idpl = $p['idpelanggan'];

                                    ?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $namapelanggan; ?></td>
                                            <td><?php echo $notelp; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $idpl; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $idpl; ?>">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- The Modal Edit -->
                                        <div class="modal fade" id="edit<?php echo $idpl; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah <?php echo $namapelanggan; ?></h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="namapelanggan" class="form-control" placeholder="Nama pelanggan" value="<?= $namapelanggan; ?>">
                                                            <input type="text" name="notelp" class="form-control mt-2" placeholder="No Telp" value="<?= $notelp; ?>">
                                                            <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat" value="<?= $alamat; ?>">
                                                            <input type="hidden" name="idpl" value="<?= $idpl; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="editpelanggan">Edit pelanggan</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Modal Delete -->
                                        <div class="modal fade" id="delete<?php echo $idpl; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus <?php echo $namapelanggan; ?></h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus pelanggan ini ?
                                                            <input type="hidden" name="idpl" value="<?= $idpl; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="hapuspelanggan">Hapus pelanggan</button>
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
                <h4 class="modal-title">Tambah barang baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" name="namapelanggan" class="form-control" placeholder="Nama pelanggan">
                    <input type="text" name="notelp" class="form-control mt-2" placeholder="Nomor Telp">
                    <input type="num" name="alamat" class="form-control mt-2" placeholder="Alamat">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="tambahpelanggan">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>

</html>