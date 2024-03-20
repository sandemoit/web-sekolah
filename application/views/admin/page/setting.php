<?php $this->load->view('admin/partial/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light"><?= $judul ?> /</span> <?= $subjudul ?></h4>
	<div class="card mb-4">
		<h5 class="card-header">Data </span> <?= $subjudul ?></h5>
		<div class="card-body">

			<form id="inputform" enctype="multipart/form-data">
				<input type="hidden" id="kodedit" name="kodedit">
				<div class="form-group mb-3">
					<label for="exampleInputUsername1"><strong>Apakah Ingin Ada Jurusan</strong> (SD/SMP/SMA/SMK)</label>
					<select name="jurusan" id="jurusan" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
						<option selected>Pilih Untuk Menampilkan Jurusan Atau Tidak</option>
						<option value="ya">Ya</option>
						<option value="tidak">Tidak</option>
					</select>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputUsername1">Nama Aplikasi</label>
					<input type="text" class="form-control " id="app_name" name="app_name" placeholder="Nama Aplikasi"
						required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputUsername1">Nama Sekolah</label>
					<input type="text" class="form-control " id="nama_sekolah" name="nama_sekolah"
						placeholder="Nama Sekolah" required>
					</input>
				</div>
				
				<div class="form-group mb-3">
					<label for="exampleInputUsername1">Email</label>
					<input type="mail" class="form-control " id="email" name="email" placeholder="email" required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputUsername1">Whatsapp</label>
					<input type="number" class="form-control " id="whatsapp" name="whatsapp" placeholder="Whatsapp"
						required>
					</input>
				</div>

				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Alamat</label>
					<input type="text" class="form-control " id="alamat" name="alamat" placeholder="Alamat" required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Facebook</label>
					<input type="text" class="form-control " id="facebook" name="facebook" placeholder="facebook"
						required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Twitter</label>
					<input type="text" class="form-control " id="twitter" name="twitter" placeholder="twitter" required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Instagram</label>
					<input type="text" class="form-control " id="instagram" name="instagram" placeholder="instagram"
						required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Youtube</label>
					<input type="text" class="form-control " id="youtube" name="youtube" placeholder="youtube" required>
					</input>
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Logo</label>
					<input type="file" accept="image/*" class="form-control" id="logo" name="logo" placeholder="Logo">
				</div>
				<div class="form-group mb-3">
					<img class="img-fluid h-50 w-50 " alt="" id="imglogo">
				</div>

				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Bredcumb</label>
					<input type="file" accept="image/*" class="form-control" id="breadcumb" name="breadcumb" placeholder="Logo">
				</div>
				<div class="form-group mb-3">
					<img class="img-fluid h-50 w-50 " alt="" id="imgbread">
				</div>


				<button id="buttonku" name="buttonku" class="btn btn-md  btn-primary mr-2"><i
						class="fa fa-save menu-icon"> </i> Simpan</button>

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
				url: "<?= base_url() ?>setting/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function (nama, nohp, alamat, struktur, sejarah, logo) {

						$('[id="imglogo"]').attr("src",
							"<?= base_url() ?>assets/upload/images/logo/" + data
							.logo);
						$('[id="imglogo"]').attr("style",
							"border: 1px solid #4B49AC ; border-radius: 12px;");
							$('[id="imgbread"]').attr("src",
							"<?= base_url() ?>assets/upload/images/breadcumb/" + data
							.breadcumb);
						$('[id="imgbread"]').attr("style",
							"border: 1px solid #4B49AC ; border-radius: 12px;");
						$('[name="kodedit"]').val(data.id);
						$('[name="alamat"]').val(data.alamat);
						$('[name="app_name"]').val(data.app_name);
						$('[name="email"]').val(data.email);
						$('[name="nama_sekolah"]').val(data.nama_sekolah);
						$('[name="whatsapp"]').val(data.whatsapp);
						$('[name="instagram"]').val(data.instagram);
						$('[name="facebook"]').val(data.facebook);
						$('[name="twitter"]').val(data.twitter);
						$('[name="youtube"]').val(data.youtube);
						$('[name="jurusan"]').val(data.jurusan);
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
					url: "<?= base_url() ?>setting/simpan",
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
							type: 'error',
							title: 'OOPS!!',
							text: 'Server Error!'
						});
					}
				});
			}
		});
		$('#inputform').validate({

			rules: {
				alamat: {
					required: true,
				},
				app_name: {
					required: true,
				},
				nama_sekolah: {
					required: true,
				},
				email: {
					required: true,
					email: true,
				},
				whatsapp: {
					required: true,
					number: true
				},
				yuotube: {
					required: true,

				},
				yuotube: {
					jurusan: true,

				},
				logo: {
					required: function () {
						return $("#kodedit").val() === "";
					}
				},
				breadcumb: {
					required: function () {
						return $("#kodedit").val() === "";
					}
				},
			},
			messages: {
				alamat: {
					required: 'masukkan Alamat',

				},
				app_name: {
					required: 'masukkan Nama Aplikasi',
				},
				nama_sekolah: {
					required: 'masukkan Nama Sekolah',
				},
				whatsapp: {
					required: 'masukkan Nomor Whatsapp',
					number: 'Hanya Menerima Inputan Angka'
				},
				youtube: {
					required: 'masukkan url youtube',

				},
				logo: {
					required: 'Pilih Gambar',


				},
				breadcumb: {
					required: 'Pilih Gambar',


				},
				jurusan: {
					required: 'Pilih Opsi Jurusan',


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
