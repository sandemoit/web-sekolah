<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data Sambutan</h5>
		<div class="card-body">
			<form id="inputform"  enctype="multipart/form-data">
				<div class="form-group mb-3">
					<label class="mb-2" for="kepsek">Foto Kepala Sekolah</label>
					<input type="file" accept="image/*" class="form-control" id="kepsek" name="kepsek" placeholder="kepsek">
				</div>
				<div class="form-group mb-3">
					<img class="w-25" alt="" id="imgkepsek">
				</div>
				<div class="mb-3 form-group">
					<label class="mb-2" for="kepsek">Spotlight / Excerpt <strong>(ini seperti ringkasan yang akan ditampilkan di dashboard)</strong></label>
					<textarea rows="10" id="excerpt" name="excerpt" class="form-control"></textarea>
				</div>
				<div class="mb-3 form-group">
					<label class="mb-2" for="kepsek">Kata kata Sambutan</label>
					<textarea id="sambutan" name="sambutan" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fas fa-save"></i>
					Simpan</button>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('admin/partial/footer'); ?>
<script>
	$(document).ready(function () {
		tampildata();

		$("#sambutan").summernote({
			styleTags: [
    'p',
        { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
        'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	],
			height: "200px",
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['']],
				['misc', ['fullscreen', 'codeview', 'help']],
			],
		});

		function tampildata() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>sambutan/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('[id="sambutan"]').summernote('code', data.sambutan)
						$('[id="excerpt"]').val(data.excerpt)
						$('[id="imgkepsek"]').attr("src",
						"<?= base_url() ?>uploads/kepalasekolah/" + data
						.foto_kepsek);
					});
				}
			});
			return false;
		}

		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>sambutan/simpan",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function (response) {
						if (response == "success") {
							toastr.success('Data berhasil disimpan');
							// window.location.reload(true);
							tampildata();

						} else {
							toastr.error('Data gagal disimpan');
						}
						console.log(response)
					},
					error: function (response) {
						toastr.error('Server error');
					}
				});
			}
		});
		$('#inputform').validate({
			rules: {
				sambutanf: {
					required: true,
				},
				excerpt: {
					required: true,
				}
			},
			messages: {
				sambutanf: {
					required: "Masukan sambutanf ",
				},
				excerpt: {
					required: "Masukan Excerpt",
				}
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




	})

</script>
