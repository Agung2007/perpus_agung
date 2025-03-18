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
        <div class="page-wrapper" id="content">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-12 grid-margin grid-margin-xl-0 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <?php
                            $query = mysqli_query($koneksi, "SELECT ulasan_buku.*, buku.judul, buku.gambar, pengguna.nama_pengguna
                            FROM ulasan_buku
                            INNER JOIN buku ON ulasan_buku.id_buku = buku.id
                            INNER JOIN pengguna ON ulasan_buku.id_pengguna = pengguna.id
                            ORDER BY ulasan_buku.waktu");
                            while($data = mysqli_fetch_assoc($query)) :
                            ?>
                                        <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                            <div class="me-3">
                                                <img src="../assets/images/<?php echo $data['gambar']; ?>" width="80"
                                                    height="120">
                                            </div>
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="text-body"><?php echo $data['nama_pengguna']; ?></h5>
                                                    <p class="text-muted"><?php echo $data['waktu']; ?></p>
                                                </div>
                                                <p>Judul buku: <?php echo $data['judul']; ?></p>
                                                <p class="text-danger">Rating: <?php echo $data['rating']; ?></p>
                                                <p class="text-muted"><?php echo $data['ulasan']; ?></p>
                                                <?php
                                    $id_pengguna = $_SESSION['id'];
                                    if($data['id_pengguna'] === $id_pengguna) { ?>
                                                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalUbahUlasan<?php echo $data['id_buku']; ?>">Ubah</a>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- Modal ubah ulasan-->
                                        <div class="modal fade" id="modalUbahUlasan<?php echo $data['id_buku']?>"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content shadow-lg border-0">
                                                    <div class="modal-header bg-warning text-white">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Ulasan
                                                            Buku</h5>
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="crud_ulasan.php" method="post"
                                                            enctype="multipart/form-data">
                                                            <input type="hidden" name="id_buku"
                                                                value="<?php echo $data['id_buku']; ?>">
                                                            <input type="hidden" name="id_ulasan"
                                                                value="<?php echo $data['id_ulasan']; ?>">

                                                            <!-- Rating Input -->
                                                            <div class="mb-4">
                                                                <label for="rating"
                                                                    class="form-label fw-bold">Rating</label>
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control"
                                                                        name="rating" min="1" max="5"
                                                                        value="<?php echo $data['rating']; ?>" required>
                                                                    <span class="input-group-text">/5</span>
                                                                </div>
                                                                <div class="form-text text-muted">Beri nilai antara 1
                                                                    hingga 5</div>
                                                            </div>

                                                            <!-- Ulasan Input -->
                                                            <div class="mb-4">
                                                                <label for="ulasan"
                                                                    class="form-label fw-bold">Ulasan</label>
                                                                <textarea name="ulasan" class="form-control" rows="6"
                                                                    placeholder="Tulis ulasan Anda..."
                                                                    required><?php echo $data['ulasan']; ?></textarea>
                                                            </div>

                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" name="btnUbah"
                                                                    class="btn btn-primary">Ubah Ulasan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end row-->
            <!-- Data Table -->
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