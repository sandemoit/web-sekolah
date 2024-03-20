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
				<table id="slider" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Keterangan</th>
							<th>Tombol</th>
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
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="post_thumbnail" class="form-label">Foto Slider</label>
								<input accept="image/*" class="form-control" type="file" id="post_thumbnail"
									name="post_thumbnail">
							</div>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Deskripsi Slider</label>
                            <input id="keterangan" name="keterangan" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
					</div>
					<div class="row g-2 mt-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label"><strong>Kosongkan Caption dan Link Tombol Jika tidak ingin ada tombol yang ditampilkan</strong></label>
                          
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Caption Tombol</label>
                            <input id="ct" name="ct" class="form-control " type="text"
									placeholder="..." value="" >
						</div>
					</div>

					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Link Tombol</label>
                            <input id="lt" name="lt" class="form-control " type="text"
									placeholder="..." value="" >
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
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="epost_thumbnail" class="form-label">Foto Slider</label>
								<input accept="image/*" class="form-control" type="file" id="epost_thumbnail"
									name="epost_thumbnail">
								<input type="hidden" name="kodedit" id="kodedit" value="">

							</div>



						</div>
						
					</div>
                    <div class="row p-3">
                        <div class="col-md-12">
                            <div class="form-group">

                            <img src="" alt="Thumbnail Slider" id="foto"  class="img-fluid">
                            </div>
							
						</div>
                    </div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Deskripsi Slider</label>
                            <input id="eketerangan" name="eketerangan" class="form-control " type="text"
									placeholder="..." value="" required>
						</div>
					</div>
					<div class="row g-2 mt-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label"><strong>Kosongkan Caption dan Link Tombol Jika tidak ingin ada tombol yang ditampilkan</strong></label>
                          
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Caption Tombol</label>
                            <input id="ect" name="ect" class="form-control " type="text"
									placeholder="..." value="" >
						</div>
					</div>

					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="emailExLarge" class="form-label">Link Tombol</label>
                            <input id="elt" name="elt" class="form-control " type="text"
									placeholder="..." value="" >
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
		$('#slider').on('click', '.imgslider', function () {
			// Ambil path gambar dari attribute src
			var imgPath = $(this).attr('src');
			console.log(imgPath);
			// Set path gambar pada modal-img
			$('#modal-img').attr('src', imgPath);
		});

		tampildata();

		function tampildata() {
			$('#slider').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url() ?>slider/getdata",
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
					url: "<?= base_url() ?>slider/simpan_slider",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,

					success: function (response) {
						if (response == "success") {

							$('#slider').DataTable().ajax.reload();
							$('[name="keterangan"]').val("");
							$('[name="post_thumbnail"]').val("");
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
				keterangan: {
					required: true,
				},
				
				post_thumbnail: {
					required: true
				},
				
			},
			messages: {
				keterangan: {
					required: 'masukkan Keterangan',
				},
				post_thumbnail: {
					required: 'Pilih Gambar',
				},
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


		

		$('#editform').submit(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>slider/simpanedit",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (response) {
					if (response == "success") {
						$('[name="ekterangan"]').val("");
						$('[name="ect"]').val("");
						$('[name="elt"]').val("");
					
						$('[name="epost_thumbnail"]').val("");
						$('#modal-edit').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						toastr.success('Data berhasil disimpan');
						$('#slider').DataTable().ajax.reload();
					} else {
						toastr.success('Data gagal diedit');
					}
					console.log(response)
				},
				error: function (response) {
					toastr.success('Error');

				}
			});
		})

		// showedit data
		$('#slider').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>slider/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="eketerangan"]').val(data.keterangan);
						$('[name="ect"]').val(data.ct);
						$('[name="elt"]').val(data.lt);
						$('[id="foto"]').attr("src",
							"<?= base_url() ?>uploads/slider/" + data
							.foto);
					});
				}
			});
			return false;
		});


		$('#slider').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			swal.fire({
				title: 'Yakin Menghapus data slider ini?',
				text: "Tekan ya jika anda yakin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: '<?= base_url() ?>slider/hapus_slider',
						type: 'POST',
						dataType: 'json',
						data: {
							id: id
						},

						success: function (jqXHR, textStatus) {
							if (respon == "success") {

								$('#slider').DataTable().ajax.reload();

							} else {


							}

							console.log(response)
						},
						complete: function () {
							swal.hideLoading();
						},

						error: function (a, textStatus) {
							if (a.responseText == 'success') {
								$('#slider').DataTable().ajax.reload();
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
