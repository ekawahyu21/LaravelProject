@extends ('layout.app')
@section('title', 'Data Tamu')
@section('content')
<div class="card mt-0">
	<div class="card-header">
		<a class="tamu">Data Tamu</a>
		<!-- cek session -->
		@if (session('login'))
		@if(Auth::guard('admin')->check())
		<a class="btn btn-primary btn-sm right" href="{{ route('addformtrans') }}" role="button">Tambah</a>
		<!-- <a class="btn btn-primary btn-sm right" href="{{ route('addformtamu') }}" role="button" data-toggle="modal" data-target="#addDatatamu">Tambah</a> -->
		@include('tamu.add')
		@endif
		@endif
		
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
					<h6 class="m-0 font-weight-bold text-primary">Data Tamu</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table " id="dataTable" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<!-- cek session -->
									@if (session('login'))
									@if(Auth::guard('admin')->check())
									<th>Status</th>
									
									<th>Action</th>
									@endif
									@endif
								</tr>
							</thead>
							<tbody>
								<?php foreach ($tamu as $key => $value) {?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $value->nama; ?></td>
									<td>{{$value ->jenis_kelamin }}</td>
									<td>{{ $value ->alamat }}</td>
									@if (session('login'))
									@if(Auth::guard('admin')->check())
									@if($value->status=="Success" or $value->status=="Confirm")
									<td><div class="btn btn-success btn-sm">{{$value->status}}</div></td>
									@elseif($value->status=="Pending")
									<td><div class="btn btn-danger btn-sm">{{$value->status}}</div></td>
									@else
									<td></td>
									@endif

									<td><a class="btn-outline-primary btn-sm" href="tamu/edit/{{ $value->id_tamu }}" role="button"><i class="far fa-edit"></i></a>
									| <a class="btn-outline-danger btn-sm delete tamu" href="#" role="button" id="{{$value->id_tamu}}" role="button"><i class="far fa-trash-alt"></i></a></td>
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