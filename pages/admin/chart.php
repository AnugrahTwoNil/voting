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
    <div class="card">
        <div class="card-header">
            <form action="export_pdf.php" method="POST" target="_blank">
                <input type="hidden" name="chart_image" id="chart_image">
                <button type="submit" onclick="exportPDF()" class="btn btn-danger">
                    Export PDF
                </button>
            </form>
        </div>
        <div class="card-body bg-white border-radius-lg pb-5">
            <div id="areaPDF">
<h3 align="center"> Grafik Perolehan Suara Ketua Osis</h3>
<h5 align="center" class="pb-4">SMK Informatika Pesat</h5>


    <canvas id='myChart' height="100px"></canvas>



<!-- CHART SCRIPT -->
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const nama = <?= json_encode($nama) ?>;
    const jumlah = <?= json_encode($jumlah) ?>;


    const ctx = document.getElementById('myChart');

    const myChart = new Chart(ctx, {
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

    function exportPDF() {
        document.getElementById('chart_image').value = myChart.toBase64Image();
    }
</script>
            </div>
        </div>
    </div>        
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card px-0 pt-0 pb-2">
                    <div class="table p-0">
                        <table class="table align-items-center mb-0 mt-3">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        No</th>
                                    <th
    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center"> Nama
    </th>
    <th
    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Jumlah Suara</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            ?>
                                <?php foreach ($query as $row) { ?>
                            <tbody>
                                    <tr>
                                        <td>
                                                    <p class="text-center"><?= $no++; ?></p>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col mt-2">
                                                <p class="text-center"><?= $row['nama']; ?></p>
                                        </td>
                                                </div>
                                            </div>
                                            <td>
                                        <p class="text-center"><?= $row['Jumlah']; ?></p>
                        
                        </td>
                    <?php } ?>
                    </div>
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>