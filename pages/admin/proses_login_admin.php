<?php

//session adalah tempat menyimpan data sementara di server untuk mengindentifikasi siapa yang sedang mengakses
session_start();
include("../header/config.php");

//jika tombol di klik
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    //cek di db
    $query = mysqli_query($koneksi, "SELECT * From tbl_admin WHERE username = '$uname' AND password = '$pass'");

    //jika data sementara ada
    if (mysqli_num_rows($query) == 1) {
        $data = mysqli_fetch_assoc($query);
        //var data (id, nama, kelas, jurusan)

        //simpan dalam session
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_admin'] = $data['id_admin'];
    }
}

?>


<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'Login Berhasil',
                text: 'Selamat datang di website Voting SMK PESAT',
                icon: 'success',
                showConfirmButton: false,
                timer: 2500
            }).then(() => {
                window.location.href = '../dashboard/dashboard.php  ';
            });
        </script>
</html>