@extends ('layout.app')
@section('title', 'Data Report')
@section('content')

<div class="card mt-0">
	<div class="card-header">
		<a class="tamu">Data Report</a> <a class="btn btn-primary btn-sm right" href="/pages/cetak_pdf" role="button" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
	</div>
	<div class="container-fluid">
		<div class="card-body">
			@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Data Report</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table " id="dataTable" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tanggal Pesan</th>
									<th>Jenis Kamar</th>
				
									<th>Bed</th>
									<th>Towel</th>
									<th>Pillow</th>
									<th>Guest</th>
									<th>Start</th>
									<th>End</th>
									<th>Guest note</th>
									<th>Total</th>
									<th>Payment</th>
									<th>Actoin</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($transaksi as $key => $value) {?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td>{{$value->nama}}</td>
									<td>{{$value->tgl_pesan}}</td>
									<td>{{$value->tipe_kamar}}</td>
									<td>{{$value->bed}}</td>
									<td>{{$value->towel}}</td>
									<td>{{$value->pillow}}</td>
									<td>{{$value->guest}}</td>
									<td>{{$value->start}}</td>
									<td>{{$value->end}}</td>
									<td>{{$value->note}}</td>
									<td>{{ number_format($value->total)}}</td>
									@if($value->payment=="Success")
									<td><div class="btn btn-success btn-sm">{{$value->payment}}</div></td>
									@elseif($value->payment=="Pending")
									<td><div class="btn btn-danger btn-sm">{{$value->payment}}</div></td>
									@else
									<td></td>
									@endif
									<td><a class="btn-outline-primary btn-sm" href="/transaksi/edit/{{ $value->id}}" role="button"><i class="far fa-edit"></i></a>|<a class="btn-outline-danger btn-sm" href="transaksi/hapus/{{$value->id}}" role="button"><i class="far fa-trash-alt"></i></a></td>

								</tr>
								<?php } ?>
							</tbody>
						</table>
						
						
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection