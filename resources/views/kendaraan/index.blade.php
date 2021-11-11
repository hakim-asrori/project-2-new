@extends('template/second')

@section('content')

<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		Daftar Kendaraan
		<button type="button" data-toggle="modal" data-target="#kendaraan-modal" class="btn btn-primary pull-right"><i class="pe-7s-plus"></i> Tambah Kendaraan</button>
	</div>
	<div class="cs-card-content card-items-list address-y-flow clearfix">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="pb-delivery-address">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()

@include('modal.kendaraan')