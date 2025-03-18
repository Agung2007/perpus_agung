<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['loginpa'])) {
	header('Location: login_petugas.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1, shrink-to-fit=no"/>
        <title>
            syndas-boostrap4 admin template
        </title>
        <style>
            thead th,
            thead td {
                vertical-align: middle!important;
                text-align:center;
                border: 1px solid #000000;
            }
            table, 
            tbody th,
            tbody td{
                border: 1px solid;
                padding: 5px;
            }
            table{
                border-collapse: collapse;
            }
        </style>
    </head>

    <body>
        <h2 style="text-align: center;"><img src="../assets/images/ifsu.jpg.png" width="50" height="50">Laporan Perpustakaan</h2>
        <table id="dataLaporan" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Nama Petugas</th>
                    <th>Status Pinjam</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.judul, buku.gambar, petugas.nama_petugas, pengguna.nama_pengguna, pengguna.alamat, pengguna.email, rak.nama_rak, kategori.nama_kategori, pengembalian.tgl_kembali
                FROM peminjaman 
                 JOIN buku ON peminjaman.id_buku = buku.id 
                 JOIN petugas ON peminjaman.id_petugas = petugas.id
                 JOIN pengguna ON peminjaman.id_pengguna = pengguna.id 
                 JOIN pengembalian ON pengembalian.id_peminjaman = peminjaman.id
                 JOIN kategori ON buku.id_kategori = kategori.id
                 JOIN rak ON buku.id_rak = rak.id
                 WHERE peminjaman.status != 'pinjam'
                ORDER BY peminjaman.id DESC");
                while ($data = mysqli_fetch_assoc($query)):
                ?>
                <td><?php echo $no++; ?></td>
					<td><?php echo $data['nama_pengguna']; ?></td>
					<td><?php echo $data['judul']; ?></td>
					<td><?php echo $data['tgl_pinjam']; ?></td>
					<td><?php echo $data['tgl_kembali']; ?></td>
					<td><?php echo $data['nama_petugas']; ?></td>
                    <?php if ($data['status']=='kembali') {?>
                        <td>
                            <a class="btn btn-succes btn-sm"><?php echo $data['status']; ?></a>
                        </td>
                        <?php } else { ?>
                                <td>
                                    <span class="btn btn-danger btn-sm"><?php echo $data['status']; ?></span>
                                </td>
                        <?php } ?>
                        </tr>
                        <?php endwhile; ?>
                        
            </tbody>
        </table>
        <script>
            window.print()
        </script>
    </body>
</html>