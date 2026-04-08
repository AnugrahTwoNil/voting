<?php 
include "../header/config.php";

mysqli_query($koneksi, "DELETE FROM tbl_siswa");

header("location:siswa.php");
exit();


?>