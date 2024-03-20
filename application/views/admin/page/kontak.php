<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data </span> <?= $subjudul ?></h5>
		<div class="card-body">
			
			<div class="table-responsive text-nowrap">
				<table id="kontak" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Tanggal </th>
							<th>Email</th>
							<th>Subjek</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('admin/partial/footer'); ?>


<div class="modal fade" id="modal-edit" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<form enctype="multipart/form-data" id="editform">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel4">Edit <?= $subjudul ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-8 mb-3">
							<div class="form-group">
								<label for="post_title" class="form-label">Nama</label>
								<input id="nama" name="nama" class="form-control " type="text"
									value="" disabled>
								<input type="hidden" name="kodedit" id="kodedit" value="">
                                

							</div>
						</div>
                        <div class="col-md-4 mb-3">
							<div class="form-group">
								<label for="url" class="form-label">Email</label>
							    <input id="email" name="email" class="form-control " type="text"
									value="" disabled>
								
							</div>
						</div>
					</div>
                  
                    <div class="row">
						<div class="col-md-8 mb-3">
							<div class="form-group">
								<label for="url" class="form-label">Subjek</label>
							    <input id="subjek" name="subjek" class="form-control " type="text"
									value="" disabled>
								
							</div>
						</div>
                        <div class="col-md-4 mb-3">
							<div class="form-group">
								<label for="url" class="form-label">Waktu</label>
							    <input id="waktu" name="waktu" class="form-control " type="text"
									value="" disabled>
								
							</div>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Pesan</label>
							<textarea class="form-control " name="pesan" id="pesan" disabled></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					
				</div>

		</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function () {

		

		tampildata();

		function tampildata() {
			$('#kontak').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url() ?>kontak/getdata",
					type: 'GET'
				},
			});
		}

		$('#kontak').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>kontak/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="nama"]').val(data.nama);
						$('[name="email"]').val(data.email);
						$('[name="subjek"]').val(data.subjek);
						$('[name="pesan"]').val(data.pesan);
						$('[name="waktu"]').val(data.waktu);
						
					});
				}
			});
			return false;
		});


		$('#kontak').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			swal.fire({
				title: 'Yakin Menghapus data Kontak Masuk ini?',
				text: "Tekan ya jika anda yakin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: '<?= base_url() ?>kontak/hapus_kontak',
						type: 'POST',
						dataType: 'json',
						data: {
							id: id
						},

						success: function (jqXHR, textStatus) {
							if (respon == "success") {

								$('#kontak').DataTable().ajax.reload();

							} else {


							}

							console.log(response)
						},
						complete: function () {
							swal.hideLoading();
						},

						error: function (a, textStatus) {
							if (a.responseText == 'success') {
								$('#kontak').DataTable().ajax.reload();
								toastr.success('Data berhasil dihapus');

							} else if (a.responseText == 'ada') {

								toastr.failed('Data gagal dihapus');



							}

							console.log(a.responseText)
						}

					});
				}
			});

		});

	})

</script>