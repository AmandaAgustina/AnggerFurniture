<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php');

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$query = "SELECT * FROM home WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan.');window.location='../home.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Gambar</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: #4e73df;
        }

        form {
            width: 70%;
            margin: 20px auto;
            text-align: center;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        button {
            background-color: #4e73df;
            color: white;
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2e59d9;
        }

        img {
            margin: 10px;
            width: 120px;
        }
    </style>
</head>

<body>
    <center>
        <h1>Update Gambar Beranda</h1>
        <form action="./proses_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required><br><br>

            <label for="gambar">Pilih 3 gambar (kosongkan jika tidak mengubah gambar):</label><br>
            <img src="gambar/<?php echo $row['gambar1']; ?>" alt="Gambar 1">
            <input type="file" name="gambar[]"><br><br>

            <img src="gambar/<?php echo $row['gambar2']; ?>" alt="Gambar 2">
            <input type="file" name="gambar[]"><br><br>

            <img src="gambar/<?php echo $row['gambar3']; ?>" alt="Gambar 3">
            <input type="file" name="gambar[]"><br><br>

            <button type="submit" name="submit">Update</button>
        </form>
    </center>
</body>

</html>