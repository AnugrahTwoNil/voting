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
    $email = $_POST['email'];

    $result = mysqli_query($koneksi, "UPDATE tbl_siswa SET 
        nama = '$nama',
        kelas = '$kelas',
        jurusan = '$jurusan',
        alamat = '$alamat',
        email = '$email'
        WHERE id_siswa = '$id'");

    if ($_FILES['foto']['name'] != "") {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $folder = "../../assets/img";

        move_uploaded_file($tmp, $folder . $foto);

        $sql = "UPDATE tbl_siswa SET
        nama = '$nama',
        email = '$email',
        kelas = '$kelas',
        jurusan = '$jurusan',
        alamat = '$alamat',
        foto = '$foto'
        WHERE id_siswa = '$id'";

    } else {
        $sql = "UPDATE tbl_siswa SET
        nama = '$nama',
        email = '$email',
        kelas = '$kelas',
        jurusan = '$jurusan',
        alamat = '$alamat'
        WHERE id_siswa = '$id'";
    }

    mysqli_query($koneksi, $sql);


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
                <form method="POST" class="ms-4" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required
                                value="<?= $siswa['nama'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" required
                                value="<?= $siswa['email'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas" required
                                value="<?= $siswa['kelas'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" required
                                placeholder="Masukan Jurusan" value="<?= $siswa['jurusan'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" required
                                placeholder="Masukan Alamat" value="<?= $siswa['alamat'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto :</label>
                        <div class="row">
                            <div class="col">
                                <img src="../../assets/img<?= $siswa['foto']; ?>" class="avatar avatar-sm m-3"
                                    style="object-fit">

                            </div>
                        </div>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Updatekan Siswa</button>
                </form>
            </div>
        </div>
    </div>
</div>