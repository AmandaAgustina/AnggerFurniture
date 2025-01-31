<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php');

// Membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$gambar = $_FILES['gambar'];  // Gambar yang diupload (array)

$gambar_baru = [];
$gambar_lama = [];

// Ambil data gambar lama berdasarkan ID
$query_gambar = "SELECT * FROM home WHERE id='$id'";
$result_gambar = mysqli_query($conn, $query_gambar);
$data_gambar = mysqli_fetch_assoc($result_gambar);

// Menyimpan gambar lama ke dalam array
$gambar_lama[] = $data_gambar['gambar1'];
$gambar_lama[] = $data_gambar['gambar2'];
$gambar_lama[] = $data_gambar['gambar3'];

// Mengecek apakah jumlah gambar yang diupload 3
if (count($gambar['name']) != 3) {
    echo "<script>alert('Harus ada 3 gambar yang diupload.');window.location='./update.php?id=$id';</script>";
    exit();
}

// Menyimpan gambar baru
$ekstensi_diperbolehkan = array('png', 'jpg');

for ($i = 0; $i < 3; $i++) {
    if ($gambar['name'][$i] != "") {
        $x = explode('.', $gambar['name'][$i]);
        $ekstensi = strtolower(end($x));
        $file_tmp = $gambar['tmp_name'][$i];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar['name'][$i];

        // Validasi ekstensi
        if (!in_array($ekstensi, $ekstensi_diperbolehkan)) {
            echo "<script>alert('Ekstensi gambar yang diperbolehkan hanya jpg atau png.');window.location='./update.php?id=$id';</script>";
            exit();
        }

        // Pindahkan file gambar ke folder
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
        $gambar_baru[] = $nama_gambar_baru;  // Menyimpan nama gambar baru ke array
    } else {
        // Jika gambar tidak diubah, gunakan gambar lama
        $gambar_baru[] = $gambar_lama[$i];
    }
}

// Mengupdate data produk dan gambar
$query = "UPDATE home SET nama = '$nama', gambar1 = '$gambar_baru[0]', gambar2 = '$gambar_baru[1]', gambar3 = '$gambar_baru[2]' WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
} else {
    // Hapus gambar lama jika ada gambar baru
    for ($i = 0; $i < 3; $i++) {
        if ($gambar['name'][$i] != "" && file_exists('gambar/' . $gambar_lama[$i])) {
            unlink('gambar/' . $gambar_lama[$i]);  // Hapus file gambar lama
        }
    }

    echo "<script>alert('Data berhasil diperbarui.');window.location='../home.php';</script>";
}
