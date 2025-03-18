<?php

include '../koneksi.php';
session_start();
if (!isset($_SESSION['loginpa'])) {
    header('Location: login_petugas.php');
}
?>

<<!DOCTYPE html>
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
                    <a href="dashboard_pa01.php">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <?php
                if ($_SESSION['level'] == 'admin') {
                    ?>

                <li class="menu-label">Menu Utama</li>
                <li>
                    <a href="rak.php">
                        <div class="parent-icon icon-color-2"><i class="bx bx-columns"></i></div>
                        <div class="menu-title">Rak</div>
                    </a>
                </li>
                <li>
                    <a href="kategori.php">
                        <div class="parent-icon icon-color-3"><i class="bx bx-book"></i></div>
                        <div class="menu-title">Kategori</div>
                    </a>
                </li>
                <li>
                    <a href="buku.php">
                        <div class="parent-icon icon-color-4"><i class="bx bx-book-open"></i></div>
                        <div class="menu-title">Buku</div>
                    </a>
                </li>
                <li>
                    <a href="kelola_pinjam.php">
                        <div class="parent-icon icon-color-5"><i class="bx bx-message-square-add"></i></div>
                        <div class="menu-title">Kelola Pinjam</div>
                    </a>
                </li>
                <li>
                    <a href="kelola_kembali.php">
                        <div class="parent-icon icon-color-6"><i class="bx bx-message-square-check"></i></div>
                        <div class="menu-title">Kelola Kembali</div>
                    </a>
                </li>
                <li>
                    <a href="kelola_petugas.php">
                        <div class="parent-icon icon-color-7"><i class="bx bx-id-card"></i></div>
                        <div class="menu-title">Kelola Petugas</div>
                    </a>
                </li>
                <li>
                    <a href="laporan.php">
                        <div class="parent-icon icon-color-8"><i class="bx bx-file"></i></div>
                        <div class="menu-title">Laporan</div>
                    </a>
                </li>
                <?php } else { ?>
                    <li class="menu-label">Menu Utama</li>
                <li>
                    <a href="rak.php">
                        <div class="parent-icon icon-color-2"><i class="bx bx-columns"></i></div>
                        <div class="menu-title">Rak</div>
                    </a>
                </li>
                <li>
                    <a href="kategori.php">
                        <div class="parent-icon icon-color-3"><i class="bx bx-book"></i></div>
                        <div class="menu-title">Kategori</div>
                    </a>
                </li>
                <li>
                    <a href="buku.php">
                        <div class="parent-icon icon-color-4"><i class="bx bx-book-open"></i></div>
                        <div class="menu-title">Buku</div>
                    </a>
                </li>
                <li>
                    <a href="kelola_pinjam.php">
                        <div class="parent-icon icon-color-5"><i class="bx bx-message-square-add"></i></div>
                        <div class="menu-title">Kelola Pinjam</div>
                    </a>
                </li>
                <li>
                    <a href="kelola_kembali.php">
                        <div class="parent-icon icon-color-6"><i class="bx bx-message-square-check"></i></div>
                        <div class="menu-title">Kelola Kembali</div>
                    </a>
                </li>
                <?php } ?>

                </li>

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
                                        <p class="user-name mb-0"><?php echo $_SESSION['nama_petugas']; ?></p>
                                        <p class="designattion mb-0"><?php echo $_SESSION['level']; ?></p>
                                                  
                                    </div>
                                    <img src="../assets/images/michie.jpg" class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="box-shadow:0px 0px 20px red;">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center text-danger" href="logoutpa.php"><i
                                        class="bx bx-power-off fs-5 fw-bold"></i><span class="fw-bold">Logout</span></a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>
            <!--end header-->
            <!--page-wrapper-->
            <div class="page-wrapper">
                <!--page-content-wrapper-->
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="mb-0 bg-primary text-center text-light">Data Peminjaman
                                                    </h4>
                                                    <a href="cetak_laporan.php" class="btn btn-success">Unduh Data</a>

                                                </div>
                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Pengguna</th>
                                                                <th>Judul Buku</th>
                                                                <th>Tanggal Pinjam</th>
                                                                <th>Tanggal kembali</th>
                                                                <th>Nama Petugas</th>
                                                                <th>Status Pinjam</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                        $no = 1;
                                                        $query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.judul, buku.gambar, petugas.nama_petugas, pengguna.nama_pengguna,
                                                        pengguna.alamat, pengguna.email, rak.nama_rak, kategori.nama_kategori, pengembalian.tgl_kembali FROM peminjaman
                                                        INNER JOIN buku ON peminjaman.id_buku = buku.id
                                                        INNER JOIN petugas ON peminjaman.id_petugas = petugas.id
                                                        INNER JOIN pengguna ON peminjaman.id_pengguna = pengguna.id
                                                        INNER JOIN pengembalian ON pengembalian.id_peminjaman = peminjaman.id
                                                        INNER JOIN kategori ON buku.id_kategori = kategori.id
                                                        INNER JOIN rak ON buku.id_rak = rak.id
                                                        WHERE peminjaman.status != 'pinjam'
                                                        ORDER BY peminjaman.id DESC");
                                                        while ($data = mysqli_fetch_assoc($query)) :
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>
                                                                <td><?php echo $data['nama_pengguna'] ?></td>
                                                                <td><?php echo $data['judul'] ?></td>
                                                                <td><?php echo $data['tgl_pinjam'] ?></td>
                                                                <td><?php echo $data['tgl_kembali'] ?></td>
                                                                <td><?php echo $data['nama_petugas'] ?></td>
                                                                <?php if ($data['status'] == 'kembali') { ?>
                                                                <td>
                                                                    <a
                                                                        class="btn btn-success btn-sm"><?php echo $data['status'] ?></a>
                                                                </td>
                                                                <?php } else { ?>
                                                                <td>
                                                                    <span
                                                                        class="btn btn-danger btn-sm"><?php echo $data['status'] ?></span>
                                                                </td>
                                                                <?php } ?>
                                                                <td>
                                                                    <a href="" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modaldetaillaporan<?php echo $data['id'] ?>"
                                                                        tabindex="-1" aria-hidden="true">Detail</a>
                                                                </td>
                                                            </tr>
                                                            <div class="col-12">



                                                                <!-- Modal detai laporan-->
                                                                <div class="modal fade"
                                                                    id="modaldetaillaporan<?php echo $data['id'] ?>"
                                                                    tabindex="-1" aria-hidden="true">
                                                                    <div
                                                                        class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <!-- Menggunakan modal-lg untuk ukuran yang lebih besar -->
                                                                        <div class="modal-content">
                                                                            <div
                                                                                class="modal-header bg-primary text-white">
                                                                                <!-- Header dengan background biru -->
                                                                                <h5 class="modal-title">Detail Laporan
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <!-- Informasi Buku -->
                                                                                    <div class="col-md-4">
                                                                                        <h6><strong>Informasi
                                                                                                Buku</strong></h6>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Judul</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['judul'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                for="">Gambar</label><br>
                                                                                            <a href="../assets/images/<?php echo $data['gambar'] ?>"
                                                                                                target="_blank">
                                                                                                <img src="../assets/images/<?php echo $data['gambar'] ?>"
                                                                                                    class="img-thumbnail"
                                                                                                    alt="Gambar Buku"
                                                                                                    width="80"
                                                                                                    height="120">
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label
                                                                                                for="">Kategori</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['nama_kategori'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Nama
                                                                                                Rak</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['nama_rak'] ?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Informasi Peminjam -->
                                                                                    <div class="col-md-4">
                                                                                        <h6><strong>Informasi
                                                                                                Peminjam</strong></h6>
                                                                                        <div class="mb-2">
                                                                                            <label
                                                                                                for="">Pengguna</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['nama_pengguna'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Email</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['email'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Alamat</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['alamat'] ?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Informasi Transaksi -->
                                                                                    <div class="col-md-4">
                                                                                        <h6><strong>Informasi
                                                                                                Transaksi</strong></h6>
                                                                                        <div class="mb-2">
                                                                                            <label
                                                                                                for="">Petugas</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['nama_petugas'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Tanggal
                                                                                                Pinjam</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['tgl_pinjam'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Tanggal
                                                                                                Kembali</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['tgl_kembali'] ?>">
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="">Status
                                                                                                Pinjam</label>
                                                                                            <input type="text" disabled
                                                                                                class="form-control"
                                                                                                value="<?php echo $data['status'] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-danger"
                                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php endwhile; ?>



                                                                <!-- End Data Table -->
                                                            </div>
                                                </div>

                                                <!-- End Data Table -->
                                            </div>
                                        </div>
                                        <!--end page-content-wrapper-->
                                    </div>

                                    <!--end row-->
                                    <!--end page-content-wrapper-->
                                </div>
                                <!--end page-wrapper-->
                                <!--start overlay-->
                                <div class="overlay toggle-btn-mobile"></div>
                                <!--end overlay-->
                                <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                                        class='bx bxs-up-arrow-alt'></i></a>
                                <!--End Back To Top Button-->
                                <!--footer -->
                                <div class="footer">
                                    <p class="mb-0">Jagung @2024 | Developed By : <a
                                            href="https://themeforest.net/user/codervent" target="_blank">codervent</a>
                                    </p>
                                </div>
                                <!-- end footer -->
                            </div>
                            <!-- end wrapper -->
                            <!--end switcher-->
                            <!-- JavaScript -->

                            <!-- Bootstrap JS -->
                            <script src="../assets/js/bootstrap.bundle.min.js"></script>

                            <!--plugins-->
                            <script src="../assets/js/jquery.min.js"></script>
                            <script src="../a../ssets/plugins/simplebar/js/simplebar.min.js"></script>
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
                            <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
                            <script src="../assets/responsive/js/dataTables.responsive.min.js"></script>
                            <script src="../assets/js/index.js"></script>
                            <!-- App JS -->
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
                                    $('#example2').DataTable();
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