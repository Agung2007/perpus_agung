<?php
include '../koneksi.php';

if (isset($_POST['btnDaftar'])) {
	$nama_pengguna = $_POST['nama_pengguna'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	// Validasi input
	$cek_email = mysqli_query($koneksi, "SELECT email FROM pengguna WHERE email = '$email'");
	$cek_username = mysqli_query($koneksi, "SELECT username FROM pengguna WHERE username = '$username'");

	if (mysqli_fetch_assoc($cek_email)) {
		echo "<script>alert('Email sudah digunakan');</script>";
	} else if (mysqli_fetch_assoc($cek_username)) {
		echo "<script>alert('Username sudah digunakan');</script>";
	} else if ($password != $password2) {
		echo "<script>alert('Password tidak sama');</script>";
	} else {
		// Mengamankan password menggunakan hashing

		// Query untuk menyimpan data ke database
		$simpan = mysqli_query($koneksi, "INSERT INTO pengguna (nama_pengguna, alamat, email, username, password) 
			VALUES ('$nama_pengguna', '$alamat', '$email', '$username', '$password')");

		if ($simpan) {
			echo "<script>alert('Data Akun Berhasil Dibuat');
			document.location='../index.php';
			</script>";
		} else {
			echo "<script>alert('Data Akun Gagal Dibuat');</script>";
		}
	}
}
?>


<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Projek Jagung</title>
	<!--favicon-->
	<link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="../assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="../assets/css/app.css" />
</head>

<body class="bg-register">
	<!-- wrapper -->
	<div class="wrapper">
	<div class="section-authentication-register d-flex align-items-center justify-content-center">
		<div class="row">
			<div class="col-12 col-lg-10 mx-auto">
				<div class="card radius-15 overflow-hidden">
					<div class="row g-0">
						<!-- Form Section -->
						<div class="col-xl-6">
							<div class="card-body p-md-5">
								<div class="text-center">
									<img src="../assets/images/knjt.png" width="80" alt="Logo">
									<h3 class="mt-4 font-weight-bold">BUAT AKUN</h3>
								</div>
								<div class="form-body">
									<form class="row g-3" method="POST" action="">
										<div class="col-sm-6">
											<label for="inputFirstName" class="form-label">Nama Pengguna</label>
											<input type="text" class="form-control" name="nama_pengguna" id="inputFirstName" placeholder="Masukkan Nama Pengguna">
										</div>
										<div class="col-sm-6">
											<label for="inputUsername" class="form-label">Username</label>
											<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Masukkan Username">
										</div>
										<div class="col-sm-6">
											<label for="inputEmail" class="form-label">Email</label>
											<input type="email" class="form-control" name="email" id="inputEmail" placeholder="Masukkan Email">
										</div>
										<div class="col-12">
											<label for="inputAddress" class="form-label">Alamat</label>
											<input type="text" class="form-control" name="alamat" id="inputAddress" placeholder="Masukkan Alamat">
										</div>
										<div class="col-12">
											<label for="inputPassword" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" name="password" id="inputPassword" placeholder="Masukkan Password"> 
												<a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
											</div>
										</div>
										<div class="col-12">
											<label for="inputConfirmPassword" class="form-label">Ulangi Password</label>
											<div class="input-group" id="show_hide_password_confirm">
												<input type="password" class="form-control border-end-0" name="password2" id="inputConfirmPassword" placeholder="Ulangi Password"> 
												<a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
											</div>
										</div>
										<div class="col-12">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
												<label class="form-check-label" for="flexSwitchCheckChecked">Setuju dengan syarat & ketentuan</label>
											</div>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary" name="btnDaftar"><i class="bx bx-user me-1"></i> Daftar</button>
											</div>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="button" class="btn btn-danger" name="btnBatal"><i class="bx bx-show-alt me-1"></i> Batal</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Image Section -->
						<div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
							<img src="../assets/images/perpus.img.jpg" class="img-fluid" alt="Registration Image">
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../assets/js/jquery.min.js"></script>
<!-- Password show & hide js -->
<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			togglePasswordVisibility('#show_hide_password');
		});
		$("#show_hide_password_confirm a").on('click', function (event) {
			event.preventDefault();
			togglePasswordVisibility('#show_hide_password_confirm');
		});

		function togglePasswordVisibility(element) {
			let input = $(element + ' input');
			let icon = $(element + ' i');
			if (input.attr("type") == "text") {
				input.attr('type', 'password');
				icon.addClass("bx-hide").removeClass("bx-show");
			} else if (input.attr("type") == "password") {
				input.attr('type', 'text');
				icon.addClass("bx-show").removeClass("bx-hide");
			}
		}
	});
</script>
