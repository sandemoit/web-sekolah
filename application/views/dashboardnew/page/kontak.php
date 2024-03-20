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


	<div class="contact-area py-120">
		<div class="container">
			<div class="contact-content">
				<div class="row">
					<div class="col-md-4">
						<div class="contact-info">
							<div class="contact-info-icon">
								<i class="fal fa-map-location-dot"></i>
							</div>
							<div class="contact-info-content">
								<h5>Alamat Sekolah</h5>
								<p><?= $general['alamat'] ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-info">
							<div class="contact-info-icon">
								<i class="fal fa-phone-volume"></i>
							</div>
							<div class="contact-info-content">
								<h5>Call Us</h5>
								<p><?= $general['whatsapp'] ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-info">
							<div class="contact-info-icon">
								<i class="fal fa-envelopes"></i>
							</div>
							<div class="contact-info-content">
								<h5>Email Us</h5>
								<p><a href="#" class="__cf_email__"
										data-cfemail="7d14131b123d18051c100d1118531e1210"><?= $general['account_gmail'] ?></a></p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="contact-wrapper">
				<div class="row">
					<div class="col-lg-5">
						<div class="contact-img">
							<img src="<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>" style="width:100%; height:34em;" alt>
						</div>
					</div>
					<div class="col-lg-7 align-self-center">
						<div class="contact-form">
							<div class="contact-form-header">
								<h2>Kirim Pesan</h2>
								
							</div>
							<form action="<?= base_url('dashboard/kirimpesan') ?>" method="post"
								id="contact-form">
								<div class="row">
								<div class="col-md-6 form-group">
									<input type="text" name="name" class="form-control" id="name"
										placeholder="Your Name" required="">
								</div>
								<div class="col-md-6 form-group mt-3 mt-md-0">
									<input type="email" class="form-control" name="email" id="email"
										placeholder="Your Email" required="">
								</div>
							</div>
							<div class="form-group mt-3">
								<input type="text" class="form-control" name="subject" id="subject"
									placeholder="Subject" required="">
							</div>
							<div class="form-group mt-3">
								<textarea class="form-control" name="message" rows="7" placeholder="Message"
									required=""></textarea>
							</div>
								<button type="submit" class="theme-btn">Send
									Message <i class="far fa-paper-plane"></i></button>
								<div class="col-md-12 mt-3">
									<div class="form-messege text-success"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
