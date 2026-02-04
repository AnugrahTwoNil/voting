<?php
include "../header/config.php";

$curren_page = basename($_SERVER['PHP_SELF']);

$id = $_GET["id"] ?? null;

if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_calon WHERE id_calon = '$id'");
    $calon = mysqli_fetch_assoc($query);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $foto = $_POST['foto'];

    mysqli_query($koneksi, "UPDATE tbl_calon SET 
        nama = '$nama',
        visi = '$visi',
        misi = '$misi',
        foto = '$foto'
        WHERE id_calon = '$id'");

        header("Location: calon.php");
        exit;
}

include "../header/header.php";
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Data Calon</h6>
                </div>
                <form method="POST" class="ms-4">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukan nama" value="<?= $calon['nama'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Visi :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="visi"
                                placeholder="Masukan Visi" value="<?= $calon['visi'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Misi :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="misi" placeholder="Masukan Misi" value="<?= $calon['misi'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Foto :</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="alamat" name="foto"
                                placeholder="Masukan Alamat" value="<?= $calon ['foto'] ?>">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Updatekan Calon</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];

                    $query = "INSERT INTO tbl_admin(username, password, nama, alamat) 
                    VALUES ('$username','$password','$nama','$alamat')";

                    if (mysqli_query($koneksi, $query)) {
                        echo "<div class='alert alert-success text-center'>Data Berhasil Disimpan</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center'>
                Gagal : " . mysqli_error($koneksi) . "
            </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>