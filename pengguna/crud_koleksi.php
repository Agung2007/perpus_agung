<?php
include '../koneksi.php';
session_start();

if(isset($_POST['btnSimpan'])){
    $id_pengguna = $_SESSION['id'];
    $id_buku = $_POST['id'];

    // Cek apakah buku sudah ada di koleksi pribadi
    $cek_koleksi = mysqli_query($koneksi, "SELECT id_pengguna, id_buku FROM koleksi_pribadi WHERE id_pengguna = '$id_pengguna' AND id_buku = '$id_buku'");

    if(mysqli_fetch_assoc($cek_koleksi)){
        echo "<script>alert('Data buku sudah ada di koleksi'); document.location='buku.php';</script>";
    } else {
        // Simpan data buku ke koleksi pribadi 
        $query = mysqli_query($koneksi, "INSERT INTO koleksi_pribadi (id_pengguna, id_buku) VALUES ('$id_pengguna','$id_buku')");
        if($query){
            echo "<script>alert('Data buku berhasil jadi koleksi'); document.location='buku.php';</script>";
        } else {
            echo "<script>alert('Data buku gagal jadi koleksi'); document.location='buku.php';</script>";
        }
    }
}

if(isset($_POST['btnHapus'])){
    $id_buku = $_POST['id'];
    // Hapus data buku dari koleksi pribadi yang ini yang adalah yan pergi dari yang hduhd
    $query = mysqli_query($koneksi,"DELETE FROM koleksi_pribadi WHERE id_buku = '$id_buku'");

    if($query){
        echo "<script>alert('Data buku berhasil dihapus dari koleksi'); document.location='koleksi_buku.php';</script>";
    } else {
        echo "<script>alert('Data buku gagal dihapus dari koleksi'); document.location='koleksi_buku.php';</script>";
    }
}
?>
