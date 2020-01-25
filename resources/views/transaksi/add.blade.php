@extends ('layout.app')
@section('title', 'Transaksi')
@section('content')

<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Booking Room</h6>
				</div>
		<div class="card-body">
		<!-- error -->
		<!-- @if(session('gagal'))
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
        @endif -->
		<form method="POST" action="{{ route('datatrans')}}">
			@csrf
			<div class="form-left">
				<div class="col mb-2">
					<label>Nomer Transaksi</label>
					<input type="text" name="notrans" class="form-control {{$errors->has('notrans') ? 'is-invalid': ''}}" placeholder="Nomer Transaksi" value="{{ $kode }}" readonly>
					@if($errors->has('notrans'))
		                <div class="invalid-feedback">{{$errors->first('notrans')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<!-- membuat tanggal pesan -->
					<?php 
						$tglpesan = date('Y-m-d');
					?>
					<!-- end -->
					<label>Tanggal Pemesanan</label>
					<input type="date" name="tglPesan" class="form-control {{$errors->has('tglPesan') ? 'is-invalid': ''}}" value="{{ $tglpesan }}">
					@if($errors->has('tglPesan'))
		                <div class="invalid-feedback">{{$errors->first('tglPesan')}}</div>
		            @endif
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
					<input type="text" name="nama" class="form-control {{$errors->has('nama') ? 'is-invalid': ''}}" placeholder="Nama Penyewa" value="{{ old('nama')}}">
					@if($errors->has('nama'))
		                <div class="invalid-feedback">{{$errors->first('nama')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Jenis Kelamin</label>
					<!-- <input type="text" class="form-control" placeholder="Last name"> -->
					<select name="jenisKelamin" id="" class="form-control {{$errors->has('jenisKelamin') ? 'is-invalid': ''}}" value="{{ old('jenisKelamin')}}">
						<option value="">Pilih Jenis Kelamin</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>

					@if($errors->has('jenisKelamin'))
		                <div class="invalid-feedback">{{$errors->first('jenisKelamin')}}</div>
		            @endif
					</select>
				</div>
				<div class="col mb-2">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid': ''}}" placeholder="Alamat" value="{{ old('alamat')}}">
					@if($errors->has('alamat'))
		                <div class="invalid-feedback">{{$errors->first('alamat')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Email</label>
					<input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid': ''}}" placeholder="Email" value="{{ old('email')}}">
					@if($errors->has('email'))
		                <div class="invalid-feedback">{{$errors->first('email')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Nomor Telepon/Hp</label>
					<input type="text" name="contact" class="form-control {{$errors->has('contact') ? 'is-invalid': ''}}" placeholder="Nomor Telepon/Hp" value="{{ old('contact')}}">
					@if($errors->has('contact'))
		                <div class="invalid-feedback">{{$errors->first('contact')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Kamar</label>
					
					<!-- <input type="text" name="status" class="form-control"> -->
					<select name="room" class="form-control {{$errors->has('room') ? 'is-invalid': ''}}" value="{{ old('room')}}">
						<option value="">Pilih kamar</option>
						@foreach($kamar as $item)
						<option value="{{$item->id_kamar}}">{{$item->tipe_kamar}}</option>
						@endforeach
						
					@if($errors->has('room'))
		                <div class="invalid-feedback">{{$errors->first('room')}}</div>
		            @endif
					</select>
					
				</div>
		
				<div class="col mb-2">
					<label>Extra Bed</label>
					<input type="number" name="bed" class="form-control" value="0">
				</div>
				<div class="col mb-2">

					<label>Extra Towel</label>
					<input type="number" name="towel" class="form-control" value="0">
				</div>
				<div class="col mb-2">
					<label>Extra Pillow</label>
					<input type="number" name="pillow" class="form-control" value="0">
				</div>
			</div>
			<div class="form-right">
				
				<div class="col mb-2">
					<label>Check in</label>
					<input type="date" name="tglStart" class="form-control {{$errors->has('tglStart') ? 'is-invalid': ''}}">
					@if($errors->has('tglStart'))
		                <div class="invalid-feedback">{{$errors->first('tglStart')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Check out</label>
					<input type="date" name="tglEnd" class="form-control {{$errors->has('tglEnd') ? 'is-invalid': ''}}">
					@if($errors->has('tglEnd'))
		                <div class="invalid-feedback">{{$errors->first('tglEnd')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Addional Guest</label>
					<input type="text" name="guest" class="form-control {{$errors->has('guest') ? 'is-invalid': ''}}" placeholder="Guest">
					@if($errors->has('guest'))
		                <div class="invalid-feedback">{{$errors->first('guest')}}</div>
		            @endif
				</div>
				<div class="col mb-2">
					<label>Addional Note</label>
					<textarea name="note" cols="15" rows="10" class="form-control"></textarea>
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

@endsection