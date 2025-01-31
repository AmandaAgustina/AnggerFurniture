<!-- shop.php -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="../assetlandingpage/images/favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="../assetlandingpage/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../assetlandingpage/css/tiny-slider.css" rel="stylesheet">
    <link href="../assetlandingpage/css/style.css" rel="stylesheet">
    <title>Angger Furniture</title>
</head>

<body>
    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="../assetlandingpage/images/logoputih.png" alt="logo" height="40"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Beranda</a></li>
                    <li class="active"><a class="nav-link" href="../landingpage/shop.php">Produk</a></li>
                    <li><a class="nav-link" href="../landingpage/services.php">Layanan</a></li>
                    <li><a class="nav-link" href="../landingpage/contact.php">Kontak Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>UD. AGGER <span clsas="d-block">KUSEN MULYO</span></h1>
                        <p class="mb-4">Kami menawarkan furniture yang dapat disesuaikan sepenuhnya dengan keinginan Anda, tanpa batasan desain. Wujudkan ide dan gaya pribadi Anda dalam setiap detail.</p>
                        <p><a href="../landingpage/contact.php" class="btn btn-secondary me-2">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="../assetlandingpage/images/couch.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section product-section">
        <div class="container">
            <div class="row">
                <?php
                include_once('../config/koneksi.php'); // Sambungkan ke database

                $query = "SELECT * FROM produk ORDER BY id ASC";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <!-- Start Dynamic Product Card -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="../landingpage/detail_shop.php?id=<?php echo $row['id']; ?>">
                            <img src="../admin/crud_produk/gambar/<?php echo $row['gambar']; ?>" class="img-fluid product-thumbnail">
                            <h3 class="product-title"><?php echo $row['nama']; ?></h3>
                            <span class="icon-cross">
                                <img src="../assetlandingpage/images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Dynamic Product Card -->
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include_once('../landingpage/layout/footer.php');
    ?>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/tiny-slider.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>