<?php
  $setting = $this->db->get('general')->row_array();  
  $akun = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row();
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="<?= base_url('') ?>assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<title><?= $setting['app_name']; ?> <?= $setting['nama_sekolah']; ?></title>
	<meta name="description" content="" />
	<link rel="icon" type="image/x-icon" href="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/fonts/boxicons.css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/theme-default.css"
		class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/css/demo.css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/libs/apex-charts/apex-charts.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/toastr/toastr.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/datatable/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/datatable/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/main.css">

	<script src="<?= base_url('') ?>assets/vendor/js/helpers.js"></script>
	<script src="<?= base_url('') ?>assets/js/config.js"></script>
	
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">
				<div class="app-brand demo">
					<a href="<?= base_url('admin') ?>" class="app-brand-link">
						<img src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>" width="50"
							alt="" />
						<span class="app-brand-text demo menu-text fw-bolder ms-2">Admin..</span>
					</a>

					<a href="javascript:void(0);"
						class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
						<i class="bx bx-chevron-left bx-sm align-middle"></i>
					</a>
				</div>

				<div class="menu-inner-shadow"></div>

				<ul class="menu-inner py-1">
				<?php if ($this->session->userdata("level") == "admin") { ?>
					<!-- Dashboard -->
					<li class="menu-item <?= $this->uri->segment(1) === 'admin' ? "active" : "" ?>">
						<a href="<?= base_url('admin') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-home-circle"></i>
							<div data-i18n="Analytics">Dashboard</div>
						</a>
					</li>

					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">Halaman</span>
					</li>
					<li
						class="menu-item <?= ($this->uri->segment(1) == 'sambutan' || $this->uri->segment(1) == 'profil-sekolah' || $this->uri->segment(1) == 'visi-misi' || $this->uri->segment(1) == 'denah-lokasi' || $this->uri->segment(1) == 'struktur-organisasi' || $this->uri->segment(1) === 'ekstrakulikuler'|| $this->uri->segment(1) === 'denah-bangunan' || $this->uri->segment(1) === 'jurusan'|| $this->uri->segment(1) === 'keutamaan') ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Account Settings">Profil Sekolah</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'sambutan' ? "active" : "" ?>">
								<a href="<?= base_url('sambutan') ?>" class="menu-link">
									<div data-i18n="Account">Sambutan Kepala Sekolah</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'profil-sekolah' ? "active" : "" ?>">
								<a href="<?= base_url('profil-sekolah') ?>" class="menu-link">
									<div data-i18n="Notifications">Profil Sekolah</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'keutamaan' ? "active" : "" ?>">
								<a href="<?= base_url('keutamaan') ?>" class="menu-link">
									<div data-i18n="Connections">Keutamaan Sekolah </div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'visi-misi' ? "active" : "" ?>">
								<a href="<?= base_url('visi-misi') ?>" class="menu-link">
									<div data-i18n="Connections">Visi Misi</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'denah-lokasi' ? "active" : "" ?>">
								<a href="<?= base_url('denah-lokasi') ?>" class="menu-link">
									<div data-i18n="Connections">Denah Lokasi</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'denah-bangunan' ? "active" : "" ?>">
								<a href="<?= base_url('denah-bangunan') ?>" class="menu-link">
									<div data-i18n="Connections">Denah Bangunan</div>
								</a>
							</li>
							<li
								class="menu-item <?= $this->uri->segment(1) === 'struktur-organisasi' ? "active" : "" ?>">
								<a href="<?= base_url('struktur-organisasi') ?>" class="menu-link">
									<div data-i18n="Connections">Struktur Organisasi</div>
								</a>
							</li>
							<?php
							if ($setting["jurusan"] ==="ya") {
							?>
							<li class="menu-item <?= $this->uri->segment(1) === 'jurusan' ? "active" : "" ?>">
								<a href="<?= base_url('jurusan') ?>" class="menu-link">
									<div data-i18n="Connections">Jurusan </div>
								</a>
							</li>
							<?php
							} else {
								# code...
							}
							?>
							<li class="menu-item <?= $this->uri->segment(1) === 'ekstrakulikuler' ? "active" : "" ?>">
								<a href="<?= base_url('ekstrakulikuler') ?>" class="menu-link">
									<div data-i18n="Connections">Ekstra Kulikuler </div>
								</a>
							</li>
						</ul>
					</li>

					<li class="menu-item <?= ($this->uri->segment(1) == 'berita' || $this->uri->segment(1) == 'guru'|| $this->uri->segment(1) == 'kegiatan'||$this->uri->segment(1) == 'slider'|| $this->uri->segment(1) == 'siswa'|| $this->uri->segment(1) == 'file'|| $this->uri->segment(1) == 'testimoni'|| $this->uri->segment(1) == 'industri')  ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Form Elements">Informasi</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'berita' ? "active" : "" ?>">
								<a href="<?= base_url('berita') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Berita</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'kegiatan' ? "active" : "" ?>">
								<a href="<?= base_url('kegiatan') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Kalender Kegiatan</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'file' ? "active" : "" ?>">
								<a href="<?= base_url('file') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">File</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'guru' ? "active" : "" ?>">
								<a href="<?= base_url('guru') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Guru</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'siswa' ? "active" : "" ?>">
								<a href="<?= base_url('siswa') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Siswa</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'slider' ? "active" : "" ?>">
								<a href="<?= base_url('slider') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Slider</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'testimoni' ? "active" : "" ?>">
								<a href="<?= base_url('testimoni') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Testimoni</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'industri' ? "active" : "" ?>">
								<a href="<?= base_url('industri') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Kerjasama Industri</div>
								</a>
							</li>
						</ul>
						
					</li>

					<li
						class="menu-item <?= ($this->uri->segment(1) == 'video' || $this->uri->segment(1) == 'foto' ) ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Form Elements">Galeri</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'video' ? "active" : "" ?>">
								<a href="<?= base_url('video') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Video</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'foto' ? "active" : "" ?>">
								<a href="<?= base_url('foto') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Foto</div>
								</a>
							</li>
						</ul>
					</li>

					<li class="menu-item <?= ($this->uri->segment(1) == 'kontak') ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Form Elements">Pesan Masuk</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'kontak' ? "active" : "" ?>">
								<a href="<?= base_url('kontak') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Kontak Form</div>
								</a>
							</li>
						</ul>
					</li>

					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">Setting Aplikasi</span>
					</li>

					<li class="menu-item <?= $this->uri->segment(1) === 'setting' ? "active" : "" ?>">
						<a href="<?= base_url('setting') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-cog"></i>
							<div data-i18n="Boxicons">Setting Website</div>
						</a>
					</li>
					<li class="menu-item <?= $this->uri->segment(1) === 'usermanajemen' ? "active" : "" ?>">
						<a href="<?= base_url('usermanajemen') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-user"></i>
							<div data-i18n="Boxicons">User Manajemen</div>
						</a>
					</li>
					<?php } else if ($this->session->userdata("level") == "operator") { ?>
					<!-- Dashboard -->
					<li class="menu-item <?= $this->uri->segment(1) === 'admin' ? "active" : "" ?>">
						<a href="<?= base_url('admin') ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-home-circle"></i>
							<div data-i18n="Analytics">Dashboard</div>
						</a>
					</li>

					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">Halaman</span>
					</li>
					

					<li class="menu-item <?= ($this->uri->segment(1) == 'berita' || $this->uri->segment(1) == 'guru'|| $this->uri->segment(1) == 'kegiatan'||$this->uri->segment(1) == 'slider'|| $this->uri->segment(1) == 'siswa'|| $this->uri->segment(1) == 'file'|| $this->uri->segment(1) == 'testimoni'|| $this->uri->segment(1) == 'industri')  ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Form Elements">Informasi</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'berita' ? "active" : "" ?>">
								<a href="<?= base_url('berita') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Berita</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'kegiatan' ? "active" : "" ?>">
								<a href="<?= base_url('kegiatan') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Kalender Kegiatan</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'file' ? "active" : "" ?>">
								<a href="<?= base_url('file') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">File</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'guru' ? "active" : "" ?>">
								<a href="<?= base_url('guru') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Guru</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'siswa' ? "active" : "" ?>">
								<a href="<?= base_url('siswa') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Siswa</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'slider' ? "active" : "" ?>">
								<a href="<?= base_url('slider') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Slider</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'testimoni' ? "active" : "" ?>">
								<a href="<?= base_url('testimoni') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Testimoni</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'industri' ? "active" : "" ?>">
								<a href="<?= base_url('industri') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Kerjasama Industri</div>
								</a>
							</li>
						</ul>
						
					</li>

					<li
						class="menu-item <?= ($this->uri->segment(1) == 'video' || $this->uri->segment(1) == 'foto' ) ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Form Elements">Galeri</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'video' ? "active" : "" ?>">
								<a href="<?= base_url('video') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Video</div>
								</a>
							</li>
							<li class="menu-item <?= $this->uri->segment(1) === 'foto' ? "active" : "" ?>">
								<a href="<?= base_url('foto') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Foto</div>
								</a>
							</li>
						</ul>
					</li>

					<li class="menu-item <?= ($this->uri->segment(1) == 'kontak') ? 'open' : ''; ?>">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-detail"></i>
							<div data-i18n="Form Elements">Pesan Masuk</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item <?= $this->uri->segment(1) === 'kontak' ? "active" : "" ?>">
								<a href="<?= base_url('kontak') ?>" class="menu-link">
									<div data-i18n="Basic Inputs">Kontak Form</div>
								</a>
							</li>
						</ul>
					</li>

					
					<?php } ?>


				</ul>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<style>
					#clock {
						font-size: 2rem;
						letter-spacing: 7px;
						text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.4);
						
					}

					#date {
						font-size: 1rem;
						letter-spacing: 2px;
					
						
					}

					.shortcut-card {
						border: none;
						border-radius: 10px;
						box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
						transition: all 0.3s ease;
					}

					.shortcut-card:hover {
						box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
						transform: translateY(-5px);
					}

				</style>
				<!-- Navbar -->

				<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-primary"
					id="layout-navbar">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="bx bx-menu bx-sm"></i>
						</a>
					</div>
					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
						<!-- Search -->
						<div class="navbar-nav align-items-center">
							<div class="nav-item d-flex align-items-center">


							</div>
						</div>
						<!-- /Search -->

						<ul class="navbar-nav flex-row align-items-center ms-auto">
							<!-- Place this tag where you want the button to render. -->


							<!-- User -->
							<li class="nav-item navbar-dropdown dropdown-user dropdown">
								<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
									data-bs-toggle="dropdown">
									<div class="avatar avatar-online">
										<img src="<?= base_url() ?>uploads/fotoprofile/<?= $akun->photo_profile ?>" alt
											class="w-px-40 h-auto rounded-circle" />
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="#">
											<div class="d-flex">
												<div class="flex-shrink-0 me-3">
													<div class="avatar avatar-online">
														<img src="<?= base_url() ?>uploads/fotoprofile/<?= $akun->photo_profile ?>"
															alt class="w-px-40 h-auto rounded-circle" />
													</div>
												</div>
												<div class="flex-grow-1">
													<span class="fw-semibold d-block"><?= $akun->nama ?></span>
													<small class="text-muted"><?= $akun->level ?></small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									</li>

									<li>
										<a class="dropdown-item" href="<?= base_url('setting-akun') ?>">
											<i class="bx bx-cog me-2"></i>
											<span class="align-middle">Setting Akun</span>
										</a>
									</li>

									<li>
										<a class="dropdown-item" href="<?= base_url('logout') ?>">
											<i class="bx bx-power-off me-2"></i>
											<span class="align-middle">Log Out</span>
										</a>
									</li>
								</ul>
							</li>
							<!--/ User -->
						</ul>
					</div>
				</nav>

				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
