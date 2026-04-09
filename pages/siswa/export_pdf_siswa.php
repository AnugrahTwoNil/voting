<?php 
include('../../TCPDF/tcpdf.php');
include('../header/config.php');

//query data
$query = mysqli_query($koneksi, "SELECT * FROM `tbl_siswa`;");

//buat pdf
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//HEADER
$html = ' ';

//TABEL
$html .= '
<h2>Daftar Siswa SMK PESAT</h2>
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
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
            <td>' . $row['nama'] . '</td>
            <td>' . $row['kelas'] . '</td>
            <td>' . $row['jurusan'] . '</td>
            <td>' . $row['alamat'] . '</td>
        </tr>
    </table>
    ';
}

//render
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_siswa.pdf', 'I');
?>