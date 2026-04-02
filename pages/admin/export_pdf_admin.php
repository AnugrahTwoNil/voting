<?php 
include('../../TCPDF/tcpdf.php');
include('../header/config.php');

//query data
$query = mysqli_query($koneksi, "SELECT * FROM `tbl_admin`;");

//buat pdf
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//HEADER
$html = ' ';

//TABEL
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
    </thead>
</table>
';

$no = 1;
foreach ($query as $row) {
    $html .= '
    <table border="1" cellpadding="5"> 
        <tr>
            <td>' . $no++ .'</td>
            <td>' . $row['username'] . '</td>
            <td>' . $row['password'] . '</td>
            <td>' . $row['nama'] . '</td>
            <td>' . $row['alamat'] . '</td>
        </tr>
    </table>
    ';
}

//render
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_admin.pdf', 'I');
?>