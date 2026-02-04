<?php
include "../header/config.php";

$current_page = basename($_SERVER['PHP_SELF']);

$id = $_GET["id"] ?? null;

if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa = '$id'");
    $siswa = mysqli_fetch_assoc($query);
}

include "../header/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($koneksi, "UPDATE tbl_siswa SET 
        nama = '$nama',
        kelas = '$kelas',
        jurusan = '$jurusan',
        alamat = '$alamat'
        WHERE id_siswa = '$id'");

    if ($result) {
        echo "<script>
        Swal.fire({
            title: 'Good job!',
            text: 'Data Berhasil Diedit!',
            icon: 'success'
        }).then(function() {
            window.location.href = 'siswa.php';
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
                    <h6>Edit Data Siswa</h6>
                </div>
                <form method="POST" class="ms-4">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukan nama" value="<?= $siswa['nama'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="kelas"
                                placeholder="Masukan Kelas" value="<?= $siswa['kelas'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukan Jurusan" value="<?= $siswa['jurusan'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukan Alamat" value="<?= $siswa ['alamat'] ?>">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Updatekan Siswa</button>
                </form>
            </div>
        </div>
    </div>
</div>