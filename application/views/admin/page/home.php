<?php $this->load->view('admin/partial/header'); ?>
<?php
  $setting = $this->db->get('general')->row_array();  
?>


<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
		<div class="col-md-7 mb-4 order-0">
			<div class="card bg-info">
				<div class="d-flex align-items-end row">
					<div class="col-sm-7">
						<div class="card-body">
							<h2 class="card-title text-white">Selamat Datang Admin ! </h2>
							<h5 class="mb-4 text-white">
								<?= $setting['app_name']; ?> <span class="fw-bold">
									<?=$setting['nama_sekolah'];?></span>
							</h5>
						</div>
					</div>
					<div class="col-sm-5 text-center text-sm-left">
						<div class="card-body pb-0 px-0 px-md-4">
							<img src="<?= base_url('') ?>assets/img/siswanobg.png" height="140" alt="View Badge User" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card-primary">
				<div class="card-body ">
					<h5 class="card-title"><i class="fas text-primary fa-calendar mr-2"></i> Jam dan Tanggal</h5>
					<div id="clock"></div>
					<div id="date"></div>
				</div>
			</div>
		</div>


	</div>
<hr>
	<div class="row">
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-info">
				<a href="<?= base_url('profil-sekolah') ?>">
					<div class="card-body">
						<i class="text-white fas fa-users fa-3x mb-3"></i>
						<h5 class="text-white card-title">Pengunjung Website Hari ini</h5>
						<h2 class="text-white card-title"><?= $pengunjung_hari ?></h2>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-info">
				<a href="<?= base_url('profil-sekolah') ?>">
					<div class="card-body">
						<i class="text-white fas fa-user-plus fa-3x mb-3"></i>
						<h5 class="text-white card-title">Total Pengunjung Website</h5>
						<h2 class="text-white card-title"><?= $total_pengunjung ?></h2>

					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-info p-3">
			<a href="https://info.flagcounter.com/Zp0u"><img src="https://s01.flagcounter.com/countxl/Zp0u/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_1/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
			</div>
		</div>


	</div>
<hr>

	<div class="row">
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-teal">
				<a href="<?= base_url('profil-sekolah') ?>">
					<div class="card-body">
						<i class="text-danger fas fa-user fa-3x mb-3"></i>
						<h5 class="text-danger card-title">Profil Sekolah</h5>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-info">
				<a href="<?= base_url('berita') ?>">
					<div class="card-body">
						<i class="text-danger fas fa-info-circle fa-3x mb-3"></i>
						<h5 class="card-title text-danger">Berita</h5>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-danger">
				<a href="<?= base_url('foto') ?>">
					<div class="card-body">
						<i class="text-white fas fa-images fa-3x mb-3"></i>
						<h5 class="text-white card-title">Galeri</h5>
					</div>
				</a>
			</div>
		</div>

		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-warning">
				<a href="<?= base_url('kontak') ?>">
					<div class="card-body">
						<i class="text-white fas fa-envelope fa-3x mb-3"></i>
						<h5 class="text-white card-title">Pesan Masuk</h5>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-secondary">
				<a href="<?= base_url('usermanajemen') ?>">
					<div class="card-body">
						<i class="text-white fas fa-users fa-3x mb-3"></i>
						<h5 class="text-white card-title">Daftar User</h5>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-6 mt-3">
			<div class="card shortcut-card text-center bg-success">
				<a href="<?= base_url('setting') ?>">
					<div class="card-body">
						<i class="text-danger fas fa-cog fa-3x mb-3"></i>
						<h5 class="text-danger card-title">Konfigurasi</h5>
					</div>
				</a>
			</div>
		</div>
	</div>



</div>

<?php $this->load->view('admin/partial/footer'); ?>

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