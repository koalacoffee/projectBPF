<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GameQuiz Perubahan Materi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/') ?>img/favicon_game.png" rel="icon">
  <link href="<?= base_url('assets/') ?>img/apple-touch-icon_game.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet">

  <!-- Icon Lists -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ensure jQuery is loaded -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Ensure Bootstrap JS is loaded -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Option 1: Include in HTML -->
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/') ?>img/logo_game.png" alt="">
        <span class="d-none d-lg-block">Quiz Game</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?= base_url('Profil/') ?>">
            <img src="<?= base_url("assets/img/profile/").$user['gambar'];?>" alt="Profile" class="rounded-circle mr-2">
            <span class="d-none d-md-block"><?=  $user['nama'];?> </span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Menu</li>
      <?php
      if ($user['role'] == 'admin'){ ?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('Mahasiswa/') ?>">
          <i class="fa fa-group"></i>
          <span>Mahasiswa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('Prodi/') ?>">
          <i class="fa fa-group"></i>
          <span>Prodi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('Admin/') ?>">
          <i class="ri-admin-line"></i>
          <span>Beranda Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('GameQuiz/') ?>">
          <i class="bi bi-house"></i>
          <span>Beranda Pengguna</span>
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('Profil/') ?>">
          <i class="bi bi-person"></i>
          <span>Profil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('auth/logout') ?>">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>
      <?php } else { ?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('GameQuiz/') ?>">
          <i class="bi bi-house"></i>
          <span>Beranda</span>
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('Profil/') ?>">
          <i class="bi bi-person"></i>
          <span>Profil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('auth/logout') ?>">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>
      <?php } ?>
    </ul>
  </aside><!-- End Sidebar-->