@extends ('layout.app')
@section('title', 'Data Kamar')
@section('content')
<div class="card mt-0">
	<div class="card-header">
		<a class="kamar">Data Kamar</a> 
		<!-- cek session -->
		@if (session('login'))
		@if(Auth::guard('admin')->check())
		<a class="btn btn-primary btn-sm right" href="{{ route('addformkamar') }}" role="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tambah</a>
		@include('kamar.add')
		@endif
		@endif

	</div>
	<div class="container-fluid">
		<div class="card-body">
			<!-- @if(count($errors) > 0)
			<div class="alert alert-danger">
					<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
					</ul>
			</div>
			@endif -->
			
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="dataTable" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<!-- <th>Nomer Kamar</th> -->
									<th>Tipe Kamar</th>
									<th>Harga</th>
									<th>Status</th>
									@if (session('login'))
									@if(Auth::guard('admin')->check())
									<th>Action</th>
									@endif
									@endif
								</tr>
							</thead>
							<tbody>
								<?php foreach ($kamar as $key => $value) {?>
								<tr>
									<td>{{ $key+1 }}</td>
									<!-- <td>{{$value->id_kamar }}</td> -->
									<td>{{$value->tipe_kamar}}</td>
									<td>Rp. {{ number_format($value->harga)}}</td>
									@if ($value->status=='Tersedia')
									<td><div class="btn btn-success btn-sm">{{$value->status}}</div></td>
									@else ($value->status=="Kosong")
									<td><div class="btn btn-danger btn-sm">{{$value->status}}</div></td>
									@endif
									@if (session('login'))
									@if(Auth::guard('admin')->check())
									<td><a class="btn-outline-primary btn-sm" href="kamar/edit/{{ $value->id_kamar }}" role="button"><i class="far fa-edit"></i></a> | <a class="btn-outline-danger btn-sm delete kamar" href="#" role="button" id="{{$value->id_kamar}}"><i class="far fa-trash-alt"></i></a></td>
									@endif
									@endif
								</tr>
								<?php } ?>
							</tbody>
						</table>
						
						
					</div>
					<!-- 	<nav aria-label="...">
							<ul class="pagination right pagination-sm">
											<li class="page-item disabled">
															<span class="page-link">Previous</span>
											</li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item active" aria-current="page">
															<span class="page-link">
																			2
																			<span class="sr-only">(current)</span>
															</span>
											</li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item">
															<a class="page-link" href="#">Next</a>
											</li>
							</ul>
					</nav> -->
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection