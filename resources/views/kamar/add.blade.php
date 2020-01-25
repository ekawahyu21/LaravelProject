<!--Modal -->

<div id="collapseExample" id="collapseExample" class="collapse">
      <div class="card-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
        </button>
      </div>
      <div class="card card-body">
       <form method="POST" action="{{ route('datakamar')}}">
          @csrf
          <div class="form-group">
            <label>Nomer Kamar</label>
            <input type="text" name="nomer" class="form-control {{$errors->has('nomer') ? 'is-invalid': ''}}" value="{{old('nomer')}}">
            @if($errors->has('nomer'))
                <div class="invalid-feedback">{{$errors->first('nomer')}}</div>
            @endif
          </div>
          
          <div class="form-group">
            <label>Tipe Kamar</label>
            <input type="text" name="tipeKamar" class="form-control {{$errors->has('tipeKamar') ? 'is-invalid': ''}}" value="{{old('tipeKamar')}}">
            @if($errors->has('tipeKamar'))
                <div class="invalid-feedback">{{$errors->first('tipeKamar')}}</div>
            @endif
            <!-- <select name="tipeKamar" class="form-control">
              <option value="">Select Tipe</option>
              <option value="Standar">Standar</option>
              <option value="Superior">Superior</option>
              <option value="Deluxe">Deluxe</option>
            </select> -->
            </div>
            <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control {{$errors->has('harga') ? 'is-invalid': ''}}" value="{{old('harga')}}">
            @if($errors->has('harga'))
                <div class="invalid-feedback">{{$errors->first('harga')}}</div>
            @endif
          </div>
            <div class="form-group">
            <label>Status</label>
            <!-- <input type="text" name="status" class="form-control"> -->
            <select name="status" id="" class="form-control {{$errors->has('status') ? 'is-invalid': ''}}">
                <option value="">Pilih Status</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Kosong">Kosong</option>
              </select>
               @if($errors->has('status'))
                <div class="invalid-feedback">{{$errors->first('status')}}</div>
            @endif
          </div>  
            
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm" style="width: 100px;" id="button">Save</button>
      </div>
        </form>
      </div>
    </div>

