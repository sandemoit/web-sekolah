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

			<div class="row g-5">

				<div class="col-lg-8">

					<article class="blog-details p-5">
                        
						<div class="post-img text-center mb-5">
							<img src="<?= base_url() ?>uploads/jurusan/<?= $detail->foto ?>" alt="" widht="100%" height="200px">
						</div>
                        <hr>
						
						<div class="content">
							<?= $detail->desc ?>
						</div><!-- End post content -->
					</article><!-- End blog post -->
				</div>

				<div class="col-lg-4">

					<div class="sidebar">
						<div class="sidebar-item recent-posts">
							<h3 class="sidebar-title bg-primary text-white">Jurusan</h3>
                            <hr>

							<div class="mt-3">

								<?php foreach ($jurusan as $key ) {
                            ?>
								<div class="post-item mt-3">
                                
										<h4 class="m-0">
                                            <a 
												href="<?= base_url('jurusan-detail/'.$key->slug) ?>"><?= $key->judul ?></a>
										</h4>
									
								</div><!-- End recent post item-->
								<?php
                            }
                            ?>

							</div>

						</div>
                            
						<div class="sidebar-item recent-posts">
                            
							<h3 class="sidebar-title bg-primary text-white">Berita Terbaru</h3>
                            <hr>

							<div class="mt-3">

								<?php foreach ($berita->result() as $data) {
         ?>
								<div class="post-item mt-3">
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



					</div><!-- End Blog Sidebar -->

				</div>
			</div>

		</div>
	</section><!-- End Blog Details Section -->



</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
