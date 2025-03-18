<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}
$id_pengguna_ses = $_SESSION['id'];
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
                                    <p class="user-name mb-0"><?php echo $_SESSION['nama_pengguna']?></p>
                                    <p class="designattion mb-0"><?php echo $_SESSION['email']?></p>
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
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card radius-15">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Nama Petugas</th>
                                                        <th>Status Pinjam</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                        $no = 1;
                                        $email_ses = $_SESSION['email'];
                                        $query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.judul, buku.gambar, petugas.nama_petugas,
                                            pengguna.nama_pengguna, pengguna.alamat, pengguna.email, rak.nama_rak, kategori.nama_kategori,
                                            pengembalian.tgl_kembali FROM peminjaman
                                            INNER JOIN buku ON peminjaman.id_buku = buku.id
                                            INNER JOIN petugas ON peminjaman.id_petugas = petugas.id
                                            INNER JOIN pengguna ON peminjaman.id_pengguna = pengguna.id
                                            INNER JOIN pengembalian ON pengembalian.id_peminjaman = peminjaman.id
                                            INNER JOIN kategori ON buku.id_kategori = kategori.id
                                            INNER JOIN rak ON buku.id_rak = rak.id
                                            WHERE peminjaman.status != 'pinjam' AND pengguna.email = '$email_ses'
                                            ORDER BY peminjaman.id DESC");
                                            // Tambahkan pengecekan apakah query berhasil atau tidak
                                            if (!$query) {
                                                echo "Query error: " . mysqli_error($koneksi);
                                            } else {
                                                // Looping untuk menampilkan data jika query berhasil
                                                while ($data = mysqli_fetch_assoc($query)) :
                                        ?>

                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data['judul']; ?></td>
                                                        <td><?php echo $data['tgl_pinjam']; ?></td>
                                                        <td><?php echo $data['tgl_kembali']; ?></td>
                                                        <td><?php echo $data['nama_petugas']; ?></td>
                                                        <?php if($data['status'] == 'kembali') { ?>
                                                        <td>
                                                            <a
                                                                class="btn btn-success btn-sm"><?php echo $data['status']; ?></a>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span
                                                                class="btn btn-danger btn-sm"><?php echo $data['status']; ?></span>
                                                        </td>
                                                        <?php } ?>
                                                        <td>
                                                            <a href="" class="btn btn-secondary" data-bs-toggle="modal"
                                                                data-bs-target="#modalUlasan<?php echo $data['id_buku']; ?>">Ulasan</a>

                                                            <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#modalDetailRiwayat<?php echo $data['id']; ?>">Detail</a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade"
                                                        id="modalUlasan<?php echo $data['id_buku']; ?>" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content shadow-lg border-0">
                                                                <div class="modal-header bg-info text-white">
                                                                    <h5 class="modal-title">Form Ulasan</h5>
                                                                    <button type="button"
                                                                        class="btn-close btn-close-white"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <form action="crud_ulasan.php" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <input type="hidden" name="id_buku"
                                                                            value="<?php echo $data['id_buku']; ?>">

                                                                        <!-- Rating Input -->
                                                                        <div class="mb-4">
                                                                            <label for="rating"
                                                                                class="form-label fw-bold">Rating</label>
                                                                            <div class="input-group">
                                                                                <input type="number"
                                                                                    class="form-control" name="rating"
                                                                                    min="1" max="5" required>
                                                                                <span class="input-group-text">/5</span>
                                                                            </div>
                                                                            <div class="form-text text-muted">Beri nilai
                                                                                antara 1-5</div>
                                                                        </div>

                                                                        <!-- Ulasan Input -->
                                                                        <div class="mb-4">
                                                                            <label for="ulasan"
                                                                                class="form-label fw-bold">Ulasan</label>
                                                                            <textarea class="form-control" name="ulasan"
                                                                                rows="5"
                                                                                placeholder="Tulis ulasan Anda di sini..."
                                                                                required></textarea>
                                                                        </div>

                                                                        <!-- Modal Footer -->
                                                                        <div
                                                                            class="modal-footer d-flex justify-content-between">
                                                                            <button type="button" class="btn btn-danger"
                                                                                data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" name="btnSimpan"
                                                                                class="btn btn-success">Simpan
                                                                                Ulasan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Modal Detail -->
                                                    <div class="modal fade"
                                                        id="modalDetailRiwayat<?php echo $data['id']; ?>" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail Laporan</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <div class="row">
                                                                        <!-- Informasi Buku -->
                                                                        <div class="col-6">
                                                                            <h5>Informasi Buku</h5>
                                                                            <div class="mb-3">
                                                                                <label for="judul"
                                                                                    class="form-label">Judul</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="judul"
                                                                                    value="<?php echo $data['judul']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="gambar"
                                                                                    class="form-label">Gambar</label>
                                                                                <br>
                                                                                <a href="../assets/images/<?php echo $data['gambar']; ?>"
                                                                                    target="_blank">
                                                                                    <img src="../assets/images/<?php echo $data['gambar']; ?>"
                                                                                        width="80" height="120" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="kategori"
                                                                                    class="form-label">Kategori</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="kategori"
                                                                                    value="<?php echo $data['nama_kategori']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nama_rak"
                                                                                    class="form-label">Nama Rak</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="nama_rak"
                                                                                    value="<?php echo $data['nama_rak']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Informasi Transaksi -->
                                                                        <div class="col-6">
                                                                            <h5>Informasi Transaksi</h5>
                                                                            <div class="mb-3">
                                                                                <label for="petugas"
                                                                                    class="form-label">Petugas</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="petugas"
                                                                                    value="<?php echo $data['nama_petugas']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="tgl_pinjam"
                                                                                    class="form-label">Tanggal
                                                                                    Pinjam</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="tgl_pinjam"
                                                                                    value="<?php echo $data['tgl_pinjam']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="tgl_kembali"
                                                                                    class="form-label">Tanggal
                                                                                    Kembali</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="tgl_kembali"
                                                                                    value="<?php echo $data['tgl_kembali']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="status"
                                                                                    class="form-label">Status
                                                                                    Pinjam</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="status"
                                                                                    value="<?php echo $data['status']; ?>"
                                                                                    disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- end modal -->
                                                    <!-- Data statis untuk contoh -->
                                                    <?php endwhile;} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table 2-->

                        <!-- end table 2-->
                    </div>
                </div>
                <!-- End Data Table -->
            </div>
        </div>

        <!-- Modal Ulasan -->




        <!--end row-->
        <!--end page-content-wrapper-->
    </div>
    <!--end page-wrapper-->
    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <!--footer -->
    <div class="footer">
        <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                target="_blank">codervent</a>
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