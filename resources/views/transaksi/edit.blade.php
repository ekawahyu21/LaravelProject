@extends ('layout.app')
@section('title', 'Transaksi')
@section('content')
@foreach($transaksi as $data)
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Booking Room</h6>
				</div>
		<div class="card-body">
		<!-- error -->
		@if(session('gagal'))
		<div class="alert alert-warning" role="alert">
			{{session('gagal')}}
		</div>
		@endif
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
		<form method="POST" action="/transaksi/update">
			@csrf
			<input type="hidden" name="id" class="form-control" value="{{ $data->id}}">
			<div class="form-left">
				<div class="col mb-2">
					<label>Nomer Transaksi</label>
					<input type="text" name="notrans" class="form-control" placeholder="Nomer Transaksi" value="{{ $data->no_trans}}" readonly>
				</div>
				<div class="col mb-2">
					<!-- membuat tanggal pesan -->
					<?php 
						$tglpesan = date('Y-m-d');
					?>
					<!-- end -->
					<label>Tanggal Pemesanan</label>
					<input type="date" name="tglPesan" class="form-control" value="{{ $data->tgl_pesan}}" readonly>
				</div>
				<!-- @if(session('login'))
				@if(Auth::guard('admin')->check())
				<div class="col mb-2">
					<label>Nama Penyewa</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Penyewa" value="{{ Auth::guard('admin')->user()->name }}">
				</div>
				@endif
				@endif -->
				<div class="col mb-2">
					<label>Nama Penyewa</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Penyewa" value="{{$data->nama}}" readonly>
				</div>	
				<div class="col mb-2">
					<label>Room</label>
					
					<!-- <input type="text" name="status" class="form-control"> -->
					<select name="room" class="form-control">
						<option value="">Pilih kamar</option>
						@foreach($kamar as $item)
						<option value="{{$item->id_kamar}}" @if($item->id_kamar == $data->tipe_kamar) selected @endif>{{$item->tipe_kamar}}</option>
						@endforeach
					</select>
					
				</div>
		
				<div class="col mb-2">
					<label>Extra Bed</label>
					<input type="number" name="bed" class="form-control" value="{{$data->bed}}">
				</div>
				<div class="col mb-2">

					<label>Extra Towel</label>
					<input type="number" name="towel" class="form-control" value="{{$data->towel}}">
				</div>
				<div class="col mb-2">
					<label>Extra Pillow</label>
					<input type="number" name="pillow" class="form-control" value="{{$data->pillow}}">
				</div>
			</div>
			<div class="form-right">
				
				<div class="col mb-2">
					<label>Start</label>
					<input type="date" name="tglStart" class="form-control" value="{{$data->start}}">
				</div>
				<div class="col mb-2">
					<label>End</label>
					<input type="date" name="tglEnd" class="form-control" value="{{$data->end}}">
				</div>
				<div class="col mb-2">
					<label>Addional Guest</label>
					<input type="text" name="guest" class="form-control" placeholder="Guest" value="{{$data->guest}}">
				</div>
				<div class="col mb-2">
					<label>Addional Note</label>
					<textarea name="note" cols="15" rows="10" class="form-control">{{$data->note}}</textarea>
				</div>
				
		
				<div class="col">
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
					<button type="cencel" class="btn btn-secondary btn-block">Cencel</button>
				</div>
			</div>
		</form>
	</div>
	</div>
	
</div>
@endforeach
@endsection