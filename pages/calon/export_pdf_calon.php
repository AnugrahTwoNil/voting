<?php 
include('../../TCPDF/tcpdf.php');
include('../header/config.php');

//query data
$query = mysqli_query($koneksi, "SELECT * FROM `tbl_calon`;");

//buat pdf
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//HEADER
$html = ' ';

//TABEL
$html .= '
<h2>Daftar Calon Ketua OSIS SMK PESAT</h2>

<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th>No</th>
            <th>Nama Calon</th>
            <th>Visi</th>
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
            <td>' . $row['nama'] . '</td>
            <td>' . $row['visi'] . '</td>
        </tr>
    </table>
    ';
}

//render
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_calon.pdf', 'I');
?>