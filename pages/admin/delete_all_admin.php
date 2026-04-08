<?php 
include "../header/config.php";

mysqli_query($koneksi, "DELETE FROM tbl_admin");

header("location:siswa.php");
exit();


?>