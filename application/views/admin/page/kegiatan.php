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
				<table id="ekskul" class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kegiatan</th>
							<th>Keterangan</th>
							<th>Tanggal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card">
		<h5 class="card-header">Kalender </span> <?= $subjudul ?></h5>
		<div class="card-body">
        <div id="calendar"></div>
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
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label>Nama Kegiatan</label>
								<input type="text" name="nama" id="nama" class="form-control select2">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="keterangan" id="keterangan" class="form-control select2">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" name="tanggalm" id="tanggalm" class="form-control select2">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label>Tanggal Selesai</label>
								<input type="date" name="tanggals" id="tanggals" class="form-control select2">
							</div>
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
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Kegiatan</label>
								<input type="text" name="enama" id="enama" class="form-control select2">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="eketerangan" id="eketerangan" class="form-control select2">
								<input type="hidden" name="kodedit" id="kodedit" class="form-control select2">
							</div>

							<!-- /.form-group -->

						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" name="etanggalm" id="etanggalm" class="form-control select2">
							</div>
							<div class="form-group">
								<label>Tanggal Selesai</label>
								<input type="date" name="etanggals" id="etanggals" class="form-control select2">
							</div>
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

        var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		/*/  var events = <?php echo json_encode($data) ?>;/*/

		var date = new Date()
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear()

		var Calendar = FullCalendar.Calendar;
		var calendarEl = document.getElementById('calendar');

		var calendar = new Calendar(calendarEl, {
			headerToolbar: {
				left  : 'prev,next',
        center: 'title',
        right : ''
			},
			themeSystem: 'bootstrap5',
			//Random default events
			events: "<?php echo base_url(); ?>kegiatan/load",
			contentHeight: 500,

			eventClick: function (info) {
				// alert('Event: ' + info.event.extendedProps.description);
				Swal.fire({
					title: "Acara : " + info.event.title,
					html: info.event.extendedProps.tanggal + " <strong>S/d</strong> " + info
						.event.extendedProps.selesai + "<br><h5> Keterangan : " + info.event
						.extendedProps.description + "</h5>",
					icon: "info",
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Oke'
				})

				info.el.style.borderColor = 'red';
			}

            

		});

		calendar.render();




		tampildata();

		function tampildata() {
			$('#ekskul').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,
				"ajax": {
					url: "<?php echo base_url()?>kegiatan/getdata",
					type: 'GET'
				},

			});
		}

        // simpan data

		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);

				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>kegiatan/simpan",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: true,
					success: function (response) {

						if (response == "success") {
							calendar.refetchEvents();
							$('[name="nama"]').val("");
							$('[name="tanggalm"]').val("");
							$('[name="tanggals"]').val("");
							$('[name="keterangan"]').val("");
							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
                            toastr.success('Data berhasil disimpan');

							$('#ekskul').DataTable().ajax.reload();
						} else {
                            toastr.success('Data gagal disimpan');

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

				nama: {
					required: true,
				},
				tanggalm: {
					required: true,

				},
				tanggals: {
					required: true,

				},

				keterangan: {
					required: true,

				},

			},
			messages: {


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


        //saveedit
		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>kegiatan/simpanedit",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: true,

					success: function (response) {
						calendar.refetchEvents();
						if (response == "success") {
							$('[name="enama"]').val("");
							$('[name="etanggalm"]').val("");
							$('[name="etanggals"]').val("");
							$('[name="eketerangan"]').val("");
							$('[name="kodedit"]').val("");
							$('#modal-edit').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
                            toastr.success('Data berhasil disimpan');
							$('#ekskul').DataTable().ajax.reload();


						} else {
                            toastr.failed('Data gagal disimpan');
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

				enama: {
					required: true,
				},
				etanggalm: {
					required: true,

				},
				etanggals: {
					required: true,

				},

				eketerangan: {
					required: true,

				},

			},
			messages: {




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


		// showedit data
		$('#ekskul').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url()?>kegiatan/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="enama"]').val(data.nama);
						$('[name="etanggalm"]').val(data.tanggal);
						$('[name="etanggals"]').val(data.tanggal_selesai);
						$('[name="eketerangan"]').val(data.keterangan);



					});
				}
			});
			return false;
		});

		// DELETE



		$('#ekskul').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			swal.fire({
				title: 'Yakin Menghapus data ekskul ini?',
				text: "Tekan ya jika anda yakin",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes'
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						url: '<?= base_url() ?>kegiatan/hapus',
						type: 'POST',
						dataType: 'json',
						data: {
							id: id
						},

						success: function (jqXHR, textStatus) {
							if (respon == "success") {

								$('#ekskul').DataTable().ajax.reload();

							} else {


							}

							console.log(response)
						},
						complete: function () {
							swal.hideLoading();
						},

						error: function (a, textStatus) {
							if (a.responseText == 'success') {
								$('#ekskul').DataTable().ajax.reload();
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
