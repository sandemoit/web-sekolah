<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data Visi Misi</h5>
		<div class="card-body">
		<form id="inputform">
			<div class="mb-3 form-group">
				<textarea id="visi" name="visi" class="form-control"></textarea>
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

		$("#visi").summernote({
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
				url: "<?php echo base_url() ?>visi/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function() {
						$('[id="visi"]').summernote('code', data.visi)
					});
				}
			});
			return false;
		}

		$.validator.setDefaults({
			submitHandler: function() {
				var visi = $('#visi').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>visi/simpan",
					data: {
						'visi': visi,
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
				visif: {
					required: true,
				}
			},
			messages: {
				visif: {
					required: "Masukan visi",
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
