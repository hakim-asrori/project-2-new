(function($,W,D)
{
	var JQUERY4U = {};
	JQUERY4U.UTIL =
	{
		setupFormValidation: function()
		{
			$("#login_form").validate({
				ignore: "",
				rules: {
					email: {
						required: true,
						email:true
					},
					password: {
						required: true
					}
				},

				messages: {
					email: {
						required: "Email harap di isi!",
						email: "Harap masukan email yang valid!"
					},
					password: {
						required: "Password harap di isi!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#register_form").validate({
				ignore: "",
				rules: {
					nama_lengkap: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					telepon: {
						required: true
					},
					password: {
						required: true,
						rangelength:[6,20]
					}
				},

				messages: {
					nama_lengkap: {
						required: "Nama lengkap harap di isi!"
					},
					email: {
						required: "Email harap di isi!",
						email: "Harap masukan email yang valid!"
					},
					telepon: {
						required: "No. telepon harap di isi!"
					},
					password: {
						required: "Password harap di isi!",
						rangelength: "Password minimal 6 panjangnya!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#forgot_password_form").validate({
				ignore: "",
				rules: {
					email: {
						required: true,
						email: true
					}
				},

				messages: {
					email: {
						required: "Email harap di isi!",
						email: "Harap masukan email yang valid!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});
		}
	}

	$(D).ready(function($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);