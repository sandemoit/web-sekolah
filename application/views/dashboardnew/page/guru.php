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


	<div class="py-120">
		<div class="container">
			<div class="row">
				<div class="col">

					<h3 class="mb-3">Daftar <?= $subjudul ?></h3>
					<div class="table-responsive">
						<table id="dataguru" class="table table-light">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">Nama</th>
									<th scope="col">NBM</th>
									<th scope="col">Pendidikan</th>
									<th scope="col">Alumni</th>
									<th scope="col">Jabatan</th>
									<th scope="col">Foto</th>

								</tr>
							</thead>
							<tbody>

                            <?php 
                    $no=0;
                    foreach ($guru as $guru) { $no++; ?>
                    
					<tr>
						<td><?= $no ?></td>
						<td><?= $guru->nama ?></td>
						<td><?= $guru->nbm ?></td>
						<td><?= $guru->pendidikan ?></td>
						<td><?= $guru->alumni ?></td>
						<td><?= $guru->jabatan ?></td>
						<td><img src="<?= base_url();  ?>uploads/guru/<?= $guru->foto; ?>" alt="Foto Guru" width="100"></td>
					</tr>
                    <?php } ?>
					
							</tbody>
						</table>
					</div>
				</div>


			</div>


		</div>
	</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
<script>
	$(document).ready(function () {
		$('#dataguru').DataTable({
			"responsive": true,
			"lengthChange": true,
			"autoWidth": false,
			"paging": true,
		});
	});

</script>
