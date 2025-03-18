<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}

$id_pengguna_ses = $_SESSION['id'];

$data1 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_pengguna = '$id_pengguna_ses' AND status = 'pinjam'");
$jmlpinjam = mysqli_num_rows($data1);

$data2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_pengguna = '$id_pengguna_ses' AND status = 'kembali'");
$jmlkembali = mysqli_num_rows($data2);

$data3 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_pengguna = '$id_pengguna_ses' AND status = 'hilang'");
$jmlhilang = mysqli_num_rows($data3);

$data4 = mysqli_query($koneksi, "SELECT * FROM koleksi_pribadi WHERE id_pengguna = '$id_pengguna_ses'");
$jmlkoleksi = mysqli_num_rows($data4);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Projek Jagung</title>
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!-- Vector CSS -->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!--plugins-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="../assets/css/app.css" />
    <link rel="stylesheet" href="../assets/css/dark-sidebar.css" />
    <link rel="stylesheet" href="../assets/css/dark-theme.css" />
    <!-- DataTable CSS -->
    <link href="../assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <style>
        .card {
            box-shadow: 0px 0px 10px black;
        }

        #content {
            transition: margin-left 0.3s;
        }

        .sidebar-collapsed #content {
            margin-left: 0;
            /* Sesuaikan dengan lebar sidebar yang menyusut */
        }

        #content .page-content .col-12 {
            transition: width 0.3s;
        }

        .sidebar-collapsed #content .page-content .col-12 {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true" id="sidebar">
            <div class="sidebar-header">
                <div class="img-fluid">
                    <img src="../assets/images/knjt.png" class="logo-icon-2 w-75" alt="IF-PERPUS" />
                </div>
                <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i></a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard.php">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">Menu Utama</li>
                <li>
                    <a href="buku.php">
                        <div class="parent-icon icon-color-2"><i class="bx bx-columns"></i></div>
                        <div class="menu-title">Buku</div>
                    </a>
                </li>
                <li>
                    <a href="koleksi_buku.php">
                        <div class="parent-icon icon-color-3"><i class="bx bx-book"></i></div>
                        <div class="menu-title">Koleksi Buku</div>
                    </a>
                </li>
                <li>
                    <a href="ulasan.php">
                        <div class="parent-icon icon-color-4"><i class="bx bx-book-open"></i></div>
                        <div class="menu-title">Ulasan</div>
                    </a>
                </li>
                <li>
                    <a href="riwayat.php">
                        <div class="parent-icon icon-color-5"><i class="bx bx-message-square-add"></i></div>
                        <div class="menu-title">Riwayat</div>
                    </a>
                </li>
                <a href="chatai.php">
                    <div class="parent-icon icon-color-5"><i class="lni lni-reddit"></i></i></div>
                    <div class="menu-title">Tanya Bot</div>
                </a>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->
        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <ul class="list-unstyled ms-auto" style="margin-top: -.5rem;">
                    <li class="nav-item dropdown dropdown-user-profile">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="d-flex user-box align-items-center">
                                <div class="user-info">
                                    <p class="user-name mb-0"><?= $_SESSION['nama_pengguna']; ?></p>
                                    <p> Pengguna </p>
                                </div>
                                <img src="../assets/images/michie.jpg" class="user-img" alt="user avatar">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="box-shadow:0px 0px 20px red;">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center text-danger" href="../logout.php"><i
                                    class="bx bx-power-off fs-5 fw-bold"></i><span class="fw-bold">Logout</span></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper" id="content">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <div class="card radius-15 overflow-hidden">
                                        <div class="card-body bg-primary">
                                            <div class=" text-center">
                                                <h4 class="mb-5 mt-2 font-weight-bold">4</h4>
                                                <h5 class="mb-3">Jumlah Pinjam</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="card radius-15 overflow-hidden">
                                        <div class="card-body bg-warning">
                                            <div class=" text-center">
                                                <h4 class="mb-5 mt-2 font-weight-bold">4</h4>
                                                <h5 class="mb-3">Jumlah Kembali</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="card radius-15 overflow-hidden">
                                        <div class="card-body bg-danger">
                                            <div class=" text-center">
                                                <h4 class="mb-5 mt-2 font-weight-bold">4</h4>
                                                <h5 class="mb-3">Jumlah Buku Hilang</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="card radius-15 overflow-hidden">
                                        <div class="card-body bg-secondary">
                                            <div class=" text-center">
                                                <h4 class="mb-5 mt-2 font-weight-bold">4</h4>
                                                <h5 class="mb-3">Jumlah Koleksi</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <!-- Data Table -->
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h4 class="mb-0">Data Peminjaman</h4>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>tanggal pinjam</th>
                                                            <th>Nama Petugas</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                            $no = 1;
                                            $id_pengguna_ses = $_SESSION['id'];
                                            $query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.judul, buku.gambar, rak.nama_rak, kategori.nama_kategori, petugas.nama_petugas, pengguna.nama_pengguna FROM peminjaman
                                            INNER JOIN buku ON peminjaman.id_buku = buku.id
                                            INNER JOIN rak ON buku.id_rak = rak.id
                                            INNER JOIN kategori ON buku.id_kategori = kategori.id
                                            INNER JOIN petugas ON peminjaman.id_petugas = petugas.id
                                            INNER JOIN pengguna ON peminjaman.id_pengguna = pengguna.id WHERE peminjaman.status = 'pinjam'
                                            AND peminjaman.id_pengguna = '$id_pengguna_ses'
                                            ORDER BY peminjaman.id DESC");
                                            while ($data = mysqli_fetch_assoc($query)) :
                                                ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $data['judul']; ?></td>
                                                            <td><?php echo $data['tgl_pinjam']?></td>
                                                            <td><?php echo $data['nama_petugas']?></td>

                                                        </tr>
                                                        <?php endwhile ?>
                                                        <!-- Data goes here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- table 2-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h4 class="mb-0">Data Booking</h4>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul Buku</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
							$no = 1;
							$query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.judul, pengguna.nama_pengguna
								FROM peminjaman
								INNER JOIN buku ON peminjaman.id_buku = buku.id 
								INNER JOIN pengguna ON peminjaman.id_pengguna = pengguna.id
								WHERE peminjaman.status = 'pinjam'
								AND peminjaman.id_petugas IS NULL 
								AND pengguna.id = '$id_pengguna_ses'
								ORDER BY peminjaman.id DESC");
							
							while ($data = mysqli_fetch_assoc($query)):
							?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $data['judul']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#hapusBuku<?php echo $data['id']; ?>">hapus</a>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal Hapus -->
                                                        <!-- Modal Hapus Buku -->
                                                        <div class="modal fade" id="hapusBuku<?php echo $data['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Card with shadow and rounded borders -->
            <form action="crud_booking.php" method="post">
                <div class="card border-0 shadow-lg rounded-lg">
                    <div class="card-body text-center p-4">
                        <!-- Hidden fields for ID and old image -->
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $data['id']; ?>">

                        <!-- Icon at the top -->
                        <div class="mb-3">
                            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
                        </div>

                        <!-- Title with bold text -->
                        <h5 class="card-title mb-3 font-weight-bold">Konfirmasi Penghapusan</h5>
                        
                        <!-- Confirmation message with colored book title -->
                        <p>Apakah Anda yakin akan menghapus data buku <span class="text-danger font-weight-bold"><?php echo $data['judul']; ?></span>?</p>
                    </div>

                    <!-- Footer with action buttons -->
                    <div class="card-footer d-flex justify-content-center border-top-0 p-3">
                        <!-- Cancel button with light color and padding -->
                        <button type="button" class="btn btn-light border me-2 px-4 py-2" data-bs-dismiss="modal">Batal</button>
                        <!-- Delete button with danger color and shadow -->
                        <button type="submit" name="btnHapus" class="btn btn-danger px-4 py-2 shadow-sm">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


                                                        <!-- End of Modal Hapus -->
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end table 2-->
                        </div>
                    </div>
                    <!-- End Data Table -->
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">Kelompok 1 @2024 | Developed By : <a href="https://themeforest.net/user/codervent"
                    target="_blank">codervent</a></p>
        </div>
        <!-- end footer -->
    </div>
    <!-- end wrapper -->

    <!-- JavaScript -->
    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
    <script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="../assets/js/index.js"></script>
    <!--Data Tables js-->
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle sidebar on menu button click
            $('.toggle-btn').click(function () {
                $('.wrapper').toggleClass('sidebar-collapsed');
                adjustContentWidth();
            });

            // Initialize DataTables
            $('#example').DataTable();
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'print', 'colvis']
            });
            table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });

        function adjustContentWidth() {
            if ($('.wrapper').hasClass('sidebar-collapsed')) {
                $('#content .page-content .col-12').css('width', '100%');
            } else {
                $('#content .page-content .col-12').css('width', '');
            }
        }
    </script>
    <!-- App JS -->
    <script src="../assets/js/app.js"></script>
    <script>
        new PerfectScrollbar('.dashboard-social-list');
        new PerfectScrollbar('.dashboard-top-countries');
    </script>
</body>

</html>