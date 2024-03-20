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
				<table id="guru" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama</th>
							<th>Pendidikan</th>
							<th>Alumni</th>
							<th>Jabatan</th>
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
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img id="modal-img" src="" height="700" class="w-100" style="margin: 0 auto;">
			</div>
		</div>
	</div>
</div>
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
						<div class="col-md-8 mb-3">
							<div class="form-group">
								<label for="nama" class="form-label">Nama </label>
								<input id="nama" name="nama" class="form-control " type="text"
									placeholder="Nama guru..." value="" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="foto" class="form-label">Foto </label>
								<input accept="image/*" class="form-control" type="file" id="foto"
									name="foto">
							</div>
						</div>
					</div>
					<div class="row g-2">
						
                        <div class="col-md-3 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Pendidikan </label>
							<input id="pendidikan" name="pendidikan" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
                        <div class="col-md-3 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Alumni </label>
							<input id="alumni" name="alumni" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
                        <div class="col-md-3 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Jabatan </label>
							<input id="jabatan" name="jabatan" class="form-control " type="text"
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
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="enama" class="form-label">Nama </label>
								<input id="enama" name="enama" class="form-control " type="text"
									placeholder="..." value="" required>
								<input type="hidden" name="kodedit" id="kodedit" value="">

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="epost_thumbnail" class="form-label">Foto guru</label>
								<input accept="image/*" class="form-control" type="file" id="efoto"
									name="efoto">
							</div>
						</div>
						<div class="col-md-2">
							<img src="" alt="Foto guru" id="fotoguru" height="100" class="w-100">
						</div>
					</div>
					<div class="row g-2">
                    
                        <div class="col-md-3 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Pendidikan </label>
							<input id="ependidikan" name="ependidikan" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
                        <div class="col-md-3 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Alumni </label>
							<input id="ealumni" name="ealumni" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
                        <div class="col-md-3 mb-0 form-group">
							<label for="emailExLarge" class="form-label">Jabatan </label>
							<input id="ejabatan" name="ejabatan" class="form-control " type="text"
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

		// Ketika gambar di klik
		$('#guru').on('click', '.imgguru', function () {
			// Ambil path gambar dari attribute src
			var imgPath = $(this).attr('src');
			console.log(imgPath);
			// Set path gambar pada modal-img
			$('#modal-img').attr('src', imgPath);
		});

		tampildata();

		function tampildata() {
			$('#guru').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url() ?>guru/getdata",
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
					url: "<?= base_url() ?>guru/simpan_guru",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,

					success: function (response) {
						if (response == "success") {
							$('#guru').DataTable().ajax.reload();
							$('[name="nama"]').val("");
							$('[name="nbm"]').val("");
							$('[name="pendidikan"]').val("");
							$('[name="alumni"]').val("");
							$('[name="jabatan"]').val("");
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
				nama: {
					required: true,
				},
				foto: {
					required: true,
				},
				nbm: {
					required: true
				},
                pendidikan: {
					required: true
				},
                alumni: {
					required: true
				},jabatan: {
					required: true
				},
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
				url: "<?= base_url() ?>guru/simpanedit",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (response) {
					if (response == "success") {
							$('[name="enama"]').val("");
							$('[name="enbm"]').val("");
							$('[name="ependidikan"]').val("");
							$('[name="ealumni"]').val("");
							$('[name="ejabatan"]').val("");
						$('#modal-edit').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						toastr.success('Data berhasil disimpan');
						$('#guru').DataTable().ajax.reload();
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
		$('#guru').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>guru/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="enama"]').val(data.nama);
						$('[name="ependidikan"]').val(data.pendidikan);
						$('[name="ealumni"]').val(data.alumni);
						$('[name="ejabatan"]').val(data.jabatan);
						$('[id="fotoguru"]').attr("src",
							"<?= base_url() ?>uploads/guru/" + data
							.foto);
						
					});
				}
			});
			return false;
		});


		$('#guru').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			swal.fire({
				title: 'Yakin Menghapus data guru ini?',
				text: "Tekan ya jika anda yakin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: '<?= base_url() ?>guru/hapus_guru',
						type: 'POST',
						dataType: 'json',
						data: {
							id: id
						},

						success: function (jqXHR, textStatus) {
							if (respon == "success") {

								$('#guru').DataTable().ajax.reload();

							} else {


							}

							console.log(response)
						},
						complete: function () {
							swal.hideLoading();
						},

						error: function (a, textStatus) {
							if (a.responseText == 'success') {
								$('#guru').DataTable().ajax.reload();
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
