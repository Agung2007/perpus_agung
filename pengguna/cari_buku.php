<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Syndash - Bootstrap4 Admin Template</title>
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
                    <img src="../assets/images/knjt.png" class="logo-icon-2 w-75" alt="knjt.png" />
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
                                    <p class="user-name mb-0"><?php echo $_SESSION['nama_pengguna']; ?></p>
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
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <form action="cari_buku.php" method="get">
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="Silahkan cari judul buku"
                                        name="cari">
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="btn btn-success btn-md" value="Cari">
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
                    $cek_idp = $_SESSION['id'];

                    if ($koneksi === false) {
                        die("koneksi gagal: " . mysqli_connect_error());
                    }

                    $query = mysqli_query($koneksi, "SELECT buku.id, buku.judul, buku.penulis, buku.penerbit, buku.tahun,
            buku.gambar, kategori.nama_kategori, rak.nama_rak, AVG(ulasan_buku.rating) AS rating
            FROM buku
            LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.id_buku
            INNER JOIN kategori ON buku.id_kategori = kategori.id
            INNER JOIN rak ON buku.id_rak = rak.id
            WHERE buku.judul LIKE '%" . mysqli_real_escape_string($koneksi, $cari) . "%'
            GROUP BY buku.id, buku.judul, buku.penulis, buku.penerbit, buku.tahun, buku.gambar, kategori.nama_kategori, rak.nama_rak");

                    if ($query === false) {
                        die("Query gagal: " . mysqli_error($koneksi));
                    }

                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) :

                    ?>

                    <div class="col-4">
                        <div class="card mt-2 ms-2">
                            <img src="../assets/images/<?php echo $data['gambar']; ?>" class="card-img-top" width="100"
                                height="500">
                            <div class="card-body">
                                <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahkoleksi<?php echo $data['id']; ?>"><i
                                        class='bx bx-plus'></i></a>
                                <br>
                                <label for="namaBuku" class="form-label">Judul:
                                    <?php echo $data['judul']; ?></label><br>
                                <br>
                                <label for="namaBuku" class="form-label">Penulis:
                                    <?php echo $data['penulis']; ?></label><br>
                                <hr>
                                <label for="namaBuku" class="form-label">Penerbit:
                                    <?php echo $data['penerbit']; ?></label><br>
                                <hr>
                                <label for="namaBuku" class="form-label">Tahun:
                                    <?php echo $data['tahun']; ?></label><br>
                                <hr>
                                <label class="d-flex justify-content-center align-items-center" style="height: 5vh;"
                                    for="namaBuku" class="form-label">Rating:</label><br>
                                <div class="d-flex justify-content-center align-items-center" style="height: 5vh;">
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalbooking<?php echo $data['id']; ?>">Booking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal booking dan favorite disini -->




                    <div class="modal fade" id="modalbooking<?php echo $data['id']; ?>" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="crud_booking.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Booking</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center" style="height: 5vh;">
                                        <p>Apakah Anda yakin ingin membooking buku?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="btnSimpan" class="btn btn-success">Simpan</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="favoriteModal<?php echo $data['id']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Koleksi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="crud_koleksi.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <p>Anda Yakin akan menambahkan ini ke koleksi?</p>
                                    <button type="submit" name="btnSimpan" class="btn btn-dark mt-3"
                                        aria-label="Close">Konfirmasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        endwhile;
                    } else {
                        // Jika tidak ada data, tampilkan pesan bahwa buku tidak ditemukan

                        echo "<p class='text-center'>Buku tidak ada.</p>";
                    }
        ?>


                <!--end page-wrapper-->
                <!--start overlay-->
                <div class="overlay toggle-btn-mobile"></div>
                <!--end overlay-->
                <!--Start Back To Top Button-->
                <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
                <!--End Back To Top Button-->
                <!--footer -->
                <div class="footer">
                    <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                            target="_blank">codervent</a></p>
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
            <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
            <script src="../assets/responsive/js/dataTables.responsive.min.js"></script>
            <script src="../assets/js/index.js"></script>
            <!-- App JS -->
            <script src="../assets/js/app.js"></script>
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
            <script>
                new PerfectScrollbar('.dashboard-social-list');
                new PerfectScrollbar('.dashboard-top-countries');
            </script>
</body>

</html>