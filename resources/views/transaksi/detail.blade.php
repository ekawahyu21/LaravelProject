@extends ('layout.app')
@section('title', 'Data Transaksi')
@section('content')
@foreach($transaksi as $data)
@foreach($tamu as $data1)
<div class="card mt-0">
	<div class="card-header">
		<a class="kamar">Detail Transaksi</a>
		<a class="btn btn-primary btn-sm right" href="{{ route('datatrans') }}" role="button">Kembali</a>
		
	</div>
<div class="container-fluid">
		<div class="card-body">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
				</div>
				
				<div class="card-body">
				<div class="col mb-2">
					<label>Nomer Transaksi :</label>
					<a name="notrans" class="font-weight-bold">{{$data->no_trans}}</a>

				</div>
				<div class="col mb-2">
					<label>Tanggal Pesan :</label>
					<a name="notrans" class="font-weight-bold">{{$data->tgl_pesan}}</a>
					
				</div>
				<div class="col mb-2">
					<label>Nama Penyewa :</label>
					<a name="notrans" class="font-weight-bold">{{$data1->nama}}</a>
					
				</div>
				<div class="col mb-2">
					<label>Alamat :</label>
					<a name="notrans" class="font-weight-bold">{{$data1->alamat}}</a>
					
				</div>
				
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%">
							<thead>
								
								<tr>
									<th>No</th>
									<th>Jenis Kamar</th>
									<th>Bed</th>
									<th>Towel</th>
									<th>Pillow</th>
									<th>Guest</th>
									<th>Addional Guest</th>
									<!-- <th>Start</th>
									<th>End</th> -->
									<th>Total</th>
									<th>Payment</th>
									<th>Action</th>
								</tr>
								
							</thead>
							<tbody>
								<?php foreach ($transaksi as $key => $value) {?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td>{{$value->tipe_kamar}}</td>
									<td>{{$value->bed}}</td>
									<td>{{$value->towel}}</td>
									<td>{{$value->pillow}}</td>
									<td>{{$value->guest}}</td>
									<td>{{$value->note}}</td>
									<td>{{ number_format($value->total)}}</td>
									@if($value->payment=="Success")
									<td><div class="btn btn-success btn-sm">{{$value->payment}}</div></td>
									@elseif($value->payment=="Pending")
									<td><div class="btn btn-danger btn-sm">{{$value->payment}}</div></td>
									@else
									<td></td>
									@endif
									<td><a class="btn-outline-primary btn-sm" href="/transaksi/edit/{{ $value->id}}" role="button"><i class="far fa-edit"></i></a></td>

								</tr>
								
							</tbody>
								<tfoot>
								<tr>
									<td class="pr-2" colspan="11">
										<a href="/transaksi/bayar/{{$value->no_trans}}" class="btn btn-success btn-sm right">Bayar</a>
									</td>
								</tr>
							</tfoot>
							<?php } ?>
							<tfoot>
								<tr>
									<td colspan="8" class="font-weight-bold">Total</td>
									<td colspan="3">Rp.{{number_format($total)}}</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endforeach
@endforeach

@endsection