@extends ('layout.app')
@section('title', 'Data Tamu')
@section('content')
@foreach($tamu as $data)
<div class="card mt-0">
  <div class="card-header">
    <a class="text1" href="{{ route('datatamu') }}">Data Tamu</a>/
    <a class="text" >Edit Data Tamu</a>
  </div>
  <div class="card-body">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tamu</h6>
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
          <form method="POST" action="/tamu/update">
            @csrf
            <input type="hidden" name="id" class="form-control" value="{{ $data->id_tamu}}">
            <div class="form-group">
              <label>Nama Tamu</label>
              <input type="text" name="nama" class="form-control" value="{{ $data->nama}}">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <!-- <input type="text" name="jk" class="form-control" value="{{$data->jenis_kelamin}}"> -->
              <!-- <div class="form-check">
                
                <input class="form-check-input" type="radio" name="Jk" id="laki" value="{{$data->jenis_kelamin}}" checked>
                <label class="form-check-label" for="laki"> Laki-laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="Jk" id="perempuan" value="{{$data->jenis_kelamin}}">
                <label class="form-check-label" for="perempuan"> Perempuan</label>
              </div> -->
              <select class="form-control" id="exampleFormControlSelect1" name="jk">
              <option value="">Select Gender</option>
              <option value="Laki-laki" @if($data->jenis_kelamin=='Laki-laki') selected @endif>Laki-laki</option>
              <option value="Perempuan" @if($data->jenis_kelamin=='Perempuan') selected @endif>Perempuan</option>
            </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" value="{{$data->alamat}}">{{$data->alamat}}</textarea>
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
<!-- Modal -->
<!-- <div class="modal fade" id="editDatatamu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> -->
        <!-- error -->
        <!--  @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @foreach($tamu as $data) -->
        
        <!-- <form method="POST" action="tamu/edit/update">
          @csrf
          <input type="hidden" name="id" class="form-control" value="{{ $data->id_tamu}}">
          <div class="form-group">
            <label>Nama Tamu</label>
            <input type="text" name="nama" class="form-control" value="{{ $data->nama}}">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="text" name="jk" class="form-control" value="{{$data->jenis_kelamin}}">
            <div class="form-check">
              
              <input class="form-check-input" type="radio" name="Jk" id="laki" value="Laki-laki" checked>
              <label class="form-check-label" for="laki"> Laki-laki</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="Jk" id="perempuan" value="Perempuan">
              <label class="form-check-label" for="perempuan"> Perempuan</label>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" value="{{$data->alamat}}">{{$data->alamat}}</textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form> -->
        <!--   @endforeach
      </div>
    </div>
  </div>
</div> -->