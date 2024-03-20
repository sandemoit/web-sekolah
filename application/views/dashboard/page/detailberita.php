<?php $this->load->view('dashboard/partial/headerberita'); ?>
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

					<article class="entry entry-single">

						<div class="entry-img">
							<img src="<?= base_url() ?>uploads/kegiatan/<?= $detail->foto ?>" alt=""
								class="img-fluid w-100">
						</div>

						<h2 class="entry-title"><?= $detail->judul ?></h2>
						<?php
    $articleUrl=  base_url('berita-detail/' . $detail->slug); 
    $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($articleUrl);
    ?>
						<?php
    $articleUrl=  site_url('berita-detail/' . $detail->slug); 

    $twitterUrl = 'https://twitter.com/intent/tweet?url=' . urlencode($articleUrl) . '&text=' . urlencode($detail->judul);
    ?>

						<div class="entry-meta">
							<ul class="d-flex justify-content-end"	>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
										href=""><?= $detail->nama ?></a></li>
								<li class="d-flex align-items-center">
									<i class="bi bi-clock"></i>
									<a href="">
										<time datetime="<?= date("Y-m-d H:i:s", strtotime($detail->waktu)) ?>">
											<?php
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
										</time>
									</a>
								</li>





							</ul>
						</div><!-- End meta top -->

						<div class="entry-content">
							<?php echo $detail->isi; ?>

						</div><!-- End post content -->

<hr>
						<div class="entry-meta">
							<ul class="d-flex justify-content-end">
								<li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
										href=""><?= $detail->view_count ?>x</a></li>
								<li class="d-flex align-items-center"><i class="bi bi-whatsapp"></i> <a target="_blank"
										href="https://api.whatsapp.com/send?text=Berita Sekolah: <?php echo urlencode($articleUrl); ?>">Share
										Whatsapp</a></li>
							</ul>
						</div><!-- End meta bottom -->

					</article><!-- End blog post -->


				</div>

				<div class="col-lg-4">

					<div class="sidebar">
						
						<h3 class="sidebar-title text-white bg-primary">Berita Terbaru</h3>
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
						<h3 class="sidebar-title text-white bg-primary">Ekstrakulikuler</h3>
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
	</section><!-- End Blog Details Section -->



</main>



<?php $this->load->view('dashboard/partial/footer'); ?>
