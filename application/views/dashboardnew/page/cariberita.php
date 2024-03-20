<?php $this->load->view('dashboardnew/partial/header'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main class="main">
	<div class="site-breadcrumb"
		style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
		<div class="container">
			<h2 class="breadcrumb-title">Hasil Pencarian</h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?= base_url('') ?>">Home</a></li>
				<li class="active">Keyword : <?= $keyword ?></li>
			</ul>
		</div>
	</div>


	<div class="blog-area py-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<div class="site-heading text-center">
						<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> <?= $subjudul ?></span>
						<h2 class="site-title"><span><?= $subjudul ?></span></h2>

					</div>
				</div>
			</div>
			<div class="row">
				<?php
                if (empty($beritalists)) { ?>
				<div class="error-area py-120">
					<div class="container">
						<div class="col-md-6 mx-auto">
							<div class="error-wrapper">
								<div class="error-img">
									<img src="<?= base_url() ?>assets/barunih/img/error/01.png" alt>
								</div>
								<h2>Opos... Tidak ada Berita ditemukan!</h2>
								<p>Berita yang anda cari tidak ditemukan.</p>
								<a href="<?= base_url("") ?>" class="theme-btn">Go Back Home <i
										class="far fa-home"></i></a>
							</div>
						</div>
					</div>
				</div>

				<?php } else {
                
                ?>
				<?php foreach ($beritalists as $data) {?>

				<div class="col-md-6 col-lg-4">
					<div class="blog-item wow fadeInUp" data-wow-delay=".25s">
						<div class="blog-item-img">
							<img src="<?= base_url() ?>uploads/kegiatan/<?= $data->foto ?>" alt="Thumb">
							<div class="blog-date"><i class="fal fa-calendar-alt"></i> <?php
      
      $nama_hari = array(
          'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
      );

     
      $nama_bulan = array(
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      );

  
      $tanggal = date("d", strtotime($data->waktu));
      $bulan = date("n", strtotime($data->waktu)) - 1; 
      $tahun = date("Y", strtotime($data->waktu));
      $hari = date("w", strtotime($data->waktu)); 

      echo $nama_hari[$hari] . ', ' . $tanggal . ' ' . $nama_bulan[$bulan] . ' ' . $tahun;
      ?></div>
						</div>
						<div class="blog-item-info">
							<div class="blog-item-meta">
								<ul>
									<li><a href="#"><i class="far fa-user-circle"></i> By Admin</a></li>
									<li><a href="#"><i class="far fa-play"></i> <?= $data->view_count ?></a></li>
								</ul>
							</div>
							<h4 class="blog-title">
								<a
									href="<?php echo site_url('berita-detail/') . $data->slug  ?>"><?= $data->judul ?></a>
							</h4>
							<p><?php
									$berita_lengkap = $data->excerpt; 
									$kata_kata = explode(' ', $berita_lengkap);
									$excerpt_kata = implode(' ', array_slice($kata_kata, 0, 20));
									echo $excerpt_kata;
								?>..</p>
							<a class="theme-btn"
								href="<?php echo site_url('berita-detail/') . $data->slug  ?>">Selengkapnya<i
									class="fas fa-arrow-right-long"></i></a>
						</div>
					</div>
				</div>

				<?php }} ?>

			</div>



		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
