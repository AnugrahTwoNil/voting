<?php
include "../header/config.php";

$curren_page = basename($_SERVER['PHP_SELF']);

$id = $_GET["id"] ?? null;

if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin = '$id'");
    $admin = mysqli_fetch_assoc($query);
}

include "../header/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $folder = "../../assets/img/";

    if ($_FILES['foto']['name'] != "") {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, $folder . $foto);

        $sql = "UPDATE tbl_admin SET 
        username = '$username',
        password = '$password',
        nama = '$nama',
        alamat = '$alamat',
        foto = '$foto'
        WHERE id_admin = '$id'";
    } else {
        $sql = "UPDATE tbl_admin SET 
        username = '$username',
        password = '$password',
        nama = '$nama',
        alamat = '$alamat'
        WHERE id_admin = '$id'";
    }

    $query = mysqli_query($koneksi, $sql);

    $result = mysqli_query($koneksi, "UPDATE tbl_admin SET 
        nama = '$nama',
        password = '$password',
        nama = '$nama',
        alamat = '$alamat'
        WHERE id_admin = '$id'");

    if ($result) {
        echo "<script>
        Swal.fire({
            title: 'Good job!',
            text: 'Data Berhasil Diedit!',
            icon: 'success'
        }).then(function() {
            window.location.href = 'admin.php';
        });
        </script>";
        exit;
    }
}


?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Data Admin</h6>
                </div>
                <form method="POST" class="ms-4" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Username :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="username"
                                placeholder="Masukan Username" required value="<?= $admin['username'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Password :</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="kelas" name="password" required
                                placeholder="Masukan Password" value="<?= $admin['password'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="nama" required placeholder="Masukan Nama" value="<?= $admin['nama'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" required
                                placeholder="Masukan Alamat" value="<?= $admin ['alamat'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto :</label>
                        <div class="row">
                            <div class="col">
                                <img src="../../assets/img<?= $admin['foto']; ?>" class="avatar avatar-sm m-3" style="object-fit">
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Updatekan Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>