<?php $this->load->view('dashboard/partial/header'); ?>
<?php $this->load->view('dashboard/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main id="main">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2><?= $subjudul ?></h2>
				<ol>
					<li><a href="<?= base_url('') ?>">Home</a></li>
					<li><?= $judul ?></li>
					<li><?= $subjudul ?></li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs Section -->


	<section id="about" class="about  ">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Sambutan Kepala Sekolah</h2>


				</div>

				<div class="row  ">
					<div class="col-lg-6" data-aos="fade-right">
						<img src="<?= base_url('uploads/kepalasekolah/').$sambutankepsek->foto_kepsek ?>"
							class="img-fluid" alt="">
					</div>
					<div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
						<?= $sambutankepsek->sambutan ?><br>
						
					</div>
				</div>

			</div>
		</section><!-- End About Us Section -->



</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
