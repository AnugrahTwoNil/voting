<?php 

session_start();

//hapus semua session
session_unset();
session_destroy();

//arahkan ke halaman login
header("Location: login_admin.php");
exit();


?>