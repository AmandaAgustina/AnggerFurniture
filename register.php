<?php
// Mulai sesi dan masukkan file koneksi
session_start();
require_once 'config/koneksi.php'; // Pastikan koneksi sudah benar

// Tentukan data untuk registrasi
$username = 'admin';
$email = 'admin@gmail.com';
$password = 'admin123';

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Periksa apakah data sudah ada
$query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Jika username atau email sudah ada
    echo "Username atau email sudah terdaftar.";
} else {
    // Query untuk menyimpan data pengguna baru
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($query)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Terjadi kesalahan saat registrasi: " . $conn->error;
    }
}
