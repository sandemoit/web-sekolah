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
				<table id="berita" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Thumbnail</th>
							<th>Tanggal Berita</th>
							<th>Judul Berita</th>
							<th>Total View</th>
							<th>Author</th>
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
								<label for="post_title" class="form-label">Judul Berita</label>
								<input id="post_title" name="post_title" class="form-control " type="text"
									placeholder="Judul Berita..." value="" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="post_thumbnail" class="form-label">Thumbnail Berita</label>
								<input accept="image/*" class="form-control" type="file" id="post_thumbnail"
									name="post_thumbnail">
							</div>
						</div>
					</div>
					<div class="row g-2">
						<div class="mb-3 form-group">
							<label class="mb-2" for="keexcerptpsek">Spotlight / Excerpt <strong>(ringkasan)</strong></label>
							<textarea rows="4" id="excerpt" name="excerpt" class="form-control"></textarea>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="post_body" class="form-label">Isi Berita</label>
							<textarea class="form-control " name="post_body" id="post_body"></textarea>
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
								<label for="epost_title" class="form-label">Judul Berita</label>
								<input id="epost_title" name="epost_title" class="form-control " type="text"
									placeholder="Judul Berita..." value="" required>
								<input type="hidden" name="kodedit" id="kodedit" value="">

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="epost_thumbnail" class="form-label">Thumbnail Berita</label>
								<input accept="image/*" class="form-control" type="file" id="epost_thumbnail"
									name="epost_thumbnail">
							</div>



						</div>
						<div class="col-md-2">
							<img src="" alt="Thumbnail Berita" id="foto" height="100" class="w-100">
						</div>
					</div>
					<div class="row g-2">
						<div class="mb-3 form-group">
							<label class="mb-2" for="eexcerpt">Spotlight / Excerpt <strong>(ringkasan)</strong></label>
							<textarea rows="4" id="eexcerpt" name="eexcerpt" class="form-control"></textarea>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0 form-group">
							<label for="epost_body" class="form-label">Isi Berita</label>
							<textarea class="form-control " name="epost_body" id="epost_body"></textarea>
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
		$('#berita').on('click', '.imgberita', function () {
			// Ambil path gambar dari attribute src
			var imgPath = $(this).attr('src');
			console.log(imgPath);
			// Set path gambar pada modal-img
			$('#modal-img').attr('src', imgPath);
		});

		tampildata();

		function tampildata() {
			$('#berita').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url() ?>berita/getdata",
					type: 'GET'
				},
			});
		}
		// INPUT
		$("#post_body").summernote({
				height: "400px",
				toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'clear']],
			['color', ['color']],
			['para', ['paragraph']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video']]
			],
			callbacks: {
				onImageUpload: function (image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function (target) {
					deleteImage(target[0].src);
				},
				
			}
		});

		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url('berita/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function (url) {
					$("#post_body").summernote("insertImage", url);
				},
				error: function (data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?= base_url('berita/delete_image') ?>",
				cache: false,
				success: function (response) {
					console.log(response);
				}
			});
		}

		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url: "<?= base_url() ?>berita/simpan_kegiatan",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,

					success: function (response) {
						if (response == "success") {

							$('#berita').DataTable().ajax.reload();
							$('[name="post_title"]').val("");
							$('[name="excerpt"]').val("");
							$('#post_body').summernote('code', '');
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
				post_title: {
					required: true,
				},
				post_body: {
					required: true,
				},
				post_thumbnail: {
					required: true
				},
				excerpt: {
					required: true
				},
			},
			messages: {
				post_title: {
					required: 'masukkan Judul',
				},
				post_body: {
					required: true,

				},
				post_thumbnail: {
					required: 'Pilih Gambar',
				},
				excerpt: {
					required: 'Masukkan Highlight / Spotlight'
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


		// PROSES EDIT

		$("#epost_body").summernote({
			height: "400px",
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture', 'video']],
			],
			callbacks: {
				onImageUpload: function (image) {
					EdituploadImage(image[0]);
				},
				onMediaDelete: function (target) {
					EditdeleteImage(target[0].src);
				}
			}
		});

		function EdituploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url() ?>berita/upload_image",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function (url) {
					$("#epost_body").summernote("insertImage", url);
				},
				error: function (data) {
					console.log(data);
				}
			});
		}

		function EditdeleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?= base_url() ?>berita/delete_image",
				cache: false,
				success: function (response) {
					console.log(response);
				}
			});
		}

		$('#editform').submit(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>berita/simpanedit",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (response) {
					if (response == "success") {

						$('[name="epost_title"]').val("");
						$('[name="eexcerpt"]').val("");
						$('#epost_body').summernote('code', '');
						$('[name="epost_thumbnail"]').val("");
						$('#modal-edit').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						toastr.success('Data berhasil disimpan');
						$('#berita').DataTable().ajax.reload();
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
		$('#berita').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>berita/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function (judul, id, isi, foto, tanggal) {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(data.id);
						$('[name="epost_title"]').val(data.judul);
						$('[name="eexcerpt"]').val(data.excerpt);
						$('[id="foto"]').attr("src",
							"<?= base_url() ?>uploads/kegiatan/" + data
							.foto);
						$('[name="epost_body"]').summernote('code', data.isi)
					});
				}
			});
			return false;
		});


		$('#berita').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			swal.fire({
				title: 'Yakin Menghapus data berita ini?',
				text: "Tekan ya jika anda yakin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: '<?= base_url() ?>berita/hapus_kegiatan',
						type: 'POST',
						dataType: 'json',
						data: {
							id: id
						},

						success: function (jqXHR, textStatus) {
							if (respon == "success") {

								$('#berita').DataTable().ajax.reload();

							} else {


							}

							console.log(response)
						},
						complete: function () {
							swal.hideLoading();
						},

						error: function (a, textStatus) {
							if (a.responseText == 'success') {
								$('#berita').DataTable().ajax.reload();
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
