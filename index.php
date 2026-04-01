<?php

session_start();
//kalau session login belum ada
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

include("pages/header/config.php");

$current_page = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - QuickStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo osis.png" alt="">
        <h1 class="sitename">VoteGo</h1>
      </a>

      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

      <a class="btn-getstarted" href=""><?= $_SESSION['nama'] ?></a>

      <a href="#" onclick="Logout()" class="btn btn-danger" style="font-size:14px; padding: 8px 25px; margin: 0 0 0 10px; border-radius: 50px; transition: 0.3s;">Logout</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <form action="pages/calon/proses_voting.php" method="POST" id="formVote">
      <input type="hidden" id="id_calon" name="id_calon">
      <section id="hero" class="hero section">
        <div class="hero-bg">
          <img src="assets/img/hero-bg-light.webp" alt="">
        </div>
        <div class="container text-center">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <h1 data-aos="fade-up">Voting Calon <span>Ketua Osis</span></h1>
            <p data-aos="fade-up" data-aos-delay="100">Klik Sekarang Tentukan Masa Depan<br></p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="300">
              <?php
              $no = 1;
              $data = mysqli_query($koneksi, "select * FROM tbl_calon");
              ?> <?php foreach ($data as $row) { ?>
                <div class="col-md-4">
                  <div class="card text-center shadow calon-card" onclick="pilihcalon(<?= $row['id_calon'] ?>, this)">
                    <div class="card-body">
                      <img src="assets/img<?= $row['foto']; ?>" style="object-fit: cover; Width: 200px; height: 200px;" class="mb-3 rounded-circle">
                      <h5 class="card-title"><?= $row['nama']; ?></h5>
                      <p class="card-text"><?= $row['visi']; ?></p>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <button type="submit" class="btn btn-lg btn-primary mt-5" id="btnpilih" name="calon" disabled>
              Pilih
            </button>
          </div>
    </form>
    <!-- </section> /Hero Section -->

    <!-- Featured Services Section -->


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>


    <script>


      //buat fungsi pertama pilihcalon yang menerima 2 data.
      function pilihcalon(id, card) {
        //isi hidden input 
        // kode ini nyimpen nomor calon yang klik ke input id_calon
        document.getElementById('id_calon').value = id;

        //aktifkan tombol kirim
        document.getElementById('btnpilih').disabled = false;

        //ambil semua elemen yang punya nama class "calon-card" lalu simpan dalam variable semua_card
        let semua_card = document.querySelectorAll('.calon-card');

        //reset semua tanda di card
        semua_card.forEach(kartu_satuan => {
          kartu_satuan.classList.remove("border-info", "border-3");
        })

        //beri tanda yang dipilih
        card.classList.add("border-info", "border-3");
      }
    </script>

    <script>
      function Logout() {
        Swal.fire({
          title: 'Yakin ingin logout?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, logout!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'logout.php';
          }
        })
      }
    </script>

</body>

</html>