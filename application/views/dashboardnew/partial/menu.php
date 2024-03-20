<?php
  $general = $this->db->get('general')->row_array();
?>
<?php
$whatsappNumber = $general['whatsapp']; // Ambil nomor WhatsApp dari database
$whatsappNumber = preg_replace('/^0/', '62', $whatsappNumber); // Ganti 0 di depan dengan 62
?>
<header class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-top-wrapper">
				<div class="header-top-left">
					<div class="header-top-contact">
						<ul>

							<li>
								<div class="header-top-contact-icon">
									<img src="<?= base_url() ?>assets/barunih/img/icon/mail.svg" alt>
								</div>
								<div class="header-top-contact-info">
									<h6>E-mail</h6>
									<a href="#"><span class="__cf_email__"
											data-cfemail="8ee7e0e8e1ceebf6efe3fee2eba0ede1e3"><?= $general['account_gmail'] ?></span></a>
								</div>
							</li>
							<li>
								<div class="header-top-contact-icon">
									<img src="<?= base_url() ?>assets/barunih/img/icon/call.svg" alt>
								</div>
								<div class="header-top-contact-info">
									<h6>Kontak</h6>
									<a href="tel: <?= $general['whatsapp'] ?>"> <?= $general['whatsapp'] ?></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class=" header-top-right">
					<div class="header-top-social">
						<span>Follow Us: </span>
						<a href="<?= $general['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
						<a href="<?= $general['instagram'] ?>"><i class="fab fa-instagram"></i></a>
						<a href="<?= $general['youtube'] ?>"><i class="fab fa-youtube"></i></a>
						<a href="https://wa.me/<?= $whatsappNumber ?>"><i class="fab fa-whatsapp"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-navigation">
		<nav class="navbar navbar-expand-lg">
			<div class="container position-relative">
				<a class="navbar-brand" href="index-2.html">
					<img src="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" style="width:90px;"
						alt="logo"><a href="<?= base_url('dashboard') ?>"><?= $general['nama_sekolah']; ?></a>
				</a>
				<div class="mobile-menu-right">
					<div class="search-btn">
						<button type="button" class="nav-right-link search-box-outer"><i
								class="far fa-search"></i></button>
					</div>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="main_nav">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link active" href="<?= base_url('') ?>">Beranda</a></li>


						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
							<ul class="dropdown-menu fade-down">
								<li><a class="dropdown-item" href="<?= base_url('dashboard/profil_sekolah') ?>">Profil
										Sekolah</a></li>
								<li><a class="dropdown-item" href="<?= base_url('sambutan-detail') ?>">Sambutan Kepala
										Sekolah</a></li>
								<li><a class="dropdown-item" href="<?= base_url('dashboard/visi_misi') ?>">Visi Misi</a>
								</li>
								<li><a class="dropdown-item"
										href="<?= base_url('dashboard/struktur_organisasi') ?>">Struktur Organisasi</a>
								</li>
								<li><a class="dropdown-item" href="<?= base_url('dashboard/denahbangunan') ?>">Denah
										Bangunan</a></li>
							</ul>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Informasi</a>
							<ul class="dropdown-menu fade-down">
								<li><a class="dropdown-item" href="<?= base_url('berita-sekolah-list') ?>">Berita</a>
								</li>
								<li><a class="dropdown-item" href="<?= base_url('dashboard/kegiatan') ?>">Kalender
										Kegiatan</a></li>
								<li><a class="dropdown-item" href="<?= base_url('dashboard/guru') ?>">Guru</a></li>
								<li ><a class="dropdown-item" href="<?= base_url('dashboard/file') ?>">Download</a></li>
				

							</ul>
						</li>
						<?php
							if ($general["jurusan"] ==="ya") {
							?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Program Keahlian</a>
							<ul class="dropdown-menu fade-down">
								<?php $data= $this->db->get('jurusan')->result();
                        foreach ($data as $ekskul) {
                                ?>
								<li><a class="dropdown-item"
										href="<?= base_url('jurusan-detail/').$ekskul->slug ?>"><?= $ekskul->judul ?></a>
								</li>
								<?php } ?>

							</ul>
						</li>
						<?php
							} else {
								# code...
							}
							?>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Eskul</a>
							<ul class="dropdown-menu fade-down">
							<?php $data= $this->db->get('ekskul')->result();
                        foreach ($data as $ekskul) {
                                ?>
						<li><a class="dropdown-item" href="<?= base_url('ekskul-detail/').$ekskul->slug ?>"><?= $ekskul->judul ?></a></li>
						<?php } ?>

							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galeri</a>
							<ul class="dropdown-menu fade-down">
							<li><a class="dropdown-item" href="<?= base_url('dashboard/foto') ?>">Foto</a></li>
						<li><a class="dropdown-item" href="<?= base_url('dashboard/video') ?>">Video</a></li>

							</ul>
						</li>
								<li class="nav-item"><a class="nav-link" href="<?= base_url('contacts') ?>">Contact</a></li>
					</ul>
					<div class="nav-right">
						<div class="search-btn">
							<button type="button" class="nav-right-link search-box-outer"><i
									class="far fa-search"></i></button>
						</div>

					</div>
				</div>
			</div>
		</nav>
	</div>
</header>


<div class="search-popup">
	<button class="close-search"><span class="far fa-times"></span></button>
	<form action="<?= base_url("cariberita") ?>" method="POST" class="search-form">
		<div class="form-group">
			<input type="search" name="cari" placeholder="Search Berita..." required>
			<button type="submit"><i class="far fa-search"></i></button>
		</div>
	</form>
</div>
