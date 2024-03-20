<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data Struktur Organisasi</h5>
		<div class="card-body">
		<form id="inputform">
			<div class="mb-3 form-group">
				<textarea id="struktur" name="struktur" class="form-control"></textarea>
			</div>
			<button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fas fa-save fa-lg"></i> Simpan</button>
		</form>
		</div>
	</div>
</div>
<?php $this->load->view('admin/partial/footer'); ?>
<script>
	$(document).ready(function () {
		tampildata();

		$("#struktur").summernote({
			height: "500px",
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture', 'video']],
				['misc', ['fullscreen', 'codeview', 'help']],
			],
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});

        
		// summernote upload delete image
        function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url('struktur/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$("#struktur").summernote("insertImage", url);
				},
				error: function(data) {
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
				url: "<?= base_url('struktur/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}

		function tampildata() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>struktur/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function() {
						$('[id="struktur"]').summernote('code', data.struktur)
					});
				}
			});
			return false;
		}

		$.validator.setDefaults({
			submitHandler: function() {
				var struktur = $('#struktur').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>struktur/simpan",
					data: {
						'struktur': struktur,
					},

					success: function(response) {
						if (response == "success") {
							toastr.success('Data berhasil disimpan');
							// window.location.reload(true);
						} else {
							toastr.error('Data gagal disimpan');
						}
						console.log(response)
					},
					error: function(response) {
						toastr.error('Server error');
					}
				});
			}
		});
		$('#inputform').validate({
			rules: {
				strukturf: {
					required: true,
				}
			},
			messages: {
				strukturf: {
					required: "Masukan struktur",
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});

		


	})

</script>
