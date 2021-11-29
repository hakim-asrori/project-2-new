@extends('template/second')
<link href="/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('content')

@if (session('message2'))
{!! session('message2') !!}
@endif
<div id="pesan"></div>
<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		Profil
	</div>
	<div class="cs-card-content card-items-list clearfix">
		<div class="form-group row">
			<label class="col-sm-2">Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly value="{{ $user->email }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Nama Lengkap</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama_lengkap" value="{{ $user->nama_lengkap }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Telepon</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="telepon" value="{{ reHandphone($user->telepon) }}">
			</div>
		</div>
	</div>
</div>

@include('modal.pesan')

<script src="/assets/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/dataTables.bootstrap4.min.js"></script>

<script>
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>

@endsection()
