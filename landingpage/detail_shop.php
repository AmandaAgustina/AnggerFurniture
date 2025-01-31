<?php
// Koneksi ke database
include_once('../config/koneksi.php');

// Mendapatkan ID produk dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query untuk mendapatkan detail produk berdasarkan ID
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $produk = mysqli_fetch_assoc($result);
    } else {
        echo "<h2>Produk tidak ditemukan.</h2>";
        exit;
    }
} else {
    echo "<h2>ID produk tidak diberikan.</h2>";
    exit;
}

// Nomor WhatsApp Admin
$admin_wa = "+6287883071268";
$wa_link = "https://wa.me/" . $admin_wa . "?text=" . urlencode("Halo admin, saya tertarik dengan produk " . $produk['nama']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assetlandingpage/images/favicon.png">
    <title>Detail Produk - <?php echo $produk['nama']; ?></title>
    <link rel="stylesheet" href="../assetlandingpage/css/bootstrap.min.css">
    <style>
        /* Mengatur font agar sesuai dengan index.php */
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            /* Sesuai nuansa terang index.php */
            margin: 0;
            padding: 0;
        }

        .product-detail {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .product-image img {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 15px;
            border: 2px solid #dde1e4;
            /* Warna border yang lebih lembut */
        }

        .product-info h1 {
            font-size: 36px;
            color: #2c3e50;
            /* Gelap tapi tidak terlalu tajam */
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 16px;
            color: #7f8c8d;
            /* Warna teks abu-abu lembut */
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .product-info .price {
            font-size: 28px;
            color: #2c3e50;
            /* Warna oranye terang sesuai tema */
            margin-bottom: 30px;
            font-weight: bold;
        }

        .btn-whatsapp {
            background-color: #2c3e50;
            /* Warna oranye cerah untuk konsistensi */
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(243, 156, 18, 0.3);
            transition: all 0.3s ease;
        }

        .btn-whatsapp:hover {
            background-color: rgb(29, 38, 46);
            /* Warna oranye lebih gelap untuk efek hover */
            box-shadow: 0 6px 15px rgba(243, 156, 18, 0.5);
            transform: translateY(-3px);
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .product-info h1 {
                font-size: 28px;
            }

            .product-info .price {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="product-detail">
        <div class="product-image">
            <img src="../admin/crud_produk/gambar/<?php echo $produk['gambar']; ?>" alt="<?php echo $produk['nama']; ?>">
        </div>

        <div class="product-info">
            <h1><?php echo $produk['nama']; ?></h1>
            <p><?php echo $produk['deskripsi']; ?></p>
            <a href="<?php echo $wa_link; ?>" class="btn-whatsapp" target="_blank">Pesan Disini</a>
        </div>
    </div>

    <script src="../assetlandingpage/js/bootstrap.bundle.min.js"></script>
</body>

</html>