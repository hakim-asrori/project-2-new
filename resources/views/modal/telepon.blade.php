<div id="telepon-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">

        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">

                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>

                    <!-- <form action="{{ url('/auth/telepon') }}" method="post"> -->
                    <form action="/auth/telepon" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Masukan No. WA</label>
                            <input type="text" id="telepon" name="telepon" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // $(document).ready(function () {
    //     $("#simpanTelepon").on("click", function () {
    //         let telepon = $("#telepon").val().trim();
    //         if (telepon == '') {
    //             $("#pesan").html(Swal.fire('Ooops!', 'Form telepon harap diisi!', 'error'));
    //         } else {
    //             $.ajax({
    //                 url: '/auth/telepon',
    //                 type: 'post',
    //                 data: {telepon: telepon, _token: $('input[name="_token"]').attr('value')},
    //                 success: function (response) {
    //                     console.log(response);
    //                     if (response == 1) { 
    //                         $("#pesan").html(Swal.fire('Wooww!', 'Data berhasil disimpan', 'success'));
    //                         $("#telepon").val('');
    //                         $("#telepon-modal").modal("show")
    //                     } else {
    //                         $("#pesan").html(Swal.fire('Ooops!', 'Data gagal disimpan', 'error'));
    //                     }
    //                 }
    //             })
    //         }
    //     })

    // })
</script>