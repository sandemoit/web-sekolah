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
	<meta name="author" content="Zhaf App">
	<meta property="og:image" content="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" />
	<title><?= $general['app_name'] ?> <?= $general['nama_sekolah']; ?></title>
	<meta content="Sistem Informasi Sekolah" name="keywords">

	<!-- Favicons -->
	<link href="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" rel="icon">
	<link href="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" rel="apple-touch-icon">

	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/all-fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/magnific-popup.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/main.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

	<style>
		figure td {
			border-style: none !important;
		}
	</style>
</head>

<body>

	<div class="preloader">
		<div class="loader-book">
			<div class="loader-book-page"></div>
			<div class="loader-book-page"></div>
			<div class="loader-book-page"></div>
		</div>
	</div>