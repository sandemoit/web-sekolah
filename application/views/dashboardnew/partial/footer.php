<?php
  $general = $this->db->get('general')->row_array();
?>

<footer class="footer-area">
		<div class="footer-shape">
			<img src="assets/img/shape/03.png" alt>
		</div>
		<div class="footer-widget">
			<div class="container">
				<div class="row footer-widget-wrapper pt-100 pb-70">
					<div class="col-md-6 col-lg-4">
						<div class="footer-widget-box about-us">
							<a href="#" class="footer-logo">
								<img src="<?= base_url();  ?>assets/upload/images/logo/<?= $general['logo']; ?>" alt>
							</a>
							
							<ul class="footer-contact">
								<li><a href="tel:+<?= $general['whatsapp'] ?>"><i class="far fa-phone"></i><?= $general['whatsapp'] ?></a></li>
								<li><i class="far fa-map-marker-alt"></i><?= $general['alamat'] ?></li>
								<li><a
										href=""><i
											class="far fa-envelope"></i><span class="__cf_email__"
											data-cfemail="c9a0a7afa689acb1a8a4b9a5ace7aaa6a4"><?= $general['account_gmail'] ?></span></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2">
						<div class="footer-widget-box list">
							<h4 class="footer-widget-title">Quick Links</h4>
							<ul class="footer-list">
							<li><i class="fas fa-caret-right"></i> <a href="<?= base_url('') ?>">Home</a></li>
							<li><i class="fas fa-caret-right"></i> <a href="<?= base_url('berita-sekolah-list') ?>">Berita</a></li>
							<li><i class="fas fa-caret-right"></i> <a href="<?= base_url('dashboard/foto') ?>">Galeri Foto</a></li>
							<li><i class="fas fa-caret-right"></i> <a href="<?= base_url('dashboard/video') ?>">Galeri Video</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="footer-widget-box list">
							<h4 class="footer-widget-title">Ekstrakulikuler</h4>
							<ul class="footer-list">
							<?php $data= $this->db->query('SELECT * FROM ekskul LIMIT 5')->result();
                        foreach ($data as $ekskul) {
                                ?>
								<li><a href="<?= base_url('ekskul-detail/').$ekskul->slug ?>"><i class="fas fa-caret-right"></i> <?= $ekskul->judul ?></a></li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="footer-widget-box list">
							<h4 class="footer-widget-title">Newsletter</h4>
							<div class="footer-newsletter">
								<p>Subscribe Our Newsletter To Get Latest Update And News</p>
								<div class="subscribe-form">
									<form action="#">
										<input type="email" class="form-control" placeholder="Your Email">
										<button class="theme-btn" type="submit">
											Subscribe Now <i class="far fa-paper-plane"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="copyright-wrapper">
					<div class="row">
						<div class="col-md-6 align-self-center">
							<p class="copyright-text">
								&copy; Copyright <span id="date"></span> <a href="<?= base_url("") ?>"> <?= $general['nama_sekolah'] ?> </a> All Rights Reserved.
							</p>
						</div>
						<div class="col-md-6 align-self-center">
							<ul class="footer-social">
								<li><a href="<?= $general['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="<?= $general['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
								
								<li><a href="<?= $general['youtube'] ?>"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>


	
	<script src="<?= base_url('assets/barunih/') ?>js/jquery-3.6.0.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/modernizr.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/isotope.pkgd.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/jquery.appear.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/counter-up.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/wow.min.js"></script>
	<script src="<?= base_url('assets/barunih/') ?>js/main.js"></script>
<script src="<?php echo base_url() ?>assets/fullcalendar/main.js"></script>
<script src="<?php echo base_url() ?>assets/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/datatable/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-responsive/js/dataTables.responsive.min.js">
  </script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-responsive/js/responsive.bootstrap4.min.js">
  </script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-buttons/js/dataTables.buttons.min.js">
  </script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-buttons/js/buttons.bootstrap4.min.js">
  </script>
  <script src="<?php echo base_url() ?>assets/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatable/datatables-buttons/js/buttons.colVis.min.js"></script>


</body>



</html>