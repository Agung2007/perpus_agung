<?php
include '../koneksi.php';
session_start();
if(isset($_POST['btnVerif']));
$id = $_POST['id'];
$id_petugas = $_SESSION['id'];
$tanggal_pinjam = date('Y-m-d');

$query = mysqli_query($koneksi, "UPDATE peminjaman SET id_petugas = '$id_petugas', tgl_pinjam = '$tanggal_pinjam' WHERE id = '$id' ");


if($query) {
    echo "<script>alert('Data peminjaman buku berhasil disimpan'); document.location='kelola_pinjam.php';</script>";
} else {
    echo "<script>alert('Data peminjaman buku gagal disimpan'); document.location='kelola_pinjam.php';</script>";
   }



if(isset($_POST['btnHapus'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id = '$id'");
    if ($hapus){
        echo "<script>alert('Data booking buku berhasil dihapus'); document.location='dashboard_pa.php';</script>";
    } else {
        echo "<script>alert('Data booking buku gagal dihapus'); document.location='dashboard_pa.php';</script>";

    }
} 
