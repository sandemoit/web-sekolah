<?php $this->load->view('dashboardnew/partial/header'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main class="main">

	<div class="site-breadcrumb"
		style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
		<div class="container">
			<h2 class="breadcrumb-title"><?= $judul ?></h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?= base_url('') ?>">Home</a></li>
				<li class="active"><?= $judul ?></li>
			</ul>
		</div>
	</div>


	<div class="py-120">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="terms-content">
						<h3><?= $judul ?></h3>
						<img src="<?= base_url('uploads/denahbangunan/').$denahbangunan->denahbangunan ?>"
							class="img-fluid" alt="">
					</div>

				</div>
			</div>
		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
