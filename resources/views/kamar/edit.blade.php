@extends ('layout.app')
@section('title', 'Data Kamar')
@section('content')
@foreach($kamar as $data)
<div class="card mt-0">
  <div class="card-header">
    <a class="text1" href="{{ route('datakamar') }}">Data kamar</a>/
    <a class="text" >Edit Data kamar</a>
  </div>
  <div class="card-body">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data kamar</h6>
      </div>
      <div class="card-body">
        <!-- error -->
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        

        <div class="table-responsive">    
          <form method="POST" action="/kamar/update">
            @csrf
            <input type="hidden" name="id" class="form-control" value="{{ $data->id_kamar}}">

            <div class="form-group">
              <label>Tipe Kamar</label>
              <input type="text" name="tipeKamar" class="form-control" value="{{$data->tipe_kamar}}" disabled>
     
              <!-- <select disabled class="form-control" id="exampleFormControlSelect1" name="tipeKamar" >
              <option value="">Select Tipe</option>
              <option value="Standar" @if($data->tipe_kamar=='Standar') selected @endif>Standar</option>
              <option value="Superior"@if($data->tipe_kamar=='Superior') selected @endif>Superior</option>
              <option value="Deluxe"@if($data->tipe_kamar=='Deluxe') selected @endif>Deluxe</option> -->
            </select>
              </div>


            <div class="form-group">
              <label>Harga Kamar</label>
              <input type="text" name="harga" class="form-control" value="{{ $data->harga}}">
            </div>
            
            
            <div class="form-group">
              <label>Status</label>
              <!-- <input type="text" name="status" class="form-control" value="{{$data->status}}"> -->
              <select name="status" id="" class="form-control">
              	<option value="">Pilih Status</option>
              	<option value="Tersedia" @if($data->status=='Tersedia') selected @endif>Tersedia</option>
              	<option value="Kosong" @if($data->status=='Kosong') selected @endif>Kosong</option>
              </select>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="cencel" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
    
  </div>
</div>
@endforeach
@endsection