<?php
  $general = $this->db->get('general')->row_array();
?>
<style>
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      left: 20px; /* Mengubah right menjadi left */
      z-index: 99;
      background-color: #25d366;
      color: #fff;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      transition: transform 0.2s;
    }

    .whatsapp-float:hover {
      background-color: #128c7e;
      transform: scale(1.1);
    }

    .whatsapp-float i {
      font-size: 30px;
      line-height: 60px;
    }

    .whatsapp-float span {
      font-size: 14px;
      display: block;
      margin-top: 5px;
    }
</style>
<?php
$whatsappNumber = $general['whatsapp']; // Ambil nomor WhatsApp dari database
$whatsappNumber = preg_replace('/^0/', '62', $whatsappNumber); // Ganti 0 di depan dengan 62
?>

<a href="https://api.whatsapp.com/send?phone=<?= $whatsappNumber; ?>" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
  
  </a>
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><?= $general['nama_sekolah'] ?></h3>
              <p>
              <?= $general['alamat'] ?><br>
                <br>
                <strong>Telephone:</strong> <?= $general['whatsapp'] ?><br>
                <strong>Email:</strong> <?= $general['account_gmail'] ?><br>
              </p>
              <div class="social-links mt-3">
                <a href="<?= $general['twitter'] ?>" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="<?= $general['facebook'] ?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?= $general['instagram'] ?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="<?= $general['youtube'] ?>" target="_blank" class="instagram"><i class="bx bxl-youtube"></i></a>
               
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4> Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('berita-sekolah-list') ?>">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('dashboard/foto') ?>">Galeri Foto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('dashboard/video') ?>">Galeri Video</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Ekstrakulikuler</h4>
            <ul>
            <?php $data= $this->db->query('SELECT * FROM ekskul LIMIT 5')->result();
                        foreach ($data as $ekskul) {
                                ?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('ekskul-detail/').$ekskul->slug ?>"><?= $ekskul->judul ?></a></li>
              <?php } ?>
             
            </ul>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?= $general['nama_sekolah'] ?></span></strong>. All Rights Reserved
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('') ?>assets/vendor/libs/jquery/jquery.js"></script>

  <script src="<?= base_url('assets/dashboard/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('assets/dashboard/') ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets/dashboard/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/dashboard/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/dashboard/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/dashboard/') ?>assets/js/main.js"></script>
  <script src="<?php echo base_url() ?>assets/sweetalert2/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/js/bootstrap.bundle.min.js"></script>
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
<script src="<?php echo base_url() ?>assets/fullcalendar/main.js"></script>
  

<script>
    // Menampilkan pesan error
    <?php if ($this->session->flashdata('error_msg')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "<?php echo $this->session->flashdata('error_msg'); ?>",
        });
    <?php endif; ?>

    // Menampilkan pesan berhasil
    <?php if ($this->session->flashdata('success_msg')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "<?php echo $this->session->flashdata('success_msg'); ?>",
        });
    <?php endif; ?>
</script>

<script>
    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    function formatDate(date) {
      var day = days[date.getDay()];
      var month = months[date.getMonth()];
      var year = date.getFullYear();
      var dayOfMonth = date.getDate();
      return day + ', ' + dayOfMonth + ' ' + month + ' ' + year;
    }

    var now = new Date();
    document.getElementById("date").innerText = formatDate(now);
  </script>

<script>
						function updateClock() {
							var now = new Date();
							var hour = now.getHours();
							var minute = now.getMinutes();
							var second = now.getSeconds();

							hour = (hour < 10 ? "0" : "") + hour;
							minute = (minute < 10 ? "0" : "") + minute;
							second = (second < 10 ? "0" : "") + second;

							var time = hour + ":" + minute + ":" + second;

							document.getElementById("clock").innerText = time;
							setTimeout(updateClock, 1000);
						}

						updateClock();

					</script>

</body>

</html>