<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data profil</h5>
		<div class="card-body">
		<form id="inputform">
			<div class="mb-3 form-group">
				<textarea id="profil" name="profil" class="form-control"></textarea>
			</div>
			<button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fas fa-save"></i> Simpan</button>
		</form>
		</div>
	</div>
</div>
<?php $this->load->view('admin/partial/footer'); ?>
<script>
	$(document).ready(function () {
		tampildata();

		$("#profil").summernote({
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
				url: "<?php echo base_url() ?>profil/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function() {
						$('[id="profil"]').summernote('code', data.profil)
					});
				}
			});
			return false;
		}

		$.validator.setDefaults({
			submitHandler: function() {
				var profil = $('#profil').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>profil/simpan",
					data: {
						'profil': profil,
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
				profilf: {
					required: true,
				}
			},
			messages: {
				profilf: {
					required: "Masukan profil",
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
