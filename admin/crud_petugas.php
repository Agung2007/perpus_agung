<?php

session_start();
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    
    $simpan = mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas, alamat, username, password, level)
    VALUES ('$nama_petugas', '$alamat', '$username', '$password', '$level')");

    if($simpan){
        echo "<script>alert('Data berhasil di simpan'); document.location='kelola_petugas.php';</script>";
    }else{
        echo "<script>alert('Data gagal di simpan'); document.location='kelola_petugas.php';</script>";
    }
	
}

if (isset($_POST['ubah'])){
    $id = $_POST['id'];
    $nama_petugas = $_POST['nama_petugas'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if ($password == ""){
        mysqli_query($koneksi, "UPDATE petugas SET nama_petugas = '$nama_petugas', alamat = '$alamat', username = '$username', password = '$password_lama', level = '$level' WHERE id = '$id'");
        echo "<script>alert('Data berhasil di ubah'); document.location='kelola_petugas.php';</script>";
    }else {
         mysqli_query($koneksi, "UPDATE petugas SET nama_petugas = '$nama_petugas', alamat = '$alamat', username = '$username', password = '$password', level = '$level' WHERE id = '$id'");
        echo "<script>alert('Data berhasil di ubah');document.location='kelola_petugas.php'; </script>";
}
}

if (isset($_POST['hapus'])){
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM petugas WHERE id = '$id'");

    if($hapus){
        echo "<script>alert('Data petugas berhasil di hapus'); document.location='kelola_petugas.php';</script>";
    }else{
        echo "<script>alert('Data petugas gagal di hapus'); document.location='kelola_petugas.php';</script>";
    }
	
}
?>