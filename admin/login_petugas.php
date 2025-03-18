<?php
include '../koneksi.php';

session_start();
if (isset($_SESSION['loginpa'])) {
    header("location: dashboard_pa01.php");
    exit;
}

if (isset($_POST['btnMasuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username'");

    if (mysqli_num_rows($data) === 1) {
        $baris = mysqli_fetch_assoc($data);
        if ($password == $baris['password']) {
            $_SESSION['id'] = $baris['id'];
            $_SESSION['loginpa'] = true;
            $_SESSION['nama_petugas'] = $baris['nama_petugas'];
            $_SESSION['alamat'] = $baris['alamat'];
            $_SESSION['level'] = $baris['level'];
            header("location: dashboard_pa01.php");
            exit;
        } else {
            echo "<script>alert('Username atau password Anda salah!');</script>";
        }
    } else {
        echo "<script>alert('Username atau password Anda salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Projek Jagung</title>
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/app.css" />
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .bg-login {
            background-color: #f0f4f8;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border: none;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
        }

        .text-center img {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="bg-login">
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="../assets/images/knjt.png" width="80" alt="Logo">
                                        <h3 class="mt-4 font-weight-bold">LOGIN</h3>
                                    </div>
                                    <form action="" class="row g-3" method="post">
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="Password" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="Password"
                                                    name="password" required>
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class="bx bx-hide"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary" name="btnMasuk">
                                                    <i class="bx bxs-lock-open"></i> Masuk
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 d-flex align-items-center justify-content-center bg-login">
                                <img src="../assets/images/perpus.img.jpg" class="img-fluid" alt="Login Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                let inputField = $('#show_hide_password input');
                let icon = $('#show_hide_password i');

                if (inputField.attr("type") === "text") {
                    inputField.attr('type', 'password');
                    icon.removeClass("bx-show").addClass("bx-hide");
                } else {
                    inputField.attr('type', 'text');
                    icon.removeClass("bx-hide").addClass("bx-show");
                }
            });
        });
    </script>
</body>

</html>