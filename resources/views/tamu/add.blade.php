
<!-- Modal -->

<div class="modal fade" id="addDatatamu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        <form method="POST" action="{{ route('datatamu')}}">
          @csrf
         <div class="form-group">
            <label>Nama Tamu</label>
            <input type="text" name="nama" class="form-control" value="{{ old ('nama')}}">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <!-- <input type="text" name="jk" class="form-control"> -->
            <!-- <div class="form-check">
              
              <input class="form-check-input" type="radio" name="jk" id="laki" value="Laki-laki" checked>
              <label class="form-check-label" for="laki"> Laki-laki</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan">
              <label class="form-check-label" for="perempuan"> Perempuan</label>
            </div> -->
            <select class="form-control" id="exampleFormControlSelect1" name="jk">
              <option value="">Select Gender</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat')}}</textarea>
          </div>

          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>