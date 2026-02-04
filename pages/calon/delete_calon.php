<?php 
include "../header/config.php";

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_calon WHERE id_calon = '$id'");

header("location:calon.php");
exit();


?>