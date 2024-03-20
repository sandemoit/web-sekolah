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


					<h3 class="mb-3"><?= $subjudul ?></h3>
					<div class="table-responsive">


						<table id="dataguru" class="table table-light">
							<thead class="table-header">
								<tr>
									<th>No.</th>
									<th>Keterangan/Judul</th>
									<th>file</th>

								</tr>
							</thead>
							<tbody>
								<?php 
                    $no=0;
                    foreach ($file as $file) { $no++; ?>

								<tr>
									<td><?= $no ?></td>
									<td>
										<h5><?= $file->keterangan ?></h5>
									</td>
									<td><a href="<?php echo base_url("uploads/download/") ?><?= $file->file ?>"
											class="btn btn-info" target="_blank"><i class="fas fa-download"></i> </a>
									</td>

								</tr>
								<?php } ?>


								<!-- Tambahkan baris data guru lainnya di sini -->
							</tbody>
						</table>
					</div>
				</div>


			</div>
		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>

<script>
	$(document).ready(function () {
		$('#dataguru').DataTable();
	});

</script>
