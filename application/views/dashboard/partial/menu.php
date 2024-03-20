<?php
  $general = $this->db->get('general')->row_array();
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
	<div class="container d-flex align-items-center">

		<a href="<?= base_url('dashboard') ?>" class="logo "><img
				src="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" alt=""></a>
		<!-- Uncomment below if you prefer to use an image logo -->
		<h1 class="logo me-auto ms-2"><a href="<?= base_url('dashboard') ?>"><?= $general['nama_sekolah']; ?></a></h1>

		<nav id="navbar" class="navbar order-last order-lg-0">
			<ul>
				<li><a class="nav-link scrollto " href="<?= base_url('') ?>">Home</a></li>
				<li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="<?= base_url('dashboard/profil_sekolah') ?>">Profil Sekolah</a></li>
						<li><a href="<?= base_url('sambutan-detail') ?>">Sambutan Kepala Sekolah</a></li>
						<li><a href="<?= base_url('dashboard/visi_misi') ?>">Visi Misi</a></li>
						<li><a href="<?= base_url('dashboard/struktur_organisasi') ?>">Struktur Organisasi</a></li>
						<li><a href="<?= base_url('dashboard/denahbangunan') ?>">Denah Bangunan</a></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="<?= base_url('berita-sekolah-list') ?>">Berita</a></li>
						<li><a href="<?= base_url('dashboard/kegiatan') ?>">Kalender Kegiatan</a></li>
						<li><a href="<?= base_url('dashboard/guru') ?>">Guru</a></li>
						<li><a class="nav-link scrollto" href="<?= base_url('dashboard#counts') ?>">Siswa</a></li>
					</ul>
				</li>
				<?php
							if ($general["jurusan"] ==="ya") {
							?>
				<li class="dropdown"><a href="#"><span>Program Keahlian</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<?php $data= $this->db->get('jurusan')->result();
                        foreach ($data as $ekskul) {
                                ?>
						<li><a href="<?= base_url('jurusan-detail/').$ekskul->slug ?>"><?= $ekskul->judul ?></a></li>
						<?php } ?>

					</ul>
				</li>
				<?php
							} else {
								# code...
							}
							?>
				<li class="dropdown"><a href="#"><span>Eskul</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<?php $data= $this->db->get('ekskul')->result();
                        foreach ($data as $ekskul) {
                                ?>
						<li><a href="<?= base_url('ekskul-detail/').$ekskul->slug ?>"><?= $ekskul->judul ?></a></li>
						<?php } ?>

					</ul>
				</li>
				<li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="<?= base_url('dashboard/foto') ?>">Foto</a></li>
						<li><a href="<?= base_url('dashboard/video') ?>">Video</a></li>
					</ul>
				</li>
				
				<li><a class="nav-link scrollto " href="<?= base_url('dashboard/file') ?>">File Download</a></li>

				
				


			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav><!-- .navbar -->
		
	</div>
</header><!-- End Header -->
