<?php
include '../koneksi.php';
session_start();
if(isset($_POST['btnSimpan'])){
    $id_pengguna = $_SESSION['id'];
    $id_buku = $_POST['id'];

    $cek_booking = mysqli_query($koneksi, "SELECT id_pengguna, id_buku FROM peminjaman

    WHERE id_pengguna = '$id_pengguna'
    AND id_buku ='$id_buku' AND status ='pinjam'");

    if(mysqli_fetch_assoc($cek_booking)){
        echo "<script>alert('Data sudah diboking'); document.location='buku_php';</ script>";
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_pengguna, id_buku, status)
        VALUES ('$id_pengguna', '$id_buku', 'pinjam')");

        if($query){
            echo "<script>alert('Data buku berhasil dibooking'); document.location='buku.php';</script>";
        } else {
            echo "<script>alert('Data buku gagal dibooking'); document.location='buku.php'; </script>";
    }
    }


}
if(isset($_POST['btnHapus'])){
    $id = $_POST['id'];

    $hapus =mysqli_query($koneksi,"DELETE FROM peminjaman WHERE id = '$id'");
    if($hapus){
        echo "<script>alert('Data booking buku berhasil dihapus'); document.location='dashboard.php';</script>";
    }else {
        echo "<script>alert('Data booking buku gagal dihapus'); document.location='dashboard.php';</script>";
    }    
}
?>
