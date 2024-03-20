<?php $this->load->view('dashboard/partial/header'); ?>
<?php $this->load->view('dashboard/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main id="main">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2><?= $subjudul ?></h2>
				<ol>
					<li><a href="<?= base_url('') ?>">Home</a></li>
					<li><?= $judul ?></li>
					<li><?= $subjudul ?></li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs Section -->

	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row ">

				<div class="col-lg-8 entries">


					<?php foreach ($beritalists as $data) {?>

					<article class="entry">

						<div class="entry-img">
							<img src="<?= base_url() ?>uploads/kegiatan/<?= $data->foto ?>" alt="" class="img-fluid">
						</div>

						<h2 class="entry-title">
							<a href="<?php echo site_url('berita-detail/') . $data->slug  ?>"><?= $data->judul ?></a>
						</h2>

						<div class="entry-meta">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a data-pjax
										href="<?php echo site_url('berita-detail/') . $data->slug  ?>"><?= $data->nama ?></a>
								</li>
								<li class="d-flex align-items-center">
									<i class="bi bi-clock"></i>
									<a data-pjax href="<?php echo site_url('berita-detail/') . $data->slug  ?>">
										<time datetime="<?= date("Y-m-d H:i:s", strtotime($data->waktu)) ?>">
											<?php
      
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
            ?>
										</time>
									</a>
								</li>

								<li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
										href=""><?= $data->view_count ?>x</a></li>
							</ul>
						</div>

						<div class="entry-content">
							<p>
							<?php
									$berita_lengkap = $data->excerpt; 
									$kata_kata = explode(' ', $berita_lengkap);
									$excerpt_kata = implode(' ', array_slice($kata_kata, 0, 20));
									echo $excerpt_kata;
								?>..

							</p>
							<div class="read-more">
								<a href="<?php echo site_url('berita-detail/') . $data->slug  ?>">Baca
									Selengkapnya</a>
							</div>
						</div>

					</article>

					<?php } ?>



					<div class="blog-pagination">
						<ul class="justify-content-center">
							<?php echo $pagination; ?>
						</ul>
					</div><!-- End blog pagination -->

				</div>

				<div class="col-lg-4">

					<div class="sidebar">
						<h3 class="sidebar-title bg-primary text-white">Berita Terbaru</h3>
						<hr>
						<div class="sidebar-item recent-posts">


							<div class="mt-3">

								<?php foreach ($berita->result() as $data) { ?>
								<div class="post-item mt-3 clearfix">
									<img src="<?= base_url() ?>uploads/kegiatan/<?= $data->foto ?>" alt=""
										class="flex-shrink-0">
									<div>
										<h4><a data-pjax
												href="<?= base_url('berita-detail/'.$data->slug) ?>"><?= $data->judul ?></a>
										</h4>
										<time
											datetime="2020-01-01"><?= date("D", strtotime($data->waktu)).','.date("d M Y", strtotime($data->waktu))  ?></time>
									</div>
								</div><!-- End recent post item-->

								<?php } ?>




							</div>

						</div><!-- End sidebar recent posts-->
						<h3 class="sidebar-title bg-primary text-white">Ekstrakulikuler</h3>
						<hr>
						<div class="sidebar-item categories">
							<ul>
								<?php foreach ($ekskul as $key ) {
                            ?>
								<li><a href="<?= base_url('ekskul-detail/'.$key->slug) ?>"><?= $key->judul ?></a></li>
								<?php
                            }
                            ?>
							</ul>
						</div><!-- End sidebar categories-->


					</div><!-- End Blog Sidebar -->

				</div>

			</div>

		</div>
	</section><!-- End Blog Section -->



</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
