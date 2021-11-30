<div id="telepon-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">

        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">

                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>

                    {{-- <!-- <form action="{{ url('/auth/telepon') }}" method="post"> --> --}}

                        @csrf
                        <div class="form-group">
                            <label>Masukan No. WA</label>
                            <input type="text" id="telepon" name="telepon" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" id="simpanTelepon">Simpan</button>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
