@include('modal.login')
@include('modal.register')
@include('modal.forgot')

<script>
	$(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
			}
		});

		$("#simpanTelepon").on('click', function () {
			let telepon = $("input#telepon").val().trim();

			$.ajax({
				url: '/profile/telepon',
				type: 'post',
				data: {telepon: telepon},
				success: function (response) {
					if (response == 1) {
						swal('Wooww!', 'Data berhasil disimpan', 'success');
						$("input#telepon").val('')
						$("#telepon-modal").modal('hide');
					} else {
						swal('Ooops!', 'Data gagal disimpan', 'error');
					}
				}
			})
		})
	})
</script>
