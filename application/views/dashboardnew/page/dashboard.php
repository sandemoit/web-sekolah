<?php $this->load->view('dashboardnew/partial/header'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

	<main class="main">

		<div class="hero-section">
			<div class="hero-slider owl-carousel owl-theme">

					<?php 
					$firstIteration = true;
					foreach ($slider as $slider) { 
						$activeClass = ($firstIteration) ? 'active' : '';
						$showButton = (!empty($slider->button_capt) && !empty($slider->button_link));
					?>
				<div class="hero-single" style="background: url(<?= base_url('uploads/slider/') . $slider->foto ?>)">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-12 col-lg-7">
								<div class="hero-content">
									<h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
										<i class="far fa-book-open-reader"></i>Welcome TO <?= $general['nama_sekolah'] ?>
									</h6>
									<h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
									<?= $slider->keterangan ?>
									</h1>
									<?php if ($showButton === true) { ?>
									<div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
										<a href="<?= $slider->button_link ?>" class="theme-btn"><?= $slider->button_capt ?><i
												class="fas fa-arrow-right-long"></i></a>
									
									</div>
									<?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>

				<?php 
					$firstIteration = false;} 
				?>
			
			</div>
		</div>


		<div class="feature-area">
			<div class="container">
				<div class="feature-wrapper">
					<div class="row">
					<?php foreach ($keutamaan as $value) {
					 ?>
						<div class="col-md-6 col-lg-4">
							<div class="feature-item wow fadeInUp" data-wow-delay=".25s">
								
								<div class="feature-icon">
									<img src="<?= base_url('assets/barunih/img/icon/teacher.svg') ?>" style="widht=100%;" alt>
								</div>
								<div class="feature-content">
									<h4 class="feature-title"><?= $value->judul ?></h4>
									<p><?= $value->desc ?></p>
								</div>
							</div>
						</div>
						<?php } ?>
					
					</div>
				</div>
			</div>
		</div>


		<div class="about-area py-120">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="about-left wow fadeInLeft" data-wow-delay=".25s">
							<div class="about-img">
								<img src="<?= base_url('uploads/kepalasekolah/').$sambutankepsek->foto_kepsek ?>" class="img-fluid" style="width:100%; height:40em;" alt>
							</div>
							<div class="about-experience">
								<div class="about-experience-icon">
									<img src="<?= base_url("")?>assets/barunih/img/icon/exchange-idea.svg" alt>
								</div>
								<b class="text-start">Kepala Sekolah </b>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-right wow fadeInRight" data-wow-delay=".25s">
							<div class="site-heading mb-3">
								<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Sekapur Sirih</span>
								<h2 class="site-title">
									 <span>Kepala Sekolah </span> <?= $general['nama_sekolah'] ?>
								</h2>
							</div>
							<p class="about-text">
							<?= $sambutankepsek->excerpt ?>
							</p>
							
							<a href="<?= base_url("sambutan-detail") ?>" class="theme-btn mt-4">Selengkapnya<i
									class="fas fa-arrow-right-long"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="counter-area pt-60 pb-60" style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
			<div class="container">
				<div class="row">
				<?php foreach ($siswa as $siswa ) {  ?>
			
					<div class="col-lg-3 col-sm-6">
						<div class="counter-box">
							<div class="icon">
								<img src="<?= base_url('')?>assets/barunih/img/icon/graduation.svg" alt>
							</div>
							<div>
								<span class="counter" data-count="+" data-to="<?= $siswa->jumlah?>" data-speed="3000"><?= $siswa->jumlah?></span>
								<h6 class="title">Jumlah Siswa Kelas. <?= $siswa->kelas?></h6>
							</div>
						</div>
					</div>

				<?php } ?>

				<div class="col-lg-3 col-sm-6">
						<div class="counter-box">
							<div class="icon">
								<img src="<?= base_url('')?>assets/barunih/img/icon/graduation.svg" alt>
							</div>
							<div>
								<span class="counter" data-count="+" data-to="<?= $jumlahsiswa->jumlahsiswa?>" data-speed="3000"><?= $jumlahsiswa->jumlahsiswa?></span>
								<h6 class="title">Total Siswa</h6>
							</div>
						</div>
					</div>
				
				
				</div>
			</div>
		</div>


	


		<div class="team-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Guru</span>
							<h2 class="site-title">Guru <span><?= $general['nama_sekolah'] ?></span></h2>
							
						</div>
					</div>
				</div>
				<div class="row">
				

				<?php foreach ($guru as $index => $guruItem) { ?>

					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".25s">
							<div class="team-img">
								<img src="<?= base_url('uploads/guru/') . $guruItem->foto ?>" style="width:300%;" alt="thumb">
							</div>
							
							<div class="team-content">
								<div class="team-bio">
									<h5><a href="#"><?= $guruItem->nama ?></a></h5>
									<span><?= $guruItem->jabatan ?></span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
				<?php } ?>
				
				
				
				</div>
			</div>
		</div>

		<?php if ($general["jurusan"] ==="ya") {?>

		<div class="department-area bg py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Jurusan</span>
							<h2 class="site-title">Daftar <span>Jurusan</span></h2>
							
						</div>
					</div>
				</div>
				<div class="department-slider owl-carousel owl-theme">
				<?php 	$firstIteration = true; 
						foreach ($jurusan as $value) {
    					$activeClass = $firstIteration ? 'active show' : ''; 
    			?>

					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('uploads/jurusan/').$value->foto ?>" width="100%" height="300px" alt>
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="#"><?= $value->judul ?></a></h4>
							
							<div class="department-btn">
								<a href="<?= base_url("jurusan-detail/").$value->slug ?>">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>

				<?php $firstIteration = false; } ?>
				
				</div>
			</div>
		</div>

		<?php
							} else {
								# code...
							}
		?>



		<div class="gallery-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Gallery</span>
							<h2 class="site-title">Galeri <span>Foto</span></h2>
						
						</div>
					</div>
				</div>
				<div class="row popup-gallery">
				<?php  foreach ($foto as $foto ) {  ?>
					<div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
						<div class="gallery-item">
							<div class="gallery-img">
								<img src="<?= base_url('uploads/gallery/').$foto->foto ?>" alt>
							</div>
							<div class="gallery-content">
								<a class="popup-img gallery-link" href="<?= base_url('uploads/gallery/').$foto->foto ?>"><i
										class="fal fa-plus"></i></a>
							</div>
						</div>
					</div>
				<?php } ?>
				
				</div>

				
				
				</div>
			</div>
		</div>


	


	


	


	

		<div class="testimonial-area  py-120 " style="position:relative;background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>);background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    z-index: 1;
	
	">
	<style>
    .testimonial-area::before {
      content: "";
      position: absolute;
      background: rgba(0, 0, 0, 0.7); /* Ganti warna dan opasitas sesuai keinginan Anda */
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }
  </style>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Testimonials</span>
							<h2 class="site-title text-white">Testimonials <span>Siswa</span></h2>
							
						</div>
					</div>
				</div>
				<div class="testimonial-slider owl-carousel owl-theme">
				<?php foreach ($testimoni as $value) {?>
					<div class="testimonial-single">
						<div class="testimonial-rate">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="testimonial-quote">
							<p>
							<?= $value->desc ?>
							</p>
						</div>
						<div class="testimonial-content">
							<div class="testimonial-author-img">
								<img src="<?= base_url('uploads/testimoni/') . $value->foto ?>" alt>
							</div>
							<div class="testimonial-author-info">
								<h4><?= $value->nama ?></h4>
								<p>Siswa</p>
							</div>
						</div>
						
					</div>
					<?php }  ?>
					
				</div>
			</div>
		</div>


		<div class="blog-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Berita Terkini</span>
							<h2 class="site-title">Berta Terbaru & <span>Blog</span></h2>
							
						</div>
					</div>
				</div>
				<div class="row">
				<?php foreach ($berita->result() as $value) { ?>
					<div class="col-md-6 col-lg-4">
						<div class="blog-item wow fadeInUp" data-wow-delay=".25s">
							<div class="blog-item-img">
								<img src="<?= base_url() ?>uploads/kegiatan/<?= $value->foto ?>" alt="Thumb">
								<div class="blog-date"><i class="fal fa-calendar-alt"></i> <?php
      
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
	  ?></div>
							</div>
							<div class="blog-item-info">
								<div class="blog-item-meta">
									<ul>
										<li><a href="#"><i class="far fa-user-circle"></i> By Admin</a></li>
										
									</ul>
								</div>
								<h4 class="blog-title">
									<a href="<?php echo site_url('berita-detail/') . $value->slug  ?>"><?= $value->judul ?></a>
								</h4>
								<p><?php
									$berita_lengkap = $value->excerpt; 
									$kata_kata = explode(' ', $berita_lengkap);
									$excerpt_kata = implode(' ', array_slice($kata_kata, 0, 15));
									echo $excerpt_kata;
								?>..</p>
								<a class="theme-btn" href="<?php echo site_url('berita-detail/') . $value->slug  ?>">Selengkapnya<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
				<?php } ?>
				
					
				</div>
			</div>
		</div>


		<div class="partner-area bg pt-50 pb-50">
			<div class="container">
				<div class="partner-wrapper partner-slider owl-carousel owl-theme">
				<?php 
      foreach ($industri as $industri ) { 
        ?>
					<img src="<?= base_url('uploads/industri/').$industri->foto ?>" alt="thumb">
					<?php } ?>
		
				</div>
			</div>
		</div>

	</main>

    <?php $this->load->view('dashboardnew/partial/footer'); ?>
	
