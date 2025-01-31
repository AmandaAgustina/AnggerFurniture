<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php');
$id = $_GET["id"];

//jalankan query DELETE untuk menghapus data
//ambil data gambar untuk dihapus
$query_gambar = "SELECT gambar FROM produk WHERE id='$id'";
$hasil_gambar = mysqli_query($conn, $query_gambar);
$data = mysqli_fetch_assoc($hasil_gambar);
$gambar = $data['gambar'];

//hapus file gambar dari folder
if (file_exists("gambar/" . $gambar)) {
    unlink("gambar/" . $gambar);
}

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM produk WHERE id='$id'";
$hasil_query = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='../produk.php';</script>";
}
