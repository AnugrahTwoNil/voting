<?php
include "../header/config.php"; // sesuaikan dengan path


if (isset($_FILES['file_excel']['tmp_name'])) {


    $file = fopen($_FILES['file_excel']['tmp_name'], "r");


    $line = fgets($file);
    $delimiter = (strpos($line, ";") !== false) ? ";" : ",";
    rewind($file);


    $no = 0;
    while (($row = fgetcsv($file, 1000, "$delimiter")) !== FALSE) {


        //Untuk melewati baris pertama (header) di file CSV
        if ($no == 0) {
            $no++;
            continue;
        }


	   //kolom nama yang akan di import
        $nama     = $row[0];
        $kelas    = $row[1];
        $jurusan  = $row[2];
        $alamat   = $row[3];
        $foto     = $row[4];
        $email    = $row[5];
        $username = $row[6];
        $password = $row[7];

    mysqli_query($koneksi, "INSERT INTO tbl_siswa(nama, kelas, jurusan, alamat, username , password , email, foto) 
                    VALUES ('$nama','$kelas','$jurusan','$alamat','$username','$password','$email','$foto')");



        $no++;
    }


    fclose($file);


    echo "<script>
        alert('Import berhasil!');
        window.location='siswa.php';
    </script>";
}