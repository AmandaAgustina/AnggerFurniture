<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php');

// membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];

// Cek jika gambar diubah
if ($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // Mengambil data gambar lama berdasarkan ID
        $query_gambar = "SELECT gambar FROM produk WHERE id='$id'";
        $result_gambar = mysqli_query($conn, $query_gambar);
        $data_gambar = mysqli_fetch_assoc($result_gambar);
        $gambar_lama = $data_gambar['gambar'];

        // Hapus gambar lama jika ada
        if (file_exists('gambar/' . $gambar_lama) && $gambar_lama != '') {
            unlink('gambar/' . $gambar_lama); // hapus file gambar lama
        }

        // Pindahkan file gambar baru ke folder
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        // Update data produk
        $query = "UPDATE produk SET nama = '$nama', deskripsi = '$deskripsi', gambar = '$nama_gambar_baru' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        // Periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='../produk.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='./create.php';</script>";
    }
} else {
    // Jika gambar tidak diubah, hanya update data teks
    $query = "UPDATE produk SET nama = '$nama', deskripsi = '$deskripsi' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='../produk.php';</script>";
    }
}
