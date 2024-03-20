<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills flex-column flex-md-row mb-3">
				<li class="nav-item">
					<a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Akun</a>
				</li>

			</ul>
			<div class="card mb-4">
				<h5 class="card-header">Profile Details</h5>
				<!-- Account -->
				<form id="inputform" enctype="multipart/form-data">
					<div class="card-body">

						<div class="d-flex align-items-start align-items-sm-center gap-4">
							<input type="hidden" id="kodedit" name="kodedit">

							<img src="" alt="user-avatar" id="foto" class="d-block rounded" height="100" width="100"
								id="uploadedAvatar" />
							<div class="button-wrapper">
								<label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
									<span class="d-none d-sm-block">Upload new photo</span>
									<i class="bx bx-upload d-block d-sm-none"></i>
									<input type="file" id="upload" name="upload" class="account-file-input" hidden
										accept="image/png, image/jpeg" />
								</label>


								<p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
							</div>
						</div>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-6 form-group">
								<label for="firstName" class="form-label">Username</label>
								<input class="form-control" type="text" id="username" name="username" autofocus />
							</div>
							<div class="mb-3 col-md-6 form-group">
								<label for="lastName" class="form-label">Nama</label>
								<input class="form-control" type="text" name="nama" id="nama" />
							</div>

						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Simpan</button>
						</div>

					</div>
				</form>
				<!-- /Account -->
			</div>


			<div class="card">
				<h5 class="card-header">Password</h5>
				<div class="card-body">
					<div class="mb-3 col-12 mb-0">
						<div class="alert alert-warning">
							<h6 class="alert-heading fw-bold mb-1">Anda ingin Mengganti Password ?</h6>
							<p class="mb-0">Anda harus mengetahui password lama anda terlebih dahulu</p>
						</div>
					</div>
					<form action="<?= base_url(); ?>akun/password" method="post" enctype="multipart/form-data">
						<div class="form-group mb-3">
							<label for="exampleInputName1">Password Lama</label>
							<input type="password" name="oldpassword" class="form-control" id="exampleInputName1"
								placeholder="Password lama">
							<small class="form-text text-danger pl-1"><?php echo form_error('oldpassword'); ?></small>
							<input type="hidden" name="aksi" value="passwordganti">
						</div>
						<div class="form-group mb-3">
							<label for="exampleInputEmail3">Password Baru</label>
							<input type="password" name="newpassword" class="form-control" id="exampleInputEmail3"
								placeholder="Password baru">
							<small class="form-text text-danger pl-1"><?php echo form_error('newpassword'); ?></small>

						</div>
						<div class="form-group mb-3">
							<label for="exampleInputPassword4">Ulangi Password Baru</label>
							<input type="password" name="confirmpassword" class="form-control"
								id="exampleInputPassword4" placeholder="Konfirmasi Password baru">
							<small
								class="form-text text-danger pl-1"><?php echo form_error('confirmpassword'); ?></small>

						</div>

						<button type="submit" class="btn btn-primary mr-2">Ganti Password</button>
					</form>
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
					url: "<?= base_url() ?>akun/showdata",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function (data) {
						$.each(data, function () {

							$('[id="foto"]').attr("src",
								"<?= base_url() ?>uploads/fotoprofile/" + data
								.photo_profile);

							$('[name="kodedit"]').val(data.id);
							$('[name="nama"]').val(data.nama);
							$('[name="username"]').val(data.username);

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
						url: "<?= base_url() ?>akun/simpan",
						data: formData,
						processData: false,
						contentType: false,
						cache: false,
						async: false,


						success: function (response) {
							if (response == "success") {
								toastr.success('Data berhasil disimpan');
								tampildata();
							} else if (response == "error") {
								toastr.warning('Data Gagal disimpan');
								tampildata();
							} else {
								toastr.warning('Data Gagal disimpan,Deskripsi Kosong');
								tampildata();

							}
							console.log(response)
						},

						error: function (response) {
							Swal.fire({
								icon: 'error',
								title: 'OOPS!!',
								text: 'Server Error!'
							});
						}
					});
				}
			});
			$('#inputform').validate({

				rules: {
					nama: {
						required: true,
					},
					username: {
						required: true,
					},

					upload: {
						required: function () {
							return $("#kodedit").val() === "";
						}
					},
				},
				messages: {
					nama: {
						required: 'masukkan Nama',

					},
					username: {
						required: 'masukkan Username',
					},

					logo: {
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

		})

	</script>
