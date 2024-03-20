<?php $this->load->view('dashboardnew/partial/headerberita'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main class="main">

	<div class="site-breadcrumb"
		style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
		<div class="container">
			<h2 class="breadcrumb-title"><?= $subjudul ?></h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?= base_url('') ?>">Home</a></li>
				<li class="active"><?= $subjudul ?></li>
			</ul>
		</div>
	</div>


	<div class="blog-single-area pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-single-wrapper">
						<div class="blog-single-content">
							<div class="blog-thumb-img">
								<img src="<?= base_url() ?>uploads/kegiatan/<?= $detail->foto ?>" alt="thumb">
							</div>
							<div class="blog-info">
								<div class="blog-meta">
									<div class="blog-meta-left">
										<ul>
											<li><i class="far fa-user"></i><a href="#"><?= $detail->nama ?></a></li>
											<li><i class="far fa-play"></i><a href="#"><?= $detail->view_count ?></a>
											</li>
											<li><i class="far fa-calendar"></i><?php
            $nama_hari = array(
                'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
            );

            $nama_bulan = array(
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            );

            $tanggal = date("d", strtotime($detail->waktu));
            $bulan = date("n", strtotime($detail->waktu)) - 1;
            $tahun = date("Y", strtotime($detail->waktu));
            $hari = date("w", strtotime($detail->waktu));

            echo $nama_hari[$hari] . ', ' . $tanggal . ' ' . $nama_bulan[$bulan] . ' ' . $tahun;
            ?>

												<?php
    $articleUrl=  site_url('berita-detail/' . $detail->slug); 

    $twitterUrl = 'https://twitter.com/intent/tweet?url=' . urlencode($articleUrl) . '&text=' . urlencode($detail->judul);
    ?>
											</li>

										</ul>
									</div>
									<div class="blog-meta-right">
										<a href="https://api.whatsapp.com/send?text=Berita Sekolah: <?php echo urlencode($articleUrl); ?>"
											class="share-btn"><i class="far fa-share-alt"></i>Share Whatsapp</a>
									</div>
								</div>
								<div class="blog-details">
									<h3 class="blog-details-title mb-20"><?= $detail->judul ?>
									</h3>
									<p class="mb-10">
										<?php echo $detail->isi; ?>
									</p>

									<hr>

								</div>

							</div>
							<div class="blog-comments">
								<h3>Komentar</h3>
								<div class="blog-comments-wrapper">
									<?=  $disqus; ?>

								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<aside class="sidebar">

						<div class="widget search">
							<h5 class="widget-title">Search</h5>
							<form action="<?= base_url("cariberita") ?>" method="POST" class="search-form">
								<input type="text" class="form-control" placeholder="Search Here..." name='cari'
									required>
								<button type="submit"><i class="far fa-search"></i></button>
							</form>
						</div>

						<div class="widget category">
							<h5 class="widget-title">Ekstrakulikuler</h5>
							<div class="category-list">
								<?php foreach ($ekskul as $key ) { ?>
								<a href="<?= base_url('ekskul-detail/'.$key->slug) ?>"><i
										class="far fa-arrow-right"></i><?= $key->judul ?><span></span></a>
								<?php
                            }
                            ?>
							</div>
						</div>

						<div class="widget recent-post">
							<h5 class="widget-title">Recent Post</h5>
							<?php foreach ($berita->result() as $data) { ?>

							<div class="recent-post-single">
								<div class="recent-post-img">
									<img src="<?= base_url() ?>uploads/kegiatan/<?= $data->foto ?>" alt="thumb">
								</div>
								<div class="recent-post-bio">
									<h6><a href="<?= base_url('berita-detail/'.$data->slug) ?>"><?= $data->judul ?></a>
									</h6>
									<span><i
											class="far fa-clock"></i><?= date("D", strtotime($data->waktu)).','.date("d M Y", strtotime($data->waktu))  ?></span>
								</div>
							</div>

							<?php } ?>


						</div>
						<?php $general = $this->db->get('general')->row_array(); ?>
						<div class="widget social-share">
							<h5 class="widget-title">Follow Us</h5>
							<div class="social-share-link">
								<a href="<?= $general['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
								<a href="<?= $general['instagram'] ?>"><i class="fab fa-instagram"></i></a>
								<a href="<?= $general['youtube'] ?>"><i class="fab fa-youtube"></i></a>

							</div>
						</div>


					</aside>
				</div>
			</div>
		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
