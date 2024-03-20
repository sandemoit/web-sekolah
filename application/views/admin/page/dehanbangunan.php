<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data </span> <?= $subjudul ?></h5>
		<div class="card-body">
			<form id="inputform"  enctype="multipart/form-data">
				<div class="form-group mb-3">
					<label class="mb-2" for="denah">Foto Denah Bangunan</label>
					<input type="file" accept="image/*" class="form-control" id="denah" name="denah" placeholder="denah">
				</div>
				<div class="form-group mb-3">
					<img class="w-100" alt="" id="imgdenah">
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

		

		function tampildata() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>denahbangunan/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('[id="imgdenah"]').attr("src",
						"<?= base_url() ?>uploads/denahbangunan/" + data
						.denahbangunan);
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
					url: "<?php echo base_url() ?>denahbangunan/simpan",
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
				denah: {
					required: true,
				}
			},
			messages: {
				denah: {
					required: "Pilih Gambar ",
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
