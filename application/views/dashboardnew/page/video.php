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
    <style>
	.video-thumbnail {
		height:20em;
		cursor: pointer;
	}

</style>

	<div class="gallery-area py-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<div class="site-heading text-center">
					<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Gallery Video</span>
					<h2 class="site-title">Our Video <span>Gallery</span></h2>
					
				</div>
			</div>
		</div>
		<div class="row popup-gallery">
        <?php  foreach ($video as $video) { ?>


			<div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
            <div class="video-thumbnail">
						<?php echo $video->url; ?>
					</div>
			</div>
		
				<?php } ?>
        
		</div>
	</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
