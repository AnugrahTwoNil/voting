<?php 
include "../header/config.php";

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_admin WHERE id_admin = '$id'");

header("location:admin.php");
exit();


?>