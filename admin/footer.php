<?php
include_once('../config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location_embed = mysqli_real_escape_string($conn, $_POST['location_embed']);

    // Update data di database
    $query = "UPDATE footer SET description='$description', location_embed='$location_embed' WHERE id=1";
    mysqli_query($conn, $query);

    echo "<script>alert('Footer berhasil diperbarui!'); window.location='../admin/footer.php';</script>";
}

$query = "SELECT * FROM footer LIMIT 1";
$result = mysqli_query($conn, $query);
$footer = mysqli_fetch_assoc($result);
?>

<form method="post">
    <label>Deskripsi:</label>
    <textarea name="description" rows="4"><?php echo htmlspecialchars($footer['description']); ?></textarea>

    <label>Embed Google Maps:</label>
    <textarea name="location_embed" rows="3"><?php echo htmlspecialchars($footer['location_embed']); ?></textarea>

    <button type="submit">Simpan Perubahan</button>
</form>