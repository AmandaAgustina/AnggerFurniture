<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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
    <title>Angger Furniture </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../assetlandingpage/images/logoputih.png" alt="logo" height="40"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Beranda</a>
                    </li>
                    <li><a class="nav-link" href="../landingpage/shop.php">Produk</a></li>
                    <li class="active"><a class="nav-link" href="../landingpage/services.php">Layanan</a></li>
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
                        <p style="text-align: justify;" class="mb-4">Kami melayani penjualan dan pemesanan berbagai jenis produk seperti kusen, pintu, jendela, dan kebutuhan lainnya sesuai dengan keinginan Anda. Selain itu, kami juga menyediakan layanan pembuatan interior, termasuk kitchen set, backdrop TV, lemari, serta produk lainnya yang dapat disesuaikan dengan kebutuhan dan desain pilihan Anda.

                            Tidak hanya itu, kami juga menerima jasa pembongkaran bangunan seperti rumah tua, gudang, dan gedung, dengan tim profesional yang siap bekerja dengan cepat dan aman. Kami berkomitmen untuk memberikan hasil terbaik dengan kualitas unggul di setiap pekerjaan yang kami lakukan.</p>
                        <p><a href="../landingpage/contact.php" class="btn btn-secondary me-2">Hubungi Kami</a><a href="../landingpage/shop.php" class="btn btn-white-outline">Lihat Produk</a></p>
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


    <?php
    include_once('../landingpage/layout/footer.php');
    ?>


    <script src="../landingpage/js/bootstrap.bundle.min.js"></script>
    <script src="../landingpage/js/tiny-slider.js"></script>
    <script src="../landingpage/js/custom.js"></script>
</body>

</html>