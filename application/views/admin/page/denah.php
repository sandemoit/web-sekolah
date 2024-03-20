<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data Denah Lokasi</h5>
        
		<div class="card-body">
			<div class="row">
				<div class="mb-3 col-md-6" id="map">
				</div>
				<div class="col-md-6">
					<form id="inputform">
						<div class="mb-3 form-group">
						<p class="text-primary">*Salin Url iframe google maps</p>

							<textarea rows="8" id="denah" name="denah" class="form-control"></textarea>
						</div>
						<button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fas fa-save fa-lg"></i>
							Simpan</button>
					</form>
				</div>
			</div>
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
				url: "<?php echo base_url() ?>denah/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('[id="denah"]').val(data.denah)
						$('#map').html(data.denah);

					});
				}
			});
			return false;
		}

		$.validator.setDefaults({
			submitHandler: function () {
				var denah = $('#denah').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>denah/simpan",
					data: {
						'denah': denah,
					},

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
					required: "Masukan denah",
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
