<?php 
include('../../TCPDF/tcpdf.php');
include('../header/config.php');

//ambil gambar chart
$chartImage = $_POST['chart_image'] ?? '';

//query data
$query = mysqli_query($koneksi, "SELECT tbl_calon.nama, count(tbl_voting.id_calon) AS Jumlah
FROM tbl_calon INNER JOIN tbl_voting 
ON tbl_voting.id_calon=tbl_calon.id_calon
GROUP BY tbl_voting.id_calon;");

//buat pdf
$pdf = new TCPDF();
$pdf->AddPage();

//tanggal
$tanggal = date('d-m-Y');

//HEADER
$html = ' ';

//GRAFIK
if(!empty($chartImage)) {
    $html .= '<div>
            <img src = "'.$chartImage.'" width="500">
    </div>';
}

//TABEL
$html .= '

<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th>No</th>
            <th>Nama Calon</th>
            <th>Perolehan Suara</th>
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
            <td>' . $row['Jumlah']. '</td>
        </tr>
    </table>
    ';
}

//render
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_voting.pdf', 'I');
?>