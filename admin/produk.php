<?php
include_once('../admin/layout/header.php');
include_once('../config/koneksi.php');
?>
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Data Produk</h1>

        <a href="../admin/crud_produk/create.php">
            <button class="btn btn-primary">+ &nbsp; Tambah Produk</button>
        </a>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownCetak" data-bs-toggle="dropdown" aria-expanded="false">
                Cetak Semua Produk
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownCetak">
                <li><a class="dropdown-item" href="excel.php">Cetak Excel</a></li>
                <li><a class="dropdown-item" href="pdf.php">Cetak PDF</a></li>
            </ul>
        </div>

    </div>
    <br />

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Cek apakah ada query pencarian
            $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

            // SQL dasar
            $query = "SELECT * FROM produk";

            // Tambahkan WHERE jika ada pencarian
            if (!empty($searchQuery)) {
                $query .= " WHERE nama LIKE '%" . mysqli_real_escape_string($conn, $searchQuery) . "%' 
                            OR deskripsi LIKE '%" . mysqli_real_escape_string($conn, $searchQuery) . "%'";
            }

            $query .= " ORDER BY id ASC";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
            }

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                    <td style="text-align: center;"><img src="../admin/crud_produk/gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                    <td>
                        <a href="../admin/crud_produk/update.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Edit</button></a> |
                        <a href="../admin/crud_produk/delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><button class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include_once('layout/footer.php')
?>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>