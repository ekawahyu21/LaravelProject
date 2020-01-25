@extends ('layout.app')
@section('title', 'Data Transaksi')
@section('content')
@if(session('login'))
<div class="card mt-0">
	<div class="card-header">
		<a class="kamar">Data Transaksi</a> <a class="btn btn-primary btn-sm right" href="{{ route('addformtrans') }}" role="button" >Tambah</a>
		
	</div>
	<div class="container-fluid">
		<div class="card-body">
			@if(session('gagal'))
			<div class="alert alert-warning" role="alert">
				{{session('gagal')}}
			</div>
			@endif
			<!-- @if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
			</div>
			@elseif(count($errors) > 0)
			<div class="alert alert-danger" role="alert">
				Data Gagal ditambah
			</div>
			@endif -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
							<thead>
								
								<tr>
									<th>No</th>
									<th>Nomer Transaksi</th>
									<th>Nama</th>
									<th>Tanggal Pesan</th>
									<th>Jenis Kamar</th>
									<!-- <th>Bed</th>
									<th>Towel</th>
									<th>Pillow</th>
									<th>Guest</th>
									<th>Addional Guest</th>
									<th>Start</th>
									<th>End</th> -->
									<th>Total</th>
									<th>Action</th>
								</tr>
								
							</thead>
							<tbody>
								<?php foreach ($transaksi as $key => $value) {?>
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{$value->no_trans}}</td>
									<td>{{$value->nama}}</td>
									<td>{{$value->tgl_pesan}}</td>
									<td>{{$value->tipe_kamar}}</td>
									<!-- <td>{{$value->bed}}</td>
									<td>{{$value->towel}}</td>
									<td>{{$value->pillow}}</td>
									<td>{{$value->guest}}</td>
									<td>{{$value->note}}</td>
									<td>{{$value->start}}</td>
									<td>{{$value->end}}</td> -->
									<td>Rp. {{number_format($value->total)}}</td>
									<td>
										@if($value->payment == "Success")
										<a href="#" class="btn-outline-success btn-sm disabled" aria-disabled="true"><i class="fas fa-file-invoice disabled" aria-disabled="true"></i></a>
										@else
										<a class="btn-outline-success btn-sm" href="transaksi/detail/{{ $value->no_trans }}"><i class="fas fa-file-invoice"></i></a>
										@endif
										|<a class="btn-outline-danger btn-sm delete" href="#" role="button" id="{{$value->id}}"><i class="far fa-trash-alt"></i></a></td>
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
@endif
@endsection