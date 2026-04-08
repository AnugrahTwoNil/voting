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
        $visi    = $row[1];
        $foto  = $row[2];


    mysqli_query($koneksi, "INSERT INTO tbl_calon(nama, visi, foto) 
                    VALUES ('$nama','$visi','$foto')");



        $no++;
    }


    fclose($file);


    echo "<script>
        alert('Import berhasil!');
        window.location='calon.php';
    </script>";
}