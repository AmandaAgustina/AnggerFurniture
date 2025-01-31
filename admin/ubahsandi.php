<?php
session_start();
include_once('../config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah kata sandi baru dan konfirmasi cocok
    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "Kata sandi baru dan konfirmasi tidak cocok!";
        header("Location: setting.php"); // Redirect kembali ke form
        exit();
    }

    // Cek apakah kata sandi lama benar
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($current_password, $user['password'])) {
        // Jika kata sandi lama benar, update kata sandi baru
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $sql_update = "UPDATE user SET password='$new_password_hashed' WHERE username='$username'";

        if ($conn->query($sql_update) === TRUE) {
            // Jika berhasil, set session untuk menampilkan pesan sukses
            $_SESSION['success_message'] = "Kata sandi berhasil diubah!";
            header("Location: dasboard.php"); // Redirect kembali untuk menampilkan alert
            exit();
        } else {
            $_SESSION['error_message'] = "Gagal mengubah kata sandi!";
            header("Location: setting.php");
            exit();
        }
    } else {
        // Jika kata sandi lama salah
        $_SESSION['error_message'] = "Kata sandi lama salah!";
        header("Location: setting.php");
        exit();
    }
}
$conn->close();
