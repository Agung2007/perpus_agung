<?php

include '../koneksi.php';
session_start();

if(isset($_POST['btnSimpan'])){
    $id_buku = $_POST['id_buku'];
    $id_pengguna = $_SESSION['id'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST ['rating'];


    $cek_ulasan = mysqli_query($koneksi, "SELECT * FROM ulasan_buku WHERE id_pengguna = '$id_pengguna' AND id_buku = '$id_buku'");

    if(mysqli_fetch_assoc($cek_ulasan)){
        echo "<script>alert('Data buku sudah ada diulas'); document.location='ulasan.php';</script>";
    } else {

        $query = mysqli_query($koneksi, "INSERT INTO ulasan_buku (id_pengguna, id_buku, rating, ulasan)
        VALUES ('$id_pengguna', '$id_buku', '$rating', '$ulasan')");

        if($query) {
            echo "<script>alert('Data ulasan berhasil disimpan'); document.location='ulasan.php';</script>";
        } else {
            echo "<script>alert('Data ulasan gagal disimpan'); document.location='ulasan.php';</script>";
        }
    }
}

    if(isset($_POST['btnUbah'])){
        $id_ulasan = $_POST['id_ulasan'];
        $id_buku = $_POST['id_buku'];
        $ulasan = $_POST ['ulasan'];
        $rating = $_POST ['rating'];
        
        $query = mysqli_query($koneksi, "UPDATE ulasan_buku SET ulasan = '$ulasan', rating = '$rating'
        WHERE id_buku = '$id_buku'");

        if($query){
            echo "<script>alert('Data ulasan berhasil diubah'); document.location='ulasan.php';</script>";
            } else {
            echo "<script>alert('Data ulasan gagal diubah'); document.location='ulasan.php';</script>";
            }
    }
    ?>