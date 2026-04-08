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
        $username     = $row[0];
        $password    = $row[1];
        $nama  = $row[2];
        $alamat   = $row[3];
        $foto     = $row[4];

    mysqli_query($koneksi, "INSERT INTO tbl_admin(username, password, nama, alamat, foto) 
                    VALUES ('$username','$password','$nama','$alamat','$foto')");



        $no++;
    }


    fclose($file);


    echo "<script>
        alert('Import berhasil!');
        window.location='admin.php';
    </script>";
}