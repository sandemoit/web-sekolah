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
				<h1><?= $subjudul ?></h1>
				<ol>
					<li><a href="<?= base_url('') ?>">Home</a></li>
					<li><?= $judul ?></li>
					<li><?= $subjudul ?></li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs Section -->

	<section class="inner-page">
		<div class="container">


			<!------ Include the above in your HEAD tag ---------->

			<link rel="stylesheet"
				href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
			<link rel="stylesheet" href="css/style.css">

			<section class="portfolio" id="portfolio">
				<div class="container-fluid">
					<div class="row">
						<style>
							/*	gallery */

							.gallery-title {
								font-size: 36px;
								color: #3F6184;
								text-align: center;
								font-weight: 500;
								margin-bottom: 70px;
							}

							.filter-button {
								font-size: 18px;
								border: 2px solid #3F6184;
								padding: 5px 10px;
								text-align: center;
								color: #3F6184;
								margin-bottom: 30px;
								background: transparent;
							}

							.filter-button:hover,
							.filter-button:focus,
							.filter-button.active {
								color: #ffffff;
								background-color: #3F6184;
								outline: none;
							}

							.gallery_product {
								margin: 0px;
								padding: 0;
								position: relative;
							}

							.gallery_product .img-info {
								position: absolute;
								background: rgba(0, 0, 0, 0.5);
								left: 0;
								right: 0;
								bottom: 0;
								padding: 20px;
								overflow: hidden;
								color: #fff;
								top: 0;
								display: none;
								-webkit-transition: 2s;
								transition: 2s;
							}

							.gallery_product:hover .img-info {
								display: block;
								-webkit-transition: 2s;
								transition: 2s;
							}

							/*	end gallery */

						</style>

						


                <?php  foreach ($foto as $foto) { ?>
						<div class="gallery_product col-sm-3 col-xs-6 filter category1">
							<a class="fancybox" rel="ligthbox" href="<?= base_url('uploads/gallery/').$foto->foto ?>">
								<img class="img-fluid" alt="" src="<?= base_url('uploads/gallery/').$foto->foto ?>" />
								<div class='img-info'>
									<h4><?= $foto->judul ?></h4>
								</div>
							</a>
						</div>
				<?php } ?>


						

					</div>
				</div>
			</section>

			



		</div>
	</section>


</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>

				$(document).ready(function () {
					$(".fancybox").fancybox({
						openEffect: "none",
						closeEffect: "none"
					});
				});

</script>
