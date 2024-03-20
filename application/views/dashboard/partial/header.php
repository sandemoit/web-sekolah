<?php
  $general = $this->db->get('general')->row_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	<meta property="og:title" content="<?= $general['app_name'] ?> <?= $general['nama_sekolah']; ?>">
	<meta property="og:url" content="<?= base_url() ?>" />
	<meta name="description" content="<?= $general['app_name'] ?>  <?= $general['nama_sekolah']; ?>">
	<meta name="author" content="muhamad brilliant">
	<meta property="og:image" content="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" />
	<title><?= $general['app_name'] ?>  <?= $general['nama_sekolah']; ?></title>
	<meta content="Sistem Informasi Sekolah" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" rel="icon">
  <link href="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/dashboard/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/main.css">
  




  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/dashboard/') ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        
        <a class="text-white me-3" href="mailto:<?= $general['account_gmail'] ?>"><i class="bi bi-envelope"></i> <?= $general['account_gmail'] ?></a> 
        <i class="bi bi-phone "></i><span><?= $general['whatsapp'] ?></span>
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-calendar"></i> <div id="date" class="mr-2"></div><span>-</span><i class="bi bi-clock"></i> <div id="clock"></div> 
      </div>
    </div>
  </div>