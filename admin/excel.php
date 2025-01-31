<?php
include_once('../config/koneksi.php');

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data produk.xls");
?>
<!DOCTYPE html>
<html>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM produk ORDER BY id ASC";
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
                    <td style="text-align: center;"><?php echo $row['gambar'] ?></td>

                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    </div>
</body>

</html>