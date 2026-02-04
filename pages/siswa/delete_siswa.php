<?php 
include "../header/config.php";

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa = '$id'");

header("location:siswa.php");
exit();


?>