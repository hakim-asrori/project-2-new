<div id="pesanan-modal" class="modal fade login-component" role="dialog">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-block">
          <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
          <div class="login-block-header text-center">Tambah Kendaraan</div>
          @csrf
          <div class="form-group">
            <textarea name="invoice" id="pesan" rows="10" class="form-control form-control-lg" placeholder="Copy paste pesan WA"></textarea>
          </div>


          <div class="form-group">
            <button type="submit" id="pesanan" class="btn btn-primary btn-block "><b>Tambah</b></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  loadKendaraan();

  function loadKendaraan() {
    let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
    empTable.innerHTML = "";

    $.ajax({
      url: "/pesanan/get-all",
      type: "get",
      success: function (response) {
        for (let key in response) {
          if (response.hasOwnProperty(key)) {
            let val = response[key];

            let NewRow = empTable.insertRow(0); 
            let invoiceCell = NewRow.insertCell(0); 
            let namaCell = NewRow.insertCell(1); 
            let kendaraanCell = NewRow.insertCell(2); 
            let teleponCell = NewRow.insertCell(3);
            let aksiCell = NewRow.insertCell(4);

            invoiceCell.innerHTML = val['invoice']; 
            namaCell.innerHTML = val['penyewa']; 
            kendaraanCell.innerHTML = val['kendaraan']; 
            teleponCell.innerHTML = '<a href="https://api.whatsapp.com/send?phone='+ val['telepon'] +'&text=Pesan dari App Silihin%0A%0ADari : {!!Session::get('logged_in')['nama_lengkap']!!}%0AIsi Pesan : " class="btn btn-primary" target="_blank">WA Me</a>';
            aksiCell.innerHTML = "lorem";
          }
        }
      }
    })
  }

  $(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
      }
    });

    $("#pesanan").on('click', function () {
      let pesan = $("textarea#pesan").val().trim();
      let splitPesan = pesan.split('\n');
      let splitInvoice = splitPesan[3].split(' ');
      
      $.ajax({
        url: '/pesanan',
        type: 'post',
        data: {invoice: splitInvoice[1]},
        success: function (response) {
          if (response == 1) { 
            $("#pesan").html(swal('Wooww!', 'Data berhasil disimpan', 'success'));
            $("textarea#pesan").val('');
            $("#pesanan-modal").modal('hide');
            loadKendaraan();
          } else if (response == 2) {
            $("#pesan").html(swal('Ooops!', 'Data sudah disimpan', 'warning'));
            $("textarea#pesan").val('');
            $("#pesanan-modal").modal('hide')
          } else {
            $("#pesan").html(swal('Ooops!', 'Data gagal disimpan', 'error'));
          }
        }
      })
    })
  })
</script>