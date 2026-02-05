<?php
include "../header/config.php";

$current_page = basename($_SERVER['PHP_SELF']);

$id = $_GET["id"] ?? null;

if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_calon WHERE id_calon = '$id'");
    $calon = mysqli_fetch_assoc($query);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    if ($_FILES['foto']['name'] != "") {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
    

    $folder = "../../assets/img";
    
    move_uploaded_file($tmp, $folder . $foto);

    $sql = "UPDATE tbl_calon SET 
        nama = '$nama',
        visi = '$visi',
        misi = '$misi',
        foto = '$foto'
        WHERE id_calon = '$id'";
} else {
    $sql = "UPDATE tbl_calon SET 
        nama = '$nama',
        visi = '$visi',
        misi = '$misi',
        WHERE id_calon = '$id'";
}
        mysqli_query($koneksi, $sql);
    header("location:calon.php");
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
                <form method="POST" class="ms-4" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required
                                value="<?= $calon['nama'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="visi" class="col-sm-2 col-form-label">Visi :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="visi" name="visi" placeholder="Masukan Visi" required
                                value="<?= $calon['visi'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="misi" class="col-sm-2 col-form-label">Misi :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="misi" name="misi" placeholder="Masukan Misi" required
                                value="<?= $calon['misi'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto :</label>
                        <div class="row">
                            <div class="col">
                                <img src="../../assets/img<?= $calon['foto']; ?>" class="avatar avatar-sm m-3" style="object-fit">
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan Foto" required
                                value="<?= $calon['foto'] ?>">
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

                    $query = "INSERT INTO tbl_calon(username, password, nama, alamat) 
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