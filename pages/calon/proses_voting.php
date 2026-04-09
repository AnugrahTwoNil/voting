
<?php 
session_start();
include "../header/config.php";

//ambil id siswa dari session
$id = $_SESSION['id_siswa'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_calon = $_POST['id_calon'];

    $tanggal = date("Y-m-d H:i:s");

    //cek apakah sudah pernah voting atau belum
    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_voting WHERE id_siswa = '$id'");



    if(mysqli_num_rows($cek) > 0) {
        //kalau sudah pernah vote
        $status = "Sudah_Vote";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_voting(id_calon, tanggal, id_siswa) 
                    VALUES ('$id_calon','$tanggal','$id')");
        if ($simpan) {
            $status = "Sukses";
        } else {
            $status = "Gagal";
        }
    }
};
?>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        <?php if ($status == "Sukses") { ?>
            Swal.fire({
                icon: 'sucess',
                title: 'Berhasil!',
                text: 'Terimakasih sudah memberikan suara untuk calon ketua osis',
                showConfirmButton: false,
                timer: 2500
}).then(() => {
                window.location.href = '../../index.php';
            });
        <?php } else if ($status == "Sudah_Vote") { ?>
            Swal.fire({
                icon: 'warning',
                title: 'Maaf!',
                text: 'Maaf, kamu sudah memberikan suara untuk calon ketua osis',
                showConfirmButton: false,
                timer: 2500
            }).then(() => {
                window.location.href = '../../index.php';
            });
        <?php } else { ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Maaf, terjadi kesalahan saat menyimpan suara kamu',
                showConfirmButton: false,
                timer: 2500
            }).then(() => {
                window.location.href = '../../index.php';
            });
        <?php } ?>


    </script>
</body>
</html>
