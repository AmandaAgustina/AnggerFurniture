<?php
require_once('../admin/tcpdf/tcpdf.php');
include_once('../config/koneksi.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Data Produk');
$pdf->SetHeaderData('', 0, 'Data Produk', 'UD. Angger Kusen Mulyo');
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 10);
$pdf->AddPage();

$html = '<h2 align="center">Data Produk</h2>
<table border="1" cellspacing="1" cellpadding="5">
    <tr>
        <th width="5%">No</th>
        <th width="25%">Nama</th>
        <th width="50%">Deskripsi</th>
        <th width="20%">Nama Gambar</th>
    </tr>';

$query = "SELECT * FROM produk ORDER BY id ASC";
$result = mysqli_query($conn, $query);
$no = 1;

while ($row = mysqli_fetch_assoc($result)) {
    // Ambil nama file gambar
    $imageName = $row['gambar'];

    // Menambahkan baris tabel
    $html .= '<tr>
        <td>' . $no . '</td>
        <td>' . $row['nama'] . '</td>
        <td>' . $row['deskripsi'] . '</td>
        <td>' . $imageName . '</td>
    </tr>';
    $no++;
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('data_produk.pdf', 'D');
