<div class="col-sm-{{ (Session::get('logged_in')) ? '6' : '9' }} items-block">
	<div class="wrapper">
		<div class="section">
			<div class="category-title mb-2">Kendaraan</div>
			<div class="row">
				<?php 
				$invoice = mt_rand(10000000,99999999); 
				foreach($kendaraan as $k) { 
					if ($k->jumlah != 0) { ?>
						<div class="col-sm-{{ (Session::get('logged_in')) ? '6' : '4' }}">
							<div class="cs-card mb-3 cs-product-card">
								<img src="/storage/{!! $k->gambar !!}" alt="{!! $k->nama_kendaraan !!}" class="img-responsive" title="{!! $k->nama_kendaraan !!}">
								<div class="cs-card-content clearfix">
									<div class="pull-left">
										<h4 title="[ {!! $k->user->nama_lengkap !!} ] {!! $k->nama_kendaraan !!}">[ {!! $k->user->nama_lengkap !!} ] {!! $k->nama_kendaraan !!}</h4>
										<p>Rp. {!! rupiah($k->harga) !!}</p>
										<p>Jumlah {!! $k->jumlah !!}</p>
									</div>
									<div class="pull-right">
										<button class="btn btn-sm btn-round btn-2warning" data-toggle="modal" data-target="#detail-modal" data-id="{!! $k->id !!}" id="detail">Detail</button><br>
										<?php 
										if (Session::get('logged_in')) { 
											if (Session::get('logged_in')['id'] != $k->id_user) { ?>
												<form action="/kendaraan/{!! $k->id !!}/pesan_{!! $invoice !!}" method="post">
													@csrf
													<button type="submit" class="btn btn-sm btn-round btn-primary card-btn">Pesan</button>
												</form>
											<?php } ?>
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
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('body').on('click', '#detail', function (event) {
			event.preventDefault();
			var id = $(this).data('id');

			$.get('kendaraan/' + id + '/show', function (data) {
				console.log(data.data.nama)
				$('#title').html("[ "+ data.data.user.nama_lengkap +" ] " + data.data.nama_kendaraan);
				$('#detailKeterangan').html(data.data.keterangan);
				$('#img').attr('src', "/storage/" + data.data.gambar);
			})
		});
	});
</script>