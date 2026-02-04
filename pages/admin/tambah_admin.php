<?php
include "../header/header.php";
include "../header/config.php";

$current_page = basename($_SERVER['PHP_SELF']);

?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Admin</h6>
                </div>
                <form method="POST" class="ms-4">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Username :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="username" placeholder="Masukan Username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Password :</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="kelas" name="password" placeholder="Masukan Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="nama"
                                placeholder="Masukan Nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukan Alamat">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Daftarkan Admin</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $username = $_POST['username']; 
                    $password = $_POST['password'];
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];

                    $query = "INSERT INTO tbl_admin(username, password, nama, alamat) 
                    VALUES ('$username','$password','$nama','$alamat')";

                    $result = mysqli_query($koneksi, $query);

                    if ($result) {
                        echo "<script>
        Swal.fire({
            title: 'Good job!',
            text: 'Data Berhasil Disimpan!',
            icon: 'success'
        }).then(() => {
            window.location.href = 'admin.php';
        });
    </script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>