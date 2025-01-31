<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php'); // Ensure this file connects with $con

// Membuat variabel untuk menampung data dari form
$nama = $_POST['nama'];
$gambar = $_FILES['gambar'];  // Gambar yang diupload (array)

// Mengecek apakah jumlah gambar yang diupload 3
if (count($gambar['name']) != 3) {
    echo "<script>alert('Harus ada 3 gambar yang diupload.');window.location='./create.php';</script>";
    exit();
}

// Menyimpan gambar
$ekstensi_diperbolehkan = array('png', 'jpg');
$gambar_baru = [];

for ($i = 0; $i < 3; $i++) {
    $x = explode('.', $gambar['name'][$i]);
    $ekstensi = strtolower(end($x));
    $file_tmp = $gambar['tmp_name'][$i];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar['name'][$i];

    // Validasi ekstensi
    if (!in_array($ekstensi, $ekstensi_diperbolehkan)) {
        echo "<script>alert('Ekstensi gambar yang diperbolehkan hanya jpg atau png.');window.location='./create.php';</script>";
        exit();
    }

    // Pindahkan file gambar ke folder
    move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
    $gambar_baru[] = $nama_gambar_baru;  // Menyimpan nama gambar baru ke array
}

// Simpan data ke database
$query = "INSERT INTO home (nama, gambar1, gambar2, gambar3) VALUES ('$nama', '{$gambar_baru[0]}', '{$gambar_baru[1]}', '{$gambar_baru[2]}')";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
} else {
    echo "<script>alert('Data berhasil ditambahkan.');window.location='../home.php';</script>";
}
