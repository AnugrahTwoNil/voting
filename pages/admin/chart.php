<?php
include "../header/header.php";
include "../header/config.php";

$current_page = basename($_SERVER['PHP_SELF']);

$query = mysqli_query($koneksi, "SELECT tbl_calon.nama, count(tbl_voting.id_calon) AS Jumlah
FROM tbl_calon INNER JOIN tbl_voting 
ON tbl_voting.id_calon=tbl_calon.id_calon
GROUP BY tbl_voting.id_calon;");

foreach ($query as $row) {
    $nama[] = $row['nama'];
    $jumlah[] = $row['Jumlah'];
}
?>
<div class="container">
    <div class="card-body pb-0 p-3 bg-white border-radius-lg p-5 pb-5 mt-3">
<h3 align="center"> Grafik Perolehan Suara Ketua Osis</h3>
<h5 align="center" class="pb-4">SMK Informatika Pesat</h5>


    <canvas id='myChart' height="100px"></canvas>



<!-- CHART SCRIPT -->
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const nama = <?= json_encode($nama) ?>;
    const jumlah = <?= json_encode($jumlah) ?>;


    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nama,
            datasets: [{
                label: 'Jumlah Suara',
                data: jumlah,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</div></div>    