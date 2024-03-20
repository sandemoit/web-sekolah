<?php
  $general = $this->db->get('general')->row_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?php echo $detail->judul ?>">
    <meta property="og:description" content="<?php echo $detail->judul ?>">
    <meta property="og:image" content="<?php echo base_url() ?>uploads/kegiatan/<?php echo $detail->foto ?>">
    <meta property="og:url" content="<?= site_url('berita-detail/' . $detail->slug); ?>">
    <meta property="og:type" content="article">
	<title><?= $general['app_name'] ?>  <?= $general['nama_sekolah']; ?></title>

	<!-- Favicons -->
	<link href="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" rel="icon">
	<link href="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" rel="apple-touch-icon">

	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/all-fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/magnific-popup.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/barunih/') ?>css/style.css">
</head>

<body>

	<div class="preloader">
		<div class="loader-book">
			<div class="loader-book-page"></div>
			<div class="loader-book-page"></div>
			<div class="loader-book-page"></div>
		</div>
	</div>
