<?php $this->load->view('dashboard/partial/header'); ?>
<?php $this->load->view('dashboard/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/datatable/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/datatable/datatables-buttons/css/buttons.bootstrap4.min.css">

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
						<th>Nama</th>
						<th>NBM</th>
						<th>Pendidikan</th>
						<th>Alumni</th>
                        <th>Jabatan</th>
						<th>Foto</th>
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
					
					
					<!-- Tambahkan baris data guru lainnya di sini -->
				</tbody>
			</table>
		</div>
	</section>


</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
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
