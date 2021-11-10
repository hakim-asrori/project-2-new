<div id="address-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    <div class="login-block-header text-center">add address</div>
                    <form action="/cart/add_address" name="address_form" id="address_form" class="form-horizontal" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <select name="locality" class="form-control form-control-lg chzn-select" id="locality" placeholder="locality" onchange="get_pincode()">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="pincode" value="" id="pincode" readonly="1" class="form-control form-control-lg" placeholder="pincode"  />
                        </div>
                        <div class="form-group">
                            <input type="text" name="house_no" value="" id="house_no" class="form-control form-control-lg" placeholder="house no"  />
                        </div>
                        <div class="form-group">
                            <input type="text" name="street" value="" id="street" class="form-control form-control-lg" placeholder="street"  />
                        </div>
                        <div class="form-group">
                            <input type="text" name="landmark" value="" id="landmark" class="form-control form-control-lg" placeholder="landmark"  />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="address" class="btn btn-primary btn-block "><b>Tambah</b></button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>