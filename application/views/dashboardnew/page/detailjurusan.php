<?php $this->load->view('dashboardnew/partial/header'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main class="main">

<div class="site-breadcrumb" style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
		<div class="container">
			<h2 class="breadcrumb-title"><?= $subjudul ?></h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?= base_url('') ?>">Home</a></li>
				<li class="active"><?= $subjudul ?></li>
			</ul>
		</div>
	</div>


	<div class="event-single-area py-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="event-details">
						<img src="<?= base_url() ?>uploads/jurusan/<?= $detail->foto ?>" alt>
						
						<div class="my-4">
                        <h3 class="title"> <?= $detail->judul ?></h3>

							<p><?= $detail->desc ?></p>
						</div>
						
					</div>
				</div>
				<div class="col-lg-4">
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
								<a href="<?= base_url('ekskul-detail/'.$key->slug) ?>"><i class="far fa-arrow-right"></i><?= $key->judul ?><span></span></a>
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
				</div>
			</div>
		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
