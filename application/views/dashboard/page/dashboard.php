<?php $this->load->view('dashboard/partial/header'); ?>
<?php $this->load->view('dashboard/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>
<style>
	/* .skeleton-loading {
		animation: skeleton-pulse 1s infinite;
	}

	.skeleton-slide {
		height: 100vh;
		width: 3000vh;
		background-color: #f1f1f1;
		animation: skeleton-pulse 1s infinite;
	}

	.skeleton-card {
		background-color: #f1f1f1;
		animation: skeleton-pulse 1s infinite;
	}

	@keyframes skeleton-pulse {
		0% {
			background-color: #f1f1f1;
		}

		50% {
			background-color: #e1e1e1;
		}

		100% {
			background-color: #f1f1f1;
		}
	}

	.beneran {
		display: none;
	} */

	/* Gaya kartu guru */
	.member {
		border-top: 2px solid #4154f1;
		/* Border atas dengan warna #4154f1 */
		border-bottom: 2px solid #4154f1;
		/* Border bawah dengan warna #4154f1 */
		border-left: 1px solid #ccc;
		/* Border kiri dengan warna abu-abu (contoh) */
		border-right: 1px solid #ccc;
		/* Border kanan dengan warna abu-abu (contoh) */
		border-radius: 10px;
		/* Atur radius sudut sesuai kebutuhan Anda */
		padding: 15px;
		/* Atur padding sesuai kebutuhan Anda */
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		/* Atur bayangan kartu sesuai kebutuhan Anda */
	}

	/* Gaya nama guru */
	.member h4 {
		font-size: 24px;
		/* Ukuran font yang ditingkatkan */
		margin-top: 10px;
		/* Atur margin atas sesuai kebutuhan Anda */
		background-color: #4154f1;
		/* Latar belakang dengan warna #4154f1 */
		color: #ffffff;
		/* Warna teks putih */
		padding: 10px;
		/* Atur padding sesuai kebutuhan Anda */
		border-radius: 5px;
		/* Atur radius sudut sesuai kebutuhan Anda */
	}

	/* Gaya jabatan guru */
	.member span {
		font-size: 18px;
		/* Ukuran font yang ditingkatkan */
		background-color: #f1f1f1;
		/* Latar belakang dengan warna abu-abu (contoh) */
		padding: 5px 10px;
		/* Atur padding sesuai kebutuhan Anda */
		border-radius: 5px;
		/* Atur radius sudut sesuai kebutuhan Anda */
	}

	.berita-card {
		border: 1px solid #ddd;
		border-radius: 5px;
		padding: 15px;
		margin-bottom: 20px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		transition: transform 0.2s;
		/* Animasi perubahan transformasi */
	}

	.berita-card h3 {
		font-size: 18px;
		margin-top: 0;
	}

	.berita-card .tanggal {
		font-size: 12px;
		color: #888;
	}

	.berita-card p {
		font-size: 14px;
		color: #555;
	}

	.berita-card img {
		max-width: 100%;
		height: auto;
	}

	/* Animasi hover */
	.berita-card:hover {
		transform: scale(1.05);
		/* Mengubah ukuran kartu saat hover */
	}

	/* Gaya tombol "Baca Selengkapnya" */
	.read-more-button {
		display: inline-block;
		margin-top: 10px;
		text-decoration: none;
		background-color: #4154f1;
		color: #fff;
		padding: 5px 10px;
		border-radius: 5px;
		transition: background-color 0.3s;
	}

	.read-more-button:hover {
		background-color: #3442d3;
	}

	/* Gaya tombol "View All Berita" */
	.view-all-button {
		display: block;
		margin-top: 20px;
		text-align: center;
	}

	.view-all-button a {
		text-decoration: none;
		background-color: #4154f1;
		color: #fff;
		padding: 10px 20px;
		border-radius: 5px;
		transition: background-color 0.3s;
	}

	.view-all-button a:hover {
		background-color: #fff;
		color: #4154f1;
	}

</style>



<!-- <div id="skeleton" class="container">
	<div id="slider" class="carousel slide mb-5" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="skeleton-slide"></div>
			</div>
		</div>
	</div>
	<div class="row m-5">
		<div class="col">
			<div class="card skeleton-card">
				<div class="card-body">
					<h5 class="card-title">&nbsp;</h5>
					<p class="card-text">&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card skeleton-card">
				<div class="card-body">
					<h5 class="card-title">&nbsp;</h5>
					<p class="card-text">&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card skeleton-card">
				<div class="card-body">
					<h5 class="card-title">&nbsp;</h5>
					<p class="card-text">&nbsp;</p>
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- ======= Hero Section ======= -->
<div id="beneran" class="beneran">
	<section id="hero">
		<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

			<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

			<div class="carousel-inner" role="listbox">

				<?php 
$firstIteration = true;
foreach ($slider as $slider) { 
    $activeClass = ($firstIteration) ? 'active' : '';
    $showButton = (!empty($slider->button_capt) && !empty($slider->button_link));
?>
				<div class="carousel-item bg <?= $activeClass ?>"
					style="background-image: url(<?= base_url('uploads/slider/') . $slider->foto ?>)">
					<div class="container" data-aos="fade-up" style="background-color: rgba(255, 255, 255, 0.7);">
						<h2><?= $slider->keterangan ?></h2>
						<?php if ($showButton === true) { ?>
						<a data-aos="fade-up" href="<?= $slider->button_link ?>" target="_blank"
							class="btn-get-started "><?= $slider->button_capt ?></a>
						<?php } ?>
					</div>
				</div>
				<?php 
    $firstIteration = false;
} 
?>




			</div>

			<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
			</a>

			<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
			</a>

		</div>

	</section><!-- End Hero -->

	<svg xmlns:xlink="http://www.w3.org/1999/xlink" id="wave" style="transform:rotate(180deg); transition: 0.3s"
		viewBox="0 0 1440 130" version="1.1" xmlns="http://www.w3.org/2000/svg">
		<defs>
			<linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
				<stop stop-color="rgba(6.108, 96.257, 237.106, 1)" offset="0%" />
				<stop stop-color="rgba(229.713, 225.644, 237.106, 1)" offset="100%" />
			</linearGradient>
		</defs>
		<path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)"
			d="M0,0L60,10.8C120,22,240,43,360,58.5C480,74,600,82,720,71.5C840,61,960,30,1080,30.3C1200,30,1320,61,1440,60.7C1560,61,1680,30,1800,32.5C1920,35,2040,69,2160,71.5C2280,74,2400,43,2520,32.5C2640,22,2760,30,2880,39C3000,48,3120,56,3240,49.8C3360,43,3480,22,3600,30.3C3720,39,3840,78,3960,97.5C4080,117,4200,117,4320,114.8C4440,113,4560,108,4680,88.8C4800,69,4920,35,5040,21.7C5160,9,5280,17,5400,23.8C5520,30,5640,35,5760,49.8C5880,65,6000,91,6120,97.5C6240,104,6360,91,6480,80.2C6600,69,6720,61,6840,47.7C6960,35,7080,17,7200,23.8C7320,30,7440,61,7560,60.7C7680,61,7800,30,7920,23.8C8040,17,8160,35,8280,34.7C8400,35,8520,17,8580,8.7L8640,0L8640,130L8580,130C8520,130,8400,130,8280,130C8160,130,8040,130,7920,130C7800,130,7680,130,7560,130C7440,130,7320,130,7200,130C7080,130,6960,130,6840,130C6720,130,6600,130,6480,130C6360,130,6240,130,6120,130C6000,130,5880,130,5760,130C5640,130,5520,130,5400,130C5280,130,5160,130,5040,130C4920,130,4800,130,4680,130C4560,130,4440,130,4320,130C4200,130,4080,130,3960,130C3840,130,3720,130,3600,130C3480,130,3360,130,3240,130C3120,130,3000,130,2880,130C2760,130,2640,130,2520,130C2400,130,2280,130,2160,130C2040,130,1920,130,1800,130C1680,130,1560,130,1440,130C1320,130,1200,130,1080,130C960,130,840,130,720,130C600,130,480,130,360,130C240,130,120,130,60,130L0,130Z" />
	</svg>

	<main id="main">

		<section id="featured-services" class="featured-services section-bg">
			<div class="container" data-aos="fade-up">

				<div class="row d-flex justify-content-center">
					<?php foreach ($keutamaan as $value) {
					 ?>
					<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
						<div class="icon-box" data-aos="fade-up" data-aos-delay="100">
							<div class="icon"><img src="<?= base_url('uploads/keutamaan/').$value->foto ?>"
									class="img-fluid" alt=""></div>
							<h4 class="title"><a href=""><?= $value->judul ?></a></h4>
							<p class="description"><?= $value->desc ?></p>
						</div>
					</div>
					<?php 
					
					}
					?>



				</div>

			</div>
		</section><!-- End Featured Services Section -->



		<!-- ======= About Us Section ======= -->
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
						<?= $sambutankepsek->excerpt ?><br>
						<a data-aos="fade-up" href="<?= base_url("sambutan-detail") ?>"
							class="btn btn-primary btn-md mt-5">Selengkapnya</a>
					</div>
				</div>

			</div>
		</section><!-- End About Us Section -->
		<section id="about" class="about bg-primary ">
			<div class="container" data-aos="fade-up">

				<div class="container">
					<div class="section-title">
						<h2 class="text-white">Berita Terkini</h2>
						<p class="text-white">Daftar Berita Terkini <?= $general['nama_sekolah'] ?></p>
					</div>
					<div class="row">
						<?php foreach ($berita->result() as $value) {
							# code...
						 ?>
						<div class="col-md-4" data-aos="zoom-in">
							<div class="berita-card bg-white">
								<img src="<?= base_url() ?>uploads/kegiatan/<?= $value->foto ?>"
									alt="<?= $value->judul ?>">
								<h3 class="mt-3"><a
										href="<?php echo site_url('berita-detail/') . $value->slug  ?>"><?= $value->judul ?></a>
								</h3>
								<p class="tanggal">Tanggal Posting: <time
										datetime="<?= date("Y-m-d H:i:s", strtotime($value->waktu)) ?>">
										<?php
      
            $nama_hari = array(
                'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
            );

           
            $nama_bulan = array(
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            );

        
            $tanggal = date("d", strtotime($value->waktu));
            $bulan = date("n", strtotime($value->waktu)) - 1; 
            $tahun = date("Y", strtotime($value->waktu));
            $hari = date("w", strtotime($value->waktu)); 

            echo $nama_hari[$hari] . ', ' . $tanggal . ' ' . $nama_bulan[$bulan] . ' ' . $tahun;
            ?>
									</time>
								</p>
								<p>
									<?php
									$berita_lengkap = $value->excerpt; 
									$kata_kata = explode(' ', $berita_lengkap);
									$excerpt_kata = implode(' ', array_slice($kata_kata, 0, 15));
									echo $excerpt_kata;
								?>..


								</p>

								<a href="<?php echo site_url('berita-detail/') . $value->slug  ?>"
									class="read-more-button">Baca Selengkapnya</a>
							</div>
						</div>
						<?php } ?>


					</div>
					<div class="view-all-button">
						<a href="<?= base_url("berita-sekolah-list") ?>">Semua Berita</a>
					</div>
				</div>
			</div>
		</section><!-- End About Us Section -->


		<?php
							if ($general["jurusan"] ==="ya") {
							?>

		<section id="departments" class="departments">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Program Keahlian</h2>
					<p>Berikut ini adalah daftar Program Keahlian unggulan yang ada pada <?= $general['nama_sekolah'] ?> .</p>
				</div>

				<div class="row" data-aos="fade-up" data-aos-delay="100">
					<div class="col-lg-4 mb-5 mb-lg-0">
						<ul class="nav nav-tabs flex-column">
							<?php 
$firstIteration = true; 
foreach ($jurusan as $value) {
    $activeClass = $firstIteration ? 'active show' : ''; 
    ?>
							<li class="nav-item m-2">
								<a class="nav-link <?= $activeClass ?>" data-bs-toggle="tab" data-bs-target="#tab-<?= $value->id ?>">
									<h4><?= $value->judul ?></h4>
									<p>Jurusan <?= $value->judul ?></p>
								</a>
							</li>
							<?php
    $firstIteration = false; 
}
?>


						</ul>
					</div>
					<div class="col-lg-8">
						<div class="tab-content text-center">
						<?php 
$firstIteration = true; 
foreach ($jurusan as $value) {
    $activeClass = $firstIteration ? 'active show' : ''; 
    ?>

							<div class=" text-center tab-pane  <?= $activeClass ?> " id="tab-<?= $value->id ?>">
								
								<img style="float:initial;"src="<?= base_url('uploads/jurusan/').$value->foto ?>" alt=""  width="100%" height="300px">
								<br>

							<a class="btn btn-lg btn-primary" href="<?= base_url("jurusan-detail/").$value->slug ?>"> Selengkapnya </a>
								
							</div>

							<?php
    $firstIteration = false; 
}
?>
							
						</div>
					</div>
				</div>

			</div>
		</section>

		<?php
							} else {
								# code...
							}
							?>


		








		<!-- ======= Doctors Section ======= -->
		<section id="doctors" class="doctors bg-white ">
			<div class="container" data-aos="fade-up">
				<div class="row">


					<div class="col-md-6 ">
						<!-- ======= Services Section ======= -->
						<section id="services" class="services services" data-aos="fade-right">
							<div class="container" data-aos="fade-up">

								<div class="section-title">
									<h2>Ekstrakulikuler</h2>
									<p>Daftar Ekstrakulikuler yang ada pada <?= $general['nama_sekolah'] ?></p>

								</div>

								<div class="row d-flex justify-content-center">
									<div class="col-lg-12">
										<div id="ekskulCarousel" class="carousel slide custom-carousel"
											data-bs-ride="carousel">
											<div class="carousel-inner">
												<?php foreach ($ekskul as $index => $ekskul) { ?>
												<div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
													<div class="member" data-aos="fade-up" data-aos-delay="100">
														<div class="member-img">
															<img src="<?= base_url('uploads/ekskul/') . $ekskul->foto ?>"
																width="100%" height="450px">
														</div>
														<div class="member-info">
															<h4 class="text-white"
																style="background-color: #4154f1; padding: 10px; border-radius: 5px;">
																<a class="text-white"
																	href="<?= base_url('	ekskul-detail/').$ekskul->slug ?>"><?= $ekskul->judul ?></a>
															</h4>

														</div>
													</div>
												</div>
												<?php } ?>
											</div>
											<button class="carousel-control-prev" type="button"
												data-bs-target="#ekskulCarousel" data-bs-slide="prev">
												<span class="carousel-control-prev-icon bg-primary"
													aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button"
												data-bs-target="#ekskulCarousel" data-bs-slide="next">
												<span class="carousel-control-next-icon bg-primary"
													aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										</div>
									</div>
								</div>

							</div>
						</section><!-- End Services Section -->
					</div>
					<div class="col-md-6">
						<section class=" ">
							<div class="container" data-aos="fade-left">
								<div class="section-title">
									<h2>Guru</h2>
									<p>Daftar Guru <?= $general['nama_sekolah'] ?></p>

								</div>
								<div class="row d-flex justify-content-center">
									<div class="col-lg-12">
										<div id="guruCarousel" class="carousel slide custom-carousel"
											data-bs-ride="carousel">
											<div class="carousel-inner">
												<?php foreach ($guru as $index => $guruItem) { ?>
												<div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
													<div class="member" data-aos="fade-up" data-aos-delay="100">
														<div class="member-img">
															<img src="<?= base_url('uploads/guru/') . $guruItem->foto ?>"
																width="100%" height="450px" alt="">
														</div>
														<div class="member-info">
															<h4 class="text-white"
																style="background-color: #4154f1; padding: 10px; border-radius: 5px;">
																<?= $guruItem->nama ?></h4>
															<span
																class=" text-dark rounded-pill px-3 py-1"><?= $guruItem->jabatan ?></span>
														</div>
													</div>
												</div>
												<?php } ?>
											</div>
											<button class="carousel-control-prev" type="button"
												data-bs-target="#guruCarousel" data-bs-slide="prev">
												<span class="carousel-control-prev-icon bg-primary"
													aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button"
												data-bs-target="#guruCarousel" data-bs-slide="next">
												<span class="carousel-control-next-icon bg-primary"
													aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										</div>
									</div>
								</div>
						</section>
					</div>
				</div>

			</div>
		</section>

		<!-- End Doctors Section -->

		<section id="counts" class="counts section-bg">
			<div class="container" data-aos="fade-up">
				<div class="section-title">
					<h2>Siswa</h2>
					<p>Daftar Jumlah Siswa <?= $general['nama_sekolah'] ?></p>
				</div>

				<div class="row no-gutters">
					<?php foreach ($siswa as $siswa ) {  ?>
					<div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="zoom-in">
						<div class="count-box">
							<i class="fas fa-user"></i>
							<span data-purecounter-start="0" data-purecounter-end="<?= $siswa->jumlah?>"
								data-purecounter-duration="1" class="purecounter"></span>

							<h2 class="mt-4">Kelas <strong class="text-primary"><?= $siswa->kelas?></strong> </h2>
						</div>
					</div>
					<?php } ?>

					<div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="zoom-in">
						<div class="count-box">
							<i class="fas fa-user-plus"></i>
							<span data-purecounter-start="0" data-purecounter-end="<?= $jumlahsiswa->jumlahsiswa?>"
								data-purecounter-duration="1" class="purecounter"></span>

							<h2 class="mt-4">Jumlah <strong class="text-primary">Siswa</strong> </h2>
						</div>
					</div>




				</div>

			</div>
		</section>
		<section id="testimonials" class="testimonials">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Testimonials</h2>

				</div>

				<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
					<div class="swiper-wrapper">
						<?php foreach ($testimoni as $value) {
				
				?>
						<div class="swiper-slide">

							<div class="testimonial-item">
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									<?= $value->desc ?>
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
								<img src="<?= base_url('uploads/testimoni/') . $value->foto ?>" class="testimonial-img"
									alt="">
								<h3><?= $value->nama ?></h3>

							</div>
						</div><!-- End testimonial item -->


						<?php }  ?>


					</div>
					<div class="swiper-pagination"></div>
				</div>

			</div>
		</section>

		<!-- ======= Gallery Section ======= -->
		<section id="gallery" class="gallery">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Gallery</h2>
					<p>Foto kegiatan terakhir pada <?= $general['nama_sekolah'] ?></p>

				</div>

				<div class="gallery-slider swiper">
					<div class="swiper-wrapper align-items-center">
						<?php 
      foreach ($foto as $foto ) { 
        ?>
						<div class="swiper-slide"><a class="gallery-lightbox"
								href="<?= base_url('uploads/gallery/').$foto->foto ?>"><img
									src="<?= base_url('uploads/gallery/').$foto->foto ?>" width="100%" height="150px"
									alt=""></a>
						</div>
						<?php } ?>

					</div>
					<div class="swiper-pagination"></div>
				</div>

			</div>
		</section><!-- End Gallery Section -->
		<section id="gallery" class="gallery">
			<div class="container" data-aos="fade-left">

				<div class="section-title">
					<h2>Industri Partner</h2>
					<p>Kerjasama dengan Industri <?= $general['nama_sekolah'] ?></p>

				</div>

				<div class="gallery-slider swiper">
					<div class="swiper-wrapper align-items-center">
						<?php 
      foreach ($industri as $industri ) { 
        ?>
						<div class="swiper-slide"><a class="gallery-lightbox"
								href="<?= base_url('uploads/industri/').$industri->foto ?>"><img
									src="<?= base_url('uploads/industri/').$industri->foto ?>" width="100%"
									height="150px" alt=""></a>
						</div>
						<?php } ?>

					</div>
					<div class="swiper-pagination"></div>
				</div>

			</div>
		</section><!-- End Gallery Section -->

		<section id="doctors" class="doctors ">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Youtube</h2>
					<p>Galeri Video  <?= $general['nama_sekolah'] ?> </p>
				</div>

				<div class="row d-flex justify-content-center">
				<?php  foreach ($video as $video) { ?>
					<div class="col-lg-4 col-md-6 d-flex me-3">
						<div class="member" data-aos="fade-up" data-aos-delay="100">
							<div class="member-img" style="height:20em;
		cursor: pointer;">
							<?php echo $video->url; ?>
								
							</div>
							<div class="member-info">
								<span class="text-dark"><?php echo $video->judul; ?></span>
							</div>
						</div>
					</div>

					<?php } ?>
				

				</div>

			</div>
		</section>



		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact section-bg" data-aos="fade-up">
			<div class="container">

				<div class="section-title">
					<h2>Kontak</h2>
					<p>Hubungi kami melalui form kontak dibawah ini, isikan semua biodata anda secara benar salam dari
						<?= $general['nama_sekolah'] ?></p>

				</div>

			</div>

			<div data-aos="fade-up">
				<?= $denah->denah ?>
			</div>

			<div class="container">

				<div class="row mt-5">

					<div class="col-lg-6">

						<div class="row">
							<div class="col-md-12">
								<div class="info-box">
									<i class="bx bx-map"></i>
									<h3>Alamat</h3>
									<p><?= $general['alamat'] ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="info-box mt-4">
									<i class="bx bx-envelope"></i>
									<h3>Email </h3>
									<p><?= $general['account_gmail'] ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="info-box mt-4">
									<i class="bx bx-phone-call"></i>
									<h3>Hubungi Kami</h3>
									<p><?= $general['whatsapp'] ?></p>
								</div>
							</div>
						</div>

					</div>

					<div class="col-lg-6">
						<form action="<?= base_url('dashboard/kirimpesan') ?>" method="post" class="php-email-form">
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
							<div class="my-3">


							</div>
							<div class="text-center"><button type="submit">Kirim Pesan</button></div>
						</form>
					</div>

				</div>

			</div>
		</section><!-- End Contact Section -->

		<section id="denahbangunan" class="denahbangunan section-bg" data-aos="fade-up">
			<div class="container">

				<div class="section-title">
					<h2>Denah Bangunan</h2>
					<p>Denah Bangunan <?= $general['nama_sekolah'] ?></p>

				</div>

			</div>

			<div class="text-center">
				<a class="gallery-lightbox" data-aos="fade-in"
					href="<?= base_url('uploads/denahbangunan/').$denahbangunan->denahbangunan ?>"><img
						src="<?= base_url('uploads/denahbangunan/').$denahbangunan->denahbangunan ?>" class="img-fluid"
						alt=""></a>
			</div>


		</section>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
</div>
<?php $this->load->view('dashboard/partial/footer'); ?>
<script>
	window.addEventListener('load', function () {
		var skeleton = document.getElementById('skeleton');
		var content = document.getElementById('beneran');

		setTimeout(function () {
			skeleton.style.display = 'none';
			content.style.display = 'block';
		}, 2000); // Ubah nilai timeout (dalam milidetik) sesuai kebutuhan Anda
	});

</script>
