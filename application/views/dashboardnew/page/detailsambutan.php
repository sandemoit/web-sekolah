<?php $this->load->view('dashboardnew/partial/header'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main class="main">

<div class="site-breadcrumb" style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
		<div class="container">
			<h2 class="breadcrumb-title"><?= $subjudul ?></h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?= base_url('') ?>">Home</a></li>
				<li class="active"><?= $subjudul ?></li>
			</ul>
		</div>
	</div>


	<div class="about-area py-120">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="about-left wow fadeInLeft" data-wow-delay=".25s">
						<div class="about-img">
							<img src="<?= base_url('uploads/kepalasekolah/').$sambutankepsek->foto_kepsek ?>" alt>
						</div>
						<div class="about-experience">
							<div class="about-experience-icon">
								<img src="<?= base_url("") ?>assets/barunih/img/icon/exchange-idea.svg" alt>
							</div>
							<b class="text-start">Kepala Sekolah</b>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-right wow fadeInRight" data-wow-delay=".25s">
						<div class="site-heading mb-3">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Sambutan</span>
							<h2 class="site-title">
								Sambutan <span>Kepala Sekolah.</span> 
							</h2>
						</div>
						<p class="about-text">
						<?= $sambutankepsek->sambutan ?>
							
						</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
