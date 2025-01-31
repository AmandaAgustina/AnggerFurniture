<?php
include_once('../config/koneksi.php');
include_once('../admin/layout/header.php');
?>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Gambar Beranda</h1>
        <a href="../admin/crud_home/create.php"><button type="button" class="btn btn-primary">Tambah Gambar</button></a>
    </div>
    <br />
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM home ORDER BY id ASC";
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
                    <td>
                        <img src="../admin/crud_home/gambar/<?php echo $row['gambar1']; ?>" style="width: 100px;">
                        <img src="../admin/crud_home/gambar/<?php echo $row['gambar2']; ?>" style="width: 100px;">
                        <img src="../admin/crud_home/gambar/<?php echo $row['gambar3']; ?>" style="width: 100px;">
                    </td>
                    <td>
                        <a href="../admin/crud_home/update.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">
                                Edit</button></a>
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