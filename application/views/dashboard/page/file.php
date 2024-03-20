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
    <style>
    .table-header {
      background-color: #0f4c75;
      color: #fff;
    }
    .table-header th {
      border: none;
      font-weight: bold;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f3f3f3;
    }
    .table-striped tbody tr:nth-of-type(even) {
      background-color: #fff;
    }
    .table-striped tbody tr:hover {
      background-color: #d0e9f9;
    }
    .table-striped tbody tr td {
      border-top: 1px solid #dee2e6;
    }
  </style>
	<section class="inner-page">
		<div class="container">
			<table id="dataguru" class="table table-striped table-bordered">
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
						<td><h5><?= $file->keterangan ?></h5></td>
						<td><a href="<?php echo base_url("uploads/download/") ?><?= $file->file ?>" class="btn btn-info" target="_blank"><i class="fas fa-download"></i> </a></td>
						
					</tr>
                    <?php } ?>
					
					
					<!-- Tambahkan baris data guru lainnya di sini -->
				</tbody>
			</table>
		</div>
	</section>


</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
<script>
	$(document).ready(function () {
		$('#dataguru').DataTable();
	});

</script>
