<?php
include_once('config/koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="assetlandingpage/images/favicon.png">
	<title>Angger Furniture</title>

	<!-- Bootstrap CSS -->
	<link href="assetlandingpage/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="assetlandingpage/css/tiny-slider.css" rel="stylesheet">
	<link href="assetlandingpage/css/style.css" rel="stylesheet">
</head>

<body>
	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="./assetlandingpage/images/logoputih.png" alt="logo" height="40"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Beranda</a>
					</li>
					<li><a class="nav-link" href="landingpage/shop.php">Produk</a></li>
					<li><a class="nav-link" href="landingpage/services.php">Layanan</a></li>
					<li><a class="nav-link" href="landingpage/contact.php">Kontak Kami</a></li>
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
						<p><a href="landingpage/contact.php" class="btn btn-secondary me-2">Hubungi Kami</a><a href="landingpage/shop.php" class="btn btn-white-outline">Lihat Produk</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="assetlandingpage/images/couch.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

	<!-- Start We Help Section -->
	<div class="we-help-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-5 mb-lg-0">
					<div class="imgs-grid">
						<?php
						$query = "SELECT * FROM home ORDER BY id ASC";
						$result = mysqli_query($conn, $query);

						if ($result && mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<div class="grid grid-1"><img src="./admin/crud_home/gambar/' . $row['gambar1'] . '" alt="Gambar 1"></div>';
								echo '<div class="grid grid-2"><img src="./admin/crud_home/gambar/' . $row['gambar2'] . '" alt="Gambar 2"></div>';
								echo '<div class="grid grid-3"><img src="./admin/crud_home/gambar/' . $row['gambar3'] . '" alt="Gambar 3"></div>';
							}
						} else {
							echo '<p>Tidak ada gambar yang tersedia.</p>';
						}
						?>
					</div>
				</div>
				<div class="col-lg-5 ps-lg-5">
					<h2 class="section-title mb-4">Kami Membantu Anda Membuat Desain Interior Modern</h2>
					<p>Pembuatan desain menjadi lebih mudah dengan proses yang mulus. Kami memastikan segala sesuatu tersusun dengan rapi. Anda dapat mengandalkan kami untuk hasil yang estetis. Desain kami menghadirkan harmoni yang tahan lama. Kami menyesuaikan desain dengan berbagai kebutuhan klien.</p>
					<ul class="list-unstyled custom-list my-4">
						<li>Kami memberikan solusi desain yang terorganisir dengan baik</li>
						<li>Setiap detail dirancang untuk menciptakan harmoni</li>
						<li>Kami memastikan kemudahan dalam setiap proses desain</li>
						<li>Hasil akhir yang estetik adalah prioritas kami</li>
					</ul>
					<p><a href="landingpage/shop.php" class="btn">Lihat Produk</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- End We Help Section -->

	<!-- Start Footer Section -->
	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">


			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo"><img src="./assetlandingpage/images/logohitam.png" alt="logo" height="40"></a></div>
					<p class="mb-4">UD. Angger Kusen Mulyo - Solusi furniture terbaik untuk kebutuhan interior Anda. Kami menghadirkan beragam produk minimalis dengan kualitas unggul yang dapat disesuaikan sepenuhnya dengan keinginan Anda. Wujudkan desain impian untuk rumah yang nyaman, fungsional, dan bergaya. Hubungi kami sekarang untuk konsultasi desain gratis!</p>
				</div>

				<div class="col-lg-2">
					<div class=" links-wrap">
						<ul class="list-unstyled">
							<li><a href="index.php">Beranda</a></li>
							<li><a href="landingpage/shop.php">Produk</a></li>
							<li><a href="landingpage/services.php">Layanan</a></li>
							<li><a href="landingpage/contact.php">Kontak kami</a></li>
						</ul>

					</div>
				</div>
				<div class="col-lg-6">
					<p class="fw-bold">Lokasi kami</p>
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15827.850716098712!2d110.814278!3d-6.726518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNDMnMzUuNSJTIDExMMKwNDgnNTEuNCJF!5e0!3m2!1sen!2sid!4v1686238474026!5m2!1sen!2sid"
						width="450"
						height="450"
						style="border:0;"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade">
					</iframe>
				</div>
			</div>

			<div class="border-top copyright">
				<div class="row pt-4 justify-content-center">
					<div class="col-lg-12">
						<p class="mb-2 text-center" style="text-align: center;">
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script>. Designed by
							<a href="https://github.com/AmandaAgustina">Amanda Agustina</a>
						</p>
					</div>
				</div>
			</div>


		</div>
	</footer>
	<!-- End Footer Section -->

	<script src="assetlandingpage/js/bootstrap.bundle.min.js"></script>
	<script src="assetlandingpage/js/tiny-slider.js"></script>
	<script src="assetlandingpage/js/custom.js"></script>
</body>

</html>