<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php'); // Ensure this file connects with $con
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Gambar</title>
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
    </style>
</head>

<body>
    <center>
        <h1>Tambah Gambar Beranda</h1>
        <form action="./proses_create.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="nama" required><br><br>

            <label for="gambar">Pilih 3 gambar:</label><br>
            <input type="file" name="gambar[]" required><br><br>
            <input type="file" name="gambar[]" required><br><br>
            <input type="file" name="gambar[]" required><br><br>

            <button type="submit" name="submit">Upload</button>
        </form>
    </center>
</body>

</html>