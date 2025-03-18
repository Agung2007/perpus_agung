<?php
include 'koneksi.php';

session_start();
if (isset($_SESSION['login'])) {
    header("location:pengguna/dashboard.php");
    exit;
}

if (isset($_POST['btnMasuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

    if (mysqli_num_rows($data) === 1) {
        $baris = mysqli_fetch_assoc($data);
        if ($password == $baris['password']) {
            $_SESSION['id'] = $baris['id'];
            $_SESSION['login'] = true;
            $_SESSION['nama_pengguna'] = $baris['nama_pengguna'];
            $_SESSION['email'] = $baris['email'];
            
            header("location: pengguna/dashboard.php");
            exit;
        } else {
            echo "<script>alert('Username atau password Anda salah!')</script>";
        }
    } else {
        echo "<script>alert('Username atau password Anda salah!')</script>";
    }
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
    <link rel="icon" href="assets/images/ifsu.jpg"/>
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
</head>

<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="assets/images/knjt.png" width="120" alt="Logo">
                                        <h3 class="mt-4 font-weight-bold">LOGIN</h3>
                                    </div>
                                    <div class="form-body">
                                        <form action="" class="row g-3" method="post">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="inputEmailAddress" name="username" placeholder="Masukkan Username">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Masukkan Password"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary" name="btnMasuk"><i class="bx bxs-lock-open"></i> MASUK</button>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <p>Belum punya akun? <a href="pengguna/daftar.php">Daftar di sini</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="assets/images/perpus.img.jpg" class="img-fluid" alt="Gambar Login">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

</html>
