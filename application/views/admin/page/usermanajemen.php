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
				<table id="user" class="table">
					<thead>
                    <tr>
								<th>
									No
								</th>
                                <th>
									Nama
								</th>
								<th>
									Username
								</th>
								<th>
									Level
								</th>
								<th>
									Action
								</th>

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
                    <div class="form-group mb-3">
						<label for="exampleInputUsername1">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
								<input type="hidden" name="kodedit" id="kodedit" value="">

					</div>
					<div class="form-group mb-3">
						<label for="exampleInputUsername1">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
					<div class="form-group mb-3">
						<label for="exampleInputEmail1">Password</label>
						<input type="password" class="form-control" id="password" name="password"
							placeholder=" password">
					</div>
					<div class="form-group mb-3">
						<label for="exampleInputEmail1">Level</label>
						<select id="level" name="level" class="form-control">
							<option value="">Pilih Level</option>
						
							<option value="admin">Admin</option>
							<option value="operator">Operator</option>
						</select>
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
                    <div class="form-group mb-3">
						<label for="exampleInputUsername1">Nama</label>
						<input type="text" class="form-control" id="enama" name="enama" placeholder="nama">
                        <input type="hidden" name="kodedit" id="kodedit" value="">

					</div>
					<div class="form-group mb-3">
						<label for="exampleInputUsername1">Username</label>
						<input type="text" class="form-control" id="eusername" name="eusername" placeholder="Username">
					</div>
					<div class="form-group mb-3">
						<label for="exampleInputEmail1">Password</label>
						<input type="text" class="form-control" id="epassword" name="epassword"
							placeholder=" password">
					</div>
					<div class="form-group mb-3">
						<label for="exampleInputEmail1">Level</label>
						<select id="elevel" name="elevel" class="form-control">
							<option value="">Pilih Level</option>
						
							<option value="admin">Admin</option>
						</select>
					</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary " id="btn-edit "><i class="fas fa-save"></i>
						Simpan</button>
				</div>

		</div>
		</form>
	</div>
</div>


<script>
	$(document).ready(function () {

		// Ketika gambar di klik
		$('#foto').on('click', '.imggaleri', function () {
			// Ambil path gambar dari attribute src
			var imgPath = $(this).attr('src');
			console.log(imgPath);
			// Set path gambar pada modal-img
			$('#modal-img').attr('src', imgPath);
		});

		tampildata();

		function tampildata() {
			$('#user').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url() ?>usermanajemen/getdata",
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
				url: "<?php echo base_url() ?>usermanajemen/simpan",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (response) {
					if (response == "ada") {
						$('[name="username"]').val("");
						$('[name="password"]').val("");
						$('[name="level"]').val("");
						$('[name="nama"]').val("");
						$('[name="kodedit"]').val("");

                        $('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
						$('#user').DataTable().ajax.reload();
						toastr.warning('Username sudah ada');
					} else if (response == "success") {

						$('[name="username"]').val("");
						$('[name="password"]').val("");
						$('[name="level"]').val("");
						$('[name="nama"]').val("");
						$('[name="kodedit"]').val("");


                        $('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
						toastr.success('Data berhasil disimpan');
						$('[id="fotojurusan"]').attr("src",
							"");
						$('#user').DataTable().ajax.reload();


                    }else {
						toastr.warning('Data gagal disimpan');
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
			username: {
				required: true,

				minlength: 6

			},
			password: {
				required: function () {
					return $("#kodedit").val() === "";
				},
				minlength: 6


			},
			level: {
				required: true,


			},nama: {
				required: true,


			}
		},
		messages: {
			username: {
				required: 'masukkan Username',

			},
			password: {
				required: 'masukkan Password',

			},
			level: {
				required: 'Pilih Level',

			},nama: {
				required: 'Masukkan Nama',

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



	//editview

	$('#user').on('click', '.bedit', function () {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?php echo base_url() ?>usermanajemen/showedit",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function (judul) {
                    $('#modal-edit').modal('show');
					$('[name="kodedit"]').val(data.kode);
					$('[name="eusername"]').val(data.username);
					$('[name="enama"]').val(data.nama);
					$('[name="elevel"]').val(data.level);
				});
			}
		});
		return false;
	});

    $.validator.setDefaults({
		submitHandler: function (form) {
			var formData = new FormData($(form)[0]);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>usermanajemen/simpan_edit",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (response) {
					if (response == "ada") {
						$('[name="eusername"]').val("");
						$('[name="epassword"]').val("");
						$('[name="elevel"]').val("");
						$('[name="enama"]').val("");
						$('[name="kodedit"]').val("");

                        $('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
						$('#user').DataTable().ajax.reload();
						toastr.warning('Username sudah ada');
					} else if (response == "success") {

						$('[name="eusername"]').val("");
						$('[name="epassword"]').val("");
						$('[name="elevel"]').val("");
						$('[name="enama"]').val("");
						$('[name="ekodedit"]').val("");


                        $('#modal-edit').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
						toastr.success('Data berhasil disimpan');
						$('[id="fotojurusan"]').attr("src",
							"");
						$('#user').DataTable().ajax.reload();


					}  else {
						toastr.warning('Data gagal disimpan');
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
	$('#editform').validate({

		rules: {
			eusername: {
				required: true,

				minlength: 6

			},
			epassword: {
				required: function () {
					return $("#kodedit").val() === "";
				},
				minlength: 6


			},
			elevel: {
				required: true,


			},enama: {
				required: true,


			}
		},
		messages: {
			eusername: {
				required: 'masukkan Username',

			},
			epassword: {
				required: 'masukkan Password',

			},
			elevel: {
				required: 'Pilih Level',

			},
            enama: {
				required: 'Masukkan Nama',

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

	// modal hapus

	$('#user').on('click', '.bhapus', function () {
		var id = $(this).attr('data');
		swal.fire({
			title: 'Yakin Menghapus data User ini?',
			text: "Tekan ya jika anda yakin ",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes'
		}).then(function (result) {
			if (result.value) {
				$.ajax({
					url: '<?php echo base_url() ?>usermanajemen/hapus',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id
					},

					success: function (jqXHR, textStatus) {
						if (respon == "success") {
                            toastr.success('Data berhasil dihapus');

							$('#user').DataTable().ajax.reload();
						} else {
                            toastr.warning('Data gagal dihapus');

						}

						console.log(response)
					},
					complete: function () {
						swal.hideLoading();
					},

					error: function (a, textStatus) {
						if (a.responseText == 'success') {
							$('#user').DataTable().ajax.reload();
                            toastr.success('Data berhasil dihapus');

						} else if (a.responseText == 'ada') {

                            toastr.warning('Data gagal dihapus');



						}

						console.log(a.responseText)
					}

				});
			}
		});

	});
		


	})

</script>