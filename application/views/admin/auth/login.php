<?php
  $setting = $this->db->get('general')->row_array();  
?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('') ?>assets/"
	data-template="vertical-menu-template-free">

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Login Admin">
	<meta name="author" content="Admin">
	<title><?= $title ?> <?= $setting['nama_sekolah']; ?></title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />
	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/fonts/boxicons.css" />
	<!-- Core CSS -->
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/css/demo.css" />
	<!-- Vendors CSS -->
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<!-- Page CSS -->
	<!-- Page -->
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/pages/page-auth.css" />
	<!-- Helpers -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/toastr/toastr.min.css">
	<script src="<?= base_url('') ?>assets/vendor/js/helpers.js"></script>
	<script src="<?= base_url('') ?>assets/js/config.js"></script>
</head>

<body>
	<!-- Content -->
    
	<div class="container-xxl">
        
		<div class="authentication-wrapper authentication-basic container-p-y">
            
			<div class="authentication-inner">
            
				<!-- Register -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
                        <div class="text-center">
											<img src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>"width="180" alt="" />
										</div>
						<div class="app-brand justify-content-center">
                     
							<a href="index.html" class="app-brand-link gap-2">
								
								<span class="app-brand-text demo text-body fw-bolder">Login Admin</span>
							</a>
						</div>
						<!-- /Logo -->
					
						<form id="formlogin" class="mb-3" >
							<div class="mb-3 form-group">
								<label for="email" class="form-label"> Username</label>
								<input type="text" class="form-control" id="username" name="username"
									placeholder="Enter your  username" autofocus />
							</div>
							<div class="mb-3 form-password-toggle form-group">
								<div class="d-flex justify-content-between">
									<label class="form-label" for="password">Password</label>
									
								</div>
								<div class="input-group input-group-merge">
									<input type="password" id="password" class="form-control" name="password"
										placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
										aria-describedby="password" />
									<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
								</div>
							</div>
							<div class="mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="remember-me" />
									<label class="form-check-label" for="remember-me"> Remember Me </label>
								</div>
							</div>
							<div class="mb-3">
								<button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
							</div>
						</form>

						<p class="text-center">
							<span><?= $title ?></span>
							
						</p>
					</div>
				</div>
				<!-- /Register -->
			</div>
		</div>
	</div>

	<!-- / Content -->

	

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	
	<script src="<?= base_url('') ?>assets/vendor/libs/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>assets/vendor/libs/popper/popper.js"></script>
	<script src="<?= base_url('') ?>assets/vendor/js/bootstrap.js"></script>
	<script src="<?= base_url('') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
	<script src="<?= base_url('assets/js/') ?>jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/toastr/toastr.min.js"></script>
	<script src="<?= base_url('') ?>assets/vendor/js/menu.js"></script>
	<script src="<?= base_url('') ?>assets/js/main.js"></script>
    <script>var base_url = '<?php echo base_url() ?>';</script>
	<script src="<?= base_url('assets/js/custom/') ?>authadmin.js"></script>



</body>

</html>
