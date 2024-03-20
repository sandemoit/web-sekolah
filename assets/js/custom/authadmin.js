toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

$.validator.setDefaults({
	submitHandler: function (form) {
		var formData = new FormData($(form)[0]);
		$.ajax({
			type: "POST",
			url: base_url + 'authadmin',
			data: formData,
			processData: false,
			contentType: false,
			cache: false,
			async: true,
			success: function (response) {
				if (response === "error") {
                    toastr.error('Username atau Password Salah');
				}
				if (response === "success") {
					window.location = base_url + 'admin';
				}
			},
			error: function (response) {
			}
		}); 
	}
});
$('#formlogin').validate({

	rules: {
		password: {
			required: true,
		},
		username: {
			required: true,
		},

	},
	messages: {
		password: {
			required: 'masukkan Password anda',
		},

		username: {
			required: 'masukkan Username anda',
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
