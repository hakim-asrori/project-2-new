@extends('template/second')

@section('content')

@if (session('message2'))
{!! session('message2') !!}
@endif

<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		Daftar Kendaraan
		<button type="button" data-toggle="modal" data-target="#kendaraan-modal" class="btn btn-primary pull-right"><i class="pe-7s-plus"></i> Tambah Kendaraan</button>
	</div>
	<div class="cs-card-content card-items-list clearfix">
		<div class="row">
			<?php foreach($data['kendaraan'] as $kendaraan) { ?>
				<div class="col-md-3 items-block">
					<div class="cs-card mb-3 cs-product-card">
						<img src="/storage/{!! $kendaraan->gambar !!}" alt="{!! $kendaraan->nama_kendaraan !!}" class="img-responsive" title="{!! $kendaraan->nama_kendaraan !!}">
						<div class="cs-card-content clearfix">
							<div class="pull-left">
								<h4 title="Sports drink">{!! $kendaraan->nama_kendaraan !!}</h4>
								<p>Rp. {!! number_format($kendaraan->harga,0,',','.') !!}</p>
							</div>
							<div class="pull-right">
								<a class="btn btn-sm btn-round btn-2warning card-btn" data-toggle="modal" data-target="#edit-kendaraan-modal" data-id="{!! $kendaraan->id !!}" id="edit">Edit</a>
								<form action="/kendaraan/{!! $kendaraan->id !!}" method="post" style="display: inline" onsubmit="return false;" id="delete">
									@csrf
									@method('delete')
									<button class="btn btn-sm btn-round btn-2danger card-btn" onclick="konfirmasi('{!! $kendaraan->nama_kendaraan !!}')">Hapus</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

@include('modal.kendaraan')

<script>
	function konfirmasi(nama) {
		swal({
			title: "Apakah anda yakin?",
			text: "Data " + nama + " akan dihapus!",
			icon: "warning",
			buttons: ["Batal", "Hapus"],
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				document.getElementById('delete').onsubmit = false;
			} else {
				swal("Data anda tidak terhapus");
			}
		});
	}
	$(document).ready(function () {
		$('body').on('click', '#edit', function (event) {
			event.preventDefault();
			var id = $(this).data('id');

			$.get('kendaraan/' + id + '/edit', function (data) {
				$('#edit_nama').val(data.data.nama_kendaraan);
				$('#edit_harga').val(data.data.harga);
				$('#edit_jumlah').val(data.data.jumlah);
				$('#edit_keterangan').val(data.data.keterangan);
				$('#gambar_sebelumnya').val(data.data.gambar);
				$('#img').attr('src', "/storage/" + data.data.gambar);
				$('#edit_kendaraan_form').attr('action', '/kendaraan/'+id);
			})
		});

	});
</script>

@endsection()