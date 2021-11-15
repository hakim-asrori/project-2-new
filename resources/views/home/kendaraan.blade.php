<div class="col-sm-6 items-block">
	<div class="wrapper">
		<div class="section">
			<div class="category-title mb-2">Kendaraan</div>
			<div class="row">
				<?php $invoice = mt_rand(10000000,99999999); foreach($kendaraan as $k) { ?>
					<div class="col-sm-6">
						<div class="cs-card mb-3 cs-product-card">
							<img src="/storage/{!! $k->gambar !!}" alt="{!! $k->nama_kendaraan !!}" class="img-responsive" title="{!! $k->nama_kendaraan !!}">
							<div class="cs-card-content clearfix">
								<div class="pull-left">
									<h4 title="{!! $k->nama_kendaraan !!}">{!! $k->nama_kendaraan !!}</h4>
									<p>Rp. {!! number_format($k->harga,0,',','.') !!}</p>
									<p>Jumlah {!! $k->jumlah !!}</p>
								</div>
								<div class="pull-right">
									<?php 
									if (Session::get('logged_in')) { ?>
										<form action="/kendaraan/{!! $k->id !!}/pesan_{!! $invoice !!}" method="post">
											@csrf
											<button type="submit" class="btn btn-sm btn-round btn-primary card-btn">Pesan</button>
										</form>
										<?php 
									} else { ?>
										<a onclick="show_popup('login')" class="btn btn-sm btn-round btn-primary card-btn">Pesan</a>
										<?php 
									}
									?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
