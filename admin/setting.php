<?php
include_once('../config/koneksi.php');
?>
<!-- Custom fonts for this template-->
<link href="../assetadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../assetadmin/css/sb-admin-2.min.css" rel="stylesheet">

<div class="container">
    <form action="ubahsandi.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="current_password" class="form-label">Kata Sandi Lama</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Kata Sandi Baru</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Kata Sandi Baru</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <?php
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo "<div style='color: red;'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']); // Menghapus pesan setelah ditampilkan
        }
        ?>

        <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
    </form>

</div>