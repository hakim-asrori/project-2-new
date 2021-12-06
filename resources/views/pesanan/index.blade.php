@extends('template/second')
@section('content')
<link href="/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@if (session('message2'))
{!! session('message2') !!}
@endif
<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		Daftar Pesanan
		<button type="button" data-toggle="modal" data-target="#pesanan-modal" class="btn btn-primary pull-right"><i class="pe-7s-plus"></i> Tambah Pesanan</button>
	</div>
	<div class="cs-card-content card-items-list clearfix">
		<h3>Barang pinjaman</h3>
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="dataTable">
				<thead>
					<tr>
						<th>Invoice</th>
						<th>Nama</th>
						<th>Kendaraan</th>
						<th>No. WA</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

@include('modal.pesan')

<script src="/assets/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/dataTables.bootstrap4.min.js"></script>

<script>
	// $(document).ready(function() {
		// $('#dataTable').DataTable();
	// });
</script>

@endsection()
