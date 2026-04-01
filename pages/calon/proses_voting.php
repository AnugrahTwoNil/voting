<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
session_start();
include "../header/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_calon = $_POST['id_calon'];

    $tanggal = date("Y-m-d H:i:s");

    $query = "INSERT INTO tbl_voting(id_calon, tanggal, id_siswa) 
                    VALUES ('$id_calon','$tanggal','0')";


    $Result = mysqli_query($koneksi, $query);
    
    echo "<script>        Swal.fire({
            title: 'Good job!',
            text: 'Data Berhasil Disimpan!',
            icon: 'success'
        }).then(() => {
            window.location.href = '../../index.php';
        });
    </script>";
}

?>

