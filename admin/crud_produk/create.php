<?php
include_once('D:/xampp/htdocs/ProjekUAS/FurnitureAngger/config/koneksi.php'); // Ensure this file connects with $con
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Angger</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Trebuchet MS", sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-transform: uppercase;
            color: black;
            margin-bottom: 20px;
        }

        .form-container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            margin-top: 10px;
            display: block;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
        }

        .form-container button {
            background-color: blue;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .form-container button:hover {
            background-color: rgb(91, 81, 231);
        }

        .form-container input[type="file"] {
            padding: 6px;
        }
    </style>
</head>

<body>

    <center>
        <h1>Tambah Produk</h1>
    </center>

    <form method="POST" action="./proses_create.php" enctype="multipart/form-data" class="form-container">
        <div>
            <label for="nama">Nama Produk</label>
            <input type="text" id="nama" name="nama" autofocus="" required="" />
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" />
        </div>
        <div>
            <label for="gambar">Gambar Produk</label>
            <input type="file" id="gambar" name="gambar" required="" />
        </div>
        <div>
            <button type="submit">Simpan Produk</button>
        </div>
    </form>
    </section>
</body>

</html>