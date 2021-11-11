<div id="kendaraan-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    <div class="login-block-header text-center btn btn-block" style="color: white; background-color: #dc3432; cursor: default;">Tambah Kendaraan</div>
                    <form action="/cart/add_kendaraan" name="kendaraan_form" id="kendaraan_form" class="form-horizontal" method="post" accept-charset="utf-8">

                        <div class="form-group">
                            <input type="text" name="nama kendaraan" value="" id="house_no" class="form-control form-control-lg" placeholder="Nama Kendaraan"  />
                        </div>
                        <div class="form-group">
                            <input type="text" name="harga" value="" id="street" class="form-control form-control-lg" placeholder="Harga"  />
                        </div>
                        <div class="form-group">
                            <input type="text" name="jumlah kendaraan" value="" id="landmark" class="form-control form-control-lg" placeholder="Jumlah Kendaraan"  />
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan" value="" id="landmark" class="form-control form-control-lg" placeholder="Keterangan"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" name="gambar"class="form-control form-control-lg" placeholder="Upload Gambar">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="kendaraan" class="btn btn-primary btn-block "><b>Tambah</b></button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>