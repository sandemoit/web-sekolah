<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data </span> <?= $subjudul ?></h5>
		<div class="card-body">
			<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#modal-add">
				<i class="fas fa-plus-circle"></i> Tambah Data
			</button>
			<div class="table-responsive text-nowrap">
				<table id="siswa" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Kelas</th>
							<th>Jumlah</th>
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

<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<form enctype="multipart/form-data" id="inputform">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel4">Tambah <?= $subjudul ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="nama" class="form-label">Nama Kelas </label>
								<input id="kelas" name="kelas" class="form-control " type="text"
									placeholder="Nama Kelas..." value="" required>
							</div>
						</div>
					</div>
					<div class="row g-2">
						
                        <div class="col-md-12 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Jumlah Siswa </label>
							<input id="jumlah" name="jumlah" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
                     
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary " id="btn-simpan "><i class="fas fa-save"></i>
						Simpan</button>
				</div>

		</div>
		</form>
	</div>
</div>

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
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="nama" class="form-label">Nama Kelas </label>
								<input id="ekelas" name="ekelas" class="form-control " type="text"
									placeholder="Nama Kelas..." value="" required>
                                    <input type="hidden" name="kodedit" id="kodedit">
							</div>
						</div>
					</div>
					<div class="row g-2">
						
                        <div class="col-md-12 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Jumlah Siswa </label>
							<input id="ejumlah" name="ejumlah" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
                     
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary " id="btn-simpan "><i class="fas fa-save"></i>
						Simpan</button>
				</div>

		</div>
		</form>
	</div>
</div>


</div>

<script>
	$(document).ready(function () {

		

		tampildata();

		function tampildata() {
			$('#siswa').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url() ?>siswa/getdata",
					type: 'GET'
				},
			});
		}
		// INPUT
		

		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url: "<?= base_url() ?>siswa/simpan_siswa",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,

					success: function (response) {
						if (response == "success") {
							$('#siswa').DataTable().ajax.reload();
							$('[name="kelas"]').val("");
							$('[name="jumlah"]').val("");
							
							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							toastr.success('Data berhasil disimpan');
						} else {
							toastr.failed('Data Gagal disimpan');
						}

						console.log(response)
					},

					error: function (response) {
						toastr.failed('Data Gagal disimpan');

					}
				});
			}
		});
		$('#inputform').validate({
			rules: {
				kelas: {
					required: true,
				},
				jumlah: {
					required: true,
				}
			},
			messages: {
				
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});


		// PROSES EDIT

		$('#editform').submit(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>siswa/simpan_edit",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (response) {
					if (response == "success") {
							$('[name="ekelas"]').val("");
							$('[name="ejumlah"]').val("");
							
						$('#modal-edit').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						toastr.success('Data berhasil disimpan');
						$('#siswa').DataTable().ajax.reload();
					} else {
						toastr.error('Data gagal diedit');
					}
					console.log(response)
				},
				error: function (response) {
					toastr.error('Error');

				}
			});
		})

		// showedit data
		$('#siswa').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>siswa/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="ekelas"]').val(data.kelas);
						$('[name="ejumlah"]').val(data.jumlah);
						
						
					});
				}
			});
			return false;
		});


		$('#siswa').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			swal.fire({
				title: 'Yakin Menghapus data siswa ini?',
				text: "Tekan ya jika anda yakin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: '<?= base_url() ?>siswa/hapus_siswa',
						type: 'POST',
						dataType: 'json',
						data: {
							id: id
						},

						success: function (jqXHR, textStatus) {
							if (respon == "success") {

								$('#siswa').DataTable().ajax.reload();

							} else {


							}

							console.log(response)
						},
						complete: function () {
							swal.hideLoading();
						},

						error: function (a, textStatus) {
							if (a.responseText == 'success') {
								$('#siswa').DataTable().ajax.reload();
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
