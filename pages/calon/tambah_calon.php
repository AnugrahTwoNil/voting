<?php
include "../header/header.php";
include "../header/config.php";

$curren_page = basename($_SERVER['PHP_SELF']);

?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Calon</h6>
                </div>
                <form method="POST" class="ms-4" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Visi :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="visi" placeholder="Masukan Visi" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jurusan" class="col-sm-2 col-form-label">Misi :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="misi" placeholder="Masukan Misi" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Foto :</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="alamat" name="foto" required>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Daftarkan Calon</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $nama = $_POST['nama'];
                    $visi = $_POST['visi'];
                    $misi = $_POST['misi'];



                    //folder upload
                    $folder = "../../assets/img";

                    //take the file
                    $nama_file = $_FILES['foto']['name'];
                    $tmp_file = $_FILES['foto']['tmp_name']; // = take the temporary file

                    //$_FILES is a variable that stores files that are uploaded via a form
                    // ['foto] is the name in the form
                    //['name'] is to get the file name
                    //['tmp_name'] is to get the temporary location of the file

                    //make a unique file name so multiple images don't collide and overwrite eachother
                    $namaBaru = time() . "_" . $nama_file;
                    
                    //move the file to the folder
                    move_uploaded_file($tmp_file, $folder . $namaBaru);

                    mysqli_query
                    ($koneksi, "INSERT INTO tbl_calon(nama, visi, misi, foto) VALUES ('$nama','$visi','$misi','$namaBaru')");
                    //insert into table

                    // $query = "INSERT INTO tbl_calon(nama, visi, misi, foto) 
                    // VALUES ('$nama','$visi','$misi','$namaBaru')";

                    //success
                    if (mysqli_query($koneksi, $query)) {
                        echo "<script>
        Swal.fire({
            title: 'Good job!',
            text: 'Data Berhasil Disimpan!',
            icon: 'success'
        }).then(() => {
            window.location.href = 'calon.php';
        });
    </script>";
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